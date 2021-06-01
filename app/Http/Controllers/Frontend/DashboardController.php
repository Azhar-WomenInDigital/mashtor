<?php

namespace App\Http\Controllers\Frontend;

use App\Enrol;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class DashboardController extends Controller
{
    public function userDashboard()
    {
        $data = [];
        $data['enroll_courses'] = Enrol::where('user_id', Auth::user()->id)->get();
        return view('frontend.pages.dashboard', $data);
    }

    public function userClass()
    {
        return view('frontend.video_conference');
    }

    public function notification()
    {
        return view('frontend.teacher.profile.notification');
    }

    public function invoice()
    {
        return view('frontend.pages.profile.invoice');
    }

    public function userCourseInfo(){
        $users = Auth::user();
        return view('frontend.pages.profile.course-info', compact('users')); 
    }

}