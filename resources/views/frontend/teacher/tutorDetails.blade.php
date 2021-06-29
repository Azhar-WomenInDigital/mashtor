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
                <li class="breadcrumb-item"><a href="{{url('teacher/find-tutor')}}">Find Tutor</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mashtor Details</li>
            </ol>
        </nav>
        <div class="=">
            <div class="row">
                <div class="col-12">
                    <div class="search-box bg-pink px-5">
                        <br>
                        <h2 class="text-white wid-c-font-1">Search Find Tutor</h2> <br>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search Find Tutor" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-dark" type="button" id="button-addon">Search</button>
                            </div>
                        </div> 
                        <br><br>
                    </div>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <figure>
                                <?php echo "<img src='".asset($tutors->image)."' class='img-fluid img-profile' alt='Card image'>";?>
                            </figure>
                            <p class="text-center">$ {{$tutors->price}} / Hour</p> 
                            <div class="message text-center mt-3">
                                <a href="#" class="btn btn-warning text-light"  data-toggle="modal" data-target="#staticBackdrop"> Message </a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <h3>If you hire {{$tutors->fullname}}</h3>
                            <p>Please Contact us</p>
                            <h3 class="text-warning"><a href="tel:+8801635-497868" class="text-warning" style="text-decoration:none;">+8801635-497868</a></h3>
                        </div>
                    </div>
                    <br><br>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-details">
                                <h4>{{$tutors->fullname}}</h4>
                                <h6><b>{{$tutors->profile_tag}}</b></h6>
                                <br>
                                <p>{{$tutors->user_description}}</p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Education</h3>
                            <br>
                            <div class="education-info">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <th>School Name</th>
                                        <th>Degree</th>
                                        <th>Field of Study</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(isset($edu_info) && !empty($edu_info)){
                                        foreach($edu_info as $edu){
                                        ?>
                                        <tr>
                                            <td>{{$edu->school_name}}</td>
                                            <td>{{$edu->degree_name}}</td>
                                            <td>{{$edu->field_of_study}}</td>
                                        </tr>
                                        <?php
                                        }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                             </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <div class="education-info">
                                <h3 class="text-center">Courses</h3><br>
                                <ul class="list-group">
                                    <?php
                                        if(isset($courses) && !empty($courses)){
                                            foreach($courses as $course){
                                    ?>
                                    <li class="list-group-item">{{$course->courses}}</li>
                                    <?php } } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Send Message To  {{$tutors->fullname}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('/msg')}}" method="post">
                    @csrf
                    <input type="hidden" name="to" value="{{$tutors->user_id}}">
                    <div class="modal-body">
                        <div class="form-group">
                            <textarea name="messages" id="" cols="5" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning text-light">Send</button>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('frontend-scripts')
@endsection