<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
    protected $guarded = [];
    function cities()
    {
        return $this->hasMany('App\Models\City');
    }
}
