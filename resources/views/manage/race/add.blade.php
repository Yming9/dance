@extends('manage.layouts.app')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            @include('manage.public.nav',['navs'=> [
               ['name' => '舞种管理', 'url' => 'manage/race/'],
               ['name' => '舞种添加', 'active' => 'true'],
           ]])
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading"><h4>舞种添加</h4></div>
                <div class="box-body">
                    {!! Form::open(['url' => '/manage/race' ,'method' => 'post', 'class'=> 'form-horizontal','enctype'=>'multipart/form-data']) !!}

                    <div class="form-group ">
                        {!! Form::label('', '舞种名称:', ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-5">
                            {!! Form::text('racename', '', ['class' => 'form-control col-sm-2','required']) !!}
                        </div>
                    </div>

                    <div class="col-sm-offset-6">
                        {!! Form::submit('保存', ['class' => 'btn btn-primary submit-button']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
@endsection