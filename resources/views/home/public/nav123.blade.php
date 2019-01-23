<div class="header header_1 hidden-xs">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 sel_lang">
                    <a href="javascript:;" class="text-right pull-right">En/中文</a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">舞蹈官网</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="">
                        <a href="{{url('home/register')}}">在线报名</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            关于大赛
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{url('home/outline')}}">比赛概述</a>
                            </li>
                            <li>
                                <a href="{{url('/home/race')}}">比赛舞种</a>
                            </li>
                            <li>
                                <a href="{{url('home/rule_intro')}}">规则介绍</a>
                            </li>
                            <li>
                                <a href="{{url('home/award')}}">奖项设置</a>
                            </li>
                            <li>
                                <a href="{{url('/home/enter_demand')}}">参赛要求</a>
                            </li>
                        </ul>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="{{url('/home/judge')}}">专家评委</a>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="#">权威合作</a>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="#">赛事回顾</a>
                    </li>
                    <li>
                        <a href="#">商务合作</a>
                    </li>
                    <li>
                        <a href="#">联系我们</a>
                    </li>
                    @if(session()->get('member_id'))
                        <li>
                            <a href="#">{{session()->get('member_name')}}</a>
                        </li>
                        <li>
                            <a href="{{url('home/logout')}}">退出</a>
                        </li>
                    @else
                        <li>
                            <a href="{{url('home/page')}}">登录</a>
                        </li>
                        <li>
                            <a href="{{url('home/enroll')}}">注册</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>
<div class="header header_2 side_ing visible-xs">
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
                    <span class="sr-only">切换导航</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="javascript:;" class="glyphicon glyphicon-user hd_user"></a>
            </div>
            <div class="collapse navbar-collapse" id="example-navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="">
                        <a href="{{url('home/register')}}">在线报名</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            关于大赛
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{url('home/outline')}}">比赛概述</a>
                            </li>
                            <li>
                                <a href="{{url('/home/race')}}">比赛舞种</a>
                            </li>
                            <li>
                                <a href="{{url('home/rule_intro')}}">规则介绍</a>
                            </li>
                            <li>
                                <a href="{{url('/home/award')}}"> 奖项设置</a>
                            </li>
                            <li>
                                <a href="{{url('/home/enter_demand')}}">参赛要求</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{url('/home/judge')}}">专家评委</a>
                    </li>
                    <li>
                        <a href="#">权威合作</a>
                    </li>
                    <li>
                        <a href="#">赛事回顾</a>
                    </li>
                    <li>
                        <a href="#">商务合作</a>
                    </li>
                    <li>
                        <a href="#">联系我们</a>
                    </li>
                    @if(session()->get('member_id'))
                        <li class="none_bor">
                            <a href="#">{{session()->get('member_name')}}</a>
                        </li>
                        <li class="none_bor">
                            <a href="{{url('home/logout')}}" style="padding: 0  0 15px 15px;">退出</a>
                        </li>
                    @else
                        <li class="none_bor">
                            <a href="{{url('home/page')}}">登录</a>
                        </li>
                        <li class="none_bor">
                            <a href="{{url('home/enroll')}}" style="padding: 0  0 15px 15px;">注册</a>
                        </li>
                    @endif
                    <li class="none_bor">
                        <a href="#" style="padding: 0  0 15px 15px;">English</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>