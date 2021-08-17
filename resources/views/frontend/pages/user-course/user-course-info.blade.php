@extends('frontend.layouts.master')
@section('title',' | Course Details ')
@section('frontend-styles')
<style>
  .course-heading h1{
    text-align: center;
  }
  .card{
    /* box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%); */
    margin-bottom: 30px;
  }
  .projects-card{
    margin-bottom: 0px;
  }
  .trainer .tutor-card{
    margin-bottom: 0px;
  }
  .des{
    padding: 20px 8px;
    height: 180px;
  }
  .trainer .tutor-des{
    height: 110px;
  }
  .tutor-des{
    height: auto;
  }
  .des p{
    font-size: 15px;
  }
  .des h5{
    font-size: 17px;
  }
  .card img{
    width: 100%;
    height: 200px;
    object-fit: cover;
  }
  /* .projects-card img{
    width: 100%;
    height: 310px;
    object-fit: cover;
  } */
  .projects-card .des {
    height: auto
  }
  .short-cat a{
    border-right: 2px solid black;
    padding-left: 7px;
    padding-right: 7px;
    line-height: 15px;
    font-family: AvenirNextLTPro-Medium;
    text-decoration: none;
  }
  .short-cat a:last-child{
    border-right: none;
  }
  .rating span{
    font-size: 13px;

  }
  .trainer{
    display: grid;
    grid-template-columns: auto auto auto auto auto;
    grid-gap: 10px;

  }
  .projects-team{
    display: grid;
    grid-template-columns: auto auto auto auto auto;
    grid-gap: 10px;
  }
  .heading-font{
    font-family:  AvenirNextLTPro-Medium;
  }
  .load-col{
    display: none;
  }
  @media only screen and (min-width: 768px) and (max-width: 991.98px) {
    .des {
      height: 190px;
    }
    .des p{
      font-size: 14px;
    }
    .tutor-des{
      height: 100px;
    }
    .trainer{
      grid-template-columns: auto auto auto;
    }
    .projects-team{
      grid-template-columns: auto auto auto;
    }
  }
  @media only screen and (min-width: 577px) and (max-width: 767.99px) {
    .trainer{
      grid-template-columns: auto auto;
    }
    .projects-team{
      grid-template-columns: auto auto;
    }
  }
  @media only screen and (min-width: 320px) and (max-width: 576px) {
    .des {
      height: auto;
    }
    .des p{
      font-size: 14px;
    }
    .trainer{
      text-align: center;
      grid-template-columns: auto;
    }
    .projects-team{
      text-align: center;
      grid-template-columns: auto;
    }
    .main-header h1{
      font-size: 25px;
    }
  }
</style>
    
