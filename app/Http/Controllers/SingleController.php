<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/16 0016
 * Time: 15:49
 */
namespace app\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SingleController extends Controller {
    public function test(Request $request) {
//        dd($_COOKIE);
        $request->session()->put('zlh','fdsffffffffffffffffffffff');
        $request->session()->put('ttt','fdsffffffffffffffffffffff');
        $request->session()->put('44','fdsffffffffffffffffffffff');
        $request->session()->put('444','fdsffffffffffffffffffffff');
        $request->session()->put('yty','fdsffffffffffffffffffffff');
        $request->session()->save();//使用此方法才会持久化
        $data = $request->session()->all();
        dd($data);

//        var_dump($_SESSION);
    }
}