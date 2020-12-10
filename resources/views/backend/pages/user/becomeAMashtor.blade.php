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
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h6>Become a Mashtor with these simple steps:</h6>
                            <br>
                            <ul>
                                <?php

                                ?>
                                <li class="<?php if(isset($user_basic_info)){ echo "text-danger fas fa-check";}?>"> 1. Update Your Profile</li>

                                <li class="<?php if(isset($user_education_info_check->id)){ echo "text-danger fas fa-check";}?>"> 2. Add Your Education</li>

                                <li  class="<?php if(isset($user_course_info_for_check->courses)){ echo "text-danger fas fa-check";}?>"> 3. Add Your Course</li>
                            </ul>
                            <?php
                            if(Auth::user()->status == 1){
                                echo "<span class='btn btn-success  font-weight-bold text-center '>Varified </span>";
                            }else{
                                

                                  
                                        
                            ?>
                            <form action="{{url('teacher/request',Auth::user()->id)}}" method="post">
                                @csrf
                            
                            <button class="btn btn-danger" type="submit">Request Become a Mashtor </button>
                            </form>
                            <?php
                             
                        
                                
                            
                            }
                            ?>
                            
                        </div>
                        <br><br>
                        
                        
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            @include('frontend.partials._message')
                            <div class="prfile">
                                
                                <h3>Update Your Profile</h3>
                                <form action="{{url('admin/teacher/teacher-basic-info',$id)}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="" class="pb-2">Profile Tag</label>
                                        <input type="text" class="form-control" name="profile_tag" value="<?php if(isset($user_basic_info) && !empty($user_basic_info)){ echo $user_basic_info->profile_tag;}?>" placeholder="Exp: Software Engineer" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Price per hour</label>
                                        <input type="text" class="form-control" name="price" value="<?php if(isset($user_basic_info) && !empty($user_basic_info)){ echo $user_basic_info->price;}?>" placeholder="Exp: 30" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">About Your Self</label>
                                        <textarea name="user_description" id="" cols="5" rows="5" class="form-control" required><?php if(isset($user_basic_info) && !empty($user_basic_info)){ echo $user_basic_info->user_description;}?></textarea>
                                    </div>
                                    <input type="hidden" value="<?php if(isset($user_basic_info) && !empty($user_basic_info)){ echo $user_basic_info->id;}?>" name="user_basic_info_id">
                                    <input type="submit" class="btn btn-danger" value="Save">
                                </form>
                            </div>
                        </div>
                    </div>

                    <br><br>


                


                    <br><br>



                
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

