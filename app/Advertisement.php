<?php

namespace App;

class Advertisement extends \Illuminate\Database\Eloquent\Model {

    protected $table = "advertisements";
    public $timestamps = false;
    
    public $adId;

}
