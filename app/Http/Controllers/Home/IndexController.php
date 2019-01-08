<?php

namespace App\Http\Controllers\Home;

use App\Models\Chapter;
use App\Models\Chapterflag;
use App\Models\Config;
use App\Models\Gift;
use App\Models\Giftlog;
use App\Models\Integral;
use App\Models\Memberflag;
use App\Models\Novel;
use App\Models\Sign;
use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;
use App\Models\Novel_comment;
use App\Models\Comment_replys;
use App\Models\QuizComment;
use App\Models\Quizze;
use App\Models\Member;
use App\Models\Laud;
use App\Models\Reply_laud;
use App\Models\QuizzesPraise;
use App\Models\QuizPraise;

class IndexController extends BaseController
{
    ## 首页
    public function index()
    {
        $member = $this->getMember();
        ## 小说封面
        $novel = Novel::first();
        $chapter = Chapter::where(['novel_id' => $novel->id])->get();

        ## 签到
        $signNum = 0; // 累计签到天数
        $weekArr = []; // 签到数据
        $is_sign = 0; // 今天是否签到

        ## 获取本周信息
        $weekToday = ((date('w') == 0) ? 7 : date('w'));
        $weekStart = date('Y-m-d', time() - ($weekToday - 1) * 24 * 3600); // 本周一日期
        $signs = Sign::where([
            ['member_id', $member->id],
            ['date', '>=', $weekStart]
        ])->get();

        for ($i = 1; $i < 8; $i++) {
            $arr = [
                'week' => $i,
                'is_sign' => 0,
                'is_today' => 0
            ];
            $thatDate = date('Y-m-d', strtotime($weekStart) + ($i - 1) * (24 * 60 * 60));
            $arr['date'] = $thatDate;
            ## 当天是否签到，签到天数统计
            foreach ($signs as $k => $v) {
                if ($v->date == $thatDate) {
                    $arr['is_sign'] = 1;
                    $signNum ++;
                }
            }
            // 今天是否签到
            if (date('Y-m-d') == $thatDate) {
                $arr['is_today'] = 1;
                if ($arr['is_sign'] == 1) {
                    $is_sign = 1;
                }
            }
            $weekArr[] = $arr;
        }
//        dd($weekArr);

        ## 当前阅读到第几章
        $chapterflag = Chapterflag::where(['member_id' => $member->id, 'novel_id' => $novel->id])->first();

        ## 分享配置
        $config = Config::first();
        $share = [
            'share_title' => $config->share_title,
            'share_desc' => $config->share_desc,
            'link' => url('home/index/index'),
            'share_img' => resource_url($config->share_img)
        ];
        $jsconfig = $this->getShareConfig();

        return view('home.index.index', compact('signNum', 'weekArr', 'is_sign', 'novel', 'chapter', 'jsconfig', 'share', 'chapterflag'));
    }

    ## 签到
    public function dosign(Request $request)
    {
        $member = $this->getMember();

        $signIns = Sign::where(['member_id' => $member->id, 'date' => date('Y-m-d')])->first();
        if ($signIns) {
            return [
                'code' => 403,
                'msg' => '今日已签到'
            ];
        }

        $signIns = new Sign();
        $signIns->member_id = $member->id;
        $signIns->date = date('Y-m-d');
        if ($signIns->save()) {
            ## 签到领积分
//            $signNum = (date('w') == 0) ? 7 : date('w'); // TODO
            $signNum = 10; // 每天签到给10积分
            $member->integral += $signNum;
            $member->save();

            $integral = new Integral();
            $integral->member_id = $member->id;
            $integral->num = $signNum; // 签到获得的积分
            $integral->type = 1;
            $integral->save();

            return [
                'code' => 200,
                'msg' => '签到成功,奖励' . $signNum . '积分'
            ];
        }
        return [
            'code' => 403,
            'msg' => '签到失败'
        ];
    }

