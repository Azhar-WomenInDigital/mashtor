@extends('frontend.layouts.master')
@section('dashboard-title',' Dashboard ')
@section('frontend-content')
<br>
<br>
<section class="page-content-user-dashboard pb-5">
	<div class="">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="mt-5">{{Auth::user()->f_name}} {{Auth::user()->l_name}} ! <i class="fas fa-grin"></i> Please Complete your Tutor Profile</h3>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="student-category-section pb-5 pt-5">
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<form action="{{url('/dashboard/tutor/academic')}}" method="post">
					@csrf
					<div class="studnet-category">
						<div class="form-group">
							<label for="" class="text-white font-weight-bold">I want to teach</label>
							<select name="level_id" id="level" class="form-control custom-form-control" onchange="return categoryDapend()" required>
								<option value="">Select...</option>
								<option value="sd">Secondary School</option>
								<option value="scp">Secondary or Collage or Polytechnic</option>
								<option value="u">University Level</option>
								<option value="uat">University Admission Tutoring</option>
							</select>
						</div>
						<!-- Secondary or collage or polytechnic opiton start -->
						<div class="form-group" id="medium" style="display: none;" >
							<label for="" class="text-white font-weight-bold"> Medium </label>
							<select name="medium_id" id="mediaCat" class="form-control" onchange=" return subCategoryDapend(); " >
								<option value=""> Select your medium </option>
								<option value="en">English</option>
								<option value="ban">Bangla</option>
							</select>
						</div>
						<div class="form-group" id="subject" style="display: none;">
							<label for="" class="text-white font-weight-bold"> Subject </label>
							<select name="subject_id" id="subject" class="form-control" >
								<option value=""> Select your subject </option>
								<option value="Math">Math</option>
								<option value="Biology">Biology</option>
								<option value="etc">etc</option>
							</select>
						</div>
						<!-- Secondary or collage or polytechnic opiton start -->
						<!-- University level start -->
						<div class="form-group" id="u_faculty" style="display: none;">
							<label for="" class="text-white font-weight-bold"> Faculty </label>
							<select name="faculty_id" id="university_faculty_level" class="form-control" onchange=" return facultyWiseSubject(); " >
								<option value="">Select Faculty</option>
								<option value="Business">Business</option>
								<option value="EEE">EEE</option>
								<option value="Pharmacy">Pharmacy</option>
								<option value="CSE">CSE</option>
								<option value="other">other</option>
							</select>
						</div>
						<div class="form-group" id="faculty_wise_subject" style="display: none;">
							<label for="" class="text-white font-weight-bold"> Subject </label>
							<select name="group_id" id="" class="form-control" >
								<option value="">Select Subject</option>
								<option value="Programming">Programming</option>
								<option value="Networking">Networking</option>
								<option value="Database">Database</option>
								<option value="AI">AI</option>
								<option value="other">other</option>
							</select>
						</div>
						<!-- University level end -->
						<!-- University Admission Tutoring start -->
						<div class="form-group" id="uat_sub_cat" style="display: none;">
							<label for="" class="text-white font-weight-bold"> University Admission Tutoring </label>
							<select name="department_id" id="u_sub_cat" class="form-control" onchange=" return universityCat(); " >
								<option value="">Select ....</option>
								<option value="medical">Medical</option>
								<option value="Eng">ENG:</option>
								<option value="univeristy">University</option>
							</select>
						</div>
						<div class="form-group" id="universitySubject" style="display: none;">
							<label for="" class="text-white font-weight-bold"> Faculty </label>
							<select name="faculty_id" id="universityAdmissionFaculty" class="form-control" onchange="return universitysAdmissionFaculty(); ">
								<option value="">Select Faculty....</option>
								<option value="science_faculty">Science Faculty</option>
								<option value="commerce_faculty">Commerce Faculty</option>
								<option value="arts_faculty">Arts Faculty</option>
							</select>
						</div>
						<div class="form-group" id="uatSubject" style="display: none;">
							<label for="" class="text-white font-weight-bold"> Subject </label>
							<select name="subject_id" class="form-control" >
								<option value="">Select ....</option>
								<option value="Chemistry">Chemistry</option>
								<option value="Physics">Physics </option>
								<option value="English">English</option>
							</select>
						</div>
						<!-- University Admission Tutoring end -->
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
function categoryDapend(){
var selectBox = document.getElementById('level');
var userInput = selectBox.options[selectBox.selectedIndex].value;
if( userInput == 'sd'){
document.getElementById('medium').style.display = 'block';
}
else{
document.getElementById('medium').style.display = 'none';
document.getElementById('uat_sub_cat').style.display = 'none';
document.getElementById('faculty_wise_subject').style.display = 'none';
document.getElementById('uatSubject').style.display = 'none';
document.getElementById('subject').style.display = 'none';
document.getElementById('universitySubject').style.display = 'none';
document.getElementById('u_faculty').style.display = 'none';
}
if( userInput == 'scp'){
document.getElementById('medium').style.display = 'block';
}else{
document.getElementById('u_faculty').style.display = 'none';
document.getElementById('subject').style.display = 'none';
}
if( userInput == 'u'){
document.getElementById('u_faculty').style.display = 'block';
}else{
document.getElementById('u_faculty').style.display = 'none';
document.getElementById('subject').style.display = 'none';
}
if( userInput == 'uat'){
document.getElementById('uat_sub_cat').style.display = 'block';
}else{
document.getElementById('uat_sub_cat').style.display = 'none';
document.getElementById('faculty_wise_subject').style.display = 'none';
}
return false;
}
//University Sub Category
function subCategoryDapend(){
var selectBox = document.getElementById('mediaCat');
var userInput = selectBox.options[selectBox.selectedIndex].value;
if( userInput == 'en'){
document.getElementById('subject').style.display = 'block';
}else if(userInput == 'ban'){
document.getElementById('subject').style.display = 'block';
}else{
document.getElementById('subject').style.display = 'none';
document.getElementById('subject').style.display = 'none';
}
return false;
}
// Group
function universityCat(){
var selectBox = document.getElementById('u_sub_cat');
var userInput = selectBox.options[selectBox.selectedIndex].value;
if( userInput == 'univeristy'){
document.getElementById('universitySubject').style.display = 'block';
}else if( userInput == 'medical' ){
document.getElementById('uatSubject').style.display = 'block';
}else if(userInput == 'Eng'){
document.getElementById('uatSubject').style.display = 'block';
}
else{
document.getElementById('universitySubject').style.display = 'none';
document.getElementById('uatSubject').style.display = 'none';
}
return false;
}
// faculty wise subject
function facultyWiseSubject(){
var selectBox = document.getElementById('university_faculty_level');
var userInput = selectBox.options[selectBox.selectedIndex].value;
if( userInput == 'CSE' || userInput == 'Business' || userInput == 'EEE' || userInput == 'Pharmacy' || userInput == 'other'){
document.getElementById('faculty_wise_subject').style.display = 'block';
}else{
document.getElementById('faculty_wise_subject').style.display = 'none';
document.getElementById('uatSubject').style.display = 'none';
}
return false;
}

// University Admission faculty wise subject
function universitysAdmissionFaculty(){
var selectBox = document.getElementById('universityAdmissionFaculty');
var userInput = selectBox.options[selectBox.selectedIndex].value;
if( userInput == 'science_faculty' || userInput == 'commerce_faculty' || userInput == 'arts_faculty' ){
document.getElementById('uatSubject').style.display = 'block';
}else{
document.getElementById('faculty_wise_subject').style.display = 'none';
document.getElementById('uatSubject').style.display = 'none';
}
return false;
}
</script>
@endsection