<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\User;
use App\Metarial;
use App\Courses;
use App\Enrol;
use Session;
use App\LiveMessageChat;
use Pusher\Pusher;
use Illuminate\Support\Facades\Input;
class HomepageController extends Controller
{
    public function index(){
      
        $data['metarials'] = Metarial::where('status',1)->get();
        $data['courses'] = Courses::where('status',1)->get();
        // $data['courses_d2'] = DB::table('courses')->get();

        $data['courses_d2'] = DB::connection('mysql2')->table('courses')->get();
        // print_r($data['courses_d2']);
        // exit();

        $data['tutors'] = DB::table('users')
        ->select('users.id as user_id','users.fullname','users.image','users.become_a_tutor','user_details.id as user_details_id','user_details.profile_tag','user_details.price')
        ->join('user_details','user_details.user_id','=','users.id')
        ->where('users.become_a_tutor',1)
        ->where('users.status',1)
        ->get();

    	return view('frontend.pages.home',$data);
    }

    public function ntrCode(){
    	return view('auth.tnrcode');
    }

    public function course(){
        $data = [];
        $data['courses_d2'] = DB::connection('mysql2')->table('courses')->get();
        return view('frontend.pages.course',$data);
    }

    public function courseId($id){
        $data = [];
        $data['courses'] = Courses::where('course_cat',$id)->where('status',1)->get();
        return view('frontend.pages.courseId',$data);
    }
    public function schoolProgramCourse($id){
        $data = [];
        // $data['course'] = DB::connection('mysql2')->table('courses')->where('id',$id)->first();
        // $data['courseOutline'] = DB::connection('mysql2')->table('courseoutlines')->where('course',$id)->get();
        $data['course'] = Courses::where('id',$id)->first();
        return view('frontend.pages.schoolProgramDetails',$data);
    }
    public function courseDetails($id){
        $data = [];
        $data['course'] = DB::connection('mysql2')->table('courses')->where('id',$id)->first();
        $data['courseOutline'] = DB::connection('mysql2')->table('courseoutlines')->where('course',$id)->get();
        // $data['course'] = Courses::where('id',$id)->first();
        return view('frontend.pages.courseDetails',$data);
    }


    public function schoolProgramEnrol($id){
        $data = [];
        $data['course'] = DB::table('courses')->where('id',$id)->first();
        return view('frontend.pages.enroleSchoolProgram',$data);
    }


    public function enrole($id){
        $data = [];
        $data['course'] = DB::connection('mysql2')->table('courses')->where('id',$id)->first();
        return view('frontend.pages.enrole',$data);
    }

    public function liveClass(){
        return view('frontend.pages.liveClass');
    }

    public function metarialsDetails($id){
        $data = [];
        $data['metarials'] = Metarial::findOrFail($id);
        return view('frontend.pages.metarials.single_metarials',$data);
    }
    public function presentation(){
        return view('frontend.pages.metarials.presentation');
    }

    public function enroleSave(Request $request){
        $enrol = new Enrol();
        $enrol->user_id = Auth::user()->id;
        $enrol->course_id = $request->course_id;
        $enrol->save();
        Session::put('enroll_data',$enrol);
        return redirect('enrole-successfull-msg');
    }
    public function enroleSchoolSave(Request $request){
        $enrol = new Enrol();
        $enrol->user_id = Auth::user()->id;
        $enrol->course_id = $request->course_id;
        $enrol->save();
        Session::put('enroll_data',$enrol);
        return redirect('enrole-successfull-msg-school');
    }

    public function enrollMsg(){
        return view('frontend.pages.enrollMsg');
    }
    public function enrollMsgschool(){
        return view('frontend.pages.enrollMsgschool');
    }

    public function liveChat(){
        $data = [];
        $data['users'] = DB::table('users')
                        // ->select('users.id as user_id','users.name','users.email', 'COUNT(messages.is_read) as unread')
                        ->select(DB::raw('count(live_message_chats.is_read) as unread,users.image,users.fullname,users.email,users.id as user_id,live_message_chats.to,live_message_chats.from'))
                        ->leftJoin('live_message_chats','live_message_chats.from','=','users.id')
                        // ->rightJoin('chats','users.id','=','chats.to')
                        // ->where('chats.id',Auth::user()->id)
                        ->orWhere('live_message_chats.from',Auth::user()->id)
                        ->orWhere('live_message_chats.to',Auth::user()->id)
                        ->groupBy('users.id','users.fullname','users.email')
                        ->get();
        return view('frontend.pages.livechat',$data);
    }


