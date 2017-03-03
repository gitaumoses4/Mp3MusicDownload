<?php

namespace App\Globals\Facades;

use Illuminate\Support\Facades\Facade;

class Constants extends Facade{
    
    protected  static function getFacadeAccessor()
    {
        return "constants";
    }
}