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
        ->leftJoin('users','users.id','=','enrols.user_id')
        ->leftJoin('courses','courses.id','=','enrols.course_id')
        ->get();
        return view('backend.pages.enroll.index',$data);
    }

}
