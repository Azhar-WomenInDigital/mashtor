<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Suggestion;
use DB;
class SuggesionManageController extends Controller
{
    public function suggestionList(){
    	$data = [];
    	$data['lists'] = DB::table('suggestions')->join('users','users.id','=','suggestions.user_id')->select('suggestions.id as Sid', 'users.id as Uid','suggestions.suggesion','users.f_name','users.email')->get();
    	return view('backend.pages.suggesion.list',$data);
    }

    public function suggestionDelete($id){
    	Suggestion::destroy($id);
    	return redirect('admin/suggesion');
    }

    public function autocompleteFetch(Request $request){
    	if($request->get('query'))
     {
      $query = $request->get('query');
      $data = DB::table('users')
        ->where('f_name', 'LIKE', "%{$query}%")
        ->get();
      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
      foreach($data as $row)
      {
       $output .= '
        <li><a href="javascript: void(0);" style="text-decoration: none;padding: 10px;"><i class="far fa-user" style="padding:0px 5px;"></i>'.$row->f_name.'</a></li>';
      }
      $output .= '</ul>';
      echo $output;
     }
    }
}
