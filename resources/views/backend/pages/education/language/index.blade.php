@extends('backend.layouts.master')
@section('page-title',' Language ')
@section('page-content')
<div class="content">
	<div class="container-fluid">
		
		<div class="container">
			<h3 class="text-center">Language</h3> <hr>
			<div class="row justify-content-center">
				<div class="col-md-6">
					<form action="{{route('language.store')}}" method="post">
						@csrf
						<div class="form-group">
							<label for="">Language Category</label>
							<select name="language_cat" id="" class="form-control" required>
								<option value="">Select Category</option>
								<option value="1">I want to learn</option>
								<option value="2">I want to learn from</option>
							</select>
						</div>
						<div class="form-group">
							<label for="">Language</label>
							<input type="text" class="form-control" name="language" required>
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
							<th>Language Catgory</th>
							<th>Language</th>
							<th>Status</th>
							<th>Action</th>
						</thead>
						<?php $i=0;?>
						@foreach($languages as $data)
						<?php $i++; ?>
						<tr>
							<td>{{$i}}</td>
							<td>{{$data->language_cat}}</td>
							<td>{{$data->language}}</td>
							<td>{{$data->status}}</td>
							<td>
								<a href="" class="btn btn-info">edit</a>
								<a href="" class="btn btn-danger">delete</a>
							</td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>

	</div>
</div>

@endsection