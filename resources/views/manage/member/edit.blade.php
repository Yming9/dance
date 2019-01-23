@extends('manage.layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            @include('manage.public.nav',['navs'=> [
               ['name' => '用户列表', 'url'=> '/manage/member/index'],
               ['name' => '修改用户信息', 'active'=> 'true'],
           ]])

            <div class="panel panel-info">
                <div class="panel-heading">修改用户信息</div>
                <div class="box-body">
                    {!! Form::model($list,['url' => '/manage/member/index/'.$list->id ,'method' => 'post', 'class'=> 'form-horizontal','enctype'=>'multipart/form-data']) !!}
                    {{method_field('PUT')}}

                    <div class="form-group ">
                        {!! Form::label('', '名字', ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-5">
                            {!! Form::text('name', null , ['class' => 'form-control', 'rows'=>3, 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('', '机构名称', ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-5">
                            {!! Form::text('agency', null , ['class' => 'form-control', 'rows'=>3, 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('', '手机号', ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-5">
                            {!! Form::text('phone', null, ['class' => 'form-control', 'rows'=>3, 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('', '密码', ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-5">
                            {!! Form::text('password', null, ['class' => 'form-control', 'rows'=>3, 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('', '邮箱', ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-5">
                            {!! Form::text('email', null , ['class' => 'form-control', 'rows'=>3, 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('', '有效证件', ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-5">
                            {!! Form::text('valid_card', null , ['class' => 'form-control', 'rows'=>3, 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('', '报名方式', ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-5">
                            <select name="sign_mode" id="" class="form-control">
                                <option value="1" >个人</option>
                                <option value="2" {{$list->sign_mode == 2 ?'selected':''}}>团体</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-offset-6" >
                        {!! Form::submit('保存', ['class' => 'btn btn-primary submit-button']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
@endsection