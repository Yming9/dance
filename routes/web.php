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
    return redirect('/manage');
});


Route::group(['prefix' => '/home', 'namespace' => 'Home'], function ($app) {

    $app->get('callback', 'BaseController@callback');

    $app->group(['prefix' => 'index'], function ($app) {
        
    });

});