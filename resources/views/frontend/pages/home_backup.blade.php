@extends('frontend.layouts.master')
@section('front-page-title',' | Home ')
@section('frontend-content')
<section class="slider-section">
  <br><br>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-6">
            <!-- <img src="{{url('frontend/assets/imgs/laptop.png')}}" alt="" class="slider-image">
            <div class="vedio-content">
              <h2>How It Work</h2>
              <div class="vedio-icon-slider">
                <i class="fas fa-play vedio-slider-icon"></i>
              </div>
            </div> -->
            <div class="video-section-slider">
              <img src="{{url('frontend/assets/imgs/slider-laptop.png')}}" alt="" class="img-fluid">
              <a class="lightbox-image play-anchor-home-slider video-play-button"  data-toggle="modal" data-target="#sliderVideo" href="#" >
                <span>
                  <!-- <i class="fas fa-play"></i> -->
                </span>
              </a>
              <div id="video-overlay"></div>
              <!-- Modal -->
              <div class="modal fade" id="sliderVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog custom-modal-dailog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Orange Tutoring</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <iframe width="100%" height="415" src="https://www.youtube.com/embed/5VCu1PMm-wU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="slider-content">
              <h5>Quality Education and perfect tutor for Everybody</h5> <br>
              <p>1-ON-1, 1 on 3 AND ONLINE  BATCH SESSION • ANY SUBJECT • ANY TIME • ANY PLACE</p><br>
              <form action="{{url('search')}}" method="post" role="search">
                @csrf
                <div class="input-group mb-3">
                  
                  <input type="text" class="form-control serach-box" placeholder="Search your tutor by subject, name or TNR" name="search" aria-label="Recipient's username" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-success" type="submit" id="button-addon2">Find My Tutor</button>
                  </div>
                  
                </div>
              </form>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
  <br><br>
</section>
<section class="our-tutor pt-5">
  
  <div class="">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center tutor-title">Meet Our Tutors</h1> <br><br>
        </div>
      </div>
      
      <div class="owl-carousel" id="university_logo">
        @if(isset($logos))
        @foreach($logos as $logo)
        <div class="col">
          <div class="university-logo">
            <?php
            
            if(isset($logo->logo) && !empty($logo->logo)){
            ?>
            <?php echo "<img src='".asset($logo->logo)."' alt=''>";?>
            <?php } ?>
          </div>
        </div>
        @endforeach
        @endif
      </div>
    </div>
    <div class="mt-5 owl-carousel owl-theme" id="owl-one">
      <!-- <div class="col-md-4"> -->
      <div class="item single-tutor">
        <div class="card">
          <img src="{{url('frontend/assets/imgs/tutor/03.png')}}" class="card-img-top " alt="...">
          <div class="card-body text-center">
            <h5 class="">John Been Robi</h5>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <br><br>
            <p class="card-text">UBC ,Langara and TRU Math tutor</p>
            <p class="">$03.22 per 15 min</p>
            <p class="">United States</p><br>
            <a href="#" class="text-success float-right">Read More..</a>
          </div>
        </div>
      </div>
      <!-- </div> -->
      <!-- <div class="col-md-4"> -->
      <div class="item single-tutor">
        <div class="card">
          <img src="{{url('frontend/assets/imgs/tutor/01.png')}}" class="card-img-top" alt="...">
          <div class="card-body text-center">
            <h5 class="">John Been Robi</h5>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <br><br>
            <p class="card-text">UBC ,Langara and TRU Math tutor</p>
            <p class="">$03.22 per 15 min</p>
            <p class="">United States</p><br>
            <a href="#" class="text-success float-right">Read More..</a>
          </div>
        </div>
      </div>
      <!-- </div> -->
      <!-- <div class="col-md-4"> -->
      <div class="item single-tutor">
        <div class="card">
          <img src="{{url('frontend/assets/imgs/tutor/02.png')}}" class="card-img-top" alt="...">
          <div class="card-body text-center">
            <h5 class="">John Been Robi</h5>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <br><br>
            <p class="card-text">UBC ,Langara and TRU Math tutor</p>
            <p class="">$03.22 per 15 min</p>
            <p class="">United States</p><br>
            <a href="#" class="text-success float-right">Read More..</a>
          </div>
        </div>
      </div>
      <!-- </div> -->
    </div>
  </div>
