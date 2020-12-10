<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Auth;
use App\Language;
use App\ProfessionalTraning;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input as input;
use App\User;
use App\StudentLanguage;
use App\StudentProfessinal;
use App\StudentProfileAcademic;
class UserDashboardController extends Controller
{

    public function main_dashboard(){
        return view('frontend.user_dashboard.main_dashboard');
    }

    public function dashboard(){
    	$welcome_message = Auth::user()->f_name;
    	Session::flash('welcome_message','Hello');
    	return view('frontend.user_dashboard.dashboard');
    }

    public function dashboard_profile(){
    	return view('frontend.user_dashboard.dashboard_profile');
    }

    public function dashboard_category(){
    	return view('frontend.user_dashboard.category');
    }

    // Academic Route 
    public function dashboard_academic(){
    	return view('frontend.user_dashboard.academic');
    }
    public function dashboard_academic_post(Request $request){
        return redirect('dashboard');
    }

    public function student_category_save(Request $request){
        $academic = new StudentProfileAcademic();
        $academic->class = $request->class;
        $academic->medium = $request->medium;
        $academic->group = $request->group;
        $academic->subject =  $request->subject;
        $academic->user_id = Auth::user()->id;
        $academic->save();
        return redirect('student/dashboard');
    }


    public function student_language_course(){
        $data = [];
        $data['languages_learn'] = Language::where('status',1)->where('language_cat',1)->get();
        $data['languages_learn_from'] = Language::where('status',1)->where('language_cat',2)->get();
    	return view('frontend.user_dashboard.student.language_course',$data);
    }

    public function student_language_course_post(Request $request){
        $lan = new StudentLanguage();
        $lan->user_id = Auth::user()->id;
        $lan->tutor_language_type = $request->tutor_language_type;
        $lan->language_want_form_learn = $request->language_want_form_learn;
        $lan->language_want_to_learn = $request->language_want_to_learn;
        $lan->save();
        return redirect('student/dashboard');
    }

    public function professionalTraining(){
        $data = [];
        $data['traning'] = ProfessionalTraning::where('status',1)->get();
    	return view('frontend.user_dashboard.student.professional_training',$data);
    }

    public function professionalTrainingPost(Request $request){
        $pro = new StudentProfessinal();
        $pro->user_id = Auth::user()->id;
        $pro->traning = $request->traning;
        $pro->save();
        return redirect('student/dashboard');
    }

    public function profileSetting(){
      return view('frontend.user_dashboard.changePassword');
    }

    public function changePassword(Request $request){
        $validator = Validator::make(request()->all(),[
            
            'password'=> 'required|confirmed|min:8'
            
           
        ]);
        $user = User::find(Auth::user()->id);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try{
            
            if(Input::get('password') == Input::get('password_confirmation')){
            $user->password = bcrypt(Input::get('password'));
            $user->save();
            $this->setSuccess('Account Create Successfully');
              return redirect()->route('logout');
        }else{
            $this->setError('Error !!');
            return back();
        }
        }catch(\Exception $e){
            
            $this->setError($e->getMessage());
        }
        
    }
}
