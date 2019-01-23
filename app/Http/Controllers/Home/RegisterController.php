<?php

namespace App\Http\Controllers\Home;

use App\Models\Cate;
use App\Models\Register;
use Illuminate\Http\Request;
use App\Models\Zone;
use App\Models\Race;
use App\Http\Controllers\Common\UploadFileController;

class RegisterController extends BaseController
{
    public function index()
    {
        $member_id = session()->get('member_id');
        if(!$member_id)
            return redirect('/home/page')->withInput()->withErrors('请您先登录');
        $register  = Register::where('member_id','=',$member_id)->first();
        if($register && !$register->status)
            return redirect('/home/register/status/'.$register->id);
        if($register && !$register->be_pay)
            return redirect('/home/register/status/'.$register->id);
        $cates = Cate::get(['id','catename']);
        $zones = Zone::get(['id','zonename']);
        $races = Race::get(['id','racename']);
        return view('home.register.index',compact('cates','zones','races'));
    }

    /* public function registerCreate(Request $request)
     {
         $data = $request->except('_token');
         $works = $request->file('works');
         return $works;
     }*/

    public function add(Request $request)
    {
        $member_id = session()->get('member_id');
        if(!$member_id)
            return redirect('/home/page')->withInput()->withErrors('请您先登录');
        //表单验证
        $this->verify($request);
        $register = new Register();
        $insert = [];
        $insert['member_id'] = $member_id;
        $args = ['name','sex','age','valid_card','phone','email','sign_mode','be_master','cate_id','zone_id','race_id'];
        foreach($args as $arg)
        {
            $insert[$arg] = $request->get($arg);
        }
        //验证团队信息
        $teamname = $request->get('teamname');
        $teamage = $request->get('teamage');
        $teamsex = $request->get('teamsex');
        $teamphone = $request->get('teamphone');
        $teamvalid = $request->get('teamvalid');
        if($teamname && $teamsex && $teamage && $teamphone && $teamvalid)
        {
            if(is_array($teamname)){
                $res = $this->makeTeam($teamname,$teamsex,$teamage,$teamphone,$teamvalid);
                if($res['err'] !== 1)
                    return back()->withInput()->withErrors($res['msg']);
            }
            $insert['team_msg'] = json_encode($res['team'],true);
        }else if(!$teamname && !$teamsex && !$teamage && !$teamphone && !$teamvalid){
        }else {
            return back()->withInput()->withErrors('请填写完整的团队成员信息');
        }
        //引入上传类
        $up = new UploadFileController ();
        $file = $_FILES['works'];
        if($request->file('works'))
        {
            //上传视频
            $works = $up->upfile($file,$member_id);
            if($works['errno'] !== 1)
                return back()->withErrors('作品上传失败');
            $insert['works'] = $works['filename'];
        }
        $insert['created_at'] = date('Y-m-d H:i:s',time());
        $insert['status'] = 2;
         $id = Register::insertGetId($insert);
        if($id)
            return redirect('/home/register/status/'.$id)->withInput()->withSuccess('报名审核中');
        return back()->withInput()->withErrors('报名失败');
    }

    public function status($id)
    {
        //$pass = 1/2/3;1->通过审核支付  2->审核中  3:->未通过审核
        $register = Register::find($id);
        $pass = 2;
        if($register && !$register->status)
            $pass = 3 ;//未通过审核
        if($register && $register->status == 1  && !$register->be_pay)
            $pass = 1 ;//通过审核未支付

        return view('home.register.status',compact('pass','id'));
    }

    public function edit($id)
    {
        $info = Register::find($id);
        $zones = Zone::get();
        $cates = Cate::get();
        $races = Race::get();
        $zoneInfo = Zone::find($info->zone_id);
        $cateInfo = Cate::find($info->cate_id);
        $raceInfo = Race::find($info->race_id);
        $info->team_msg = json_decode($info->team_msg,true);
        return view('home.register.edit',compact('info','zones','cates','races','cateInfo','zoneInfo','raceInfo'));
    }

