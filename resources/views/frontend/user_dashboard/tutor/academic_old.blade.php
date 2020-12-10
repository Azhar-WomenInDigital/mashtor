@extends('frontend.layouts.master')
@section('dashboard-title',' Dashboard ')
@section('frontend-content')
<section class="page-content-user-dashboard pb-5">
	<div class="">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="mt-5">{{Auth::user()->f_name}} {{Auth::user()->l_name}} ! <i class="fas fa-grin"></i> Please Complete your Academic Profile</h3>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="student-category-section pb-5 pt-5">
	<div class="container">
		
		
		<!-- <form action="{{url('/dashboard/tutor/academic')}}" method="post">
									@csrf
									<div class="studnet-category">
																<h3 for="" class="text-white font-weight-bold">I want to teach</h3> <br>
																	<div class="form-group">
																								<label for="level" class="text-white font-weight-bold">Select Level</label>
																								<select name="level_id" id="level" class="form-control custom-form-control" required>
																															<option value="">Select...</option>
																															@foreach($levels as $level)
																															<option value="{{$level->id}}">{{$level->level}}</option>
																															@endforeach
																								</select>
																	</div>
																	
																	-- <div id="medium_show"></div>
																	<div id="group_show"></div>
																	<div id="faculty_show"></div>
																	<div id="department_show"></div> ->
																	<div class="form-group">
																								<label for="" class="text-white font-weight-bold">Select Medium</label>
																								<select name="medium_id" id="medium" class="form-control custom-form-control" required>
																															<option value="">Select...</option>
																															
																								</select>
																	</div>
																	
																	<div class="form-group">
																								<label for="" class="text-white font-weight-bold">Group</label>
																								<select name="group_id" id="group" class="form-control">
																															<option value="">Select Group</option>
																								</select>
																	</div>
																	<div class="form-group">
																								<label for="" class="text-white font-weight-bold">Faculty</label>
																								<select name="faculty_id" id="faculty" class="form-control">
																															<option value="">Select Faculty</option>
																								</select>
																	</div>
																	<div class="form-group">
																								<label for="" class="text-white font-weight-bold">University Admission Tutoring Department </label>
																								<select name="department_id" id="department" class="form-control">
																															<option value="">Select Department</option>
																								</select>
																	</div>
																	<div class="form-group">
																								<label for="" class="text-white font-weight-bold"> Subject </label>
																								<select name="subject_id" id="subject" class="form-control">
																															<option value="">Select subject</option>
																								</select>
																	</div>
																	<br>
																	<input type="submit" class="btn btn-success custom-btn text-center" value="Submit">
				-->
				<!-- <div class="form-group">
											<label for="" class="text-white font-weight-bold">Medium</label>
											<select name="" id="" class="form-control custom-form-control">
																		<option value="">Select Medium</option>
																		@foreach($medium as $m)
																			<option value="{{$m->id}}">{{$m->medium}}</option>
																		@endforeach
											</select>
				</div>
				<div class="form-group">
											<label for="" class="text-white font-weight-bold">Subject</label>
											<select name="" id="" class="form-control custom-form-control">
																		<option value="">Select Subject</option>
																		@foreach($subject as $s)
																			<option value="{{$s->id}}">{{$s->subject}}</option>
																		@endforeach
											</select>
				</div> -->
				<!-- <div class="form-group">
											<label for="" class="text-white font-weight-bold">Select Level</label>
											<select name="level" id="levelAt" class="form-control custom-form-control" required>
																		<option value="">Select...</option>
																		@foreach($levels as $level)
																		<option value="{{$level->id}}">{{$level->level}}</option>
																		@endforeach
											</select>
				</div>
				
				<div id="medium"></div>
				<div id="subject"></div> -->
				<!-- <div class="form-group" id="faculty" style="display: none;">
												<label for="" class="text-white font-weight-bold"> Faculty </label>
												<select name="faculty" id="level" class="form-control custom-form-control">
																				<option value="">Select University</option>
																				<option value="business">Business</option>
																				<option value="marketing">Marketing</option>
																				<option value="management">Management</option>
																				<option value="it">IT</option>
																				<option value="eee">EEE</option>
																				<option value="pharmacy">Pharmacy</option>
												</select>
				</div>
				<div class="form-group" id="mediaSubcategory" style="display: none;">
												<label for="" class="text-white font-weight-bold"> Select Your  Medium </label>
												<select name="group_type" id="mgs" onchange=" return subCategoryDapendGroup(); " class="form-control custom-form-control">
																				<option value="">Select Group</option>
																				<option value="group">Group</option>
																				<option value="eOrb">English Or Bangla</option>
																				<option value="institute">Institute</option>
												</select>
				</div>
				<div class="form-group" id="group_subcategory" style="display: none;">
												<label for="" class="text-white font-weight-bold"> Group </label>
												<select name="group" class="form-control custom-form-control">
																				<option value=""> Select Group </option>
																				<option value="science">Science</option>
																				<option value="commerce">Commerce</option>
																				<option value="arts">Arts</option>
												</select>
				</div>
				<div class="form-group" id="udtSubcategory" style="display: none;">
												<label for="" class="text-white font-weight-bold"> University Admission Tutoring </label>
												<select name="u_a_t" id="udt_u" class="form-control custom-form-control" onchange=" return subCategoryDapend(); ">
																				<option value="">Select University Admission Tutoring</option>
																				<option value="medical">Medical</option>
																				<option value="engineering">ENG:BUET,RUET etc</option>
																				<option value="udt_u">University</option>
												</select>
				</div>
				<div class="form-group" id="uat_u_subcategory" style="display: none;">
												<label for="" class="text-white font-weight-bold"> Select University Faculty </label>
												<select name="level" class="form-control custom-form-control">
																				<option value="">Select University Faculty</option>
																				<option value="science_f">Science Faculty</option>
																				<option value="commerce_f">Commerce Faculty</option>
																				<option value="arts_f">Arts Faculty</option>
												</select>
				</div> -->
				<!-- <div class="form-group">
												<input type="submit" class="btn btn-success custom-btn float-right">
				</div>
			</div> -->
			<!-- <div class="row">
				<div class="col-md-6"> -->
					<!-- <ul id="menu">
												
												@foreach($levels as $level)
												<li><div>{{$level->level}}</div>
						<?php
							//if($medium){
						?>
						<ul>
							@foreach($medium as $m)
							
							<li><div>{{$m->medium}}</div></li>
							@endforeach
						</ul>
						<?php // } ?>
					</li>
					@endforeach -->
					<!-- <li><div>Clothing</div></li>
					<li><div>Electronics</div>
					<ul>
												<li class="ui-state-disabled"><div>Home Entertainment</div></li>
												<li><div>Car Hifi</div></li>
												<li><div>Utilities</div></li>
					</ul>
				</li>
				<li><div>Movies</div></li>
				<li><div>Music</div>
				<ul>
					<li><div>Rock</div>
					<ul>
												<li><div>Alternative</div></li>
												<li><div>Classic</div></li>
					</ul>
				</li>
				<li><div>Jazz</div>
				<ul>
					<li><div>Freejazz</div></li>
					<li><div>Big Band</div></li>
					<li><div>Modern</div></li> -->
				<!-- </ul>
			</li>
			<li><div>Pop</div></li>
		</ul>
	</li>
	<li class="ui-state-disabled"><div>Specials (n/a)</div></li>
