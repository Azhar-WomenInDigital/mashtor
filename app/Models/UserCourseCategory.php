<?php

namespace App\Models;

use App\Models\UserCourseCategory;
use Illuminate\Database\Eloquent\Model;

class UserCourseCategory extends Model
{
    protected $fillable = ['user_course_category_name'];
    public function userCourseSubjects()
    {
        return $this->hasMany(UserCourseCategory::class);
    }

}