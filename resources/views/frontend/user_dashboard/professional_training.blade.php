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
				<form action="{{url('student/professional/training')}}" method="post">
					@csrf
				<div class="studnet-category">
					<div class="form-group">
						<label for="" class="text-white font-weight-bold">Professional Traning</label>
						<select name="level" id="languageCourse" class="form-control custom-form-control" onchange=" return categoryDapend()" required>
							<option value="">Select...</option>
							<option value="iwl">I want to learn</option>
						</select>
					</div>
					<div class="form-group" id="iwl" style="display: none;">
						<label for="" class="text-white font-weight-bold"> Select Traning </label>
						<select name="level" id="level" class="form-control custom-form-control">
							<option value="">Select...</option>
							@foreach($traning as $data)
							<option value="">{{$data->traning_name}}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group" id="iwlf" style="display: none;">
						<label for="" class="text-white font-weight-bold"> Select Your  Medium </label>
						<select name="level" id="mgs"  class="form-control custom-form-control">
							<option value="">Select learn from</option>
							<option value="group">English</option>
							<option value="">Bangla etc</option>
						</select>
					</div>



				<div class="form-group">
					<input type="submit" class="btn btn-success custom-btn float-right" value="Continue">
				</div>
				</div>

			</form>
			</div>
			
		</div>
	</div>
</section>
<script>
	function categoryDapend(){
		var selectBox = document.getElementById('languageCourse');
		var userInput = selectBox.options[selectBox.selectedIndex].value;

		if( userInput == 'iwl'){
			document.getElementById('iwl').style.display = 'block';
		}else{
			document.getElementById('iwl').style.display = 'none';
		}

		if( userInput == 'iwlf'){
			document.getElementById('iwlf').style.display = 'block';
		}else{
			document.getElementById('iwlf').style.display = 'none';
		}

		return false;
	}

	
</script>
@endsection