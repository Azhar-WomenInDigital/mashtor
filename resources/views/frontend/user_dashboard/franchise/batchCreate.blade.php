@extends('frontend.layouts.dashboard_mastering')
@section('franchise-dashboard-title',' Dashboard ')
@section('frontend-content')
<style>
	.sub-nav-dashboard{
		background: #f1f1f1 !important;
	}
</style>


<br>
<div class="container mt-5 mb-5">
	<div class="row justify-content-center">
		<div class="col-6">
			@include('frontend.partials._message')
			<div class="batchcreateform">	
				<form action="{{route('franchiseBatch.store')}}" method="post">
					@csrf
					<div class="form-group">	
						<label for="" class="font-weight-bold">Batch Name</label>
						<input type="text" class="form-control custom-form-control" name="batch_name" value="{{ old('batch_name') }}">
					</div>
					<div class="form-group">	
						<label for="" class="font-weight-bold">Class or Level or Subject</label>
						<input type="text" class="form-control custom-form-control" name="classorlevelorsubject" value="{{old('classorlevelorsubject')}}">
					</div>
					<div class="form-group">	
						<label for="" class="font-weight-bold">Study Medium( Bangla or English or Hindi or Malay etc )</label>
						<input type="text" class="form-control custom-form-control " name="study_medium" value="{{old('study_medium')}}">
					</div>
					<div class="form-group">	
						<label for="" class="font-weight-bold">Group ( Science,Commerce,Arts) </label>
						<input type="text" class="form-control custom-form-control" name="group" value="{{old('group')}}">
					</div>
					<div class="form-group">	
						<label for="" class="font-weight-bold">Students Gender (Female,Male,Mix)</label>
						<input type="text" class="form-control custom-form-control" name="gender" value="{{old('gender')}}">
					</div>
					<div class="form-group">	
						<label for="" class="font-weight-bold">Institute</label>
						<input type="text" class="form-control custom-form-control" name="institute" value="{{old('institute')}}">
					</div>
					<div class="form-group">	
						<label for="" class="font-weight-bold">Union Name</label>
						<input type="text" class="form-control custom-form-control" name="union_name" value="{{old('union_name')}}">
					</div>
					<div class="form-group">	
						<label for="" class="font-weight-bold">Upzila Name</label>
						<input type="text" class="form-control custom-form-control" name="upzila_name" value="{{old('upzila_name')}}">
					</div>
					<div class="form-group">	
						<label for="" class="font-weight-bold">District Name</label>
						<input type="text" class="form-control custom-form-control" name="district_name" value="{{old('district_name')}}">
					</div>
					<div class="form-group">	
						<label for="" class="font-weight-bold">Education Board name</label>
						<input type="text" class="form-control custom-form-control" name="education_board" value="{{old('education_board')}}">
					</div>
					<br>	
					<input type="submit" class="btn btn-success custom-btn" value="Create">
				</form>
			</div>
		</div>
	</div>
</div>
</div>
@endsection