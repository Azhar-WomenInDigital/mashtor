<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Frontend\Website\Contact;
use Carbon\Carbon;
use App\Models\Frontend\Website\ApplayCourse;
use DB;
use App\Suggestion;
class HomeController extends Controller
{
    public function index(){
    	$data = [];
    	// $data['users'] = User::count();
     //    $data['total_student'] = User::where('user_type',1)->count();
     //    $data['total_tutor'] = User::where('user_type',2)->count();
     //    $data['total_franchise'] = User::where('user_type',3)->count();
     //    $data['suggestion'] = Suggestion::count();
    	return view('backend.dashboard',$data);
    }

    public function applyCourseList(){
    	$data = [];
    	$data['applied'] = DB::table('applay_courses')->get();
        return view('backend.pages.applyCourseList',$data);
    }

    public function mashtorRequest(){
        $data = [];
        $data['mashtor_requests'] = DB::table('users')->where('become_a_tutor',1)->where('status',0)->orderBy('created_at','desc')->paginate(20);
        return view('backend.pages.mashtorRequest.index',$data);
    }

    public function mashtorRequestDetails($id){
        $data = [];
        $data['mashtor_details'] = DB::table('users')
        ->select('users.id as user_id','users.fullname','users.email','users.number','users.nid','users.image','users.status','users.become_a_tutor','user_details.profile_tag','user_details.user_description','user_details.price')
        
        ->leftJoin('user_details','user_details.user_id','=','users.id')
        ->where('users.id',$id)
        ->first();
        return view('backend.pages.mashtorRequest.details',$data);
    }

    public function mashtorRequestApprove(Request $request){

        $userss_id = $request->user_id;
    
        
             $user = DB::table('users')->where('id', $userss_id)->update(array('status' => 1));  

          
     
          return redirect('admin/mashtor/request');
        
    }
}
