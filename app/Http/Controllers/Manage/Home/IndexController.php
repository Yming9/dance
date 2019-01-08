<?php

namespace App\Http\Controllers\Manage\Home;

use App\Http\Controllers\Manage\BaseController;

class IndexController extends BaseController
{
    public function index()
    {
        $txt = env('APP_NAME');
        return view('manage/home/index')->with(compact('txt'));
    }
}
