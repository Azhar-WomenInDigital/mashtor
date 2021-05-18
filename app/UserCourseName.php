<?php

namespace App;

use App\UserCourseCategory;
use Illuminate\Database\Eloquent\Model;

class UserCourseName extends Model
{
    protected $guarded = [];
    public function UserCourseCategory(){
        return $this->belongsTo('App\UserCourseCategory');
    }
}
