<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Models\Zone;
use App\Models\Register;

class ZoneController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $where = [];
        if( $zonename = $request->get('zonename'))
            array_push($where,['zonename','like','%'.$zonename.'%']);
        $lists = Zone::where($where)->orderBy('id','desc')->paginate(10);
        return view('manage.zone.index',compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.zone.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->get('zonename'))
            return back()->withErrors('赛区名称不可以为空');
        $isZone = Zone::where('zonename','=',$request->get('zonename'))->first();
        if($isZone)
            return back()->withErrors('此赛区名称已经存在');
        $zone = new Zone();
        $zone->zonename = $request->get('zonename');
        if($zone->save())
            return redirect('/manage/zone')->withSuccess('添加赛区成功');
        return back()->withErrors('添加赛区失败');
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
        $info = Zone::find($id);
        return view('manage.zone.edit',compact('info'));
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
        if(!$zonename = $request->get('zonename'))
            return back()->withErrors('赛区不可以为空');
        $zone = Zone::find($id);
        $hasZone = Zone::where('zonename','=',$zonename)->where('zonename','<>',$zone->zonename)->first();
        if($hasZone)
            return back()->withErrors('赛区已经存在');
        $zone->zonename = $zonename;
        if($zone->save())
            return redirect('/manage/zone')->withSuccess('修改成功');
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
        $zone = Zone::find($id);
        $register = Register::where('zone_id',$id)->first();
        if($register)
            return back()->withErrors('该舞蹈类别下有报名人员不可以删除');
        if($zone->delete())
            return back()->withSuccess('删除成功');
        return back()->withErrors('删除失败');
    }
}
