@extends('backend.layouts.master')
@section('page-title','Brand List')
@section('page-content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				@include('backend.partials._message')
				<div class="card form">
					<form action="{{route('metarials.store')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="card-body">
							<h1> Metarials </h1> <br>
							<div class="form-group">
								<label for="">Title * </label>
								<input type="text" class="form-control" name="title" required>
							</div>
							<div class="form-group">
								<label for="">Sub Title * </label>
								<input type="text" class="form-control" name="sub_title" required>
							</div>
							<div class="form-group">
								<label for=""> Description </label>
								<textarea name="description" id="" cols="5" rows="5" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<label for="">Upload Image</label>
								<input type="file" name="image" required>
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-success">
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-6">
				<div class="logo-list">
					<table class="table table-bordered">
						<thead>
							<th>Sl.</th>
							<th>Title</th>
							<th>Sub Title</th>
							<th>Description</th>
							<th>Image</th>
							<th>Action</th>
						</thead>
						<tbody>
							<?php $i=0; ?>
							@foreach($metarials as $data)
							<?php $i++;?>
							<tr>
								<td>{{$i}}</td>
								<td>{{$data->title}}</td>
								<td>{{$data->sub_title}}</td>
								<td>{{$data->description}}</td>
								<td>
									<?php
										echo "<img src='".asset($data->image)."' style='height:50px;'>";
									?>
								</td>
								<td>
									<a href="#" class="btn btn-info" data-toggle="modal" data-target="#editUniversityLogo{{$data->id}}"> <i class="ion-edit"></i></a>
									<div class="modal fade" id="editUniversityLogo{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalCenterTitle">Update</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form action="{{route('metarials.update',$data->id)}}" method="post" enctype="multipart/form-data">
														@csrf
														@method('PUT')
														<div class="card-body">
															<h1> Metarials </h1> <br>
															<div class="form-group">
																<label for="">Title * </label>
																<input type="text" class="form-control" name="title" value="{{$data->title}}" required>
															</div>
															<div class="form-group">
																<label for="">Sub Title * </label>
																<input type="text" class="form-control" name="sub_title" value="{{$data->sub_title}}" required>
															</div>
															<div class="form-group">
																<label for=""> Description </label>
																<textarea name="description" id="" cols="5" rows="5" class="form-control">{{$data->description}}</textarea>
															</div>
															<div class="form-group">
																<label for="">Upload Image</label>
																<input type="file" name="image" >
															</div>
															<div class="form-group">
																<input type="submit" class="btn btn-success">
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
									<form action="{{route('metarials.destroy',$data->id)}}" method="POST" style="display: inline-block;">
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