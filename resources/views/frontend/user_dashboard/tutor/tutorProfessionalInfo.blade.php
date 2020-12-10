@extends('frontend.layouts.dashboard_mastering')
@section('dashboard-title',' Dashboard ')
@section('frontend-content')
<style>
	.tutor-profile-apporaval{
		background: #F5F5F5;
	}
	body {
background-color: #F5F5F5;
}
.invalid-feedback{
	display: block;
}
.profile-pic {
max-width: 200px;
max-height: 200px;
display: block;
}
.file-upload {
display: none;
}
.circle {
border-radius: 1000px !important;
overflow: hidden;
width: 128px;
height: 128px;
border: 8px solid orange;
/* position: absolute; */
top: -72px;
}
img {
max-width: 100%;
height: auto;
}
.p-image {
position: relative;
text-align: center;
bottom: 45%;
font-size: 30px;
color: orange;
left: -5%;
}
.p-image:hover {
transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
}
.upload-button {
font-size: 2.2em;
left: 86px;
position: absolute;
top: 11px;
}
.upload-button:hover {
transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
color: #999;
}
.toast-header{
	font-size: 13px;
}
.table td, .table th{
	padding: 5px !important;
}
.upload{
padding: 10px;
/*background: #ddd; */
display: table;
color: #000;
cursor: pointer;
}
.upload input[type="file"] {
display: none;
}
.registration-info{
	background: #fff;
padding: 20px;
}
.professional-form{
	background: #fff;
	padding: 30px;
}
</style>
<section class="tutor-profile-apporaval pb-5 pt-5">
	<div class="container">
		<div class="professional-form">
			<h3 class="text-center">Complete your profile for verification ….. (Tutor-- Professional)</h3> <br>
			<a href="{{url('tutor/professional/info/show')}}" class="btn btn-success custom-btn">Back</a>
			<br> <br>
			@include('frontend.partials._message')
			<form action="{{url('tutor/professional/info')}}" method="post" enctype="multipart/form-data">
				@csrf
				
				<!-- Your Educational Qualification* -->
				<div class="container">
					<!--  About Your Self  -->
					
					<div class="row">
						<div class="col-md-12">
							<p class="mb-1">Working Experience <span class="text-danger">*</span> </p>
							<table class="table table-bordered" id="tab_logic">
								<thead>
									<td>Position <span class="text-danger"> * </span> </td>
									<td>Organization<span class="text-danger"> * </span></td>
									<td>Year <span class="text-danger"> * </span></td>
									<td>Remove</td>
								</thead>
								<tbody>
									<!-- <form action="{{url('tutor/edutcation')}}" method="post" enctype="multipart/form-data"> -->
									<?php
										if(isset($work_exprience)){
											

									?>
									@foreach($work_exprience as $data)
									
									<input type="hidden" name="work_exprience_id[]" value="<?php if(isset($data->id) && !empty($data->id)){ echo $data->id;}?>">
									<tr id='addr0' data-id="0" class="hidden">
										<td data-name="position">
											<input type="text" class="form-control custom-form-control" placeholder="Example: Web Developer" name="position[]" value="{{$data->position}}" required>
											@if($errors->has('position'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('position') }}</strong>
											</span>
											@endif
										</td>
										<td data-name="organization">
											<input type="text" class="form-control custom-form-control" placeholder="Example: women in digital" name="organization[]" value="{{$data->organization}}" required>
											@if($errors->has('organization'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('organization') }}</strong>
											</span>
											@endif
										</td>
										<td data-name="year">
											<input type="date" class="form-control custom-form-control" name="year[]" value="{{$data->year}}" readonly>
											@if($errors->has('year'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('year') }}</strong>
											</span>
											@endif
										</td>
										<td data-name="del">
											<a href="{{url('tutor/work_exprience/delete',$data->id)}}" name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'><span aria-hidden="true">×</span></a>
										</td>
									</tr>
									@endforeach
									<?php } ?>
									
									<!-- </form> -->
									
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<br>
				<!-- Which subject you want to teach { Students could see } -->
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<p class="mb-1"> Training Offer  <span class="text-danger">*</span> </p>
							<table class="table table-bordered" id="tab_which_subject">
								<thead>
									<td>Training Name <span class="text-danger"> * </span></td>
									<td>Per hour Charge demand  <span class="text-danger"> * </span></td>
									<td>Country  <span class="text-danger"> * </span></td>
									
									<td>Remove</td>
								</thead>
								<tbody>
									
									<?php
										if(isset($training_offer)){
									?>
									@foreach($training_offer as $w)
									<input type="hidden" name="training_offer_id[]" value="<?php if(isset($w->id) && !empty($w->id)){ echo $w->id;}?>">
									
									<tr id='addr0' data-id="0" class="hidden">
										
										<td data-name="training_name">
											<input type="text" name="training_name[]" value="{{$w->training_name}}" class="form-control custom-form-control">
											@if($errors->has('training_name'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('training_name') }}</strong>
											</span>
											@endif
										</td>
										<td data-name="demand_per_hour">
											
											<input type="text" class="form-control custom-form-control" placeholder="Amount" name="demand_per_hour[]" value="{{$w->demand_per_hour}}">
											
										</td>
										
										<td data-name="country">
											<div class="input-group">
												
											
											<select name="currency[]" id="" class="form-control custom-form-control">
												<?php
													$currencydsf = DB::table('currency')->where('id',$w->currency)->first();
													if(isset($currencydsf)){
													
												?>
												<option value="{{$currencydsf->id}}">{{$currencydsf->id}}</option>
											<?php } ?>
												<option value="">Select Currency</option>
												<?php
													$currency = DB::table('currency')->get();
													foreach($currency as $data){
												?>
												<option value="{{$data->id}}">{{$data->id}}</option>
											<?php } ?>
											</select>
											<input type="text" class="form-control custom-form-control" placeholder="Amount" name="amount[]" value="{{ old('amount',$w->amount) }}">
											</div>
										</td>
										<td data-name="del">
											<a href="{{url('tutor/training/delete',$w->id)}}" name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'><span aria-hidden="true">×</span></a>
										</td>
									</tr>
									@endforeach
									<?php } ?>
									
									
									
								</tbody>
							</table>
							
						</div>
					</div>
				</div>
				<!-- End Which subject you want to teach { Students could see } -->
				<br>
				<!-- Write your teaching Geographic information  -->
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<p class="mb-1">  Award Achieved {Students could see}<span class="text-danger"> * </span></p>
							<table class="table table-bordered" id="tab_geographic_info">
								<thead>
									<td>Award</td>
									<td> Year <span class="text-danger"> * </span></td>
									<td>Remove</td>
								</thead>
								<tbody>
									<!-- <form action="{{url('tutor/edutcation')}}" method="post" enctype="multipart/form-data"> -->
									<?php
										if(isset($tutor_award)){
									?>
									@foreach($tutor_award as $info)
									<input type="hidden" name="award_id[]" value="<?php if(isset($info->id) && !empty($info->id)){ echo $info->id;}?>">

									<tr id='addr0' data-id="0" class="hidden">
										<td data-name="award_name">
											<input type="text" class="form-control custom-form-control" name="award_name[]" value="{{$info->award_name}}" required>
											@if($errors->has('award_name'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('award_name') }}</strong>
											</span>
											@endif
										</td>
										
										<td data-name="year">
											<input type="date" name="year[]" class="form-control custom-form-control" value="{{$info->year}}" required>
										</td>
										
										<td data-name="del">
											<a href="{{url('tutor/award/delete',$info->id)}}" name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'><span aria-hidden="true">×</span></a>
										</td>
									</tr>
									<!-- </form> -->
									@endforeach
									<?php } ?>
									
								</tbody>
							</table>
							
						</div>
					</div>
				</div>
				<!-- End Which subject you want to teach { Students could see } -->
				<br>
				<!-- Write your teaching Geographic information  -->
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<p class="mb-1"> Publishing {Students could see}<span class="text-danger"> * </span></p>
							<table class="table table-bordered" id="tab_publishing">
								<thead>
									<td>Title</td>
									<td>Published Year</td>
									<td> Link </td>
									<td>Remove</td>
								</thead>
								<tbody>
									<!-- <form action="{{url('tutor/edutcation')}}" method="post" enctype="multipart/form-data"> -->
									<?php
										if(isset($tutor_publishing)){
									?>
									@foreach($tutor_publishing as $publish)
									<input type="hidden" name="publishing_id[]" value="<?php if(isset($publish->id) && !empty($publish->id)){ echo $publish->id;}?>">
									<tr id='addr0' data-id="0" class="hidden">
										<td data-name="publishing_title">
											<input type="text" class="form-control custom-form-control" name="publishing_title[]" value="{{$publish->title}}" required>
											@if($errors->has('publishing_title'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('publishing_title') }}</strong>
											</span>
											@endif
										</td>
										
										<td data-name="published_year">
											<input type="text" name="published_year[]" class="form-control custom-form-control" value="{{$publish->publish_year}}" required>
										</td>
										<td data-name="publishing_link">
											<input type="text" name="publishing_link[]" class="form-control custom-form-control" value="{{$publish->link}}" required>
										</td>
										
										<td data-name="del">
											<a href="{{url('tutor/pubblishing/delete',$publish->id)}}" name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'><span aria-hidden="true">×</span></a>
										</td>
									</tr>
									<!-- </form> -->
									@endforeach
									<?php } ?>
									
								</tbody>
							</table>
							
						</div>
					</div>
				</div>
				<!-- End Which subject you want to teach { Students could see } -->
				<br>
				<!-- Upload your teaching demo Video  -->
				
				
				<!-- End Upload your teaching demo Video  -->
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<input type="submit" class="btn btn-success custom-btn" value="Submit">
						</div>
					</div>
				</div>
				<br>
			</form>
		</div>
	</section>
	@section('frontend-scripts')
	<script>
		$(document).ready(function() {
	var readURL = function(input) {
	if (input.files && input.files[0]) {
	var reader = new FileReader();
	reader.onload = function (e) {
	$('.profile-pic').attr('src', e.target.result);
	}
	reader.readAsDataURL(input.files[0]);
	}
	}
	$(".file-upload").on('change', function(){
	readURL(this);
	});
	$(".upload-button").on('click', function() {
	$(".file-upload").click();
	});
	});
	</script>
	<script>
	function deleteconfirm()
	{
	deletedata = confirm("Are you sure to delete permanently?");
	if (deletedata != true)
	{
	return false;
	}
	}
	</script>
	@endsection
	@endsection