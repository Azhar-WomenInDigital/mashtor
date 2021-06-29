@extends('frontend.layouts.master')
@section('front-page-title',' | Course Details ')
@section('frontend-styles')
@endsection
@section('frontend-content')
<?php
if(isset($course->id)){
DB::update(" UPDATE courses SET view = view + 1 WHERE id = '".$course->id."' ");
$course_view = DB::table('courses')->where('id',$course->id)->first();
}
?>
<div id="fixed-social">
    <div>
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" class="fixed-facebook" target="_blank"><i class="fab fa-facebook-f"></i> <span><i class="fas fa-share"></i> Share </span></a>
    </div>
    <div>
        <a href="https://twitter.com/intent/tweet?text={{ url()->current() }}" class="fixed-twitter" target="_blank"><i class="fab fa-twitter"></i> <span><i class="fas fa-share"></i> Share</span></a>
    </div>
    <div>
        <a href="http://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}" class="fixed-linkedin" target="_blank"><i class="fab fa-linkedin-in"></i> <span><i class="fas fa-share"></i> Share</span></a>
    </div>
</div>
<div class="col-lg-12 mt-5 pb-5">
    <div class="col-lg-8 mx-auto mb-5">
        <h1 class="text-center wid-text-red wid-header-title wid-c-font-1">
            <?php 
                if(isset($course->course_title) && !empty($course->course_title)){
                    echo $course->course_title;
                } 
            ?>
        </h1>
        <div class="col-lg-11 mx-auto pt-3">
            <p class="text-center wid-text-dark wid-c-font-3 wid-font-28 wid-sm-font-16">
                <?php 
                    if(isset($course->course_description) && !empty($course->course_description)){
                ?>
                {!! $course->course_description !!}
            <?php } ?>
            </p>
        </div>
    </div>
    <div class="row">
        <?php
        if(isset($course->id)){
        ?>
        <div class="col-md-3 mx-auto mt-md-5 pb-md-4 mb-md-5 my-2 pb-2 text-center">
            <form action="{{url('enrole/course')}}" method="post">
                @csrf
                <input type="hidden" name="course_id" value="{{$course->id}}">
                <button class="btn font-weight-bold wid-bg-red p-2 wid-bg-red-hover wid-border-radius-none wid-font-22 wid-button wid-sm-font-18"
                type="submit">Enroll 
                </button>
            </form>
        </div>
        <?php } ?>
    </div>
</div>
<section class="wid-bg-grey" id="courseDetails">
    <!-- Overview -->
    <div class="container-fluid">
        <div class="row overview-section">
            <div class="col-lg-6 pt-5 px-4 pb-3 p-md-5">
                <h1 class="wid-text-red wid-c-font-1 wid-sub-header-title ">Overview</h1>
                <p class="wid-text-dark wid-c-font-3 wid-font-19 pt-md-4 pt-2 wid-sm-font-14"><strong>
                <?php
                    if(isset($course->course_fee) && !empty($course->course_fee)){
                ?> 
                    {{$course->course_fee}}
                <?php } ?>
                </strong><br>Course Duration 
                <?php
                    if(isset($course->course_duration) && !empty($course->course_duration)){
                ?> 
                {{$course->course_duration}}
                <?php } ?>
                <br> Class start from 
                <?php
                    if(isset($course->course_start) && !empty($course->course_start)){
                ?> 
                {{$course->course_start}}
                <?php } ?>
                <br> Weekly 
                <?php
                    if(isset($course->class_weekly_duration) && !empty($course->class_weekly_duration)){
                ?> 
                {{$course->class_weekly_duration}},
                <?php } ?>
                <?php
                    if(isset($course->class_hourly_duration) && !empty($course->class_hourly_duration)){
                ?> 
                {{$course->class_hourly_duration}}, 
                <?php } ?>
                <br>
                Place: 
                <?php
                    if(isset($course->location) && !empty($course->location)){
                ?> 
                {{$course->location}}
                <?php } ?>
                <br> 
                Contact: 
                <?php
                    if(isset($course->contact_number_1) && !empty($course->contact_number_1)){
                ?> 
                {{$course->contact_number_1}}
                <?php } ?>
                ,
                <?php
                    if(isset($course->contact_number_2) && !empty($course->contact_number_2)){
                ?> 
                {{$course->contact_number_2}}
                <?php } ?>
                </p>
            </div>
            <div class="col-lg-6">
                <div class="row align-items-center h-100">
                    <div class="col-12 mx-auto pr-md-4">
                    <?php
                        if(isset($course->image) && !empty($course->image)){
                    ?> 
                        <?php echo "<img src='".asset($course->image)."' class='w-100 img-fluid' alt='Women in digital'>";?>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End overview -->
    <?php
        if(isset($course->instractor_id)){
        $instructor = DB::connection('mysql2')->table('instructors')->where('id',$course->instractor_id)->first();
        }
        if(isset($instructor)){
    ?>
    <!--Details of trainer-->
    <div class="container-fluid wid-bg-pink">
        <div class="row instructor-details">
            <div class="col-lg-6">
                <div class="row text-center">
                    <div class="col-12 mx-auto">
                        <?php
                        echo "<img src='".asset($instructor->image)."' class='w-100 instructor-img'
                        alt='Women in digital'>";
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-4 mt-md-0 px-4 px-md-0">
                <h1 class="wid-text-red wid-c-font-1 wid-sub-header-title ">Meet our instructor</h1>
                <p class="wid-text-dark wid-c-font-2 wid-font-25 wid-sm-font-16">{{$instructor->instructor_name}}</p>
                <p class="wid-text-dark wid-c-font-3 wid-font-22 pt-md-4 pt-2 wid-sm-font-18">{!! $instructor->instructor_description !!}</p>
            </div>
        </div>
    </div>
    <!--End details of trainer-->
    <?php } ?>
    <!--What to expect details-->
    <div class="container">
        <div class="row mt-md-5">
            <div class="col-lg-12 mt-4 pt-4 pt-md-4 mt-md-5">
                <h1 class="wid-text-red text-center wid-c-font-1 wid-sub-header-title">What to expect</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7 mx-auto mb-md-4 pt-4 pb-md-4">
                <h5 class="wid-text-dark text-center wid-c-font-3 wid-font-24 wid-sm-font-16">Here is the module, you will learn those thing
                during the class.</h5>
            </div>
        </div>
        <div class="row mt-5 pb-5">
            <div class="col-lg-12 mb-5">
                <div id="accordion" class="wid-text-dark">
                    <?php $j=0;?>
                    @foreach($courseOutline as $data)
                    <?php $j++; ?>
                    <div class="card">
                        <div class="card-header" id="heading{{$data->id}}">
                            <h5 class="mb-0">
                            <button class="btn btn-link wid-sm-font-18" data-toggle="collapse" data-target="#collapse{{$data->id}}"
                            aria-expanded="true" aria-controls="collapse{{$data->id}}">
                            {{$data->topic_title}} <span style="float: right;"><i class="fa fa-caret-down"></i></span>
                            </button>
                            </h5>
                        </div>
                        <div id="collapse{{$data->id}}" class="collapse <?php if($j==1){ echo "show";}?>" aria-labelledby="heading{{$data->id}}" data-parent="#accordion">
                            <div class="card-body wid-sm-font-16">
                                {!! $data->topic_details !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--End what to expect details-->
</section>
@endsection
@section('frontend-scripts')
@endsection