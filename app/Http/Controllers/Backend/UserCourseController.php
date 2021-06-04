<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Courseuser;
use App\Models\UserCourseCategory;
use Illuminate\Http\Request;

class UserCourseController extends Controller
{
    public function index()
    {
        $user_course = Courseuser::all();
        $user_course_category = UserCourseCategory::all();
        return view('backend.pages.user_course.index', compact('user_course', 'user_course_category'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'user_course_category_id' => 'required',
            'user_course_name' => 'required',
            'class_link' => 'required',
            'start_time' => 'required',
            'day' => 'required',
            'class_link_2' => 'required',
            'start_time_2' => 'required',
            'day_2' => 'required',
        ]);

        $user_course = new Courseuser();
        $user_course->user_course_name = $request->user_course_name;
        $user_course->user_course_category_id = $request->user_course_category_id;
        $user_course->class_link = $request->class_link;
        $user_course->start_time = $request->start_time;
        $user_course->day = $request->day;
        $user_course->class_link_2 = $request->class_link_2;
        $user_course->start_time_2 = $request->start_time_2;
        $user_course->day_2 = $request->day_2;
        $user_course->save();
        $this->setSuccess('Course Successfully Saved');
        return redirect('admin/user-course');
    }

    public function edit($id)
    {
        $user_course = Courseuser::findOrFail($id);
        $user_course_category = UserCourseCategory::all();
        return view('backend.pages.user_course.edit', compact('user_course', 'user_course_category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'user_course_category_id' => 'required',
            'user_course_name' => 'required',
            'class_link' => 'required',
            'start_time' => 'required',
            'day' => 'required',
            'class_link_2' => 'required',
            'start_time_2' => 'required',
            'day_2' => 'required',
        ]);

        $user_course = Courseuser::findOrFail($id);
        $user_course->user_course_name = $request->user_course_name;
        $user_course->user_course_category_id = $request->user_course_category_id;
        $user_course->class_link = $request->class_link;
        $user_course->start_time = $request->start_time;
        $user_course->day = $request->day;
        $user_course->class_link_2 = $request->class_link_2;
        $user_course->start_time_2 = $request->start_time_2;
        $user_course->day_2 = $request->day_2;
        $user_course->save();
        $this->setSuccess('Course Successfully Updated');
        return redirect('admin/user-course');
    }

    public function destroy($id)
    {
        $user_course = Courseuser::findOrFail($id);
        $user_course->delete();
        $this->setSuccess('Course Successfully Deleted!');
        return redirect()->back();
    }
}