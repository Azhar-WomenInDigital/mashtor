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
</style>
<?php
	$basic_info = DB::table('tutor_basic_infos')->where('user_id',Auth::user()->id)->first();
	$educational_qualification = DB::table('tutor_education')->where('user_id',Auth::user()->id)->get();
	$which_subject_teaches = DB::table('which_subject_teaches')->where('user_id',Auth::user()->id)->get();
	$taching_geographic_infos = DB::table('taching_geographic_infos')->where('user_id',Auth::user()->id)->get();
?>
<section class="tutor-profile-apporaval pb-5 pt-5">
	<div class="container">
	<div class="registration-info">
		
		
	
		
		
		
	

	<form action="{{url('tutor/profile')}}" method="post" enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="tutor_basic_info_id" value="<?php if(isset($basic_info->id) && !empty($basic_info->id)){ echo $basic_info->id;}?>">
	<div class="container">
		<div class="flash-message ">
			@include('frontend.partials._message')
		</div>
		
		<div class="row">
			<div class="col-md-12">
				
				<a href="{{url('tutor/basic/info/show')}}" class="btn btn-success custom-btn">Back</a>
				<div class="row">
					<div class="col-md-6" style="margin:0;padding: 0;">
						
						<div class="form-group ">
							<label for="">Profile Tag</label>
							<input type="text" class="form-control custom-form-control" name="profile_tag" value="<?php if(isset($basic_info->profile_tag) && !empty($basic_info->profile_tag)){ echo $basic_info->profile_tag;}else{
								old($basic_info->profile_tag);
							}?>">
	
							@if($errors->has('profile_tag'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('profile_tag') }}</strong>
                            </span>
                            @endif
						</div>
					</div>
					<div class="col-md-6" >
						
						<div class="form-group" style="margin-right: -16px;">
							<label for="">Hourly Rate</label>
							<input type="text" class="form-control custom-form-control" name="hourly_rate" value="<?php if(isset($basic_info->hourly_rate) && !empty($basic_info->hourly_rate)){ echo $basic_info->hourly_rate;}else{
								old($basic_info->hourly_rate);
							}?>" >
							@if($errors->has('hourly_rate'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('hourly_rate') }}</strong>
                            </span>
                            @endif
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<p class="mb-1">Write about yourself ( Students could see )</p>
				<div class="form-group">
					<textarea name="your_self" class="form-control custom-form-control" id="" cols="10" rows="1" > <?php if(isset($basic_info->your_self) && !empty($basic_info->your_self)){ echo $basic_info->your_self;}else{
								old($basic_info->your_self);
							}?> </textarea >
					@if($errors->has('your_self'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('your_self') }}</strong>
                        </span>
                    @endif
				</div>
				<br>
			</div>
		</div>
	</div>
	<!-- Your Educational Qualification* -->
	<div class="container">
		<!--  About Your Self  -->
		
		<div class="row">
			<div class="col-md-12">
				<p class="mb-1"> Your Educational Qualification <span class="text-danger">*</span> </p>
				<table class="table table-bordered" id="tab_logic">
					<thead>
						<td>Exam <span class="text-danger"> * </span> </td>
						<td>Passing Year <span class="text-danger"> * </span></td>
						<td>CGPA <span class="text-danger"> * </span></td>
						<td>Institute <span class="text-danger"> * </span></td>
						<td>Upload Transcript <span class="text-danger"> * </span></td>
						<td>Remove</td>
					</thead>
					<tbody>
						<!-- <form action="{{url('tutor/edutcation')}}" method="post" enctype="multipart/form-data"> -->
						
						@foreach($tutor_education as $data)
						<input type="hidden" name="tutor_education_id[]" value="<?php if(isset($data->id) && !empty($data->id)){ echo $data->id;}?>">
						<tr id='addr0' data-id="0" class="hidden">
							<td data-name="exam">
								<input type="text" class="form-control custom-form-control" placeholder="Example: SSC,HSC" name="exam[]" value="<?php if(isset($data->exam) && !empty($data->exam)){ echo $data->exam;}?>" required>
								@if($errors->has('exam[]'))
			                        <span class="invalid-feedback" role="alert">
			                            <strong>{{ $errors->first('exam[]') }}</strong>
			                        </span>
			                    @endif
							</td>
							<td data-name="passing_year">
								<input type="date" class="form-control custom-form-control" placeholder="Example: SSC,HSC" name="passing_year[]" value="<?php if(isset($data->passing_year) && !empty($data->passing_year)){ echo $data->passing_year;}?>" required>
								@if($errors->has('passing_year'))
			                        <span class="invalid-feedback" role="alert">
			                            <strong>{{ $errors->first('passing_year') }}</strong>
			                        </span>
			                    @endif
							</td>
							<td data-name="cgpa">
								<input type="text" class="form-control custom-form-control" placeholder="Example: 3.60" name="cgpa[]" value="<?php if(isset($data->cgpa) && !empty($data->cgpa)){ echo $data->cgpa;}?>" required>
								@if($errors->has('cgpa'))
			                        <span class="invalid-feedback" role="alert">
			                            <strong>{{ $errors->first('cgpa') }}</strong>
			                        </span>
			                    @endif 
							</td>
							<td data-name="institute">
								<input type="text" class="form-control custom-form-control" placeholder="Example: BUET" name="institute[]" value="<?php if(isset($data->institute) && !empty($data->institute)){ echo $data->institute;}?>" required>
								@if($errors->has('institute'))
			                        <span class="invalid-feedback" role="alert">
			                            <strong>{{ $errors->first('institute') }}</strong>
			                        </span>
			                    @endif 
							</td>
							<td data-name="transcript">
								<label class="upload"> Upload
									<input type="file"  name="transcript[]" >
								</label>
							</td>
							<td data-name="del">
								<a href="{{url('tutor/edu/delete',$data->id)}}" name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'><span aria-hidden="true">×</span></a>
							</td>
						</tr>
						@endforeach
					
					<!-- <tr id='addr0' data-id="0" class="hidden">
							<td data-name="exam">
								<input type="text" class="form-control custom-form-control" placeholder="Example: SSC,HSC" name="exam[]" required >
								@if($errors->has('exam'))
			                        <span class="invalid-feedback" role="alert">
			                            <strong>{{ $errors->first('exam') }}</strong>
			                        </span>
			                    @endif

							</td>
							<td data-name="passing_year">
								<input type="date" class="form-control custom-form-control" placeholder="Example: SSC,HSC" name="passing_year[]" required>
								@if($errors->has('passing_year'))
			                        <span class="invalid-feedback" role="alert">
			                            <strong>{{ $errors->first('passing_year') }}</strong>
			                        </span>
			                    @endif
							</td>
							<td data-name="cgpa">
								<input type="text" class="form-control custom-form-control" placeholder="Example: 3.60" name="cgpa[]" required>
								@if($errors->has('cgpa'))
			                        <span class="invalid-feedback" role="alert">
			                            <strong>{{ $errors->first('cgpa') }}</strong>
			                        </span>
			                    @endif
							</td>
							<td data-name="institute">
								<input type="text" class="form-control custom-form-control" placeholder="Example: BUET" name="institute[]" required>
								@if($errors->has('institute'))
			                        <span class="invalid-feedback" role="alert">
			                            <strong>{{ $errors->first('institute') }}</strong>
			                        </span>
			                    @endif
							</td>
							<td data-name="transcript">
								<label class="upload"> Upload
									<input type="file"  name="transcript[]" >
								</label>
							</td>
							<td data-name="del">
								<button name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'><span aria-hidden="true">×</span></button>
							</td>
						</tr> -->
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
				<p class="mb-1">  Which subject you want to teach <span class="text-danger">*</span> </p>
				<table class="table table-bordered" id="tab_which_subject">
					<thead>
						<td>Level <span class="text-danger"> * </span></td>
						<td>Subject <span class="text-danger"> * </span></td>
						<td>Gender <span class="text-danger"> * </span></td>
						<td>Session Type <span class="text-danger"> * </span></td>
						<td>Price per hour <span class="text-danger"> * </span></td>
						<td>Remove</td>
					</thead>
					<tbody>
						
						
						@foreach($whichSujectTeach as $w)
						<input type="hidden" name="whichSubjectId[]" value="<?php if(isset($w->id) && !empty($w->id)){ echo $w->id;}?>">
						<tr id='addr0' data-id="0" class="hidden">
							
							<td data-name="level">
								<select name="level[]" id="" class="form-control custom-form-control" >
										<?php
											$levelsdfd = DB::table('levels')->where('id',$w->level)->get();
									
								// echo "<pre>";
								// print_r($levelsdfd);
											if(isset($levelsdfd)){
										foreach($levelsdfd as $l){
									?>
									<option value="{{$l->id}}">{{$l->level}}</option>

									<?php } } ?>
									<option value="">Select Level</option>
									@foreach($level as $data)
									<option value="{{$data->id}}">{{$data->level}}</option>
									@endforeach
								</select>
								@if($errors->has('level'))
			                        <span class="invalid-feedback" role="alert">
			                            <strong>{{ $errors->first('level') }}</strong>
			                        </span>
			                    @endif
							</td>
							<td data-name="subject">
								<select class="form-control custom-form-control" name="subject[]" 
								>
									<option value="">Select...</option>
									@foreach($subject as $data)
									<option value="{{$data->id}}">{{$data->subject}}</option>
									
									@endforeach
								</select>
								@if($errors->has('subject'))
			                        <span class="invalid-feedback" role="alert">
			                            <strong>{{ $errors->first('subject') }}</strong>
			                        </span>
			                    @endif
							</td>
							<td data-name="gender">
								<select name="gender[]" id="" class="form-control custom-form-control">
									<?php
										if($data->gender == 'm'){
									?>
									<option value="m">Male</option>

									<?php }elseif ( $data->gender == 'f' ) { ?>
										
									<?php }else{ ?>
									<option value="a">Both</option>
									<?php } ?>
									<option value="">Male or female or
									any</option>
									<option value="m">Male</option>
									<option value="f">Female</option>
									<option value="a">Both</option>
								</select>
								@if($errors->has('gender'))
			                        <span class="invalid-feedback" role="alert">
			                            <strong>{{ $errors->first('gender') }}</strong>
			                        </span>
			                    @endif
							</td>
							<td data-name="session_type">
								<select name="session_type[]" id="" class="form-control custom-form-control" 
								>
									<?php
											$sessionssdf = DB::table('sessions')->where('id',$w->level)->get();
									
								// echo "<pre>";
								// print_r($levelsdfd);
											if(isset($sessionssdf)){
										foreach($sessionssdf as $s){
									?>
									<option value="{{$s->id}}">{{$s->session}}</option>
								<?php } } ?>
								<option value="">Select Session</option>
									@foreach($session as $data)
									<option value="{{$data->id}}">{{$data->session}}</option>
									@endforeach
								</select>
								@if($errors->has('session_type'))
			                        <span class="invalid-feedback" role="alert">
			                            <strong>{{ $errors->first('session_type') }}</strong>
			                        </span>
			                    @endif
							</td>
							<td data-name="price">
								<input type="text" class="form-control custom-form-control" name="price[]" value="<?php if(isset($w->price) && !empty($w->price)){ echo $w->price;}?>">
								@if($errors->has('price'))
			                        <span class="invalid-feedback" role="alert">
			                            <strong>{{ $errors->first('price') }}</strong>
			                        </span>
			                    @endif
							</td>
							<td data-name="del">
								<a href="{{url('which_subject/delete',$w->id)}}" name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'><span aria-hidden="true">×</span></a>
							</td>
						</tr>
						@endforeach
						
					
						
						
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
				<p class="mb-1">  Write your teaching Geographic information <span class="text-danger"> * </span></p>
				<table class="table table-bordered" id="tab_geographic_info">
					<thead>
						<td>Select your Teaching country </td>
						<td> State <span class="text-danger"> * </span></td>
						<td> Education Board <span class="text-danger"> * </span></td>
						<td>Select district <span class="text-danger"> * </span></td>
						<td>Remove</td>
					</thead>
					<tbody>
						<!-- <form action="{{url('tutor/edutcation')}}" method="post" enctype="multipart/form-data"> -->
						
						@foreach($teachingGeographicInfo as $info)
						<input type="hidden" name="teachingGeographicInfoId[]" value="<?php if(isset($info->id) && !empty($info->id)){ echo $info->id;}?>">
						<tr id='addr0' data-id="0" class="hidden">
							<td data-name="teaching_country">
								<select name="teaching_country[]" id="" class="form-control custom-form-control" required>
									<option value="{{$info->country}}">{{$info->country}}</option>
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
								@if($errors->has('teaching_country'))
			                        <span class="invalid-feedback" role="alert">
			                            <strong>{{ $errors->first('teaching_country') }}</strong>
			                        </span>
			                    @endif
							</td>
							<td data-name="state">
								<input type="text" class="form-control custom-form-control" name="state[]" value="{{$info->state}}" required>
							</td>
							<td data-name="education_board">
								<input type="text" name="education_board[]" class="form-control custom-form-control" value="{{$info->education_board}}" required>
							</td>
							<td data-name="district">
								<input type="text" name="district[]" class="form-control custom-form-control" value="{{$info->district}}" required>
							</td>
							
							<td data-name="del">
								<a href="{{url('teachingGeographicInfo/delete',$info->id)}}" name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'><span aria-hidden="true">×</span></a>
							</td>
						</tr>
						<!-- </form> -->
						@endforeach
						
					</tbody>
				</table>
				
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
					<input type="text" class="form-control custom-form-control" name="demo_video" 
					 value="<?php if(isset($basic_info->demo_video) && !empty($basic_info->demo_video)){ echo $basic_info->demo_video;}else{
								old($basic_info->demo_video);
							}?>">
				</div>
				<br>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<p class="mb-1">What type of internet you use?</p>
				<div class="form-group">
					<select name="type_of_internet" id="" class="form-control custom-form-control" 
					>
						<option value="<?php if(isset($basic_info->type_of_internet) && !empty($basic_info->type_of_internet)){ echo $basic_info->type_of_internet;}?>"><?php if(isset($basic_info->type_of_internet) && !empty($basic_info->type_of_internet)){ echo $basic_info->type_of_internet;}?></option>
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
					<input type="file" class="form-control custom-form-control" name="internet_speed_screen_short" >
				</div>
				<br>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<p class="mb-1">Flexible time </p>
				<div class="form-group">
					<select name="flexible_time" id="" class="form-control custom-form-control" >
						<option value="<?php if(isset($basic_info->flexible_time) && !empty($basic_info->flexible_time)){ echo $basic_info->flexible_time;}?>"><?php if(isset($basic_info->flexible_time) && !empty($basic_info->flexible_time)){ echo $basic_info->flexible_time;}?></option>
						<option value="">Select Flexible Time</option>

						<option value="6 am to 7 am">6 am to 7 am</option>
						<option value="7 am to 8 am">7 am to 8 am</option>
						<option value="7 am to 8 am">7 am to 8 am</option>
						<option value="8 am to 9 am">8 am to 9 am</option>
						<option value="10 am to 11 am">10 am to 11 am</option>
						<option value="11 am to 12 am">11 am to 12 pm</option>
						<option value="1 pm to 2 pm">1 pm to 2 pm</option>
						<option value="2 pm to 3 pm">2 pm to 3 pm</option>
						<option value="3 pm to 4 pm">3 pm to 4 pm</option>
						<option value="4 pm to 5 pm">4 pm to 5 pm</option>
						<option value="5 pm to 6 pm">5 pm to 6 pm</option>
						<option value="6 pm to 7 pm">6 pm to 7 pm</option>
						<option value="8 pm to 9 pm">8 pm to 9 pm</option>
						<option value="9 pm to 10 pm">9 pm to 10 pm</option>
						<option value="10 pm to 11 pm">10 pm to 11 pm</option>
						<option value="11 pm to 12 pm">11 pm to 12 pm</option>
					</select>
					@if($errors->has('flexible_time'))
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $errors->first('flexible_time') }}</strong>
	                    </span>
                    @endif
				</div>
				<br>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<p class="mb-1">Your Current occupation </p>
				<div class="form-group">
					<input type="text" name="current_occupation" class="form-control custom-form-control" placeholder="Example : College student, University Student, House wife, Teacher, Job Holder, professionl not working,retired officer etc " value="<?php if(isset($basic_info->current_occupation) && !empty($basic_info->current_occupation)){ echo $basic_info->current_occupation;}?>" >
					@if($errors->has('current_occupation'))
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $errors->first('current_occupation') }}</strong>
	                    </span>
                    @endif
				</div>
				<br>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<p class="mb-1">Weekly how many days want to teach ( 1 day, 2 days……. 7 days)
				</p>
				<div class="form-group">
					<select name="weekly_how_many_days_want_to_teach" id="" class="form-control custom-form-control" >
						<option value="<?php if(isset($basic_info->weekly_how_many_days_want_to_teach) && !empty($basic_info->weekly_how_many_days_want_to_teach)){ echo $basic_info->weekly_how_many_days_want_to_teach;}?>"><?php if(isset($basic_info->weekly_how_many_days_want_to_teach) && !empty($basic_info->weekly_how_many_days_want_to_teach)){ echo $basic_info->weekly_how_many_days_want_to_teach;}?> day</option>
						<option value="">Select Day</option>
						<option value="1">1 day</option>
						<option value="2">2 day</option>
						<option value="3">3 day</option>
						<option value="4">4 day</option>
						<option value="5">5 day</option>
						<option value="6">6 day</option>
						<option value="7">7 day</option>
					</select>
					@if($errors->has('weekly_how_many_days_want_to_teach'))
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $errors->first('weekly_how_many_days_want_to_teach') }}</strong>
	                    </span>
                    @endif
				</div>
				<br>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<p class="mb-1">Enter Your Payment getting Information  </p>
				<div class="input-group">
					
					<input type="text" aria-label="First name" name="bank_name" class="form-control custom-form-control"  placeholder="Bank Name" value="<?php if(isset($basic_info->bank_name) && !empty($basic_info->bank_name)){ echo $basic_info->bank_name;}?>" >
					<input type="text" aria-label="Last name" name="account_number" class="form-control custom-form-control" placeholder="Account Number" value="<?php if(isset($basic_info->account_number) && !empty($basic_info->account_number)){ echo $basic_info->account_number;}?>" >
					<input type="text" aria-label="Last name" name="account_type" class="form-control custom-form-control" placeholder="Account Type or Mobile Banking Number" value="<?php if(isset($basic_info->account_type) && !empty($basic_info->account_type)){ echo $basic_info->account_type;}?>" >
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