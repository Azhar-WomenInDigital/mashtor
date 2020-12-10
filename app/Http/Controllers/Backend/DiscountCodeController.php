<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\CourseCategory;
use App\DiscountCode;
class DiscountCodeController extends Controller
{
    public function index(){
    	$data = [];
    	$data['discounts'] = DiscountCode::all();
    	return view('backend.pages.discountcode.index',$data);
    }
    public function create(){
    	$data = [];
    	$data['coursecategory'] = CourseCategory::all();
    	return view('backend.pages.discountcode.create',$data);
    }

    public function store(Request $request){
    	$discountcode = new DiscountCode();
    	$discountcode->company_name = $request->company_name;
    	$discountcode->discount = $request->discount;
    	$discountcode->discount_code = $request->discount_code;
    	$discountcode->course_category = $request->course_category;
    	$discountcode->save();
    	$this->setSuccess('Successfully Created');
    	return back();
    }
}
