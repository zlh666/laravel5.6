<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/6 0006
 * Time: 14:13
 */

namespace app\Http\Controllers;


//<?
//php
///**
// * Created by ${COMPANY}.
// * User: msli
// * Date: 14-7-21
// * Time: 上午11:40
// * Purpose: 模型类
// * To change this template use File | Settings | File Templates.
// */ namespace Home\Model;
//
//use Think\Model;
//use Think\Cache;

class WeixinCardController
{ /*  /*
    * 获取 所有奖项信息
    */
    public function index($openid)
    { /*
          $adapter = D("Julymoviecodes");
          $where['openid'] = $openid;
          $info = $adapter->where($where)->find();
          return $info;
          */
    }

    public function requesturl($url, $method)
    {
        $ch = curl_init($url);
        if ($method == 'GET') {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        } else {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:21.0) Gecko/20100101 Firefox/21.0');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $info = curl_exec($ch);
        $dataJson = json_decode($info, true);
        return $dataJson;
    } /*请求URL，返回 ACCESS_TOKEN*/
    public function get_access_token()
    {
        $APPID = C("APPID");
        $APPKEY = C("SECRET");
        $ACCESS_TOKEN = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=" . $APPID . "&secret=" . $APPKEY . "";
        $accesstokenResult = $this->requesturl($ACCESS_TOKEN, 'POST');
        $accesstoken = $accesstokenResult['access_token'];
        return $accesstoken;
    }

    public function wtw_request($url, $data = null)
    {
        $curl = curl_init();
        // 启动一个CURL会话
        curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 对认证证书来源的检查
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); // 从证书中检查SSL加密算法是否存在
        curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器
        if ($data != null) {
            curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post提交的数据包 }
            curl_setopt($curl, CURLOPT_TIMEOUT, 300); // 设置超时限制防止死循环
            curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
            $info = curl_exec($curl); // 执行操作
            if (curl_errno($curl)) {
                echo 'Errno:' . curl_getinfo($curl);//捕抓异常
                dump(curl_getinfo($curl));
            }
            return $info;
        }

    }

    /*
     * 获取wtw 的 创建开卡接口()
     *
     * string(68) "{"errcode":0,"errmsg":"ok","card_id":"pPLOfjlZ0kuDE55Pz-CJgImR-YnI"}"
     * 创建开卡成功，但是无法在微信后台显示?????????
     *
     */
    public function get_cardadd()
    { //获取ACCESS_TOKEN
        $ACCESS_TOKEN = $this->get_wtw_Token();
        $data = '{
    "card":{
        "card_type":"GROUPON",
                        "groupon":{
            "base_info":{
                "logo_url": "http://www.supadmin.cn/uploads/allimg/120216/1_120216214725_1.jpg",
                                "brand_name":"海底捞",
                                "code_type":0,
                                "title":"132元双人火锅套餐",
                                "sub_title":"双人火锅套餐",
                                "color":"Color010",
                                "notice": "使用时向服务员出示此券",
                                "service_phone":"020-88888888",
                                "description":"不可与其他优惠同享\n如需团购券发票，请在消费时向商户提出\n店内均可使用，仅限堂食\n餐前不可打包，餐后未吃完，可打包\n本团购券不限人数，建议2人使用，超过建议人数须另收酱料费5元/位\n本单谢绝自带酒水饮料",
                                "date_info":{
                    "type":1,
                                    "begin_timestamp":1407577600,
                                    "end_timestamp":1419910400
                                },
                                "sku":{
                    "quantity": 50000000
                                },
                                "use_limit":1,
                                "get_limit":3,
                                "use_custom_code":true,
                                "bind_openid":false,
                                "can_share":true,
                                "url_name_type":1
                            },
                            "deal_detail":"以下锅底2选1（有菌王锅、麻辣锅、大骨锅、番茄锅、清补凉锅、酸菜鱼锅可选）：鲜菇猪肉滑1份18元\n金针菇1份16元\n黑木耳1份9元\n娃娃菜1份8元\n欢乐畅饮2位 12元\n自助酱料2位10元",
                        }
                    }
                }';
        $add_url = "https://api.weixin.qq.com/card/add?access_token=" . $ACCESS_TOKEN . "";
        $info = $this->wtw_request($add_url, $data);
        dump($info);
    }

}