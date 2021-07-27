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
                                <!-- <a href="{{url('admin/register')}}" class="btn btn-outline-info">Create Users</a><br><br> -->
                                <thead class="thead-default">
                                    <tr>
                                        
                                        <th data-priority="0">Sl.</th>
                                        <th data-priority="1">Name</th>
                                        <th data-priority="1">Email</th>
                                        <th data-priority="1">Created At</th>
                                        <th data-priority="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach($users as $key=> $user)
                                    
                                    <tr>
                                         
                                        <td>{{$key +  1}}</td>
                                        <td>{{$user->fullname}}</td>
                                        <td>{{$user->email}}</td>
                                        
                                        
                                        <td>{{$user->created_at}}</td>
                                        
                                        <td>
                                            <a href="{{url('admin/show-tutor',$user->id)}}" class="btn btn-outline-info"><i class="zmdi zmdi-eye"></i></a>
                                            <a href="{{url('admin/delete-users-tutor',$user->id)}}" onClick="return deleteconfirm();" class="btn btn-outline-danger"><i class="zmdi zmdi-delete"></i></a>

                                            <?php
                                                if($user->become_a_tutor == 0){
                                            ?>
                                            <button class="btn btn-default" type="button">Student</button>
                                            <?php
                                                }
                                            ?>
                                            <?php
                                                if($user->become_a_tutor == 1){
                                            ?>
                                            <button class="btn btn-default" type="button">Mashtor</button>
                                            <?php
                                                }
                                            ?>

                                            <?php
                                                if($user->become_a_tutor == 1 && $user->status == 1){
                                            ?>
                                            <button class="btn btn-success" type="button">Approved</button>
                                            <?php
                                                }
                                            if($user->become_a_tutor == 1 && $user->status == 0){ 
                                            ?>
                                            <button class="btn btn-waring" type="button">Panding</button>
                                            <?php
                                                }
                                            ?>
                                            
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                    
                                </tbody>
                            </table>
                            {{-- {{$users->links()}} --}}
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

BangladeshiAmerican_2020
childrenof1971.org