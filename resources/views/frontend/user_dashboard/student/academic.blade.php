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
		
		
		<div class="row justify-content-center">
			<div class="col-md-8">
				<ul class="list-group list-group-flush treeview custom-ul-li" >
					<!-- Secondary School Level  -->
					<li class="list-group-item"> Class 6 *
						<span class="angle_right"><i class="fal fa-angle-right"></i></span>
						<ul style="margin-left: 40px;line-height: 30px;">
							<li>Medium   <span class="angle_right"><i class="fal fa-angle-right"></i></span>
							<ul style="margin-left: 80px;line-height: 30px;">
								<li>Bangla  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
								<ul style="margin-left: 120px;line-height: 30px;">
									<li>Subject  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
									<ul style="margin-left: 120px;line-height: 30px;">
										<form action="{{url('student_category_save')}}" method="post">
											@csrf
											<?php
												$class_wise_subject = DB::table('student_academics')->where('class',6)->where('medium',1)->where('status',1)->get();
												foreach($class_wise_subject as $data ){
											?>
											<li>
												
												<input type="hidden" value="6" name="class">
												<input type="hidden" value="1" name="medium">
												<input type="hidden" value="1" name="medium">
												<div class="form-group form-check">
													<input type="checkbox" class="form-check-input" id="{{$data->subject}}" name="subject[]" value="{{$data->subject}}">
													<label class="form-check-label" for="{{$data->subject}}">{{$data->subject}}</label>
												</div>
												<br>
												<input type="submit" class="btn btn-success custom-btn" value="Continue">
												
												<!-- <a href="{{url('student/dashboard')}}" class="text-white"> {{$data->subject}} </a> -->
											</li>
											<?php } ?>
										</form>
										<!-- <li><a href="{{url('student/dashboard')}}" class="text-white">আমার বাংলা বই চারুপাঠ </a></li>
										<li><a href="{{url('student/dashboard')}}" class="text-white">বাংলা ব্যাকরণ ও নির্মিতি</a></li>
										<li><a href="{{url('student/dashboard')}}" class="text-white">গণিত</a></li>
										<li><a href="{{url('student/dashboard')}}" class="text-white">কৃষি শিক্ষা</a></li>
										<li><a href="{{url('student/dashboard')}}" class="text-white">English for Today </a></li>
										<li><a href="{{url('student/dashboard')}}" class="text-white">English Grammar & Composition</a></li>
										<li><a href="{{url('student/dashboard')}}" class="text-white">বিজ্ঞান</a></li>
										<li><a href="{{url('student/dashboard')}}" class="text-white">গার্হস্থ্য বিজ্ঞান</a></li>
										<li><a href="{{url('student/dashboard')}}" class="text-white">শারীরিক শিক্ষা ও স্বাস্থ্য</a></li>
										<li><a href="{{url('student/dashboard')}}" class="text-white">তথ্য ও যোগাযোগ প্রযুক্তি</a></li>
										<li><a href="{{url('student/dashboard')}}" class="text-white">কর্ম ও জীবনমুখী শিক্ষা </a></li>
										<li><a href="{{url('student/dashboard')}}" class="text-white">বাংলাদেশ ও বিশ্বপরিচয়</a></li>
										<li><a href="{{url('student/dashboard')}}" class="text-white">
										ইসলাম ও নৈতিক শিক্ষা</a></li>
										<li><a href="{{url('student/dashboard')}}" class="text-white">
										হিন্দুধর্ম ও নৈতিক শিক্ষা</a></li>
										<li><a href="{{url('student/dashboard')}}" class="text-white">
										বৌদ্ধধর্ম ও নৈতিক শিক্ষা</a></li>
										<li><a href="{{url('student/dashboard')}}" class="text-white">
										খ্রিষ্টধর্ম ও নৈতিক শিক্ষা</a></li>
										<li><a href="{{url('student/dashboard')}}" class="text-white">
										ক্ষুদ্র ও নৃগোষ্ঠীর ভাষা ও সংস্কৃতি  </a></li>-->
									</ul>
								</li>
							</ul>
						</li>
						<li>English  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
						<ul style="margin-left: 120px;line-height: 30px;">
							<li>Subject  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
							<ul style="margin-left: 120px;line-height: 30px;">
								<?php
										$class_wise_subject = DB::table('student_academics')->where('class',6)->where('medium',2)->where('status',1)->get();
										foreach($class_wise_subject as $data ){
								?>
								<li><a href="{{url('student/dashboard')}}" class="text-white"> {{$data->subject}} </a></li>
								<?php } ?>
								<!-- <li><a href="{{url('student/dashboard')}}" class="text-white">Joy reading - Anada Path</a></li>
								<li><a href="{{url('student/dashboard')}}" class="text-white">My Bengali Book Charu Path</a></li>
								<li><a href="{{url('student/dashboard')}}" class="text-white">Bangla Grammar and Composition</a></li>
								<li><a href="{{url('student/dashboard')}}" class="text-white">Mathematics</a></li>
								<li><a href="{{url('student/dashboard')}}" class="text-white">Agricultural education</a></li>
								<li><a href="{{url('student/dashboard')}}" class="text-white">English for Today</a></li>
								<li><a href="{{url('student/dashboard')}}" class="text-white">English Grammar & Composition</a></li>
								<li><a href="{{url('student/dashboard')}}" class="text-white">General science</a></li>
								<li><a href="{{url('student/dashboard')}}" class="text-white">Domestic Science</a></li>
								<li><a href="{{url('student/dashboard')}}" class="text-white">Physical Education and Health</a></li>
								<li><a href="{{url('student/dashboard')}}" class="text-white">Information and Communication Technology</a></li>
								<li><a href="{{url('student/dashboard')}}" class="text-white">Work and Life Oriented Education</a></li>
								<li><a href="{{url('student/dashboard')}}" class="text-white">Bangladesh and global education</a></li>
								<li><a href="{{url('student/dashboard')}}" class="text-white">
								Islam and moral education</a></li>
								<li><a href="{{url('student/dashboard')}}" class="text-white">
								Hinduism and moral education</a></li>
								<li><a href="{{url('student/dashboard')}}" class="text-white">
								Buddhist and moral education</a></li>
								<li><a href="{{url('student/dashboard')}}" class="text-white">
								Christianity and moral education</a></li>
								<li><a href="{{url('student/dashboard')}}" class="text-white">
								Small and ethnic language and culture . </a></li>
								
							</li> -->
						</ul>
					</li>
				</ul>
			</li>
		</ul>
	</li>
	<li>Institute  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
	<ul style="margin-left: 80px;line-height: 30px;">
		<li>
			<div class="input-group mb-3">
				<input type="text" class="form-control" placeholder="Enter your institute" aria-label="Recipient's username" aria-describedby="button-addon2">
				<div class="input-group-append">
					<button class="btn btn-success custom-btn" type="button" id="button-addon2">Continue</button>
				</div>
			</div>
		</li>
	</ul>
