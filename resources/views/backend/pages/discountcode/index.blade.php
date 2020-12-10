@extends('backend.layouts.master')
@section('page-title','Brand List')
@section('page-content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				@include('backend.partials._message')
				<div class="card form">
					
						<div class="card-body">
							<h3 class="text-center">Discount Code </h3>
					<a href="{{url('admin/discount-code-create')}}" class="btn btn-info"> Generate a New Discount Code</a>

						<br><br>
						<table class="table table-bordered">
							<thead>
								<th>SL.</th>
								<th>Company Name</th>
								<th>Discount</th>
								<th>Discount Code</th>
								<th>Course category</th>
								<th>Created at</th>
							</thead>
							<tbody>
								<?php $i=0; ?>
								@foreach($discounts as $discount)
								<?php $i++; ?>
								<tr>
									<td>{{$i}}</td>
									<td>{{$discount->company_name}}</td>
									<td>{{$discount->discount}} % </td>
									<td>{{$discount->discount_code}} </td>
									<td>
										<?php
											$coursecategory = DB::table('course_categories')->where('id',$discount->course_category)->first();
											echo $coursecategory->name;
										?>
									</td>
									<td>{{$discount->created_at}} </td>
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