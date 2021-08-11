@extends('frontend.layouts.master')
@section('front-page-title',' | Course  ')
@section('frontend-styles')
@endsection
@section('frontend-content')
<section class="section pt-3">
	<div class="container">
		<div class="row mt-5 mb-5">
			<div class="col-12 ">
				<form action="{{url('course-search')}}" method="post">
                    @csrf
					<div class="search-box bg-pink px-5">
						<br>
						<h2 class="wid-text-red wid-header-title wid-c-font-1">Search Your Course</h2> <br>
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
			</div>
			
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
						<div class="card" style="">
							<?php
							echo "<img src='".asset($data->image)."' class='card-img-top' alt='' style='height: 250px;width:100%;object-fit:cover;object-position:center center;'>";
							?>
							<div class="card-body text-center">
								<h5 class="card-text">{{ str_limit($data->course_title, $limit = 20, $end = '..') }}</h5>	
							</div>
							<div class="card-footer">
								<span class="float-left number2">Tk: {{$data->price}}</span>
								<span class="float-right">Enroll</span>
							</div>
						</div>
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
@section('frontend-scripts')
@endsection