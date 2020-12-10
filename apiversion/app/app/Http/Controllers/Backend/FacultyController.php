<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\Faculty;
use App\Models\Backend\Level;
class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['level'] = Level::where('status',1)->get();
        $data['faculty'] = Faculty::all();
        return view('backend.pages.education.faculty.index',$data);
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
        $faculty = new Faculty();
        $faculty->level = $request->level;
        $faculty->faculty = $request->faculty;
        $faculty->status = $request->status;
        $faculty->save();
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
        $data = [];
        $data['level'] = Level::where('status',1)->get();
        $data['faculty'] = Faculty::findOrFail($id);
        return view('backend.pages.education.faculty.edit',$data);
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
        $faculty = Faculty::findOrFail($id);
        $faculty->level = $request->level;
        $faculty->faculty = $request->faculty;
        $faculty->status = $request->status;
        $faculty->save();
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
        $faculty = Faculty::findOrFail($id);
        $faculty->delete();
        $this->setSuccess(' Deleted!!');
        return back();
    }
}
