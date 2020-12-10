@extends('frontend.layouts.dashboard_mastering')
@section('dashboard-title',' Dashboard ')
@section('frontend-content')
<style>
	.tutor-profile-apporaval{
		background: #F5F5F5;
	}
	body {
background-color: #F5F5F5;
}
.invalid-feedback{
	display: block;
}
.profile-pic {
max-width: 200px;
max-height: 200px;
display: block;
}
.file-upload {
display: none;
}
.circle {
border-radius: 1000px !important;
overflow: hidden;
width: 128px;
height: 128px;
border: 8px solid orange;
/* position: absolute; */
top: -72px;
}
img {
max-width: 100%;
height: auto;
}
.p-image {
position: relative;
text-align: center;
bottom: 45%;
font-size: 30px;
color: orange;
left: -5%;
}
.p-image:hover {
transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
}
.upload-button {
font-size: 2.2em;
left: 86px;
position: absolute;
top: 11px;
}
.upload-button:hover {
transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
color: #999;
}
.toast-header{
	font-size: 13px;
}
.table td, .table th{
	padding: 5px !important;
}
.upload{
padding: 10px;
/*background: #ddd; */
display: table;
color: #000;
cursor: pointer;
}
.upload input[type="file"] {
display: none;
}
.registration-info{
	background: #fff;
    padding: 20px;
}
</style>
<section class="tutor-profile-apporaval pb-5 pt-5">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
	            <div class="list-group">
	                <a href="{{url('tutor/profile')}}" class="list-group-item list-group-item-action {{ request()->is('tutor/profile') ? 'active' : '' }}">
	                Personal Information
	                </a>
	                <a href="{{url('tutor/basic/info/show')}}" class="list-group-item list-group-item-action {{ request()->is('tutor/basic/info/show') ? 'active' : '' }}">Basic Information</a>
	                <a href="{{url('tutor/professional/info/show')}}" class="list-group-item list-group-item-action {{ request()->is('tutor/professional/info/show') ? 'active' : '' }}">Professional Information</a>
	            </div>
        	</div>
            <div class="col-md-8">
            	@yield('tutor_personal_info')
        </div>
		
	</div>

	<br>
	<br>
	</div>

</section>
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
<script>
function deleteconfirm()
{
deletedata = confirm("Are you sure to delete permanently?");
if (deletedata != true)
{
return false;
}
}
</script>
@endsection
@endsection