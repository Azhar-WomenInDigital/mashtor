<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;
use App\User;
use App\AboutTutor;
use App\Message;
use App\Models\Backend\Level;
use App\Models\Backend\Faculty;
use App\Models\Backend\Subject;
use Spatie\Searchable\Search;
class SearchController extends Controller
{
    public function search(Request $request){
        $search = Input::get ( 'search' );

        $data = [];

        
        if($search != ""){
           $data['tutors'] = DB::table('users')
                            ->select('users.id as userId','users.f_name','users.l_name','users.user_type','users.email','tutor_basic_infos.*','which_subject_teaches.*')
                            ->leftJoin('tutor_basic_infos','users.id','=','tutor_basic_infos.user_id')
                            ->leftJoin('which_subject_teaches','users.id','=','which_subject_teaches.user_id')
                            ->leftJoin('levels','levels.id','=','which_subject_teaches.level')
                            ->leftJoin('subjects','subjects.id','=','which_subject_teaches.subject')
                            ->orWhere('f_name', 'LIKE', '%'.$search.'%')
                            ->orWhere('l_name', 'LIKE', '%'.$search.'%')
                            ->orWhere('which_subject_teaches.level', 'LIKE', '%'.$search.'%')
                            ->orWhere('levels.level', 'LIKE', '%'.$search.'%')
                            ->orWhere('subjects.subject', 'LIKE', '%'.$search.'%')
                            ->orWhere('which_subject_teaches.subject', 'LIKE', '%'.$search.'%')
                            ->orWhere('tnr', 'LIKE', '%'.$search.'%')
                            ->where('users.user_type',2)
                            ->where('users.status',1)
                            ->get();
                            
        }else{
            echo "Not Found";
        }
           
        //     $searchResults = (new Search())
        //     ->registerModel(Company::class, 'name')
        //     ->registerModel(Category::class, 'name')
        //     ->perform($request->input('query'));



    
        // }
         
        
        $data['levels'] = Level::where('status',1)->get();
        $data['facultys'] = Faculty::where('status',1)->get();
        $data['subjects'] = Subject::where('status',1)->get();

        // $data['tutors'] = DB::table('users')
        //                     ->select('users.id as userId','users.f_name','users.l_name','users.user_type','users.email','tutor_profile_intros.*','about_tutors.*')
        //                     ->leftJoin('tutor_profile_intros','users.id','=','tutor_profile_intros.user_id')
        //                     ->leftJoin('about_tutors','users.id','=','about_tutors.user_id')
        //                     ->where('users.user_type',2)
        //                     ->where('users.status',1)
        //                     ->paginate(5);
        return view('frontend.pages.search',$data);
    }


    public function searchTutor(Request $request){

        $data = [];

        $item = Input::get ('item');
        $location = Input::get ('location');

        if($item != ""){
           $data['tutors'] = DB::table('users')
                            ->select('users.id as userId','users.f_name','users.l_name','users.user_type','users.email','users.country','users.district','users.upozila','tutor_basic_infos.*','which_subject_teaches.*')
                            ->leftJoin('tutor_basic_infos','users.id','=','tutor_basic_infos.user_id')
                            ->leftJoin('which_subject_teaches','users.id','=','which_subject_teaches.user_id')
                            ->leftJoin('levels','levels.id','=','which_subject_teaches.level')
                            ->leftJoin('subjects','subjects.id','=','which_subject_teaches.subject')
                            ->orWhere('f_name', 'LIKE', '%'.$item.'%')
                            ->orWhere('l_name', 'LIKE', '%'.$item.'%')
                            ->orWhere('country', 'LIKE', '%'.$location.'%')
                            ->orWhere('users.district', 'LIKE', '%'.$location.'%')
                            ->orWhere('upozila', 'LIKE', '%'.$location.'%')
                            ->orWhere('which_subject_teaches.level', 'LIKE', '%'.$item.'%')
                            ->orWhere('levels.level', 'LIKE', '%'.$item.'%')
                            ->orWhere('subjects.subject', 'LIKE', '%'.$item.'%')
                            ->orWhere('which_subject_teaches.subject', 'LIKE', '%'.$item.'%')
                            ->orWhere('tnr', 'LIKE', '%'.$item.'%')
                            ->where('users.user_type',2)
                            ->where('users.status',1)
                            ->get();
                            
        }elseif($location != ""){
            $data['tutors'] = DB::table('users')
                            ->select('users.id as userId','users.f_name','users.l_name','users.user_type','users.email','users.country','users.district','users.upozila','tutor_basic_infos.*')
                            ->leftJoin('tutor_basic_infos','users.id','=','tutor_basic_infos.user_id')
                            ->orWhere('country', 'LIKE', '%'.$location.'%')
                            ->orWhere('users.district', 'LIKE', '%'.$location.'%')
                            ->orWhere('upozila', 'LIKE', '%'.$location.'%')
                            ->where('users.user_type',2)
                            ->where('users.status',1)
                            ->get();
        }else{
            echo "Not Found";
        }
           
        //     $searchResults = (new Search())
        //     ->registerModel(Company::class, 'name')
        //     ->registerModel(Category::class, 'name')
        //     ->perform($request->input('query'));



    
        // }
         
        
        $data['levels'] = Level::where('status',1)->get();
        $data['facultys'] = Faculty::where('status',1)->get();
        $data['subjects'] = Subject::where('status',1)->get();

        return view('frontend.pages.searchTutor',$data);
    }

