<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\Level;
use App\Models\Backend\Faculty;
use App\Models\Backend\Subject;
use Auth;
use Session;
use App\RequestTutor;
class DashboardPageController extends Controller
{
    public function requestTutor(){
    	$data = [];
    	$data['levels'] = Level::where('status',1)->get();
    	$data['subjects'] = Subject::where('status',1)->get();
    	return view('frontend.pages.request_a_tutor',$data);
    }

    public function requestTutorSave(Request $request){
    	
    	$requestTutor = new RequestTutor();
    	$requestTutor->user_id = Auth::user()->id;
    	$requestTutor->level = $request->level;
    	$requestTutor->subject = $request->subject;
    	$requestTutor->budget = $request->budget;
    	$requestTutor->session = $request->session;
    	$requestTutor->description = $request->description;
    	$requestTutor->phone_number = $request->phone_number;
    	$requestTutor->language = $request->language;
    	$requestTutor->save();
    	$this->setSuccess('  Your Request Successfully Send !!');
        return back();


    }

    public function findTutor(){
    	return view('frontend.pages.find_tutor');
    }
    public function tutorProfile(){
    	return view('frontend.pages.tutor_profile');
    }
}
