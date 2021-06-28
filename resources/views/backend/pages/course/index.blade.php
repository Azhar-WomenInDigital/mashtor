@extends('backend.layouts.master')
@section('page-title','Brand List')
@section('page-content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				@include('backend.partials._message')
				<div class="card form">
					<form action="{{route('courses.store')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="card-body">
							<h1> Courses </h1> <br>

							<div class="form-group">
								<label for="">Course Category</label>
								<select name="course_cat" id="" class="form-control">
									<option value="">Select Category</option>
									<?php
					                    $courseCategory = DB::table('course_categories')->get();
					                    foreach($courseCategory as $cat){
					                ?>
					                <option value="{{$cat->id}}">{{$cat->name}}</option>

					            <?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label for="">Name * </label>
								<input type="text" class="form-control" name="name" required>
							</div>
							<div class="form-group">
								<label for="">Course Title * </label>
								<input type="text" class="form-control" name="course_title" required>
							</div>
							<div class="form-group">
								<label for=""> Course Description </label>
								<textarea name="course_descrption" id="" cols="5" rows="5" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<label for=""> price </label>
								<input type="text" class="form-control" name="price" required>
							</div>
							<div class="form-group">
                                <label for="example-date-input" class="">Start Date</label>
                                
                                    <input class="form-control" type="date"  id="example-date-input" name="start_date">
                               
                            </div>
                            <div class="form-group">
                                <label for="example-time-input" class="">Time</label>
                                
                                    <input class="form-control" type="time"  id="example-time-input" name="start_time">
                                
                            </div>
                            <div class="form-group">
                                <label for="example-time-input" class="">Duration</label>
                                
                                    <input class="form-control" name="duration" type="text" value="" id="example-time-input">
                                
                            </div>
							<div class="form-group">
								<label for="">Upload Image</label>
								<input type="file" name="image" required>
							</div>
<div class="form-group">
								<select name="instractor_id" class="form-control" id="">
                                        <option value="">Select Instructor</option>
                                        @foreach($instructor as $instructors)
                                        <option value="{{$instructors->id}}">{{$instructors->instructor_name}}</option>
                                        @endforeach
                                    </select>
							</div>
							<div class="form-group">
								<label for="">Select Status</label>
								<select name="status" id="" class="form-control">
									<option value="1">Active</option>
									<option value="0">Inactive</option>
								</select>
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
						
							<th>Category</th>
							<th>Image</th>
							<th>Action</th>
						</thead>
						<tbody>
							<?php $i=0; ?>
							@foreach($courses as $data)
							<?php 
							$i++;
							if(isset($data->course_cat) && !empty($data->course_cat)){
							?>
							<tr>
								<td>{{$i}}</td>
								<td>{{$data->name}}</td>
								
								<td>
								<?php
										$course_categroy = DB::table('course_categories')->where('id',$data->course_cat)->first();
										echo $course_categroy->name;
								?>
								</td>
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
													<form action="{{route('courses.store')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="card-body">
							<h1> Courses </h1> <br>

							<div class="form-group">
								<label for="">Course Category</label>
								<select name="course_cat" id="" class="form-control">
									<?php
										$category_course = DB::table('course_categories')->where('id',$data->course_cat)->first();
										if(isset($category_course) && !empty($category_course)){
									?>
									<option value="{{$category_course->id}}">{{$category_course->name}}</option>
								<?php } ?>
									<option value="">Select Category</option>
									<?php
					                    $courseCategory = DB::table('course_categories')->get();
					                    foreach($courseCategory as $cat){
					                ?>
					                <option value="{{$cat->id}}">{{$cat->name}}</option>

					            <?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label for="">Name * </label>
								<input type="text" class="form-control" name="name" value="<?php if(isset($data->name) && !empty($data->name)){echo $data->name;}?>" required>
							</div>
							<div class="form-group">
								<label for="">Course Title * </label>
								<input type="text" class="form-control" name="course_title" value="<?php if(isset($data->course_title) && !empty($data->course_title)){echo $data->course_title;}?>" required>
							</div>
							<div class="form-group">
								<label for=""> Course Description </label>
								<textarea name="course_descrption" id="" cols="5" rows="5" class="form-control"><?php if(isset($data->course_descrption) && !empty($data->course_descrption)){echo $data->course_descrption;}?></textarea>
							</div>
							<div class="form-group">
								<label for=""> price </label>
								<input type="text" class="form-control" name="price" value="<?php if(isset($data->price) && !empty($data->price)){echo $data->price;}?>" required>
							</div>
							<div class="form-group">
                                <label for="example-date-input" class="">Start Date</label>
                                
                                    <input class="form-control" type="date"   value="<?php if(isset($data->start_date) && !empty($data->start_date)){echo $data->start_date;}?>"  id="example-date-input" name="start_date">
                               
                            </div>
                            <div class="form-group">
                                <label for="example-time-input" class="">Time</label>
                                
                                    <input class="form-control" type="time"  id="example-time-input" name="start_time" value="<?php if(isset($data->start_time) && !empty($data->start_time)){echo $data->start_time;}?>"  >
                                
                            </div>
                            <div class="form-group">
                                <label for="example-time-input" class="">Duration</label>
                                
                                    <input class="form-control" name="duration" type="text" value="" id="example-time-input" value="<?php if(isset($data->duration) && !empty($data->duration)){echo $data->duration;}?>" >
                                
                            </div>
							<div class="form-group">
								<label for="">Upload Image</label>
								<input type="file" name="image" >
							</div>
<div class="form-group">
								<select name="instractor_id" class="form-control" id="">
                                        <option value="">Select Instructor</option>
                                        @foreach($instructor as $instructors)
                                        <option value="{{$instructors->id}}">{{$instructors->instructor_name}}</option>
                                        @endforeach
                                    </select>
							</div>
							<div class="form-group">
								<label for="">Select Status</label>
								<select name="status" id="" class="form-control">
									<option value="1">Active</option>
									<option value="0">Inactive</option>
								</select>
							</div>
							<input type="hidden" name="course_id" value="{{$data->id}}">
							<div class="form-group">
								<input type="submit" class="btn btn-success" value="Update">
							</div>
						</div>
					</form>
												</div>
											</div>
										</div>
									</div>
									<form action="{{route('courses.destroy',$data->id)}}" method="POST" style="display: inline-block;">
										@method('DELETE')
										{{csrf_field()}}
										
										
										<button type="" class="btn btn-outline-danger" onClick="return deleteconfirm();"><i class="zmdi zmdi-delete"></i>
										</button>
									</form>
								</td>
							</tr>
							<?php } ?>
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