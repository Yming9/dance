@extends('manage.layouts.app')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            @include('manage.public.nav',['navs'=> [
               ['name' => '系统配置', 'active'=> 'true'],
           ]])
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading"><h4>系统配置</h4></div>
                <div class="box-body">
                    {!! Form::open(['url' => '/manage/config/save' ,'method' => 'post', 'class'=> 'form-horizontal','enctype'=>'multipart/form-data']) !!}
                    <div class="form-group ">
                        {!! Form::label('', '小程序appid', ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-5">
                            {!! Form::text('appid', $info->get('appid'), ['class' => 'form-control', 'rows'=>3, 'placeholder' => '小程序appid']) !!}
                        </div>
                    </div>
                    <div class="form-group ">
                        {!! Form::label('', '小程序secret', ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-5">
                            {!! Form::text('secret', $info->get('secret'), ['class' => 'form-control', 'rows'=>3, 'placeholder' => '小程序secret']) !!}
                        </div>
                    </div>
                    <div class="form-group ">
                        {!! Form::label('', '公众号appid', ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-5">
                            {!! Form::text('appid2', $info->get('appid2'), ['class' => 'form-control', 'rows'=>3, 'required', 'placeholder' => '公众号appid']) !!}
                        </div>
                    </div>
                    <div class="form-group ">
                        {!! Form::label('', '公众号secret', ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-5">
                            {!! Form::text('secret2', $info->get('secret2'), ['class' => 'form-control', 'rows'=>3, 'required', 'placeholder' => '公众号secret']) !!}
                        </div>
                    </div>
                    <div class="form-group ">
                        {!! Form::label('', '分享标题', ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-5">
                            {!! Form::text('share_title', $info->get('share_title'), ['class' => 'form-control', 'rows'=>3, 'required', 'placeholder' => '分享标题']) !!}
                        </div>
                    </div>
                    <div class="form-group ">
                        {!! Form::label('', '分享描述', ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-5">
                            {!! Form::text('share_desc', $info->get('share_desc'), ['class' => 'form-control', 'rows'=>3, 'required', 'placeholder' => '分享描述']) !!}
                        </div>
                    </div>
                    <div class="form-group ">
                        {!! Form::label('', '分享图片', ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-5">
                            {!! Form::file('share_img', null, ['class' => 'form-control', 'rows'=>3, 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group ">
                        {!! Form::label('', '图片展示', ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-5">
                            <img src="{{ resource_url($info->get('share_img')) }}" alt="" style="width: 100px;height: 100px;" class="images">
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