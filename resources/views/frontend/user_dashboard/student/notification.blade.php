@extends('frontend.layouts.dashboard_mastering')
@section('dashboard-title',' Dashboard ')
@section('frontend-content')
<style>
	.notification a{
		text-decoration: none;
	}
</style>
<section class="tutor-profile-apporaval pb-5 pt-5">
	<div class="container">
		
		<div class="row">
			<div class="col-md-8 offset-md-2">
				
			
		<div class="card">
			<div class="card-header">
				Notification 
			</div>
			<div class="card-body">
				<div class="notification-list">
				<?php
					if(isset($notification) && !empty($notification)){
				?>
					<div class="notification shadow-sm p-3">
						
							<h5>{{$notification->f_name}}</h5>
							{{$notification->message}}
							<small class="text-muted float-right">{{$notification->created_at}}</small>
						 <br><br>
						<form action="{{url('student/session/accept',$notification->session_id)}}" method="post">
							@csrf
							<input type="hidden" name="seenOrunseend" value="1">
							<button type="submit" class="btn btn-success custom-btn">Session Start</button>
						</form>
						
					</div>
				<?php } ?>
				
				</div>
			</div>
		</div>
	
		
		</div>
		</div>
	</div>
</section>
@section('frontend-scripts')

@endsection
@endsection