@extends('backend.layouts.master')
@section('page-title',' Professional Traning ')
@section('page-content')
<div class="content">
	<div class="container-fluid">
		
		<div class="container">
			<h3 class="text-center">Professional Traning</h3> <hr>
			<div class="row justify-content-center">
				<div class="col-md-6">
					<form action="{{route('traning.store')}}" method="post">
						@csrf
						
						<div class="form-group">
							<label for="">Professional Traning</label>
							<input type="text" class="form-control" name="traning_name" required>
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
							<th>Professional Traning</th>
							<th>Status</th>
							<th>Action</th>
						</thead>
						<?php $i=0;?>
						@foreach($traning as $data)
						<?php $i++; ?>
						<tr>
							<td>{{$i}}</td>
							<td>{{$data->traning_name}}</td>
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