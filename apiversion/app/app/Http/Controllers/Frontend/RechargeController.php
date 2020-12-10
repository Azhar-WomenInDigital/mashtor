<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Recharge;
use Illuminate\Support\Facades\Validator;
use Auth;
use Session;
class RechargeController extends Controller
{

    public function account(){
    	return view('frontend.wallet.account');
    }
    public function recharge(){
        return view('frontend.wallet.recharge');
    }

    public function rechargeProcced(){
    	return view('frontend.wallet.recharge_procced');
    }

    public function rechargeSave(Request $request){
    	$validator = Validator::make(request()->all(),[
            'amount' => 'required|numeric|min:100|not_in:0',
           
        ]);
        
    
		if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
	    	$recharge = new Recharge();
	    	$recharge->user_id = Auth::user()->id;
	    	$recharge->user_email =  Auth::user()->email;
	    	$recharge->amount = $request->amount;
	    	Session::put('amount',$recharge);
	    	$recharge->save();
    		

    		return redirect('payment');
    }

    public function payment(){
    	$data = [];
    	$data['recharge'] = Recharge::where('user_id',Auth::user()->id)->first();
    	return view('frontend.wallet.card',$data);
    }
}