    public function livechatStudent(){
        $data = [];
        

        $data['users'] = DB::table('users')
                        ->select(DB::raw('count(live_message_chats.is_read) as unread, users.fullname,users.image,users.email,users.id as user_id,live_message_chats.to,live_message_chats.from'))
                        ->leftJoin('live_message_chats','live_message_chats.to','=','users.id')
                        ->orWhere('live_message_chats.from',Auth::user()->id)
                        ->orWhere('live_message_chats.to',Auth::user()->id)
                        ->groupBy('users.id','users.fullname','users.email')
                        ->get();

        return view('frontend.pages.livechatStudent',$data);
    }


    public function getMessage($user_id){
       $my_id = Auth::id();

        // Make read all unread message
        LiveMessageChat::where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 1]);

        // Get all message from selected user
        $messages = LiveMessageChat::where(function ($query) use ($user_id, $my_id) {
            $query->where('from', $user_id)->where('to', $my_id);
        })->oRwhere(function ($query) use ($user_id, $my_id) {
            $query->where('from', $my_id)->where('to', $user_id);
        })->get();

        return view('frontend.pages.messages.index', ['messages' => $messages]);
    }

    public function sendMessage(Request $request)
    {
        $from = Auth::id();
        $to = $request->receiver_id;
        $message = $request->message;

        $data = new LiveMessageChat();
        $data->from = $from;
        $data->to = $to;
        $data->message = $message;
        $data->is_read = 0; // message will be unread when sending message
        $data->save();

        // pusher
        $options = array(
            'cluster' => 'ap2',
            'useTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data = ['from' => $from, 'to' => $to]; // sending from and to user id when pressed enter
        $pusher->trigger('my-channel', 'my-event', $data);
    }

    public function ictCourses(){
        return view('frontend.pages.ictCourses');
    }
    public function languagesCourses(){
        return view('frontend.pages.languagesCourses');
    }
    public function professinalCourses(){
        $data = [];
        $data['courses_d2'] = DB::connection('mysql2')->table('courses')->get();
        return view('frontend.pages.course',$data);
    }

    public function testVideo(){
        return view('frontend.video_conference');
    }

    public function help(){
        return view('frontend.pages.help');
    }

    public function search(){
        $data = [];
    $q = Input::get ( 'q' );
//echo $q;
    $tutors = User::where('fullname','LIKE','%'.$q.'%')
    ->select('users.id as user_id','users.fullname','users.image','users.become_a_tutor','user_details.id as user_details_id','user_details.profile_tag','user_details.price')
        ->join('user_details','user_details.user_id','=','users.id')
    ->orWhere('email','LIKE','%'.$q.'%')
    ->orWhere('number','LIKE','%'.$q.'%')
    ->where('become_a_tutor',1)->get();
    if(count($tutors) > 0)
        return view('frontend.pages.mashtorsearch')->withTutors($tutors)->withQuery ( $q );
    else return view('frontend.pages.searchnotfound');

    }

    public function searchCourseSchool(){
        $data = [];
        $q = Input::get ( 'q' );
    //echo $q;
        $courses = Courses::where('name','LIKE','%'.$q.'%')
        ->orWhere('course_title','LIKE','%'.$q.'%')
        ->orWhere('price','LIKE','%'.$q.'%')
        ->get();
        if(count($courses) > 0)
            return view('frontend.pages.courseIdSearch')->withCourses($courses)->withQuery ( $q );
        else return view('frontend.pages.searchnotfound');

    }

    public function searchProCourse(){
        $data = [];
        $q = Input::get ( 'q' );
    //echo $q;
        // $data['course'] = DB::connection('mysql2')->table('courses')


        $data['courses_d2'] = DB::connection('mysql2')->table('courses')
        ->where('course_title','LIKE','%'.$q.'%')
        ->orWhere('course_fee','LIKE','%'.$q.'%')
        ->get();
        if(count($data['courses_d2']) > 0)
            return view('frontend.pages.courseSearch',$data);
        else return view('frontend.pages.searchnotfound');

    }

    public function msg(Request $request){
        $msg = new LiveMessageChat();
        $msg->to = $request->to;
        $msg->from = Auth::user()->id;
        $msg->message = $request->messages;
        $msg->save();
        return redirect('livechat-student');
    }
}
