<?php

namespace App\Http\Controllers\Manage;

use App\Models\Config;
use Illuminate\Http\Request;

class ConfigController extends BaseController
{
    ## 配置项
    public function index()
    {
        $info = Config::first();
        $info = collect($info);
        return view('manage.config.index', compact('info'));
    }

    ## 保存配置项
    public function save(Request $request)
    {
        $data = ['appid', 'secret', 'share_title', 'share_desc', 'appid2', 'secret2'];
        $configIns = Config::first();
        if(!$configIns){
            $configIns = new Config();
        }
        foreach ($data as $k => $v) {
            $configIns->$v = $request->get($v);
        }
        if($img = $request->file('share_img')){
            $fileName = time() . rand(10000, 99999) . '.jpg';
            $this->uploadFile($fileName, $img);
            $configIns->share_img = $fileName;
        }
        if($configIns->save()){
            return redirect('manage/config/index')->with('success', '保存成功');
        }
        return redirect('manage/config/index')->with('error', '保存失败');
    }

}
