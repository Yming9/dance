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
        $app->get('index', 'MemberController@index');
    });
});

