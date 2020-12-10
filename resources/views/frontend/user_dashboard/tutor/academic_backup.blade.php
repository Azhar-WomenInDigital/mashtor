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
		
		
		<form action="{{url('/dashboard/tutor/academic')}}" method="post">
			@csrf
			 <div class="studnet-category">
			 	<label for="" class="text-white font-weight-bold">I want to teach</label>
					<div class="form-group">
							<label for="" class="text-white font-weight-bold">Select Level</label>
							<select name="level" id="levelAt" class="form-control custom-form-control" required>
									<option value="">Select...</option>
									@foreach($levels as $level)
									<option value="{{$level->id}}">{{$level->level}}</option>
									@endforeach
							</select>
					</div>
					
					<div id="medium"></div>
				<div id="subject"></div>


				<div class="form-group" id="faculty" style="display: none;">
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
				</div>
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
</form>

</div>
</section>
<script>
	// function categoryDapend(){
		// 	var selectBox = document.getElementById('level');
		// 	var userInput = selectBox.options[selectBox.selectedIndex].value;
		// 	if( userInput == 'un'){
			// 		document.getElementById('faculty').style.display = 'block';
		// 	}else{
			// 		document.getElementById('faculty').style.display = 'none';
		// 	}
		// 	if( userInput == 'me'){
			// 		document.getElementById('mediaSubcategory').style.display = 'block';
		// 	}else{
			// 		document.getElementById('mediaSubcategory').style.display = 'none';
		// 	}
		// 	if( userInput == 'uat'){
			// 		document.getElementById('udtSubcategory').style.display = 'block';
		// 	}else{
			// 		document.getElementById('udtSubcategory').style.display = 'none';
		// 	}
		// 	return false;
	// }
	//University Sub Category
	// function subCategoryDapend(){
		// 	var selectBox = document.getElementById('udt_u');
		// 	var userInput = selectBox.options[selectBox.selectedIndex].value;
		// 	if( userInput == 'udt_u'){
			// 		document.getElementById('uat_u_subcategory').style.display = 'block';
		// 	}else{
			// 		document.getElementById('uat_u_subcategory').style.display = 'none';
		// 	}
		// 	return false;
	// }
	// Group
	// function subCategoryDapendGroup(){
		// 	var selectBox = document.getElementById('mgs');
		// 	var userInput = selectBox.options[selectBox.selectedIndex].value;
		// 	if( userInput == 'group'){
			// 		document.getElementById('group_subcategory').style.display = 'block';
		// 	}else{
			// 		document.getElementById('group_subcategory').style.display = 'none';
		// 	}
		// 	return false;
	// }
</script>
@section('frontend-scripts')
<script>
	$(document).ready(function(){
		$('.sdfsdfsd').change(function(){
			alert("dsfd");
		});
		
		$('#levelAt').change(function(){
			var level_id = $(this).val();
			var url = '{{ url('student/medium') }}' +'/' + level_id;
			$.ajax({
					url:url,
					method:"get",
					data:{level_id:level_id},
					success:function(data){
						$('#medium').fadeIn();
						$('#medium').html(data);
					}
				});
		});
		
			$('#sdfsdfsd').change(function(){
					alert('sdfsdf');
					var group_id = $(this).val();
					var url = '{{ url('student/subject') }}' +'/' + group_id;
					$.ajax({
									url:url,
									method:"get",
									data:{group_id:group_id},
									success:function(data){
											$('#subject').fadeIn();
											$('#subject').html(data);
									}
							});
	});
		
	});
	
</script>


@endsection
@endsection