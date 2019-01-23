<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Config;
use App\Models\Member;
use EasyWeChat\Foundation\Application;

class BaseController extends Controller
{
    public function getMember()
    {
        if(env('APP_ENV') == 'local'){
            $member = Member::where(['openid' => 'omkbv09VOiRV1MVTWpTMYfODjeS4'])->first(); return $member; // 本地调试版本
        }

        $config = Config::first();
        if (empty(session()->get('wechat_user'))) {
            $options = [
                'app_id' => $config->appid2,
                'secret' => $config->secret2,
                'oauth' => [
                    'scopes'   => ['snsapi_userinfo'],
                    'callback' => url('home/callback'),
                ]
            ];

            $app = new Application($options);
            $oauth = $app->oauth;
            session()->put('target_url',url('home/index/index'));
            session()->save();
            $oauth->redirect()->send();
            return true;
        }
        ## 已经登录过
        $user = session()->get('wechat_user')->getOriginal();
        $member = Member::where(['openid' => $user['openid']])->first();
        if(!$member){
            $member = new Member();
            $member->openid = $user['openid'];
            $member->unionid = isset($user['unionid']) ? $user['unionid'] : '';
            $member->nickname = $user['nickname'];
            $member->avatar = $user['headimgurl'];
            $member->gender = $user['sex'];
            $member->save();
        }
        return $member;
    }

    public function callback()
    {
        $config = Config::first();
        $options = [
            'app_id' => $config->appid2,
            'secret' => $config->secret2,
            'oauth' => [
                'scopes'   => ['snsapi_userinfo'],
                'callback' => url('home/callback'),
            ]
        ];
        $app = new Application($options);
        $oauth = $app->oauth;

        // 获取 OAuth 授权结果用户信息
        $user = $oauth->user();
        session()->put('wechat_user',$user);
        session()->save();
        //$targetUrl = empty($_SESSION['target_url']) ? url('mobile/index') : $_SESSION['target_url'];
        return redirect('home/index/index');
    }

    public function getShareConfig()
    {
        if (env('APP_ENV') == 'local') {
            return '{debug:false}'; // 本地测试
        }
        ## 分享配置
        $config = Config::first();
        $options = [
            'app_id' => $config->appid2,
            'secret' => $config->secret2,
        ];
        $app = new Application($options);
        $js = $app->js;
        $jsconfig = $js->config(['onMenuShareAppMessage', 'onMenuShareTimeline']);
        return $jsconfig;
    }

}