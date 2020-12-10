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
font-size: 1.2em;
}
.upload-button:hover {
transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
color: #999;
}
</style>
<section class="tutor-profile-apporaval pb-5 pt-5">
	<div class="container">
		<div class="row">
			<br><br><br>
			<div class="col-md-8 offset-md-2">
				@if(isset($intro))
				<form action="{{url('tutor/intro/update',$intro->id)}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="single-tutor-profile">
						<div class="card mb-3">
							
							<div class="card-body">
								<div class="row">
									<div class="small-12 medium-2 large-2 columns">
										<div class="circle">
											<!-- User Profile Image -->
											<?php echo"<img class='profile-pic' src='".asset($intro->profile_pic)."'>"; ?>
											<!-- Default Image -->
											<!-- <i class="fa fa-user fa-5x"></i> -->
										</div>
										<div class="p-image">
											<i class="fa fa-camera upload-button"></i>
											<input class="file-upload" name="profile_pic" type="file" accept="image/*"/>
										</div>
										<p>Upload Profile Picture</p>
									</div>
								</div>
								<div class="clearfix mt-5">
									<div class="form-group float-left">
										<label for="">Profile Tag</label>
										<input type="text" class="form-control" name="profile_tag" value="{{ old('profile_tag',$intro->profile_tag) }}">
									</div>
									<div class="form-group float-right">
										<label for="">Hourly Rate</label>
										<input type="text" class="form-control" name="hourly_rate" value=" {{ old('hourly_rate',$intro->hourly_rate) }} ">
									</div>
									
									
								</div>
								<hr>
					 			<input type="submit" class="btn btn-success custom-btn form-control">
							</div>
							
						</div>
						<br>
						
					</div>
				</form>
				@else
				<form action="{{url('tutor/intro')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="single-tutor-profile">
						<div class="card mb-3">
							
							<div class="card-body">
								<div class="row">
									<div class="small-12 medium-2 large-2 columns">
										<div class="circle">
											<!-- User Profile Image -->
											<img class='profile-pic' src=''>
											<!-- Default Image -->
											<!-- <i class="fa fa-user fa-5x"></i> -->
										</div>
										<div class="p-image">
											<i class="fa fa-camera upload-button"></i>
											<input class="file-upload" name="profile_pic" type="file" accept="image/*"/>
										</div>
										<p>Upload Profile Picture</p>
									</div>
								</div>
								<div class="clearfix mt-5">
									<div class="form-group float-left">
										<label for="">Profile Tag</label>
										<input type="text" class="form-control" name="profile_tag" value="{{ old('profile_tag') }}">
									</div>
									<div class="form-group float-right">
										<label for="">Hourly Rate</label>
										<input type="text" class="form-control" name="hourly_rate" value=" {{ old('hourly_rate') }} ">
									</div>
									
									
								</div>
								<hr>
					 			<input type="submit" class="btn btn-success custom-btn form-control">
							</div>
							
						</div>
						<br>
						
					</div>
				</form>
				@endif
			</div>
		</div>
		<!--  About Your Self  -->
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<div class="card mb-3">
					<h5 class="card-header">Write about yourself ( Students could see )<span class="float-right"><button class="btn btn-success custom-btn" data-toggle="modal" data-target="#yourself">Add</button></span></h5>
					<!-- Education modal start -->
					<div class="modal fade" id="yourself" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalCenterTitle">Write about yourself</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="{{url('tutor/about-details')}}" method="post">
										@csrf
										<div class="form-group">
											<label for="">Write about yourself</label>
											<textarea name="about_details" class="form-control" id="" cols="10" rows="5" required></textarea >
										</div>
										<br>
										<input type="submit" class="btn btn-success custom-btn" value="Submit">
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- Education modal end-->
					<div class="card-body">
						<table class="table table-bordered">
							<thead>
								<th>Sl.</th>
								<th>About Details</th>
								<th>Created At</th>
							</thead>
							<tbody>
								<?php $i=0; ?>
								@foreach($about as $data)
								<?php $i++; ?>
								<tr>
									<td>{{$i}}</td>
									<td>{{$data->about_details}}</td>
									<td>{{$data->created_at}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!--  Which subject you want to teach  -->
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<div class="card mb-3">
					<h5 class="card-header">Which subject you want to teach ( Students could see ) <span class="float-right"><button class="btn btn-success custom-btn" data-toggle="modal" data-target="#which_subject_you_want_to_teach">Add</button></span></h5>
					<!-- Education modal start -->
					<div class="modal fade" id="which_subject_you_want_to_teach" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalCenterTitle">Add Which subject you want to teach </h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="{{url('tutor/witchsubjectteach')}}" method="post">
										@csrf
										<div class="form-group">
											<label for="">Grade or Level or Class or faculty</label>
											<select name="level" id="" class="form-control custom-form-control" required>
												<option value="">Select Level</option>
												@foreach($level as $data)
												<option value="{{$data->id}}">{{$data->level}}</option>
												@endforeach
											</select>
											
										</div>
										
										<div class="form-group">
											<label for="">Subject</label>
											<select class="form-control js-example-basic-multiple custom-form-control" name="subject[]" multiple="multiple" style="width: 100%!important" required>
												@foreach($subject as $data)
												<option value="{{$data->id}}">{{$data->subject}}</option>
												
												@endforeach
											</select>
										</div>
										
										<div class="form-group">
											
											<label for="">Male or female or
											any</label>
											<select name="gender" id="" class="form-control custom-form-control">
												<option value="">Male or female or
												any</option>
												<option value="m">Male</option>
												<option value="f">Female</option>
												<option value="a">Any</option>
											</select>
										</div>
										<div class="form-group">
											<label for="">Session Type ( 1 on 1, 1 on Few,
												Batch, Any)
											P</label>
											<select name="session" id="" class="form-control custom-form-control" required>
												<option value="">Select Session</option>
												@foreach($session as $data)
												<option value="{{$data->id}}">{{$data->session}}</option>
												@endforeach
											</select>
										</div>
										<div class="form-group">
											<label for="">Price per hour
											</label>
											<input type="text" class="form-control custom-form-control" name="price" required>
										</div>
										
										<div class="form-group float-right">
											<input type="submit" class="btn btn-success custom-btn">
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- Education modal end-->
					<?php
						if (isset($whichSujectTeach)) {
							
					?>
					<div class="card-body">
						<table class="table table-bordered">
							<thead>
								<th>Level</th>
								<th>Subject</th>
								<th>Gender </th>
								<th>Session Type</th>
								<th>Price per hour</th>
								<th>action</th>
							</thead>
							<tbody>
								@foreach($whichSujectTeach as $data)
								<?php
									$level = DB::table('levels')->where('id',$data->level)->first();
									$session = DB::table('sessions')->where('id',$data->session)->first();
									
								?>
								<tr>
									<td>{{$level->level}}</td>
									
									
									<td>
										<?php
										$subjects=explode(',',$data->subject);
										foreach($subjects as $subject){
										$subject = DB::table('subjects')->where('id',$subject)->get();
										foreach($subject as $sub){
											echo $sub->subject;
											echo ",";
										}
										
										}
										?>
										
										
									</td>
									<td>
										<?php
											if($data->gender == 'm'){
												echo "Male";
											}elseif ($data->gender =='f') {
												echo "Female";
											}else{
												echo "Any";
											}
										?>
										
									</td>
									<td>{{$session->session}}</td>
									<td>{{$data->price}}</td>
									<td>
										<a href="">Edit</a>
										<a href="{{url('/delete-witchsubjectteach',$data->id)}}" onClick="return deleteconfirm();">Delete</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<?php }else{
						echo "No data";
					} ?>
				</div>
			</div>
		</div>
		<!--  Education  -->
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<div class="card mb-3">
					<h5 class="card-header">Education  <span class="float-right"><button class="btn btn-success custom-btn" data-toggle="modal" data-target="#educationMoal">Add</button></span></h5>
					<!-- Education modal start -->
					<div class="modal fade" id="educationMoal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalCenterTitle">Add Education</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="{{url('tutor/edutcation')}}" method="post" enctype="multipart/form-data">
										@csrf
										<div class="form-group">
											<label for="">Exam</label>
											<input type="text" class="form-control custom-form-control" placeholder="Exp: SSC,phd" name="exam" required>
										</div>
										<div class="form-group">
											<label for="">Institute</label>
											<input type="text" class="form-control custom-form-control" name="institute" required>
										</div>
										
										<div class="form-group">
											
											<label for="">Passing Year</label>
											<input type="year" id="datetimepicker4" aria-label="First name" class="form-control" name="passing_year" required>
											
											
											
										</div>
										<div class="form-group">
											<label for="">CGPA</label>
											<input type="text" class="form-control" name="cgpa">
										</div>
										<div class="form-group">
											<div class="custom-file">
												<input type="file" class="custom-file-input" name="transcript" id="validatedCustomFile" required>
												<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
											</div>
										</div>
										<div class="form-group float-right">
											<input type="submit" class="btn btn-success custom-btn">
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- Education modal end-->
					<div class="card-body">
						<p class="card-text">There are no educations to show.
						</p>
						<table class="table table-bordered">
							<thead>
								<th>Sl.</th>
								<th>Exam</th>
								<th>Institute</th>
								<th>CGPA</th>
								<th>Passing Year</th>
								<th>Action</th>
							</thead>
							<tbody>
								<?php $i=0; ?>
								@foreach($tutor_education as $data)
								<?php $i++; ?>
								<tr>
									<td>{{$i}}</td>
									<td>{{$data->exam}}</td>
									<td>{{$data->institute}}</td>
									<td>{{$data->cgpa}}</td>
									<td>{{$data->passing_year}}</td>
									<td>
										<a href="">Edit</a>
										<a href="">Delete</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- Write your teaching Geographic information -->
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<div class="card mb-3">
					<h5 class="card-header">Write your teaching Geographic information <span class="float-right"><button class="btn btn-success custom-btn" data-toggle="modal" data-target="#tachingGeographicInfo">Add</button></span></h5>
					<!-- Exprience modal start -->
					<div class="modal fade" id="tachingGeographicInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalCenterTitle">Add teaching Geographic information</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="{{url('tutor/teachingGeographicinfo')}}" method="post" enctype="multipart/form-data">
										@csrf
										<div class="form-group">
											<label for="">Country</label>
											<select name="country" id="country" class="form-control custom-form-control">
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
										</div>
										<div class="form-group">
											<label for="">State</label>
											<input type="text" name="state" class="form-control custom-form-control">
										</div>
										
										<div class="form-group">
											
											<label for="">Education Board</label>
											<input type="text" name="education_board" class="form-control custom-form-control">
										</div>
										<div class="form-group">
											
											<label for="">District</label>
											<input type="text" name="district" class="form-control custom-form-control">
											
										</div>
										<div class="form-group float-right">
											<input type="submit" class="btn btn-success custom-btn">
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- Exprience modal end-->
					<div class="card-body">
						@if(isset($teachingGeographicInfo))
						<table class="table table-bordered">
							<thead>
								<th>Sl.</th>
								<th>Country</th>
								<th>State</th>
								<th>Education Board</th>
								<th>District</th>
								<th>Action</th>
							</thead>
							<tbody>
								<?php $i=0; ?>
								@foreach($teachingGeographicInfo as $data)
								<?php $i++; ?>
								<tr>
									<td>{{$i}}</td>
									<td>{{$data->country}}</td>
									<td>{{$data->state}}</td>
									<td>{{$data->education_board}}</td>
									<td>{{$data->district}}</td>
									<td>
										<a href="">Edit</a>
										<a href="">Delete</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						@endif
					</div>
				</div>
			</div>
		</div>
		<!-- Other  -->
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<div class="card mb-3">
					<h5 class="card-header">Other Infomation <span class="float-right"><button class="btn btn-success custom-btn" data-toggle="modal" data-target="#otherInfo">Add</button></span></h5>
					<!-- Education modal start -->
					<div class="modal fade" id="otherInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalCenterTitle">Add Other Info</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="{{url('tutor/otherInfo')}}" method="post" enctype="multipart/form-data">
										@csrf
										<div class="form-group">
											<label for="">Upload your teaching demo Video Youtube Link</label>
											<input type="text" class="form-control custom-form-control" name="demo_vedio">
										</div>
										<div class="form-group">
											<label for="">What type of internet you use⁇ Broadband or Modem or others</label>
											
											<select name="internet_type" id="" class="form-control custom-form-control">
												<option value="">Select Internet Type</option>
												<option value="broadband"> Broadband </option>
												<option value="modem"> Modem </option>
												<option value="other"> Other </option>
											</select>
										</div>
										
										<div class="form-group">
											
											<label for="">Your Internet speed (Upload Your Internet speed screen short)
											</label>
											<div class="form-group">
												<div class="custom-file">
													<input type="file" class="custom-file-input custom-form-control" name="internet_speed" id="validatedCustomFile" >
													<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
												</div>
											</div>
											
											
											
										</div>
										<div class="form-group">
											<label for="">Flexible time</label>
											<input type="text" class="form-control custom-form-control" name="flexible_time">
										</div>
										<div class="form-group">
											<label for="">Your Current occupation </label>
											<input type="text" class="form-control custom-form-control" name="current_occupation">
										</div>
										<div class="form-group">
											<label for="">Weekly how many days want to teach  </label>
											<input type="text" class="form-control custom-form-control" name="weekly_how_many_days_teach">
										</div>
										
										<div class="form-group float-right">
											<input type="submit" class="btn btn-success custom-btn">
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- Education modal end-->
					<div class="card-body">
						<p class="card-text">There are no educations to show.
						</p>
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<th>Sl.</th>
									<th>Vedio Demo</th>
									<th>Internet Type</th>
									<th>Internet Speed</th>
									<th>flexible Time</th>
									<th>Current occupation</th>
									<th>Weekly how many days want to teach</th>
									<th>Action</th>
								</thead>
								<tbody>
									<?php $i=0; ?>
									@foreach($other_info as $data)
									<?php $i++; ?>
									<tr>
										<td>{{$i}}</td>
										<td>{{$data->demo_vedio}}</td>
										<td>{{$data->internet_type}}</td>
										<td>{{$data->internet_speed}}</td>
										<td>{{$data->flexible_time}}</td>
										<td>{{$data->current_occupation}}</td>
										<td>{{$data->weekly_how_many_days_teach}}</td>
										<td>
											<a href="">Edit</a>
											<a href="">Delete</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Acounts -->
		
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<div class="card mb-3">
					<h5 class="card-header">Payment getting Information <span class="float-right"><button class="btn btn-success custom-btn" data-toggle="modal" data-target="#paymentInfo">Add</button></span></h5>
					<!-- Education modal start -->
					<div class="modal fade" id="paymentInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalCenterTitle">Add Payment getting Information</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<ul class="nav nav-tabs" id="myTab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Bank Account</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Mobile Banking</a>
										</li>
									</ul>
									<div class="tab-content" id="myTabContent">
										<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
											<form action="{{url('dashboard/tutor/profile/approval')}}" method="post" enctype="multipart/form-data">
												@csrf
												<div class="form-group">
													<label for="">Bank Name</label>
													<input type="text" class="form-control custom-form-control" name="bank_name">
												</div>
												<div class="form-group">
													<label for="">Account Number</label>
													
													<input type="text" class="form-control custom-form-control" name="account_number">
												</div>
												<div class="form-group">
													<label for="">Branch</label>
													
													<input type="text" class="form-control custom-form-control" name="branch">
												</div>
												<div class="form-group">
													<label for="">Accout Type</label>
													
													<input type="text" class="form-control custom-form-control" name="branch">
												</div>
												
												
												
												<div class="form-group float-right">
													<input type="submit" class="btn btn-success custom-btn">
												</div>
											</form>
										</div>
										<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
											<form action="{{url('dashboard/tutor/profile/approval')}}" method="post" enctype="multipart/form-data">
												@csrf
												<div class="form-group">
													<label for="">Bank Name</label>
													<input type="text" class="form-control custom-form-control" name="bank_name">
												</div>
											</form>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>
					<!-- Education modal end-->
					<div class="card-body">
						<p class="card-text">There are no educations to show.
						</p>
						<div class="table-responsive">
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>
		<h3 class="text-center">Complete your profile for verification ….. (Tutor-- Professional)</h3>
		<br>
		<!-- Experience -->
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<div class="card mb-3">
					<h5 class="card-header">Experience ( Students could see ) <span class="float-right"><button class="btn btn-success custom-btn" data-toggle="modal" data-target="#experienceMoal">Add</button></span></h5>
					<!-- Exprience modal start -->
					<div class="modal fade" id="experienceMoal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalCenterTitle">Add Exprience</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="{{url('tutor/exprience')}}" method="post">
										@csrf
										<div class="form-group">
											<label for="">Organization</label>
											<input type="text" class="form-control" name="organization">
										</div>
										<div class="form-group">
											<label for="">Position</label>
											<input type="text" class="form-control" name="position">
										</div>
										
										<div class="input-group">
											
											<label for="">From Year</label>
											<input type="text" name="from_year" class="form-control">
											
											
											<label for="">To Year</label>
											<input type="text" name="to_year" class="form-control">
											
										</div>
										<div class="form-group">
											<label for="">Responsibility / Description</label>
											<textarea name="responsibility" id="" cols="10" rows="5" class="form-control"></textarea>
										</div>
										<div class="form-group float-right">
											<input type="submit" class="btn btn-success custom-btn">
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- Exprience modal end-->
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<th>Sl.</th>
									<th>Organization</th>
									<th>Position</th>
									<th>From Year</th>
									<th>To Year</th>
									<th>Responsibility</th>
									<th>Action</th>
								</thead>
								<tbody>
									<?php $i=0; ?>
									@foreach($exprience as $data)
									<?php $i++; ?>
									<tr>
										<td>{{$i}}</td>
										<td>{{$data->organization}}</td>
										<td>{{$data->position}}</td>
										<td>{{$data->from_year}}</td>
										<td>{{$data->to_year}}</td>
										<td>{{$data->responsibility}}</td>
										<td>
											<a href="">Edit</a>
											<a href="">Delete</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Award Achieved -->
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<div class="card mb-3">
					<h5 class="card-header">Award Achieved <span class="float-right"><button class="btn btn-success custom-btn" data-toggle="modal" data-target="#awardModal">Add</button></span></h5>
					<!-- Award modal start -->
					<div class="modal fade" id="awardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalCenterTitle">Add Award Achieved</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="{{ url('tutor/awards') }}" method="post">
										@csrf
										<div class="form-group">
											<label for="">Award Name</label>
											<input type="text" class="form-control" name="award_name">
										</div>
										<div class="form-group">
											<label for="">Award Year</label>
											<input type="date" class="form-control" name="year">
										</div>
										
										<div class="form-group float-right">
											<input type="submit" class="btn btn-success custom-btn">
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- Award modal end-->
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<th>Sl.</th>
									<th>Award Name</th>
									<th>Year</th>
									<th>Action</th>
								</thead>
								<tbody>
									<?php $i=0; ?>
									@foreach($award as $data)
									<?php $i++; ?>
									<tr>
										<td>{{$i}}</td>
										<td>{{$data->award_name}}</td>
										<td>{{$data->year}}</td>
										<td>
											<a href="">Edit</a>
											<a href="">Delete</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Publishing Achieved -->
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<div class="card">
					<h5 class="card-header">Publishing Achieved <span class="float-right"><button class="btn btn-success custom-btn" data-toggle="modal" data-target="#publishingModal">Add</button></span></h5>
					<!-- Publishing modal start -->
					<div class="modal fade" id="publishingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalCenterTitle">Add Publishing</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="{{url('tutor/publishing')}}" method="post">
										@csrf
										<div class="form-group">
											<label for="">Title</label>
											<input type="text" class="form-control" name="title">
										</div>
										<div class="form-group">
											<label for="">Publish Year</label>
											<input type="date" class="form-control" name="publish_year">
										</div>
										<div class="form-group">
											<label for="">Link</label>
											<input type="text" class="form-control" name="link">
										</div>
										
										<div class="form-group float-right">
											<input type="submit" class="btn btn-success custom-btn">
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- Publishing modal end-->
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<th>Sl.</th>
									<th>Publish Title</th>
									<th>year</th>
									<th>Link</th>
									<th>Action</th>
								</thead>
								<tbody>
									<?php $i=0; ?>
									@foreach($publishing as $data)
									<?php $i++; ?>
									<tr>
										<td>{{$i}}</td>
										<td>{{$data->title}}</td>
										<td>{{$data->publish_year}}</td>
										<td>{{$data->link}}</td>
										<td>
											<a href="">Edit</a>
											<a href="">Delete</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- General Avality -->
		<div class="row mt-5">
			<div class="col-md-8 offset-md-2">
				<div class="card">
					<h5 class="card-header">General Availability<span class="float-right"></span></h5>
					
					
					<div class="card-body">
						<?php
							foreach ($generalAvailability as $data) {
								$fdl = explode(',', $data->availability);
								foreach ($fdl as $l) {
									echo $l;
									echo "<br>";
								}
							}
						?>
						<div class="table-responsive">
							<form action="{{url('tutor/generalavailability')}}" method="post">
								@csrf
								<table class="table table-bordered ">
									<thead>
										<th>Time</th>
										<th>Mon</th>
										<th>Tue</th>
										<th>Wed</th>
										<th>Thu</th>
										<th>Fri</th>
										<th>Sat</th>
										<th>Sun</th>
									</thead>
									<tbody>
										<tr>
											<td>Pre 9am</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" name="availability[]" value="9am-mon" id="9am-mon">
														<label class="custom-control-label" for="9am-mon"></label>
													</div>
												</div>
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="9am-tue" name="availability[]" value="9am-tue">
														<label class="custom-control-label" for="9am-tue"></label>
													</div>
												</div>
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="9am-wed" name="availability[]" value="9am-wed">
														<label class="custom-control-label" for="9am-wed"></label>
													</div>
												</div>
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="9am-thu" name="availability[]" value="9am-thu">
														<label class="custom-control-label" for="9am-thu"></label>
													</div>
												</div>
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="9am-fri" name="availability[]" value="9am-fri">
														<label class="custom-control-label" for="9am-fri"></label>
													</div>
												</div>
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="9am-sat" name="availability[]" value="9am-sat">
														<label class="custom-control-label" for="9am-sat"></label>
													</div>
												</div>
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="9am-sun" name="availability[]" value="9am-sun">
														<label class="custom-control-label" for="9am-sun"></label>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>9am-12pm
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="9am-12pm-mon" name="availability[]" value="9am-12pm-mon">
														<label class="custom-control-label" for="9am-12pm-mon"></label>
													</div>
												</div>
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="9am-12pm-tue"  name="availability[]" value="9am-12pm-tue">
														<label class="custom-control-label" for="9am-12pm-tue"></label>
													</div>
												</div>
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="9am-12pm-wed"  name="availability[]" value="9am-12pm-wed">
														<label class="custom-control-label" for="9am-12pm-wed">  </label>
													</div>
												</div>
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="9am-12pm-thu" name="availability[]" value="9am-12pm-thu">
														<label class="custom-control-label" for="9am-12pm-thu"></label>
													</div>
												</div>
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="9am-12pm-fri"  name="availability[]" value="9am-12pm-fri">
														<label class="custom-control-label" for="9am-12pm-fri">  </label>
													</div>
												</div>
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="9am-12pm-sat"  name="availability[]" value="9am-12pm-sat">
														<label class="custom-control-label" for="9am-12pm-sat"> </label>
													</div>
												</div>
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="9am-12pm-sun"  name="availability[]" value="9am-12pm-sun">
														<label class="custom-control-label" for="9am-12pm-sun">  </label>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>12pm-3pm
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="12pm-3pm-mon"  name="availability[]" value="12pm-3pm-mon">
														<label class="custom-control-label" for="12pm-3pm-mon">  </label>
													</div>
												</div>
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="12pm-3pm-tue"  name="availability[]" value="12pm-3pm-tue">
														<label class="custom-control-label" for="12pm-3pm-tue">  </label>
													</div>
												</div>
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="12pm-3pm-wed" name="availability[]" value="12pm-3pm-wed">
														<label class="custom-control-label" for="12pm-3pm-wed">  </label>
													</div>
												</div>
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="12pm-3pm-thu"  name="availability[]" value="12pm-3pm-thu">
														<label class="custom-control-label" for="12pm-3pm-thu">  </label>
													</div>
												</div>
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="12pm-3pm-fri"  name="availability[]" value="12pm-3pm-fri">
														<label class="custom-control-label" for="12pm-3pm-fri">  </label>
													</div>
												</div>
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="12pm-3pm-sat"  name="availability[]" value="12pm-3pm-sat">
														<label class="custom-control-label" for="12pm-3pm-sat">  </label>
													</div>
												</div>
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="12pm-3pm-sun"  name="availability[]" value="12pm-3pm-sun">
														<label class="custom-control-label" for="12pm-3pm-sun">  </label>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>3pm-6pm
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="3pm-6pm-mon"  name="availability[]" value="3pm-6pm-mon">
														<label class="custom-control-label" for="3pm-6pm-mon">  </label>
													</div>
												</div>
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="3pm-6pm-tue" name="availability[]" value="3pm-6pm-tue">
														<label class="custom-control-label" for="3pm-6pm-tue">  </label>
													</div>
												</div>
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="3pm-6pm-wed"  name="availability[]" value="3pm-6pm-wed">
														<label class="custom-control-label" for="3pm-6pm-wed">  </label>
													</div>
												</div>
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="3pm-6pm-thu"  name="availability[]" value="3pm-6pm-thu">
														<label class="custom-control-label" for="3pm-6pm-thu">  </label>
													</div>
												</div>
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="3pm-6pm-fri"  name="availability[]" value="3pm-6pm-fri">
														<label class="custom-control-label" for="3pm-6pm-fri">  </label>
													</div>
												</div>
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="3pm-6pm-sat"  name="availability[]" value="3pm-6pm-sat">
														<label class="custom-control-label" for="3pm-6pm-sat">  </label>
													</div>
												</div>
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="3pm-6pm-sun"  name="availability[]" value="3pm-6pm-sun">
														<label class="custom-control-label" for="3pm-6pm-sun">  </label>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>6pm-9pm</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="6pm-9pm-mon"  name="availability[]" value="6pm-9pm-mon">
														<label class="custom-control-label" for="6pm-9pm-mon">  </label>
													</div>
												</div>
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="6pm-9pm-tue" name="availability[]" value="6pm-9pm-tue">
														<label class="custom-control-label" for="6pm-9pm-tue">  </label>
													</div>
												</div>
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="6pm-9pm-wed"  name="availability[]" value="6pm-9pm-wed">
														<label class="custom-control-label" for="6pm-9pm-wed">  </label>
													</div>
												</div>
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="6pm-9pm-thu"  name="availability[]" value="6pm-9pm-thu">
														<label class="custom-control-label" for="6pm-9pm-thu">  </label>
													</div>
												</div>
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="6pm-9pm-fri"  name="availability[]" value="6pm-9pm-fri">
														<label class="custom-control-label" for="6pm-9pm-fri">  </label>
													</div>
												</div>
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="6pm-9pm-sat"  name="availability[]" value="6pm-9pm-sat">
														<label class="custom-control-label" for="6pm-9pm-sat"> </label>
													</div>
												</div>
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="6pm-9pm-sun"  name="availability[]" value="6pm-9pm-sun">
														<label class="custom-control-label" for="6pm-9pm-sun">  </label>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>After 9pm</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="after-9pm-mon"  name="availability[]" value="after-9pm-mon">
														<label class="custom-control-label" for="after-9pm-mon">  </label>
													</div>
												</div>
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="after-9pm-tue"  name="availability[]" value="after-9pm-tue">
														<label class="custom-control-label" for="after-9pm-tue">  </label>
													</div>
												</div>
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="after-9pm-wed"  name="availability[]" value="after-9pm-wed">
														<label class="custom-control-label" for="after-9pm-wed">  </label>
													</div>
												</div>
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="after-9pm-thu"  name="availability[]" value="after-9pm-thu">
														<label class="custom-control-label" for="after-9pm-thu">  </label>
													</div>
												</div>
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="after-9pm-fri"  name="availability[]" value="after-9pm-fri">
														<label class="custom-control-label" for="after-9pm-fri">  </label>
													</div>
												</div>
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="after-9pm-sat" name="availability[]" value="after-9pm-sat">
														<label class="custom-control-label" for="after-9pm-sat">  </label>
													</div>
												</div>
											</td>
											<td>
												<div class="col-auto my-1">
													<div class="custom-control custom-checkbox mr-sm-2">
														<input type="checkbox" class="custom-control-input" id="after-9pm-sun" name="availability[]" value="after-9pm-sun">
														<label class="custom-control-label" for="after-9pm-sun"></label>
													</div>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
								<input type="submit" class="btn btn-success custom-btn" value="Save General Availability">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>	<br>
		<div class="text-center">
			<a href="{{url('tutor/dashboard')}}" class="btn btn-success custom-btn">Skip & Continue</a>
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