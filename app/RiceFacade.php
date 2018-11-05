<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/5 0005
 * Time: 10:37
 */
namespace App;
use Illuminate\Support\Facades\Facade;
class RiceFacade extends Facade {
    protected static function getFacadeAccessor()
    {
     return 'rice';
    }
}