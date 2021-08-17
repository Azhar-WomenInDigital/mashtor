<?php

namespace App\Http\Controllers\Frontend;

use App\Courses;
use App\DiscountCode;
use App\Enrol;
use App\Http\Controllers\Controller;
use App\LiveMessageChat;
use App\Mail\NoticeMail;
use App\Metarial;
use App\Models\Courseuser;
use App\Models\UserCourseCategory;
use App\Rules\CheckDiscountCode;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Mail;
use Pusher\Pusher;
use Session;

class HomepageController extends Controller
{
    public function index()
    {

        $data['metarials'] = Metarial::where('status', 1)->get();
        $data['courses'] = Courses::where('status', 1)->get();
        // $data['courses_d2'] = DB::table('courses')->get();

        // $data['courses_d2'] = DB::connection('mysql2')->table('courses')->get();
        $data['courses_d2'] = Courses::where('course_cat', 5)->get();
        // print_r($data['courses_d2']);
        // exit();
        $data['tutors'] = DB::table('users')
            ->select('users.id as user_id', 'users.fullname', 'users.image', 'users.status', 'users.become_a_tutor', 'user_details.id as user_details_id', 'user_details.profile_tag', 'user_details.price')
            ->join('user_details', 'user_details.user_id', '=', 'users.id')
            ->where('users.become_a_tutor', 1)
            ->where('users.status', 1)
            ->get();
        return view('frontend.pages.home', $data);
    }



    public function ntrCode()
    {
        return view('auth.tnrcode');
    }

    public function course()
    {
        $data = [];
        $data['courses_d2'] = DB::connection('mysql2')->table('courses')->get();
        return view('frontend.pages.course', $data);
    }

    public function courseId($id)
    {
        $data = [];
        $data['courses'] = Courses::where('course_cat', $id)->where('status', 1)->get();
        return view('frontend.pages.courseId', $data);
    }
    public function schoolProgramCourse($id)
    {
        $data = [];
        // $data['course'] = DB::connection('mysql2')->table('courses')->where('id',$id)->first();
        $data['courseOutline'] = DB::table('courseoutlines')->where('course', $id)->get();
        $data['course'] = Courses::where('id', $id)->first();
        return view('frontend.pages.schoolProgramDetails', $data);
    }
    public function courseDetails($id)
    {
        $data = [];
        $data['course'] = DB::connection('mysql2')->table('courses')->where('id', $id)->first();
        $data['courseOutline'] = DB::connection('mysql2')->table('courseoutlines')->where('course', $id)->get();
        // $data['course'] = Courses::where('id',$id)->first();
        return view('frontend.pages.courseDetails', $data);
    }

    public function schoolProgramEnrol($id)
    {
        $data = [];
        $data['course'] = DB::table('courses')->where('id', $id)->first();
        return view('frontend.pages.enroleSchoolProgram', $data);
    }

    public function enrole($id)
    {
        $data = [];
        $data['course'] = DB::connection('mysql2')->table('courses')->where('id', $id)->first();
        return view('frontend.pages.enrole', $data);
    }

    public function liveClass()
    {
        return view('frontend.pages.liveClass');
    }

    public function metarialsDetails($id)
    {
        $data = [];
        $data['metarials'] = Metarial::findOrFail($id);
        return view('frontend.pages.metarials.single_metarials', $data);
    }
    public function presentation()
    {
        return view('frontend.pages.metarials.presentation');
    }

