<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('authadmin:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        var_dump(Auth::guard('admin')->check() );
//        var_dump(Auth::guard('admin')->user()->name);
//        return view('admin.home');
        //用户表（非管理员表）
        $users = User::when($request->input('name'), function ($query) use ($request) {
            return $query->where('name', 'like', '%'.$request->input('name').'%');
        })
            ->when($request->input('from'), function ($query) use ($request) {
                return $query->where('created_at', '>=', $request->input('from'));
            })
            ->when($request->input('to'), function ($query) use ($request) {
                return $query->where('created_at', '<=', $request->input('to'));
            })
            ->paginate();

        return view('admin.home', compact('users'));
    }
}
