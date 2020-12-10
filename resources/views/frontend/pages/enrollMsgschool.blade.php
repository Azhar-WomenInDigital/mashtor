@extends('frontend.layouts.master')
@section('front-page-title',' | Course  ')
@section('frontend-content')
<br>
<br>
<section class="pt-5 pb-5 course-section bg-off-white">
	
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-body">
						<?php
							// echo Session::get('enroll_data.course_id');
							$coursename = DB::table('courses')->where('id',Session::get('enroll_data.course_id'))->first();

						?>
						
						<div class="msg text-center">
							<h3 class="text-danger">Course Enrollment</h3>
							<p> {{$coursename->name}}  </p>
							<hr>
							<h2 class="text-danger">Your Interest has been recorded.</h2>
							<p>Our Representative from Mashtor.com  will Contact with you. <br>
							Thank You</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</section>
@endsection