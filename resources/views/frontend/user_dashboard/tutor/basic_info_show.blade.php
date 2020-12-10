@extends('frontend.user_dashboard.tutor.tutor_personal_info_master')
@section('tutor_personal_info')
<style>
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
</style>
<?php
	$basic_info = DB::table('tutor_basic_infos')->where('user_id',Auth::user()->id)->first();
	$educational_qualification = DB::table('tutor_education')->where('user_id',Auth::user()->id)->get();
	$which_subject_teaches = DB::table('which_subject_teaches')->where('user_id',Auth::user()->id)->get();
	$taching_geographic_infos = DB::table('taching_geographic_infos')->where('user_id',Auth::user()->id)->get();
?>
<div class="registration-info">
		<div class="row">
			<div class="col-md-12">
				<div class="addEdit float-right">
					<a href="{{url('tutor/basic/info/add')}}" class="btn btn-success custom-btn"> Add </a>
					<a href="{{url('tutor/basic/info')}}" class="btn btn-success custom-btn"> Edit </a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<p>Profile Tag : <b>
					<?php
						if(isset($basic_info->profile_tag) && !empty($basic_info->profile_tag)){ 
							echo $basic_info->profile_tag;
						}else{
							echo " N\A";
						} 
						?>
				</b></p>
				<p>Hourly Rate : <b>
					<?php
						if(isset($basic_info->hourly_rate) && !empty($basic_info->hourly_rate)){ 
							echo $basic_info->hourly_rate;
						}else{
							echo " N\A";
						} 
						?>
				</b></p>
				<p>About Details  : <b>
					<?php
						if(isset($basic_info->your_self) && !empty($basic_info->your_self)){ 
							echo $basic_info->your_self;
						}else{
							echo " N\A";
						} 
						?>
				</b></p>
				
				
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<h4> Educational Qualification</h4> <br>
				<table class="table table-bordered">
					<thead>
						<th>Exam </th>
						<th>Passing Year </th>
						<th>CGPA </th>
						<th>Institute</th>
					</thead>
					<tbody>
						@foreach($educational_qualification as $education)
							<tr>
								<td>{{$education->exam}}</td>
								<td>{{$education->passing_year}}</td>
								<td>{{$education->cgpa}}</td>
								<td>{{$education->institute}}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<h4> Which subject you want to teach  </h4> <br>
				<table class="table table-bordered">
					<thead>
						<th>Level </th>
						<th> Subject </th>
						<th> Gender </th>
						<th>Session</th>
						<th> Price </th>
					</thead>
					<tbody>
						<?php
							if(isset($which_subject_teaches)){
						?>
						@foreach($which_subject_teaches as $which_subject)
						<?php
							$level_data = DB::table('levels')->where('id',$which_subject->level)->first();
							$subject_data = DB::table('subjects')->where('id',$which_subject->subject)->first();
							$session_data = DB::table('sessions')->where('id',$which_subject->session)->first();
						?>
							<tr>
								<td>
									<?php
										if(isset($level_data)){
											echo $level_data->level;
										}
									?>
								</td>
								<td>
									<?php
										if(isset($subject_data)){
											echo $subject_data->subject;
										}
									?>
								</td>
								<td>
									<?php 
										if($which_subject->gender == 'm'){
											echo "Male";
										}elseif ($which_subject == 'f') {
											echo "Female";
										}else{
											echo "Other";
										}
									?>
								</td>
								<td>
									<?php
										if(isset($session_data)){
											echo $session_data->session;
										}
									?>
								</td>
								<td>{{$which_subject->price}}</td>
							</tr>

						@endforeach
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<h4> Write your teaching Geographic information </h4> <br>
				<table class="table table-bordered">
					<thead>
						<th>Country </th>
						<th> State </th>
						<th> Education Board  </th>
						<th>Select district</th>
					</thead>
					<tbody>
						@foreach($taching_geographic_infos as $taching_infos)
						
							<tr>
								<td>{{$taching_infos->country}}</td>
								<td>{{$taching_infos->state}}</td>
								
								<td>{{$taching_infos->education_board}}</td>
								<td>{{$taching_infos->district}}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<h4>Other Information</h4> <br>
				<p>Type of Internet : <b>
					<?php
						if(isset($basic_info->type_of_internet) && !empty($basic_info->type_of_internet)){ 
							echo $basic_info->type_of_internet;
						}else{
							echo " N\A";
						} 
						?>
				</b></p>
				<p>Flexible time  : <b>
					<?php
						if(isset($basic_info->flexible_time) && !empty($basic_info->flexible_time)){ 
							echo $basic_info->flexible_time;
						}else{
							echo " N\A";
						} 
						?>
				</b></p>
				<p>Current occupation : <b>
					<?php
						if(isset($basic_info->current_occupation) && !empty($basic_info->current_occupation)){ 
							echo $basic_info->current_occupation;
						}else{
							echo " N\A";
						} 
						?>
				</b></p>
				<p>Weekly how many days want to teach : <b>
					<?php
						if(isset($basic_info->weekly_how_many_days_want_to_teach) && !empty($basic_info->weekly_how_many_days_want_to_teach)){ 
							echo $basic_info->weekly_how_many_days_want_to_teach;
						}else{
							echo " N\A";
						} 
						?>
				</b></p>
				
				
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<h4>Account Information</h4> <br>
				<p>Back Name  : <b>
					<?php
						if(isset($basic_info->bank_name) && !empty($basic_info->bank_name)){ 
							echo $basic_info->bank_name;
						}else{
							echo " N\A";
						} 
						?>
				</b></p>
				<p>Account Number  : <b>
					<?php
						if(isset($basic_info->account_number) && !empty($basic_info->account_number)){ 
							echo $basic_info->account_number;
						}else{
							echo " N\A";
						} 
						?>
				</b></p>
				<p>Account Number  : <b>
					<?php
						if(isset($basic_info->account_type) && !empty($basic_info->account_type)){ 
							echo $basic_info->account_type;
						}else{
							echo " N\A";
						} 
						?>
				</b></p>
			</div>
		</div>
	</div>
@endsection