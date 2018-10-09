<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;

use App\Exceptions\AuthenticatesLogout;
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

    protected $redirectTo = '/admin';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    /**
     * 校验用户名
     */
    public function username()
    {
        return 'name';
    }

}
