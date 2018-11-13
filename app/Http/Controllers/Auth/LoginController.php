<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Exceptions\AuthenticatesLogout;

use Laravel\Socialite\Facades\Socialite;//要安装模块
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

//    use AuthenticatesUsers;
    use AuthenticatesUsers,AuthenticatesLogout {
        AuthenticatesLogout::logout insteadof AuthenticatesUsers;
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    /*
    * 理解github第三方登录
    * 1，我的web先获取github的c_id和c_secret（建立与github联系）,组装请求第三方的链接，通过浏览器访问
    * 2，在github登录页登录，前提在github个人开发设置里(生成第一步的c_id等)，设置了允许的我的web app,并设置回调url(我的web)
    * 3, 在github登录成功后，github自动跳转到回调地址，并追加code和state
    * 4，在回调地址对应的方法里，通过code,获取access_token
    * 5, 通过access_token请求github的用户信息资源
    * 从而实现我的web不需要知道github的用户名和密码，却可以请求它的资源
    */
    /**
     * 将用户重定向到Github认证页面
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * 从Github获取用户信息.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();

        dd($user->token);

//        $url = 'https://api.github.com/user?access_token='.$user->token;
    }


}
