@extends('frontend.layouts.master')
@section('front-page-title',' | Course  ')
@section('frontend-styles')
@endsection
@section('frontend-content')
<section class="pt-3 pb-5 course-section bg-off-white">
	<div class="container">
		<div class="section-content">
			<div class="t">
				<div class="tc">
					<br><br>
					<div class="row">
						<div class="col-12">
							<form action="{{url('pro-course-search')}}" method="post">
                                @csrf
								<div class="search-box bg-pink px-5">
									<br>
									<h2 class="wid-text-red wid-header-title wid-c-font-1">Search Your Course</h2><br>
									<div class="input-group mb-3">
										<input type="text" class="form-control" placeholder="Search Your Course" aria-label="Recipient's username" aria-describedby="button-addon2" name="q">
										<div class="input-group-append">
											<button class="btn btn-outline-secondary wid-bg-red" type="submit" id="button-addon">Search</button>
										</div>
									</div> 
									<br><br>
								</div>
							</form>
							<br>
							<br>
						</div>
						@foreach($courses_d2 as $course)
						<div class="col-md-3 mb-5">
							<a href="{{url('course-details',$course->id)}}" style="text-decoration: none;">
								<div class="card" style="">
									<?php
									echo "<img src='".asset($course->image)."' class='card-img-top' alt='' style='height: 250px;width:100%;object-fit:cover;object-position:center center;'>";
									?>
									<div class="card-body">
										<h5 class="card-text">{{ str_limit($course->course_title, $limit = 20, $end = '..') }}</h5>
									</div>
									<div class="card-footer">
										<span class="float-left number2">{{$course->course_fee}}</span>
										<span class="float-right">Enroll</span>
									</div>
								</div>
							</a>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@section('frontend-scripts')
@endsection