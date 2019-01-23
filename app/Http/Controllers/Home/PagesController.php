<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

class PagesController extends BaseController
{
    //比赛要求
    public function enterDemand()
    {
        return view('home.about_game/enter_demand');
    }

    //比赛概述
    public function outline()
    {
        return view('home.about_game.outline');
    }

    //比赛舞种
    public function race()
    {
        return view('home.about_game.race');
    }

    //规则介绍
    public function ruleIntro()
    {
        return view('home.about_game.race');
    }

    //奖项设置
    public function award()
    {
        return view('home.about_game.race');
    }

    //专家评委
    public function judge()
    {
        return view('home.judge.index');
    }

    //权威合作
    public function authority()
    {
        return view('home.authority.index');
    }

    //赛事回顾
    public function lookback()
    {
        return view('home.lookback.index');
    }

    //商务合作
    public function business()
    {
        return view('home.business.index');
    }

    //联系我们
    public function callme()
    {
        return view('home.callme.index');
    }

}
