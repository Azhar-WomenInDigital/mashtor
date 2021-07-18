@extends('frontend.layouts.master')
@section('title',' | Course Details ')
@section('frontend-styles')
<style>
  .course-heading h1{
    text-align: center;
  }
</style>
    
@endsection
@section('frontend-content')
  <section style="height: 100vh">
    <div class="course-heading pt-sm-3 pt-md-4 pt-lg-5">
      <h1 class="pb-3">{{ $user_course_categories->user_course_category_name }}</h1>
      @if (auth()->user())
      <div class="row justify-content-center">
        <div class="col-md-6">
          <h4 class="pb-sm-3 pb-md-4">Please select one of the following courses</h4>
          <form action="{{ route('selected.user.course.store') }}" method="POST">
            @csrf
            @foreach ($user_course as $data)
            <div class="form-check pb-sm-3">
              <label class="form-check-label" for="radio1">
                <input type="radio" class="form-check-input" id="radio1" name="courseuser_id" value="{{ $data->id }}" >{{ $data->user_course_name }}
              </label>
            </div>
            @endforeach
            <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
            <button type="submit" class="btn btn-warning text-white">Ok</button>
          </form>
        </div>
      </div>
      @else
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card" style="width: 100%;">
            <div class="card-body">
              @foreach ($user_course as $data)
              <h6 class="py-sm-2">{{ $data->user_course_name }}</h6>
              @endforeach
            </div>
          </div>
          <p class="text-warning pt-3">* If you want to do the course, please <a href="{{ url('register') }}" class="px-1">Sign Up</a>first</p>
        </div>
      </div>
     
      @endif
    </div>
  </section>
@endsection
@section('frontend-scripts')
@endsection