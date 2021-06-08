<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Message;
use Auth;
use DB;
class MessageController extends Controller
{
    public function index(Request $request,$id){
    	$message = new Message();
    	$message->from = Auth::user()->id;
    	$message->to = $id;
    	$message->message = $request->message;
    	$message->save();
    	return back();
    }

    public function messageList(){

    	return view('frontend.pages.messageList');

        
    }

    public function chatMessage(Request $request){
        Message::create($request->all());
        return json_encode(array(
            "statusCode"=>200
        ));
    }

    public function getMessage(){
        $result = DB::table('messages')
                ->select('messages.*','users.*','messages.id as message_id')
                ->leftJoin('users','users.id','=','messages.to')
                ->where('from',Auth::user()->id)->groupBy('messages.to')->get();


        $output = '
        <table class="table table-bordered table-striped">
         <tr>
          <td>name</td>
          <td>Status</td>
          <td>Action</td>
         </tr>
        ';

        foreach($result as $row)
        {
         $output .= '
         <tr>
          <td>'.$row->f_name.'</td>
          <td></td>
          <td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row->id.'" data-tousername="'.$row->f_name.'">Start Chat</button></td>
         </tr>
         ';
        }

        $output .= '</table>';
//return $output;
       echo $output;
    }

    public function fatch_user_chat_history($to_user_id,$from_user_id){
        $data = DB::table('messages')
        ->select('messages.*','users.*','messages.id as message_id')
        ->leftJoin('users','users.id','=','messages.from')
        ->where('messages.from',$from_user_id)
        ->where('messages.to',$to_user_id)
        ->orWhere('messages.from',$to_user_id)
        ->orderBy('messages.created_at','desc')
        ->get();

        $output = '<ul class="list-unstyled">';
        foreach($data as $row){
            $f_name = '';
            if($row->from == $from_user_id){
                $f_name = '<b class="text-success">You</b>';
            }else{
                $f_name = '<b class="text-success">'.$row->f_name.'</b>';
            }
            $output .='
                <li style="border-bottom:1px solid dotted #ccc">
                    <p>'.$f_name. '-' .$row->message.'</p>
                </li>
            ';
        }
        $output .='</ul>';
        return $output;
    }


    public function insertMessage(Request $request){
        $msg = new Message();
        $msg->to = $request->to;
        $msg->from = Auth::user()->id;
        $msg->message = $request->message;
        $msg->save();
       if(isset($msg))
        {
         echo $this->fatch_user_chat_history(Auth::user()->id, $msg->to);
        }

        
    }

    public function msg(Request $request){
        $msg = new Message;
        $msg->messages = $request->message;
        $msg->save();
        return back();
    }
}
