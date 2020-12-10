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
                                @include('backend.partials._message')
                                <form action="{{url('admin/request/show-tutor',$id)}}" method="post">
                                    @csrf
                                    <input type="submit" class="btn btn-info float-right" value="Approve">
                                </form>
                                <p>First Name :<b>{{$users->f_name}}</b></p>
                                <p>Last Name :<b>{{$users->l_name}}</b></p>
                                <p>Number :<b>{{$users->number}}</b></p>
                                <p>Parent Number :<b>{{$users->parent_number}}</b></p>
                                <p>Date of Birth :<b>{{$users->dob}}</b></p>
                                <p>Gender:<b>{{$users->gender}}</b></p>
                                <p>NID:<b><?php echo "<img src='".asset($users->nid)."'/>";?></b></p>
                                <p>Native Language:<b>{{$users->n_lan}}</b></p>
                                <p>2nd Language:<b>{{$users->s_lan}}</b></p>
                                <p>TNR:<b>{{$users->tnr}}</b></p>
                                <p>Address:<b>{{$users->address}}</b></p>
                                <p>Upozila:<b>{{$users->upozila}}</b></p>
                                <p>District:<b>{{$users->district}}</b></p>
                            </div>
                        </div>
                        <br>
                        <div class="personal-info">
                            <h3>Personal Info</h3>
                            <hr><br>
                            <h5>Introduction</h5>
                            <div class="media">
                               <?php echo "<img src='".asset($user_intro->profile_pic)."' class='mr-3' alt='' style='height:50px;width:50px;'>";?>
                                <div class="media-body">
                                    <h5 class="mt-0"> {{ $user_intro->profile_tag }} </h5>
                                    Hourly Rate : <b>{{$user_intro->hourly_rate}}</b>
                                </div>
                            </div>
                            <hr>
                            <h5>Which subject you want to teach</h5>
                            
                            @if(isset($which_subject_teaches))
                            
                            <table class="table table-bordered">
                                    <thead>
                                        <th>Level</th>
                                        <th>Subject</th>
                                        <th>Gender </th>
                                        <th>Session Type</th>
                                        <th>Price per hour</th>
                                        
                                    </thead>
                                    <tbody>
                                        @foreach($which_subject_teaches as $data)
                                        <?php
                                            $level = DB::table('levels')->where('id',$data->level)->first();
                                            $session = DB::table('sessions')->where('id',$data->session)->first();
                                            if(isset($level)){
                                            
                                        ?>
                                        <tr>
                                            <td>{{$level->level}}</td>
                                            
                                            
                                            <td>
                                                <?php
                                                $subjects=explode(',',$data->subject);
                                                foreach($subjects as $subject){
                                                $subject = DB::table('subjects')->where('id',$subject)->get();
                                                foreach($subject as $sub){
                                                    echo $sub->subject;
                                                    echo ",";
                                                }
                                                
                                                }
                                                ?>
                                                
                                                
                                            </td>
                                            <td>
                                                <?php
                                                    if($data->gender == 'm'){
                                                        echo "Male";
                                                    }elseif ($data->gender =='f') {
                                                        echo "Female";
                                                    }else{
                                                        echo "Any";
                                                    }
                                                ?>
                                                
                                            </td>
                                            <td>{{$session->session}}</td>
                                            <td>{{$data->price}}</td>
                                            
                                        </tr>
                                        <?php } ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                            <br>
                            <hr>
                            <br>
                             <h5>Education</h5>
                            
                            @if(isset($tutor_education))
                            
                            
                                <table class="table table-bordered">
                                    <thead style="">
                                        <th>Sl.</th>
                                        <th>Exam</th>
                                        <th>Institute</th>
                                        <th>CGPA</th>
                                        <th>Passing Year</th>
                                        
                                    </thead>
                                    <tbody>
                                        <?php 

                                            $i=0;
                                            

                                         ?>

                                        @foreach($tutor_education as $data)
                                        <?php $i++; ?>
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$data->exam}}</td>
                                            <td>{{$data->institute}}</td>
                                            <td>{{$data->cgpa}}</td>
                                            <td>{{$data->passing_year}}</td>
                                        
                                    
                                        </tr>
                                        @endforeach
                              
                                    </tbody>
                                </table>
                            @endif
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