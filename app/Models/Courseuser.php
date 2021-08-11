<?php

namespace App\Models;

use App\Models\UserCourseCategory;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Courseuser extends Model
{
    protected $guarded = [];

    public function userCourseCategory()
    {
        return $this->belongsTo(UserCourseCategory::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'courseuser_user', 'courseuser_id', 'user_id');
    }
    public function courseusers(){
        return $this->belongsToMany(User::class, 'courseuser_user', 'courseuser_id', 'user_id');
    }
}