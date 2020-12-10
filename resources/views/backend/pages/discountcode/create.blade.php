@extends('backend.layouts.master')
@section('page-title','Brand List')
@section('page-content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				@include('backend.partials._message')
				<div class="card form">
					<form action="{{url('admin/discount-code-create')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="card-body">
							<h3 class="text-center">Generate a New Discount Code </h3>
							
							<br><br>
							<div class="form-group">
								<label for="">Company Name</label>
								<input type="text" class="form-control" name="company_name">
							</div>
							<div class="form-group">
								<label for="">Discount Number ( % )</label>
								<input type="number" class="form-control" name="discount">
							</div>
							<div class="form-group">
								<label for="">Generate Discount Code or Enter Discount Code</label>
								<!-- <input type="text" class="form-control" name="discount"> -->
								<div class="input-group mb-3">
									<input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="button-addon2" name="discount_code">
									<div class="input-group-append">
										<button class="btn btn-outline-secondary" type="button" id="button-addon2">Generate</button>
									</div>
								</div>
							</div>
							<div class="form-group">
								<select class="select2 form-control select2-multiple" multiple="multiple" name="course_category" multiple data-placeholder="Choose ...">
									<optgroup label="Course Category">
										@foreach($coursecategory as $data)
										<option value="{{$data->id}}">{{$data->name}}</option>
										@endforeach
									</optgroup>
									
								</select>
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-success">
							</div>
						</div>
					</div>
				</form>
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