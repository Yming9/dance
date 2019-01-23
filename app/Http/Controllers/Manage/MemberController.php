<?php

namespace App\Http\Controllers\Manage;

use App\Models\Giftlog;
use App\Models\Integral;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends BaseController
{
    /**
     * 用户列表
     */
    public function index(Request $request)
    {
        $where = [];
        if ($tmp = $request->get('name'))
            array_push($where, ['name', 'like', '%' . $tmp . '%']);
        $lists = Member::latest('id')->where($where)->paginate(10);
        return view('manage.member.index', compact('lists'));
    }

    //编辑
    public function edit($id)
    {
       $list = Member::find($id);
       $list->password = decrypt($list->password);
       return view('manage.member.edit',compact('list'));
    }

    //执行编辑
    public function update(Request $request , $id)
    {
        $member = Member::find($id);
        $args = $request->except(['_token','_method']);
        foreach($args as $key=>$ar)
        {
            if($key == 'password'){
                $member->$key = encrypt($request->get($key));
            }else{
                $member->$key = $request->get($key);
            }
        }
        if($member->save())
            return redirect('manage/member/index')->withSuccess('修改成功');
        return back()->withErrors('修改失败');
    }

    //删除
    public function destroy($id)
    {
        $member = Member::find($id);
        if($member->delete())
            return back()->withSuccess('删除成功');
        return back()->withErrors('删除失败');
    }

}
