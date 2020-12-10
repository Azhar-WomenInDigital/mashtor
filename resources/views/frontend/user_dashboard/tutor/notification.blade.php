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
				Notification List
			</div>
			<div class="card-body">
				<div class="notification-list">
					@foreach($notification as $data)
					<div class="notification shadow-sm p-3">
						<a href="{{url('tutor/notification',$data->id)}}">
							<h5>{{$data->f_name}}</h5>
							{{$data->message}}
							<small class="text-muted float-right">{{$data->created_at}}</small>
						</a>
					</div>
					
					@endforeach

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