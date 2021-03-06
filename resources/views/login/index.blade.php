﻿
<!DOCTYPE html>
<html>

  <head>
    <title>会员登录-六星教育</title>
    <meta name="keywords" content="六星教育" />
    <meta name="description" content="六星教育" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="shortcut  icon" type="image/x-icon" href="images/favicon.ico" media="screen" />
    <link rel="stylesheet" href="static/css/login_base.css">
    <link rel="stylesheet" href="static/css/login_wap.css">
    <link rel="stylesheet" type="text/css" href="static/css/font-awesome.css">
    <link rel="stylesheet" href="static/css/layer.css" id="layuicss-skinlayercss">
    <style>
      .footer {
          margin: 100px 0 0 0;
          padding: 0;
          min-height: 1px;
          text-align: center;
          line-height: 16px;
          background-color: #f8f8f8;
      }
      .ft-copyright {
      	padding: 50px 0 20px;
      	margin: 0 15px;
      	font-size: 12px;
      	background: url("static/images/logo_copy.png") no-repeat center 15px;
      	background-size: 110px 30px;
      }
      .ft-copyright a {
          padding-top: 45px;
          color: #ccc;
      }
    </style>
    <script src="static/js/showbox.js"></script>
    <script src="static/js/jquery.js"></script>
    <script type="text/javascript" src="static/js/layer.js"></script>
    <script type="text/javascript" src="static/js/jquery.js"></script>
    <script type="text/javascript">
      $(function() {
        $('.nk_cell').click(function() {
          if (!$(this).is('.active')) {
            $('.nk_cell').removeClass('active');
            $(this).addClass('active');
            var oDiv1 = $('#nk_text1');
            var oDiv2 = $('#nk_text2');
            if (oDiv1.css('display') == "block") {
              oDiv1.hide();
              oDiv2.show();
            } else {
              oDiv2.hide();
              oDiv1.show();
            }
          }
        });
        $('.right_login_user').click(function() {
          $("#username").val("");
        });
        $('.right_login_pass').click(function() {
          $("#password").val("");
          $("#password_mobile").val("");
        })
        $('.right_login_mobile').click(function() {
          $("#mobile").val("");
        })
      })

      function check() {

        var username = $("#username").val();
        var password = $("#password").val();
        if (username == '') {
          layer.msg('账号不能为空');
          return false;
        } else if (password == '') {
          layer.msg('密码不能为空');
          return false;
        }

        $.ajax({
          type: "post",
          url: "http://tp.23673.com/wap/Login/index",
          async: true,
          data: {
            "username": username,
            "password": password
          },
          success: function(data) {
            if (data["code"] > 0) {
              if (data["code"] == 1) {
                setTimeout(function() {
                  location.href = data['url']
                }, 1000);
              } else {
                setTimeout(function() {
                  location.href = "http://tp.23673.com/wap/member/index"
                }, 1000);
              }
            } else {
              layer.msg(data["message"]);
            }
          }
        });


      }

      //发送验证码
      function sendOutCode() {
        var mobile = $("#mobile").val();
        var vertification = $("#captcha").val();
        //验证手机号格式是否正确
        if (mobile.search(/^1(3|4|5|7|8)\d{9}$/) == -1) {
          $("#mobile").trigger("focus");
          layer.msg("请输入正确的手机格式");
          return false;
        }
        if (vertification == '') {
          $("#captcha").trigger("focus");
          layer.msg("请输入验证码");
          return false;
        }
        //验证手机号是否已经注册
        $.ajax({
          type: "post",
          url: "http://tp.23673.com/wap/login/checkMobileIsHas",
          data: {
            "mobile": mobile
          },
          async: false,
          success: function(data) {
            if (data == 0) {
              layer.msg("当前手机号还未注册");
              $("#mobile_is_has").val(0);
              return false;
            } else {
              $("#mobile_is_has").val(1);
              //判断输入的验证码是否正确
              $.ajax({
                type: "POST",
                url: "http://tp.23673.com/wap/Login/sendSmsRegisterCode",
                data: {
                  "mobile": mobile,
                  "vertification": vertification
                },
                success: function(data) {
                  if (data['code'] == '0') {
                    layer.msg("发送成功");
                    time();
                  } else {
                    layer.msg(data["message"]);
                    $(".verifyimg").attr("src", '/captcha.html');
                    return false;
                  }
                }
              });
            }
          }
        });
      }
      var wait = 120;

      function time() {
        if (wait == 0) {
          $("#sendOutCode").removeAttr("disabled");
          $("#sendOutCode").css("border", "1px solid #FF5073");
          $("#sendOutCode").css("color", "#ff6a88");
          $("#sendOutCode").val("获取验证码");
          wait = 120;
        } else {
          $("#sendOutCode").attr("disabled", 'disabled');
          $("#sendOutCode").css("border", "1px solid #ccc");
          $("#sendOutCode").css("color", "#ccc");
          $("#sendOutCode").val(wait + "s后重新发送");
          wait--;
          setTimeout(function() {
              time()
            },
            1000)
        }
      }

      function check_mobile() {
        var mobile = $("#mobile").val();
        var captcha = $("#captcha").val();
        var sms_captcha = $("#sms_captcha").val();
        var mobile_is_has = $("#mobile_is_has").val();
        if (mobile == '') {
          $("#mobile").trigger("focus");
          layer.msg('手机号不能为空');
          return false;
        } else if (mobile.search(/^1(3|4|5|7|8)\d{9}$/) == -1) {
          $("#mobile").trigger("focus");
          layer.msg('请输入正确的手机格式');
          return false;
        } else if (mobile_is_has == 0) {
          layer.msg('当前手机号还未注册');
          return false;
        } else if (captcha == '') {
          layer.msg('验证码不能为空');
          return false;
        } else if (sms_captcha == '') {
          layer.msg('动态码不能为空');
          return false;
        }
        $.ajax({
          type: "post",
          url: "http://tp.23673.com/wap/Login/index",
          async: true,
          data: {
            "mobile": mobile,
            "sms_captcha": sms_captcha
          },
          success: function(data) {
            if (data["code"] > 0) {
              if (data["code"] == 1) {
                setTimeout(function() {
                  location.href = data['url']
                }, 1000);
              } else {
                setTimeout(function() {
                  location.href = "http://tp.23673.com/wap/member/index"
                }, 1000);
              }
            } else if (data["code"] == -10) {
              layer.msg("动态码错误");
            } else {
              layer.msg(data["message"]);
            }
          }
        });
      }
    </script>
    <style>
      .login_wei_three{
      	margin: 1rem 42.5%;
      }
      .verify{width:30%;float:right;height:36px;line-height:34px;padding-right:7px;}
      #sendOutCode{
      	  border: 1px solid #FF5073;
          padding: 4px 7px;
          color: #FF6A88;
          font-weight: bold;
          float: right;
          margin: 4px;
          border-radius: 4px;
        	webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        	width:30%;
        	background:#fff;
      }
    </style>
  </head>
  <body>
    <div class="nk_logo">
      <img src="static/picture/login.png" />
    </div>
    <div class="nk_top">
      <div class="nk_cell active">
        账号登录
      </div>
      <div class="nk_cell">
        手机动态码登录
      </div>
    </div>
    <div class="log-wp">
      <div class="log-box">
        <div id="nk_text1" style="display: block;">
          <div class="log-cont">
            <label class="log-txt" for="username">账号&nbsp;&nbsp;&nbsp;&nbsp;<input class="" type="text" name="username" id="username" placeholder="请输入账号"> <i class="right_login_user"> </i>
            </label>
          </div>
          <div class="log-cont">
            <label for="password">密码&nbsp;&nbsp;&nbsp;&nbsp;<input class="" type="password" name="password" id="password" placeholder="请输入密码"> <i class="right_login_pass"> </i>
            </label>
          </div>
          <button id="login-button" class="lang-btn" onclick="check()">登录</button>
          <div class="msg cl">
            <a class="y" href="http://tp.23673.com/wap/login/register">立即注册</a>
          </div>
        </div>
        <div id="nk_text2" style="display: none;">
          <div class="nk-cont">
            <label> 手机号&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="mobile" name="mobile" placeholder="请输入手机号码"> <i class="right_login_mobile"> </i>
            </label>
          </div>
          <div class="nk-cont">
            <label> 验证码&nbsp;&nbsp;&nbsp;&nbsp;<input class="" type="text" id="captcha" name="captcha" placeholder="请输入验证码">
              <div class="verify"><img class="verifyimg" src="static/picture/captcha.html" onclick="this.src='/captcha.html'" alt="captcha" style="vertical-align: middle; cursor: pointer; height: 35px;width:30%;" /></div>
            </label>
          </div>
          <div class="nk-cont">
            <label>动态码&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="sms_captcha" name="sms_captcha" placeholder="请输入动态码">
              <!-- 							<a href="javascript:;" id="sendOutCode" onclick="sendOutCode()">获取动态码</a>  -->
              <input type="button" id="sendOutCode" onclick="sendOutCode()" value="获取动态码">
            </label>
          </div>
          <input type="hidden" id="mobile_is_has" value="1">
          <button id="login-button" class="lang-btn" onclick="check_mobile()">登录</button>
          <div class="msg cl">
            <!-- 						<a class="y" href="http://tp.23673.com/wap/login/reg">忘记密码？</a> -->
            <a class="y" href="http://tp.23673.com/wap/login/register">立即注册</a>
          </div>
        </div>
        <img src="static/picture/assistant_member.png" style="width: 80% !important;margin-left: 10%;margin-top: 25px;" />
        <div style="margin: 0 10%;">
          <div class="login_wei_two">
            <a href="http://tp.23673.com/wap/login/oauthlogin?type=QQLOGIN">
              <img src="static/picture/qq.png" />
              <span>QQ</span>
            </a>
          </div>
          <div class="login_wei_two">
            <a href="{{route('Login.WeChat')}}">
              <img src="static/picture/weixin.png" />
              <span>微信</span>
            </a>
          </div>
          <div class="login_wei_two" style="display: none;">
            <a href="http://tp.23673.com/wap/login/wchatOauth">
              <img src="static/picture/weibo.png" />
              <span>微博</span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="footer" style="min-height: 86px;">
      <div class="copyright">
        <div class="ft-copyright">
          <a href="javascript:;" target="_blank">六星开源商城提供技术支持</a>
        </div>
      </div>
    </div>
  </body>
</html>
