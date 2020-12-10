@extends('frontend.layouts.dashboard_mastering')
@section('dashboard-title',' Dashboard ')
@section('user-deshboard-content')
<style>
	video {
	  width: 100%;
	  height: auto;
	}

</style>
@if(session()->has('welcome_message'))
<section class="page-content-user-dashboard pb-5">
	<div class="">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="mt-5">Welcome, {{Auth::user()->f_name}} {{Auth::user()->l_name}} ! <i class="fas fa-grin"></i></h3>
				</div>
			</div>
		</div>
	</div>
</section>
@endif
<section class="users-dashboard pb-5 pt-5">
	<div class="container">
		
		
		<br>
		<div class="row">
			<div class="col-md-8">
				<div class="dashboard-content-left">
					<div class="card">
						<div class="card-header">
							Upcoming Sessions <span class="float-right"> <a href="">view all</a> </span>
						</div>
						<div class="card-body">
							<p class="card-text">There are no upcoming sessions.</p> <br>
							<a href="{{url('dashboard/find/tutor')}}" class="btn btn-success btn-sm custom-btn">Find a Tutor</a>
						</div>
					</div>
					<br><br>
					<div class="card">
						<div class="card-header">
							Pending Sessions <span class="float-right"> <a href="">view all</a> </span>
						</div>
						<div class="card-body">
							<p class="card-text">There are no upcoming sessions.</p> <br>
							<a href="#" class="btn btn-success btn-sm custom-btn">Find a Tutor</a>
						</div>
					</div>
					<br><br>
					<div class="card">
						<div class="card-header">
							Past Sessions <span class="float-right"> <a href="">view all</a> </span>
						</div>
						<div class="card-body">
							<p class="card-text">There are no upcoming sessions.</p> <br>
							<a href="#" class="btn btn-success btn-sm custom-btn">Find a Tutor</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="user-dashboard-content-right">
					<div class="card">
						<div class="card-header">
							My Tutors <span class="float-right"> <a href="">view all</a> </span>
						</div>
						<div class="card-body">
							<p class="card-text">You have not had a session with a tutor yet.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">Vedio Title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<video width="400" controls>
					<source src="{{url('01.mp4')}}" type="video/mp4">
					<source src="{{url('01.ogg')}} " type="video/ogg">
					Your browser does not support HTML5 video.
				</video>
			</div>
			<!-- <div class="modal-footer">
				
				<button type="button" class="btn btn-primary">Close</button>
			</div> -->
		</div>
	</div>
</div>
@endsection