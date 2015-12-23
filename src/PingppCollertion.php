<?php
namespace lyt8384\Pingpp;
use Pingpp;

class PingppCollertion {

    public function __call( $method, $arg_array = null ){
        $class = 'Pingpp\\'.$method;
        if(class_exists($class)){
            return new $class();
        }else{
            return null;
        }
    }

    public static function __callStatic( $method, $arg_array = null ){
        $class = 'Pingpp\\'.$method;
        if(class_exists($class)){
            return new $class();
        }else{
            return null;
        }
    }

    public function __get( $property ){
        $class = 'Pingpp\\'.$property;
        if(class_exists($class)){
            return new $class();
        }else{
            return null;
        }
    }
}