@extends('home.layouts.app')
@section('content')
    <div class="dasai_about">
        <div class="dasai_banner">
            <div class="container visible-xs">
                <div class="row">
                    <div class="col-sm-12 text-center common_tit">
                        <h2>环球舞蹈挑战赛</h2>
                        <h3>参赛舞种</h3>
                        <p class="text-left">如果报名参赛类别中报名作品个数少于3个，那么此舞蹈教室的舞蹈在特定年龄类别中可能会与其他舞种进行比赛，按比赛名次分数来排列名次，名次可空缺。</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container hidden-xs">
            <div class="row">
                <div class="col-sm-12 text-center common_tit">
                    <h2>环球舞蹈挑战赛</h2>
                    <h3>参赛舞种</h3>
                    <p class="text-left">如果报名参赛类别中报名作品个数少于3个，那么此舞蹈教室的舞蹈在特定年龄类别中可能会与其他舞种进行比赛，按比赛名次分数来排列名次，名次可空缺。</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row text-center dasai_wuz_intro">
                <dl class="col-xs-6 col-sm-4">
                    <dt>独舞</dt>
                    <dd>1人</dd>
                </dl>
                <dl class="col-xs-6 col-sm-4">
                    <dt>双人/三人舞</dt>
                    <dd>2-3人</dd>
                </dl>
                <dl class="col-xs-6 col-sm-4">
                    <dt>小型集体舞</dt>
                    <dd>4-9人</dd>
                </dl>
                <dl class="col-xs-6 col-sm-4">
                    <dt>舞剧</dt>
                    <dd>必须长4-8分钟</dd>
                </dl>
                <dl class="col-xs-6 col-sm-4">
                    <dt>大型集体舞</dt>
                    <dd>10-19人</dd>
                </dl>
                <dl class="col-xs-6 col-sm-4">
                    <dt>超大型集体舞</dt>
                    <dd>20名及以上</dd>
                </dl>
            </div>
        </div>
        <div class="types">
            <ul class="items">
                <li class="col-xs-6 col-sm-3">
                    <a href="javascript:;">
                        <img src="{{url('images/home/detail_types_01.png')}}" alt="">
                        <div class="mask">
                            <div class="cover"></div>
                            <p class="txt">爵士舞</p>
                        </div>
                    </a>
                </li>
                <li class="col-xs-6 col-sm-3">
                    <a href="javascript:;">
                        <img src="{{url('images/home/detail_types_02.png')}}" alt="">
                        <div class="mask">
                            <div class="cover"></div>
                            <p class="txt">Hip-pop</p>
                        </div>
                    </a>
                </li>
                <li class="col-xs-6 col-sm-3">
                    <a href="javascript:;">
                        <img src="{{url('images/home/detail_types_03.png')}}" alt="">
                        <div class="mask">
                            <div class="cover"></div>
                            <p class="txt">踢踏舞</p>
                        </div>
                    </a>
                </li>
                <li class="col-xs-6 col-sm-3">
                    <a href="javascript:;">
                        <img src="{{url('images/home/detail_types_04.png')}}" alt="">
                        <div class="mask">
                            <div class="cover"></div>
                            <p class="txt">芭蕾</p>
                        </div>
                    </a>
                </li>
                <li class="col-xs-6 col-sm-3">
                    <a href="javascript:;">
                        <img src="{{url('images/home/detail_types_05.png')}}" alt="">
                        <div class="mask">
                            <div class="cover"></div>
                            <p class="txt">名族舞</p>
                        </div>
                    </a>
                </li>
                <li class="col-xs-6 col-sm-3">
                    <a href="javascript:;">
                        <img src="{{url('images/home/detail_types_06.png')}}" alt="">
                        <div class="mask">
                            <div class="cover"></div>
                            <p class="txt">舞剧</p>
                        </div>
                    </a>
                </li>
                <li class="col-xs-6 col-sm-3">
                    <a href="javascript:;">
                        <img src="{{url('images/home/detail_types_07.png')}}" alt="">
                        <div class="mask">
                            <div class="cover"></div>
                            <p class="txt">足尖</p>
                        </div>
                    </a>
                </li>
                <li class="col-xs-6 col-sm-3">
                    <a href="javascript:;">
                        <img src="{{url('images/home/detail_types_08.png')}}" alt="">
                        <div class="mask">
                            <div class="cover"></div>
                            <p class="txt">开放式舞蹈</p>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
        <div class="dasai_types_rule" id="guize">
            <div class="tit">规则介绍</div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 rule_txt">
                        <h2>一、时间限制</h2>
                        <p>独舞、双人舞/三人舞、小团体：3分钟；
                            <br>大团体：4分钟；
                            <br>群舞：5分钟；
                            <br>舞剧：8分钟。
                            <br>对于小团体、大团体、群舞和舞剧，延长的时间最多为1分钟。</p>
                        <br>
                        <h2>二、评分标准</h2>
                        <p>评分标准主要以舞蹈的编排、舞蹈的整齐度、团队的协作动作的表现力、参赛服装的搭配、音乐的选用、艺术表演形式、表演技术及技术难度为评分标准。总分10分，评委打分精确到0.01分，参赛者最终得分为评委的平均分。</p>
                        <br>
                        <h2 style="font-size: 20px;">评分细则：</h2>
                        <p>艺术编排及表现力40%=满分4分
                            <br>艺术编排及表现力40%=满分4分
                            <br>呈现时的干净程度30% =满分3分
                        </p>
                        <br>
                        <h2>三、评委设置</h2>
                        <p>评委构成：均为舞蹈行业专家及历年参与舞蹈大赛评委团体；
                            <br>评委构成：均为舞蹈行业专家及历年参与舞蹈大赛评委团体；
                            <br>评委公布：为保证比赛的“公平”性原则，2019年评委团将于比赛前一周进行官网公布，届时请浏览官方网站。</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="dasai_banner sub min"></div>
        <div>
        </div>
        <div class="dasai_types_rule mask_rule" id="jiangxiang">
            <div class="container">
                <div class="row">
                    <div class="rule_txt">
                        <h1 class="maskrule_tit">奖项设置</h1>
                        <h2>一、对于参赛选手</h2>
                        <h2 style="font-size: 20px;">为鼓励广大舞蹈爱好者积极参与舞蹈赛事，同时体现组委会对于参赛者的认可，设立独舞、双人舞、三人舞项目组、小团体、大团体、群舞和舞剧项目组，每个项目组分设：</h2>
                        <br>
                        <p>1、创作表演一等奖（白金）一名，二等奖（高金）一名，三等奖（金）一名，荣获奖杯及获奖证书；
                            <br>2、每个项目组前十名将颁发获奖证书；
                            <br>3、每一位参赛者都将获得一个定制的胸针作为奖励；
                            <br>4、针对所有作品根据分数进行大排名，分别设创作表演一等奖一名；二等奖二名；三等奖三名，获奖杯及获奖证书；
                            <br>5、并根据实际情况，设置若干特殊奖项：优秀创作奖优秀表演奖、优秀娱乐奖、优秀道具奖、优秀感染力奖、最佳服装奖等；
                            <br>6、获得项目组前十名参赛选手可顺利晋级，参加全国舞蹈大赛。
                        </p>
                        <br>
                        <h2>二、对于参赛工作室</h2>
                        <p>1、荣获创作表演一等奖、二等奖、三等奖的参赛选手的工作室将分别获得由组委会颁发的舞蹈工作室创作表演一等奖、二等奖、三等奖奖杯及获奖证书；
                            <br>2、总排名项目组获得一等奖、二等奖、三等奖的参赛选手的工作室将分别获得由组委会颁发的舞蹈工作室创作表演一等奖、二等奖、三等奖奖杯及获奖证书；
                            <br>3、获得总排名一等奖、二等奖、三等奖的舞蹈工作室将获得现金奖励，分别为10000元、5000元及3000元；
                            <br>4、并根据实际情况，设置若干优秀编导奖、优秀教师奖等
                            <br>5、参加演出的每一个工作室都将获得一张美丽的纪念海报。
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="footer_backcolor" value="1">
@endsection