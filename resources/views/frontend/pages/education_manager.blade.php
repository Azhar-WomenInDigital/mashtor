@extends('frontend.layouts.master')
@section('front-page-title',' | Education Manager ')
@section('frontend-content')
        <!--Page Title-->
    <section class="page-title" style="background-image:url({{url('frontend/assets/imgs/about-header.png')}})">
      <div class="auto-container">
          <div class="sec-title">
                <h1>Education Manager</h1>
            </div>
        </div>
        <!--Down Arrow-->
        <div class="down-arrow scroll-to-target" data-target=".scroll-to-this"></div>
    </section>

    <section class="sales-section pb-5 pt-5">
        <div class="container">
                <h3 class="text-center text-white">Education Manager related text here..</h3>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="sales-form mt-5">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="fullname" class="font-weight-bold text-black">Full Name</label>
                                <input type="text" class="form-control custom-form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email" class="font-weight-bold text-black">Email</label>
                                <input type="text" class="form-control custom-form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="contact" class="font-weight-bold text-black">Student Name</label>
                                <input type="text" class="form-control custom-form-control" required> 
                            </div>


                            <div class="form-group">
                                <label for="contact" class="font-weight-bold text-black">Contact Number</label>
                                <input type="text" class="form-control custom-form-control" required> 
                            </div>

                            <div class="form-group">
                                <label for="contact" class="font-weight-bold text-black">Message</label>
                                <textarea name="" id="" cols="=10" rows="5" class="form-control custom-form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success custom-btn float-right">Send</button>
                            </div> 
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection