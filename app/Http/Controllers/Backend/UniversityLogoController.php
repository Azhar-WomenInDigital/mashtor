<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\UniversityLogo;
use Auth;
class UniversityLogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['university_logo'] = UniversityLogo::all();
        return view('backend.pages.university_logo.index',$data);
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
        $u_logo = new UniversityLogo();
        $logo = $request->file('logo');
        if ($logo) {
            $image_name = Auth::user()->id.time().'.'.request()->logo->getClientOriginalExtension();
            $image_full_name = $image_name;
            $destination_path = 'uploads/tutor/universtiy_logo/';
            $image_url = $destination_path . $image_full_name;
            $success = $request->file('logo')->move($destination_path, $image_full_name);
            if ($success) {
                $u_logo->logo = $image_url;
            }
        }
        $u_logo->university_name = $request->university_name;
        $u_logo->save();
        $this->setSuccess(' Successfully Saved !!');
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
        // $data = [];
        // $data['u_logo'] = UniversityLogo::findOrFail($id);
        // return view('backend.pages.aboutus',$data);
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
        $u_logo = UniversityLogo::findOrFail($id);
        $logo = $request->file('logo');
        if ($logo) {
            $image_name = Auth::user()->id.time().'.'.request()->logo->getClientOriginalExtension();
            $image_full_name = $image_name;
            $destination_path = 'uploads/tutor/universtiy_logo/';
            $image_url = $destination_path . $image_full_name;
            $success = $request->file('logo')->move($destination_path, $image_full_name);
            if ($success) {
                $logo->logo = $image_url;
            }
        }
        $u_logo->university_name = $request->university_name;
        
        $u_logo->save();
        $this->setSuccess(' Successfully Updated !!');
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
        $logo = UniversityLogo::findOrFail($id);
        $logo->delete();
        $this->setSuccess(' Deleted!!');
        return back();
    }
}
