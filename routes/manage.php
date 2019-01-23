<?php

/**
 * 后台路由
 */

# 首页
Route::get('/manage/user/login', 'Manage\UsersController@loginPage');
Route::post('/manage/user/login', 'Manage\UsersController@login');

Route::group(['prefix' => '/manage', 'namespace' => 'Manage', 'middleware' => 'login'], function ($app) {
    # 首页
    $app->get('/', 'Home\IndexController@index');
    # 退出
    $app->get('logout', 'UsersController@loginOut');

    ## 用户管理
    $app->group(['prefix' => '/member'], function ($app) {
        $app->resource('index', 'MemberController');
    });

    ##报名人员管理
    $app->resource('register','RegisterController');
    $app->get('register/status/{id}','RegisterController@status');

    ##舞蹈类别管理
    $app->resource('cate','CateController');

    ##舞种管理
    $app->resource('race','RaceController');

    ##赛区管理
    $app->resource('zone','ZoneController');
});

