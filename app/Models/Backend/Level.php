<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public function faculty()
    {
        return $this->hasMany('App\Models\Backend\Faculty');
    }
}
