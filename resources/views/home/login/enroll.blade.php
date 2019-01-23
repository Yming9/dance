@extends('home.layouts.app')
@section('content')
    <div class="login register">
        <!-- <div class="main_bg"><img src="images/login_bg" alt=""></div> -->
        <div class="container">
            <div class="row mian">
                <div class="col-sm-6 hidden-xs">
                    <img src="{{url('images/home/login_left_bg.png')}}" alt="" class="auto_img">
                </div>
                <div class="col-sm-6 form_wrap">
                    <ul class="tabs row">
                        <li class="col-xs-6 col-sm-6 cur">
                            <a href="javascript:;">个人</a>
                        </li>
                        <li class="col-xs-6 col-sm-6">
                            <a href="javascript:;">机构</a>
                        </li>
                    </ul>
                    <div class="tab_con">
                        <form class="conts" style="display: block;" action="/home/do_enroll" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="is_personal" value="1">
                            <div class="row inp_wrap">
                                <label class="col-xs-4 col-sm-3">姓名</label>
                                <div class="inp col-xs-8 col-sm-9 ">
                                    <input type="text" name="name" placeholder="请输入" >
                                </div>
                            </div>
                            <div class="row inp_wrap">
                                <label class="col-xs-4 col-sm-3">密码</label>
                                <div class="inp col-xs-8 col-sm-9">
                                    <input type="password" name="password" placeholder="请输入" >
                                </div>
                            </div>
                            <div class="row inp_wrap">
                                <label class="col-xs-4 col-sm-3">确认密码</label>
                                <div class="inp col-xs-8 col-sm-9">
                                    <input type="password" name="surepass" placeholder="请输入" >
                                </div>
                            </div>
                            <div class="row inp_wrap">
                                <label class="col-xs-4 col-sm-3">有效证件</label>
                                <div class="inp col-xs-8 col-sm-9 ">
                                    <input type="text" name="valid_card"  placeholder="请输入" >
                                </div>
                            </div>
                            <div class="row inp_wrap">
                                <label class="col-xs-4 col-sm-3">联系电话</label>
                                <div class="inp col-xs-8 col-sm-9 ">
                                    <input type="text" name="phone" placeholder="请输入" >
                                </div>
                            </div>
                            <div class="row inp_wrap">
                                <label class="col-xs-4 col-sm-3">邮箱</label>
                                <div class="inp col-xs-8 col-sm-9 ">
                                    <input type="text" name="email" placeholder="请输入" >
                                </div>
                            </div>
                            <div class="row inp_wrap">
                                <label class="col-xs-4 col-sm-3">报名方式</label>
                                <div class="inp col-xs-8 col-sm-9" style="border: 0 none;">
                                    <div class='radio-check'>
                                        <input type='radio' name='sign_mode' id='radio1' value="1" checked/>
                                        <label for='radio1' class>个人</label>
                                    </div>
                                    <div class='radio-check'>
                                        <input type='radio' name='sign_mode' id='radio2' value="2"/>
                                        <label for='radio2' class>团体</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <button class="col-xs-12 col-sm-12 submit_btn">完成</button>
                            </div>
                        </form>
                        <form class="conts" action="/home/do_enroll" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="is_personal" value="2">
                            <div class="row inp_wrap">
                                <label class="col-xs-4 col-sm-3">机构名称</label>
                                <div class="inp col-xs-8 col-sm-9 ">
                                    <input type="text" name="agency" placeholder="请输入" required>
                                </div>
                            </div>
                            <div class="row inp_wrap">
                                <label class="col-xs-4 col-sm-3">联系人</label>
                                <div class="inp col-xs-8 col-sm-9 ">
                                    <input type="text" name="name" placeholder="请输入" required>
                                </div>
                            </div>
                            <div class="row inp_wrap">
                                <label class="col-sm-3">密码</label>
                                <div class="inp col-sm-9">
                                    <input type="password" name="password" placeholder="请输入" required>
                                </div>
                            </div>
                            <div class="row inp_wrap">
                                <label class="col-sm-3">确认密码</label>
                                <div class="inp col-sm-9">
                                    <input type="password" name="surepass" placeholder="请输入" required>
                                </div>
                            </div>
                            <div class="row inp_wrap">
                                <label class="col-xs-4 col-sm-3">有效证件</label>
                                <div class="inp col-xs-8 col-sm-9 ">
                                    <input type="text" name="valid_card" placeholder="请输入" required>
                                </div>
                            </div>
                            <div class="row inp_wrap">
                                <label class="col-xs-4 col-sm-3">联系电话</label>
                                <div class="inp col-xs-8 col-sm-9 ">
                                    <input type="text" name="phone" placeholder="请输入" required>
                                </div>
                            </div>
                            <div class="row inp_wrap">
                                <label class="col-xs-4 col-sm-3">报名方式</label>
                                <div class="inp col-xs-8 col-sm-9" style="border: 0 none;">
                                    <div class='radio-check'>
                                        <input type='radio' name='sign_mode' id='radio3' value="1" checked/>
                                        <label for='radio3' class>个人</label>
                                    </div>
                                    <div class='radio-check'>
                                        <input type='radio' name='sign_mode' id='radio4' value="2"/>
                                        <label for='radio4' class>团体</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row inp_wrap">
                                <label class="col-xs-4 col-sm-3">邮箱</label>
                                <div class="inp col-xs-8 col-sm-9 ">
                                    <input type="text" name="email" placeholder="请输入" required>
                                </div>
                            </div>
                            <div class="row">
                                <button class="col-xs-12 col-sm-12 submit_btn">完成</button>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-right tips">已有账号？
                            <a href="{{url('home/page')}}">立即登录</a>
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
