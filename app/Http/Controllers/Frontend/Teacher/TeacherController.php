<?php

namespace App\Http\Controllers\Frontend\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserDetails;
use Auth;
use App\TutorEducation;
use App\TutorCourse;
use App\SupportMsg;
use App\RequestTutor;
use App\User;
use DB;
class TeacherController extends Controller
{
    public function becomeAteacher(){
    	$data = [];
    	$data['user_basic_info'] = UserDetails::where('user_id',Auth::user()->id)->first();
    	$data['user_education_info'] = TutorEducation::where('user_id',Auth::user()->id)->get();
    	$data['user_education_info_check'] = TutorEducation::where('user_id',Auth::user()->id)->first();
    	$data['user_course_info'] = TutorCourse::where('user_id',Auth::user()->id)->get();
    	$data['user_course_info_for_check'] = TutorCourse::where('user_id',Auth::user()->id)->first();
    	$data['check_tutor_request'] = RequestTutor::where('user_id',Auth::user()->id)->first();
    	return view('frontend.teacher.profile.index',$data);
    }

    public function findTutor(){
        $data = [];
        $data['tutors'] = DB::table('users')
        ->select('users.id as user_id','users.fullname','users.status','users.image','users.become_a_tutor','user_details.id as user_details_id','user_details.profile_tag','user_details.price')
        ->join('user_details','user_details.user_id','=','users.id')
        ->where('users.become_a_tutor',1)
       ->where('users.status',1)
        ->get();
    	return view('frontend.teacher.findTutor',$data);
    }

    public function tutorDetails($id){
        $data = [];
        $data['tutors'] = DB::table('users')
        ->select('users.id as user_id','users.fullname','users.image','users.become_a_tutor','users.status','user_details.id as user_details_id','user_details.profile_tag','user_details.price','user_details.user_description')
        ->join('user_details','user_details.user_id','=','users.id')
        ->where('user_id',$id)
        ->where('users.become_a_tutor',1)
 ->where('users.status',1)
        ->first();

       $data['edu_info'] = TutorEducation::where('user_id',$id)->get();
       $data['courses'] = TutorCourse::where('user_id',$id)->get();

    	return view('frontend.teacher.tutorDetails',$data);
    }

    public function teacherBasicInfo(Request $request){
    	$update_id = $request->user_basic_info_id;
    	if(isset($update_id) && !empty($update_id)){
    		$details = UserDetails::findOrFail($update_id);
    	}else{
    		$details = new UserDetails();
    	}
    	$details->user_id = Auth::user()->id;
    	$details->profile_tag = $request->profile_tag;
    	$details->user_description = $request->user_description;
    	$details->price = $request->price;
    	$details->save();
        $user =  User::findOrFail(Auth::user()->id);
        $user->become_a_tutor = 1;
        $user->save();

        $tutor_request = new RequestTutor();
        $tutor_request->user_id = Auth::user()->id;
        $tutor_request->save();
    	$this->setSuccess('Profile Updated');
    	return back();
    }

    public function teacherEducationInfo(Request $request){
    	$education_update_id = $request->edu_update_id;
    	if(isset($education_update_id) && !empty($education_update_id)){
    		$edu = TutorEducation::findOrFail($education_update_id);
    	}else{
    		$edu = new TutorEducation();
    	}
    	$edu->user_id = Auth::user()->id;
    	$edu->school_name = $request->school_name;
    	$edu->degree_name = $request->degree_name;
    	$edu->field_of_study = $request->field_of_study;
    	$edu->form_year = $request->form_year;
    	$edu->to_year = $request->to_year;
    	$edu->description = $request->description;
    	$edu->save();
    	if(isset($education_update_id) && !empty($education_update_id)){
    		$this->setSuccess('Education Details Successfully Updated !!');
    	}else{
    		$this->setSuccess('Education Details Successfully Saved !!');
    	}
    	return back();
    }

    public function teacherCourseInfo(Request $request){
    	$course_update_id = $request->cor_update_id;
    	if(isset($course_update_id) && !empty($course_update_id)){
    		$course = TutorCourse::findOrFail($course_update_id);
    	}else{
    		$course = new TutorCourse();
    	}
    	$course->user_id = Auth::user()->id;
    	$course->courses = $request->courses;
    	$course->save();
    	if(isset($course_update_id) && !empty($course_update_id)){
    		$this->setSuccess('Course Details Successfully Updated !!');
    	}else{
    		$this->setSuccess('Course Details Successfully Saved !!');
    	}
    	return back();
    }

    public function supportMsg(Request $request){
    	$msg = new SupportMsg();
    	$msg->msg = $request->msg;
    	$msg->user_id = Auth::user()->id;
    	$msg->save();
    	$this->setSuccess('Successfully Send');
    	return back();
    }

    public function teacherRequest(Request $request,$id){

        $req = DB::table('request_tutors')
            ->where('user_id', $id)
            ->update(['request' => 1]);
    	
    	$this->setSuccess('Request Successfully Send.');

    	return back();
    }
}
