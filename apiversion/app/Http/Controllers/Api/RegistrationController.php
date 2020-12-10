<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Auth;
use Session;
use Response;
class RegistrationController extends Controller
{
    public function registerGet(){
     	return response()->json(User::get(),200);
    }

	public $successStatus = 200;
    /** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function login(){ 
        if(Auth::attempt(['phone' => request('phone'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
           // return response()->json(['success' => $success], $this-> successStatus); 
				return Response::json(array(
				    'message' => 'User registered successfully',
				    'error' =>false,
				    'user' => $user,
				));	
        	} 
	        else{ 
	            return response()->json(['error'=>'Unauthorised'], 401); 
	        } 
    	}
    /** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function register(Request $request) 
    { 

        
        $validator = Validator::make($request->all(), [   
			'number' => ['required', 'regex:/(01)[0-9]{9}/', 'max:255','unique:users'],
			'email' => ['required','unique:users'],
			'fullname' => ['required'],
			'nid' => ['required'],
		    'password' => ['required', 'string', 'min:8', 'confirmed'],   
		]);
		if ($validator->fails()) { 
		            return response()->json(['error'=>$validator->errors()], 401);            
		}

		$input = $request->all(); 
                //$input['code'] = $six_digit_random_number;
		$input['password'] = bcrypt($input['password']); 
        $user = User::create($input);
        
		$success['token'] =  $user->createToken('MyApp')-> accessToken; 
		$success['fullname'] =  $user->fullname;
        if($user){
            // $user->code=SendCode::sendcodefsd($user->phone);
            $user->save();  
        }
		return Response::json(array(
		    'message' => 'User registered successfully',
		    'error' =>false,
		    'user' => $user,  
		));	 
	}
    /** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function details() 
    { 
        $user = Auth::user(); 
        return response()->json(['success' => $user], $this-> successStatus); 
    } 
    public function service(){
      return response()->json(Services::get(),200);
    }

    public function serviceSave(Request $request) 
    { 
        
    
    $input = $request->all(); 
            
            $user = Services::create($input); 
            
            $success['name'] =  $user->service;
    return response()->json(['success'=>$success], $this-> successStatus); 
    }

public function codePost(Request $request){
        
    $validator = Validator::make(request()->all(),[
            'code' => 'required'
           
        ]);
$user_id = Session::get('user.code'  );
         if(isset($user_id )){
        $users = User::where('code',$user_id )->first();
       // echo $users;
        if($users->code == $request->code){
        
            
           return response()->json('success');
        }
        return response()->json('Not Match');
    
}else{
return response()->json('Login First');
}
}

}
