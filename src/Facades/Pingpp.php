<?php namespace lyt8384\Pingpp\Facades;

use Illuminate\Support\Facades\Facade;

class Elastic extends Facade {

    protected static function getFacadeAccessor()
    {
        return 'pingpp';
    }

} 