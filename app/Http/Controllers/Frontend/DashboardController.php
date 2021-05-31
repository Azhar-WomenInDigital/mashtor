<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use Session;
use App\User;
use App\Enrol;
use App\RequestTutor;
use App\Models\UserCourse;
use Illuminate\Http\Request;
use App\Models\Backend\Level;
use App\Models\Backend\Faculty;
use App\Models\Backend\Subject;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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

    // public function userCourseInfo(){
    //     $user_course = UserCourse::latest()->get();
    //     return view('backend.test', compact('user_course'));
    // }

    public function userCourseInfo(){
        $users = User::all();
        return view('backend.test', compact('users'));
    }




}
