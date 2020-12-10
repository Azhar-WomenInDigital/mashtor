@extends('frontend.layouts.master')
@section('dashboard-title',' Dashboard ')
@section('frontend-content')
@if(session()->has('welcome_message'))
<br>
<br>
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
<section class="student-category-section pb-5 pt-5">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<?php
					if(Auth::user()->user_type == 1){
				?>
				<div class="studnet-category text-center">
					<h3 class="text-center text-white">My Category.....</h3> <br>
					<a href="{{url('/student/academic')}}" class="btn btn-success custom-btn">Academic</a> <br> <br>
					<a href="{{url('student/language/course')}}" class="btn btn-success custom-btn">Language Course</a> <br> <br>
					<a href="{{url('student/professional/training')}}" class="btn btn-success custom-btn">Professional Training</a> <br> <br>
				</div>
				<?php }elseif (Auth::user()->user_type == 2) { ?>
				<div class="studnet-category text-center">
					<h3 class="text-center text-white">My Category.....</h3> <br>
					<a href="{{url('/dashboard/tutor/academic')}}" class="btn btn-success custom-btn">Academic</a> <br> <br>
					<a href="{{url('tutor/language/course')}}" class="btn btn-success custom-btn">Language Course</a> <br> <br>
					<a href="{{url('/tutor/professional/training')}}" class="btn btn-success custom-btn">Professional Training</a> <br> <br>
				</div>
				<?php }else{ ?>
				<div class="card">
					<div class="card-header">
						Franchise Profile
					</div>
					<div class="card-body">
						
						<form action="{{url('dashboard')}}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<label for="">Company Name</label>
								<input type="text" class="form-control" name="company_name">
							</div>
							<div class="form-group">
								<label for=""> Upload License </label>
								<input type="file" class="form-control" name="lisence">
							</div>
							<div class="form-group">
								<label for="">Owner Name</label>
								<input type="text" class="form-control" name="owner_name">
							</div>
							<div class="form-group">
								<label for=""> Upload NID or Passport or Birth certificate copy </label>
								<input type="file" class="form-control" name="nid">
							</div>
							
							<div class="form-group">
								<label for="">Owner's Gender</label>
								<select name="owner_gender" class="form-control" id="">
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
							<div class="form-group">
								<label for="">Owner's Current Profession</label>
								<input type="text" class="form-control" name="owner_current_profession">
							</div>
							<div class="form-group">
								<label for="">Business Location ( Full Address ) </label>
								<textarea name="business_location" id="" cols="10" rows="5" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<label for=""> Bank Account Details ( If Any )  </label>
								<textarea name="bank_account_details" id="" cols="10" rows="5" class="form-control"></textarea>
							</div>
							
							<div class="form-group">
								<label for="">Type of Internet </label>
								<input type="text" class="form-control" name="type_of_internet">
							</div>
							<div class="form-group">
								<label for="">Internet Speed Srceen Short</label>
								<input type="file" class="form-control" name="internet_speed_screenshot">
							</div>
							<div class="form-group">
								<label for="">Upload Class room Picture </label>
								<input type="file" class="form-control" name="class_room_pic">
							</div>
							<div class="from-group">
								<input type="submit" class="btn btn-success custom-btn" value="Continue">
							</div>
						</form>
					</div>
				</div>
				<?php } ?>
			</div>
			
		</div>
	</div>
</section>
<!--  <section class="users-dashboard pb-5 pt-5">
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
														<a href="find_tutor.php" class="btn btn-success btn-sm custom-btn">Find a Tutor</a>
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
</section> -->
@endsection