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
				<form action="{{url('/student/language/course')}}" method="post">
					@csrf
				<div class="studnet-category">
					<div class="form-group">
						<label for="" class="text-white font-weight-bold">I want to learn</label>
						<select name="tutor_language_type" id="languageCourse" class="form-control custom-form-control"required>
							<option value="">Select...</option>
							@foreach($languages_learn as $data)
							<option value="{{$data->id}}">{{$data->language}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group" id="iwl" style="">
						<label for="" class="text-white font-weight-bold">I want to learn from</label>
						<select name="language_want_to_learn" id="level" class="form-control custom-form-control">
							<option value="">Select...</option>
							@foreach($languages_learn as $data)
							<option value="{{$data->id}}">{{$data->language}}</option>
							@endforeach
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