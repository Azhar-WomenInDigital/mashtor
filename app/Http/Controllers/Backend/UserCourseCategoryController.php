<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\UserCourseCategory;
use App\Http\Controllers\Controller;
use Session;
class UserCourseCategoryController extends Controller
{
    public function index(){
        $user_course_category = UserCourseCategory::all();
        return view('backend.pages.user_course_category.index', compact('user_course_category'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'user_course_category_name' => 'required',
        ]);

        $user_course_category = new UserCourseCategory();
        $user_course_category->user_course_category_name = $request->user_course_category_name;
        $user_course_category->save();
        $this->setSuccess('Course Category Successfully Saved');
        return redirect('admin/user-course-category');
    }

    public function edit($id){
        $user_course_category = UserCourseCategory::findOrFail($id);
        return view('backend.pages.user_course_category.edit', compact('user_course_category'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'user_course_category_name' => 'required',
        ]);
        $user_course_category = UserCourseCategory::findOrFail($id);
        $user_course_category->user_course_category_name = $request->user_course_category_name;
        $user_course_category->save();
        $this->setSuccess('Course Category Successfully Updated');
        return redirect('admin/user-course-category');
    }

    public function destroy($id){
        $user_course_category = UserCourseCategory::findOrFail($id);
        $user_course_category->delete();
        $this->setSuccess('Course Category Deleted!!');
        return redirect()->back();
    }
}
