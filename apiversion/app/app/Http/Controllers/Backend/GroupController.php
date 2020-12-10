<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Group;
use App\Models\Backend\Level;
class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['groups'] = Group::all();
        $data['level'] = Level::all();
        return view('backend.pages.education.group.index',$data);
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
        $group = new Group();
        $group->group_name = $request->group_name;
        $group->level_id = $request->level;
        $group->status = $request->status;
        $group->save();
        $this->setSuccess(' Saved !!');
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
        $data['groups'] = Group::findOrFail($id);
        $data['level'] = Level::all();
        return view('backend.pages.education.group.edit',$data);
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
        $group = Group::findOrFail($id);
        $group->group_name = $request->group_name;
        $group->level_id = $request->level;
        $group->status = $request->status;
        $group->save();
        $this->setSuccess(' Updated!!');
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
        $group = Group::findOrFail($id);
        $group->delete();
        $this->setSuccess(' Deleted!!');
        return back();
    }
}
