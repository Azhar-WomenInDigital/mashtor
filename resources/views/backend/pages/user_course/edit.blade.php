@extends('backend.layouts.master')
@section('page-title','Use Course Category')
@section('backend-stylesheet')
@endsection
@section('page-content')
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12">
          <div class="page-title-box">
            <h4 class="page-title float-left">Course Edit</h4>
            <ol class="breadcrumb float-right">
              <li class="breadcrumb-item"><a href="#">Mashtor</a></li>
              <li class="breadcrumb-item active"><a href="#">Course Edit</a></li>
            </ol>
            <div class="clearfix"></div>
          </div>
        </div>
      </div><!-- end row -->
    </div> <!-- container -->
  </div>
  <!-- content -->

  <!-- Categories -->
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6">
        <div class="card p-5">
				  @include('backend.partials._message')
          <form action="{{ url('admin/user-course-update', $user_course->id ) }}" method="POST">
            @csrf
            @method('put')
            <h5 class="pb-sm-3">Course Edit</h5>
              <div class="form-group">
                <label for="exampleFormControlSelect1">User Course Category</label>
                <select class="form-control" id="exampleFormControlSelect1" name="user_course_category_id">
                  <option>Select User Course Category</option>
                  @foreach ($user_course_category as $item )
                  <option {{ $user_course->user_course_category_id == $item->id ? 'selected' : ''  }} value="{{ $item->id }}">{{ $item->user_course_category_name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                  <label for="course-name">User Course Name</label>
                  <input type="text" class="form-control" id="category-name" value="{{ $user_course->user_course_name }}" name="user_course_name">
              </div>
              <div class="form-group">
                <label for="class-link">Class Link</label>
                <input type="text" class="form-control" id="class-link" value="{{ $user_course->class_link }}" name="class_link">
              </div>
              <div class="form-group">
                <label for="start-time">Start Time</label>
                <input type="text" class="form-control" id="start-time" value="{{ $user_course->start_time }}" name="start_time">
              </div>
              <div class="form-group">
                <label for="day">Day</label>
                <input type="text" class="form-control" id="day" value="{{ $user_course->day }}" name="day">
              </div>
              <div class="form-group">
                <label for="class-link-2">Class Link 2</label>
                <input type="text" class="form-control" id="class-link-2" value="{{ $user_course->class_link_2 }}" name="class_link_2">
              </div>
              <div class="form-group">
                <label for="start-time-2">Start Time 2</label>
                <input type="text" class="form-control" id="start-time-2" value="{{ $user_course->start_time_2 }}" name="start_time_2">
              </div>
              <div class="form-group">
                <label for="day-2">Day 2</label>
                <input type="text" class="form-control" id="day-2" value="{{ $user_course->day_2 }}" name="day_2">
              </div>
            <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
          </form>
        </div>
      </div>
    </div><!-- end row -->
  </div>
  <!-- End Categories -->
<!-- End Create Category Modal -->
@endsection
