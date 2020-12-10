@extends('backend.layouts.master')
@section('page-title',' Level ')
@section('page-content')
<div class="content">
	<div class="container-fluid">
		
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6">
					@include('backend.partials._message')
					<form action="{{route('medium.update',$medium->id)}}" method="post">
													@csrf
													@method('PUT')
													<div class="form-group">
														<label for="">Medium</label>
														<input type="text" class="form-control" name="medium" value="{{$medium->medium}}" required>
													</div>
													<div class="form-group">
														<label for=""> Level </label>
														<select name="level_id" id="" class="form-control" required>
															<?php
																$levels_data = DB::table('levels')->where('id',$medium->level_id)->first();
																if(isset($levels_data)){
															?>
															<option value="{{$levels_data->id}}">{{$levels_data->level}}</option>
														<?php } ?>
															<option value="">Select Level</option>
															@foreach($level as $data)
															<option value="{{$data->id}}">{{$data->level}}</option>
															@endforeach
														</select>
													</div>
													<div class="form-group">
														<label for="">Status</label>
														<select name="status" id="" class="form-control">
															<?php
																if($medium->status == 1){
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
												<a href="{{route('medium.index')}}" class="btn btn-info">Back</a>
				</div>
			</div>
		</div>

	</div>
</div>

@endsection