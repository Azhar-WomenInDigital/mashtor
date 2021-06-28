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
      
    
  <h1 id="head"> Edit Profile </h1><br><br>
  <form action="{{url('profile/update',Auth::user()->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="">Full Name</label>
      <input type="text" name="fullname" class="form-control" value="{{Auth::user()->fullname}}">
    </div>
    <div class="form-group">
      <label for="">Email</label>
      <input type="text" name="" class="form-control" value="{{Auth::user()->email}}" disabled>
    </div>
    <div class="form-group">
      <label for="">Number</label>
      <input type="text" name="number" class="form-control" value="{{Auth::user()->number}}">
    </div>
<div class="form-group">
      <label for="course-name">Course Name</label>
      <input type="text" disabled name="course_name" class="form-control" value="{{Auth::user()->course_name}}">
    </div>
    <div class="form-group">
      <label for="">Upload Image</label>
      <input type="file" name="image" class="form-control">
    </div>

    <div class="form-group text-center">
      <button type="submit" class="btn btn-warning text-white font-weight-bold p-2 wid-border-radius-none wid-font-22 wid-button wid-sm-font-18">Update</button>
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