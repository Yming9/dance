<?php

namespace App\Http\Controllers\Home;

use App\Models\Member;
use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Encryption\Encrypter;

class LoginController extends BaseController
{
    //返回登录的页面
    public function page()
    {
        return view('home.login.login');
    }

    //执行登录
    public function login(Request $request)
    {
        $phone = $request->get('phone');
        $password = $request->get('password');
        if(!$phone || !$password)
            return back()->withInput()->withErrors('请填写写完整的登录信息');
        //验证时候存在此用户
        $member = Member::where('phone','=',$phone)->first();
        //判断用户时候存在
        if(!$member)
            return back()->withInput()->withErrors('此手机号不存在，请先注册');
        //区分机构和个人
       if($request->get('is_single') == 2)
       {
           if(!$member->institution)
               return back()->withInput()->withErrors('此机构不存在');
       }else{
           if($member->institution)
               return back()->withInput()->withErrors('非个人账号');
       }
       //判断密码
        if($password !== decrypt($member->password))
            return back()->withInput()->withErrors('密码不正确');
        //想session中添加member_id和member表的name
        session()->put('member_id',$member->id);
        session()->put('member_name',$member->name);
        return redirect('/home/index');
    }

    //执行退出
    public function logout()
    {
        session()->forget('member_id');
        session()->forget('member_name');
        return redirect('home/page');
    }

    //返回注册页面
    public function enroll()
    {
        return view('home.login.enroll');
    }

    //执行注册动作
    public function doEnroll(Request $request)
    {
        //验证提交过来的数据
        $this->verify($request);
        //判断密码是否一致
        if($request->get('password') !== $request->get('surepass'))
            return back()->withInput()->withErrors('两次密码不一致');
        $member = new Member();
        $phone = $member->where('phone','=',$request->get('phone'))->first();
        if($phone)
            return back()->withInput()->withErrors('该手机号已经存在');
        //判断是机构还是个人
        if($request->get('is_personal') == 2)
        {
            if(!$request->get('agency'))
                return back()->withInput()->withErrors('机构名称不能为空');
            $member->agency = $request->get('agency');
        }
        //赋值
        $args = ['name','password','valid_card','phone','email','sign_mode'];
        foreach($args as $arg)
        {
            $member->$arg = $request->get($arg);
            if($arg = 'password')
                $member->$arg = encrypt($request->get($arg));
        }
        if($member->save())
            return redirect('home/page')->withInput()->withSuccess('注册成功');
        return back()->withInput()->withErrors('注册失败');
    }

    //执行注册的表单验证
    public function verify(Request $request)
    {
        $this -> validate($request,[
            'name' => 'required',
            'password' => 'required|max:32|min:6',
            'surepass' => 'required',
            'valid_card' => ['required','max:18','regex:/(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/'],
            'phone' => 'required|max:13|regex:/^[1][3,4,5,7,8,9][0-9]{9}$/',
            'email' => 'required|email',
            'sign_mode' => 'required',
        ],[
            'name.required' => '姓名不能为空',
            'password.required' => '密码不能为空',
            'surepass.required' => '确认密码不能为空',
            'password.max' => '密码不能大于32位',
            'password.min' => '密码不能小于6位',
            'valid_card.required' => '有效证件不能为空',
            'valid_card.regex' => '有效证件格式不正确',
            'phone.required' => '手机号不能为空',
            'phone.regex' => '手机格式不正确',
            'email.email' => '邮箱格式不正确',
            'email.required' => '邮箱不能为空',
            'sign_mode.required' => '报名方式不能为空',
        ]);
    }
}
