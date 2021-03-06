@extends('home.layouts.app')
@section('content')
    <style>
        body {
            background: #f7f7fa;
        }

        @media (max-width: 768px) {
            body {
                background: #fff;
            }
        }
    </style>
    <div class="rater">

        <div class="dasai_banner sub">
            <div class="container visible-xs">
                <div class="row">
                    <div class="col-sm-12 text-center common_tit">
                        <h2>环球舞蹈挑战赛</h2>
                        <h3>评委会成员</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="container hidden-xs">
            <div class="row">
                <div class="col-sm-12 text-center common_tit">
                    <h2>环球舞蹈挑战赛</h2>
                    <h3>评委会成员</h3>
                </div>
            </div>
        </div>
        <div class=" col-xs-12 visible-xs">
            <ul class="row rater_nav text-center">
                <li class="col-xs-3 cur">
                    <a href="javascript:;">魏东升</a>
                </li>
                <li class="col-xs-3">
                    <a href="javascript:;">陈珏</a>
                </li>
                <li class="col-xs-3">
                    <a href="javascript:;">徐刚</a>
                </li>
                <li class="col-xs-3">
                    <a href="javascript:;">谢瑞英</a>
                </li>
                <li class="col-xs-3">
                    <a href="javascript:;">Jessica</a>
                </li>
                <li class="col-xs-3">
                    <a href="javascript:;">Dana</a>
                </li>
                <li class="col-xs-3">
                    <a href="javascript:;">Antwan</a>
                </li>
                <li class="col-xs-3">
                    <a href="javascript:;">Momchil</a>
                </li>
            </ul>
        </div>
        <div class="container rater_list">
            <div class="row">
                <div class="col-xs-12 visible-xs">
                    <h3>魏东升</h3>
                </div>
                <div class="col-xs-6 col-xs-offset-3 col-sm-offset-0 col-sm-4">
                    <img src="{{url('images/home/rater_img_01.png')}}" alt="" class="auto_img">
                </div>
                <div class="clearfix visible-xs"></div>
                <div class="col-xs-12 col-sm-8 rt">
                    <h3 class="hidden-xs">魏东升</h3>
                    <br>
                    <p>
                        被载入美国名人录的魏东升以其芭蕾王子角色名扬美国芭蕾舞界。1987年毕业于北京舞蹈学院芭蕾舞大专表演系并被中央芭蕾舞团录用为主要演员。1990年被载入中国名人录。1991加盟美国历史最为古老的亚特兰大芭蕾舞团为首席主要演员。
                        <br>
                        <br>1997年，魏东升与夫人陈珏共同创建亚特兰大专业舞蹈学校并亲任艺术总监。以其对芭蕾舞独特的理解和丰富的舞台表演经验，培养了一届又一届的优秀学员。他带领的茉莉花团队曾先后赢得世界芭蕾舞大赛冠军、美国NBC电视台主办的美国达人秀现场直播、赢得央视《出彩中国人》出彩之星、参加国际芭蕾舞明星戛纳晚会。。。
                        魏东升连续7年受聘于美国阿拉斯加艺术节任教。曾经连续5年在唐纳德·特朗普麾下的环球小姐赛事任中国赛区艺术总监及总导演。
                        <br>
                        <br>主演舞剧剧目：《天鹅湖》《罗密欧与朱丽叶》《灰姑娘》《睡美人》《堂吉诃德》《胡桃夹子》《葛佩莉亚》《舞姬》《雷蒙达》《吉赛尔》《德古拉公爵》《无意的谨慎》《卡米娜》
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 visible-xs">
                    <h3>陈珏</h3>
                </div>
                <div class="col-xs-6 col-xs-offset-3 col-sm-offset-0 col-sm-4">
                    <img src="{{url('images/home/rater_img_02.png')}}" alt="" class="auto_img">
                </div>
                <div class="clearfix visible-xs"></div>
                <div class="col-xs-12 col-sm-8 rt">
                    <h3 class="hidden-xs">陈珏</h3>
                    <br>
                    <p>
                        陈珏1979年毕业于北京舞蹈学校芭蕾舞专业。1979至1984年留任北京舞蹈学校实验芭蕾舞剧团当演员。1984至1991加入中央芭蕾舞团。1991至1994年加入美国亚特兰大芭蕾舞团。1997至今与丈夫魏东升创办亚特兰大专业舞蹈学校，任校长。
                        演出剧目包括：
                        <br>红色娘子军、祝福、林黛玉、山林、杨贵妃、雁南飞、天鹅湖、罗密欧与朱丽叶、葛佩莉亚、舞姬、吉赛尔、睡美人、胡桃夹子、巴兰钦的小夜曲及其它作品。 出访国家：
                        <br>
                        <br>英国、奥地利、瑞士、瑞典、德国、荷兰、比利时、法国、意大利、美国、加拿大、墨西哥、泰国
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 visible-xs">
                    <h3>徐刚</h3>
                </div>
                <div class="col-xs-6 col-xs-offset-3 col-sm-offset-0 col-sm-4">
                    <img src="{{url('images/home/rater_img_03.png')}}" alt="" class="auto_img">
                </div>
                <div class="clearfix visible-xs"></div>
                <div class="col-xs-12 col-sm-8 rt">
                    <h3 class="hidden-xs">徐刚</h3>
                    <br>
                    <p>
                        毕业于北京舞蹈学院，现任中国中央芭蕾舞团艺术总监助理、芭蕾大师、总排练者，中国舞蹈家协会理事，中国东盟艺术学院客座教授。
                        <br>
                        <br>Xugang Graduated from Beijing Dance Academy. Currently he is an assistant Director, Ballet Master
                        and Head of rehearsals of the National Ballet of China. Director of Chinese Dancers Association and
                        Visiting Professor of China Dongmeng Arts Academy.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 visible-xs">
                    <h3>谢瑞英</h3>
                </div>
                <div class="col-xs-6 col-xs-offset-3 col-sm-offset-0 col-sm-4">
                    <img src="{{url('images/home/rater_img_04.png')}}" alt="" class="auto_img">
                </div>
                <div class="clearfix visible-xs"></div>
                <div class="col-xs-12 col-sm-8 rt">
                    <h3 class="hidden-xs">谢瑞英</h3>
                    <br>
                    <p>
                        毕业于北京舞蹈学院，曾任职中央芭蕾舞团独领舞演员。参演过《天鹅湖》、《舞姬》、《吉赛尔》、《堂吉诃德》等多部经典古典芭蕾舞剧。 现任北京舞蹈学院考级中心考级评委。
                        <br>
                        <br>Xei Ruiying graduated from Beijing Dance Academy. A Soloist with the National Ballet of China. Performed
                        in Swan Lake, La Bayadere, Giselle, Don Q and many of other classical ballet. Now is the judge for
                        the Beijing Dance Academy examination center.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 visible-xs">
                    <h3>Jessica Saund</h3>
                </div>
                <div class="col-xs-6 col-xs-offset-3 col-sm-offset-0 col-sm-4">
                    <img src="{{url('images/home/rater_img_05.png')}}" alt="" class="auto_img">
                </div>
                <div class="clearfix visible-xs"></div>
                <div class="col-xs-12 col-sm-8 rt">
                    <h3 class="hidden-xs">Jessica Saund</h3>
                    <br>
                    <p>
                        杰西卡 裳徳 美国国际芭蕾艺术学校芭蕾大师。曾任美国芭蕾剧院、英国国家芭蕾剧院、法国青年芭蕾舞团及美国华盛顿芭蕾舞团主要演员。
                        <br>
                        <br>Jessica Saund,Ballet master of International Ballet.A former principal dancer of American Ballet
                        theater,English National Ballet,Jeune Ballet de France and Washington Ballet
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 visible-xs">
                    <h3>Dana Crigler</h3>
                </div>
                <div class="col-xs-6 col-xs-offset-3 col-sm-offset-0 col-sm-4">
                    <img src="{{url('images/home/rater_img_06.png')}}" alt="" class="auto_img">
                </div>
                <div class="clearfix visible-xs"></div>
                <div class="col-sm-8 rt">
                    <h3 class="hidden-xs">Dana Crigler</h3>
                    <br>
                    <p>
                        杰西卡 裳徳 黛娜 库瑞格勒 来自美国伊利诺伊州芝加哥市。以优异的成绩毕业于美国库文私立艺术高中和宝怡索夫古典芭蕾舞蹈学校，成为一名优秀的专业芭蕾舞蹈演员。目前就任于美国拉莫瑞斯芭蕾舞团首席主要演员。在她的演艺生涯中，还时常被特邀到美国电影、电视及模特界出演。
                        <br>
                        <br>Dana Crigler from Chicago, IL. . She graduated from the Culver Academy, a private boarding school
                        for high school students and Boitsov Classical Ballet School. Now she is a principle dancer with
                        the Lamoris Namari Ballet Company. She also involved with movie films, TV shows and modeling works
                        in her rich dancer career.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 visible-xs">
                    <h3>Antwan sessions</h3>
                </div>
                <div class="col-xs-6 col-xs-offset-3 col-sm-offset-0 col-sm-4">
                    <img src="{{url('images/home/rater_img_07.png')}}" alt="" class="auto_img">
                </div>
                <div class="clearfix visible-xs"></div>
                <div class="col-xs-12 col-sm-8 rt">
                    <h3 class="hidden-xs">Antwan sessions</h3>
                    <br>
                    <p>
                        安屯塞匈，来自美国南卡罗兰州查尔斯顿市。自幼以优异的成绩及连年获得全额奖学金完成专业的芭蕾舞、现代舞和爵士舞训练。成为著名的芭蕾舞蹈演员及现代芭蕾舞编导。目前任职美国“拉莫瑞斯那迈瑞”现代芭蕾舞团的艺术总监，曾走访及巡演过欧洲、非洲、南美及亚洲各地。
                        <br>
                        <br>Antwan sessions, native of Charleston, South Carolina, USA. Started his dancing career in Atlanta,
                        Georgia. Since then he has trained several schools under full scholarship at RISPA with excellent
                        achievement in Ballet, Modern and Jazz dance. Become to a famous dancer and choreographer in America.
                        He is now the Artistic director and founder of contemporary ballet company “Lamorris Namari”.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 visible-xs">
                    <h3>Momchil Miadenov</h3>
                </div>
                <div class="col-xs-6 col-xs-offset-3 col-sm-offset-0 col-sm-4">
                    <img src="{{url('images/home/rater_img_08.png')}}" alt="" class="auto_img">
                </div>
                <div class="clearfix visible-xs"></div>
                <div class="col-xs-12 col-sm-8 rt">
                    <h3 class="hidden-xs">Momchil Miadenov</h3>
                    <br>
                    <p>
                        妈穆乔 马拉扽诺夫专业古典芭蕾舞演员及编导。前保加利亚国家芭蕾舞团首席主要演员。以艺术学士学位毕业于保加利亚苏菲亚国家芭蕾舞蹈学院。曾荣获苏联芭蕾舞比赛、日本大阪国际芭蕾大赛金奖及保加利亚国家艺术最高奖“水晶里拉”候选人。现任美国国际芭蕾艺术总监。
                        <br>Momchil Miadenov is a world recognized ballet master and chorecographer,former principa dancer with
                        the Natinal Ballet of Bulfaria.Trained in the Vaganova Method at the National School of Ballet in
                        Sofia Bulgaria and camed a B.A.degrec form the National Academy of Music in Sofia,Bulgaria.His honors
                        and awards include Laureate of Arabecque Competition and the prize for best performance in P.I.Tchaikocsky's
                        Sleeping Beauty,perm,Russia(1998),Laurecate of Masako Ohya World Ballet Competition, Osaka,Japan
                        and a nomination for the prestingious award,"Crystal Lire,"in the field of performing arts.Currently
                        Mr.Mladenov is Artistic Director of International Ballet Intensive in USA.
                    </p>
                </div>
            </div>
        </div>
        <div class="container rater_page visible-xs">
            <div class="row">
                <a href="javascript:;" class="col-xs-offset-6 col-xs-3" data-id="1">上一篇</a>
                <a href="javascript:;" class="col-xs-3" data-id="2">下一篇</a>
            </div>
        </div>
    </div>
    <input type="hidden" name="footer_bg" id="footer_backcolor" value="1">
    <script>
        var navIdx = 0;
        $(".rater_nav > li").click(function () {
            var idx = $(this).index()
            navIdx = idx
            console.log(idx)
            $(this).addClass("cur").siblings().removeClass("cur")
            $(".rater_list > div").eq(idx).show().siblings().hide()
        })
        $(".rater_page a").click(function () {
            var id = $(this).attr("data-id")
            if (id == 1) {
                if (navIdx == 0) {
                    return
                }
                navIdx -= 1
            } else if (id == 2) {
                if (navIdx == $(".rater_nav > li").length - 1) {
                    return
                }
                navIdx += 1
            }
            // $(this).css("color","#ccc")
            $(".rater_nav > li").eq(navIdx).addClass("cur").siblings().removeClass("cur")
            $(".rater_list > div").eq(navIdx).show().siblings().hide()
        })
    </script>
@endsection