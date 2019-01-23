@extends('manage.layouts.app')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            @include('manage.public.nav',['navs'=> [
               ['name' => '用户列表', 'active'=> 'true'],
           ]])
            <div class="panel panel-info">
                <div class="panel-heading">筛选</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" id="search">
                        <div class="form-group">
                            <label class="col-md-1 control-label">名称</label>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="name"
                                       value="{{ \Illuminate\Support\Facades\Input::get('name') }}"/>
                            </div>
                            <div class="col-md-offset-1 col-md-2">
                                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> 确定
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <div class="panel panel-info panel-table">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <th>名字</th>
                            <th>机构名称</th>
                            <th>手机号</th>
                            <th>密码</th>
                            <th>邮箱</th>
                            <th>有效证件</th>
                            <th>报名方式</th>
                            <th>操作</th>
                        </tr>
                        @foreach($lists as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->agency }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ decrypt($item->password) }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->valid_card }}</td>
                                <td > <span class="label {{$item->signCss[$item->sign_mode]}}">{{ $item->signText[$item->sign_mode]  }}</span></td>
                                <td>
                                   {{-- <input type="text" class="form-control " value="" style="width: 100px;float: left;">
                                    <button class="form-control integral" style="width: 100px;float: left;" data-id="{{ $item->id }}">添加积分</button>--}}
                                    <a href="{{ url('/manage/member/index/'.$item->id.'/edit/') }}" class="btn btn-default">修改</a>
                                    <a href="{{ url('/manage/member/index/'.$item->id) }}" class="btn btn-default delete">删除</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{ $lists->appends(request()->all())->links() }}
                </div>
            </div>
        </div>
    </div>
    {{ csrf_field() }}
    <script>
        // 手动添加积分
        $('.integral').click(function () {
            var member_id = $(this).attr('data-id');
            var _token = $('input[name="_token"]').val();
            var integral = $(this).prev('input').val();
            if(!confirm('您确定要给该用户添加'+integral+'积分吗？')){
                return false;
            }
            $.ajax({
                url:'addIntegral',
                data:{_token:_token,num:integral,member_id:member_id},
                type:'post',
                dataType:'json',
                success:function(res){
                    if(res.code == 100){
                        window.location.reload();
                        return false;
                    }
                    alert(res.msg);
                }
            })
        })

    </script>
@endsection