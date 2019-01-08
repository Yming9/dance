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
        if ($tmpInput = $request->get('nickname'))
            array_push($where, ['nickname', 'like', '%' . $tmpInput . '%']);

        $lists = Member::latest('id')->where($where)->paginate(10);
        return view('manage.member.index', compact('lists'));
    }

}