</section>
<h1 class="text-center our-offering-title">Our Offerings</h1>
<section class="offers pt-5 pb-5">
  <br>
  
  <div class="container">
    
    
    <br>
    <div class="row">
      <div class="col-md-4">
        <div class="offerings-content shadow ">
          <h5>ACADEMIC COURSE</h5>
          <p>GRADE 6 TO PhD</p>
          <p>University Admission Coaching</p>
          <p class="text-muted offering-long-content"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, sapiente..</p>
          <a href="#" class="">Explore Now <span><i class="fas fa-angle-right"></i></span></a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="offerings-content shadow ">
          <h5>LANGUAGE COURSE</h5>
          <p>SPOKEN</p>
          <p>IELTS,TOEFL </p>
          <p>JLTP, N5 etc</p>
          <p class="text-muted offering-long-content"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, sapiente..</p>
          <a href="#" class="">Explore Now <span><i class="fas fa-angle-right"></i></span></a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="offerings-content shadow ">
          <h5>PROFESSIONAL COURSE</h5>
          <p>SPSS</p>
          <p>GMAT,GRE</p>
          <p>Programming,Web Developing,SEO etc.</p>
          <p class="text-muted offering-long-content"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, sapiente..</p>
          <a href="#" class="">Explore Now <span><i class="fas fa-angle-right"></i></span></a>
        </div>
      </div>
    </div>
    <!-- <div id="owl-two" class="owl-carousel owl-theme">
      <div class="item">
        <h3>Regular academic tutions</h3>
        <p>Class or Level 6 to Phd</p>
        
        <a href="" class="text-success"><b>Explore Now</b></a>
      </div>
      <div class="item">
        <h3>Foreign Language Course</h3>
        <p>IELTS preparation <br>
          Spoken <br>
        Practice with native Speaker</p>
        
        <a href="" class="text-success"><b>Explore Now</b></a>
      </div>
      <div class="item">
        <h3>Professional Training</h3>
        <p>SPSS, Graphics, Adobe Photoshop,
        BCG, SWOT</p>
        
        <a href="" class="text-success"><b>Explore Now</b></a>
      </div>
    </div> -->
  </div>
  <br>
  <br>
</section>
<section class="student-exprience pt-5 pb-5">
  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h1 class=""><b>Student Experience</b></h1> <br>
      </div>
      <div class="col-md-2">
        <a href="#" class="btn btn-success custom-btn mt-3">Video</a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.
        gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
      </div>
    </div><br><br>
    <section id="photos" class="photos">
      @foreach($student_exprience as $data)
      <div class="photo-1">
        <?php
        echo "<img src='".asset($data->image)."'/>"
        ?>
        <!-- <div class="vedio-icon">
          <i class="fas fa-play"></i>
        </div> -->
        <div class="student-overly "  >
          <!-- <button class="btn btn-default " data-toggle="modal" data-target="#exampleModal{{$data->id}}" style="z-index: 9999;position: initial;" > <i class="fas fa-play"></i> </button> -->
          <a class="" data-toggle="modal" data-target="#{{$data->id}}" href="#"><div class="play-icon img-circle student-ex-vedio-icon"><i class="fas fa-play"></i></div></a>
          <!-- Button trigger modal -->
          <!-- Modal -->
          <!-- Modal -->
        </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog custom-modal-dailog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Orange Tutoring</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <iframe width="100%" height="415" src="{{$data->vedio_link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      <!-- Button trigger modal -->
      <!-- <div class="photo-1">
        <img src="{{url('frontend/assets/imgs/review-07.png')}}"  alt="Cute cat">
        <!- <div class="vedio-icon">
          <i class="fas fa-play"></i>
        </div> ->
        <div class="overlay vedio-icon">
          <a href="#"> <i class="fas fa-play"></i> </a>
        </div>
      </div>
      
      <div class="photo-1">
        <img src="{{url('frontend/assets/imgs/review-06.png')}}"  alt="Cute cat">
        <!- <div class="vedio-icon">
          <i class="fas fa-play"></i>
        </div> ->
        <div class="overlay vedio-icon">
          <a href="#"> <i class="fas fa-play"></i> </a>
        </div>
      </div>
      <div class="photo-1">
        <img src="{{url('frontend/assets/imgs/review-05.png')}}"  alt="Cute cat">
        <!- <div class="vedio-icon">
          <i class="fas fa-play"></i>
        </div> ->
        <div class="overlay vedio-icon">
          <a href="#"> <i class="fas fa-play"></i> </a>
        </div>
      </div>
      <div class="photo-1">
        <img src="{{url('frontend/assets/imgs/review-03.png')}}"  alt="Cute cat">
        <div class="vedio-icon">
          <i class="fas fa-play"></i>
        </div>
        <div class="overlay vedio-icon">
          <a href="#"> <i class="fas fa-play"></i> </a>
        </div>
      </div>
      <div class="photo-1">
        <img src="{{url('frontend/assets/imgs/review-03.png')}}"  alt="Cute cat">
        <!- <div class="vedio-icon">
          <i class="fas fa-play"></i>
        </div> ->
        <div class="overlay vedio-icon">
          <a href="#"> <i class="fas fa-play"></i> </a>
        </div>
      </div>
      <div class="photo-1">
        <img src="{{url('frontend/assets/imgs/review-04.png')}}"  alt="Cute cat">
        <!- <div class="vedio-icon">
          <i class="fas fa-play"></i>
        </div> ->
        <div class="overlay vedio-icon">
          <a href="#"> <i class="fas fa-play"></i> </a>
        </div>
      </div>
      <div class="photo-1">
        <img src="{{url('frontend/assets/imgs/review-06.png')}}"  alt="Cute cat">
        <!- <div class="vedio-icon">
          <i class="fas fa-play"></i>
        </div> ->
        <div class="overlay vedio-icon">
          <a href="#"> <i class="fas fa-play"></i> </a>
        </div>
      </div> -->
    </section>
    
  </div>
</section>
@endsection