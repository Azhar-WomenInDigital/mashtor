<?php

namespace App;

use App\UserCourseName;
use Illuminate\Database\Eloquent\Model;

class UserCourseCategory extends Model
{
    protected $fillable = ['user_course_category'];
    public function userCourseName(){
        return $this->hasMany(UserCourseName::class);
    }
}
