<?php


namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    public function level()
    {
        return $this->belongsTo('App\Models\Backend\Level');
    }
}
