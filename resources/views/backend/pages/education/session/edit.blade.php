@extends('backend.layouts.master')
@section('page-title',' Session ')
@section('page-content')
<div class="content">
	<div class="container-fluid">
		
		<div class="container">
			<h3 class="text-center">Session</h3> <hr>
			<div class="row justify-content-center">
				<div class="col-md-6">
					@include('backend.partials._message')
					<form action="{{route('session.update',$session->id)}}" method="post">
						@csrf
						@method('PUT')
						<div class="form-group">
							<label for=""> Session </label>
							<input type="text" class="form-control" value="{{$session->session}}" name="session" required>
						</div>
						<div class="form-group">
							<label for="">Status</label>
							<select name="status" id="" class="form-control">
								<?php
									if($session->status == 1){
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
						<input type="submit" class="btn btn-success float-right" value="Add">
					</form> <br><br>
					
				</div>
			</div>
		</div>
	</div>
</div>

@endsection