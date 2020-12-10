<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdvisoryTeam;
use Auth;
class AdvisiorTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['teams'] = AdvisoryTeam::all();
        return view('backend.pages.advisor.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $team = new AdvisoryTeam();
        $team->name = $request->name;
        $team->position = $request->position;
        $team->institute = $request->institute;
        $team->country = $request->country;
        $image = $request->file('image');
        if ($image) {
            $image_name = Auth::user()->id.time().'.'.request()->image->getClientOriginalExtension();
            $image_full_name = $image_name;
            $destination_path = 'uploads/advisoryteam/image/';
            $image_url = $destination_path . $image_full_name;
            $success = $request->file('image')->move($destination_path, $image_full_name);
            if ($success) {
                $team->image = $image_url;
            }
        }
        $team->status = $request->status;

        $team->save();
        $this->setSuccess('Data Saved !!');
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
        $team = AdvisoryTeam::findOrFail($id);
        $team->name = $request->name;
        $team->position = $request->position;
        $team->institute = $request->institute;
        $team->country = $request->country;
        $image = $request->file('image');
        if ($image) {
            $image_name = Auth::user()->id.time().'.'.request()->image->getClientOriginalExtension();
            $image_full_name = $image_name;
            $destination_path = 'uploads/advisoryteam/image/';
            $image_url = $destination_path . $image_full_name;
            $success = $request->file('image')->move($destination_path, $image_full_name);
            if ($success) {
                $team->image = $image_url;
            }
        }
        $team->status = $request->status;

        $team->save();
        $this->setSuccess('Data Updated !!');
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
        $team = AdvisoryTeam::findOrFail($id);
        $team->delete();
        $this->setSuccess(' Deleted!!');
        return back();
    }
}
