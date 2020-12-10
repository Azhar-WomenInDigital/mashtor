@extends('frontend.layouts.dashboard_mastering')
@section('franchise-dashboard-title',' Dashboard ')
@section('frontend-content')



<br><br>
<div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-md-12">
			@include('frontend.partials._message')
			<div class="responsive-table">
				<table class="table table-bordered">
					<a href="{{route('franchiseBatch.create')}}" class="btn btn-success custom-btn">Create Batch</a>
					<table class="table table-bordered">
						<thead>	
							<th>Sl.</th>
							<th>Batch Name</th>
							<th>Class</th>
							<th>Group</th>
							<th>Institute</th>
							<th>Union Name</th>
							<th>Upozila</th>
							<th>District</th>
							<th>Education Board</th>
							<th>Action</th>
						</thead>
						<tbody>
							<?php $i=0; ?>
							@foreach($batch as $data)
							<?php $i++; ?>
							<tr>
								<td>{{$i}}</td>
								<td>{{ $data->batch_name}}</td>
								<td>{{ $data->classorlevelorsubject}}</td>
								<td>{{ $data->group}}</td>
								<td>{{ $data->institute}}</td>
								<td>{{ $data->union_name}}</td>
								<td>{{ $data->upzila_name}}</td>
								<td>{{ $data->district_name}}</td>
								<td>{{ $data->education_board}}</td>
								<td>
									<!-- <a href="" class="btn btn-success"><i class="fas fa-eye"></i></a> -->
									<a href="#"  data-toggle="modal" data-target="#{{$data->id}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
									



									<!-- Modal -->
									







									<form action="{{route('franchiseBatch.destroy',$data->id)}}" method="POST" style="display: inline-block;">
										@method('DELETE')
										{{csrf_field()}}
										
										
										<button type="" class="btn btn-danger" onClick="return deleteconfirm();"><i class="fas fa-trash-alt"></i>
										</button>
									</form>
								</td>
							</tr>

							<!-- Modal -->
<div class="modal fade" id="{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

 		<form action="{{route('franchiseBatch.update',$data->id)}}" method="post">
					@csrf
					@method('PUT')
					<div class="form-group">	
						<label for="" class="font-weight-bold">Batch Name</label>
						<input type="text" class="form-control custom-form-control" name="batch_name" value="{{ old('batch_name',$data->batch_name) }}">
					</div>
					<div class="form-group">	
						<label for="" class="font-weight-bold">Class or Level or Subject</label>
						<input type="text" class="form-control custom-form-control" name="classorlevelorsubject" value="{{old('classorlevelorsubject',$data->classorlevelorsubject)}}">
					</div>
					<div class="form-group">	
						<label for="" class="font-weight-bold">Study Medium( Bangla or English or Hindi or Malay etc )</label>
						<input type="text" class="form-control custom-form-control " name="study_medium" value="{{old('study_medium',$data->study_medium)}}">
					</div>
					<div class="form-group">	
						<label for="" class="font-weight-bold">Group ( Science,Commerce,Arts) </label>
						<input type="text" class="form-control custom-form-control" name="group" value="{{old('group',$data->group)}}">
					</div>
					<div class="form-group">	
						<label for="" class="font-weight-bold">Students Gender (Female,Male,Mix)</label>
						<input type="text" class="form-control custom-form-control" name="gender" value="{{old('gender',$data->gender)}}">
					</div>
					<div class="form-group">	
						<label for="" class="font-weight-bold">Institute</label>
						<input type="text" class="form-control custom-form-control" name="institute" value="{{old('institute',$data->institute)}}">
					</div>
					<div class="form-group">	
						<label for="" class="font-weight-bold">Union Name</label>
						<input type="text" class="form-control custom-form-control" name="union_name" value="{{old('union_name',$data->union_name)}}">
					</div>
					<div class="form-group">	
						<label for="" class="font-weight-bold">Upzila Name</label>
						<input type="text" class="form-control custom-form-control" name="upzila_name" value="{{old('upzila_name',$data->upzila_name)}}">
					</div>
					<div class="form-group">	
						<label for="" class="font-weight-bold">District Name</label>
						<input type="text" class="form-control custom-form-control" name="district_name" value="{{old('district_name',$data->district_name)}}">
					</div>
					<div class="form-group">	
						<label for="" class="font-weight-bold">Education Board name</label>
						<input type="text" class="form-control custom-form-control" name="education_board" value="{{old('education_board',$data->education_board)}}">
					</div>
					<br>	
					<input type="submit" class="btn btn-success custom-btn" value="Create">
				</form>



      </div>
      
    </div>
  </div>
</div>
							@endforeach
						</tbody>
					</table>
				</table>
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