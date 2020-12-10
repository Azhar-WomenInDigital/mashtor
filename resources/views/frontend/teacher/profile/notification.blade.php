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
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Welcome Mashtor.com!</strong> Please read carefully help menu or contact us.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
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