    public function checkboxSearch(){

        $data = [];
         $data['tutors'] = DB::table('users')
                            ->select('users.id as userId','users.f_name','users.l_name','users.user_type','users.email','users.country','users.district','users.upozila','tutor_basic_infos.*','which_subject_teaches.*')
                            ->leftJoin('tutor_basic_infos','users.id','=','tutor_basic_infos.user_id')
                            ->leftJoin('which_subject_teaches','users.id','=','which_subject_teaches.user_id')
                            ->leftJoin('levels','levels.id','=','which_subject_teaches.level')
                            ->leftJoin('subjects','subjects.id','=','which_subject_teaches.subject')
                           
                            ->where('users.user_type',2)
                            ->where('users.status',1)
                            ->get();
        $data['levels'] = Level::where('status',1)->get();
        $data['facultys'] = Faculty::where('status',1)->get();
        $data['subjects'] = Subject::where('status',1)->get();

        return view('frontend.pages.tutor_checkbox_search',$data);

    }


    public function filterTutor(Request $request){

        $data = [];

        $institute = Input::get ('institute');
        $university = Input::get ('university');
        $level = Input::get ('level');
        $gender = Input::get ('gender');
        $location = Input::get ('location');

        if($university != ""){
             $data['tutors'] = DB::table('users')
                            ->select('users.id as userId','users.f_name','users.l_name','users.user_type','users.email','users.country','users.district','users.upozila','tutor_basic_infos.*','which_subject_teaches.*')
                            ->leftJoin('tutor_education','users.id','=','tutor_education.user_id')
                           ->leftJoin('tutor_basic_infos','users.id','=','tutor_basic_infos.user_id')
                            ->leftJoin('which_subject_teaches','users.id','=','which_subject_teaches.user_id')
                            ->leftJoin('levels','levels.id','=','which_subject_teaches.level')
                            ->leftJoin('subjects','subjects.id','=','which_subject_teaches.subject')
                            ->orWhere('tutor_education.institute', 'LIKE', '%'.$university.'%')
                            
                            ->where('users.user_type',2)
                            ->where('users.status',1)
                            ->get();
        }elseif($level != ""){
            $data['tutors'] = DB::table('users')
                            ->select('users.id as userId','users.f_name','users.l_name','users.user_type','users.email','users.country','users.district','users.upozila','tutor_basic_infos.*','which_subject_teaches.*')
                            ->leftJoin('tutor_education','users.id','=','tutor_education.user_id')
                           ->leftJoin('tutor_basic_infos','users.id','=','tutor_basic_infos.user_id')
                            ->leftJoin('which_subject_teaches','users.id','=','which_subject_teaches.user_id')
                            ->leftJoin('levels','levels.id','=','which_subject_teaches.level')
                            ->leftJoin('subjects','subjects.id','=','which_subject_teaches.subject')
                            ->orWhere('levels.id', 'LIKE', '%'.$level.'%')
                            
                            ->where('users.user_type',2)
                            ->where('users.status',1)
                            ->get();
        }elseif($gender != ""){
            $data['tutors'] = DB::table('users')
                            ->select('users.id as userId','users.f_name','users.l_name','users.user_type','users.email','users.country','users.district','users.upozila','users.gender','tutor_basic_infos.*','which_subject_teaches.*')
                            ->leftJoin('tutor_education','users.id','=','tutor_education.user_id')
                           ->leftJoin('tutor_basic_infos','users.id','=','tutor_basic_infos.user_id')
                            ->leftJoin('which_subject_teaches','users.id','=','which_subject_teaches.user_id')
                            ->leftJoin('levels','levels.id','=','which_subject_teaches.level')
                            ->leftJoin('subjects','subjects.id','=','which_subject_teaches.subject')
                            
                            ->orWhere('users.gender', 'LIKE', '%'.$gender.'%')
                            ->where('users.user_type',2)
                            ->where('users.status',1)
                            ->get();
        }elseif($location != ""){
            $data['tutors'] = DB::table('users')
                            ->select('users.id as userId','users.f_name','users.l_name','users.user_type','users.email','users.country','users.district','users.upozila','users.gender','tutor_basic_infos.*','which_subject_teaches.*')
                            ->leftJoin('tutor_education','users.id','=','tutor_education.user_id')
                           ->leftJoin('tutor_basic_infos','users.id','=','tutor_basic_infos.user_id')
                            ->leftJoin('which_subject_teaches','users.id','=','which_subject_teaches.user_id')
                            ->leftJoin('levels','levels.id','=','which_subject_teaches.level')
                            ->leftJoin('subjects','subjects.id','=','which_subject_teaches.subject')
                            
                            ->orWhere('country', 'LIKE', '%'.$location.'%')
                            ->orWhere('users.district', 'LIKE', '%'.$location.'%')
                            ->orWhere('upozila', 'LIKE', '%'.$location.'%')
                            ->where('users.user_type',2)
                            ->where('users.status',1)
                            ->get();
        }

        $data['levels'] = Level::where('status',1)->get();
        $data['facultys'] = Faculty::where('status',1)->get();
        $data['subjects'] = Subject::where('status',1)->get();
        return view('frontend.pages.filter',$data);
    }
}
