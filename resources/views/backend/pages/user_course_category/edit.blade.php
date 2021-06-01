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
            <h4 class="page-title float-left">Course Category Edit</h4>
            <ol class="breadcrumb float-right">
              <li class="breadcrumb-item"><a href="#">Mashtor</a></li>
              <li class="breadcrumb-item active"><a href="#">Course Category Edit</a></li>
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
          <form action="{{ url('admin/user-course-category-update', $user_course_category->id ) }}" method="POST">
            @csrf
            @method('put')
            <h5 class="pb-sm-3">User Course Category Edit</h5>
            <div class="form-group">
                <label for="category-name">User Course Category Name</label>
                <input type="text" class="form-control" id="category-name" value="{{ $user_course_category->user_course_category_name }}" name="user_course_category_name">
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
