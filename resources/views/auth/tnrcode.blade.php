@extends('frontend.layouts.inner-master')
@section('front-page-title',' | Login ')
@section('auth-content')
<div class="row mt-5">
    <div class="col-md-6 offset-md-3">
        
        <div class="logo text-center">
            <img src="{{url('frontend/assets/imgs/Orange-logo.png')}}" alt="" style="width: 100%;">
        </div> <br><br> <br> <br>
        <h5 class="text-center">Please check your email </h5> <br>
        <form class="register-form outer-top-xs" role="form" method="POST" action="{{ url('tnr-code') }}">
            @csrf
           
            <div class="form-group">
                @include('frontend.partials._message')
                <input type="text" class="form-control unicase-form-control custom-form-control text-input @error('tnr_code') is-invalid @enderror" name="tnr_code" value="{{ old('tnr_code') }}" id="exampleInputEmail1" required autocomplete="number" autofocus placeholder="Entre TNR Code" style="height: 60px;
    font-size: 22px;
    font-weight: bold;">
                @if ($errors->has('tnr_code'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('tnr_code') }}</strong>
                </span>
                @endif
            </div>
            <button type="submit" name="login" class="btn-upper btn btn-success checkout-page-button form-control custom-btn">Submit</button>
            
        </form>
    </div>
</div>
@endsection