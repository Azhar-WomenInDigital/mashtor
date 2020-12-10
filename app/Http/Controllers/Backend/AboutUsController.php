<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\AboutDescription;
use App\Models\Backend\AboutMission;
use App\Models\Backend\AboutVission;
use App\Models\Backend\AboutValues;
class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function description(){
        $data = [];
        $data['description'] = AboutDescription::all();
        return view('backend.pages.about.description',$data);
    }
    public function description_store(Request $request){
        $description = new AboutDescription();
        $description->title = $request->title;
        $description->description = $request->description;
        $description->status = $request->status;
        $description->save();
        $this->setSuccess(' Saved !!');
        return back();
    }
    public function description_update(Request $request,$id){
        $description = AboutDescription::findOrFail($id);
        $description->title = $request->title;
        $description->description = $request->description;
        $description->status = $request->status;
        $description->save();
        $this->setSuccess(' Updated !!');
        return back();
    }

    public function description_destroy($id){
        $description = AboutDescription::findOrFail($id);
        $description->delete();
        $this->setSuccess(' Deleted!!');
        return back();
    }
    public function mission(){
        $data = [];
        $data['mission'] = AboutMission::all();
        return view('backend.pages.about.mission',$data);
    }

    public function mission_post(Request $request){
        $mission = new AboutMission();
        $mission->title = $request->title;
        $mission->description = $request->description;
        $mission->status = $request->status;
        $mission->save();
        $this->setSuccess(' Saved !!');
        return back();
    }
    public function mission_post_update(Request $request,$id){
        $mission =  AboutMission::findOrFail($id);
        $mission->title = $request->title;
        $mission->description = $request->description;
        $mission->status = $request->status;
        $mission->save();
        $this->setSuccess(' Updated !!');
        return back();
    }
    public function mission_destroy($id){
        $mission = AboutMission::findOrFail($id);
        $mission->delete();
        $this->setSuccess(' Deleted!!');
        return back();
    }


    public function vission(){
        $data = [];
        $data['vission'] = AboutVission::all();
        return view('backend.pages.about.vission',$data);
    }
    public function vission_destroy($id){
        $vission = AboutVission::findOrFail($id);
        $vission->delete();
        $this->setSuccess(' Deleted!!');
        return back();
    }

    public function vission_post(Request $request){
        $vission = new AboutVission();
        $vission->title = $request->title;
        $vission->description = $request->description;
        $vission->status = $request->status;
        $vission->save();
        $this->setSuccess(' Saved !!');
        return back();
    }
    public function vission_update(Request $request,$id){
        $vission =  AboutVission::findOrFail($id);
        $vission->title = $request->title;
        $vission->description = $request->description;
        $vission->status = $request->status;
        $vission->save();
        $this->setSuccess(' Updated !!');
        return back();
    }



    public function values(){
        $data = [];
        $data['values'] = AboutValues::all();
        return view('backend.pages.about.values',$data);
    }

    public function values_post(Request $request){
        $vission = new AboutValues();
        $vission->title = $request->title;
        $vission->description = $request->description;
        $vission->status = $request->status;
        $vission->save();
        $this->setSuccess(' Saved !!');
        return back();
    }
    public function values_update(Request $request,$id){
        $vission = AboutValues::findOrFail($id);
        $vission->title = $request->title;
        $vission->description = $request->description;
        $vission->status = $request->status;
        $vission->save();
        $this->setSuccess(' Updated !!');
        return back();
    }
    public function values_destroy($id){
        $vission = AboutValues::findOrFail($id);
        $vission->delete();
        $this->setSuccess(' Deleted!!');
        return back();
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
        //
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
        //
    }
}
