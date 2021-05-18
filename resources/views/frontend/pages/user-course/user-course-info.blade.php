@extends('frontend.layouts.master')
@section('title',' | Course Details ')
@section('frontend-styles')
<style>
  .course-heading{
    text-align: center;
  }
</style>
    
@endsection
@section('frontend-content')

  <section>
    <div class="course-heading pt-sm-3 pt-md-4 pt-lg-5">
      <h1 class="pb-3">{{ $user_course_categories->user_course_category_name }}</h1>
      @if (auth()->user())
      @foreach ($user_course_subjects as $user_course_subject)
      <p>{{ $user_course_subject->user_course_subject }}</p>
      @endforeach
      @else
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card" style="width: 100%;">
            <div class="card-body">
              @foreach ($user_course_subjects as $user_course_subject)
              <h6 class="py-sm-2">{{ $user_course_subject->user_course_subject }}</h6>
              @endforeach
            </div>
          </div>
          <p class="text-danger pt-3">* If you want to do the courses, Please <a href="{{ url('register') }}" class="px-2">Sign Up</a>first</p>
        </div>
      </div>
     
      @endif
    </div>
  </section>

@endsection
@section('frontend-scripts')
@endsection