<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/29 0029
 * Time: 10:55
 */

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;


class WeChatController extends Controller
{

    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve()
    {
//        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志
        //可使用
//        $app = app('wechat.official_account');
//        $app->server->push(function($message){
//            return "欢迎关注 overtrue！";
//        });

//        return $app->server->serve();
        return \GuzzleHttp\json_encode(array('code'=>2));
    }
}