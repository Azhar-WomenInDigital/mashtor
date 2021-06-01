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
			<h3 id="head" class="text-center"> Courses Materials and Info </h3><br>
			<table class="table table-hover">
				<thead>
				  <tr>
					<th>Course Name</th>
					<th>Class Link</th>
					<th>Start Time</th>
					<th>Day</th>
				  </tr>
				</thead>
				<tbody>
					@foreach ($users->courseuser as $item )
					<tr>
						<td>{{ $item->user_course_name }}</td>
						<td><a href="{{ $item->class_link }}" target="blank">Click For Class Link</a></td>
						<td>{{ $item->start_time }}</td>
						<td>{{ $item->day }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
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