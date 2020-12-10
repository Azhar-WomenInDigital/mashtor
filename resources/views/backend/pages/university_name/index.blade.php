@extends('backend.layouts.master')
@section('page-title','Brand List')
@section('page-content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				@include('backend.partials._message')
				<div class="card form">
					<form action="{{route('university.store')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="card-body">
							<h1> University Name</h1> <br>
							<div class="form-group">
								<label for="">University Name</label>
								<input type="text" class="form-control" name="name" required>
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
							<th>Name</th>
							<th>Action</th>
						</thead>
						<tbody>
							<?php $i=0; ?>
							@foreach($university as $logo)
							<?php $i++; ?>
							<tr>
								<td>{{$i}}</td>
								
								<td>{{$logo->name}}</td>
								<td>
									<a href="#" class="btn btn-info" data-toggle="modal" data-target="#editUniversityLogo{{$logo->id}}"> <i class="ion-edit"></i></a>
									<div class="modal fade" id="editUniversityLogo{{$logo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalCenterTitle">Add Exprience</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form action="{{route('university.update',$logo->id)}}" method="post" enctype="multipart/form-data">
														@csrf
														@method('PUT')
														<div class="card-body">
															<h1>Upload University Logo</h1> <br>
															<div class="form-group">
																<label for="">University Name</label>
																<input type="text" value="{{$logo->name}}" class="form-control" name="name" required>
															</div>
															<div class="form-group">
																<input type="submit" class="btn btn-success" value="Update">
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
									<form action="{{route('university.destroy',$logo->id)}}" method="POST" style="display: inline-block;">
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