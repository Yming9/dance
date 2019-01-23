@extends('home.layouts.app')
@section('content')

    <div class="login">
        <!-- <div class="main_bg"><img src="images/login_bg" alt=""></div> -->
        <div class="container">
            <div class="row mian">
                <div class="hidden-xs col-sm-7">
                    <img src="{{url('images/home/login_left_bg.png')}}" alt="" class="auto_img">
                </div>
                <div class="col-xs-12 col-sm-5 form_wrap">
                    <ul class="tabs row">
                        <li class="col-xs-6 col-sm-6 cur">
                            <a href="javascript:;">个人</a>
                        </li>
                        <li class="col-xs-6 col-sm-6">
                            <a href="javascript:;">机构</a>
                        </li>
                    </ul>
                    <div class="tab_con">
                        <form class="conts" action="/home/login" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="is_single" value="2">
                            <div class="row inp_wrap">
                                <div class="inp col-xs-12 col-sm-12 col-sm-12">
                                    <span class="icon icon_mine">
                                        <img src="{{url('images/home/login_icon_mine.png')}}" alt="">
                                    </span>
                                    <input type="text" name="phone" placeholder="请输入机构联系人手机号">
                                </div>
                            </div>
                            <div class="row inp_wrap">
                                <div class="inp col-xs-12 col-sm-12 col-sm-12">
                                    <span class="icon icon_pass">
                                        <img src="{{url('images/home/login_icon_pass.png')}}" alt="">
                                    </span>
                                    <input type="password" name="password" placeholder="请输入账户密码">
                                </div>
                            </div>
                            <div class="row">
                                <button class="col-xs-12 col-sm-12 submit_btn">登录</button>
                            </div>
                        </form>
                            <form class="conts" action="/home/login" method="post" style="display: block;">
                                {{csrf_field()}}
                                <input type="hidden" name="is_single" value="1">
                            <div class="row inp_wrap">
                                <div class="inp col-xs-12 col-sm-12">
                                    <span class="icon icon_mine">
                                        <img src="{{url('images/home/login_icon_mine.png')}}" alt="">
                                    </span>
                                    <input type="text" name="phone" placeholder="请输入手机号">
                                </div>
                            </div>
                            <div class="row inp_wrap">
                                <div class="inp col-xs-12 col-sm-12">
                                    <span class="icon icon_pass">
                                        <img src="{{url('images/home/login_icon_pass.png')}}" alt="">
                                    </span>
                                    <input type="password" name="password" placeholder="请输入账户密码">
                                </div>
                            </div>
                            <div class="row">
                                <button class="col-xs-12 col-sm-12 submit_btn">登录</button>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-right tips">没有账号？
                            <a href="{{url('/home/enroll')}}">立即注册</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        $(".tabs > li").on("click", function () {
            var idx = $(this).index()
            $(this).addClass("cur").siblings().removeClass("cur")
            $(".tab_con > .conts").eq(idx).show().siblings().hide()
        })
    </script>
@endsection