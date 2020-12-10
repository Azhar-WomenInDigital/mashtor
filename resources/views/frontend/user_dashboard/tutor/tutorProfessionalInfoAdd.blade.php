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
<?php
	$basic_info = DB::table('tutor_basic_infos')->where('user_id',Auth::user()->id)->first();
	$educational_qualification = DB::table('tutor_education')->where('user_id',Auth::user()->id)->get();
	$which_subject_teaches = DB::table('which_subject_teaches')->where('user_id',Auth::user()->id)->get();
	$taching_geographic_infos = DB::table('taching_geographic_infos')->where('user_id',Auth::user()->id)->get();
?>
<section class="tutor-profile-apporaval pb-5 pt-5">
	<div class="container">
		<div class="professional-form">
			@include('frontend.partials._message')
			<h3 class="text-center">Complete your profile for verification ….. (Tutor-- Professional)</h3> <br> 
			<a href="{{url('tutor/professional/info/show')}}" class="btn btn-success custom-btn">Back</a>
			<br> <br>
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
									
									<tr id='addr0' data-id="0" class="hidden">
										<td data-name="position">
											<input type="text" class="form-control custom-form-control" placeholder="Example: Web Developer" name="position[]" value="{{ old('position') }}" required>
											@if($errors->has('position'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('position') }}</strong>
											</span>
											@endif
										</td>
										<td data-name="organization">
											<input type="text" class="form-control custom-form-control" placeholder="Example: women in digital" name="organization[]" value="{{old('organization')}}" required>
											@if($errors->has('organization'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('organization') }}</strong>
											</span>
											@endif
										</td>
										<td data-name="year">
											<input type="text" id="datepicker" class="form-control custom-form-control" name="year[]" value="{{old('year')}}" required>
											@if($errors->has('year'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('year') }}</strong>
											</span>
											@endif
										</td>
										<td data-name="del">
											<button name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'><span aria-hidden="true">×</span></button>
										</td>
									</tr>
									
									
									<!-- </form> -->
									
									
								</tbody>
							</table>
							<a href="javascript:void(0)" id="add_row" name="add-more" class="btn btn-success custom-btn">Add More</a>
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
									
									<td>Currency & Amount  <span class="text-danger"> * </span></td>
									
									<td>Remove</td>
								</thead>
								<tbody>
									
									
									
									
									<tr id='addr0' data-id="0" class="hidden">
										
										<td data-name="training_name">
											<input type="text" name="training_name[]" value="{{ old('training_name') }}" class="form-control custom-form-control">
											@if($errors->has('training_name'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('training_name') }}</strong>
											</span>
											@endif
										</td>
										
										
										<td data-name="country">
											<div class="input-group">
												
											
											<select name="currency[]" id="" class="form-control custom-form-control">
												<option value="">Select Currency</option>
												<?php
													$currency = DB::table('currency')->get();
													foreach($currency as $data){
												?>
												<option value="{{$data->id}}">{{$data->id}}</option>
											<?php } ?>
											</select>
											<input type="text" class="form-control custom-form-control" placeholder="Amount" name="amount[]" value="{{ old('amount') }}">
											</div>
										</td>
										<td data-name="del">
											<button name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'><span aria-hidden="true">×</span></button>
										</td>
									</tr>
									
									
									
									
								</tbody>
							</table>
							<a href="javascript:void(0)" id="add_row_which_subject" name="add-more" class="btn btn-success custom-btn">Add More</a>
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
									
									

									<tr id='addr0' data-id="0" class="hidden">
										<td data-name="award_name">
											<input type="text" class="form-control custom-form-control" name="award_name[]" value="{{ old('award_name') }}" required>
											@if($errors->has('award_name'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('award_name') }}</strong>
											</span>
											@endif
										</td>
										
										<td data-name="year">
											<input type="text" id="datepicker" name="year[]" class="form-control custom-form-control" value="{{ old('year') }}" required>
										</td>
										
										<td data-name="del">
											<button name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'><span aria-hidden="true">×</span></button>
										</td>
									</tr>
									<!-- </form> -->
									
									
								</tbody>
							</table>
							<a href="javascript:void(0)" id="add_row_geographic_info" name="add-more" class="btn btn-success custom-btn">Add More</a>
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
									
									
									<tr id='addr0' data-id="0" class="hidden">
										<td data-name="publishing_title">
											<input type="text" class="form-control custom-form-control" name="publishing_title[]" value="{{ old('publishing_title') }}" required>
											@if($errors->has('publishing_title'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('publishing_title') }}</strong>
											</span>
											@endif
										</td>
										
										<td data-name="published_year">
											<input type="text" id="datepicker" name="published_year[]" class="form-control custom-form-control" value="{{ old('published_year') }}" required>
										</td>
										<td data-name="publishing_link">
											<input type="text" name="publishing_link[]" class="form-control custom-form-control" value="{{ old('publishing_link') }}" required>
										</td>
										
										<td data-name="del">
											<button name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'><span aria-hidden="true">×</span></button>
										</td>
									</tr>
									<!-- </form> -->
									
									
								</tbody>
							</table>
							<a href="javascript:void(0)" id="add_publishing" name="add-more" class="btn btn-success custom-btn">Add More</a>
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