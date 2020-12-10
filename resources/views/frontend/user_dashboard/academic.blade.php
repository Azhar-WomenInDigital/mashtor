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
		
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<form action="{{url('/student/academic')}}" method="post">
					@csrf
				<div class="studnet-category">
					<div class="form-group">
						<label for="" class="text-white font-weight-bold">Class Or Grade Or level ( 6 to 12 ) </label>
						<select name="level" id="levelAt" class="form-control custom-form-control" required>
							<option value="">Select...</option>
							@foreach($levels as $level)
							<option value="{{$level->id}}">{{$level->level}}</option>
							@endforeach
						</select>
					</div>

					<!-- University -->
					<div id="medium"></div>
					<div id="subject"></div>


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

				<div class="form-group">
					<input type="submit" class="btn btn-success custom-btn float-right">
				</div>
				</div>

			</form>
			</div>
			
		</div>
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

			$('#getSubject').change(function(){
				
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

			$('#faculty').on('change',function(){
				alart('sdf');
			});


		});
		  
	</script>
	
@endsection
@endsection