    public function update(Request $request , $id)
    {
        $member_id = session()->get('member_id');
        //表单验证
        $this->verify($request);
        $register = Register::find($id);
        $args = ['name','sex','age','valid_card','phone','email','sign_mode','be_master','cate_id','zone_id','race_id'];
        foreach($args as $arg)
        {
            $register->$arg = $request->get($arg);
        }
        //验证团队信息
        $teamname = $request->get('teamname');
        $teamage = $request->get('teamage');
        $teamsex = $request->get('teamsex');
        $teamphone = $request->get('teamphone');
        $teamvalid = $request->get('teamvalid');
        if($teamname && $teamsex && $teamage && $teamphone && $teamvalid)
        {
            if(is_array($teamname)){
                $res = $this->makeTeam($teamname,$teamsex,$teamage,$teamphone,$teamvalid);
                if($res['err'] !== 1)
                    return back()->withInput()->withErrors($res['msg']);
            }
            $register->team_msg = json_encode($res['team'],true);
        }else if(!$teamname && !$teamsex && !$teamage && !$teamphone && !$teamvalid){
        }else {
            return back()->withInput()->withErrors('请填写完整的团队成员信息');
        }
        //引入上传类
        $up = new UploadFileController ();
        $file = $_FILES['works'];
        if($request->file('works'))
        {
            //删除原有的视频
            $res = $up->delfile($member_id,$register->works);
            //上传视频
            $works = $up->upfile($file,$member_id);
            if($works['errno'] !== 1)
                return back()->withErrors('作品上传失败');
            $register->works = $works['filename'];
        }
        $register->created_at = date('Y-m-d H:i:s',time());
        $register->status = 2;
        if($register->save())
            return redirect('/home/register/status/'.$id)->withInput()->withSuccess('报名修改成功');
        return back()->withInput()->withErrors('报名修改失败');


    }
    //add方法的表单验证
    public function verify(Request $request)
    {
        $this -> validate($request,[
            'name' => 'required',
            'sex' => 'required',
            'age' => 'required',
            'cate_id'=>'required',
            'zone_id'=>'required',
            'race_id'=>'required',
            'valid_card' => ['required','max:18','regex:/(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/'],
            'phone' => 'required|max:13|regex:/^[1][3,4,5,7,8,9][0-9]{9}$/',
            'email' => 'required|email',
            'sign_mode' => 'required',
        ],[
            'name.required' => '姓名不能为空',
            'sex.required' => '性别不能为空',
            'age.required' => '年龄不能为空',
            'cate_id.required' => '类别不能为空',
            'race_id.required' => '舞种不能为空',
            'zone_id.required' => '赛区不能为空',
            'valid_card.required' => '有效证件不能为空',
            'valid_card.regex' => '有效证件格式不正确',
            'phone.required' => '手机号不能为空',
            'phone.regex' => '手机格式不正确',
            'email.email' => '邮箱格式不正确',
            'email.required' => '邮箱不能为空',
            'sign_mode.required' => '报名方式不能为空',
        ]);
    }

    //处理团队成员的信息
    public function makeTeam( array $teamname , array $teamsex ,array $teamage , array $teamphone , array $teamvalid)
    {
        $team = [];
        for($i=0 ; $i<count($teamname);$i++)
        {
            //空值判断
            if(!$teamname[$i])
                return ['err'=>2,'msg'=>'团队成员的名字不可以为空','team'=>''];
            if(!$teamage[$i])
                return ['err'=>3,'msg'=>'团队成员的年龄不可以为空','team'=>''];
            if(!$teamsex[$i])
                return ['err'=>4,'msg'=>'团队成员的性别不可以为空','team'=>''];
            if(!$teamphone[$i])
                return ['err'=>5,'msg'=>'团队成员的手机号不可以为空','team'=>''];
            if(!$teamvalid[$i])
                return ['err'=>6,'msg'=>'团队成员的有效身份证号不可以为空','team'=>''];
            //格式判断
            if(strlen($teamname[$i])>128)
                return ['err'=>7,'msg'=>'团队成员的名字长度太大','team'=>''];
            $sex = ['男','男士','女','女士','male','man','boy','lady','madam','Ms','female','woman','girl','daughter','frail'];
            if(!in_array($teamsex[$i],$sex))
                return ['err'=>8,'msg'=>'团队成员的性别格式不正确','team'=>''];
            $ageStr = '/^[0-9]*$/';
            if(!preg_match($ageStr,$teamage[$i]))
                return ['err'=>9,'msg'=>'团队成员的年龄格式不正确','team'=>''];
            $validStr = '/(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/';
            if(!preg_match($validStr,$teamvalid[$i]))
                return ['err'=>10,'msg'=>'团队成员的有效身份证格式不正确','team'=>''];
            $phoneStr  = '/^[1][3,4,5,7,8,9][0-9]{9}$/';
            if(!preg_match($phoneStr,$teamphone[$i]))
                return ['err'=>11,'msg'=>'团队成员的手机号格式不正确','team'=>''];
            array_push($team,['teamname'=>$teamname[$i],'teamage'=>$teamage[$i],'teamsex'=>$teamsex[$i],'teamphone'=>$teamphone[$i],'teamvalid'=>$teamvalid[$i]]);
        }
        return ['err'=>1,'msg'=>'ok!!!','team'=>$team];
    }
}
