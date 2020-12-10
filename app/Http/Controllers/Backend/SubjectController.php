<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\Subject;
use App\Models\Backend\Level;
use App\Group;
use App\Models\Backend\Faculty;
use App\Models\Backend\Medium;
use DB;
class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['level'] = Level::all();
        $data['medium'] = Medium::select('medium', DB::raw('count(*) as total'))->groupBy('medium')->get();
        $data['subject'] = Subject::all();
        $data['faculty'] = Faculty::all();
        $data['group'] = Group::all();
        return view('backend.pages.education.subject.index',$data);
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
        $subject = new Subject();
        $subject->level = $request->level;
        $subject->subject = $request->subject;
        $subject->faculty = $request->faculty;
        $subject->status = $request->status;
        $subject->save();
        $this->setSuccess(' Saved ! ');
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
        $data['level'] = Level::all();
        $data['subject'] = Subject::findOrFail($id);
        $data['faculty'] = Faculty::all();
        $data['group'] = Group::all();
        return view('backend.pages.education.subject.edit',$data);
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
        $subject =  Subject::findOrFail($id);
        $subject->level = $request->level;
        $subject->subject = $request->subject;
        $subject->faculty = $request->faculty;
        $subject->status = $request->status;
        $subject->save();
        $this->setSuccess(' Updated ! ');
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
        $subject = Subject::findOrFail($id);
        $subject->delete();
        $this->setSuccess(' Deleted!!');
        return back();
    }

    public function getFaculty($level){
        return DB::table('faculties')->where('level',$level)->get();
    }
}
