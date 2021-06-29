@extends('frontend.layouts.master')
@section('front-page-title',' | Home ')
@section('frontend-styles')
<style>
  .modal-dialog {
    max-width: 680px;
    margin: 1.75rem auto;
  }
</style>
@endsection
@section('frontend-content')
<!-- Matrials Section -->
<section class="materials  bg-off-white">
  <br><br>
  <div class="container pt-3 pb-4">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <h2 class="text-center display-4">MATERIALS </h2> <br>
        <p class="text-center">Women In Digital materials are built by our community, which is made up of industry-leading technologists, instructors, and leaders. All curriculum developed by Women In Digital . You are free to share and adapt these materials.</p>
      </div>
    </div>
    <br><br>
    <div class="row">
      @foreach($metarials as $data)
      <div class="col-md-4 mb-3">
        <div class="card">
          <a href="{{url('metarials-details',$data->id)}}" style="text-decoration: none;">
            <div class="media card-body">
              <?php echo "<img src='".asset($data->image)."' class='mr-3 width-100' alt='...' style='height: 80px;'>";?>
              <div class="media-body">
                <h6 class="mt-0"><b> {{ str_limit($data->title, $limit = 20, $end = '...') }}</b></h6>
                <p>{{ str_limit($data->sub_title, $limit = 30, $end = '...') }} </p>
              </div>
            </div>
          </a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  <br><br>
</section>
<!-- Course Section Section -->
<section class="pt-5 pb-5 course-section bg-pink">
  <h1 class="text-center text-white">Courses</h1>
  <div class="mt-5 owl-carousel owl-theme" id="owl-two">
    @foreach($courses_d2 as $course)
    <div class="item">
      <a href="{{url('school-program',$course->id)}}" style="text-decoration: none;">
        <div class="card">
          <?php
            echo "<img src='".asset($course->image)."' class='card-img-top' alt='' style='height: 250px;width:100%;object-fit:cover;object-position:center center;'>";
          ?>
          <div class="card-body">
            <h5 class="card-text text-center">{{ str_limit($course->course_title, $limit = 20, $end = '..') }}</h5>
					  <p style="font-family: AvenirNextLtPro-Medium" class="text-center">Hands-on Training</p>
          </div>
          <div class="card-footer">
            <span class="float-left number2">{{$course->price}}</span>
            <span class="float-right">Enroll</span>
          </div>
        </div>
      </a>
    </div>
    @endforeach
  </div>
</section>
<!-- Our Tutors Section -->
<section class="our-tutor pt-5 bg-off-white">
  <h1 class="text-center">Our Mashtor</h1>
  <div class="mt-5 owl-carousel owl-theme" id="owl-one">
    @foreach($tutors as $tutor)
    <div class="item single-tutor">
      <div class="card">
        <a href="{{url('teacher/tutor-details',$tutor->user_id)}}"  style="text-decoration: none;">
          <?php echo "<img src='".asset($tutor->image)."' class='' style='height:300px;width:100%;object-fit:cover;object-position:center center' alt=''>"; ?>
          <div class="card-body text-center">
            <h5 class="text-warning">{{$tutor->fullname}}</h5>
            <p class="card-text">{{ str_limit($tutor->profile_tag, $limit = 20, $end = '..') }}</p>
            <p class=""> ${{$tutor->price}}/hour</p><br>
          </div>
        </a>
      </div>
    </div>
    @endforeach
  </div>