</li>
</ul>
</li>
<!--  6 end -->
<li class="list-group-item"> Class 7 *
<span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 40px;line-height: 30px;">
<li>Medium   <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 80px;line-height: 30px;">
	<li>Bangla  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
	<ul style="margin-left: 120px;line-height: 30px;">
		<li>Subject  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
		<ul style="margin-left: 120px;line-height: 30px;">
			<?php
				$class_wise_subject = DB::table('student_academics')->where('class',7)->where('medium',1)->where('status',1)->get();
				foreach($class_wise_subject as $data ){
			?>
			<li><a href="{{url('student/dashboard')}}" class="text-white"> {{$data->subject}} </a></li>
			<?php } ?>
		</ul>
	</li>
</ul>
</li>
<li>English  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 120px;line-height: 30px;">
<li>Subject  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 120px;line-height: 30px;">
	<?php
			$class_wise_subject = DB::table('student_academics')->where('class',7)->where('medium',2)->where('status',1)->get();
			foreach($class_wise_subject as $data ){
	?>
	<li><a href="{{url('student/dashboard')}}" class="text-white"> {{$data->subject}} </a></li>
	<?php } ?>
</ul>
</li>
</ul>
</li>
</ul>
</li>
<li>Institute  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 80px;line-height: 30px;">
<li>
<div class="input-group mb-3">
<input type="text" class="form-control" placeholder="Enter your institute" aria-label="Recipient's username" aria-describedby="button-addon2">
<div class="input-group-append">
<button class="btn btn-success custom-btn" type="button" id="button-addon2">Continue</button>
</div>
</div>
</li>
</ul>
</li>
</ul>
</li>
<!--  7 end -->
<!--  Class 8  -->
<li class="list-group-item"> Class 8 *
<span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 40px;line-height: 30px;">
<li>Medium   <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 80px;line-height: 30px;">
<li>Bangla  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 120px;line-height: 30px;">
<li>Subject  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 120px;line-height: 30px;">
<?php
	$class_wise_subject = DB::table('student_academics')->where('class',8)->where('medium',1)->where('status',1)->get();
	foreach($class_wise_subject as $data ){
?>
<li><a href="{{url('student/dashboard')}}" class="text-white"> {{$data->subject}} </a></li>
<?php } ?>
</ul>
</li>
</ul>
</li>
<li>English  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 120px;line-height: 30px;">
<li>Subject  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 120px;line-height: 30px;">
<?php
		$class_wise_subject = DB::table('student_academics')->where('class',8)->where('medium',2)->where('status',1)->get();
		foreach($class_wise_subject as $data ){
?>
<li><a href="{{url('student/dashboard')}}" class="text-white"> {{$data->subject}} </a></li>
<?php } ?>
</ul>
</li>
</ul>
</li>
</ul>
</li>
<li>Institute  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 80px;line-height: 30px;">
<li>
<div class="input-group mb-3">
<input type="text" class="form-control" placeholder="Enter your institute" aria-label="Recipient's username" aria-describedby="button-addon2">
<div class="input-group-append">
<button class="btn btn-success custom-btn" type="button" id="button-addon2">Continue</button>
</div>
</div>
</li>
</ul>
</li>
</ul>
</li>
<!--  Class 8 end -->
<!--  Class 9  -->
<li class="list-group-item"> Class 9 *
<span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 40px;line-height: 30px;">
<li>Medium   <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 80px;line-height: 30px;">
<li>Bangla  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 120px;line-height: 30px;">
<li>Group  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 120px;line-height: 30px;">
<li style="margin: 5px 0px;">
<form action="{{url('student_category_save')}}" method="post">
	@csrf
	<input type="hidden" name="class" value="9">
	<input type="hidden" name="medium" value="1">
	<input type="hidden" name="group" value="science">
	<button class="btn btn-success custom-btn" type="submit">Science</button> 
