<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Session;
use DB;
use Auth;
use Hash;
use App\Admin;
use App\UserDetails;
use Illuminate\Support\Facades\Input as input;
class UsersController extends Controller
{
    // Show Users
    public function showUsers(){
    	$data = []; 
    	$data['users'] = Admin::all();
    	return view('backend.pages.user.users',$data);
    }

    public function chnagePassword(){
    	return view('backend.pages.user.changePassword');
    }
    public function savePassword(){
        $user = Admin::find(Auth::user()->id);
        if(Hash::check(Input::get('passwordOld'),$user['password']) && Input::get('password') == Input::get('password_confirmation')){
            $user->password = bcrypt(Input::get('password'));
            $user->save();
             Session::flash('success', 'Update  Successfully !');
            return back();
        }else{
            Session::flash('error','Sorry Failed !!');
            return back();
        }
    }
    public function destroyUsers($id){
        
        $users = Admin::findOrFail($id);
        $users->delete();
        Session::flash('success',' Deleted Successfully');
        return back();
    }
    public function editUsers($id){
        $users = Admin::findOrFail($id);
        return view('backend.pages.user.editusers')->withUsers($users);
    }
    public function updateUsers(Request $request,$id){
        
    
      $name = $request->input('name');
      DB::update('update admins set name = ? where id = ?',[$name,$id]);
        Session::flash('success', 'Update  Successfully !');
        
        return back();
    }

    // Student
    public function getStudent(){
        $data = [];
        $data['users'] = User::where('user_type',1)->get();
        return view('backend.pages.user.student',$data);
    }

    public function destroyUsersStudent($id){
        $users = User::findOrFail($id);
        $users->delete();
        Session::flash('success',' Deleted Successfully');
        return back();
    }

    public function showStudent($id){
        $data = [];
        $data['users'] = User::findOrFail($id);
        
        return view('backend.pages.user.show_student',$data);
    }

    // Tutor
    public function getTutors(){
        $data = [];
        $data['users'] = User::where('become_a_tutor',1)->get();
        return view('backend.pages.user.tutors',$data);
    }
     public function destroyUsersTutor($id){
        $users = User::findOrFail($id);
        $users->delete();
        Session::flash('success',' Deleted Successfully');
        return back();
    }

    public function showTutor($id){
        $data = [];
        $data['users'] = User::findOrFail($id);
        
        return view('backend.pages.user.show_student',$data);
    }

    // Franchise

    public function getFranchise(){
        $data = [];
        $data['users'] = User::where('user_type',3)->get();
        return view('backend.pages.user.franchise',$data);
    }
     public function destroyUsersFranchise($id){
        $users = User::findOrFail($id);
        $users->delete();
        Session::flash('success',' Deleted Successfully');
        return back();
    }

    public function showFranchise($id){
        $data = [];
        $data['users'] = User::findOrFail($id);
        
        return view('backend.pages.user.show_student',$data);
    }

    public function tutorRequest(){
        $data=[];
        $data['request_tutor'] = DB::table('users')->where('activate_status',1)->where('user_type',2)->get();
        return view('backend.pages.requestTutor.requestTutor',$data);
    }

    public function showTutorRequest($id){
        $data=[];
        $data['id'] = $id;
        $data['users'] = DB::table('users')->where('activate_status',1)->where('id',$id)->first();
        $data['user_intro'] = DB::table('tutor_profile_intros')->where('user_id',$id)->first();
        $data['tutor_education'] = DB::table('tutor_education')->where('user_id',$id)->get();
        $data['tutor_othr_infos'] = DB::table('tutor_othr_infos')->where('user_id',$id)->get();
        $data['tutor_expriences'] = DB::table('tutor_expriences')->where('user_id',$id)->get();
        $data['taching_geographic_infos'] = DB::table('taching_geographic_infos')->where('user_id',$id)->get();
        $data['which_subject_teaches'] = DB::table('which_subject_teaches')->where('user_id',$id)->get();
        return view('backend.pages.requestTutor.showRequestTutor',$data);
    }

    public function tutorApprove(Request $request,$id){
        $approve = User::findOrFail($id);
        $approve->status = 1;
        $approve->save();
        $this->setSuccess(' Approved !!');
        return back();
    }

	public function enroll(){
        $data = [];
        $data['enrolls'] = DB::table('enrols')
        ->select('enrols.id as enrollsId','enrols.user_id as enrolsUserId','enrols.course_id as enrolsCourseId','enrols.created_at as enrolsCreatedAt','enrols.discount','users.id as usersId','users.fullname','users.email','courses.id as coursesId','courses.course_cat','courses.name')
        ->leftJoin('users','users.id','=','enrols.user_id')
        ->leftJoin('courses','courses.id','=','enrols.course_id')
		->orderBy('enrols.id','desc')
        ->get();
        return view('backend.pages.enroll.index',$data);
    }

    public function deleteEnroll($id){

        $enroll = DB::table('enrols')->where('id', $id)->delete();
       
        $this->setSuccess(' Deleted!!');
        return back();
    }
	
	public function showEnroll($id){
        $data = [];
        $data['enrol'] = DB::table('enrols')
        ->select('enrols.id as enrollsId','enrols.user_id as enrolsUserId','enrols.course_id as enrolsCourseId','enrols.created_at as enrolsCreatedAt','enrols.discount','users.id as usersId','users.fullname','users.email','courses.id as coursesId','courses.course_cat','courses.name','courses.price','courses.start_date','courses.duration')
        ->leftJoin('users','users.id','=','enrols.user_id')
        ->leftJoin('courses','courses.id','=','enrols.course_id')
        ->where('enrols.id',$id)
        ->first();
        return view('backend.pages.enroll.show',$data);
    }

    public function becomeAMashotr($id){
        $data = [];
        $data['id'] = $id;
        $data['user_basic_info'] = UserDetails::where('user_id',$id)->first();

        return view('backend.pages.user.becomeAMashtor',$data);
    }

    public function teacherProfileEdit(Request $request,$id)
    {

        $update_id = $request->user_basic_info_id;
        if(isset($update_id) && !empty($update_id)){
            $details = UserDetails::findOrFail($update_id);
        }else{
            $details = new UserDetails();
        }

        $details->user_id = $id;
        $details->profile_tag = $request->profile_tag;
        $details->user_description = $request->user_description;
        $details->price = $request->price;
        $details->save();
        
        $user =  User::findOrFail($id);
        $user->become_a_tutor = 1;
        $user->save();
        return back();
    }

    public function allUsers()
    {

        $data = [];
        $data['users'] = User::orderBy('id','desc')->paginate(20);
        return view('backend.pages.user.allUsers',$data);
        
    }

}
