<div class="footer two_footer" id="footer_background">
    <div class="container">
        <div class="row hidden-xs">
            <div class="col-sm-6 lt">
                <ul>
                    <li>
                        <p>ADRESS 地址</p>
                        <p>北京市昌平区北清路2号院园墅3006</p>
                    </li>
                    <li>
                        <p>TELEPHONE 电话</p>
                        <p>400－0920-616 </p>
                    </li>
                    <li>
                        <p>WENCHAT 微信</p>
                        <p>wx_id1233</p>
                    </li>
                </ul>
            </div>
            <div class="col-sm-6 rt">
                <ul class="row">
                    <li class="col-sm-offset-4">
                        <p class="tit">关注公众号：</p>
                    </li>
                    <li class="col-sm-4 col-sm-offset-4  text-center">
                        <img src="{{url('images/home/erm.png')}}" alt="报名咨询二维码">
                        <p>报名咨询</p>
                    </li>
                    <li class="col-sm-4  text-center">
                        <img src="{{url('images/home/erm.png')}}" alt="公众号二维码">
                        <p>公众号</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="text-center visible-xs">
            <p style="font-size: 12px;"> 2018©️版权所以，京ICP备
                <br>33309494号</p>
        </div>
    </div>
</div>
<!-- JavaScript 放置在文档最后面可以使页面加载速度更快 -->
<!-- 可选: 合并了 Bootstrap JavaScript 插件 -->
<script src="{{asset('dist')}}/bootstrap/js/bootstrap.min.js"></script>
<script src="{{asset('js')}}/home/main.js"></script>
<script>
    var fbg = $("#footer_backcolor").val();
    console.log(fbg);
    if(fbg == 1)
    {
        $("#footer_background").removeClass("two_footer");
    }
</script>