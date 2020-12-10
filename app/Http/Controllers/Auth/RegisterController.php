<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Session;
use Illuminate\Support\Facades\Input;
use App\DiscountCode;
use App\Rules\CheckDiscountCode;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'number' => ['required','Numeric',  'unique:users','regex:/(01)[0-9]{9}/'],
            'nid' => ['required'],
            'fullname' => ['required'],
            'discount_code' => ['nullable', new CheckDiscountCode],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $nid ='null';
        if (Input::file('nid')) {
            $destinationPath = 'uploads/nid/';
            $extension = Input::file('nid')->getClientOriginalExtension();
            $filename = uniqid().'.'.$extension;
            $image_url = $destinationPath . $filename;
            $nid = Input::file('nid')->move($destinationPath, $filename);

        }
        return User::create([
            'number' => $data['number'],
            'fullname' => $data['fullname'],
            'nid' => $nid,
            'email' => $data['email'],
            'discount_code' => $data['discount_code'],
            'password' => Hash::make($data['password']),
             
            
        ]);
    }
}
 