</form>
</li>
<li style="margin: 5px 0px;">
<form action="{{url('student_category_save')}}" method="post">
	@csrf
	<input type="hidden" name="class" value="9">
	<input type="hidden" name="medium" value="1">
	<input type="hidden" name="group" value="commerce">
	<button class="btn btn-success custom-btn" type="submit">Commerce</button> 
</form>
 </li>
<li style="margin: 5px 0px;">
<form action="{{url('student_category_save')}}" method="post">
	@csrf
	<input type="hidden" name="class" value="9">
	<input type="hidden" name="medium" value="1">
	<input type="hidden" name="group" value="arts">
	<button class="btn btn-success custom-btn" type="submit">Arts</button> 
</form>
</li>
</ul>
</li>
</ul>
</li>
<li>English  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 120px;line-height: 30px;">
<li>Group  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 120px;line-height: 30px;">
<li style="margin: 5px 0px;">
<form action="{{url('student_category_save')}}" method="post">
	@csrf
	<input type="hidden" name="class" value="9">
	<input type="hidden" name="medium" value="2">
	<input type="hidden" name="group" value="science">
	<button class="btn btn-success custom-btn" type="submit">Science</button> 
</form>
</li>
<li style="margin: 5px 0px;">
<form action="{{url('student_category_save')}}" method="post">
	@csrf
	<input type="hidden" name="class" value="9">
	<input type="hidden" name="medium" value="2">
	<input type="hidden" name="group" value="commerce">
	<button class="btn btn-success custom-btn" type="submit">Commerce</button> 
