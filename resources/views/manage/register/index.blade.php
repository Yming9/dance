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
                            <th>赛区</th>
                            <th>类别</th>
                            <th>舞种</th>
                            <th>名字</th>
                            <th>年龄</th>
                            <th>性别</th>
                            <th>有效证件</th>
                            <th>手机号</th>
                            <th>邮箱</th>
                            <th>报名方式</th>
                            <th>作品</th>
                            <th>是否报名大师课</th>
                            <th>报名状态</th>
                            <th>是否支付</th>
                            <th>支付方式</th>
                            <th>报名时间</th>
                            <th>操作</th>
                        </tr>
                        @foreach($lists as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->zone?$item->zone->zonename:'' }}</td>
                                <td>{{ $item->cate?$item->cate->catename:'' }}</td>
                                <td>{{ $item->race?$item->race->racename:''}}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->age }}</td>
                                <td><span class="label {{ $item->sexCss[$item->sex] }}">{{ $item->sexText[$item->sex] }}</span></td>
                                <td>{{ $item->valid_card }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->email }}</td>
                                <td><span class="label {{ $item->signCss[$item->sign_mode] }}">{{ $item->signText[$item->sign_mode] }}</span></td>
                                <td>{{ $item->works }}</td>
                                <td><span class="label {{ $item->masterCss[$item->be_master] }}">{{ $item->masterText[$item->be_master] }}</span></td>
                                <td><span class="label {{ $item->statusCss[$item->status] }}">{{ $item->statusText[$item->status] }}</span></td>
                                <td><span class="label {{ $item->payCss[$item->be_pay] }}">{{ $item->payText[$item->be_pay] }}</span></td>
                                @if($item->pay_way)
                                    <td><span class="label {{ $item->wayCss[$item->pay_way] }}">{{ $item->wayText[$item->pay_way] }}</span></td>
                                @else
                                    <td></td>
                                @endif
                                <td>{{ $item->signed_at }}</td>

                                <td>
                                    <a href="{{ url('/manage/register/'.$item->id.'/edit/') }}" class="btn btn-success">修改</a>
                                    <a href="{{ url('/manage/register/'.$item->id) }}" class="btn btn-default delete">删除</a>
                                    <a href="{{ url('/manage/register/status/'.$item->id) }}" class="btn btn-primary">通过审核</a>
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