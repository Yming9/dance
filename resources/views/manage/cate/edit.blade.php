@extends('manage.layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            @include('manage.public.nav',['navs'=> [
               ['name' => '舞蹈类别管理', 'url'=> '/manage/cate'],
               ['name' => '修改舞蹈类别', 'active'=> 'true'],
           ]])

            <div class="panel panel-info">
                <div class="panel-heading">修改舞蹈类别</div>
                <div class="box-body">
                    {!! Form::model($info,['url' => '/manage/cate/'.$info->id ,'method' => 'post', 'class'=> 'form-horizontal','enctype'=>'multipart/form-data']) !!}
                    {{method_field('PUT')}}

                    <div class="form-group ">
                        {!! Form::label('', '名字', ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-5">
                            {!! Form::text('catename', $info->catename , ['class' => 'form-control', 'rows'=>3, 'required']) !!}
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