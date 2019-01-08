<?php

namespace App\Http\Controllers\Manage;

use App\Http\Requests\Manage\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends BaseController
{
    //用户列表页
    public function index(Request $request){
    	$where = [];
    	if($tmpInput = $request->get('name'));
    	 array_push($where, ['name', 'like', '%' . $tmpInput . '%']);
        if ($tmpInput = $request->get('openid'))
            array_push($where, ['openid', 'like', '%' . $tmpInput . '%']);
    	$lists = User::latest('id')->where($where)->paginate(10);
    	return view('manage.users.index',['lists'=>$lists]);
    }

    /**
     * 显示
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $info = User::findOrFail($id);

        return view('manage.users.show', compact('info'));
    }

    /**
     * 用户登陆
     */
    function login(Request $request)
    {
        $info = User::where(['phone' => $request->get('name')])->first();
        if($info) {
            $auth = false;
            if($info->password == '') {
                if($request->get('password') == substr($request->get('name'), -6))
                    $auth = true;
            } else {
                if($request->get('password') == decrypt($info->password))
                    $auth = true;
            }
            if($auth) {
                auth()->login($info, true);

                return redirect('/manage');
            }
        }

        return back()->withInput()->withErrors(['用户名或密码错误']);
    }
    /**
     * 登陆页面
     */
    public function loginPage()
    {
        return view('manage.users.login');
    }

    public function loginOut(Request $request)
    {
        auth()->logout();

        return view('manage.users.login');
    }
}
