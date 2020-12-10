<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class StudentController extends Controller
{
    public function studentCategory(){

    	return view('frontend.pages.profile.student.category');
    }

    public function getSubject($class){
    	 $subject = DB::table('student_profile_academics')->where('class',$class)->get();

        $output = '<select class="form-control"  name="subject"><option value="">Select</option>';
         foreach($subject as $row)
         {
          $output .= '<option value="'.$row->subject.'">'.$row->subject.'</option>';
         }
         $output .= '</select>';
         echo $output;
    }
}
