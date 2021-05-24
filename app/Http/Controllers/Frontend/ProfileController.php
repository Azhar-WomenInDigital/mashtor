<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input as input;
use Session;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.pages.profile.profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function account()
    {
        return view('frontend.pages.profile.account');
    }

    public function changePassword()
    {
        $user = User::find(Auth::user()->id);
        if (Hash::check(Input::get('passwordOld'), $user['password']) && Input::get('password') == Input::get('password_confirmation')) {
            $user->password = bcrypt(Input::get('password'));
            $user->save();
            Session::flash('success', 'Update  Successfully !');
            return redirect('logout');
        } else {
            Session::flash('error', 'Sorry Failed !!');
            return back();
        }
    }

    public function deleteAccount()
    {
        return view('frontend.pages.profile.deleteAccount');
    }

    public function deleteAccountfinally($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        $this->setSuccess(' Deleted!!');
        return redirect('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrfail($id);
        $user->fullname = $request->fullname;
        $user->number = $request->number;
        $image = $request->file('image');
        if ($image) {
            $image_name = Auth::user()->id . time() . '.' . request()->image->getClientOriginalExtension();

            $image_full_name = $image_name;
            $destination_path = 'uploads/user/profile/pic/';
            $image_url = $destination_path . $image_full_name;
            $success = $request->file('image')->move($destination_path, $image_full_name);
            if ($success) {
                $user->image = $image_url;
            }
        }
        $user->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}