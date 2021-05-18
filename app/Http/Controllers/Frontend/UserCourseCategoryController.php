<?php

namespace App\Http\Controllers\Frontend;

use App\UserCourseName;
use App\UserCourseCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserCourseCategoryController extends Controller
{
    public function courseCategory($id){
        
        // $user_course_category = UserCourseCategory::findOrFail($id);
        // $user_course_name = UserCourseName::where('user_course_category_id', $id)->latest()->get();
        // return view('frontend.pages.user-course-info.user-course-info', compact('user_course_category','user_course_name'));
        dd('test');

    }
}