    public function enroleSave(Request $request)
    {
        $enrol = new Enrol();
        $enrol->user_id = Auth::user()->id;
        $enrol->course_id = $request->course_id;
        $enrol->save();
        Session::put('enroll_data', $enrol);
        return redirect('enrole-successfull-msg');
    }
    public function enroleSchoolSave(Request $request)
    {
        $request->validate([
            'discount' => ['nullable', new CheckDiscountCode],

        ]);

        $coursecategory = $request->course_cat;
        $discountcategory = DiscountCode::where('discount_code', $request->discount)->first();

        if (isset($discountcategory) && !empty($discountcategory)) {
            if ($coursecategory == $discountcategory->course_category) {
                $enrol = new Enrol();
                $enrol->user_id = Auth::user()->id;
                $enrol->course_id = $request->course_id;

                $enrol->discount = $request->discount;
                $enrol->save();
                Session::put('enroll_data', $enrol);
                return redirect('enrole-successfull-msg-school');
            } else {

                Session::flash('faild', 'Sorry your Discount Code Not For This Course.');
                return back();
            }

        }

        $enrol = new Enrol();
        $enrol->user_id = Auth::user()->id;
        $enrol->course_id = $request->course_id;

        $enrol->discount = $request->discount;
        $enrol->save();
        Session::put('enroll_data', $enrol);

        $users = "Congratulation you successfully enroled.";
        $count = "We will inform you when class start.";
        Mail::to(Auth::user()->email)->send(new NoticeMail($users, $count));

        return redirect('enrole-successfull-msg-school');
    }

    public function enrollMsg()
    {
        return view('frontend.pages.enrollMsg');
    }
    public function enrollMsgschool()
    {
        return view('frontend.pages.enrollMsgschool');
    }

    public function liveChat()
    {
        $data = [];
        $data['users'] = DB::table('users')
        // ->select('users.id as user_id','users.name','users.email', 'COUNT(messages.is_read) as unread')
            ->select(DB::raw('count(live_message_chats.is_read) as unread,users.image,users.fullname,users.email,users.id as user_id,live_message_chats.to,live_message_chats.from'))
            ->leftJoin('live_message_chats', 'live_message_chats.from', '=', 'users.id')
        // ->rightJoin('chats','users.id','=','chats.to')
        // ->where('chats.id',Auth::user()->id)
            ->orWhere('live_message_chats.from', Auth::user()->id)
            ->orWhere('live_message_chats.to', Auth::user()->id)
            ->groupBy('users.id', 'users.fullname', 'users.email')
            ->get();
        return view('frontend.pages.livechat', $data);
    }

    public function livechatStudent()
    {
        $data = [];

        $data['users'] = DB::table('users')
            ->select(DB::raw('count(live_message_chats.is_read) as unread, users.fullname,users.image,users.email,users.id as user_id,live_message_chats.to,live_message_chats.from'))
            ->leftJoin('live_message_chats', 'live_message_chats.to', '=', 'users.id')
            ->orWhere('live_message_chats.from', Auth::user()->id)
            ->orWhere('live_message_chats.to', Auth::user()->id)
            ->groupBy('users.id', 'users.fullname', 'users.email')
            ->get();

        return view('frontend.pages.livechatStudent', $data);
    }

    public function getMessage($user_id)
    {
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
            'useTLS' => true,
        );

        $pusher = new Pusher(
            '57ce91fc4ad95a2d776b',
            '923b534276fbb2b37451',
            '698655',
            $options
        );

