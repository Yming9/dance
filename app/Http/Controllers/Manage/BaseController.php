<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Common\UploadController;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    use UploadController;
    public function __construct(Request $request)
    {
        # 获得Menus
        view()->share('menuLists', $this->getMenus());
    }

    /**
     * 获取菜单
     * @return mixed
     */
    protected function getMenus()
    {
        $lists = Menu::latest('sort')->get();
        $lists = recursive_child($lists);
        return $lists;
    }

    public function rollback($error = null, $url = null)
    {
        \DB::rollBack();
        session()->flash('error', $error ? $error : '操作失败');
        if ($url)
            return $url;
        return true;
    }

    public function success($info = null, $url = null)
    {
        session()->flash('success', $info ? $info : '操作成功');
        if ($url)
            return $url;
        return true;
    }

    public function saveModelReturnView($datas, $model, $url)
    {
        foreach ($datas as $key => $data) {
            $model->{$key} = $data;
        }
        if ($model->save())
            return redirect($url)->with('success', '操作成功');
        return back()->with('error', '操作失败');
    }

    public function handleFiles(Request $request)
    {
        $files = $request->file('image');
        $files = is_array($files) ? $files : [$files];
        $uploads = '';
        foreach($files as $file)
        {
            $fileName = time().str_random(5).'.jpg';
            try{
                $this->uploadFile($fileName,$file);
            }catch(\Exception $exception){
                throw new \Exception('上传图片失败');
            }
            $uploads = $uploads.$fileName.';';
        }
        return $uploads;
    }

}


