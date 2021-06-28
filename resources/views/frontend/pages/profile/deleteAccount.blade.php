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
<div class="col-md-9 text-center">
	<div class="card">
		<div class="card-body">
			
			
			<h1 id="head" class="text-center"> Close Account </h1><br>
			<p  class="text-center">Close your account permanently.</p>
			
			<br><br>
			<p>Close Your Account</p>
			<p> <span class="text-warning">Warning:</span> If you close your account, you will be unsubscribed from all your 0 courses, and will lose access forever.</p> <br><br>
			<a href="{{url('profile/delete/account/finally',Auth::user()->id)}}" class="btn btn-warning text-white" onClick="return deleteconfirm();">Close Account</a>
		</div>
	</div>
</div>
</div>
</div>
</div>
<br><br><br>
@section('frontend-scripts')
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