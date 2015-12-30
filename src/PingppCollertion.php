<?php
namespace lyt8384\Pingpp;
use Pingpp;

class PingppCollertion {

    protected $method;
    protected $err = null;

    public function __call( $method, $arg_array = null ){
        try{
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
        } catch( Pingpp\Error\Base $e){
            $this->err = $e;
            return false;
        }

        return null;
    }

    public static function __callStatic( $method, $arg_array = null ){
        return new self;
    }

    public function __get( $property ){
        return $this->__call($property);
    }

    public function getError(){
        return $this->err;
    }
}