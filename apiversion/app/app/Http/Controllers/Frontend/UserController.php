<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
class UserController extends Controller
{

    public function userType(){
    	return view('frontend.pages.user_type');
    }

    public function userTypePost(Request $request){
    	
    	$user_type = $request->user_type;
        Session::put('user_type', $user_type);
	    return redirect('register');
	    
    }
}