@endsection
@section('frontend-content')
    <section class="container">
    <div class="course-heading pt-sm-3 pt-md-4 pt-lg-5">
      <div class="text-center pb-sm-4 pb-md-5 main-header">
        <h1 style="font-family: AvenirNextLTPro-Medium">{{ $user_course_categories->user_course_category_name }}</h1>
        <h6 class="py-2" style="font-family: AvenirNextLTPro-Medium">EQUALS Digital Skill Fund (2021)</h6>
        <div class="d-flex justify-content-center short-cat">
          <a href="#">The Projects</a>
          <a href="#">Report</a>
          <a href="#">Gallery</a>
        </div>
      </div>
      @if (auth()->user())
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-6 col-xl-7">
          <h4 class="pb-sm-3 pb-md-4" style="font-family:  AvenirNextLTPro-Medium">Courses We Offer</h4>
          <form action="{{ route('selected.user.course.store') }}" method="POST">
            @csrf
            @foreach ($user_course as $data)
            <div class="form-check pb-sm-3">
              <label class="form-check-label" for="radio1">
                <input type="radio" class="form-check-input" id="radio1" name="courseuser_id" value="{{ $data->id }}" >{{ $data->user_course_name }}
              </label>
            </div>
            @endforeach
            <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
            <button type="submit" class="btn btn-warning text-white">Ok</button>
          </form>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-5">
          <h4 style="font-family: AvenirNextLTPro-Medium">Supported By</h4>
          <div class="row pt-3">
            <div class="col-6">
              <div class="sponsored-by">
                <img src="{{ url('frontend/assets/supported-by/equals.png') }}" alt="" class="py-2 img-fluid">
                <img src="{{ url('frontend/assets/supported-by/giz.png') }}" alt="" class="py-2 img-fluid">
              </div>
            </div>
            <div class="col-6">
              <div class="sponsored-by">
                <img src="{{ url('frontend/assets/supported-by/ctsc.png') }}" alt="" class="py-2 img-fluid">
                <img src="{{ url('frontend/assets/supported-by/federal.jpg') }}" alt="" class="py-2 img-fluid">
              </div>
            </div>
          </div>
        </div>
      </div>
      @else
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-6 col-xl-7">
          <h4 style="font-family:  AvenirNextLTPro-Medium">Courses We Offer</h4>
          <div class="card border-0 mb-0" style="width: 100%;">
            <div class="card-body">
              @foreach ($user_course as $data)
              <h6 class="py-sm-2">{{ $data->user_course_name }}</h6>
              @endforeach
            </div>
          </div>
          <p class="text-warning pt-3">* If you want to do the course, please <a href="{{ url('register') }}" class="px-1">Sign Up</a>first</p>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-5">
          <h4 style="font-family: AvenirNextLTPro-Medium">Supported By</h4>
          <div class="row pt-3">
            <div class="col-6">
              <div class="sponsored-by">
                <img src="{{ url('frontend/assets/supported-by/equals.png') }}" alt="" class="py-2 img-fluid">
                <img src="{{ url('frontend/assets/supported-by/giz.png') }}" alt="" class="py-2 img-fluid">
              </div>
            </div>
            <div class="col-6">
              <div class="sponsored-by">
                <img src="{{ url('frontend/assets/supported-by/ctsc.png') }}" alt="" class="py-2 img-fluid">
                <img src="{{ url('frontend/assets/supported-by/federal.jpg') }}" alt="" class="py-2 img-fluid">
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif
    </div>
  </section>
  
  <!-- Projects Team -->
  <h3 class="pt-4 text-center heading-font">Development in Progress...</h3>
  <section class="pt-5">
    <div class="container">
      <h1 class="text-center pt-3 pb-4" style="font-family: AvenirNextLTPro-Medium;">Project Team</h1>
      <div class="projects-team">
        <div class="member">
          <div class="card projects-card">
            <img src="{{ url('frontend/assets/imgs/project-team/achia.png') }}" alt="" class="img-fluid">
            <div class="des px-2 py-3">
              <h5 class="pb-2">Achia Khaleda Nila</h5>
              <p>CEO  and Founder</p>
            </div>
          </div>
        </div>
        <div class="member">
          <div class="card projects-card">
            <img src="{{ url('frontend/assets/imgs/project-team/farzana.png') }}" alt="" class="img-fluid">
            <div class="des px-2 py-3">
              <h5 class="pb-2">Farjana Ali</h5>
              <p>Project Manager</p>
            </div>
          </div>
        </div>
        <div class="member">
          <div class="card projects-card">
            <img src="{{ url('frontend/assets/imgs/project-team/moumita.png') }}" alt="" class="img-fluid">
            <div class="des px-2 py-3">
              <h5 class="pb-2">Moumita Mahfuz</h5>
              <p>Project Coordinator </p>
            </div>
          </div>
        </div>
        <div class="member">
          <div class="card projects-card">
            <img src="{{ url('frontend/assets/imgs/project-team/alif.png') }}" alt="" class="img-fluid">
            <div class="des px-2 py-3">
              <h5 class="pb-2">Alif Azmeer</h5>
              <p>Jr. Project Maanager</p>
            </div>
          </div>
        </div>
        <div class="member">
          <div class="card projects-card">
            <img src="{{ url('frontend/assets/imgs/project-team/orchi.png') }}" alt="" class="img-fluid">
            <div class="des px-2 py-3">
              <h5 class="pb-2">Orchi Kuri</h5>
              <p>Digital Marketer</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Projects Team End -->

  <!-- Trainer -->
  <section class="pt-5">
    <div class="container">
      <h1 class="text-center pt-3 pb-4">Trainers</h1>
      <div class="trainer">
        <div class="">
          <div class="card tutor-card">
            <img src="{{ url('frontend/assets/imgs/trainers/partho.jpg') }}" alt="" class="img-fluid">
            <div class="des tutor-des">
              <h5 class="pb-2">Partha Chandra Sarker</h5>
              <p>Graphics Design</p>
            </div>
          </div>
        </div>
        <div class="">
          <div class="card tutor-card">
            <img src="{{ url('frontend/assets/imgs/trainers/nabid.jpg') }}" alt="" class="img-fluid">
            <div class="des tutor-des">
              <h5 class="pb-2">Naveed Khan Chowdhury</h5>
              <p>Photography</p>
            </div>
          </div>
        </div>
        <div class="">
          <div class="card tutor-card">
            <img src="{{ url('frontend/assets/imgs/trainers/suraya-daisy.jpg') }}" alt="" class="img-fluid">
            <div class="des tutor-des">
              <h5 class="pb-2">Suraya Daisy</h5>
              <p>Digital marketing</p>
            </div>
          </div>
        </div>
        <div class="">
          <div class="card tutor-card">
            <img src="{{ url('frontend/assets/imgs/trainers/syedun-nessa-oni.jpg') }}" alt="" class="img-fluid">
            <div class="des tutor-des">
              <h5 class="pb-2">Syedun Nessa Oni</h5>
              <p>Digital marketing</p>
            </div>
          </div>
        </div>
        <div class="">
          <div class="card tutor-card">
            <img src="{{ url('frontend/assets/imgs/trainers/azhar-raihan.jpg') }}" alt="" class="img-fluid">
            <div class="des tutor-des">
              <h5 class="pb-2">Azhar Raihan</h5>
              <p>Web Design & Developing</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Trainer End -->

  <!-- Students -->
  <section class="pt-5">
    <div class="container">
      <h1 class="text-center pt-3 pb-4">Students</h1>
      <div class="row">
        @foreach ($student_course as $course)
        @foreach ($course->courseusers as $item)
        <div class="col-lg-3 col-md-6 col-sm-6 col-12 load-col">
          <div class="card tutor-card">
            <img src="{{ url($item->image) }}" alt="" class="img-fluid">
            <div class="des tutor-des">
              <h5 class="pb-2 text-capitalize">{{ $item->fullname }}</h5>
              {{-- <div class="d-flex pt-2">
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
              </div> --}}
              <div class="d-flex pt-2 rating">
                <span>5</span>
                <span>/</span>
                <span>5</span>
                <span>-High Recommended</span>
              </div>
              {{-- <p>Graduated 1 Day Ago</p> --}}
              <a href="#" class="text-info">Read More</a>
            </div>
          </div>
        </div>
        @endforeach
        @endforeach
      </div>
      <div class="text-center">
        <div class="btn btn-warning text-light">Load  More</div>
      </div> 
    </div>
  </section>
  <!-- Students End -->


  
@endsection
@section('frontend-scripts')
<script>
  $(".load-col").slice(0, 12).show()
  $(".btn").on("click", function(){
      $(".load-col:hidden").slice(0,4).slideDown()
      if($(".load-col:hidden").length == 0){
      $(".btn").fadeOut('slow')
      }
  });
</script>
@endsection