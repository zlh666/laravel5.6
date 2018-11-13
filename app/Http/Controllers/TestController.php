<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/5 0005
 * Time: 14:09
 */

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admins';
    protected $primaryKey = 'id';

}

class TestController extends Controller
{
    //token 2小时过期
    private $token;
    private const LOGO = 'D:\phpstudy\WWW\laravel5.6\public\img\a3.png';
    private const CARD1 = 'pF8CA1iPhK7UYW0XP350AMwQBx84';
    private const CARD2 = 'pF8CA1hd54hj_syxE9TQjrdpssBM';

    public function __construct()
    {
        $token = DB::select('select access_token from weixin_token where id = 1');
        $this->token = $token[0]->access_token;

    }

    public function test()
    {
        /*
         * 原始方式
         */
        $data = DB::select('select * from admins');

        /*
         * 查询构造器
         */
        $data = DB::table('admins')->select('id')->get();
        //chunk()每次查n条
        $admin = DB::table("users")->orderBy('id')->chunk(1, function ($admins) {  //每次查1条
            echo '<pre>';
            var_dump($admins);
            echo '<pre>';
            if (false) return false;  //在满足某个条件下使用return就不会再往下查了
        });

        /*
         * Eloquent ORM
         */
        $data = Admin::all();
        $data = Admin::find(1);
//        dd($data);
        //with 关联表
        //when 执行where的判断
    }

    public function create_logo()
    {
        $url = 'https://api.weixin.qq.com/cgi-bin/media/uploadimg?access_token=' . $this->token;
        $re = $this->curl_post($url, array('access_token' => $this->token, 'buffer' => new \CURLFile(realpath(self::LOGO))));
        $reArr = \GuzzleHttp\json_decode($re, true);
        if (isset($reArr['errcode']) && ($reArr['errcode'] == 42001 || $reArr['errcode'] == 40001)) {
            $this->update_access_token();
            $re = $this->curl_post($url, array('access_token' => $this->token, 'buffer' => new \CURLFile(realpath(self::LOGO))));

        }
        var_dump($re);

    }

