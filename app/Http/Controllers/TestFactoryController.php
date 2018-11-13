<?php
///**
// * Created by PhpStorm.
// * User: Administrator
// * Date: 2018/8/24 0024
// * Time: 14:10
// */
//
//namespace App\Http\Controllers;
//
//
//interface Shape
//{
//    public function draw();
//}
////实现接口的实体类
//class Rectangle implements Shape {
//    public function draw() {
//        echo 'Rectangle:draw() method.<br/>';
//    }
//}
//class Circle implements Shape {
//    public function draw() {
//        echo 'Circle:draw() method.<br/>';
//    }
//}
////工厂类
//class Factory {
//    public function getObject($type) {
//        if ($type == 'rectangle') {
//            return new Rectangle();
//        } elseif ($type == 'circle') {
//            return new Circle();
//        }
//    }
//}
////本类
//class TestFactoryController extends Controller {
//    public function fac() {
//        $a = new Factory();
//        $b = $a->getObject('rectangle');
//        $c = $a->getObject('circle');
//        $b->draw();
//        $c->draw();
//    }
//}
//
