@extends('frontend.layouts.master')
@section('front-page-title',' | Course  ')
@section('frontend-content')
<br>
<br>
<section class="pt-5 pb-5 course-section bg-off-white">
	
	<div class="container">
		<div class="section-content">
			<div class="t">
				<div class="tc">
					<br>  <br>
					
					<div class="row">
						<div class="col-12">
							<h3>No Data found. Try to search again ! </h3>

							<a href="{{url()->previous()}}" class="btn btn-info">Back</a>
						<br>
						</div>

						
					</div>
					
				</div>
			</div>
		</div>
	</div>
	
</section>
@endsection