        $data = ['from' => $from, 'to' => $to]; // sending from and to user id when pressed enter
        $pusher->trigger('my-channel', 'my-event', $data);
    }

    public function ictCourses()
    {
        return view('frontend.pages.ictCourses');
    }
    public function languagesCourses()
    {
        return view('frontend.pages.languagesCourses');
    }
    public function professinalCourses()
    {
        $data = [];
        $data['courses_d2'] = DB::connection('mysql2')->table('courses')->get();
        return view('frontend.pages.course', $data);
    }

    public function testVideo()
    {
        return view('frontend.video_conference');
    }

    public function help()
    {
        return view('frontend.pages.help');
    }

    public function search()
    {
        $data = [];
        $q = Input::get('q');
//echo $q;
        $tutors = User::where('fullname', 'LIKE', '%' . $q . '%')
            ->select('users.id as user_id', 'users.fullname', 'users.image', 'users.become_a_tutor', 'user_details.id as user_details_id', 'user_details.profile_tag', 'user_details.price')
            ->join('user_details', 'user_details.user_id', '=', 'users.id')
            ->orWhere('email', 'LIKE', '%' . $q . '%')
            ->orWhere('number', 'LIKE', '%' . $q . '%')
            ->where('become_a_tutor', 1)->get();
        if (count($tutors) > 0) {
            return view('frontend.pages.mashtorsearch')->withTutors($tutors)->withQuery($q);
        } else {
            return view('frontend.pages.searchnotfound');
        }

    }

    public function searchCourseSchool()
    {
        $data = [];
        $q = Input::get('q');
        //echo $q;
        $courses = Courses::where('name', 'LIKE', '%' . $q . '%')
            ->orWhere('course_title', 'LIKE', '%' . $q . '%')
            ->orWhere('price', 'LIKE', '%' . $q . '%')
            ->get();
        if (count($courses) > 0) {
            return view('frontend.pages.courseIdSearch')->withCourses($courses)->withQuery($q);
        } else {
            return view('frontend.pages.searchnotfound');
        }

    }

    public function searchProCourse()
    {
        $data = [];
        $q = Input::get('q');
        //echo $q;
        // $data['course'] = DB::connection('mysql2')->table('courses')

        $data['courses_d2'] = DB::connection('mysql2')->table('courses')
            ->where('course_title', 'LIKE', '%' . $q . '%')
            ->orWhere('course_fee', 'LIKE', '%' . $q . '%')
            ->get();
        if (count($data['courses_d2']) > 0) {
            return view('frontend.pages.courseSearch', $data);
        } else {
            return view('frontend.pages.searchnotfound');
        }

    }

    public function msg(Request $request)
    {
        $msg = new LiveMessageChat();
        $msg->to = $request->to;
        $msg->from = Auth::user()->id;
        $msg->message = $request->messages;
        $msg->save();
        return redirect('livechat-student');
    }

    public function userCourseCategory($id)
    {
        $user_course_categories = UserCourseCategory::findOrFail($id);
        $user_course = Courseuser::where('user_course_category_id', $id)->get();
        // $user_selected_course = Courseuser::with('users')->get();

        $query = Courseuser::with('courseusers')->where('user_course_category_id', $id);
        $student_course = $query->latest()->get();
        $couserId = $query->pluck('id');
        $usersID = DB::table('courseuser_user')->whereIn('courseuser_id',$couserId)->pluck('user_id')->unique();
        $users = User::whereIn('id', $usersID)->get();
        

        return view('frontend.pages.user-course.user-course-info', compact('user_course_categories', 'user_course','student_course'));
    }

    public function studentCourseCategory($id)
    {
        $student_course_categories = UserCourseCategory::findOrFail($id);

        // xtart
        $query = Courseuser::with('courseusers')->where('user_course_category_id', $id);

        $student_course = $query->get();

        $couserId = $query->pluck('id');

        $usersID = DB::table('courseuser_user')->whereIn('courseuser_id',$couserId)->pluck('user_id')->unique();

        $users = User::whereIn('id', $usersID)->get();

        // end

        // $usersId = array_unique($usersID);



        dd($users);
        return view('frontend.pages.student-course.student-course', compact('student_course_categories', 'student_course'));
    }
    // public function studentList($id)
    // {
    //     $student = DB::table('courseuser_user')->get();

    //     return view('frontend.pages.student-course.student-list', compact('student'));
    // }



    public function selectedUserCourseStore(Request $request)
    {
        $this->validate($request, [
            'courseuser_id' => 'required',
            'user_id' => 'required',
        ]);

        $data = DB::table('courseuser_user')->insert([
            'courseuser_id' => $request->courseuser_id,
            'user_id' => $request->user_id,
        ]);
        return redirect()->route('user.course.info');
    }

    public function showStudents(){
        $course = Courseuser::with('courseusers')->where('user_course_category_id', 2)->get();

        dd($course);
    }


    // Show Mashtor
    public function showMashtor(){
        /*$data['tutors'] = DB::table('users')
            ->select('users.id as user_id', 'users.fullname', 'users.image', 'users.status', 'users.become_a_tutor', 'user_details.id as user_details_id', 'user_details.profile_tag', 'user_details.price')
            ->join('user_details', 'user_details.user_id', '=', 'users.id')
            ->where('users.become_a_tutor', 1)
            ->where('users.status', 1)
            ->paginate(8);*/
        $data['students'] = DB::table('users')->latest()
        ->paginate(8);
        return view('frontend.pages.mashtor-alumini', $data);
    }

}