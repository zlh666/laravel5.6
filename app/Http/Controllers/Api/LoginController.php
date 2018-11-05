<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\user;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function login(Request $request){
        return response()->json(['code'=>500,'msg'=>'success']);
    }
    public function login1(Request $request)
    {
        $code = $request->input('code');

        $miniProgram = \EasyWeChat::miniProgram(); // 开放平台
        $info = $miniProgram->auth->session((string)$code);
        if (!$user = User::where('open_id', $info['openid'])->first())
            $user = $this->registerUser($info);

        if (!$user) {
            return response()->json(['error' => '用户注册失败'], 500);
        }
        Log::info($user);
        if (!$user->api_token) {
            $this->updateToken($user);
        }

        $userInfo = Auth::guard('api')->setUser($user)->user()->toArray();
//        if ($postgraduate = $user->postgraduates->last()) {
//            $postgraduate = $postgraduate->toArray();
//            unset($postgraduate['id']);
//            $data = array_merge($userInfo, $postgraduate);
//        } else {
            $data = $userInfo;
//        }
        return response()->json(['msg' => 'success', 'data' => $data]);
    }

    protected function registerUser($info)
    {
        $user = new User();
        $user->session_key = $info['session_key'];
        $user->open_id = $info['openid'];
        $user->name = 'zhanglinhao';
        $user->email = 'zhanglh@wenduing.com';
        $user->password = '123456';
        $user->api_token = md5($info['session_key'] . $info['openid']);
        return $user->save() ? $user : $user->save();
    }

    protected function updateToken(User $user)
    {
        $user->api_token = md5($user->session_key . $user->open_id);
        return $user->save();

    }

}
