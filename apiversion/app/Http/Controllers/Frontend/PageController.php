<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Metarial;
use Auth;
class PageController extends Controller
{
    public function metarials(){
    	return view('frontend.pages.metarials');
    }
}
