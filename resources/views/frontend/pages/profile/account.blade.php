@extends('frontend.layouts.master')
@section('front-page-title',' | About ')
@section('frontend-style')
<style>
.timecountdown li {
display: inline-block;
font-size: 1.5em;
list-style-type: none;
padding: 1em;
text-transform: uppercase;
}
.timecountdown li span {
display: block;
font-size: 4.5rem;
}
</style>
@endsection
@section('frontend-content')
@include('frontend.pages.profile.profile_master')
<div class="col-md-9">
  <div class="card">
    <div class="card-body">
      
    
  <h1 id="head" class="text-center"> Change Password </h1><br><br>
   @if(Session::has('success'))
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-check"></i>!</h4>
      {{ Session::get('success') }}
    </div>
    <br>
    @endif
    @if(Session::has('error'))
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="fas fa-exclamation-triangle"></i> Alert!</h4>
      {{ Session::get('error') }}
    </div>
    <br>
    @endif
  <form method="POST" action="{{ url('profile/change-password') }}">
                        @csrf

                       

                        

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('passwordOld') ? ' is-invalid' : '' }}" name="passwordOld" required>

                                @if ($errors->has('passwordOld'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('passwordOld') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<br>
                         <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<br>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
<br>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-warning text-white">
                                    {{ __('Change Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
  </div>
</div>
</div>
</div>
  </div>
</div>
<br><br><br>
@section('frontend-scripts')
<script>
  $(document).ready(function() {
var readURL = function(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();
reader.onload = function (e) {
$('.profile-pic').attr('src', e.target.result);
}
reader.readAsDataURL(input.files[0]);
}
}
$(".file-upload").on('change', function(){
readURL(this);
});
$(".upload-button").on('click', function() {
$(".file-upload").click();
});
});
</script>
@endsection
@endsection