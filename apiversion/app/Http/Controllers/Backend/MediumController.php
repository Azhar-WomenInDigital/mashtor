<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\Level;
use App\Models\Backend\Medium;
use Session;
class MediumController extends Controller
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
        $data['medium'] = Medium::all();
        return view('backend.pages.education.medium.index',$data);
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
        $medium = new Medium();
        $medium->level_id = $request->level_id;
        $medium->medium = $request->medium;
        $medium->status = $request->status;
        $medium->save();
        $this->setSuccess(' Saved!!');
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
        $data['medium'] = Medium::findOrFail($id);
        return view('backend.pages.education.medium.edit',$data);
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
        $medium =  Medium::findOrFail($id);
        $medium->level_id = $request->level_id;
        $medium->medium = $request->medium;
        $medium->status = $request->status;
        $medium->save();
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
        $medium = Medium::findOrFail($id);
        $medium->delete();
        $this->setSuccess(' Deleted!!');
        return back();
    }
}