    ## 领取书券
    public function drawGift(Request $request)
    {
        $member = $this->getMember();
        $days = $request->get('days');
        if ($days < 1) {
            return [
                'code' => 120,
                'msg' => '领取失败'
            ];
        }
        $signNum = Sign::where([
            ['member_id', $member->id],
            ['date', '>=', date('Y-m-01')]
        ])->count();
        if ($signNum < $days) {
            return [
                'code' => 120,
                'msg' => '签到天数不够，无法领取奖励哦'
            ];
        }
        $giftlogIns = Giftlog::where(['member_id' => $member->id, 'type' => 0, 'days' => $days, 'date' => date('Y-m')])->first();
        if ($giftlogIns) {
            return [
                'code' => 120,
                'msg' => '请勿重复领取'
            ];
        }
        $gift = Gift::where(['days' => $days])->first();
        $giftlogIns = new Giftlog();
        $giftlogIns->member_id = $member->id;
        $giftlogIns->type = 0;
        $giftlogIns->days = $days;
        $giftlogIns->num = $gift->num;
        $giftlogIns->date = date('Y-m');
        if ($giftlogIns->save()) {
            $member->book_token += $gift->num;
            $member->save();
            return [
                'code' => 100,
                'msg' => '领取成功,获得书券' . $gift->num . '个',
                'book_token' => $gift->num
            ];
        }
        return [
            'code' => 120,
            'msg' => '领取失败'
        ];
    }

    ## 阅读
    public function read(Request $request)
    {
        $member = $this->getMember();
        $novelId = $request->get('novel_id');
        $novel = Novel::find($novelId);
        if (!$novel) {
            die('您访问的资源不存在~~~');
        }

        $chapterId = $request->get('chapter_id');
        if ($chapterId > 60) {
//            header("location:http://weread.qq.com/wrpage/wechat/search/read/921448/61?ref=app");
            return view('home.index.moreChapter');
            die;
        }
        ## 如果大于最后一章，则为最后一章
        $chapterEnd = Chapter::orderBy('id', 'desc')->first();
        if ($chapterId > $chapterEnd->id) {
            $chapterId = $chapterEnd->id;
        }
        $chapterflag = Chapterflag::where(['member_id' => $member->id, 'novel_id' => $novel->id])->first();
        if (!$chapterflag) {
            $chapterflag = new Chapterflag();
            $chapterflag->member_id = $member->id;
            $chapterflag->novel_id = $novel->id;
            $chapterFirst = Chapter::first();
            $chapterflag->chapter_id = $chapterFirst->id;
        }
        if ($chapterId) {
            $chapterflag->chapter_id = $chapterId;
        }
        $chapterflag->save();
        $chapterId = $chapterflag->chapter_id;

        $chapter = Chapter::find($chapterId);

        ## 目录
        $chapterLists = Chapter::select('id', 'chapter', 'catalog')->where(['novel_id' => $novelId])->get();

        ## 用户设置
        $memberflag = Memberflag::where(['member_id' => $member->id])->first();
        $memberflag = collect($memberflag);

        ## 分享配置
        $config = Config::first();
        $share = [
            'share_title' => $config->share_title,
            'share_desc' => $config->share_desc,
            'link' => url('home/index/index'),
            'share_img' => resource_url($config->share_img)
        ];
        $jsconfig = $this->getShareConfig();

        return view('home.index.read', compact('novelId', 'chapterId', 'chapter', 'chapterLists', 'memberflag', 'jsconfig', 'share'));
    }

    ## 个人中心
    public function personal()
    {
        $member = $this->getMember();

        ## 分享配置
        $config = Config::first();
        $share = [
            'share_title' => $config->share_title,
            'share_desc' => $config->share_desc,
            'link' => url('home/index/index'),
            'share_img' => resource_url($config->share_img)
        ];
        $jsconfig = $this->getShareConfig();

        return view('home.index.personal', compact('member', 'jsconfig', 'share'));
    }

    ## 保存用户设置
    public function saveflag(Request $request)
    {
        $member = $this->getMember();
        $memberflag = Memberflag::where(['member_id' => $member->id])->first();
        if (!$memberflag) {
            $memberflag = new Memberflag();
            $memberflag->member_id = $member->id;
        }
        ## $type 1:高度; 2:模式; 3:字号
        switch ($request->get('type')) {
            case 1:
                $memberflag->scroll = $request->get('scroll');
                $memberflag->save();
                break;
            case 2:
                $memberflag->pattern = $request->get('pattern');
                $memberflag->save();
                break;
            case 3:
                $memberflag->fontsize = $request->get('fontsize');
                $memberflag->save();
                break;
        }
        return [
            'code' => 100
        ];
    }

