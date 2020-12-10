<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\Level;
use App\Models\Backend\Faculty;
use App\Models\Backend\Subject;
use App\Models\Backend\Medium;
use App\Suggestion;
use Auth;
use Session;
use DB;
use App\User;
use App\StudentBasicInfo;
use App\StudentProfileAcademic;
use App\BookingSession;
class StudentDashboard extends Controller
{
    public function dashboard(){
    	$data = [];
    	$data['levels'] = Level::where('status',1)->get();
    	$data['subjects'] = Subject::where('status',1)->get();
    	return view('frontend.user_dashboard.student.dashboard',$data);
    }

    public function suggestion(Request $request){
    	$suggestion = new Suggestion();
    	$suggestion->user_id = Auth::user()->id;
    	$suggestion->suggesion = $request->suggesion;
    	$suggestion->save();
    	Session::flash('success','Thank you for your valueable suggestion');
    	return back();
    }

    public function updateStudentProfile(Request $request,$id){

      $profileUpdate = User::findOrFail($id);
      $profileUpdate->f_name = $request->f_name;
      $profileUpdate->l_name = $request->l_name;
      $profileUpdate->address = $request->address;
      $profileUpdate->s_lan = $request->s_lan;
      $profileUpdate->n_lan = $request->n_lan;
      $profileUpdate->number = $request->number;
      $profileUpdate->parent_number = $request->parent_number;
      $profileUpdate->country = $request->country;
      $profileUpdate->dob = $request->dob;
      $profileUpdate->gender = $request->gender;
      $profileUpdate->upozila = $request->upozila;
      $profileUpdate->district = $request->district;
      $profileUpdate->save();
      $this->setSuccess(' Profile Successfully Updated !!');
      return back();
    }
    public function calender() {
        return view('frontend.user_dashboard.student.calender');
    }

    public function academic(){
        $data = [];
        $data['levels'] = Level::where('status',1)->get();
        $data['faculty'] = Faculty::where('status',1)->get();
        $data['subject'] = Subject::where('status',1)->get();
        $data['medium'] = Medium::select('medium', DB::raw('count(*) as total'))->groupBy('medium')->where('status',1)->get();
        return view('frontend.user_dashboard.student.academic',$data);
    }

    public function getMedium($medium){
        $data = DB::table('media')
        ->where('level_id',$medium)
        ->get();
          $output = '<level class="text-white font-weight-bold">Select Medium</level><select class="form-control custom-form-control" name="medium">';
          foreach($data as $row)
          {
           $output .= '

            <option value="'.$row->id.'">'.$row->medium.'</option>';
          }
          $output .= '</select>';
echo $output;





        $faculty = DB::table('faculties')
        ->where('level',$medium)
        ->get();
          $output = '<level class="text-white font-weight-bold" >Select Faculty</level><select class="form-control custom-form-control" name="faculty" id="faculty">';
          foreach($faculty as $row)
          {
           $output .= '

            <option value="'.$row->id.'">'.$row->faculty.'</option>';
          }
          $output .= '</select>';


          echo $output;

          $group = DB::table('groups')
        ->where('level_id',$medium)
        ->get();
          $output = '
            <level class="text-white font-weight-bold">Select Group</level>
            <select class="form-control getSubject sdfsdfsd custom-form-control" name="group" id="sdfsdfsd">
              <option value="">Select Group</option>';

          foreach($group as $row)
          {
           $output .= '
           
            <option value="'.$row->id.'">'.$row->group_name.'</option>';
          }
          $output .= '</select>';


          echo $output;

          // foreach($faculty as $data){
          //   $subjects = DB::table('subjects')->where('faculty',$data->id)->get();
          //   foreach ($subjects as $sub) {
          //       echo $sub->subject;            }
          // }
    }

    public function getFaculty($faculty){

        $data = DB::table('faculties')
        ->where('level',$faculty)
        ->get();
      $output = '<select class="form-control custom-form-control" name="faculty">';
      foreach($data as $row)
      {
       $output .= '
        <option value="'.$row->id.'">'.$row->faculty.'</option>';
      }
      $output .= '</select>';
      echo $output;
    }

    public function studentProfile(){
      return view('frontend.user_dashboard.student.profile');
    }

    public function academicPost(Request $request){
      return redirect('student/dashboard');
    }

    public function profilePicUpload(Request $request){
      if(isset(Auth::user()->id)){
      $stduent =  new StudentBasicInfo();
      $stduent->user_id = Auth::user()->id;
      $image = $request->file('image');
        if ($image) {
            $image_name = Auth::user()->id.time().'.'.request()->image->getClientOriginalExtension();
            $image_full_name = $image_name;
            $destination_path = 'uploads/student/profile_pic/';
            $image_url = $destination_path . $image_full_name;
            $success = $request->file('image')->move($destination_path, $image_full_name);
            if ($success) {
                $stduent->image = $image_url;
            }
        }

        $stduent->save();
        $this->setSuccess(' Profile Successfully Updated !!');
        return back();
      }else{
        return redirect('login');
      }

    }

    public function updateProfilePic(Request $request,$id){

      $user_id = $request->user_id;
      $image = $request->file('image');
        if ($image) {
            $image_name = Auth::user()->id.time().'.'.request()->image->getClientOriginalExtension();
            $image_full_name = $image_name;
            $destination_path = 'uploads/student/profile_pic/';
            $image_url = $destination_path . $image_full_name;
            $success = $request->file('image')->move($destination_path, $image_full_name);
            if ($success) {
                $image_save = $image_url;
            }
        }

       $student_profile_pic = DB::table('student_basic_infos')
      ->where('user_id', $id)
      ->update([
          'user_id' => $user_id,
          'image' => $image_save
      ]);
        $this->setSuccess(' Profile Successfully Updated !!');
        return back();
     
      
      
    }

    public function report(){
      return view('frontend.pages.report');
    }
    
    public function studentSession(){
      return view('frontend.user_dashboard.student.sessionstart');
    }

    public function updateSutendtAcademicProfile(Request $request,$id){
      $profileUpdate = StudentProfileAcademic::findOrFail($id);
      $profileUpdate->class = $request->class;
      $profileUpdate->medium = $request->medium;
      $profileUpdate->subject = $request->subject;
      $profileUpdate->save();
      $this->setSuccess('success','Updated');
      return back();

    }

    public function notification($id){
      $data = [];
        $data = [];
        $data['notification'] = DB::table('booking_sessions')
        ->select('booking_sessions.*','users.*','booking_sessions.id as session_id')
        ->leftJoin('users','users.id','=','booking_sessions.tutor_id')
        ->where('booking_sessions.id',$id)->first();

      return view('frontend.user_dashboard.student.notification',$data);
    }

    public function sesssionAccept(Request $request,$id){
       $request = BookingSession::findOrFail($id);
        $request->seenOrunseen = '1';
        $request->save();
        $this->setSuccess('  Request Successfully Send !!');
      return redirect('student/session');
    }
}
