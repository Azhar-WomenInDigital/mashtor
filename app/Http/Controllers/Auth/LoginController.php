<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use DB;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     if (Auth::user())
    //     {
    //         $this->redirectTo = route('user.dashboard');
    //     } 
    //     $this->middleware('guest')->except('logout');
    // }


    // check if authenticated, then redirect to dashboard
    protected function authenticated() {
        if (Auth::check()) {
            return redirect()->route('user.dashboard');
        }
        $this->middleware('guest')->except('logout');
    }

    

    
}
