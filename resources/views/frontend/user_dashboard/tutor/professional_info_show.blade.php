@extends('frontend.user_dashboard.tutor.tutor_personal_info_master')
@section('tutor_personal_info')
<?php
	$work_exprience = DB::table('tutor_expriences')->where('user_id',Auth::user()->id)->get();
	$educational_qualification = DB::table('tutor_education')->where('user_id',Auth::user()->id)->get();
	$training_offer = DB::table('tutor_training_offers')->where('user_id',Auth::user()->id)->get();
	$award = DB::table('tutor_awards')->where('user_id',Auth::user()->id)->get();
	$publishing = DB::table('tutor_publishings')->where('user_id',Auth::user()->id)->get();
?>
<div class="registration-info">
		<div class="row">
			<div class="col-md-12">
				<div class="addEdit float-right">
					<a href="{{url('tutor/professional/info/add')}}" class="btn btn-success custom-btn"> Add </a>
					<a href="{{url('tutor/professional/info')}}" class="btn btn-success custom-btn"> Edit </a>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<h4> Working Experience </h4> <br>
				<table class="table table-bordered">
					<thead>
						<th>Position  </th>
						<th>Organization </th>
						<th>Year  </th>
					</thead>
					<tbody>
						@foreach($work_exprience as $exprience)
							<tr>
								<td>{{$exprience->position}}</td>
								<td>{{$exprience->organization}}</td>
								<td>{{$exprience->year}}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<h4> Training Offer </h4> <br>
				<table class="table table-bordered">
					<thead>
						<th>Training  Name </th>
						<th> Per hour charge demand </th>
						<th> Courency  </th>
						<th> Amount  </th>
					</thead>
					<tbody>
						<?php
							if(isset($training_offer)){
						?>
						@foreach($training_offer as $offer)
						
							<tr>
								<td>{{$offer->training_name}}</td>
								<td>{{$offer->demand_per_hour}}</td>
								<td>{{$offer->currency}}</td>
								<td>{{$offer->amount}}</td>
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
				<h4> Award Achieved </h4> <br>
				<table class="table table-bordered">
					<thead>
						<th>Award</th>
						<th> Year </th>
					</thead>
					<tbody>
						<?php
							if(isset($award)){
						?>
						@foreach($award as $a)
						
							<tr>
								<td>{{$a->award_name}}</td>
								<td>{{$a->year}}</td>
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
				<h4> Publishing </h4> <br>
				<table class="table table-bordered">
					<thead>
						<th>Title</th>
						<th> Published Year	 </th>
						<th> Link </th>
					</thead>
					<tbody>
						<?php
							if(isset($publishing)){
						?>
						@foreach($publishing as $p)
						
							<tr>
								<td>{{$p->title}}</td>
								<td>{{$p->publish_year}}</td>
								<td>{{$p->link}}</td>
							</tr>

						@endforeach
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		
		
	</div>
@endsection