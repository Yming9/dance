<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Models\Race;
use App\Models\Register;

class RaceController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $where = [];
        if( $racename = $request->get('racename'))
            array_push($where,['racename','like','%'.$racename.'%']);
        $lists = Race::where($where)->orderBy('id','desc')->paginate(10);
        return view('manage.race.index',compact('lists'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.race.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->get('racename'))
            return back()->withErrors('舞种名称不可以为空');
        $isRace = Race::where('racename','=',$request->get('racename'))->first();
        if($isRace)
            return back()->withErrors('此舞种名称已经存在');
        $race = new Race();
        $race->racename = $request->get('racename');
        if($race->save())
            return redirect('/manage/race')->withSuccess('添加舞种成功');
        return back()->withErrors('添加舞种失败');
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
        $info = Race::find($id);
        return view('manage.race.edit',compact('info'));
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
        if(!$racename = $request->get('racename'))
            return back()->withErrors('舞蹈类别不可以为空');
        $race = Race::find($id);
        $hasRace = Race::where('racename','=',$racename)->where('racename','<>',$race->racename)->first();
        if($hasRace)
            return back()->withErrors('舞蹈类别已经存在');
        $race->racename = $racename;
        if($race->save())
            return redirect('/manage/race')->withSuccess('修改成功');
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
        $race = Race::find($id);
        $register = Register::where('race_id',$id)->first();
        if($register)
            return back()->withErrors('该舞蹈类别下有报名人员不可以删除');
        if($race->delete())
            return back()->withSuccess('删除成功');
        return back()->withErrors('删除失败');
    }
}
