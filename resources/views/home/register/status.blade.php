@extends('home.layouts.app')
@section('content')
    <div class="baoming">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="status text-center">
                        <div class="" id="passed">
                            <div class="status_img">
                                <img src="{{url('images/home/bm_status_01.png')}}" alt="">
                            </div>
                            <h2>审核已通过，祝贺您报名成功</h2>
                            <div class="pay text-left col-sm-12 col-sm-offset-1">
                                <p class="col-sm-12 tit">在线缴费方式</p>
                                <div class="col-sm-6">
                                    <p>1、微信扫码转账</p>
                                    <div class="pay_img">
                                        {{--<img src="{{url('images/home/pay_wx.png')}}" alt="">--}}
                                        <h3><a href="{{url('/home/wechatpay/'.$id)}}" class="btn btn-success">点击微信扫码支付</a></h3>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <p>2、支付宝扫码转账</p>
                                    <div class="pay_img">
                                        {{--<img src="{{url('images/home/pay_zfb.png')}}" alt="">--}}
                                        <h3><a href="#" class="btn btn-primary">点击支付宝扫码支付</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="" id="passno">
                            <div class="status_img">
                                <img src="{{url('images/home/bm_status_02.png')}}" alt="">
                            </div>
                            <h2>抱歉，您的报名表未审核通过</h2>
                            <h3>请重新修改有效证件，参赛舞种等信息</h3>
                                <a href="{{url('home/register/edit/'.$id)}}" class="edit">修改报名表</a>
                        </div>
                        <div class="" id="passing">
                            <div class="status_img">
                                <img src="{{url('images/home/bm_status_03.png')}}" alt="">
                            </div>
                            <h2>报名表审核中</h2>
                            <h3>请耐心等待</h3>
                        </div>
                    </div>
                    <div class="text-center" style="padding: 3% 0;">
                        <a href="#" class="btn  btn-default" id="refresh"> 刷新 </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="pass" id="pass" value="{{$pass}}">
    <script>
        //style="display: block;"
        var pass = $("#pass").val();
        console.log(pass);
        if(pass == 1)
        {
            $("#passed").css('display','block');
        }else if(pass == 3){
            $("#passno").css('display','block');
        }else{
            $("#passing").css('display','block');
        }

        $("#refresh").click(function()
        {
            //刷新当前页面
            window.location.reload()
        })
    </script>
@endsection