</form>
 </li>
<li style="margin: 5px 0px;">
<form action="{{url('student_category_save')}}" method="post">
	@csrf
	<input type="hidden" name="class" value="9">
	<input type="hidden" name="medium" value="2">
	<input type="hidden" name="group" value="arts">
	<button class="btn btn-success custom-btn" type="submit">Arts</button> 
</form>
</li>
</ul>
</li>
</ul>
</li>
</ul>
</li>
<li>Institute  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 80px;line-height: 30px;">
<li>
<div class="input-group mb-3">
<input type="text" class="form-control" placeholder="Enter your institute" aria-label="Recipient's username" aria-describedby="button-addon2">
<div class="input-group-append">
<button class="btn btn-success custom-btn" type="button" id="button-addon2">Continue</button>
</div>
</div>
</li>
</ul>
</li>
</ul>
</li>
<!--  Class 9 end -->
<!--  Class 10  -->
<li class="list-group-item"> Class 10 *
<span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 40px;line-height: 30px;">
<li>Medium   <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 80px;line-height: 30px;">
<li>Bangla  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 120px;line-height: 30px;">
<li>Group  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 120px;line-height: 30px;">
<li style="margin: 5px 0px;">
<form action="{{url('student_category_save')}}" method="post">
	@csrf
	<input type="hidden" name="class" value="10">
	<input type="hidden" name="medium" value="1">
	<input type="hidden" name="group" value="science">
	<button class="btn btn-success custom-btn" type="submit">Science</button> 
</form>
</li>
<li style="margin: 5px 0px;">
<form action="{{url('student_category_save')}}" method="post">
	@csrf
	<input type="hidden" name="class" value="10">
	<input type="hidden" name="medium" value="1">
	<input type="hidden" name="group" value="commerce">
	<button class="btn btn-success custom-btn" type="submit">Commerce</button> 
</form>
 </li>
<li style="margin: 5px 0px;">
<form action="{{url('student_category_save')}}" method="post">
	@csrf
	<input type="hidden" name="class" value="10">
	<input type="hidden" name="medium" value="1">
	<input type="hidden" name="group" value="arts">
	<button class="btn btn-success custom-btn" type="submit">Arts</button> 
</form>
</li>
</ul>
</li>
</ul>
</li>
<li>English  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 120px;line-height: 30px;">
<li>Group  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 120px;line-height: 30px;">
<li style="margin: 5px 0px;">
<form action="{{url('student_category_save')}}" method="post">
	@csrf
	<input type="hidden" name="class" value="10">
	<input type="hidden" name="medium" value="2">
	<input type="hidden" name="group" value="science">
	<button class="btn btn-success custom-btn" type="submit">Science</button> 
</form>
</li>

<li style="margin: 5px 0px;">
<form action="{{url('student_category_save')}}" method="post">
	@csrf
	<input type="hidden" name="class" value="10">
	<input type="hidden" name="medium" value="2">
	<input type="hidden" name="group" value="commerce">
	<button class="btn btn-success custom-btn" type="submit">Commerce</button> 
</form>
 </li>
 <br>
<li style="margin: 5px 0px;">
<form action="{{url('student_category_save')}}" method="post">
	@csrf
	<input type="hidden" name="class" value="10">
	<input type="hidden" name="medium" value="2">
	<input type="hidden" name="group" value="arts">
	<button class="btn btn-success custom-btn" type="submit">Arts</button> 
