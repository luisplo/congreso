<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = [];
    public function departaments()
    {
        return $this->belongsTo('App\Models\Departament');
    }
}
