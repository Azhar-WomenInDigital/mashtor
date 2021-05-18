<?php

namespace App\Models;

use App\Models\UserCourseSubject;
use Illuminate\Database\Eloquent\Model;

class UserCourseSubject extends Model
{
    protected $guarded = [];
    public function userCourseCategory()
    {
        return $this->belongsTo('App\Models\UserCourseSubject');
    }
}