</form>
</li>
</ul>
</li>
</ul>
</li>
</ul>
</li>
<li>Institute  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 80px;line-height: 30px;">
<li>
<div class="input-group mb-3">
<input type="text" class="form-control" placeholder="Enter your institute" aria-label="Recipient's username" aria-describedby="button-addon2">
<div class="input-group-append">
<button class="btn btn-success custom-btn" type="button" id="button-addon2">Continue</button>
</div>
</div>
</li>
</ul>
</li>
</ul>
</li>
<!--  Class 10 end -->
<!--  Class 11  -->
<li class="list-group-item"> Class 11 *
<span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 40px;line-height: 30px;">
<li>Medium   <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 80px;line-height: 30px;">
<li>Bangla  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 120px;line-height: 30px;">
<li>Group  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 120px;line-height: 30px;">
<li style="margin: 5px 0px;">
<form action="{{url('student_category_save')}}" method="post">
	@csrf
	<input type="hidden" name="class" value="10">
	<input type="hidden" name="medium" value="1">
	<input type="hidden" name="group" value="science">
	<button class="btn btn-success custom-btn" type="submit">Science</button> 
</form>
</li>
<li style="margin: 5px 0px;">
<form action="{{url('student_category_save')}}" method="post">
	@csrf
	<input type="hidden" name="class" value="10">
	<input type="hidden" name="medium" value="1">
	<input type="hidden" name="group" value="commerce">
	<button class="btn btn-success custom-btn" type="submit">Commerce</button> 
</form>
 </li>
<li style="margin: 5px 0px;">
<form action="{{url('student_category_save')}}" method="post">
	@csrf
	<input type="hidden" name="class" value="10">
	<input type="hidden" name="medium" value="1">
	<input type="hidden" name="group" value="arts">
	<button class="btn btn-success custom-btn" type="submit">Arts</button> 
</form>
</li>
</ul>
</li>
</ul>
</li>
<li>English  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 120px;line-height: 30px;">
<li>Group  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 120px;line-height: 30px;">
<li style="margin: 5px 0px;">
<form action="{{url('student_category_save')}}" method="post">
	@csrf
	<input type="hidden" name="class" value="10">
	<input type="hidden" name="medium" value="2">
	<input type="hidden" name="group" value="science">
	<button class="btn btn-success custom-btn" type="submit">Science</button> 
</form>
</li>

<li style="margin: 5px 0px;">
<form action="{{url('student_category_save')}}" method="post">
	@csrf
	<input type="hidden" name="class" value="10">
	<input type="hidden" name="medium" value="2">
	<input type="hidden" name="group" value="commerce">
	<button class="btn btn-success custom-btn" type="submit">Commerce</button> 
</form>
 </li>
 <br>
<li style="margin: 5px 0px;">
<form action="{{url('student_category_save')}}" method="post">
	@csrf
	<input type="hidden" name="class" value="10">
	<input type="hidden" name="medium" value="2">
	<input type="hidden" name="group" value="arts">
	<button class="btn btn-success custom-btn" type="submit">Arts</button> 
</form>
</li>
</ul>
</li>
</ul>
</li>
</ul>
</li>
<li>Institute  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 80px;line-height: 30px;">
<li>
<div class="input-group mb-3">
<input type="text" class="form-control" placeholder="Enter your institute" aria-label="Recipient's username" aria-describedby="button-addon2">
<div class="input-group-append">
<button class="btn btn-success custom-btn" type="button" id="button-addon2">Continue</button>
</div>
</div>
</li>
</ul>
</li>
</ul>
</li>
<!--  Class 11 end -->
<!--  Class 12  -->
<li class="list-group-item"> Class 12 *
<span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 40px;line-height: 30px;">
<li>Medium   <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 80px;line-height: 30px;">
<li>Bangla  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 120px;line-height: 30px;">
<li>Group  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 120px;line-height: 30px;">
<li style="margin: 5px 0px;">
<form action="{{url('student_category_save')}}" method="post">
	@csrf
	<input type="hidden" name="class" value="10">
	<input type="hidden" name="medium" value="1">
	<input type="hidden" name="group" value="science">
	<button class="btn btn-success custom-btn" type="submit">Science</button> 
</form>
</li>
<li style="margin: 5px 0px;">
<form action="{{url('student_category_save')}}" method="post">
	@csrf
	<input type="hidden" name="class" value="10">
	<input type="hidden" name="medium" value="1">
	<input type="hidden" name="group" value="commerce">
	<button class="btn btn-success custom-btn" type="submit">Commerce</button> 
