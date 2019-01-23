<?php
namespace App\Http\Controllers\Common;
class UploadFileController
{
    //$upfile = $_FILES['upfile'];
    function upfile($files,$memberid)
    {
        $path = public_path("video/works/");
        $redioExt=['mp4','rmvb','mpg','m4v','flv','3gp','avi','mkv','wmv'];
        // 判断错误号
        if (@$files['error'] == 00) {
            // 判断文件类型
            $ext = strtolower(pathinfo(@$files['name'],PATHINFO_EXTENSION));
            if (!in_array($ext,$redioExt)){
                return ['errno'=>3,'msg'=>"非法文件类型"];
            }
            // 判断是否存在上传到的目录
            if (!is_dir($path)){
                mkdir($path,0777,true);
            }
            if (!is_dir($path . $memberid.'/')) {
                mkdir($path . $memberid.'/', 0777, true);
            }
            // 生成唯一的文件名
            $fileName = md5(uniqid(microtime(true),true)).'.'.$ext;
            // 将文件名拼接到指定的目录下
            $destName = $path.$memberid."/".$fileName;
            // 进行文件移动
            if (!move_uploaded_file($files['tmp_name'],$destName)){
                return ['errno'=>2,'msg'=>'视频上传失败'];
            }
            return ['errno'=>1,'filename'=>$fileName];
        } else {
            // 根据错误号返回提示信息
            return ['errno'=>@$files['error']];
        }
    }

    public function delfile($memberid,$filename)
    {
        $file = public_path('video/works/' .$memberid. '/' . $filename);
        if (is_file($file)) {
            unlink($file);
        }
    }
}