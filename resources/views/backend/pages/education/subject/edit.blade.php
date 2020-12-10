@extends('backend.layouts.master')
@section('page-title',' Subject ')
@section('page-content')
<br><br>
<div class="content">
	<div class="container-fluid">
		<br><br><br>
		<div class="container">
			<h3 class="text-center"> Subject </h3> <hr>
			<div class="row justify-content-center">
				<div class="col-md-6">
					@include('backend.partials._message')
					<form action="{{route('subject.update',$subject->id)}}" method="post">
						@csrf
						@method('PUT')
						<div class="form-group">
							<label for="">Subject Name</label>
							<input type="text" class="form-control" name="subject" value="{{ $subject->subject}}" required>
						</div>
						<div class="form-group">
							<label for="level">Level</label>
							<select name="level" id="level" class="form-control">
								<?php

									$level_data = DB::table('levels')->where('id',$subject->level)->first();
									if (isset($level_data)) {
										
								?>
								<option value="{{$level_data->id}}">{{$level_data->level}}</option>
							<?php } ?>
								<option value="">Select Level</option>
								@foreach($level as $data)
								<option value="{{$data->id}}">{{$data->level}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group" id="group">
							<label for="">Group</label>
							<select name="group" id="" class="form-control">
								
								<option value="">Select group</option>
								@foreach($group as $data)
								<option value="{{$data->id}}">{{$data->group_name}}</option>
								@endforeach
								
								
							</select>
						</div>
						<div class="form-group" id="">
							<label for="">faculty</label>
							<select name="faculty" id="" class="form-control">
								<option value="">Select faculty</option>
								@foreach($faculty as $data)
								<option value="{{$data->id}}">{{$data->faculty}}</option>
								@endforeach
								
							</select>
						</div>
						<div class="form-group">
							<label for="">Status</label>
							<select name="status" id="" class="form-control">
								<?php
									if($subject->status == 1){
								?>
								<option value="1">Publish</option>
								<?php
									}else{
								?>
								<option value="0">Unpublish</option>
								<?php
								}
								?>
								<option value="1">Publish</option>
								<option value="0">Unpublish</option>
							</select>
						</div>
						<br>
						<input type="submit" class="btn btn-success float-right" value="Update">
					</form>
					<a href="{{route('subject.index')}}" class="btn btn-info">Back</a><br><br>
					
				</div>
			</div>
		</div>
	</div>
</div>
@section('backend-scripts')
<script>
$(function() {
$('select[name=level]').change(function() {
var url = '{{ url('admin/level/') }}' +'/' + $(this).val() + '/faculty/';
$.get(url, function(data) {
var select = $('form select[name= faculty]');
select.empty();
$.each(data,function(key, value) {
select.append('<option value=' + value.id + '>' + value.faculty + '</option>');
});
});
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