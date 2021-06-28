@extends('frontend.layouts.master')
@section('front-page-title',' | Became a Teacher ')
@section('frontend-style')
@endsection
@section('frontend-content')

<section class="become-teacher pt-5 pb-5 bg-off-white">
<br>

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('user/dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Become a Tutor</li>
            </ol>
        </nav>
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
                                <li class="<?php if(isset($user_basic_info)){ echo "text-warning fas fa-check";}?>"> 1. Update Your Profile</li>

                                <li class="<?php if(isset($user_education_info_check->id)){ echo "text-warning fas fa-check";}?>"> 2. Add Your Education</li>

                                <li  class="<?php if(isset($user_course_info_for_check->courses)){ echo "text-warning  fas fa-check";}?>"> 3. Add Your Course</li>
                            </ul>
                            <?php
                            if(Auth::user()->status== 1){
                                echo "<span class='btn btn-success  font-weight-bold text-center '>Varified </span>";
                            }else{
                                if(isset($user_education_info_check->id) && !empty($user_education_info_check->id) && isset($user_course_info_for_check->id) && !empty($user_course_info_for_check->id)){

                                    if(isset($check_tutor_request) && !empty($check_tutor_request)){
                                        if($check_tutor_request->request == 1){
                                            echo "<span class='btn btn-warning  font-weight-bold text-center '>Panding </span>";
                                        }elseif($check_tutor_request->accept == 1){
                                            echo "Accept";
                                        }else{
                            ?>
                            <form action="{{url('teacher/request',Auth::user()->id)}}" method="post">
                                @csrf
                            
                            <button class="btn btn-danger" type="submit">Request Become a Mashtor </button>
                            </form>
                            <?php
                                } }
                            }else{

                            ?>
                            <button class="btn btn-danger" type="submit" disabled>Request Become a Mashtor </button>
                            <?php
                                }
                            }
                            ?>
                            
                        </div>
                        <br><br>
                        <div class="flex social-btns">
                            <a class="app-btn blu flex vert" href="http:apple.com" style="text-decoration: none;">
                                <i class="fab fa-apple"></i>
                                <p>Available on the <br/> <span class="big-txt">App Store</span></p>
                            </a>
                            <a class="app-btn blu flex vert" href="http:google.com" style="text-decoration: none;">
                                <i class="fab fa-google-play"></i>
                                <p>Get it on <br/> <span class="big-txt">Google Play</span></p>
                            </a>
                            
                        </div>
                        <!-- <div class="support-form"> -->
                        <div class="p-2">
                            <form action="{{url('teacher/msg')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Face Any Problem Contact Us</label>
                                    <textarea name="msg" id="" cols="5" rows="5" class="form-control" required></textarea>
                                </div>
                                <input type="submit" class="btn btn-warning text-light" value="Send">
                            </form>
                        </div>
                        <!-- </div> -->
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            @include('frontend.partials._message')
                            <div class="prfile">
                                
                                <h3>Update Your Profile</h3>
                                <form action="{{url('teacher/teacher-basic-info')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="" class="pb-2">Profile Tag</label>
                                        <input type="text" class="form-control" name="profile_tag" value="<?php if(isset($user_basic_info) && !empty($user_basic_info)){ echo $user_basic_info->profile_tag;}?>" placeholder="E.g: Software Engineer" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Price per hour</label>
                                        <input type="text" class="form-control" name="price" value="<?php if(isset($user_basic_info) && !empty($user_basic_info)){ echo $user_basic_info->price;}?>" placeholder="E.g: 30" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">About Your Self</label>
                                        <textarea name="user_description" id="" cols="5" rows="5" class="form-control" required><?php if(isset($user_basic_info) && !empty($user_basic_info)){ echo $user_basic_info->user_description;}?></textarea>
                                    </div>
                                    <input type="hidden" value="<?php if(isset($user_basic_info) && !empty($user_basic_info)){ echo $user_basic_info->id;}?>" name="user_basic_info_id">
                                    <input type="submit" class="btn btn-warning text-light" value="Save">
                                </form>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="card">
                        <div class="card-header">
                            <h5>Education <span class="float-right" ><a href="#" data-toggle="modal" data-target="#education"><i class="fas fa-plus"></i></a></span></h5>
                            <!-- Modal -->
                            <div class="modal fade" id="education" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Education</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{url('teacher/teacher-education-info')}}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="">School Name</label>
                                                    <input type="text" class="form-control" name="school_name" required placeholder="E.g: BUET">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Degree Name</label>
                                                    <input type="text" class="form-control" name="degree_name" placeholder="E.g: CSE" required >
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Fild of Study</label>
                                                    <input type="text" class="form-control" name="field_of_study" placeholder="E.g: Computer Institute" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">From Year</label>
                                                    <input type="date" class="form-control" name="form_year" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">To Year</label>
                                                    <input type="date" class="form-control" name="to_year" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Description</label>
                                                    <textarea name="description" id="" cols="5" rows="5" class="form-control"></textarea>
                                                </div>
                                                
                                                
                                                
                                                
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-warning text-light">Save </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php
                            if(isset($user_education_info_check->id) && !empty($user_education_info_check->id)){
                                if (isset($user_education_info) && !empty($user_education_info)) {
                            
                            ?>
  <div class="table-responsive">
                            <table class="table bordered">
                                <thead>
                                    <th>Sl.</th>
                                    <th>School Name</th>
                                    <th>Degree</th>
                                    <th>Field Of Study</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php $e = 0;?>
                                    @foreach($user_education_info as $data)
                                    <?php $e++;?>
                                    <tr>
                                        <td>{{$e}}</td>
                                        <td>{{$data->school_name}}</td>
                                        <td>{{$data->degree_name}}</td>
                                        <td>{{$data->field_of_study}}</td>
                                        <td><a href="#" class="btn btn-info"  data-toggle="modal" data-target="#educationEdit{{$data->id}}"><i class="far fa-edit"></i></a></td>




                            <div class="modal fade" id="educationEdit{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Education</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{url('teacher/teacher-education-info')}}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="">School Name</label>
                                                    <input type="text" class="form-control" name="school_name" value="<?php if(isset($user_education_info) && !empty($user_education_info)){ echo $data->school_name;}?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Degree Name</label>
                                                    <input type="text" class="form-control" name="degree_name" value="<?php if(isset($user_education_info) && !empty($user_education_info)){ echo $data->degree_name;}?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Fild of Study</label>
                                                    <input type="text" class="form-control" name="field_of_study" value="<?php if(isset($user_education_info) && !empty($user_education_info)){ echo $data->field_of_study;}?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">From Year</label>
                                                    <input type="date" class="form-control" name="form_year" value="<?php if(isset($user_education_info) && !empty($user_education_info)){ echo $data->form_year;}?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">To Year</label>
                                                    <input type="date" class="form-control" name="to_year" value="<?php if(isset($user_education_info) && !empty($user_education_info)){ echo $data->to_year;}?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Description</label>
                                                    <textarea name="description" id="" cols="5" rows="5" class="form-control"><?php if(isset($user_education_info) && !empty($user_education_info)){ echo $data->description;}?></textarea>
                                                </div>
                                                
                                                <input type="hidden" name="edu_update_id" value="<?php if(isset($user_education_info) && !empty($user_education_info)){ echo $data->id;}?>">
                                                
                                                
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-warning text-light"> Update </button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>






                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                          </div>
                            <?php
                                }}else{
                                    echo "<span class='text-werning text-center'><i class='fas fa-exclamation-circle'></i> No Data Found<span>";
                                }
                            ?>
                        </div>
                    </div>
                    <br><br>
                    <div class="card">
                        <div class="card-header">
                            <h5>Intersted to Professional / School Program / Language Course <span class="float-right" ><a href="#" data-toggle="modal" data-target="#courses"><i class="fas fa-plus"></i></a></span></h5>
                            <!-- Modal -->
                            <div class="modal fade" id="courses" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add  Professional / School Program / Language Course</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{url('teacher/teacher-courses-info')}}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="">Professional / School Program / Language Course name or expertice</label>
                                                    <input type="text" class="form-control" name="courses" placeholder="E.g: Bangla Language">
                                                </div>


                                           <!-- <div class="entry input-group col-xs-3">
                                                <input class="form-control" name="fields[]" type="text" placeholder="Type something" />
                                                <span class="input-group-btn">
                                                    <button class="btn btn-danger btn-add" type="button">
                                                        <span class="glyphicon glyphicon-plus"></span>
                                                    </button>
                                                </span>
                                            </div> -->     
                                                
                                                
                                                
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-warning text-light">Save </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php
                                if(isset($user_course_info_for_check->courses) && !empty($user_course_info_for_check->courses)){
                            ?>
  <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <th>Sl.</th>
                                    <th>Expertise</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php $courses = 0;?>
                                    @foreach($user_course_info as $data)
                                    <?php $courses++;?>
                                    <tr>
                                        <td>{{$courses}}</td>
                                        <td>{{$data->courses}}</td>
                                        <td><a href="#" class="btn btn-info"  data-toggle="modal" data-target="#coursesEdit{{$data->id}}"><i class="far fa-edit"></i></a></td>





<!-- Modal -->
                            <div class="modal fade" id="coursesEdit{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add  Professional / School Program / Language Course</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{url('teacher/teacher-courses-info')}}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="">Professional / School Program / Language Course name or expertice</label>
                                                    <input type="text" class="form-control" name="courses" value="<?php if(isset($user_course_info) && !empty($user_course_info)){ echo $data->courses;}?>">
                                                </div>


                                           <!-- <div class="entry input-group col-xs-3">
                                                <input class="form-control" name="fields[]" type="text" placeholder="Type something" />
                                                <span class="input-group-btn">
                                                    <button class="btn btn-danger btn-add" type="button">
                                                        <span class="glyphicon glyphicon-plus"></span>
                                                    </button>
                                                </span>
                                            </div> -->     
                                                
                                                <input type="hidden" name="cor_update_id" value="<?php if(isset($user_course_info) && !empty($user_course_info)){ echo $data->id;}?>">
                                                
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-warning text-light">Update </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>









                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                          </div>
                            <?php
                                }else{
                                    echo "<span class='text-werning text-center'><i class='fas fa-exclamation-circle'></i> No Data Found<span>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @section('frontend-scripts')
    <script>
        $(function()
        {
            $(document).on('click', '.btn-add', function(e)
            {
                e.preventDefault();

                var controlForm = $('.controls form:first'),
                    currentEntry = $(this).parents('.entry:first'),
                    newEntry = $(currentEntry.clone()).appendTo(controlForm);

                newEntry.find('input').val('');
                controlForm.find('.entry:not(:last) .btn-add')
                    .removeClass('btn-add').addClass('btn-remove')
                    .removeClass('btn-danger').addClass('btn-danger')
                    .html('<span class="glyphicon glyphicon-minus"></span>');
            }).on('click', '.btn-remove', function(e)
            {
                $(this).parents('.entry:first').remove();

                e.preventDefault();
                return false;
            });
        });

    </script>
    @endsection
    @endsection