</ul> -->
<!-- </div>
</div>
<div class="row">
<div class="col-6">
	<label for="" class=" font-weight-bold">I want to teach</label>
	<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
								@foreach($levels as $data)
								<a class="nav-link " id="v-pills-{{$data->id}}-tab" data-toggle="pill" href="#v-pills-{{$data->id}}" role="tab" aria-controls="v-pills-{{$data->id}}" aria-selected="true"> {{$data->level}} </a>
								@endforeach
	</div>
</div>
<div class="col-6">
	
	<div class="tab-content" id="v-pills-tabContent">
								@foreach($levels as $data)
								<div class="tab-pane fade" id="v-pills-{{$data->id}}" role="tabpanel" aria-labelledby="v-pills-{{$data->id}}-tab">
		<?php
			//$medium = //DB::table('media')->where('status',1)->where('level_id',$data->id)->get();
			//echo $medium['0']->level_id;
			//if(isset($medium)){
		?>
		<h3>Medium</h3>
		@foreach($medium as $m)
		<a class="nav-link " id="v-pills-{{$data->id}}-tab" data-toggle="pill" href="#v-pills-{{$m->id}}" role="tab" aria-controls="v-pills-{{$data->id}}" aria-selected="true"> {{$m->medium}} </a>
		@endforeach
		<?php //} ?>
	</div>
	@endforeach
