<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\UserCourseCategory;
use App\Models\UserCourseSubject;

class UserCourseController extends Controller
{
    public function userCourseCategory($id)
    {
        $user_course_categories = UserCourseCategory::findOrFail($id);
        $user_course_subjects = UserCourseSubject::where('user_course_category_id', $id)->latest()->get();
        return view('frontend.pages.user-course.user-course-info', compact('user_course_categories', 'user_course_subjects'));
    }
}