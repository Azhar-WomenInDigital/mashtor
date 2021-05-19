<?php

namespace App\Http\Controllers\Frontend;
use App\User;
use Illuminate\Http\Request;
use App\Models\UserCourseSubject;
use App\Models\UserCourseCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserCourseController extends Controller
{
    public function userCourseCategory($id)
    {
        $user_course_categories = UserCourseCategory::findOrFail($id);
        $user_course_subjects = UserCourseSubject::where('user_course_category_id', $id)->latest()->get();
        return view('frontend.pages.user-course.user-course-info', compact('user_course_categories', 'user_course_subjects'));
    }

    public function updateCourse(Request $request){
        $this->validate($request, [
            'course_name' => 'required',
        ]);
        $user = User::findOrFail(Auth::id());
        $user->course_name = $request->course_name;
        $user->save();
        return redirect()->route('home');
    }
}