</div>
</div>
</div> -->
<!-- </form> -->
<div class="row justify-content-center">
<div class="col-md-8">
<ul class="list-group list-group-flush treeview custom-ul-li" >

	<!-- Secondary School Level  -->
	<li class="list-group-item"> Secondary School Level <span class="angle_right"><i class="fal fa-angle-right"></i></span>
		<ul style="margin-left: 40px;line-height: 30px;">
			<li>Bangla   <span class="angle_right"><i class="fal fa-angle-right"></i></span>
				<ul style="margin-left: 80px;line-height: 30px;">Subject <hr>
					<li><a href="{{url('tutor/dashboard')}}" class="text-white">Math</a></li>
					<li><a href="#" class="text-white">Biology</a></li>
					<li>etc.</li>
				</ul>
			</li>
			<li>English  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
				<ul style="margin-left: 80px;line-height: 30px;">Subject <hr>
					<li><a href="{{url('tutor/dashboard')}}" class="text-white">Math</a></li>
					<li><a href="{{url('tutor/dashboard')}}" class="text-white">Biology</a></li>
					<li>etc.</li>
				</ul>
			</li>
		</ul>
	</li>
	<!-- Higher Secondary or college or Polytechnic  -->
	<li class="list-group-item"> Higher Secondary or college or Polytechnic  <span><i class="fal fa-angle-right"></i></span>
		<ul style="margin-left: 40px;line-height: 30px;">
			<li>Bangla  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
				<ul style="margin-left: 80px;line-height: 30px;">Subject <hr>
					<li><a href="{{url('tutor/dashboard')}}" class="text-white">Math</a></li>
					<li><a href="{{url('tutor/dashboard')}}" class="text-white">Biology</a></li>
					<li>etc.</li>
				</ul>
			</li>
			<li>English  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
				<ul style="margin-left: 80px;line-height: 30px;">Subject <hr>
					<li><a href="{{url('tutor/dashboard')}}" class="text-white">Math</a></li>
					<li><a href="{{url('tutor/dashboard')}}" class="text-white">Biology</a></li>
					<li>etc.</li>
				</ul>
			</li>
		</ul>
	</li>
	<!--  University --> 
	<li class="list-group-item"> University Level  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
		<ul style="margin-left: 40px;line-height: 30px;">Faculty <hr>
			<li>Business  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
				<ul style="margin-left: 80px;line-height: 30px;">
					Subject 
					
					<li><a href="{{url('tutor/dashboard')}}" class="text-white">Marketing</a></li>
					<li>etc.</li>
					
				</li>
			</ul>
		</li>
		<li>EEE</li>
		<li>Pharmacy</li>
	</ul>
</li>
<!-- University Admission Tutoring -->
<li class="list-group-item"> University Admission Tutoring  <span><i class="fal fa-angle-right"></i></span>
	<ul style="margin-left: 40px;line-height: 30px;">Medical </span>
		<li>Business</li>
		<li>ENG:</li>
		<li>University  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
			<ul style="margin-left: 80px;line-height: 30px;">
				<li>Science faculty  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
					<ul style="margin-left: 120px;line-height: 30px;">
						<li><a href="{{url('tutor/dashboard')}}" class="text-white">Chemistry</a></li>
						<li><a href="{{url('tutor/dashboard')}}" class="text-white">Physics</a></li>
						<li><a href="{{url('tutor/dashboard')}}" class="text-white">English</a></li>
					</ul>
				</li>
				<li>Commerce faculty  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
					<ul style="margin-left: 120px;line-height: 30px;">
						<li><a href="{{url('tutor/dashboard')}}" class="text-white">Chemistry</a></li>
						<li><a href="{{url('tutor/dashboard')}}" class="text-white">Physics</a></li>
						<li><a href="{{url('tutor/dashboard')}}" class="text-white">English</a></li>
					</ul>
				</li>
				<li>Arts faculty  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
					<ul style="margin-left: 120px;line-height: 30px;">
						<li><a href="{{url('tutor/dashboard')}}" class="text-white">Chemistry</a></li>
						<li><a href="{{url('tutor/dashboard')}}" class="text-white">Physics</a></li>
						<li><a href="{{url('tutor/dashboard')}}" class="text-white">English</a></li>
					</ul>
				</li>
			</ul>
		</li>
	</ul>
