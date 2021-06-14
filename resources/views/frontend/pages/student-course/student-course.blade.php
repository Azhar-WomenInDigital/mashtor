@extends('frontend.layouts.master')
@section('title',' | Course Details ')
@section('frontend-styles')
<style>
  .course-heading h3{
    text-align: center;
  }
</style>
    
@endsection
@section('frontend-content')
  <section style="height: 100vh">
    <div class="course-heading pt-sm-3 pt-md-4 pt-lg-5">
      <h3 class="pb-3">{{ $student_course_categories->user_course_category_name }}</h3>
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card" style="width: 100%;">
            <div class="card-body">
              @foreach ($student_course as $data)
              <a href="{{ url('student-list', $data->id) }}">{{ $data->user_course_name }}</a><br>
              {{-- <h6 class="py-sm-2">{{ $data->user_course_name }}</h6> --}}
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@section('frontend-scripts')
@endsection