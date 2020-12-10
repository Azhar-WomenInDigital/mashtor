@extends('frontend.layouts.master')
@section('dashboard-title',' Dashboard ')
@section('frontend-content')
<style>
	.tutor-profile-apporaval{
		background: #F5F5F5;
	}
	body {
background-color: #efefef;
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
    /* text-align: center; */
    bottom: 28%;
    font-size: 30px;
    color: orange;
    left: 7%;
}
.p-image:hover {
transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
}
.upload-button {
font-size: 1.2em;
}
.upload-button:hover {
transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
color: #999;
}
.toast-header{
	font-size: 13px;
}
</style>
<section class="tutor-profile-apporaval pb-5 pt-5">
	<div class="flash-message float-right">
		@include('frontend.partials._message')
	</div>
	
	<div class="container">
		<div class="row">
			<br><br><br>
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						
						Become a tutor with these simple steps: <br><br>
						
						
						<p><a href=""><i class="fas fa-business-time"></i>  Create your professinal info</a></p>
						
					</div>
				</div>
				<br><br>
				<div class="card">
					<div class="card-body">
						Any questions? <br><br>
						<a href="" class="btn btn-success custom-btn">Chat Now</a>
						or <a href="">Contact Us</a>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				
				<section class="tutor-profile-apporaval">
					<h3 class="text-center"> Update your basic profile</h3> <br><br>
					<form action="{{url('tutor/profile')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="container">
							<div class="flash-message ">
								@include('frontend.partials._message')
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="cover-photo">
										
									</div>
									<div class="circle">
										<!-- User Profile Image -->
										<?php
											echo "<img src='".asset($basic_info->profile_pic)."'/>";
										?>
										<!-- Default Image -->
										<!-- <i class="fa fa-user fa-5x"></i> -->
									</div>
									<div class="p-image">
										<i class="fa fa-camera upload-button"></i>
										<input class="file-upload" name="profile_pic" type="file" accept="image/*"/ required>
									</div>
									<p>Upload Profile Picture</p>
									<br>
									<div class="row">
										<div class="col-md-6" style="margin:0;padding: 0;">
											
											<div class="form-group ">
												<label for="">Profile Tag</label>
												<input type="text" class="form-control custom-form-control" name="profile_tag" value="{{ old('profile_tag',$basic_info->profile_tag) }}" required>
											</div>
										</div>
										<div class="col-md-6" >
											
											<div class="form-group" style="margin-right: -16px;">
												<label for="">Hourly Rate</label>
												<input type="text" class="form-control custom-form-control" name="hourly_rate" value=" {{ old('hourly_rate',$basic_info->hourly_rate) }} " required>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Your Educational Qualification* -->
						<div class="container">
							<!--  About Your Self  -->
							<div class="row">
								<div class="col-md-12">
									<p class="mb-1">Write about yourself ( Students could see )</p>
									<div class="form-group">
										<textarea name="your_self" class="form-control custom-form-control" id="" cols="10" rows="1" required> {{$basic_info->your_self}}</textarea >
									</div>
									<br>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<p class="mb-1"> Your Educational Qualification <span class="text-danger">*</span> </p>
									<table class="table table-bordered" id="tab_logic">
										<thead>
											<td>Exam</td>
											<td>Passing Year</td>
											<td>CGPA</td>
											<td>Institute</td>
											<td>Upload Transcript</td>
											<td>Remove</td>
										</thead>
										<tbody>
											<!-- <form action="{{url('tutor/edutcation')}}" method="post" enctype="multipart/form-data"> -->
											<?php
												$tutor_education = DB::table('tutor_education')->where('user_id',Auth::user()->id)->get();
												foreach ($tutor_education as $data) {
													
												
											?>
											<tr id='addr0' data-id="0" class="hidden">
												<td data-name="exam">
													<input type="text" class="form-control custom-form-control" value="{{$data->exam}}" placeholder="Example: SSC,HSC" name="exam[]">
												</td>
												<td data-name="passing_year">
													<input type="date" class="form-control custom-form-control" placeholder="Example: SSC,HSC" name="passing_year[]" value="{{$data->passing_year}}">
												</td>
												<td data-name="cgpa">
													<input type="text" class="form-control custom-form-control" placeholder="Example: 3.60" name="cgpa[]" value="{{$data->cgpa}}">
												</td>
												<td data-name="institute">
													<input type="text" class="form-control custom-form-control" placeholder="Example: BUET" name="institute[]" value="{{$data->institute}}">
												</td>
												<td data-name="transcript">
													<label class="upload"> Upload
														<input type="file"  name="transcript[]">
													</label>
												</td>
												<td data-name="del">
													<a href="javascript:void(0)" name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'><span aria-hidden="true">×</span></a>
												</td>
											</tr>
										<?php } ?>
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
									<p class="mb-1">  Which subject you want to teach <span class="text-danger">*</span> </p>
									<table class="table table-bordered" id="tab_which_subject">
										<thead>
											<td>Level</td>
											<td>Subject</td>
											<td>Gender</td>
											<td>Session Type </td>
											<td>Price per hour</td>
											<td>Remove</td>
										</thead>
										<tbody>
											<!-- <form action="{{url('tutor/edutcation')}}" method="post" enctype="multipart/form-data"> -->
											<?php
												$which_subject = DB::table('which_subject_teaches')->where('user_id',Auth::user()->id)->get();
												foreach ($which_subject as $data) {
													$levels = DB::table('levels')->where('id',$data->level)->first();
													// echo "<pre>";
													// print_r($levels);
													
											?>
											<tr id='addr0' data-id="0" class="hidden">
												<td data-name="level">
													<select name="level[]" id="" class="form-control custom-form-control" required>
														<option value="">{{$levels->level}}</option>
														<option value="">Select Level</option>
														@foreach($level as $data)
														<option value="{{$data->id}}">{{$data->level}}</option>
														@endforeach
													</select>
												</td>
												<td data-name="subject">
													<select class="form-control custom-form-control" name="subject[]" required>
														@foreach($subject as $data)
														<option value="{{$data->id}}">{{$data->subject}}</option>
														
														@endforeach
													</select>
												</td>
												<td data-name="gender">
													<select name="gender[]" id="" class="form-control custom-form-control">
														<option value="">Male or female or
														any</option>
														<option value="m">Male</option>
														<option value="f">Female</option>
														<option value="a">Any</option>
													</select>
												</td>
												<td data-name="session_type">
													<select name="session_type[]" id="" class="form-control custom-form-control" required>
														<option value="">Select Session</option>
														@foreach($session as $data)
														<option value="{{$data->id}}">{{$data->session}}</option>
														@endforeach
													</select>
												</td>
												<td data-name="transcript">
													<input type="text" class="form-control custom-form-control" name="price[]">
												</td>
												<td data-name="del">
													<button name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'><span aria-hidden="true">×</span></button>
												</td>
											</tr>
											<!-- </form> -->
											<?php } ?>
											
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
									<p class="mb-1">  Write your teaching Geographic information </p>
									<table class="table table-bordered" id="tab_geographic_info">
										<thead>
											<td>Select your Teaching country</td>
											<td> State</td>
											<td> Education Board</td>
											<td>Select district </td>
											<td>Remove</td>
										</thead>
										<tbody>
											<!-- <form action="{{url('tutor/edutcation')}}" method="post" enctype="multipart/form-data"> -->
											
											<tr id='addr0' data-id="0" class="hidden">
												<td data-name="teaching_country">
													<select name="teaching_country[]" id="" class="form-control custom-form-control" required>
														<option value="">Select Country</option>
														<option value="Afghanistan">Afghanistan</option>
														<option value="Åland Islands">Åland Islands</option>
														<option value="Albania">Albania</option>
														<option value="Algeria">Algeria</option>
														<option value="American Samoa">American Samoa</option>
														<option value="Andorra">Andorra</option>
														<option value="Angola">Angola</option>
														<option value="Anguilla">Anguilla</option>
														<option value="Antarctica">Antarctica</option>
														<option value="Antigua and Barbuda">Antigua and Barbuda</option>
														<option value="Argentina">Argentina</option>
														<option value="Armenia">Armenia</option>
														<option value="Aruba">Aruba</option>
														<option value="Australia">Australia</option>
														<option value="Austria">Austria</option>
														<option value="Azerbaijan">Azerbaijan</option>
														<option value="Bahamas">Bahamas</option>
														<option value="Bahrain">Bahrain</option>
														<option value="Bangladesh">Bangladesh</option>
														<option value="Barbados">Barbados</option>
														<option value="Belarus">Belarus</option>
														<option value="Belgium">Belgium</option>
														<option value="Belize">Belize</option>
														<option value="Benin">Benin</option>
														<option value="Bermuda">Bermuda</option>
														<option value="Bhutan">Bhutan</option>
														<option value="Bolivia">Bolivia</option>
														<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
														<option value="Botswana">Botswana</option>
														<option value="Bouvet Island">Bouvet Island</option>
														<option value="Brazil">Brazil</option>
														<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
														<option value="Brunei Darussalam">Brunei Darussalam</option>
														<option value="Bulgaria">Bulgaria</option>
														<option value="Burkina Faso">Burkina Faso</option>
														<option value="Burundi">Burundi</option>
														<option value="Cambodia">Cambodia</option>
														<option value="Cameroon">Cameroon</option>
														<option value="Canada">Canada</option>
														<option value="Cape Verde">Cape Verde</option>
														<option value="Cayman Islands">Cayman Islands</option>
														<option value="Central African Republic">Central African Republic</option>
														<option value="Chad">Chad</option>
														<option value="Chile">Chile</option>
														<option value="China">China</option>
														<option value="Christmas Island">Christmas Island</option>
														<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
														<option value="Colombia">Colombia</option>
														<option value="Comoros">Comoros</option>
														<option value="Congo">Congo</option>
														<option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
														<option value="Cook Islands">Cook Islands</option>
														<option value="Costa Rica">Costa Rica</option>
														<option value="Cote D'ivoire">Cote D'ivoire</option>
														<option value="Croatia">Croatia</option>
														<option value="Cuba">Cuba</option>
														<option value="Cyprus">Cyprus</option>
														<option value="Czech Republic">Czech Republic</option>
														<option value="Denmark">Denmark</option>
														<option value="Djibouti">Djibouti</option>
														<option value="Dominica">Dominica</option>
														<option value="Dominican Republic">Dominican Republic</option>
														<option value="Ecuador">Ecuador</option>
														<option value="Egypt">Egypt</option>
														<option value="El Salvador">El Salvador</option>
														<option value="Equatorial Guinea">Equatorial Guinea</option>
														<option value="Eritrea">Eritrea</option>
														<option value="Estonia">Estonia</option>
														<option value="Ethiopia">Ethiopia</option>
														<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
														<option value="Faroe Islands">Faroe Islands</option>
														<option value="Fiji">Fiji</option>
														<option value="Finland">Finland</option>
														<option value="France">France</option>
														<option value="French Guiana">French Guiana</option>
														<option value="French Polynesia">French Polynesia</option>
														<option value="French Southern Territories">French Southern Territories</option>
														<option value="Gabon">Gabon</option>
														<option value="Gambia">Gambia</option>
														<option value="Georgia">Georgia</option>
														<option value="Germany">Germany</option>
														<option value="Ghana">Ghana</option>
														<option value="Gibraltar">Gibraltar</option>
														<option value="Greece">Greece</option>
														<option value="Greenland">Greenland</option>
														<option value="Grenada">Grenada</option>
														<option value="Guadeloupe">Guadeloupe</option>
														<option value="Guam">Guam</option>
														<option value="Guatemala">Guatemala</option>
														<option value="Guernsey">Guernsey</option>
														<option value="Guinea">Guinea</option>
														<option value="Guinea-bissau">Guinea-bissau</option>
														<option value="Guyana">Guyana</option>
														<option value="Haiti">Haiti</option>
														<option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
														<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
														<option value="Honduras">Honduras</option>
														<option value="Hong Kong">Hong Kong</option>
														<option value="Hungary">Hungary</option>
														<option value="Iceland">Iceland</option>
														<option value="India">India</option>
														<option value="Indonesia">Indonesia</option>
														<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
														<option value="Iraq">Iraq</option>
														<option value="Ireland">Ireland</option>
														<option value="Isle of Man">Isle of Man</option>
														<option value="Israel">Israel</option>
														<option value="Italy">Italy</option>
														<option value="Jamaica">Jamaica</option>
														<option value="Japan">Japan</option>
														<option value="Jersey">Jersey</option>
														<option value="Jordan">Jordan</option>
														<option value="Kazakhstan">Kazakhstan</option>
														<option value="Kenya">Kenya</option>
														<option value="Kiribati">Kiribati</option>
														<option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
														<option value="Korea, Republic of">Korea, Republic of</option>
														<option value="Kuwait">Kuwait</option>
														<option value="Kyrgyzstan">Kyrgyzstan</option>
														<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
														<option value="Latvia">Latvia</option>
														<option value="Lebanon">Lebanon</option>
														<option value="Lesotho">Lesotho</option>
														<option value="Liberia">Liberia</option>
														<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
														<option value="Liechtenstein">Liechtenstein</option>
														<option value="Lithuania">Lithuania</option>
														<option value="Luxembourg">Luxembourg</option>
														<option value="Macao">Macao</option>
														<option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
														<option value="Madagascar">Madagascar</option>
														<option value="Malawi">Malawi</option>
														<option value="Malaysia">Malaysia</option>
														<option value="Maldives">Maldives</option>
														<option value="Mali">Mali</option>
														<option value="Malta">Malta</option>
														<option value="Marshall Islands">Marshall Islands</option>
														<option value="Martinique">Martinique</option>
														<option value="Mauritania">Mauritania</option>
														<option value="Mauritius">Mauritius</option>
														<option value="Mayotte">Mayotte</option>
														<option value="Mexico">Mexico</option>
														<option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
														<option value="Moldova, Republic of">Moldova, Republic of</option>
														<option value="Monaco">Monaco</option>
														<option value="Mongolia">Mongolia</option>
														<option value="Montenegro">Montenegro</option>
														<option value="Montserrat">Montserrat</option>
														<option value="Morocco">Morocco</option>
														<option value="Mozambique">Mozambique</option>
														<option value="Myanmar">Myanmar</option>
														<option value="Namibia">Namibia</option>
														<option value="Nauru">Nauru</option>
														<option value="Nepal">Nepal</option>
														<option value="Netherlands">Netherlands</option>
														<option value="Netherlands Antilles">Netherlands Antilles</option>
														<option value="New Caledonia">New Caledonia</option>
														<option value="New Zealand">New Zealand</option>
														<option value="Nicaragua">Nicaragua</option>
														<option value="Niger">Niger</option>
														<option value="Nigeria">Nigeria</option>
														<option value="Niue">Niue</option>
														<option value="Norfolk Island">Norfolk Island</option>
														<option value="Northern Mariana Islands">Northern Mariana Islands</option>
														<option value="Norway">Norway</option>
														<option value="Oman">Oman</option>
														<option value="Pakistan">Pakistan</option>
														<option value="Palau">Palau</option>
														<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
														<option value="Panama">Panama</option>
														<option value="Papua New Guinea">Papua New Guinea</option>
														<option value="Paraguay">Paraguay</option>
														<option value="Peru">Peru</option>
														<option value="Philippines">Philippines</option>
														<option value="Pitcairn">Pitcairn</option>
														<option value="Poland">Poland</option>
														<option value="Portugal">Portugal</option>
														<option value="Puerto Rico">Puerto Rico</option>
														<option value="Qatar">Qatar</option>
														<option value="Reunion">Reunion</option>
														<option value="Romania">Romania</option>
														<option value="Russian Federation">Russian Federation</option>
														<option value="Rwanda">Rwanda</option>
														<option value="Saint Helena">Saint Helena</option>
														<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
														<option value="Saint Lucia">Saint Lucia</option>
														<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
														<option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
														<option value="Samoa">Samoa</option>
														<option value="San Marino">San Marino</option>
														<option value="Sao Tome and Principe">Sao Tome and Principe</option>
														<option value="Saudi Arabia">Saudi Arabia</option>
														<option value="Senegal">Senegal</option>
														<option value="Serbia">Serbia</option>
														<option value="Seychelles">Seychelles</option>
														<option value="Sierra Leone">Sierra Leone</option>
														<option value="Singapore">Singapore</option>
														<option value="Slovakia">Slovakia</option>
														<option value="Slovenia">Slovenia</option>
														<option value="Solomon Islands">Solomon Islands</option>
														<option value="Somalia">Somalia</option>
														<option value="South Africa">South Africa</option>
														<option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
														<option value="Spain">Spain</option>
														<option value="Sri Lanka">Sri Lanka</option>
														<option value="Sudan">Sudan</option>
														<option value="Suriname">Suriname</option>
														<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
														<option value="Swaziland">Swaziland</option>
														<option value="Sweden">Sweden</option>
														<option value="Switzerland">Switzerland</option>
														<option value="Syrian Arab Republic">Syrian Arab Republic</option>
														<option value="Taiwan, Province of China">Taiwan, Province of China</option>
														<option value="Tajikistan">Tajikistan</option>
														<option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
														<option value="Thailand">Thailand</option>
														<option value="Timor-leste">Timor-leste</option>
														<option value="Togo">Togo</option>
														<option value="Tokelau">Tokelau</option>
														<option value="Tonga">Tonga</option>
														<option value="Trinidad and Tobago">Trinidad and Tobago</option>
														<option value="Tunisia">Tunisia</option>
														<option value="Turkey">Turkey</option>
														<option value="Turkmenistan">Turkmenistan</option>
														<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
														<option value="Tuvalu">Tuvalu</option>
														<option value="Uganda">Uganda</option>
														<option value="Ukraine">Ukraine</option>
														<option value="United Arab Emirates">United Arab Emirates</option>
														<option value="United Kingdom">United Kingdom</option>
														<option value="United States">United States</option>
														<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
														<option value="Uruguay">Uruguay</option>
														<option value="Uzbekistan">Uzbekistan</option>
														<option value="Vanuatu">Vanuatu</option>
														<option value="Venezuela">Venezuela</option>
														<option value="Viet Nam">Viet Nam</option>
														<option value="Virgin Islands, British">Virgin Islands, British</option>
														<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
														<option value="Wallis and Futuna">Wallis and Futuna</option>
														<option value="Western Sahara">Western Sahara</option>
														<option value="Yemen">Yemen</option>
														<option value="Zambia">Zambia</option>
														<option value="Zimbabwe">Zimbabwe</option>
														
													</select>
												</td>
												<td data-name="state">
													<input type="text" class="form-control custom-form-control" name="state[]">
												</td>
												<td data-name="education_board">
													<input type="text" name="education_board[]" class="form-control custom-form-control">
												</td>
												<td data-name="district">
													<input type="text" name="district[]" class="form-control custom-form-control">
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
						<!-- Upload your teaching demo Video  -->
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<p class="mb-1">Enter your teaching demo Video { Students could see }</p>
									<div class="form-group">
										<input type="text" class="form-control custom-form-control" name="demo_video" required>
									</div>
									<br>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<p class="mb-1">What type of internet you use?</p>
									<div class="form-group">
										<select name="type_of_internet" id="" class="form-control custom-form-control" required>
											<option value="Broadband">Select Internet Type</option>
											<option value="Broadband">Broadband</option>
											<option value="Modem">Modem</option>
											<option value="others">others</option>
										</select>
									</div>
									<br>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<p class="mb-1">Upload Your Internet speed screen short</p>
									<div class="form-group">
										<input type="file" class="form-control custom-form-control" name="internet_speed_screen_short" required>
									</div>
									<br>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<p class="mb-1">Flexible time </p>
									<div class="form-group">
										<select name="flexible_time" id="" class="form-control custom-form-control" required>
											<option value="6 am to 7 am">6 am to 7 am</option>
											<option value="7 am to 8 am">7 am to 8 am</option>
											<option value="7 am to 8 am">7 am to 8 am</option>
										</select>
									</div>
									<br>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<p class="mb-1">Your Current occupation </p>
									<div class="form-group">
										<input type="text" name="current_occupation" class="form-control custom-form-control" placeholder="Example : College student, University Student, House wife, Teacher, Job Holder, professionl not working,
										retired officer etc " required>
									</div>
									<br>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<p class="mb-1">Weekly how many days want to teach ( 1 day, 2 days……. 7 days)
									</p>
									<div class="form-group">
										<select name="weekly_how_many_days_want_to_teach" id="" class="form-control custom-form-control" required>
											<option value="1">1 day</option>
											<option value="2">2 day</option>
											<option value="3">3 day</option>
											<option value="4">4 day</option>
											<option value="5">5 day</option>
											<option value="6">6 day</option>
											<option value="7">7 day</option>
										</select>
									</div>
									<br>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<p class="mb-1">Enter Your Payment getting Information  </p>
									<div class="input-group">
										
										<input type="text" aria-label="First name" name="bank_name" class="form-control custom-form-control"  placeholder="Bank Name" required>
										<input type="text" aria-label="Last name" name="account_number" class="form-control custom-form-control" placeholder="Account Number" required>
										<input type="text" aria-label="Last name" name="account_type" class="form-control custom-form-control" placeholder="Account Type or Mobile Banking Number" required>
									</div>
									
									<br>
								</div>
							</div>
							<br>
						</div>
						<!-- End Upload your teaching demo Video  -->
						<div class="container">
							<div class="row">
								<div class="col-md-12 text-center">
									<input type="submit" class="btn btn-success custom-btn" value="Sumit">
								</div>
							</div>
						</div>
						<br>
					</form>
				</section>
			</div>
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