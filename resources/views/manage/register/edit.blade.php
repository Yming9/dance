@extends('manage.layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            @include('manage.public.nav',['navs'=> [
               ['name' => '报名管理列表', 'url'=> '/manage/register'],
               ['name' => '修改报名信息', 'active'=> 'true'],
           ]])

            <div class="panel panel-info">
                <div class="panel-heading">修改报名信息</div>
                <div class="box-body">
                    {!! Form::model($info,['url' => '/manage/register/'.$info->id ,'method' => 'post', 'class'=> 'form-horizontal','enctype'=>'multipart/form-data']) !!}
                    {{method_field('PUT')}}

                    <div class="form-group ">
                        {!! Form::label('', '名字', ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-5">
                            {!! Form::text('name', $info->name , ['class' => 'form-control', 'rows'=>3, 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('', '赛区', ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-5">
                            <select name="zone_id" id="" class="form-control">
                                @foreach($zone as $zli)
                                    <option value="{{$zli->id}}" {{$zli->id == $info->zone_id ?'selected':''}}>{{$zli->zonename}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('', '类别', ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-5">
                            <select name="cate_id" id="" class="form-control">
                                @foreach($cate as $cli)
                                    <option value="{{$cli->id}}" {{$cli->id == $info->cate_id ?'selected':''}}>{{$cli->catename}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('', '舞种', ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-5">
                            <select name="cate_id" id="" class="form-control">
                                @foreach($race as $rli)
                                    <option value="{{$rli->id}}" {{$rli->id == $info->race_id ?'selected':''}}>{{$rli->racename}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group ">
                        {!! Form::label('', '年龄', ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-5">
                            {!! Form::text('age', $info->age , ['class' => 'form-control', 'rows'=>3, 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('', '性别', ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-5">
                            <input type="radio" name="sex" class="form-control" value="1" {{$info->sex == 1 ? 'checked':''}}>男
                            <input type="radio" name="sex" class="form-control" value="2" {{$info->sex == 2 ? 'checked':''}}>女
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('', '有效证件', ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-5">
                            {!! Form::text('valid_card', $info->valid_card , ['class' => 'form-control', 'rows'=>3, 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('', '手机号', ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-5">
                            {!! Form::text('phone', $info->phone , ['class' => 'form-control', 'rows'=>3, 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('', '邮箱', ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-5">
                            {!! Form::text('email', $info->email , ['class' => 'form-control', 'rows'=>3, 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('', '报名方式', ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-5">
                            <select name="sign_mode" id="" class="form-control">
                                <option value="1" >个人</option>
                                <option value="2" {{$info->sign_mode == 2 ?'selected':''}}>团体</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('', '是否报名大师课', ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-5">
                            <select name="be_master" id="" class="form-control">
                                <option value="0" >否</option>
                                <option value="1" {{$info->be_master == 1 ?'selected':''}}>是</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('', '报名状态', ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-5">
                            <select name="status" id="" class="form-control">
                                <option value="0" >未通过</option>
                                <option value="1" {{$info->status == 1 ?'selected':''}}>通过</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('', '作品', ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-5">
                            <input type="file" class="form-control" name="works" placeholder="请选择上传视频">
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="" class="control-label col-sm-2">团队信息:</label>
                        <div class="col-sm-offset-3" style="margin-bottom: 10px;">
                            <a href="javascript:;" class="btn btn-primary" id="" onclick="add(this)">添加团队成员</a>
                        </div>
                    </div>
                    <div id="infoWrap">
                        @if($info->team_msg)
                        @foreach($info->team_msg as $one)
                        <div class="form-group add_info_wrap">
                            <label for="" class="control-label col-sm-2">姓名</label>
                            <div class="col-sm-2">
                                <input class="form-control col-sm-1" required="" name="teamname[]" type="text" value="{{$one->teamname}}" onchange="newInp.change(this, 1)">
                            </div>

                            <label for="" class="control-label col-sm-2">年龄</label>
                            <div class="col-sm-2">
                                <input class="form-control col-sm-1" required="" name="teamage[]" type="text" value="{{$one->teamage}}" onchange="newInp.change(this, 2)">
                            </div>

                            <label for="" class="control-label col-sm-2">性别</label>
                            <div class="col-sm-2">
                                <input class="form-control col-sm-1" required="" name="teamsex[]" type="text" value="{{$one->teamsex}}" onchange="newInp.change(this, 3)">
                            </div>

                            <br><br>

                            <label for="" class="control-label col-sm-2">联系电话</label>
                            <div class="col-sm-2">
                                <input class="form-control col-sm-1" required="" name="teamphone[]" type="text" value="{{$one->teamphone}}" onchange="newInp.change(this, 4)">
                            </div>

                            <label for="" class="control-label col-sm-2">有效证件</label>
                            <div class="col-sm-4">
                                <input class="form-control col-sm-1" name="teamvalid[]" type="text" value="{{$one->teamvalid}}" onchange="newInp.change(this, 5)">
                            </div>
                            <div class="col-sm-12">
                                <a href="javascript:;" class="pull-right glyphicon glyphicon-trash" onclick="removeInfo(this)"></a>
                            </div>
                        </div>
                        @endforeach
                        @else

                            <div class="form-group add_info_wrap">
                                <label for="" class="control-label col-sm-2">姓名</label>
                                <div class="col-sm-2">
                                    <input class="form-control col-sm-1" required="" name="teamname[]" type="text" value="" onchange="newInp.change(this, 1)">
                                </div>

                                <label for="" class="control-label col-sm-2">年龄</label>
                                <div class="col-sm-2">
                                    <input class="form-control col-sm-1" required="" name="teamage[]" type="text" value="" onchange="newInp.change(this, 2)">
                                </div>

                                <label for="" class="control-label col-sm-2">性别</label>
                                <div class="col-sm-2">
                                    <input class="form-control col-sm-1" required="" name="teamsex[]" type="text" value="" onchange="newInp.change(this, 3)">
                                </div>

                                <br><br>

                                <label for="" class="control-label col-sm-2">联系电话</label>
                                <div class="col-sm-2">
                                    <input class="form-control col-sm-1" required="" name="teamphone[]" type="text" value="" onchange="newInp.change(this, 4)">
                                </div>

                                <label for="" class="control-label col-sm-2">有效证件</label>
                                <div class="col-sm-4">
                                    <input class="form-control col-sm-1" name="teamvalid[]" type="text" value="" onchange="newInp.change(this, 5)">
                                </div>
                                <div class="col-sm-12">
                                    <a href="javascript:;" class="pull-right glyphicon glyphicon-trash" onclick="removeInfo(this)"></a>
                                </div>
                            </div>
                        @endif
                    </div>


                    <div class="col-sm-offset-6" >
                        {!! Form::submit('保存', ['class' => 'btn btn-primary submit-button']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>

    <script>




        //添加成员信息
        function add(t) {
            for (var i=0; i < $(".add_info_wrap input").length; i++) {
                if($(".add_info_wrap").find("input").eq(i).val() == ""){
                    alert("队员信息不能为空")
                    return
                }
            }

            var newHtml = ` <div class="form-group add_info_wrap">
                                <label for="" class="control-label col-sm-2">姓名</label>
                                <div class="col-sm-2">
                                    <input class="form-control col-sm-1" required="" name="teamname[]" type="text" value="" onchange="newInp.change(this, 1)">
                                </div>

                                <label for="" class="control-label col-sm-2">年龄</label>
                                <div class="col-sm-2">
                                    <input class="form-control col-sm-1" required="" name="teamage[]" type="text" value="" onchange="newInp.change(this, 2)">
                                </div>

                                <label for="" class="control-label col-sm-2">性别</label>
                                <div class="col-sm-2">
                                    <input class="form-control col-sm-1" required="" name="teamsex[]" type="text" value="" onchange="newInp.change(this, 3)">
                                </div>

                                <br><br>

                                <label for="" class="control-label col-sm-2">联系电话</label>
                                <div class="col-sm-2">
                                    <input class="form-control col-sm-1" required="" name="teamphone[]" type="text" value="" onchange="newInp.change(this, 4)">
                                </div>

                                <label for="" class="control-label col-sm-2">有效证件</label>
                                <div class="col-sm-4">
                                    <input class="form-control col-sm-1" name="teamvalid[]" type="text" value="" onchange="newInp.change(this, 5)">
                                </div>
                                <div class="col-sm-12">
                                    <a href="javascript:;" class="pull-right glyphicon glyphicon-trash" onclick="removeInfo(this)"></a>
                                </div>
                            </div>`

            $("#infoWrap").append(newHtml)
        }
        //删除成员信息
        function removeInfo(t) {
            $(t).parents(".add_info_wrap").remove()
        }

    </script>
@endsection