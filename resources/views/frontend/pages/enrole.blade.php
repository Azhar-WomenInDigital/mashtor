@extends('frontend.layouts.master')
@section('front-page-title',' | About ')
@section('frontend-content')
<?php
    $courseee = DB::table('courses')->where('id',Session::get('enrole.course_id'))->first();
    // print_r($course);
    // die();
    
?>
<section class="course-section-detials bg-pink position-relative pb-5 pt-5">
    <div class="container">
        <div class="section-content">
            <div class="t">
                <div class="tc">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <h1 class="display-4">Order Summary</h1> <br>
                            <h5>Course name : <?php if(isset($course->course_title) && !empty($course->course_title)){ ?>{{$course->course_title}} <?php }else{ echo $course->name; } ?></h5> <br>
                            <br><br>
                            <h3>Total Amount :<?php if(isset($course->course_fee) && !empty($course->course_title)){ ?>{{$course->course_fee}} <?php } ?><b></b></h3>
                            <h5>Class Start: <?php if(isset($course->course_start) && !empty($course->course_title)){ ?>{{$course->course_start}} <?php } ?></h5>
                            <br><br>
                            <div class="user-details">
                                <p>{{Auth::user()->fullname}}</p>
                                <p>{{Auth::user()->email}}</p>
                                <p>{{Auth::user()->number}}</p>
                            </div><br><br>
                            <a href="#" class="text-danger"> <i class="fas fa-exclamation-triangle"></i> Privancy</a>
                            <a href="#" class="text-danger"><i class="fas fa-exclamation-triangle"></i> Terms and Condition</a>
                        </div>
                        <div class="col-md-6 text-left" style="padding: 0;">
                            <h3>Checkout</h3> <br>
                            <div class="row">
                                <div class="col-md-8 justify-content-center" id="paypal-btn" style="padding: 0;">
                                    <form class="w3-container w3-display-middle w3-card-4 " method="POST" id="payment-form"  action="/payment/add-funds/paypal">
  {{ csrf_field() }}
  <h2 class="w3-text-blue">Payment Form</h2>
  <p>Demo PayPal form - Integrating paypal in laravel</p>
  <p>      
  <label class="w3-text-blue"><b>Enter Amount</b></label>
  <input class="w3-input w3-border" name="amount" type="text"></p>      
  <button class="w3-btn w3-blue">Pay with PayPal</button></p>
</form>
                                     <!-- <div id="paypal-button-container"></div> -->
                                   <!--  <form class="was-validated">
                                        <div class="mb-3">
                                            
                                            <input type="text" class="form-control wid-border-radius-none p-3 is-invalid" placeholder="Name on Card" required>
                                        </div>
                                        <div class="mb-3">
                                            
                                            <input type="text" class="form-control wid-border-radius-none p-3 is-invalid" placeholder="Card Number" required>
                                        </div>
                                        
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <input type="text" class="form-control wid-border-radius-none p-3 is-valid" id="" placeholder="MM/YY"  required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <input type="text" class="form-control wid-border-radius-none p-3 is-valid" id="" placeholder="Security Code"  required>
                                            </div>
                                        </div>
                                        
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <input type="text" class="form-control wid-border-radius-none p-3 is-valid" id="" placeholder="Country"  required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <input type="text" class="form-control wid-border-radius-none p-3 is-valid" id="" placeholder="Zip/Postal Code"  required>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                         <a class="btn font-weight-bold wid-bg-red p-2 wid-bg-red-hover wid-border-radius-none wid-font-22 wid-button wid-sm-font-18" href="{{url('enrole')}}">Complete Payment
                                        </a><br><br>
                                        </div>
                                    </form> -->
                                  
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('frontend-scripts')
<!-- <script src="https://www.paypal.com/sdk/js?client-id=sb"></script> -->
<!-- <script>paypal.Buttons().render('#paypal-btn');</script> -->
@endsection