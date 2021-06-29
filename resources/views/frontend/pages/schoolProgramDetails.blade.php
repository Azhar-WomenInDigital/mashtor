@extends('frontend.layouts.master')
@section('front-page-title',' | Course Details ')
@section('frontend-styles')
<style>
    .invalid-feedback{
        display: block;
    }
</style>
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
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" class="fixed-facebook" target="_blank"><i class="fab fa-facebook-f"></i> <span> <i class="fas fa-share"></i> Share </span></a>
    </div>
    <div>
        <a href="https://twitter.com/intent/tweet?text={{ url()->current() }}" class="fixed-twitter" target="_blank"><i class="fab fa-twitter"></i> <span><i class="fas fa-share"></i> Share </span></a>
    </div>
    <div>
        <a href="http://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}" class="fixed-linkedin" target="_blank"><i class="fab fa-linkedin-in"></i> <span> <i class="fas fa-share"></i> Share </span></a>
    </div>
</div>
<div class="col-lg-12 mt-5">
    <div class="col-lg-8 mx-auto">
        <h1 class="text-center text-warning wid-header-title wid-c-font-1">
            <?php 
                if(isset($course->course_title) && !empty($course->course_title)){
                    echo $course->course_title;
                } 
            ?>
        </h1>
        <div class="col-lg-11 mx-auto pt-3">
            <p class="text-center wid-text-dark wid-c-font-3 wid-font-28 wid-sm-font-16">
                <?php 
                    if(isset($course->course_descrption) && !empty($course->course_descrption)){
                ?>
                {!! $course->course_descrption !!}
                <?php } ?>
            </p>
        </div>
    </div>
    <div class="row">
        <?php
            if(isset($course->id)){
        ?>
        <div class="col-md-6 mx-auto mt-md-5 pb-md-4 mb-md-5 my-2 pb-2 text-center">
            <form action="{{url('enrole/course/school')}}" method="post">
                @csrf
                @if ($errors->has('discount'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('discount') }}</strong>
                </span>
                @endif
                @if(Session::has('faild'))
                <p class="alert alert-danger">{{ Session::get('faild') }}</p>
                @endif
                <input type="hidden" name="course_id" value="{{$course->id}}">
                <input type="hidden" name="course_cat" value="<?php if(isset($course->course_cat) && !empty($course->course_cat)){echo $course->course_cat;}?>">
                <button class="btn btn-warning text-light font-weight-bold  p-2 wid-bg-red-hover wid-border-radius-none wid-font-22 wid-button wid-sm-font-18"
                type="submit">Enroll
                </button>
                <?php
                    if(isset(Auth::user()->id)){
                    $discount = Auth::user()->discount_code;
                    if(isset($discount) && !empty($discount)){
                    $discountcode = DB::table('discount_codes')->get();
                    foreach($discountcode as $dis){
                    if($discount == $dis->discount_code){
                    echo "<h3 class='pt-4 font-weight-bold  p-2  wid-border-radius-none wid-font-22 wid-button wid-sm-font-18'> WOW You Have Got ".$dis->discount." % Discount </h3>";
                ?>
                <input type="hidden" name="discount" value="{{$dis->discount}}">
                <?php
                    }else{
                ?>
                
                <?php
                }
                }}else{
                ?>
                <br>
                <a class="mt-3 btn btn-warning text-light font-weight-bold p-2  wid-border-radius-none wid-font-22 wid-button wid-sm-font-18" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Apply For Discount</a>
                <div class="collapse mt-4" id="collapseExample">
                    <div class="card card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter your discount code  " aria-label="Recipient's username" aria-describedby="button-addon2" name="discount">
                            <div class="input-group-append">
                                <button class="btn btn-dark" type="submit" id="button-addon2">Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                }else{
                ?>
                <br>
                <a class="mt-3 btn btn-warning text-white font-weight-bold p-2 r wid-border-radius-none wid-font-22 wid-button wid-sm-font-18" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Apply For Discoun</a>
                <div class="collapse mt-4" id="collapseExample">
                    <div class="card card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter your discount code  " aria-label="Recipient's username" aria-describedby="button-addon2" name="discount">
                            <div class="input-group-append">
                                <button class="btn btn-dark" type="submit" id="button-addon2">Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
                <br><br>
            </form>
            <br><br>
        </div>
        <?php } ?>
    </div>
</div>
</header>
<section class="wid-bg-grey" id="courseDetails">
<!-- Overview -->
<div class="container-fluid">
    <div class="row overview-section">
        <div class="col-lg-6 pt-5 px-4 pb-3 p-md-5">
            <h1 class="text-warning wid-c-font-1 wid-sub-header-title ">Overview</h1> <br>
            <p class="wid-text-dark wid-c-font-3 wid-font-19 wid-sm-font-14">
                Price : 
            <?php
                if(isset($course->price) && !empty($course->price)){
            ?> 
               <span class="text-warning font-weight-bold">{{$course->price}}</span>
            <?php } ?>
            </p>
            <p class="wid-text-dark wid-c-font-3 wid-font-19  wid-sm-font-14">
            <br>Course Duration : 
            <?php
                if(isset($course->duration) && !empty($course->duration)){
            ?> 
            <span class="text-warning font-weight-bold"> {{$course->duration}} Month </span>
            <?php } ?>
            </p>
            <p class="wid-text-dark wid-c-font-3 wid-font-19 wid-sm-font-14">
             <br> Class start from :
             <?php
                if(isset($course->start_date) && !empty($course->start_date)){
            ?> 
             <span class="text-warning font-weight-bold"> {{date('d F Y', strtotime($course->start_date))}} </span>
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
    if($course->id == 33 or $course->id == 19){
?>
<div class="container-fluid wid-bg-pink">
    <div class="row instructor-details">
        <div class="col-lg-6">
            <div class="row text-center">
                <div class="col-12 mx-auto">
                    <img src="{{url('frontend/assets/imgs/digital_merketing_instructor.png')}}" class="w-100 instructor-img" alt="Women in digital" style="height: 500px;object-fit: cover;object-position: top;">      
                </div>
            </div>
        </div>
        <div class="col-lg-6 mt-4 mt-md-0 px-4 px-md-0" style="align-self: center;">
            <h1 class="wid-text-red wid-c-font-1 wid-sub-header-title ">Meet our instructor</h1>
            <p class="wid-text-dark wid-c-font-2 wid-font-25 wid-sm-font-16"> Imran Ali </p>
            <p class="wid-text-dark wid-c-font-3 wid-font-22 pt-md-4 pt-2 wid-sm-font-18"><span style="font-family: AvenirNextLTPro-Regular; font-size: 22px;">I’m Imran Ali, over the last 18 years; I have developed a wide range of websites and project management. 
            <br>
            To seek a challenging position in an IT Industry and contribute extensively in an environment where there are opportunities for personal and professional growth and also want to give my IT knowledge in business developments
            <br>
            Specialties: I also have some experience in the following areas: Digital Marketing, Wordpress, Drupla, Joomla, CSS3, html5, Flash , Website Designing and Graphic Design.</span><br></p>
        </div>
    </div>
</div>
<?php } ?>
<?php
// $instructor = DB::table('instructors')->where('id',$course->instractor_id)->first();
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
<?php 
}
if(isset($courseOutline)){ 
?>
<!--What to expect details-->
<div class="container">
    <div class="row mt-md-3">
        <div class="col-lg-12 mt-4 pt-4 pt-md-4 mt-md-5">
            <h1 class="text-warning text-center wid-c-font-1 wid-sub-header-title">What to expect</h1>
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
                <?php 
                    $j=0;
                ?>
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
<?php } ?>
<!--End what to expect details-->
</section>
@endsection