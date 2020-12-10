@extends('frontend.layouts.dashboard_mastering')
@section('franchise-dashboard-title',' Dashboard ')
@section('frontend-styles')
<link rel="stylesheet" href="{{url('frontend/assets/css/fullcalendar.min.css')}}">
@endsection
@section('frontend-content')
<div class="container mt-5 mb-5">
    @include('frontend.partials._message')
    <br>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            
            
            <div class="card">
                <div class="card-header">
                    <b>Change Password</b>
                    
                    
                </div>
                <div class="card-body">
                    
                    
                    <form method="post" action="{{ url('profile/setting') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4 col-form-label">New Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control custom-form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" autofocus>
                            @if($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                            </div>
                        </div> <br>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Confirm Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control custom-form-control" id="password" name="password_confirmation">
                            </div>
                        </div>
<br>
                         <div class="form-group row">
                           <label for="" class="col-sm-4"></label>
                            <div class="col-sm-8">
                                <input type="submit" class="btn btn-success custom-btn" value="Change Password" >
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End content-page -->
</div>
<br>
<br>
@section('frontend-scripts')
<script src="{{url('frontend/assets/js/jquery-ui.min.js')}}"></script>
<script src="{{url('frontend/assets/js/moment.js')}}"></script>
<script src="{{url('frontend/assets/js/fullcalendar.min.js')}}"></script>
<script src="{{url('frontend/assets/js/jquery.fullcalendar.js')}}"></script>
@endsection
@endsection