    public function curl_post($url, $post_data = array())
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url); //不需要验证ssl证书
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE); //设置获取的信息以文件流的形式返回,而不是直接输出
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        return $output;
//        print_r($output, true);

    }

    public function curl_get($url)
    {
        $ch = curl_init();//初始化curl
        curl_setopt($ch, CURLOPT_URL, $url);//设置url属性
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);//获取数据
        curl_close($ch);//关闭curl
        return $output;
    }

    public function get_token()
    {
        return $this->curl_get('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wxe083ae89807149a6&secret=1aa639afef08f709470605d8ebeb2b01');
    }

    /*
     * return "{"errcode":48001,"errmsg":"api unauthorized hint: [J3Mnna0956c442!]"}"
     */
    public function create_shop()
    {
        $url = 'http://api.weixin.qq.com/cgi-bin/poi/addpoi?access_token=' . $this->token;
        $jsonArr = array();
        $jsonArr['business']['base_info']['business_name'] = 'zlh测试门店';
        $jsonArr['business']['base_info']['branch_name'] = 'zlh测试门店分店';
        $jsonArr['business']['base_info']['province'] = '湖北省';
        $jsonArr['business']['base_info']['city'] = '武汉市';
        $jsonArr['business']['base_info']['district'] = '洪山区';
        $jsonArr['business']['base_info']['address'] = '烽火创新谷';
        $jsonArr['business']['base_info']['telephone'] = '18040599522';
        $jsonArr['business']['base_info']['categories'] = array('美食', '小吃快餐');
        $jsonArr['business']['base_info']['offset_type'] = 1;
        $jsonArr['business']['base_info']['longitude'] = 114.402632;
        $jsonArr['business']['base_info']['latitude'] = 30.523748;
        $json = \GuzzleHttp\json_encode($jsonArr);
        var_dump($json);
        $re = $this->curl_post($url, array('access_token' => $this->token, 'buffer' => $json));
        var_dump($re);
    }

    /*
     * 团购，代金，折扣
     */
    public function create_card()
    {
        $url = 'https://api.weixin.qq.com/card/create?access_token=' . $this->token;
        $jsonArr = array(
            'card' => array(
                'card_type' => 'GROUPON',
                'groupon' => array(
                    'base_info' => array(
                        'logo_url' => 'http://mmbiz.qpic.cn/mmbiz_png/yUCZAZxd1ia3rG8X24LGXEQqXAqY02KiaPlCuZHWRNPkEgj97jsW3VDCC5rR8jZibMnEPzOWqckUxsaW0Mr7SMKQA/0',
                        'brand_name' => 'zlh餐厅',
                        'code_type' => 'CODE_TYPE_TEXT',
                        'title' => '132元双人火锅套餐',
                        'color' => 'Color010',
                        'notice' => '使用时向服务员出示此券',
                        'service_phone' => '18040599522',
                        'description' => '不可与其他优惠同享\n如需团购券发票，请在消费时向商户提出\n店内均可使用，仅限堂食',
                        'date_info' => array(
                            'type' => 'DATE_TYPE_FIX_TIME_RANGE',
                            'begin_timestamp' => 1541489396,
                            'end_timestamp' => 1541493036
                        ),
                        'sku' => array(
                            'quantity' => 5000
                        )
                    ),
                    'deal_detail' => '以下锅底2选1（有菌王锅、麻辣锅、大骨锅、番茄锅、清补 凉锅、酸菜鱼锅可选）：\n大锅1份 12元\n小锅2份 16元'
                )
            )
        );

        $re = $this->curl_post($url, \GuzzleHttp\json_encode($jsonArr, JSON_UNESCAPED_UNICODE));
        var_dump($re);
    }

    /*
     * 创建卡券的二维码
     */
    public function create_card_code()
    {
        $url = 'https://api.weixin.qq.com/card/qrcode/create?access_token=' . $this->token;

        $jsonArr = array('action_name' => 'QR_CARD', 'expire_seconds' => 1800, 'action_info' => array('card' => array('card_id' => self::CARD2)));
        $re = $this->curl_post($url, \GuzzleHttp\json_encode($jsonArr, JSON_UNESCAPED_UNICODE));
        $reArr = \GuzzleHttp\json_decode($re, true);

        if (isset($reArr['errcode']) && ($reArr['errcode'] == 42001 || $reArr['errcode'] == 40001)) {
            $this->update_access_token();
            $re = $this->curl_post($url, \GuzzleHttp\json_encode($jsonArr, JSON_UNESCAPED_UNICODE));
            $reArr = \GuzzleHttp\json_decode($re, true);

        }
        var_dump($reArr);
    }

    /*
     * 更新access_token
     */
    public function update_access_token()
    {
        $tokenArr = \GuzzleHttp\json_decode($this->get_token(), true);
        $this->token = $tokenArr['access_token'];
        var_dump($this->token);
        if ($this->token) {
            echo DB::insert("update weixin_token set access_token='{$this->token}' where id=1");
        }
    }

    /*
     * 设置投放的用户白名单
     */
    public function add_code_to_user()
    {
        $url = 'https://api.weixin.qq.com/card/testwhitelist/set?access_token=' . $this->token;
        $jsonArr = array(
//            "openid" => array(
//                "oF8CA1h80_nqwzoC_CBmMhmtyt5Q"
//            ),
            "username" => array(
                "zlh1991106",
            ));
        $re = $this->curl_post($url, \GuzzleHttp\json_encode($jsonArr, JSON_UNESCAPED_UNICODE));
        $reArr = \GuzzleHttp\json_decode($re, true);
        var_dump($reArr);
    }

    /*
     * 查看卡券
     */

    public function see_card() {
        $url = 'https://api.weixin.qq.com/card/code/get?access_token='.$this->token;

    }


}