<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Courses;
use Auth;
use DB;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['courses'] = Courses::all();
$data['instructor'] = DB::table('instructors')->get();
        return view('backend.pages.course.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course_id_get = $request->course_id;
        if(isset($course_id_get) && !empty($course_id_get)){
        $course = Courses::findOrFail($course_id_get);
        }else{
            $course = new Courses();
        }
        $course->name = $request->name;
        $course->course_title = $request->course_title;
        $course->course_cat = $request->course_cat;
        $course->course_descrption = nl2br($request->course_descrption);
        $course->price = $request->price;
        $course->start_date = $request->start_date;
        $course->start_time = $request->start_time;
        $course->duration = $request->duration;
        $course->duration = $request->duration;
        $course->status = $request->status;
 $course->instractor_id= $request->instractor_id;
        $image = $request->file('image');
        if ($image) {
            $image_name = Auth::user()->id.time().'.'.request()->image->getClientOriginalExtension();
            $image_full_name = $image_name;
            $destination_path = 'uploads/courses/';
            $image_url = $destination_path . $image_full_name;
            $success = $request->file('image')->move($destination_path, $image_full_name);
            if ($success) {
                $course->image = $image_url;
            }
        }
        $course->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $courses = Courses::findOrFail($id);
        $courses->delete();
        $this->setSuccess(' Deleted!!');
        return back();
    }
}
