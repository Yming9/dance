<?php

namespace App\Http\Controllers\Manage;

use App\Models\Cate;
use App\Models\Race;
use App\Models\Zone;
use Illuminate\Http\Request;
use App\Models\Register;
use App\Http\Controllers\Common\UploadFileController;
class RegisterController extends BaseController
{

    public function index(Request $request)
    {
        $where = [];
        if ($tmp = $request->get('name'))
            array_push($where, ['name', 'like', '%' . $tmp . '%']);
        $lists = Register::with('member')->with('cate')->with('zone')->with('race')->latest('id')->where($where)->paginate(10);
        return view('manage.register.index',compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = Register::with('cate')->with('race')->with('zone')->find($id);
        $cate = Cate::get(['id','catename']);
        $race = Race::get(['id','racename']);
        $zone = Zone::get(['id','zonename']);
        $info->team_msg = json_decode($info->team_msg);
        return view('manage.register.edit',compact('info','cate','race','zone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $register = Register::find($id);
        $args = ['name','zone_id','cate_id','race_id','age','sex','valid_card','phone','email','sign_mode','be_master','status'];
        foreach($args as $ar)
        {
            $register->$ar = $request->get($ar);
        }
        //编辑团队成员的信息
        $teamname = $request->get('teamname');
        $teamage = $request->get('teamage');
        $teamsex = $request->get('teamsex');
        $teamphone = $request->get('teamphone');
        $teamvalid = $request->get('teamvalid');
        if($teamage && $teamname && $teamphone && $teamsex && $teamvalid)
        {
            $team = [];
            for ($i=0;$i<count($teamname);$i++)
            {
                array_push($team,['teamname'=>$teamname[$i],'teamage'=>$teamage[$i],'teamsex'=>$teamsex[$i],'teamphone'=>$teamphone[$i],'teamvalid'=>$teamvalid[$i]]);
            }
            $register->team_msg = json_encode($team);
        }
        //引入上传类
        $up = new UploadFileController ();
        $file = $_FILES['works'];
        if($request->file('works'))
        {
            //删除原有的视频
            if($register->works)
            {
                $up->delfile($register->member_id,$register->works);
            }
            //上传视频
            $works = $up->upfile($file,$register->member_id);
            if(!$works['errno'] == 1)
                return back()->withErrors('作品上传失败');
            $register->works = $works['filename'];
        }

        if($register->save())
            return redirect('manage/register')->withSuccess('修改成功');
        return back()->withErrors('修改失败');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $register = Register::find($id);
        //删除原有视频作品
        $up = new UploadFileController();
        $up->delfile($register->member_id,$register->works);
        if($register->delete())
            return back()->withSuccess('删除成功');
        return back()->withErrors('删除失败');
    }

    public function status($id)
    {
      $register = Register::find($id);
      if(!$register)
          return back()->withInput()->withErrors('获取信息失败');
      $register->status = 1;
      if($register->save())
          return back()->withInput()->withSuccess('审核通过');
      return back()->withInput()->withErrors('审核未通过');
    }
}
