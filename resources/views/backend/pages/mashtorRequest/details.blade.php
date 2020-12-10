@extends('backend.layouts.master')
@section('page-title','Tutors')
@section('page-content')
<!-- Start content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Users</h4>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashoard</a></li>
                        <li class="breadcrumb-item active">users</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="header">
                    	<div class="row">
                    		<div class="col-md-4">
                    			<div class="profile text-center">
                    				<?php echo "<img src='".asset($mashtor_details->image)."' style='height:150px;'>";?>
                    				<p class="text-center">Name : {{$mashtor_details->fullname}}</p>
                    				<p class="text-center">Price : {{$mashtor_details->price}}</p>
                    				<?php echo "<img src='".asset($mashtor_details->nid)."' style='height:150px;'>";?>
                    				<p>Nid</p>
                    			</div>
                    		</div>
                    		<div class="col-md-8">
                    			<div class="profile-details">
                    				<p>Profile Tag : {{$mashtor_details->profile_tag}}</p>
                    				<p>Description : {{$mashtor_details->user_description}}</p>
                    			</div>
                    		</div>
                    	</div>
                    </div>
                    <br><br>
                    <div class="body">
                    	<div class="row">
                    		<div class="col-md-12">
                    			<h3>Education Information</h3>
                    			<div class="table-responsive">
                    				<table class="table table-bordered">
                    					<thead>
                    						<th>Sl.</th>
                    						<th>School Name</th>
                    						<th>Degree Name</th>
                    						<th>Field Of Study</th>
                    						<th>Form Year</th>
                    						<th>To Year</th>
                    					</thead>
                    					<?php
                    						$edu_info = DB::table('tutor_education')->where('user_id',$mashtor_details->user_id)->get();

                    					?>
                    					<tbody>
                    						<?php $j = 0; ?>
                    						@foreach($edu_info as $edu)<?php $j++; ?>
                    						<tr>
                    							<td>{{$j}}</td>
                    							<td>{{$edu->school_name}}</td>
                    							<td>{{$edu->degree_name}}</td>
                    							<td>{{$edu->field_of_study}}</td>
                    							<td>{{$edu->form_year}}</td>
                    							<td>{{$edu->to_year}}</td>
                    						</tr>
                    						@endforeach
                    					</tbody>
                    				</table>
                    			</div>
                    		</div>
                    	</div>
                    </div>

                    <br><br>
                    <div class="body">
                    	<div class="row">
                    		<div class="col-md-12">
                    			<h3>Course Information</h3>
                    			<div class="table-responsive">
                    				<table class="table table-bordered">
                    					<thead>
                    						<th>Sl.</th>
                    						<th>Course Name</th>
                    					</thead>
                    					<?php
                    						$course_info = DB::table('tutor_courses')->where('user_id',$mashtor_details->user_id)->get();

                    					?>
                    					<tbody>
                    						<?php $c = 0; ?>
                    						@foreach($course_info as $course)<?php $c++; ?>
                    						<tr>
                    							<td>{{$c}}</td>
                    							<td>{{$course->courses}}</td>
                    							
                    						</tr>
                    						@endforeach
                    					</tbody>
                    				</table>
                    			</div>
                    		</div>
                    	</div>
                    </div>

					<br><br>
					<div class="">
						<div class="row justify-content-center">
							<div class="col-md-4">
								<div class="form-group">
									<form action="{{url('/admin/mashtor/request/approve')}}" method="post">
										@csrf
										<input type="hidden" value="{{$mashtor_details->user_id}}" name="user_id">
									
									<input type="submit" class="btn btn-success form-control d-block btn-lg" value="Approve"> 

									</form>
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
        <!-- end row -->
        </div> <!-- container -->
        </div> <!-- content -->
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

