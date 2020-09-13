<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UploadsImgController extends Controller
{
    public function uploadImages(Request $request)
    {
        $file = $request->file('mypic');

        if (!empty($file)) {
            foreach ($file as $key => $value) {
                $len = $key;
            }
            if ($len > 25) {
                return response()->json(['ResultData' => 6, 'info' => '最多可以上传25张图片']);
            }
            $m = 0;
            $k = 0;
            for ($i = 0; $i <= $len; $i++) {
                $n = $i + 1;
                if ($file[$i]->isValid()) {
                    if (\in_array(\strtolower($file[$i]->extension()), ['jpeg', 'jpg', 'gif', 'gpeg', 'png'])) {
                        $picname = $file[$i]->getClientOriginalName();//获取上传图片名称
                        $ext = $file[$i]->getClientOriginalExtension();//获取上传图片后缀
                        $filename = time() . Str::random(6) . "." . $ext;
                        if ($file[$i]->move("uploads/images", $filename)) {
                            $newFilename = '/' . 'uploads/images' . '/' . $filename;
                            $m = $m + 1;
                        } else {
                            $k = $k + 1;
                        }
                        $msg = $m . "张图片上传成功" . $k . "张图片上传失败<br>";
                        $return[] = ['ResultData' => 0, 'info' => $msg, 'newFileName' => $newFilename];
                    } else {
                        return response()->json(['ResultData' => 3, 'info' => '第' . $n . '张图片后缀名不合法！<br/>' . '只支持jpeg/jpg/gif/gpeg/png格式']);
                    }
                } else {
                    return response()->json(['ResultData' => 1, 'info' => '第' . $n . '张图片超过最大限制！<br/>' . '只支持2M']);
                }
            }
        } else {
            return response()->json(['ResultData' => 5, 'info' => '请选择文件']);
        }
        return $return;

    }
}