</form>
 </li>
<li style="margin: 5px 0px;">
<form action="{{url('student_category_save')}}" method="post">
	@csrf
	<input type="hidden" name="class" value="10">
	<input type="hidden" name="medium" value="1">
	<input type="hidden" name="group" value="arts">
	<button class="btn btn-success custom-btn" type="submit">Arts</button> 
</form>
</li>
</ul>
</li>
</ul>
</li>
<li>English  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 120px;line-height: 30px;">
<li>Group  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 120px;line-height: 30px;">
<li style="margin: 5px 0px;">
<form action="{{url('student_category_save')}}" method="post">
	@csrf
	<input type="hidden" name="class" value="10">
	<input type="hidden" name="medium" value="2">
	<input type="hidden" name="group" value="science">
	<button class="btn btn-success custom-btn" type="submit">Science</button> 
</form>
</li>

<li style="margin: 5px 0px;">
<form action="{{url('student_category_save')}}" method="post">
	@csrf
	<input type="hidden" name="class" value="10">
	<input type="hidden" name="medium" value="2">
	<input type="hidden" name="group" value="commerce">
	<button class="btn btn-success custom-btn" type="submit">Commerce</button> 
</form>
 </li>
 <br>
<li style="margin: 5px 0px;">
<form action="{{url('student_category_save')}}" method="post">
	@csrf
	<input type="hidden" name="class" value="10">
	<input type="hidden" name="medium" value="2">
	<input type="hidden" name="group" value="arts">
	<button class="btn btn-success custom-btn" type="submit">Arts</button> 
</form>
</li>
</ul>
</li>
</ul>
</li>
</ul>
</li>
<li>Institute  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 80px;line-height: 30px;">
<li>
<div class="input-group mb-3">
<input type="text" class="form-control" placeholder="Enter your institute" aria-label="Recipient's username" aria-describedby="button-addon2">
<div class="input-group-append">
<button class="btn btn-success custom-btn" type="button" id="button-addon2">Continue</button>
</div>
</div>
</li>
</ul>
</li>
</ul>
</li>
<!--  Class 12 end -->
<!--  University -->
<li class="list-group-item"> University   <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 40px;line-height: 30px;">
<li> Faculty  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 80px;line-height: 30px;">
<hr>


<form action="{{url('student_category_save')}}" method="post">
	@csrf
	<input type="hidden" name="class" value="University">
	<input type="hidden" name="medium" value="2">
	<input type="hidden" name="group" value="arts">
	<button class="btn btn-success custom-btn" type="submit">Business</button> 
</form>

<li><a href="{{url('student/dashboard')}}" class="text-white">Business</a></li>
<li><a href="{{url('student/dashboard')}}" class="text-white">IT</a></li>
<li><a href="{{url('student/dashboard')}}" class="text-white">EEE</a></li>
<li><a href="{{url('student/dashboard')}}" class="text-white">Pharmacy</a></li>
<li>etc.</li>
</ul>
</li>
<li> I’m looking tutor for….  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 80px;line-height: 30px;">
<li><a href="{{url('student/dashboard')}}" class="text-white">Marketing</a></li>
<li><a href="{{url('student/dashboard')}}" class="text-white">Management</a></li>
<li><a href="{{url('student/dashboard')}}" class="text-white">etc</a></li>
<li>etc.</li>
</ul>
</li>
</ul>
</li>
<!-- University Admission Tutoring -->
<li class="list-group-item"> University Admission Tutoring
<span><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 40px;line-height: 30px;">Medical </span>
<li>Business</li>
<li>ENG:  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 40px;line-height: 30px;">
<li><a href="#" class="text-white">BUET</a></li>
<li><a href="#" class="text-white">RUET etc</a></li>
</ul>
</li>
<li>University  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 80px;line-height: 30px;">
<li>Science faculty  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 120px;line-height: 30px;">
<li><a href="{{url('student/dashboard')}}" class="text-white">Chemistry</a></li>
<li><a href="{{url('student/dashboard')}}" class="text-white">Physics</a></li>
<li><a href="{{url('student/dashboard')}}" class="text-white">English</a></li>
</ul>
</li>
<li>Commerce faculty  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 120px;line-height: 30px;">
<li><a href="{{url('student/dashboard')}}" class="text-white">Chemistry</a></li>
<li><a href="{{url('student/dashboard')}}" class="text-white">Physics</a></li>
<li><a href="{{url('student/dashboard')}}" class="text-white">English</a></li>
</ul>
</li>
<li>Arts faculty  <span class="angle_right"><i class="fal fa-angle-right"></i></span>
<ul style="margin-left: 120px;line-height: 30px;">
<li><a href="{{url('student/dashboard')}}" class="text-white">Chemistry</a></li>
<li><a href="{{url('student/dashboard')}}" class="text-white">Physics</a></li>
<li><a href="{{url('student/dashboard')}}" class="text-white">English</a></li>
</ul>
</li>
</ul>
</li>
</ul>
</li>
</ul>
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
<script src="{{url('frontend/assets/js/jquery.treeView.js')}}"></script>
<script>
	$('.treeview').treeView();
