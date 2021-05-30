<?php

namespace App\Models;

use App\Models\UserCourseCategory;
use Illuminate\Database\Eloquent\Model;

class UserCourse extends Model
{
    protected $guarded = [];

    public function userCourseCategory(){
        return $this->belongsTo(UserCourseCategory::class);
    }
}
