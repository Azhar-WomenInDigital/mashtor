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
				{{$notification->f_name}}
				{{$notification->l_name}}
			</div>
			<div class="card-body">
				<div class="notification-list">
					
					<div class="notification shadow-sm p-3">
						<form action="{{url('session/accept',$notification->session_id)}}" method="post">
							@csrf
							<button type="submit" class="btn btn-success custom-btn float-right">Accept</button>
						</form>
							<h5><b>Email : </b> {{$notification->email}} </h5>
							<h5><b>Number : </b> {{$notification->number}} </h5> <br><br>
							<h5><b>Subject : </b> {{$notification->subject}} </h5>
							<h5><b>Session : </b> {{$notification->session}} </h5>
							<h5><b>Session Type : </b> {{$notification->session_type}} </h5>
							<h5><b>Schedule : </b> {{$notification->time}} {{$notification->date}} </h5>
							{{$notification->message}}

							<small class="text-muted float-right clear">{{$notification->created_at}}</small>
							<br>
						
					</div>
					
				

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