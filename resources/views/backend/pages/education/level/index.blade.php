@extends('backend.layouts.master')
@section('page-title',' Level ')
@section('page-content')
<div class="content">
	<div class="container-fluid">
		
		<div class="container">
			<h3 class="text-center">Level</h3> <hr>
			<div class="row justify-content-center">
				<div class="col-md-6">
					@include('backend.partials._message')
					<form action="{{route('level.store')}}" method="post">
						@csrf
						<div class="form-group">
							<label for="">Level Name</label>
							<input type="text" class="form-control" name="level" required>
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
							<th>Status</th>
							<th>Action</th>
						</thead>
						<?php $i=0;?>
						@foreach($level as $data)
						<?php $i++; ?>
						<tr>
							<td>{{$i}}</td>
							<td>{{$data->level}}</td>
							<td>{{$data->status}}</td>
							<td>
								<a href="{{route('level.edit',$data->id)}}" class="btn btn-info" >edit</a>
								
								<form action="{{route('level.destroy',$data->id)}}" method="POST" style="display: inline-block;">
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