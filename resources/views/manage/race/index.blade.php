@extends('manage.layouts.app')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            @include('manage.public.nav',['navs'=> [
               ['name' => '舞种管理', 'active'=> 'true'],
               ['name'=>'舞种添加','url'=>'/manage/race/create']
           ]])
            <div class="panel panel-info">
                <div class="panel-heading">筛选</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" id="search">
                        <div class="form-group">
                            <label class="col-md-1 control-label">名称</label>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="racename"
                                       value="{{ \Illuminate\Support\Facades\Input::get('racename') }}"/>
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
                            <th>操作</th>
                        </tr>
                        @foreach($lists as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->racename }}</td>
                                <td>
                                    <a href="{{ url('/manage/race/'.$item->id.'/edit/') }}" class="btn btn-default">修改</a>
                                    <a href="{{ url('/manage/race/'.$item->id) }}" class="btn btn-default delete">删除</a>
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