</script>
<script>
// $(document).ready(function(){
																		// 		$('#level').change(function(){
																											// 			var level_id = $(this).val();
																											// 			var url = '{{ url('tutor/medium') }}' +'/' + level_id;
																											// 			$.ajax({
																																													// 					url:url,
																																													// 					method:"get",
																																													// 					data:{level_id:level_id},
																																													// 					success:function(data){
																																																						// 						$('#medium_show').fadeIn();
																																																						// 						$('#medium_show').html(data);
																																													// 					}
																																				// 				});
																		// 		});
									// 	});
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
	// $(document).ready(function(){
										// 	$('#level').change(function(){
																			// 		var level_id = $(this).val();
																			// 		var url = '{{ url('tutor/medium') }}' +'/' + level_id;
																			// 		$.ajax({
																																					// 				url:url,
																																					// 				method:"get",
																																					// 				data:{level_id:level_id},
																																					// 				success:function(data){
																																														// 					$('#medium').fadeIn();
																																														// 					$('#medium').html(data);
																																					// 				}
																												// 			});
										// 	});
	// });
	// $(document).ready(function(){
										// 	$('#medium').change(function(){
																			// 		var medium_id = $(this).val();
																			// 		var url = '{{ url('tutor/medium') }}' +'/' + level_id;
																			// 		$.ajax({
																																					// 				url:url,
																																					// 				method:"get",
																																					// 				data:{level_id:level_id},
																																					// 				success:function(data){
																																														// 					$('#medium').fadeIn();
																																														// 					$('#medium').html(data);
																																					// 				}
																												// 			});
			
										// 	});
	// });
	// $(document).ready(function(){
										// 	$('.sdfsdfsd').change(function(){
																			// 		alert("dsfd");
										// 	});
		
										// 	$('#levelAt').change(function(){
																			// 		var level_id = $(this).val();
																			// 		var url = '{{ url('student/medium') }}' +'/' + level_id;
																			// 		$.ajax({
																																					// 				url:url,
																																					// 				method:"get",
																																					// 				data:{level_id:level_id},
																																					// 				success:function(data){
																																														// 					$('#medium').fadeIn();
																																														// 					$('#medium').html(data);
																																					// 				}
																												// 			});
										// 	});
		
																			// 		$('#sdfsdfsd').change(function(){
																																					// 				alert('sdfsdf');
																																					// 				var group_id = $(this).val();
																																					// 				var url = '{{ url('student/subject') }}' +'/' + group_id;
																																					// 				$.ajax({
																																																																									// 								url:url,
																																																																									// 								method:"get",
																																																																									// 								data:{group_id:group_id},
																																																																									// 								success:function(data){
																																																																																											// 										$('#subject').fadeIn();
																																																																																											// 										$('#subject').html(data);
																																																																									// 								}
																																																							// 						});
	// });
		
	// });
	
</script>
@endsection
@endsection