@extends('frontend.layouts.master')
@section('title',' | Register ')
@section('frontend-content')
<style>
.invalid-feedback{
display: block;
}
</style>
<br>
<div class="login-section pt-5 pb-1 position-relative">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="login shadow">
                    <h3 class="text-center text-light">Sign Up</h3>
                    <br>
                    <form action="{{url('register')}}" method="post" enctype="multipart/form-data">
                        @csrf
                       
                    
                        <div class="form-group">
                            <label for="fullname" class="text-light">Full Name *</label>
                            <input type="text" class="form-control custom-form-control {{ $errors->has('fullname') ? ' is-invalid' : '' }}" id="fullname" name="fullname" value="{{ old('fullname') }}" required autocomplete="fullname" autofocus >
                            @if ($errors->has('fullname'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('fullname') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="email" class="text-light">Email *</label>
                            <input type="email" class="form-control custom-form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus >
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label for="number" class="text-light">Mobile Number *</label>
                            <input type="number" class="form-control custom-form-control {{ $errors->has('number') ? ' is-invalid' : '' }}" id="number" name="number" value="{{ old('number') }}" required autocomplete="number" autofocus>
                            @if ($errors->has('number'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('number') }}</strong>
                            </span>
                            @endif
                        </div>
                        
                    
                        <div class="form-group">
                            <label for="nid" class="text-light"> Upload Your ID or NID or Passport or Birth Certificate Copy *</label> <br>
                            <input type="file" class="{{ $errors->has('nid') ? ' is-invalid' : '' }}" id="nid" name="nid"  required autofocus>
                            @if($errors->has('nid'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nid') }}</strong>
                            </span>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label for="password" class="text-light">Password *</label>
                            <!-- <input type="password" class="form-control custom-form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" required autofocus> -->

                            <input type="password" id="password-field1" class="form-control custom-form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="password" name="password">
                                <span toggle="#password-field1" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>

                            @if($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-light">Confirm Password *</label>
                            <input type="password" id="password-field2" class="form-control custom-form-control" id="password" name="password_confirmation" required>
                            <span toggle="#password-field2" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
                        </div>
                        <!--
                        <div class="form-group">
                            <label for="discountcode" class="text-light">Discount Code</label>
                            <input type="text" id="password-field2" class="form-control custom-form-control" id="password" name="discount_code">
                            @if($errors->has('discount_code'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('discount_code') }}</strong>
                            </span>
                            @endif
                            <span class="text-light">If you have a discount code, avail it. Otherwise skip</span>
                        </div>
                        -->
                        <div class="form-group text-center pt-5">
                            <button type="submit" class="btn btn-dark font-weight-bold  p-2 wid-border-radius-none wid-font-22 wid-button wid-sm-font-18">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@section('frontend-scripts')
<script>
  $(document).ready(function() {
    const genderOldValue = '{{ old('gender') }}';
    
    if(genderOldValue !== '') {
      $('#gender').val(genderOldValue);
    }
  });
</script>

    <script type="text/javascript">
        randomNum = Math.floor(100000 + Math.random() * 900000)
        window.onload = function () {
            document.getElementById("txt_usrid").value = randomNum;
        }
    </script>
@endsection
@endsection