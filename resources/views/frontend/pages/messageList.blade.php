@extends('frontend.layouts.master')
@section('front-page-title',' | Marketing ')
@section('frontend-content')
<style>
	
	
.chat-box {
border: 2px solid #dedede;
background-color: #f1f1f1;
border-radius: 5px;
padding: 10px;
margin: 10px 0;
}
.darker {
border-color: #ccc;
background-color: #ddd;
}
.chat-box::after {
content: "";
clear: both;
display: table;
}
.chat-box img {
float: left;
max-width: 60px;
width: 100%;
margin-right: 20px;
border-radius: 50%;
}
.chat-box img.right {
float: right;
margin-left: 20px;
margin-right:0;
}
.time-right {
float: right;
color: #aaa;
}
.time-left {
float: left;
color: #999;
}
.ui-dialog{
	position: relative;
	z-index: 9999;
}
</style>
<br>
<br>
<div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<div class="card">
				<div class="card-header">
					All Message List
				</div>
				<div class="card-body">
					<table class="table">
						
						<tbody>
							<div id="user_details_message" class=""></div>
    						 <div id="user_model_details"></div>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@section('frontend-scripts')
<script>  
$(document).ready(function(){
	 fetch_user();

	 function fetch_user()
	 {
	  $.ajax({
	   url:"{{url('getMessage')}}",
	   method:"get",
	   success:function(data){
	   $("#user_details_message").html(data);

	   }
	  })
	 }

	  function make_chat_dialog_box(to_user_id, to_user_name)
	 {
	  var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You have chat with '+to_user_name+'">';
	  modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
	  modal_content += '</div>';
	  modal_content += '<div class="form-group">';
	  modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control"></textarea>';
	  modal_content += '</div><div class="form-group" align="right">';
	  modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
	  $('#user_model_details').html(modal_content);
	 }

	 $(document).on('click', '.start_chat', function(){
	  var to_user_id = $(this).data('touserid');
	  var to_user_name = $(this).data('tousername');
	  make_chat_dialog_box(to_user_id, to_user_name);
	  $("#user_dialog_"+to_user_id).dialog({
	   autoOpen:false,
	   width:400
	  });
	  $('#user_dialog_'+to_user_id).dialog('open');
	 });

	 $(document).on('click', '.send_chat', function(){
  var to_user_id = $(this).attr('id');
  var chat_message = $('#chat_message_'+to_user_id).val();
  $.ajax({
   url:"{{url('insertMessage')}}",
   method:"POST",
   data:{to:to_user_id, message:chat_message,_token:'{{ csrf_token() }}'},
   success:function(data)
   {
    $('#chat_message_'+to_user_id).val('');
    $('#chat_history_'+to_user_id).html(data);
   }
  })
 });


});  


</script>
@endsection
@endsection
