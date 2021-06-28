@extends('frontend.layouts.master')
@section('front-page-title',' | Register ')
@section('frontend-content')

<br>
    <section class="login-section pt-5 ">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="login">
                        <h3 class="text-center text-light">Login</h3>
                        <form action="{{route('login')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="text-light">Email</label>
                                <input type="email" class="form-control custom-form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" id="email" name="email">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">



<!-- <input id="password-field" type="password" class="form-control" name="password" value="secret"> -->
              

                                <label for="password" class="text-light">Password</label>
                                <input type="password" id="password-field" class="form-control custom-form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="password" name="password">
                                <span toggle="#password-field" class="fa fa-fw fa-eye-slash  field-icon toggle-password"></span>

                                <!-- <div class="input-group" id="show_hide_password">
                                  <input  type="password"  class="form-control  {{ $errors->has('email') ? ' is-invalid' : '' }}" name="password">

                                  <div class="input-group-append">
                                        <a href=""><span class="input-group-text"><i class="fa fa-eye-slash" aria-hidden="true"></i></span></a>

                                    < <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a> ->
                                  </div>
                                </div> -->

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-light float-left">Forgot Password ? </a>
                                @endif
                                <a href="{{url('register')}}" class="text-light float-right">Create Account</a>
                            </div>
                            <div class="form-group text-center pt-5">
                                <input type="submit" class="btn btn-dark font-weight-bold p-2  wid-border-radius-none wid-font-22 wid-button wid-sm-font-18" value="Login">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
