<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::group(['namespace' => 'Api'], function () {

    Route::post('login', 'LoginController@login');

    Route::any('courseToCode', 'WeChatController@courseToCode');    //对应中间件过滤，一定要是any
    Route::middleware('auth:api')->post('saoma', 'WeChatController@saoma');
    Route::post('history', 'WeChatController@history');

});
