@extends('frontend.layouts.inner-master')
@section('front-page-title',' | TNR Code ')
@section('auth-content')

<br>
<br>
<section class="login-section pt-5 pb-5">
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="login text-center">
          <h3 class="text-center">Please check your email and mobile</h3> <br> <hr> <br>
          <div class="form-group form">
            <form action="{{url('user-type')}}" method="post">
              @csrf
              <input type="text" class="form-control custom-form-control" name="tnr_code">
              <br><br><br><br>
              <button class="btn btn-danger custom-btn float-right">Next</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection