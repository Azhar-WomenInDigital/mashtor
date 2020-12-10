<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\StudentExplore;
use Auth;
class StudentExploreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =[];
        $data['exprience'] = StudentExplore::all();
        return view('backend.pages.student_explore.index',$data);
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
        $exprience = new StudentExplore();

        $image = $request->file('image');
        if ($image) {
            $image_name = Auth::user()->id.time().'.'.request()->image->getClientOriginalExtension();
            $image_full_name = $image_name;
            $destination_path = 'uploads/student/exprience/image/';
            $image_url = $destination_path . $image_full_name;
            $success = $request->file('image')->move($destination_path, $image_full_name);
            if ($success) {
                $exprience->image = $image_url;
            }
        }

        $exprience->vedio_link = $request->vedio_link;
        $exprience->status = $request->status;
        $exprience->save();
        $this->setSuccess('Saved !!');
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
        $exprience = StudentExplore::findOrFail($id);

        $image = $request->file('image');
        if ($image) {
            $image_name = Auth::user()->id.time().'.'.request()->image->getClientOriginalExtension();
            $image_full_name = $image_name;
            $destination_path = 'uploads/student/exprience/image/';
            $image_url = $destination_path . $image_full_name;
            $success = $request->file('image')->move($destination_path, $image_full_name);
            if ($success) {
                $exprience->image = $image_url;
            }
        }

        $exprience->vedio_link = $request->vedio_link;
        $exprience->status = $request->status;
        $exprience->save();
        $this->setSuccess('Saved !!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exprience = StudentExplore::findOrFail($id);
        $exprience->delete();
        $this->setSuccess(' Deleted!!');
        return back();
    }
}
