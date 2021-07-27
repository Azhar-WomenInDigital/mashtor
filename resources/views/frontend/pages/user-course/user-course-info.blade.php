@extends('frontend.layouts.master')
@section('title',' | Course Details ')
@section('frontend-styles')
<style>
  .course-heading h1{
    text-align: center;
  }
  .card{
    box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);
    margin-bottom: 30px;
  }
  .des{
    padding: 20px;
    height: 180px;
  }
  .tutor-des{
    height: 120px;
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
  }
  @media only screen and (min-width: 320px) and (max-width: 576px) {
    .des {
      height: auto;
    }
    .des p{
      font-size: 14px;
    }
  }
</style>
    
@endsection
@section('frontend-content')
  <section>
    <div class="course-heading pt-sm-3 pt-md-4 pt-lg-5">
      <h1 class="pb-3">{{ $user_course_categories->user_course_category_name }}</h1>
      @if (auth()->user())
      <div class="row justify-content-center">
        <div class="col-md-6">
          <h4 class="pb-sm-3 pb-md-4">Please select one of the following courses</h4>
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
      </div>
      @else
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card" style="width: 100%;">
            <div class="card-body">
              @foreach ($user_course as $data)
              <h6 class="py-sm-2">{{ $data->user_course_name }}</h6>
              @endforeach
            </div>
          </div>
          <p class="text-warning pt-3">* If you want to do the course, please <a href="{{ url('register') }}" class="px-1">Sign Up</a>first</p>
        </div>
      </div>
      @endif
    </div>
  </section>
  
  <!-- Projects Team -->
  <section class="pt-5">
    <div class="container">
      <h1 class="text-center pt-3 pb-4">Project Team</h1>
      <div class="row justify-content-center">
        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
          <div class="card projects-card">
            <img src="{{ url('frontend/assets/imgs/project-team/achia.png') }}" alt="" class="img-fluid">
            <div class="des p-4">
              <h5 class="pb-2">Achia Khaleda Nila</h5>
              <p>CEO  and Founder</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
          <div class="card projects-card">
            <img src="{{ url('frontend/assets/imgs/project-team/farzana.png') }}" alt="" class="img-fluid">
            <div class="des p-4">
              <h5 class="pb-2">Farjana Ali</h5>
              <p>Project Manager</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
          <div class="card projects-card">
            <img src="{{ url('frontend/assets/imgs/project-team/moumita.png') }}" alt="" class="img-fluid">
            <div class="des p-4">
              <h5 class="pb-2">Moumita Mahfuz</h5>
              <p>Project Coordinator </p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
          <div class="card projects-card">
            <img src="{{ url('frontend/assets/imgs/project-team/alif.png') }}" alt="" class="img-fluid">
            <div class="des p-4">
              <h5 class="pb-2">Alif Azmeer</h5>
              <p>Jr. Project Maanager</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
          <div class="card projects-card">
            <img src="{{ url('frontend/assets/imgs/project-team/orchi.png') }}" alt="" class="img-fluid">
            <div class="des p-4">
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
      <div class="row justify-content-center">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card tutor-card">
            <img src="{{ url('frontend/assets/imgs/trainers/syedun-nessa-oni.jpg') }}" alt="" class="img-fluid">
            <div class="des tutor-des">
              <h5 class="pb-2">Syedun Nessa Oni</h5>
              <p>Digital marketing</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card tutor-card">
            <img src="{{ url('frontend/assets/imgs/trainers/suraya-daisy.jpg') }}" alt="" class="img-fluid">
            <div class="des tutor-des">
              <h5 class="pb-2">Suraya Daisy</h5>
              <p>Digital marketing</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card tutor-card">
            <img src="{{ url('frontend/assets/imgs/trainers/partho.jpg') }}" alt="" class="img-fluid">
            <div class="des tutor-des">
              <h5 class="pb-2">Partha Chandra Sarker</h5>
              <p>Graphics Design</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card tutor-card">
            <img src="{{ url('frontend/assets/imgs/trainers/nabid.jpg') }}" alt="" class="img-fluid">
            <div class="des tutor-des">
              <h5 class="pb-2">Naveed Khan Chowdhury</h5>
              <p>Photography</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
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

@endsection
@section('frontend-scripts')
@endsection