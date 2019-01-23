<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>舞蹈官网</title>
    <link rel="icon" type="image/x-icon" href="{{asset('images')}}/home/wudao.ico"/>
    <!-- 包含头部信息用于适应不同设备 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 包含 bootstrap 样式表 -->
    <link rel="stylesheet" href="{{asset('dist')}}/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('css')}}/home/reset.css">
    <link rel="stylesheet" href="{{asset('css')}}/home/style.css">
    <!-- 可选: 包含 jQuery 库 -->
    <script src="{{asset('js')}}/home/jquery.min.js"></script>

</head>
<body>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@yield('script')




