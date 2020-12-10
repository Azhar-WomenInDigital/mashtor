@extends('backend.layouts.master')
@section('page-title',' Faculty ')
@section('page-content')
<div class="content">
	<div class="container-fluid">
		
		<div class="container">
			<h3 class="text-center"> Studnet Academic </h3> <hr>
			<div class="row justify-content-center">
				<div class="col-md-6">
					<form action="{{route('student_academic.store')}}" method="post">
						@csrf
						<div class="form-group">
							<label for="">Class Name</label>
							<select name="class" id="class" class="form-control">
								<option value="">Select Class</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
							</select>
						</div>
						<div class="form-group">
							<label for="">Medium</label>
							<select name="medium" id="" class="form-control" required>
								<option value="">Select Medium</option>
								<option value="1">Bangla</option>
								<option value="2">English</option>
							</select>
						</div>

						<div id="groupId" class="form-group" style="display: none;">
							<label for="">Group</label>
							<select name="group" id="" class="form-control" >
								<option value="">Select Group</option>
								<option value="1">Science</option>
								<option value="2">Commerce</option>
								<option value="2">Arts</option>
							</select>
						</div>

						<div id="group10" class="form-group" style="display: none;">
							<label for="">Group</label>
							<select name="group" id="" class="form-control" >
								<option value="">Select Group</option>
								<option value="1">Science</option>
								<option value="2">Commerce</option>
								<option value="2">Arts</option>
							</select>
						</div>
						<div class="form-group">
							<label for="">Subject name</label>
							<input type="text" class="form-control" name="subject">
						</div>
						<div class="form-group">
							<label for="">Status</label>
							<select name="status" id="" class="form-control">
								<option value="1">Publish</option>
								<option value="0">Unpublish</option>
							</select>
						</div>
						<br>
						<input type="submit" class="btn btn-success float-right" value="Add">
					</form> <br><br>
					<table class="table table-bordered">
						<thead>
							<th>Sl.</th>
							<th>Class</th>
							<th>Medium</th>
							<th>subject</th>
							<th>Status</th>
							<th>Action</th>
						</thead>
						<tbody>
							<?php $i=0;?>
							@foreach($student_academic as $data)
							<?php $i++; ?>
							<tr>
								<td>{{$i}}</td>
								<td>{{$data->class}}</td>
								<td>{{$data->medium}}</td>
								<td>{{$data->subject}}</td>
								<td>{{$data->status}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
@section('backend-scripts')
<script>
	function deleteconfirm()
	{
		deletedata = confirm("Are you sure to delete permanently?");
		if (deletedata != true)
		{
		return false;
		}
	}

	$(document).ready(function(){
      $('#class').change(function(){
	        var class_value = $(this).val();

	        if(class_value == '9'){
	          $('#groupId').show();
	        }else{
	          $('#groupId').hide();
	        }

	        if(class_value == '10' ){
	          $('#group10').show();
	        }else{
	          $('#group10').hide();
	        }
        });
    });
</script>
@endsection