    ## 分享加积分
    public function shareAddIntegral(Request $request)
    {
        $member = $this->getMember();
        $integral = Integral::where(['member_id' => $member->id, 'type' => 6, 'date' => date('Y-m-d')])->first();
        $num = 20; // 分享奖励积分
        if (!$integral) {
            $member->integral = $member->integral + $num;
            if ($member->save()) {
                $integral = new Integral();
                $integral->member_id = $member->id;
                $integral->num = $num;
                $integral->type = 6; // 类型6为分享获得积分
                $integral->date = date('Y-m-d');
                $integral->save();
                return [
                    'code' => 100,
                    'msg' => '分享成功, 奖励积分+' . $num
                ];
            }
        }
        return [
            'code' => 100,
            'msg' => '分享成功'
        ];
    }

    ##我的消息的页面
    public function showMynews($member_id)
    {
        $replies = Comment_replys::with('novel_comment')->with('member')->where('be_member_id', '=', $member_id)->orderBy('created_at', 'desc')->paginate(6);
        $quizCom = QuizComment::with('quizze')->with('member');
        if ($member_id) {
            $quizCom = $quizCom->whereHas('quizze', function ($quiz) use ($member_id) {
                $quiz->where('member_id', '=', $member_id);
            });
        }
        $quizComments = $quizCom->orderBy('created_at', 'desc')->paginate(6);
        return view('home.index.mynews', compact('replies', 'quizComments', 'member_id'));
    }

    ##小说评论下拉
    public function showMynews2(Request $request)
    {
        $member_id = $request->get('member_id');
//        if(Request::ajax()) {
//            $data = \Input::all();
//            return $data;
//        }
        $replies = Comment_replys::with('novel_comment')->with('member')->where('be_member_id', '=', $member_id)->orderBy('created_at', 'desc')->paginate(6);
        foreach ($replies as $k => $v) {
            $v->url = '';
            $v->avatar = '';
            $v->createDate = '';
            $v->novelContent = '';
            $v->url = url('/home/index/newDetails/' . $v->novel_comment_id . '/1');
            $v->avatar = asset($v->member ? $v->member->avatar : '');
            $v->nickname = $v->member ? $v->member->nickname : '';
            $v->createDate = date('m月d日', strtotime($v->created_at));
            $v->novelContent = $v->novel_comment ? $v->novel_comment->content : '';
        }
        if (!$replies) {
            return [
                'code' => 101,
                'msg' => '获取数据失败',
            ];
        }
        return [
            'code' => 200,
            'msg' => '获取数据成功',
            'replies' => $replies,
        ];
    }

    ##话题下拉
    public function theme(Request $request)
    {
        $member_id = $request->get('member_id');
        $quizCom = QuizComment::with('quizze')->with('member');
        if ($member_id) {
            $quizCom = $quizCom->whereHas('quizze', function ($quiz) use ($member_id) {
                $quiz->where('member_id', '=', $member_id);
            });
        }
        $quizComments = $quizCom->orderBy('created_at', 'desc')->paginate(6);
        if (!$quizComments) {
            return [
                'code' => 120,
                'msg' => '获取数据失败',
            ];
        }
        foreach ($quizComments as $k => $v) {
            $v->url = '';
            $v->avatar = '';
            $v->nickname = '';
            $v->createDate = '';
            $v->quizContent = '';
            $v->url = url('/home/index/newDetails/' . $v->quiz_id . '/2');
            $v->avatar = asset($v->member ? $v->member->avatar : '');
            $v->nickname = $v->member ? $v->member->nickname : '';
            $v->createDate = date('m月d日', strtotime($v->created_at));
            $v->quizContent = $v->quizze ? $v->quizze->content : '';
        }
        return [
            'code' => 200,
            'msg' => '获取数据成功',
            'quizs' => $quizComments,
        ];
    }

