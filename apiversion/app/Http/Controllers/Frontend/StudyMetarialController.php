<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudyMetarialController extends Controller
{
    public function academic(){
    	return view('frontend.study_metarial.academic');
    }
    public function language(){
    	return view('frontend.study_metarial.language');
    }
    public function professional(){
    	return view('frontend.study_metarial.professional');
    }


}
