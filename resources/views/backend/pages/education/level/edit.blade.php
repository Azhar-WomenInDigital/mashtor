@extends('backend.layouts.master')
@section('page-title',' Level ')
@section('page-content')
<div class="content">
	<div class="container-fluid">
		
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6">
					@if(isset($level))
					<form action="{{route('level.update',$level->id)}}" method="post">
													@method('PUT')
													@csrf
													<div class="form-group">
														<label for="">Level Name</label>
														<input type="text" class="form-control" name="level" value="{{$level->level}}" required>
													</div>
													<div class="form-group">
														<label for="">Status</label>
														<select name="status" id="" class="form-control">
															<?php
																if($level->status == 1){
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
													<input type="submit" class="btn btn-success float-right" value="Update">
												</form>
												<a href="{{route('level.index')}}" class="btn btn-info">Back</a>
												@endif
				</div>
			</div>
		</div>

	</div>
</div>

@endsection