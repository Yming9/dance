<?php

namespace App\Http\Controllers\Manage;

use App\Models\Cate;
use App\Models\Register;
use Illuminate\Http\Request;

class CateController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $where = [];
        if( $catename = $request->get('catename'))
            array_push($where,['catename','like','%'.$catename.'%']);
        $lists = Cate::where($where)->orderBy('id','desc')->paginate(10);
        return view('manage.cate.index',compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.cate.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->get('catename'))
            return back()->withErrors('舞蹈类别名称不可以为空');
        $isCate = Cate::where('catename','=',$request->get('catename'))->first();
        if($isCate)
            return back()->withErrors('此舞蹈类别名称已经存在');
        $cate = new Cate();
        $cate->catename = $request->get('catename');
        if($cate->save())
            return redirect('/manage/cate')->withSuccess('添加舞蹈类别成功');
        return back()->withErrors('添加舞蹈类别失败');
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
        $info = Cate::find($id);
        return view('manage.cate.edit',compact('info'));
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
        if(!$catename = $request->get('catename'))
            return back()->withErrors('舞蹈类别不可以为空');
        $cate = Cate::find($id);
        $hasCate = Cate::where('catename','=',$catename)->where('catename','<>',$cate->catename)->first();
        if($hasCate)
            return back()->withErrors('舞蹈类别已经存在');
        $cate->catename = $catename;
        if($cate->save())
            return redirect('/manage/cate')->withSuccess('修改成功');
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
        $cate = Cate::find($id);
        $register = Register::where('cate_id',$id)->first();
        if($register)
            return back()->withErrors('该舞蹈类别下有报名人员不可以删除');
        if($cate->delete())
            return back()->withSuccess('删除成功');
        return back()->withErrors('删除失败');
    }
}
