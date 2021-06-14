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
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card" style="width: 100%;">
            <div class="card-body">
              @foreach ($student as $data)
              <p>{{ $data }}</p>
              
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