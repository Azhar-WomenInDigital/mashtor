@extends('frontend.layouts.master')
@section('front-page-title',' | Course  ')
@section('frontend-styles')
@endsection
@section('frontend-content')
<section class="section pt-3 bg-off-white"><br>
	<div class="container">
		<div class="row mt-5 pb-4 mb-2">
			<div class="col-12 pb-5">
				<form action="{{url('course-search')}}" method="post">
					@csrf
					<div class="search-box bg-pink px-5">
						<br>
						<h2 class="wid-text-red wid-header-title wid-c-font-1 text-white">Search Your Course</h2> <br>
						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="Search Your Course" aria-label="Recipient's username" aria-describedby="button-addon2" name="q">
							<div class="input-group-append">
								<button class="btn btn-dark" type="submit" id="button-addon">Search</button>
							</div>
						</div> 
						<br><br>
					</div>
			    </form>
				<br>
			</div>
		</div>
		<div class="row justify-content-center">
			<?php
				if(isset($courses) && !empty($courses)){
					foreach($courses as $data){
			?>
			<div class="col-md-3 mb-5">
				<?php
					if($data->course_cat == 3){
				?>
				<a href="{{url('school-program',$data->id)}}" style="text-decoration: none;">
					<?php }elseif ($data->course_cat == 4) {
					?>
					<a href="{{url('language-course',$data->id)}}">
						<?php
							}
						?>
						<a href="{{url('school-program', $data->id)}}" style="text-decoration: none;">
							<div class="card">
								<img src="{{ url($data->image) }}" alt="{{ $data->course_title }}" class="card-img-top" height="250px" width="100%" style="object-fit: cover; object-position: center;">
								<div class="card-body text-center">
									<h5 class="card-text">{{ str_limit($data->course_title, $limit = 20, $end = '..') }}</h5>
								</div>
								<div class="card-footer">
									<span class="float-left number2"> {{$data->price}}</span>
									<span class="float-right">Enroll</span>
								</div>
							</div>
						</a>
					</a>
				</a>
			</div>
			<?php
				}
					}
			?>
		</div>
	</div>
</section>
@endsection