@extends('home.layouts.app')
@section('content')
    <div class="baoming">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                    <form id="form1" enctype="multipart/form-data" method="post" action="{{url('/home/register/add')}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="input-group input-group-lg col-xs-12 col-sm-12">
                            <label>姓名
                                <span style="color: #ff0000">*</span>
                            </label>
                            <input type="text" class="form-control" placeholder="姓名..例：张三" name="name" value="{{ old('name')}}">
                        </div>
                        <div class="input-group">
                            <label>性别
                                <span style="color: #ff0000">*</span>
                            </label>
                            <div class="">
                                <div class='radio-check'>
                                    <input type='radio' name='sex' id='radio1' value="1" checked/>
                                    <label for='radio1' class>男</label>
                                </div>
                                <div class='radio-check'>
                                    <input type='radio' name='sex' id='radio2' value="2"  {{old('sex') == 2?'checked':''}}/>
                                    <label for='radio2' class>女</label>
                                </div>
                            </div>
                        </div>

                        <div class="input-group input-group-lg col-xs-12 col-sm-12">
                            <label>生日（年月日）
                                <span style="color: #ff0000">*</span>
                            </label>
                            <input type="text" class="form-control" placeholder="请输入日期，如：1995-06-08" name="age" value="{{ old('age')}}">
                        </div>
                        <div class="input-group input-group-lg col-xs-12 col-sm-12">
                            <label>有效证件
                                <span style="color: #ff0000">*</span>
                            </label>
                            <input type="text" class="form-control" placeholder="请输入身份证号，如：150632199506082387" name="valid_card" value="{{ old('valid_card')}}">
                        </div>
                        <div class="input-group input-group-lg col-xs-12 col-sm-12">
                            <label>联系电话
                                <span style="color: #ff0000">*</span>
                            </label>
                            <input type="text" class="form-control" placeholder="请输入电话，如：13811218798" name="phone" value="{{ old('phone')}}">
                        </div>
                        <div class="input-group input-group-lg col-xs-12 col-sm-12">
                            <label>邮箱
                                <span style="color: #ff0000">*</span>
                            </label>
                            <input type="text" class="form-control" placeholder="请输邮箱，如123456@qq.com" name="email" value="{{ old('email')}}">
                        </div>
                        <div class="input-group">
                            <label>报名方式
                                <span style="color: #ff0000">*</span>
                            </label>
                            <div class="">
                                <div class='radio-check'>
                                    <input type='radio' name='sign_mode' id='radio5' value="1" checked/>
                                    <label for='radio5' class>个人</label>
                                </div>
                                <div class='radio-check'>
                                    <input type='radio' name='sign_mode' id='radio6' value="2" {{old('sign_mode')==2?'checked':''}}/>
                                    <label for='radio6' class>团体</label>
                                </div>
                            </div>
                        </div>
                        <div class="btn-group col-xs-12 col-sm-12">
                            <label>参赛赛区
                                <span style="color: #ff0000">*</span>
                            </label>
                            <button class="btn btn-default btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="txt">请选择</span>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                @foreach($zones as $item)
                                <li>
                                    <a href="javascript:;" onclick="showsSele(this)" data-name="zone_id" data-val="{{$item->id}}">{{$item->zonename}}</a>
                                </li>
                                @endforeach
                            </ul>
                            <input type="text" name="zone_id" hidden>

                        </div>
                        <div class="btn-group col-xs-12 col-sm-12">
                            <label>参赛类别
                                <span style="color: #ff0000">*</span>
                            </label>
                            <button class="btn btn-default btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="txt">请选择</span>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                @foreach($cates as $item)
                                <li>
                                    <a href="javascript:;" onclick="showsSele(this)"  data-name="cate_id" data-val="{{$item->id}}">{{$item->catename}}</a>
                                </li>
                                @endforeach
                            </ul>
                            <input type="text" name="cate_id" hidden>

                        </div>
                        <div class="input-group col-xs-12 col-sm-12" id="infoWrap">
                            <label>参赛队员信息
                                <span style="color: #ff0000">*</span>
                            </label>
                            <a href="javascript:;" class="pull-right glyphicon glyphicon-plus" style="padding-top: 5px;" onclick="addInfo(this)"></a>
                            <div class="add_info_wrap">
                                <div class="row">
                                    <div class="col-xs-4 col-sm-3">
                                        <input type="text" name="teamname[]"  placeholder="姓名：" value="">
                                    </div>
                                    <div class="col-xs-4 col-sm-2">
                                        <input type="text" name="teamage[]" placeholder="年龄：" value="">
                                    </div>
                                    <div class="col-xs-4 col-sm-2">
                                        <input type="text" name="teamsex[]" placeholder="性别：" value="">
                                    </div>
                                    <div class="col-xs-7 col-sm-3">
                                        <input type="text" name="teamphone[]" placeholder="联系电话：" value="">
                                    </div>
                                    <div class="col-xs-10 col-sm-4 last">
                                        <input type="text" name="teamvalid[]" placeholder="有效证件：" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btn-group col-xs-12 col-sm-12">
                            <label>参赛舞种
                                <span style="color: #ff0000">*</span>
                            </label>
                            <button class="btn btn-default btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="txt">请选择</span>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                @foreach($races as $item)
                                <li>
                                    <a href="javascript:;" onclick="showsSele(this)" data-name="race_id" data-val="{{$item->id}}">{{$item->racename}}</a>
                                </li>
                                @endforeach
                            </ul>
                            <input type="text" name="race_id" hidden>
                        </div>
                        <div class="input-group">
                            <label>参赛作品视频上传
                                <span style="color: #ff0000">*</span>
                            </label>
                            <div class="upload_video">
                                <img src="{{url('images/home/bm_icon_video.png')}}" alt="">
                                <p class="text-center" id="videoName" style="padding: 15px 0 0;display: none;"></p >
                                <input type="file" name="works" value="" id="videoFile" onchange="UpladFile()">
                            </div>
                        </div>
                        <div class="input-group">
                            <label>是否参加大师课
                                <span style="color: #ff0000">*</span>
                            </label>
                            <div class="">
                                <div class='radio-check'>
                                    <input type='radio' name='be_master' id='radio3' value="0" checked/>
                                    <label for='radio3' class>是</label>
                                </div>
                                <div class='radio-check'>
                                    <input type='radio' name='be_master' id='radio4' value="1" {{old('be_master')==1?'checked':''}}/>
                                    <label for='radio4' class>否</label>
                                </div>
                            </div>
                        </div>
                        <button href="javascript:;" class="submit_btn col-xs-5 col-xs-offset-4 col-sm-3 col-sm-offset-4" onclick="savaData()">提 交</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // 储存下拉框临时参数
        //var tempFormData = {};
        // 显示下拉框并赋值
        function showsSele(t) {
            var thisTxt = $(t).text()
            var thisName = $(t).attr("data-name")
            var thisVal = $(t).attr("data-val")
            $(t).parents(".dropdown-menu").siblings("button").children(".txt").text(thisTxt)
            $(t).parents(".dropdown-menu").siblings("input").val(thisVal)
            //tempFormData[thisName] = thisVal
        }
        //添加成员信息
        function addInfo(t) {
            for (var i=0; i < $(".add_info_wrap input").length; i++) {
                if($(".add_info_wrap").find("input").eq(i).val() == ""){
                    alert("队员信息不能为空")
                    return
                }
            }
            var newHtml = `<div class="add_info_wrap">
                                <div class="row">
                                    <div class="col-xs-4 col-sm-3">
                                        <input type="text" name="teamname[]" placeholder="姓名：">
                                    </div>
                                    <div class="col-xs-4 col-sm-2">
                                        <input type="text" name="teamage[]" placeholder="年龄：">
                                    </div>
                                    <div class="col-xs-4 col-sm-2">
                                        <input type="text" name="teamsex[]" placeholder="性别：">
                                    </div>
                                    <div class="col-xs-7 col-sm-3">
                                        <input type="text" name="teamphone[]" placeholder="联系电话：">
                                    </div>
                                    <div class="col-xs-10 col-sm-4 last">
                                        <input type="text" name="teamvalid[]" placeholder="有效证件：">
                                    </div>
                                </div>
                                <div class="row">
                                    <a href="javascript:;" class="pull-right glyphicon glyphicon-trash" onclick="removeInfo(this)"></a>
                                </div>
                            </div>`
            $("#infoWrap").append(newHtml)
        }
        //删除成员信息
        function removeInfo(t) {
            $(t).parents(".add_info_wrap").remove()
        }
        //获取文件对象名称
        function UpladFile() {
            var fileObj = document.getElementById("videoFile").files[0]; // js 获取文件对象
            if (fileObj.name) {
                console.log(fileObj.name.length)
                $("#videoName").show().text(fileObj.name);
            } else {
                alert("请选择文件");
            }
        }

    </script>
@endsection