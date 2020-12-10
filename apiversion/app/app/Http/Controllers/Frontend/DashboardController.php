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
use App\Enrol;
class DashboardController extends Controller
{
    public function userDashboard(){
    	$data = [];
        $data['enroll_courses'] = Enrol::where('user_id',Auth::user()->id)->get();
    	return view('frontend.pages.dashboard',$data);
    }

    public function userClass(){
    	return view('frontend.video_conference');
    }

    public function notification(){
    	return view('frontend.teacher.profile.notification');
    }

    public function invoice(){
        return view('frontend.pages.profile.invoice');
    }

}