</section>
<!-- Video Block Section -->
<section class="video-block bg-pink">
  <div class="container">
    <div class="video-tab clearfix">
      <div class="row">
        <div class="col-md-7 pr-0">
          <div class="tab-content">
            <div class="tab-pane fade show active custom-tab-pane-step" id="videoTab01">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/4HulloFTkzU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="tab-pane fade show  custom-tab-pane-step" id="videoTab01">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/G0bnJgzS9v4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="tab-pane fade custom-tab-pane-step" id="videoTab02">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/SoJgRhwrzu8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="tab-pane fade custom-tab-pane-step" id="videoTab03">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/zLhfm8r-xGY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="tab-pane fade custom-tab-pane-step" id="videoTab0edit">
              <video width="560" height="315" controls>
                <source src="{{url('frontend/assets/imgs/video-image/video506c7ae5-63d0-44d7-8786-75e7d52acc66video.mp4')}}" type="video/mp4">
                <source src="{{url('frontend/assets/imgs/video-image/video506c7ae5-63d0-44d7-8786-75e7d52acc66video.mp4')}}" type="video/ogg">Your browser does not support the video tag.
              </video>
            </div>
            <div class="tab-pane fade custom-tab-pane-step" id="videoTab04">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/G0bnJgzS9v4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" class="__web-inspector-hide-shortcut__"></iframe>
            </div>
            <div class="tab-pane fade custom-tab-pane-step" id="videoTab05">
              <div class="post-thumbnail">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/G0bnJgzS9v4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" class="__web-inspector-hide-shortcut__"></iframe>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-5 pl-0">
          <ul class="nav nav-tabs">
            <li class="active">
              <a href="#videoTab01" data-toggle="tab">
                <div class="post-thumbnail">
                  <img class="img-responsive" src="{{url('frontend/assets/imgs/women.png')}}" alt="post-thumbnail"/>
                </div>
                <h3>2020 Inclusive Internet Index Documentary Film on Women in Digital, Powered By Facebook</h3>
              </a>
            </li>
            <li>
              <a href="#videoTab01" data-toggle="tab">
                <div class="post-thumbnail">
                  <img class="img-responsive" src="{{url('frontend/assets/imgs/mom.png')}}" alt="post-thumbnail"/>
                </div>
                <h3>All the mom's recipes in one app.</h3>
              </a>
            </li>
            <li>
              <a href="#videoTab02" data-toggle="tab">
                <div class="post-thumbnail">
                  <img class="img-responsive" src="{{url('frontend/assets/imgs/2.png')}}" alt="post-thumbnail"/>
                </div>
                <h3>Fun & Easy to learn the alphabet number, colors and shapes </h3>
              </a>
            </li>
            <li>
              <a href="#videoTab0edit" data-toggle="tab">
                <div class="post-thumbnail">
                  <img class="img-responsive" src="{{url('frontend/assets/imgs/video-image/Screenshot_2.png')}}" alt="Video Editing Class"/>
                </div>
                <h3>Video Editing Class</h3>
              </a>
            </li>
            <li>
              <a href="#videoTab03" data-toggle="tab">
                <div class="post-thumbnail">
                  <img class="img-responsive" src="http://womenindigital.net/frontend/assets/images/impact/impact.png" alt="post-thumbnail"/>
                </div>
                <h3>Educating girls is one of the most powerful tools to prevent child marriage</h3>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Japanes Learners Section -->
<section class="japanes">
  <div class="japanes-1" style="background-image: url({{url('frontend/assets/imgs/our_mission.png')}});">
    <div class="row">
      <div class="col-lg-6 offset-lg-6 col-sm-12 col-xs-12 white-bg" style="">
        <div class="for-japanes-learner">
          <h1 class="text-warning">For Bangla Learners</h1> <br>
          <ul>
            <li> <span><i class="fas fa-check"></i></span> Talk in Bangladeshi with people who live in Bangladesh</li>
            <li> <span><i class="fas fa-check"></i></span>Learn seniors' actual experience and knowledge outside textbooks</li>
            <li> <span><i class="fas fa-check"></i></span>Ask questions for your dream to success</li>
            <li> <span><i class="fas fa-check"></i></span>Also available for universities and language schools</li>
          </ul>
          <a href="#" class="btn btn-warning text-light">For Bangla Learners</a>
        </div>
      </div>
    </div>
  </div>
  <div class="japanes-1" style="background-image: url({{url('frontend/assets/imgs/impact.png')}});">
    <div class="row">
      <div class="col-lg-6 col-xs-12 white-bg" style="">
        <div class="for-japanes-learner">
          <h1 class="text-warning">For Japanese  Learners</h1>
          <p>Enjoy talking with people abroad</p> <br>
          <ul>
            <li> 
              <span><i class="fas fa-check"></i></span> Connect to society by talking in bangladeshi with foreign young people
            </li>
            <li> 
              <span><i class="fas fa-check"></i></span>Contribute on young people education with your experience and knowledge through language learning
            </li>
            <li> 
              <span><i class="fas fa-check"></i></span>Here you can challenge new things
            </li>
            <li> 
              <span><i class="fas fa-check"></i></span>Also available in elderly houses and nursing homesIt would be a big opportunity for foreign labors
            </li>
          </ul>
          <a href="#" class="btn btn-warning text-light">For Bangladeshi Participants</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Popup Modal -->
<div class="modal fade" id="popupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{url('frontend/modal-img/01.png')}}" class="img-fluid" style="width:100%;height: 400px !important;object-fit: contain;object-position: center center;"/>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('frontend-scripts')
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-152727216-1');
</script>
<script>
  $('#popupModal').modal({
    show: false
  })
</script>
@endsection