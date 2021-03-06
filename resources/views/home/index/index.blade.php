@extends('home.layouts.app')
@section('content')
    <div class="index">
        <div class="banner">
            <img src="{{url('images/home/index_banner_01.png')}}" alt="" class="auto_img">
        </div>
        <div class="intro">
            <div class="intro-top">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <h2>环球舞蹈大赛</h2>
                            <p class="text-left">环球舞蹈大赛本着"公平、公正、公开"的原则，面向全国舞蹈工作室的广大舞蹈爱好者，为我们的明日之星搭建自我展示的平台。通过参与环球舞蹈大赛，展示仙女和王子们的舞蹈成果....</p>
                            <a href="javascript:;" class="open" onclick="openIntro(this)">
                                <span class="txt">展开</span>
                                <span class="glyphicon glyphicon-menu-down"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="intro-bot">
                <div class="container">
                    <div class="row">
                        <a href="javascript:;" class="col-xs-12 col-sm-4 items">
                            <div class="img_box">
                                <img src="{{url('images/home/index_intro_01.png')}}" alt="">
                            </div>
                            <ul class="mask">
                                <li>
                                    <div class="icon_box">
                                        <img src="{{url('images/home/index_intro_04.png')}}" alt="">
                                    </div>
                                </li>
                                <li>参赛要求</li>
                                <li>Entry Requirements</li>
                                <li class="hidden-xs">查看详情></li>
                            </ul>
                        </a>
                        <a href="javascript:;" class="col-xs-12 col-sm-4 items">
                            <div class="img_box">
                                <img src="{{url('images/home/index_intro_02.png')}}" alt="">
                            </div>
                            <ul class="mask">
                                <li>
                                    <div class="icon_box">
                                        <img src="{{url('images/home/index_intro_05.png')}}" alt="">
                                    </div>
                                </li>
                                <li>参赛要求</li>
                                <li>Entry Requirements</li>
                                <li class="hidden-xs">查看详情></li>
                            </ul>
                        </a>
                        <a href="javascript:;" class="col-xs-12 col-sm-4 items">
                            <div class="img_box">
                                <img src="{{url('images/home/index_intro_03.png')}}" alt="">
                            </div>
                            <ul class="mask">
                                <li>
                                    <div class="icon_box">
                                        <img src="{{url('images/home/index_intro_06.png')}}" alt="">
                                    </div>
                                </li>
                                <li>参赛要求</li>
                                <li>Entry Requirements</li>
                                <li class="hidden-xs">查看详情></li>
                            </ul>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{url('images/home/index_types_bg.png')}}" alt="" class="auto_img">
        <div class="types">
            <div class="container">
                <div class="row">
                    <div class="tit text-center">
                        <h2>参赛舞种</h2>
                        <p>Types of dance</p>
                    </div>
                    <ul class="items">
                        <li class="col-xs-6 col-sm-4">
                            <a href="javascript:;">
                                <img src="{{url('images/home/index_types_01.png')}}" alt="">
                                <div class="mask">
                                    <div class="cover"></div>
                                    <p class="txt">爵士舞</p>
                                </div>
                            </a>
                        </li>
                        <li class="col-xs-6 col-sm-4">
                            <a href="javascript:;">
                                <img src="{{url('images/home/index_types_02.png')}}" alt="">
                                <div class="mask">
                                    <div class="cover"></div>
                                    <p class="txt">Hip-pop</p>
                                </div>
                            </a>
                        </li>
                        <li class="col-xs-6 col-sm-4">
                            <a href="javascript:;">
                                <img src="{{url('images/home/index_types_03.png')}}" alt="">
                                <div class="mask">
                                    <div class="cover"></div>
                                    <p class="txt">踢踏舞</p>
                                </div>
                            </a>
                        </li>
                        <li class="col-xs-6 col-sm-4">
                            <a href="javascript:;">
                                <img src="{{url('images/home/index_types_04.png')}}" alt="">
                                <div class="mask">
                                    <div class="cover"></div>
                                    <p class="txt">芭蕾</p>
                                </div>
                            </a>
                        </li>
                        <li class="col-xs-6 col-sm-4">
                            <a href="javascript:;">
                                <img src="{{url('images/home/index_types_05.png')}}" alt="">
                                <div class="mask">
                                    <div class="cover"></div>
                                    <p class="txt">名族舞</p>
                                </div>
                            </a>
                        </li>
                        <li class="col-xs-6 col-sm-4">
                            <a href="javascript:;">
                                <img src="{{url('images/home/index_types_06.png')}}" alt="">
                                <div class="mask">
                                    <div class="cover"></div>
                                    <p class="txt">查看更多>></p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="footer_bg" id="footer_backcolor" value="1">
    <script>
        $("#header_one").removeClass('side_ing');
        $("#nav_bar").addClass('navbar-fixed-top');
        var openStatus = true,
            initIntro = '环球舞蹈大赛本着"公平、公正、公开"的原则，面向全国舞蹈工作室的广大舞蹈爱好者，为我们的明日之星搭建自我展示的平台。通过参与环球舞蹈大赛，展示仙女和王子们的舞蹈成果....';
        function openIntro(t) {
            if (openStatus) {
                openStatus = false
                $(t).siblings("p").text('环球舞蹈大赛本着"公平、公正、公开"的原则，面向全国舞蹈工作室的广大舞蹈爱好者，为我们的明日之星搭建自我展示的平台。通过参与环球舞蹈大赛，展示仙女和王子们的舞蹈成果，提高每一位参赛者的自信心及团队凝聚力，丰富家庭精神生活，并且提高广大舞蹈工作室的国际知名度。')
                $(t).children(".txt").text("收起")
                $(t).children(".glyphicon").attr("class", "glyphicon glyphicon-menu-up")
            } else {
                openStatus = true
                $(t).siblings("p").text(initIntro)
                $(t).children(".txt").text("展开")
                $(t).children(".glyphicon").attr("class", "glyphicon glyphicon-menu-down")
            }
        }
        $(window).scroll(function () {
            let bannerH = $(".banner").height(),
                headerH = $(".header_1 .navbar").height(),
                windowTop = $(window).scrollTop();
            // console.log(headerH)
            // console.log(bannerH)
            // console.log(windowTop)
            if (windowTop <= (bannerH - headerH)) {
                $(".header_1").removeClass("side_ing")
            } else {
                $(".header_1").addClass("side_ing")
            }
        });
    </script>
@endsection