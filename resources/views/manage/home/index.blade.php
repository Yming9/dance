@extends('manage.layouts.app')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            @include('manage.public.nav',['navs'=> [
               ['name' => '首页', 'active'=> 'true'],
           ]])
            {{ env('APP_NAME') }}
        </div>
    </div>
@endsection