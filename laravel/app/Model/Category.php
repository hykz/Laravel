<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    protected $table = 'categories';

    public $timestamps = false;

    public function movies()
    {
        return $this->hasMany('App\Model\Movies' , 'categories_id');
    }


}