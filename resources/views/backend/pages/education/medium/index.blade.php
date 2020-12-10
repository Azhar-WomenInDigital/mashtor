@extends('backend.layouts.master')
@section('page-title',' Level ')
@section('page-content')
<div class="content">
	<div class="container-fluid">
		
		<div class="container">
			<h3 class="text-center">Medium</h3> <hr>
			<div class="row justify-content-center">
				<div class="col-md-6">
					@include('backend.partials._message')
					<form action="{{route('medium.store')}}" method="post">
						@csrf
						<div class="form-group">
							<label for="">Medium</label>
							<input type="text" class="form-control" name="medium" required>
						</div>
						<div class="form-group">
							<label for=""> Level </label>
							<select name="level_id" id="" class="form-control">
								<option value="">Select Level</option>
								@foreach($level as $data)
								<option value="{{$data->id}}">{{$data->level}}</option>
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
							<th>Medium</th>
							<th>Level</th>
							<th>Status</th>
							<th>Action</th>
						</thead>
						<?php $i=0;?>
						@foreach($medium as $data)
						<?php $i++; ?>
						<tr>
							<td>{{$i}}</td>
							<td>{{$data->medium}}</td>
							<td>{{$data->level_id}}</td>
							<td>{{$data->status}}</td>
							<td>
								
								<a href="{{route('medium.edit',$data->id)}}" class="btn btn-info">edit</a>
								
								<form action="{{route('medium.destroy',$data->id)}}" method="POST" style="display: inline-block;">
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