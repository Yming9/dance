@extends('home.layouts.app')
@section('content')
    <div class="dasai_about">
        <div class="dasai_banner"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 common_tit">
                    <h2 style="color: #1a1a1a;" class="text-center">环球舞蹈挑战赛参赛流程</h2>
                </div>

                <div class="dasai_liuc">
                    <div class="col-xs-6 col-sm-6 lt">
                        <img src="{{url('images/home/dasai_liuc_01.png')}}" alt="" class="pull-right">
                    </div>
                    <div class="col-xs-6 col-sm-6">
                        <div class="txt_wrap">
                            <h4 class="col-sm-12">初赛（分赛区赛事）</h4>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 lt">
                        <div class="txt_wrap text-right">
                            <h4 class="col-sm-12">初赛（分赛区赛事）</h4>
                            <p class="col-sm-6 pull-right">根据时间情况决定是否举办，2019年3-5月将不举办，分赛区选拔完后在北京集训1周后直接去美国比赛</p>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 ">
                        <img src="{{url('images/home/dasai_liuc_02.png')}}" alt="" class="">
                    </div>

                    <div class="col-xs-6 col-sm-6 lt">
                        <img src="{{url('images/home/dasai_liuc_03.png')}}" alt="" class="pull-right">
                    </div>
                    <div class="col-xs-6 col-sm-6">
                        <div class="txt_wrap">
                            <h4 class="col-sm-12">国际赛（环球赛事）</h4>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="dasai_liuc_txt">
            <img src="{{url('images/home/index_types_bg.png')}}" alt="" class="auto_img">
            <div class="dasai_liuc_txt_top"></div>
            <div class="container">
                <div class="row dasai_liuc_txt_con">
                    <h2>第一阶段：初赛</h2>
                    <img src="{{url('images/home/dasai_flows.png')}}" alt="" class="auto_img">
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="footer_bg"  id="footer_backcolor" value="1">
@endsection