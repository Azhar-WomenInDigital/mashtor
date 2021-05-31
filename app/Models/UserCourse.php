<?php

namespace App\Models;

use App\User;
use App\Models\UserCourseCategory;
use Illuminate\Database\Eloquent\Model;

class UserCourse extends Model
{
    protected $guarded = [];

    public function userCourseCategory(){
        return $this->belongsTo(UserCourseCategory::class);
    }

    public function users(){
        return $this->belongsToMany(User::class, 'user_user_course', 'usercourse_id', 'user_id');
    }
}
