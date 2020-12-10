@extends('backend.layouts.master')
@section('page-title','Tutors')
@section('page-content')
<!-- Start content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Users</h4>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashoard</a></li>
                        <li class="breadcrumb-item active">users</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-striped table-bordered">
                              
                                <thead class="thead-default">
                                    <tr>
                                        
                                        <th data-priority="0">Sl.</th>
                                        <th data-priority="1">Name</th>
                                        <th data-priority="1">Email</th>
                                        <th data-priority="1">Number</th>
                                        <th data-priority="1">Created At</th>
                                        <th data-priority="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=0;?>
                                    @foreach($mashtor_requests as $request)
                                    <?php $i++;?>
                                    <tr>
                                    	<td>{{$i}}</td>
                                    	<td>{{$request->fullname}}</td>
                                    	<td>{{$request->email}}</td>
                                    	<td>{{$request->number}}</td>
                                    	<td>{{$request->created_at}}</td>
                                    	<td>

                                    		<a href="{{url('admin/mashtor/request/details',$request->id)}}" class="btn btn-info">Show</a>
                                            <?php
                                                if($request->status == 0){
                                            ?>

                                            <button type="button" class="btn btn-default">Panding</button>

                                            <?php } ?>

                                    	</td>
                                    </tr>
                                    @endforeach
                                    
                                    {{$mashtor_requests->links()}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
        </div> <!-- container -->
        </div> <!-- content -->
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