    ##我的消息详情页面
    public function newsDetails($id, $type)
    {
        if (!$type) {
            return back()->withErrors('缺少参数');
        }
        $member = $this->getMember();
        $member_id = $member->id;
//        $member_id  = 1;
        if ($type == 1) {
            $nowComment = Novel_comment::where('id', '=', $id)->first();
            $member = Member::where('id', '=', $nowComment->member_id)->first();
            $laudNum = Laud::where('novel_comment_id', '=', $id)->where('sup', '=', 1)->get()->count();
            $laudStatus = Laud::where('novel_comment_id', '=', $id)->where('member_id', '=', $member_id)->first();
            $reply = Comment_replys::with('member')->with('reply_laud')->where('novel_comment_id', '=', $id)->orderBy('created_at', 'asc')->get();
            if (!$nowComment || !$reply) {
                return back()->withErrors('获取数据失败');
            }
            $createdtime = date('m月d日', strtotime($nowComment->created_at));
            foreach ($reply as $k => $v) {
                $v->replyLaudStatus = 0;
                $v->member->avatar = asset($v->member->avatar);
                $v->createDate = date('Y年m月d日',strtotime($v->created_at));
                $replyLaudStatus = Reply_laud::where('comment_reply_id', '=', $v->id)->where('member_id', '=', $member_id)->first();
                if ($replyLaudStatus && $replyLaudStatus->sup == 1) {
                    $v->replyLaudStatus = 1;
                }
                $v->replyLaudNum = 0;
                if ($v->reply_laud) {
                    foreach ($v->reply_laud as $rk => $rv) {
                        if ($rv->sup == 1) {
                            $v->replyLaudNum = $v->replyLaudNum + 1;
                        }
                    }
                }

            }
            $laudType = 0;
            if ($laudStatus && $laudStatus->sup !== 0) {
                $laudType = 1;
            }

            $lists = [
                'type' => 'novels',
                'laudNum' => $laudNum,
                'repNum' => $reply->count(),
                'laudStatus' => $laudType,
                'nickname' => $member ? $member->nickname : '',
                'avatar' => asset($member ? $member->avatar : ''),
                'content' => $nowComment->content ? $nowComment->content : '',
                'created_at' => $createdtime,
                'replies' => $reply,
            ];
        } else {
            $quiz = Quizze::where('id', '=', $id)->first();
            $member = Member::where('id', '=', $quiz->member_id)->first();
            $laudNum = QuizzesPraise::where('quizze_id', '=', $id)->get()->count();
            $laudStatus = QuizzesPraise::where('quizze_id', $id)->where('member_id', $member_id)->first();
            $qComments = QuizComment::with('member')->with('quizPraise')->where('quiz_id', '=', $id)->orderBy('created_at', 'asc')->get();
            if (!$quiz || !$qComments) {
                return back()->withErrors('获取数据失败');
            }
            $createdtime = date('m月d日', strtotime($quiz->created_at));
            foreach ($qComments as $k => $v) {
                $v->replyLaudStatus = 0;
                $v->member->avatar = asset($v->member->avatar);
                $v->createDate = date('Y年m月d日',strtotime($v->created_at));
                $commentPraStatus = QuizPraise::where('quizcomment_id', '=', $v->id)->where('member_id', '=', $member_id)->first();
                if ($commentPraStatus) {
                    $v->replyLaudStatus = 1;
                }
                $v->replyLaudNum = 0;
                if ($v->quizPraise) {
                    foreach ($v->quizPraise as $qk => $qv) {
                        $v->replyLaudNum = $v->replyLaudNum + 1;
                    }
                }

            }
            $laudType = 0;
            if ($laudStatus) {
                $laudType = 1;
            }
            $lists = [
                'type' => 'theme',
                'laudNum' => $laudNum,
                'repNum' => $qComments->count(),
                'laudStatus' => $laudType,
                'nickname' => $member ? $member->nickname : '',
                'avatar' => asset($member ? $member->avatar : ''),
                'title' => $quiz ? $quiz->title : '',
                'content' => $quiz ? $quiz->content : '',
                'created_at' => $createdtime,
                'replies' => $qComments,
            ];
        }
        return view('home.index.newsdetails', compact('lists'));
    }

}