</li>
</ul>
</div>
</div>
<!-- <div class="row">
	
	<div class="col-4">
	<h3>I want to teach</h3> <br>
		<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
				<a class="nav-link " id="v-pills-secondary_school_level-tab" data-toggle="pill" href="#v-pills-secondary_school_level" role="tab" aria-controls="v-pills-secondary_school_level" aria-selected="true">Secondary School Level</a>
				<a class="nav-link" id="v-pills-hsocp-tab" data-toggle="pill" href="#v-pills-hsocp" role="tab" aria-controls="v-pills-hsocp" aria-selected="false">Higher Secondary or college or Polytechnic</a>
				<a class="nav-link" id="v-pills-university-tab" data-toggle="pill" href="#v-pills-university" role="tab" aria-controls="v-pills-university" aria-selected="false">University Level</a>
				<a class="nav-link" id="v-pills-admission-tab" data-toggle="pill" href="#v-pills-admission" role="tab" aria-controls="v-pills-admission" aria-selected="false">University Admission Tutoring</a>
		</div>
	</div>
	<div class="col-8">
	<div class="tab-content" id="v-pills-tabContent">
			<!- Secondary school tab content start ->
			<div class="tab-pane fade" id="v-pills-secondary_school_level" role="tabpanel" aria-labelledby="v-pills-secondary_school_level-tab">
						<h4>Medium</h4> <br>
						<div class="row">
									<div class="col-4">
												<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
															<a class="nav-link" id="v-pills-secondary_school_level_bangla-tab" data-toggle="pill" href="#v-pills-secondary_school_level_bangla" role="tab" aria-controls="v-pills-secondary_school_level_bangla" aria-selected="true">
																		Bangla
															</a>
															<a class="nav-link" id="v-pills-secondary_school_level_bangla_english-tab" data-toggle="pill" href="#v-pills-secondary_school_level_bangla_english" role="tab" aria-controls="v-pills-secondary_school_level_bangla_english" aria-selected="false">English</a>
												</div>
									</div>
									<div class="col-8">
												<div class="tab-content" id="v-pills-tabContent">
															<div class="tab-pane fade" id="v-pills-secondary_school_level_bangla" role="tabpanel" aria-labelledby="v-pills-secondary_school_level_bangla-tab">
																		<h3>Subject</h3>
																		<br>
																		<a href="#">Math</a> <br>
																		<a href="#">Biology</a><br>
																		<a href="#">etc</a>
															</div>
															<div class="tab-pane fade" id="v-pills-secondary_school_level_bangla_english" role="tabpanel" aria-labelledby="v-pills-secondary_school_level_bangla_english-tab">
																		<h3>Subject</h3>
																		<br>
																		<a href="#">Math</a> <br>
																		<a href="#">Biology</a><br>
																		<a href="#">etc</a>
															</div>
												</div>
									</div>
						</div>
			</div>
			<!- Secondary school tab content End ->
			<!- Secondary school or collage or polytecnic tab content start ->
			
			<div class="tab-pane fade" id="v-pills-hsocp" role="tabpanel" aria-labelledby="v-pills-hsocp-tab">
						<h4>Medium</h4> <br>
						<div class="row">
									<div class="col-4">
												<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
															<a class="nav-link" id="v-pills-bangla-tab" data-toggle="pill" href="#v-pills-bangla" role="tab" aria-controls="v-pills-bangla" aria-selected="true">
																		Bangla
															</a>
															<a class="nav-link" id="v-pills-english-tab" data-toggle="pill" href="#v-pills-english" role="tab" aria-controls="v-pills-english" aria-selected="false">English</a>
												</div>
									</div>
									<div class="col-8">
												<div class="tab-content" id="v-pills-tabContent">
															<div class="tab-pane fade " id="v-pills-bangla" role="tabpanel" aria-labelledby="v-pills-bangla-tab">
																		<h3>Subject</h3>
																		<br>
																		<a href="#">Math</a> <br>
																		<a href="#">Biology</a><br>
																		<a href="#">etc</a>
															</div>
															<div class="tab-pane fade" id="v-pills-english" role="tabpanel" aria-labelledby="v-pills-english-tab">
																		<h3>Subject</h3>
																		<br>
																		<a href="#">Math</a> <br>
																		<a href="#">Biology</a><br>
																		<a href="#">etc</a>
															</div>
												</div>
									</div>
						</div>
			</div>
			<!- Secondary school or collage or polytecnic tab content start ->
			<!-  University Tab content start  ->
			<div class="tab-pane fade" id="v-pills-university" role="tabpanel" aria-labelledby="v-pills-university-tab">
						<h4>Faculty</h4> <br>
						<div class="row">
									<div class="col-4">
												<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
															<a class="nav-link" id="v-pills-university_business-tab" data-toggle="pill" href="#v-pills-university_business" role="tab" aria-controls="v-pills-university_business" aria-selected="true">
																		Business
															</a>
															<a class="nav-link" id="v-pills-university_eee-tab" data-toggle="pill" href="#v-pills-university_eee" role="tab" aria-controls="v-pills-university_eee" aria-selected="false">EEE</a>
															<a class="nav-link" id="v-pills-university_pharmacy-tab" data-toggle="pill" href="#v-pills-university_pharmacy" role="tab" aria-controls="v-pills-university_pharmacy" aria-selected="false">Pharmacy</a>
												</div>
									</div>
									<div class="col-8">
												<div class="tab-content" id="v-pills-tabContent">
															<div class="tab-pane fade" id="v-pills-university_business" role="tabpanel" aria-labelledby="v-pills-university_business-tab">
																		<h3>Subject</h3>
																		<br>
																		<a href="#">Marketing</a> <br>
																		<a href="#">Biology</a><br>
																		<a href="#">etc</a>
															</div>
															<div class="tab-pane fade" id="v-pills-university_eee" role="tabpanel" aria-labelledby="v-pills-university_eee-tab">
																		<h3>Subject</h3>
																		<br>
																		<a href="#">Marketing</a> <br>
																		<a href="#">Biology</a><br>
																		<a href="#">etc</a>
															</div>
															<div class="tab-pane fade" id="v-pills-university_pharmacy" role="tabpanel" aria-labelledby="v-pills-university_pharmacy-tab">
																		<h3>Subject</h3>
																		<br>
																		<a href="#">Marketing</a> <br>
																		<a href="#">Biology</a><br>
																		<a href="#">etc</a>
															</div>
												</div>
									</div>
						</div>
			</div>
			<!-  University Tab content end  ->
			<!-  University admission tab content start  ->
			<div class="tab-pane fade" id="v-pills-admission" role="tabpanel" aria-labelledby="v-pills-admission-tab">
						<div class="row">
									<div class="col-md-4">
												
												<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
															<a class="nav-link" id="v-pills-admission_medical-tab" data-toggle="pill" href="#v-pills-admission_medical" role="tab" aria-controls="v-pills-admission_medical" aria-selected="true">
																		Medical
															</a>
															<a class="nav-link" id="v-pills-university_eng-tab" data-toggle="pill" href="#v-pills-university_eng" role="tab" aria-controls="v-pills-university_eng" aria-selected="false">ENG</a>
															<a class="nav-link" id="v-pills-admission_university-tab" data-toggle="pill" href="#v-pills-admission_university" role="tab" aria-controls="v-pills-admission_university" aria-selected="false">University</a>
												</div>
									</div>
									
									<div class="col-8">
												<div class="tab-content" id="v-pills-tabContent">
															<div class="tab-pane fade" id="v-pills-admission_medical" role="tabpanel" aria-labelledby="v-pills-admission_medical-tab">
																		<h3>Subject</h3>
																		<br>
																		<a href="#">Marketing</a> <br>
																		<a href="#">Physics</a><br>
																		<a href="#">English</a><br>
																		<a href="#">etc</a>
															</div>
															<div class="tab-pane fade" id="v-pills-university_eng" role="tabpanel" aria-labelledby="v-pills-university_eng-tab">
																		<h3>Subject</h3>
																		<br>
																		<a href="#">Marketing</a> <br>
																		<a href="#">Physics</a><br>
																		<a href="#">English</a><br>
																		<a href="#">etc</a>
															</div>
															<div class="tab-pane fade" id="v-pills-admission_university" role="tabpanel" aria-labelledby="v-pills-admission_university-tab">
																		<h4>Faculty</h4>
																		<br>
																		<a class="nav-link" id="v-pills-vsdfsdfsdfsdfsftab" data-toggle="pill" href="#v-pills-vsdfsdfsdfsdfsftab" role="tab" aria-controls="v-pills-vsdfsdfsdfsdfsftab" aria-selected="true">
																					Business
																		</a>
																		<a class="nav-link" id="v-pills-admission_university_eee-tab" data-toggle="pill" href="#v-pills-admission_university_eee" role="tab" aria-controls="v-pills-admission_university_eee" aria-selected="false">EEE</a>
																		<a class="nav-link" id="v-pills-university_pharmacyfdsfsdf-tab" data-toggle="pill" href="#v-pills-university_pharmacyfdsfsdf" role="tab" aria-controls="v-pills-university_pharmacyfdsfsdf" aria-selected="false">Pharmacy</a>
																					
															</div>
													</div>
													
										</div>
										<div class="tab-content" id="v-pills-tabContent">
														<div class="tab-pane fade" id="v-pills-university_pharmacyfdsfsdf" role="tabpanel" aria-labelledby="v-pills-university_pharmacyfdsfsdf-tab">
																	fsdsd
														</div>
											</div>
							</div>
								
				</div>
				<!-  University admission tab content end  ->
				
				
		</div>
	</div>
