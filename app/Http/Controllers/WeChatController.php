<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class WeChatController extends Controller
{
    /**
     * 微信授权登陆流程
     */
    public function wxcode()
    {
        /** 一定要按照参数的顺序进行编写 */
        $params = http_build_query([
            'appid' => 'wx43e11cd497a7dabe',
            'redirect_uri' => 'http://lms.test/wxtoken',
            'response_type' => 'code',
            'scope' => 'snsapi_userinfo'
        ]);
        $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?' . $params . '#wechat_redirect';
        return redirect($url);
    }

    public function wxtoken(Request $request)
    {
        $code = $request->input('code');
        /** 第二步：通过code换取网页授权access_token）*/
        $params = http_build_query([
            'appid' => 'wx43e11cd497a7dabe',
            'secret' => '5a73c64e74d15d15569297efa261909c',
            'code' => $code,
            'grant_type' => 'authorization_code'
        ]);
        $url = 'https://api.weixin.qq.com/sns/oauth2/access_token?' . $params;
        /** 使用file_get_contents函数可能会有 ssl 错误 修改 php.ini 中的 openssl.cafile */
        $result = json_decode(file_get_contents($url));
        /** 第三步：刷新access_token（如果需要）*/

        /** 第四步：拉取用户信息(需scope为 snsapi_userinfo) */
        $params = http_build_query([
            'access_token' => $result->access_token,
            'openid' => $result->openid,
            'lang' => 'zh_CN',
        ]);
        $url = 'https://api.weixin.qq.com/sns/userinfo?' . $params;
        $userInfo = json_decode(file_get_contents($url));
        dd($userInfo);
    }

    public function auth(Request $request)
    {
        $weChatUserInfo = \session('wechat.oauth_user.default');

        $userInfo = User::where('Openid', $weChatUserInfo['id'])->first();
        if (!$userInfo) {
            // 用户的密码需要他在第一次登陆的时候设置
            // 手机号码要进行绑定,要根据用户ID进行异构索引分表
            $result = User::create([
//                'id' => $this->uuid(),
                'Openid' => $weChatUserInfo['id'],
                'username' => $weChatUserInfo['name'],
                'role_id' => 1,// 角色默认 1 是普通用户
                'vender_type' => 2,
                'status' => 0,
                'login_ip' => $request->getClientIp(),
            ]);
        } else {
            $result = $userInfo;
        }
        // 登陆验证
        Auth::login($result, true);

        if ($request->redirect_url == '') {
            return redirect('/index');
        } else {
            return redirect($request->redirect_url);
        }

    }

    public function uuid($prefix = '')
    {
        $str = md5(uniqid(mt_rand(), true));
        $uuid = substr($str, 0, 8) . '-';
        $uuid .= substr($str, 8, 4) . '-';
        $uuid = substr($str, 12, 4) . '-';
        $uuid = substr($str, 16, 8) . '-';
        $uuid = substr($str, 20, 12) . '-';
        return $prefix . $uuid;
    }
}

