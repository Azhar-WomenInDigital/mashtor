@extends('backend.layouts.master')
@section('page-title',' Level Create ')
@section('page-content')
<div class="content">
	<div class="container-fluid">
		
		<div class="container">
			<h3 class="text-center">Level</h3> <hr>
			<div class="row">
				<div class="col-md-">
					<a href="{{route('level.index')}}" class="btn btn-outline-success">Back</a>
					
				</div>
			</div>
		</div>

	</div>
</div>

@endsection