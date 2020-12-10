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
					<form action="{{route('subject.store')}}" method="post">
						@csrf
						<div class="form-group">
							<label for="">Subject Name</label>
							<input type="text" class="form-control" name="subject" required>
						</div>

						<div class="form-group">
							<label for="level">Level</label>
							<select name="level" id="level" class="form-control">
								<option value="">Select Level</option>
								@foreach($level as $data)
								<option value="{{$data->id}}">{{$data->level}}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group">
							<label for="medium">Medium</label>
							<select name="medium" id="medium" class="form-control">
								<option value="">Select Medium</option>
								@foreach($medium as $m)
								<option value="{{$m->id}}">{{$m->medium}}</option>
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
							<th>Level</th>
							<th>Faculty</th>
							<th>Subject</th>
							<th>Status</th>
							<th>Action</th>
						</thead>
						<?php $i=0;?>
						@foreach($subject as $data)
						<?php $i++; ?>
						<tr>
							<td>{{$i}}</td>
							<td>{{$data->level}}</td>
							<td>{{$data->faculty}}</td>
							<td>{{$data->subject}}</td>
							<td>{{$data->status}}</td>
							<td>
								<a href="{{route('subject.edit',$data->id)}}" class="btn btn-info">edit</a>
								<form action="{{route('subject.destroy',$data->id)}}" method="POST" style="display: inline-block;">
									@method('DELETE')
									{{csrf_field()}}
									
									
									<button type="" class="btn btn-outline-danger" onClick="return deleteconfirm();"><i class="zmdi zmdi-delete"></i>
									</button>
								</form>
							</td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div> 

	</div>
</div>
@section('backend-scripts')
<script>
    // $(function() {
    //     $('select[name=level]').change(function() {

    //         var url = '{{ url('admin/level/') }}' +'/' + $(this).val() + '/faculty/';

    //         $.get(url, function(data) {
    //             var select = $('form select[name= faculty]');

    //             select.empty();

    //             $.each(data,function(key, value) {
    //                 select.append('<option value=' + value.id + '>' + value.faculty + '</option>');
    //             });
    //         });
    //     });
    // });
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
