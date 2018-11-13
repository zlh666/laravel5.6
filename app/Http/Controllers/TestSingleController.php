<?php
///**
// * Created by PhpStorm.
// * User: Administrator
// * Date: 2018/8/27 0027
// * Time: 10:01
// */
//
//namespace App\Http\Controllers;
//
//class Single {
//    private function __construct(){}
//    private static $ainstance=null;
//    public static function getInstance(){
//        if (self::$ainstance === null) {
//            return new Single();
//        } else {
//            return self::$ainstance;
//        }
//    }
//    public function showMess() {
//        echo 'success';
//    }
//}
//
//class TestSingleController extends Controller
//{
// public function main() {
//     $obj = Single::getInstance();
//     $obj->showMess();
// }
//}