@extends('frontend.layouts.dashboard_mastering')
@section('dashboard-title',' Dashboard ')
@section('frontend-styles')
@endsection
@section('frontend-content')
<section class="search-bar pb-2 pt-sm-3 pt-md-4 pt-lg-5">
	<br>
	<div class="container">
		<form action="{{url('search/find/tutoring')}}" method="post">
			@csrf
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control custom-form-control" placeholder=" Enter a subject,course,or tutor name " name="item">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<input type="text" name="location" class="form-control  custom-form-control" placeholder="Location " name="location">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<input type="text" name="location" class="form-control  custom-form-control" placeholder="Enter Country Name " name="location">
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<input type="submit" class="btn btn-success custom-btn" value="Search">
					</div>
				</div>
			</div>
		</form>
	</div>
</section>
<section class="find-tutor-section pb- pt-5">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="sidebar">
					<div class="form-group row">
						<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Sort By</label>
						<div class="col-sm-9">
							<select name="" class="form-control custom-form-control" id="">
								<option value="">Best Match</option>
							</select>
						</div>
					</div>
					<br>
					<div class="card p-2 custom-card">
						<div class="hourly-rate">
							<p><b>Institute</b></p><br>
							<div class="input-group mb-3">
								<input type="text" class="form-control" placeholder="Serach" aria-label="Recipient's username" aria-describedby="button-addon2">
							</div>
							<?php
								$university = DB::table('university_names')->get();
								if(isset($university)){
							?>
							@foreach($university as $name)
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="{{$name->id}}" value="{{$name->id}}">
								<label class="custom-control-label" for="{{$name->id}}">  {{$name->name}} </label>
							</div>
							@endforeach
							<?php } ?>
						</div> 
						<br> 
						<hr>
						<div class="level-rate">
							<p><b>Level</b></p><br>
							@foreach($levels as $level)
							<div class="custom-control custom-checkbox">
								<input type="checkbox" name="level" class="custom-control-input level_id" value="{{$level->id}}" id="{{$level->id}}">
								<label class="custom-control-label" for="{{$level->id}}">{{$level->level}}</label>
							</div>
							@endforeach
						</div><hr>
						<div class="level-rate">
							<p><b>Gender</b></p><br>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="Male">
								<label class="custom-control-label" for="Male">  Male</label>
							</div>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="Female">
								<label class="custom-control-label" for="Female">Female</label>
							</div>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="Any">
								<label class="custom-control-label" for="Any">Any</label>
							</div>
						</div><hr>
						<div class="level-rate">
							<p><b>Location</b></p><br>
							<div class="input-group mb-3">
								<input type="text" class="form-control" placeholder="Serach" aria-label="Recipient's username" aria-describedby="button-addon2">
							</div>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="Dhaka">
								<label class="custom-control-label" for="Dhaka">  Dhaka </label>
							</div>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="Chattogram">
								<label class="custom-control-label" for="Chattogram"> Chattogram </label>
							</div>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="Barishal">
								<label class="custom-control-label" for="Barishal"> Barishal </label>
							</div>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="Khulna">
								<label class="custom-control-label" for="Khulna"> Khulna </label>
							</div>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="Rajshahi">
								<label class="custom-control-label" for="Rajshahi"> Rajshahi </label>
							</div>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="Rangpur">
								<label class="custom-control-label" for="Rangpur"> Rangpur </label>
							</div>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="Sylhet">
								<label class="custom-control-label" for="Sylhet"> Sylhet </label>
							</div>
						</div>
						<br>
						<button type="submit" class="btn btn-success custom-btn form-control">Search</button>
					</div>
				</div>
			</div>
			<div class="col-md-8" id="">
				<div class="all-tutor" id="allTutor">
					<!--  Single Item  -->
					@foreach($tutors as $tutor)
					<div class="single-tutor card p-2">
						<div class="row">
							<div class="col-md-4  text-center">
								<?php
									if(isset($tutor->profile_pic) && !empty($tutor->profile_pic)){
								?>
								<?php echo "<img src='".asset($tutor->profile_pic)."' class='find-tutor-image  text-center' alt='{{$tutor->f_name}}{{$tutor->l_name}}'> ";?>
								<?php }else{?>
								<img src="{{url('frontend/assets/imgs/user_icon.png')}}" class='find-tutor-image  text-center'>
								<?php } ?>
								<div class="tutor-name-content">
									<p>{{$tutor->f_name}}{{$tutor->l_name}}</p>
									<h5>$ {{$tutor->hourly_rate}} /Hour</h5> <br>
									<a href="{{url('tutor/profile/d',$tutor->userId)}}" class="btn btn-success custom-btn">View Profile</a>
								</div>
							</div>
							<div class="col-md-8">
								<div class="">
									<h5 class="mt-0">{{$tutor->profile_tag}}</h5>
									{{$tutor->about_details}}
								</div>
								<br>
								<div class="teke-class">
									<p><b>Level</b></p>
									<?php
									// echo $tutor->userId;
										$levels = DB::table('which_subject_teaches')
										->join('levels','levels.id','=','which_subject_teaches.level')
										->where('which_subject_teaches.user_id',$tutor->userId)->get();
									?>
									@foreach($levels as $level)
									<a href="#" class="badge badge-success">{{$level->level}}</a>
									@endforeach
								</div>
								<br>
								<div class="teke-skill">
									<p><b>Subjects</b></p>
									<?php
										$subjects = DB::table('which_subject_teaches')
										->where('which_subject_teaches.user_id',$tutor->userId)->get();
									?>
									@foreach($subjects as $subject)
									<?php
										$sub = explode(',',$subject->subject);
										foreach($sub as $s){
											$subjectData = DB::table('subjects')->where('id',$s)->get();
											foreach($subjectData as $mainSub){
									?>
									<a href="#" class="badge badge-success">{{$mainSub->subject}}</a>
									<?php } }?>
									@endforeach
								</div>
							</div>
						</div>
					</div>
					<br>
					@endforeach
				</div>
				{{ $tutors->links() }}
			</div>
		</div>
	</div>
</section>
@endsection
@section('frontend-scripts')
<script>
	$(document).ready(function(){
		var level_id = $(this).val();
		$(".level_id").click(function(){
			alert(level_id);
		})
	});
</script>
@endsection