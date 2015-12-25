<?php
namespace lyt8384\Pingpp;
use Pingpp;

class PingppCollertion {

    protected $method;

    public function __call( $method, $arg_array = null ){
        if($this->method){
            if(method_exists('Pingpp\\'.$this->method,$method)){
                $func = 'Pingpp\\'.$this->method.'::'.$method;
                $ret = forward_static_call_array($func,$arg_array);
                return (string)$ret;
            }
        }else{
            $class = 'Pingpp\\'.$method;
            if(class_exists($class)){
                $this->method = $method;
                return $this;
            }else{
                if(method_exists('Pingpp\Charge',$method)) {
                    $func = 'Pingpp\Charge::'.$method;
                    $ret = forward_static_call_array($func,$arg_array);
                    return (string)$ret;
                }
            }
        }
        return null;
    }

    public static function __callStatic( $method, $arg_array = null ){
        return new self;
    }

    public function __get( $property ){
        return $this->__call($property);
    }
}