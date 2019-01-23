<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

# 上传路由

Route::post('/', 'Home\UploadController@handle');

Route::group([], function () {
});

Route::get('/', function () {
    return redirect('/home');
});
//登录
Route::get('home/page','Home\LoginController@page');
Route::post('home/login','Home\LoginController@login');
//注册
Route::get('home/enroll','Home\LoginController@enroll');
Route::post('home/do_enroll','Home\LoginController@doEnroll');

Route::group(['prefix' => '/home', 'namespace' => 'Home'], function ($app) {

    //$app->get('callback', 'BaseController@callback');
    $app->group(['middleware'=>'homelogin'], function ($app) {

        //退出
        $app->get('/logout','LoginController@logout');

        //报名
        $app->get('register','RegisterController@index')->name('register');
        $app->post('register/add','RegisterController@add');
        $app->get('register/status/{id}','RegisterController@status');
        $app->get('register/edit/{id}','RegisterController@edit');
        $app->post('register/update/{id}','RegisterController@update');

        //支付宝支付
        $app->get('alipay/{id}','AlipayController@alipay');
        $app->post('alipay/payback','AlipayController@payback');
        $app->get('alipay/payback','AlipayController@payback');
        $app->get('alipay/notify','AlipayController@notify');
        $app->post('alipay/notify','AlipayController@notify');

        //微信支付
        $app->get('wechatpay/{id}','WechatpayController@wechatpay');
        $app->get('wechat/payback','WechatpayController@wechatpay');
        $app->post('wechat/payback','WechatpayController@wechatpay');

    });

    //主页
    $app->get('/','IndexController@index');//主页
    $app->get('index','IndexController@index');//主页

    //引入页面

    //比赛要求页面
    $app->get('enter_demand','PagesController@enterDemand');
    //比赛概述
    $app->get('outline','PagesController@outline');
    //比赛舞种
    $app->get('race','PagesController@race');
    //规则介绍
    $app->get('rule_intro','PagesController@ruleIntro');
    //奖项设置
    $app->get('award','PagesController@award');
    //专家评委
    $app->get('judge','PagesController@judge');
    //权威合作
    $app->get('authority','PagesController@authority');
    //赛事回顾
    $app->get('lookback','PagesController@lookback');
    //商务合作
    $app->get('business','PagesController@business');
    //联系我们
    $app->get('callme','PagesController@callme');
});