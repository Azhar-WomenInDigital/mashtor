@extends('frontend.layouts.master')
@section('front-page-title',' | About ')
@section('frontend-style')
<style>
  

.timecountdown li {
  display: inline-block;
  font-size: 1.5em;
  list-style-type: none;
  padding: 1em;
  text-transform: uppercase;
}
 
.timecountdown li span {
  display: block;
  font-size: 4.5rem;
}

</style>
@endsection
@section('frontend-content')
@include('frontend.pages.profile.profile_master')

<div class="col-md-9">
  
  <div class="card">
    <div class="card-body dashboard-btn">  
<?php
      if(Auth::user()->become_a_tutor == 1){
    ?>  
  <a href="{{url('teacher/become-a-teacher')}}" class="btn btn-warning text-white">Mashtor Dashboard</a>
<?php }else{ ?>
<a href="{{url('teacher/become-a-teacher')}}" class="btn btn-warning text-white">Became a Teacher</a>
<?php } ?>
  <a href="{{url('teacher/find-tutor')}}" class="btn btn-warning text-white">Find Teacher</a>
  <a href="{{url('professinal/courses')}}" class="btn btn-warning text-white">Find Course</a>
  <br><br>
  <div class="container">
  <script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1.1','packages':['corechart']}]}"></script>
       <div id="react" style="width: 100%; height: 400px;"></div>

</div>
<br><br>
{{-- <p hidden>
{{ $user = auth()->user()->id }}

</p> --}}
    {{-- <a href="{{ url('user-course-info', $user) }}">Selected Course</a> --}}
    <h3 class="text-center text-warning">Enroll History</h3>
<hr>
<?php
  if(isset($enroll_courses) && !empty($enroll_courses)){     
?>

<table class="table">
  <thead>
    <th>Course Name</th>
    <th>Course fee</th>
    <th>Course Started Date</th>
  </thead>
  <tbody>
    <?php 
       foreach($enroll_courses as $course){


      $pro_course = DB::connection('mysql2')->table('courses')->where('id',$course->course_id)->first();
      $school_course = DB::table('courses')->where('id',$course->course_id)->first();
    ?>
    <tr>

    <?php
      if(isset($pro_course->course_title)){
    ?>
      <td>{{$pro_course->course_title}}</td>

    <?php }else{
      ?>
      <td>{{$school_course->name}}</td>
      <?php
        } 
      ?>

    <?php
      if(isset($pro_course->course_title)){
    ?>
      <td>{{$pro_course->course_fee}}</td>

    <?php }else{
      ?>
      <td>Tk: {{$school_course->price}}</td>
      <?php
    } ?>

    <?php
      if(isset($pro_course->course_title)){
    ?>
      <td>{{$pro_course->course_start}}</td>

    <?php }else{
      ?>
      <td> {{date('d F Y', strtotime($school_course->start_date))}}</td>
      <?php
    } ?>

    </tr>
  <?php } ?>
  </tbody>
</table>
<?php
    
  }else{
    echo "Course not found";
  }
?>  
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
  </div>
</div>


</div>
</div>
</div>
</div>
<br><br><br>

@endsection
@section('frontend-scripts')
<script>
  google.setOnLoadCallback(drawReactChart);

function drawReactChart() {

  var data = google.visualization.arrayToDataTable([
    ['Scenario', 'Developers'],
    ['Complated Courses ',     6],
    ['Enroll Courses ',      4],
    ['Active Class ',  4]
  ]);

  var options = {
    title: 'Course Details',
    slices: {
      0: { color: '#61DAFB' },
      1: { color: '#1DADCD' },
      2: { color: '#0082A0' }
    }
  };

  var chart = new google.visualization.PieChart(document.getElementById('react'));

  chart.draw(data, options);
}




</script>

@endsection