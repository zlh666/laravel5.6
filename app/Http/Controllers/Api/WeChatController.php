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
     * @return code img
     */
    public function courseToCode()
    {
//        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志
        //可使用
//        $app = app('wechat.official_account');
//        $app->server->push(function($message){
//            return "欢迎关注 overtrue！";
//        });

//        return $app->server->serve();

        return json_encode(array('code' => 1));
    }

    //@return status
    public function saoma()
    {
        return \GuzzleHttp\json_encode(array('code' => 1));

    }

    public function history()
    {

        $return = array(
            array('commonCourseTitle' => '政治强化班政治强化班政治强化班政治强化班政治强化班（张林豪）第3次课', 'commonCourseXq' => '上课时间：2018年8月8日 8:30 \n 签到时间：2018年8月8日 8:30 \n 学生签到人数：35人'),
            array('commonCourseTitle' => '政治强化班（郝世慧）第3次课', 'commonCourseXq' => '上课时间：2018年8月8日 8:30 \n 签到时间：2018年8月8日 8:30 \n 学生签到人数：35人')
        );

        return \GuzzleHttp\json_encode($return);

    }
}