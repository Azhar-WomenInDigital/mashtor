@extends('frontend.layouts.master')
@section('front-page-title',' | Course  ')
@section('frontend-content')
<section class="section">
	<div class="container">
		<div class="row mt-5 mb-5">










<?php
	if(isset($courses) && !empty($courses)){
		foreach($courses as $data){


?>
			<div class="col-md-3 mb-3">
				<div class="card" >
					<div class="card-body text-center">
						<h5 class="card-title text-center">{{$data->name}}</h5>
						<a href="#" class="text-info">Details</a>
						
					</div>
				</div>
			</div>

<?php
		}
	}
?>

			
			
					
				</div>
			</div>
		</div>
	</div>
	
</section>
@endsection