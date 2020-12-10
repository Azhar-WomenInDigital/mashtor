@extends('backend.layouts.master')
@section('page-title','Student')
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
                            <div class="studen-details">
                                
                            <form action="{{url('profile/update',$users->id)}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for=""> Fullname </label>
                                    <input type="text" class="form-control" name="fullname" value="{{$users->fullname}}">
                                </div>
                                <div class="form-group">
                                    <label for=""> Email </label>
                                    <input type="text" class="form-control" name="email" value="{{$users->email}}">
                                </div>
                                <div class="form-group">
                                    <label for=""> number </label>
                                    <input type="text" class="form-control" name="number" value="{{$users->number}}">
                                </div>

                                <input type="submit" class="btn btn-info " value="Update">
                                <a href="{{url('admin/become-a-mashtor',$users->id)}}" class="btn btn-info "> Become a mashtor </a>
                            </form>
                            	
                            	
                            	<p>NID:<b><?php echo "<img src='".asset($users->nid)."' style='height: 400px;width: 400px;object-position: center;object-fit: contain;'/>";?></b></p>
                            	
                            </div>	

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

