<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Auth;
use App\User;
use Talk;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->activate_status == 1){
            return redirect('dashboard');
        }else{
            Auth::logout();
            return redirect('login');
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    } 

    public function tnrCode(){
        if(Auth::user()){
            return view('auth.tnrcode');
        }else{
            return redirect('register');
        }
    }

    public function tnrCodePost(Request $request){
        $validator = Validator::make(request()->all(),[
            'tnr_code' => 'required'
        ]);

        $users = User::where('code',Auth::user()->code)->first();
       // echo $users;
        if($users->code == $request->tnr_code){
            $users_save =  User::findOrFail(Auth::user()->id);
            $users_save->activate_status = 1;
            $users_save->save();
            return redirect('login');
        }
        $this->setError(' Sorry !! Code not match');
        return back();
    }
 

    public function filtering(Request $request){
        $data['jobCategory'] = DB::table('job_categories')->where('status',1)->get();
        $search = $request->search;
        $category = $request->category;
        $job_type = $request->job_type;
        $location = $request->location;
        // echo  $search;
        $category_type = $request->category_type;
        // echo $category_type;
        if($search != ""){
            $data['searchData'] = DB::table('jobs')
            ->select('jobs.id as jobId','jobs.job_title','jobs.job_location','jobs.degree','jobs.experience','jobs.experience_year_min','jobs.experience_year_max','companies.id as companyId','companies.image','companies.company_name','job_categories.id as jobCatId','job_categories.name')
            ->join('job_categories','job_categories.id','=','jobs.job_category_id')
            ->leftJoin('companies','companies.id','=','jobs.user_id')
            ->orWhere('job_title','LIKE','%'.$search.'%')
            ->orWhere('skills','LIKE','%'.$search.'%')
            ->orwhere('name','LIKE','%'.$search.'%')->get();

        }elseif($category_type != ""){
            $data['searchData'] = DB::table('jobs')
            ->select('jobs.id as jobId','jobs.job_title','jobs.job_location','jobs.degree','jobs.experience','jobs.experience_year_min','jobs.experience_year_max','companies.id as companyId','companies.image','companies.company_name','job_categories.id as jobCatId','job_categories.name')
            ->join('job_categories','job_categories.id','=','jobs.job_category_id')
            ->leftJoin('companies','companies.id','=','jobs.user_id')
            ->where('category_type','LIKE','%'.$category_type.'%')->get();
        }elseif($job_type != ""){
            $data['searchData'] = DB::table('jobs')
            ->select('jobs.id as jobId','jobs.job_title','jobs.job_location','jobs.degree','jobs.experience','jobs.experience_year_min','jobs.experience_year_max','companies.id as companyId','companies.image','companies.company_name','job_categories.id as jobCatId','job_categories.name')
            ->join('job_categories','job_categories.id','=','jobs.job_category_id')
            ->leftJoin('companies','companies.id','=','jobs.user_id')
            ->where('employment_status','LIKE','%'.$job_type.'%')->get();
        }
        elseif($location != ""){
            $data['searchData'] = DB::table('jobs')
            ->select('jobs.id as jobId','jobs.job_title','jobs.job_location','jobs.degree','jobs.experience','jobs.experience_year_min','jobs.experience_year_max','companies.id as companyId','companies.image','companies.company_name','job_categories.id as jobCatId','job_categories.name')
            ->join('job_categories','job_categories.id','=','jobs.job_category_id')
            ->leftJoin('companies','companies.id','=','jobs.user_id')
            ->where('job_location','LIKE','%'.$location.'%')->get();
        }else{
            $data['searchData'] = DB::table('jobs')
            ->select('jobs.id as jobId','jobs.job_title','jobs.job_location','jobs.degree','jobs.experience','jobs.experience_year_min','jobs.experience_year_max','companies.id as companyId','companies.image','companies.company_name','job_categories.id as jobCatId','job_categories.name')
            ->join('job_categories','job_categories.id','=','jobs.job_category_id')
            ->leftJoin('companies','companies.id','=','jobs.user_id')
            // ->where('job_title','LIKE','%'.$search.'%')
            // ->orWhere('skills','LIKE','%'.$search.'%')
            ->where('name','LIKE','%'.$search.'%')
            ->where('category_type','LIKE','%'.$category_type.'%')->get();
        }
       
        return view('frontend.pages.search',$data);
    }


//     public function messanger(){
//         // $inboxes = Talk::user(auth()->user()->id)->threads();
//        $inboxes[] = getInbox([$order = 'desc'[,$offset = 0[, $take = 20]]]);
// return view('messanger', compact('inboxes'));
        
//     }

}
