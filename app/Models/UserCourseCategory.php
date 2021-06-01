<?php

namespace App\Models;

use App\Models\Courseuser;
use Illuminate\Database\Eloquent\Model;

class UserCourseCategory extends Model
{
    protected $guarded = [];

    public function courseuser()
    {
        return $this->hasMany(Courseuser::class);
    }
}