</div> -->
</div>
</section>
@section('frontend-scripts')
<script src="{{url('frontend/assets/js/jquery.treeView.js')}}"></script>
<script>
	$('.treeview').treeView();
</script>
<script>
	$(document).ready(function() {
$('select[name=level_id]').change(function() {
var url = '{{ url('tutor/medium') }}' + '/' + $(this).val()
$.get(url, function(data) {
var select = $('form select[name= medium_id]');
select.empty();
$.each(data,function(key, value) {
select.append('<option value=' + value.id + '>' + value.medium + '</option>');
});
});
});
});
// Medium
	$(document).ready(function(){
$('#medium').change(function(){
var group = $(this).val();
$.ajax({
url:"{{ url('/getGroup/') }}"+ "/" + group,
method:"get",
data:{group:group},
success:function(result)
{
$('#group').html(result);
}
});
})
})
// Group
	$(document).ready(function(){
$('#group').change(function(){
var group = $(this).val();
$.ajax({
url:"{{ url('/getGroup/') }}"+ "/" + group,
method:"get",
data:{group:group},
success:function(result)
{
$('#group').html(result);
}
});
})
})
// Faculty
	$(document).ready(function(){
$('#level').change(function(){
var level = $(this).val();
$.ajax({
url:"{{ url('/getFaculty/') }}"+ "/" + level,
method:"get",
data:{level:level},
success:function(result)
{
$('#faculty').html(result);
}
});
})
})
// Department
	$(document).ready(function(){
$('#level').change(function(){
var level = $(this).val();
$.ajax({
url:"{{ url('/getDepartment/') }}"+ "/" + level,
method:"get",
data:{level:level},
success:function(result)
{
$('#department').html(result);
}
});
})
})
// Subject
$(document).ready(function(){
$('#level,#group,#faculty,#department').change(function(){
var level = $(this).val();
var group = $(this).val();
var faculty = $(this).val();
var department = $(this).val();
$.ajax({
url:"{{ url('/getSubject/') }}"+ "/" + level + "/" + group + "/" + faculty + "/" + department,
method:"get",
data:{level:level,group:group,faculty:faculty,department:department},
success:function(result)
{
$('#subject').html(result);
}
});
})
})
</script>
@endsection
@endsection