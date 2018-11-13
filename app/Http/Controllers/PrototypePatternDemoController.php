<?php
///**
// * Created by PhpStorm.
// * User: Administrator
// * Date: 2018/9/6 0006
// * Time: 14:22
// */
//
//namespace App\Http\Controllers;
//
//use DeepCopy\Exception\CloneException;
//use Symfony\Component\VarDumper\Cloner\ClonerInterface;
//
////创建实现克隆接口的抽象类
//abstract class Shape
//{
//    private $id;
//    protected $type;
//
//    abstract function draw();
//
//    public function getType()
//    {
//        return $this->type;
//    }
//
//    public function setId($id)
//    {
//        $this->id = $id;
//    }
//    public function geTid() {
//        return $this->id;
//    }
//
//
//    public function __clone()
//    {
//        // TODO: Implement __clone() method.
//        echo '对象已被克隆';
//    }
//}
//
////创建扩展上面抽象类的实体类
//class Rectangle extends Shape
//{
//    public function draw()
//    {
//        echo 'Inside rectangle:draw() method';
//    }
//
//    public function Rectangle()
//    {
//    $this->type = "rectangle";
//    }
//}
//class Square extends Shape {
//    public function draw()
//    {
//        // TODO: Implement draw() method.
//        echo 'Inside square:draw() method';
//    }
//
//    public function Square() {
//        $this->type = "square";
//    }
//}
////创建一个存储类
//class ShapeCache {
//    private static $shapeMap = array();
//    public static function getShape($shapeId) {
//        $shape = self::$shapeMap[$shapeId];
//        return $shape;
//    }
//    public static function loadCache() {
//        $rectangle = new Rectangle();
//        $rectangle->setId(1);
//        $rectangle->Rectangle();
//        self::$shapeMap[$rectangle->getId()] = $rectangle;
//
//        $square = new Square();
//        $square->setId(2);
//        $square->Square();
//        self::$shapeMap[$square->geTid()] = $square;
//    }
//
//}
//
//class PrototypePatternDemoController
//{
//        public function main() {
//            ShapeCache::loadCache();
//            $clonedShape = clone ShapeCache::getShape(1);
//            echo $clonedShape->getType()."\n";
//            $clonedShape2 = clone ShapeCache::getShape(2);
//            echo $clonedShape2->getType();
//        }
//
//
//}