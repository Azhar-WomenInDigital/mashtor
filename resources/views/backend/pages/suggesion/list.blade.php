@extends('backend.layouts.master')
@section('page-title',' Faculty ')
@section('page-content')
<div class="content">
	<div class="container-fluid">
		
		<div class="container">
			<h3 class="text-center"> Suggesion </h3> <hr>
			<div class="row justify-content-center">
				<div class="col-md-6">
					
					<table class="table table-bordered">
						<thead>
							<th>Sl.</th>
							<th>Suggestion</th>
							<th>User Email</th>
							<th>User Name</th>
							
							<th>Action</th>
						</thead>
						<?php $i=0;?>
						@foreach($lists as $data)
						<?php $i++; ?>
						<tr>
							<td>{{$i}}</td>
							<td>{{$data->suggesion}}</td>
							<td>{{$data->email}}</td>
							<td>{{$data->f_name}}</td>
							<td>
								
							<form action="{{url('admin/suggesion',$data->Sid)}}" method="POST" style="display: inline-block;">
            @method('DELETE')
            {{csrf_field()}}
           
                   

                 <button type="" class="btn btn-outline-danger" onClick="return deleteconfirm();"><i class="zmdi zmdi-delete"></i>
</button>
           </form>
							</td>
						</tr>
						@endforeach
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