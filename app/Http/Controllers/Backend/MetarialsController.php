<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Metarial;
use Auth;
class MetarialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['metarials'] = Metarial::all();
        return view('backend.pages.metarials.index',$data);
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
        $metarial = new Metarial();
        $metarial->title = $request->title;
        $metarial->sub_title = $request->sub_title;
        $metarial->description = $request->description;
        $image = $request->file('image');
        if ($image) {
            $image_name = Auth::user()->id.time().'.'.request()->image->getClientOriginalExtension();
            $image_full_name = $image_name;
            $destination_path = 'uploads/metarials/image/';
            $image_url = $destination_path . $image_full_name;
            $success = $request->file('image')->move($destination_path, $image_full_name);
            if ($success) {
                $metarial->image = $image_url;
            }
        }
        $metarial->save();
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
        $metarial =  Metarial::findOrFail($id);
        $metarial->title = $request->title;
        $metarial->sub_title = $request->sub_title;
        $metarial->description = $request->description;
        $image = $request->file('image');
        if ($image) {
            $image_name = Auth::user()->id.time().'.'.request()->image->getClientOriginalExtension();
            $image_full_name = $image_name;
            $destination_path = 'uploads/metarials/image/';
            $image_url = $destination_path . $image_full_name;
            $success = $request->file('image')->move($destination_path, $image_full_name);
            if ($success) {
                $metarial->image = $image_url;
            }
        }
        $metarial->save();
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
        $metarial = Metarial::findOrFail($id);
        $metarial->delete();
        $this->setSuccess(' Deleted!!');
        return back();
    }
}
