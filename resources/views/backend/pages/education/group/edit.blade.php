@extends('backend.layouts.master')
@section('page-title',' Group ')
@section('page-content')
<div class="content">
	<div class="container-fluid">
		
		<div class="container">
			<h3 class="text-center"> Group </h3> <hr>
			<div class="row justify-content-center">
				<div class="col-md-6">
					@include('backend.partials._message')
				
						
							
											
												<form action="{{route('group.update',$groups->id)}}" method="post">
													@csrf
													@method('PUT')
													<div class="form-group">
														<label for="">Group Name</label>
														<input type="text" class="form-control" name="group_name" value="{{$groups->group_name}}" required>
													</div>
													<div class="form-group">
														<label for="">Level</label>
														<select name="level" id="" class="form-control" required>
															<?php
																$level_data = DB::table('levels')->where('id',$groups->level_id)->first();
																if(isset($level_data)){
															?>
															<option value="{{$level_data->id}}">{{$level_data->level}}</option>
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
																if($groups->status == 1){
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
				
								
				
					
				</div>
			</div>
		</div>
	</div>
</div>

@endsection