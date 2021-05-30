<?php

namespace App\Models;

use App\Models\UserCourse;
use Illuminate\Database\Eloquent\Model;

class UserCourseCategory extends Model
{
    protected $guarded = [];

    public function userCourse(){
        return $this->hasMany(UserCourse::class);
    }
}
