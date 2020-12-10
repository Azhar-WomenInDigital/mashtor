@extends('backend.layouts.master')
@section('page-title',' Faculty ')
@section('page-content')
<div class="content">
	<div class="container-fluid">
		
		<div class="container">
			<h3 class="text-center"> Student Experience  </h3> <hr>
			<div class="row justify-content-center">

				<div class="col-md-6">
					@include('backend.partials._message')
					<form action="{{route('student_experience.store')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="">Upload Student Image</label>
							<input type="file" class="form-control" name="image" required>
						</div>
						<div class="form-group">
							<label for="">Youtube video link</label>
							<input type="text" name="vedio_link" class="form-control">
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
							<th>Image</th>
							<th>Video</th>
							<th>Status</th>
							<th>Action</th>
						</thead>
							<?php $i=0;?>
						<tbody>
							@foreach($exprience as $data)
							<?php $i++; ?>
							<tr>
								<td>{{$i}}</td>
								<td>
									<?php
										echo "<img src='".asset($data->image)."' style='height:150px;width:150px;'/>";
									?>
								</td>
								<td>
									<iframe width="150" height="150" src="{{ $data->vedio_link }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
								</td>
								<td>{{$data->status}}</td>
								<td>
									<a href="#" data-toggle="modal" data-target="#edit{{$data->id}}">Edit</a>



<!-- Modal -->
<div class="modal fade" id="edit{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('student_experience.update',$data->id)}}" method="post" enctype="multipart/form-data">
						@csrf
						@method('put')
						<div class="form-group">
							<label for="">Upload Student Image</label>
							<input type="file" class="form-control" name="image">
						</div>
						<div class="form-group">
							<label for="">Youtube video link</label>
							<input type="text" name="vedio_link" class="form-control" value="{{ $data->vedio_link }}">
						</div>
						<div class="form-group">
							<label for="">Status</label>
							<select name="status" id="" class="form-control">
								<option value="1">Publish</option>
								<option value="0">Unpublish</option>
							</select>
						</div>
						<br>
						<input type="submit" class="btn btn-success float-right" value="Update">
					</form>
      </div>
     
    </div>
  </div>
</div>








									<form action="{{route('student_experience.destroy',$data->id)}}" method="POST" style="display: inline-block;">
									@method('DELETE')
									{{csrf_field()}}
									
									
									<button type="" class="btn btn-outline-danger" onClick="return deleteconfirm();"><i class="zmdi zmdi-delete"></i>
									</button>
								</form>
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