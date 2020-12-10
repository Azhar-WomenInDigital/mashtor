@extends('frontend.layouts.master')
@section('front-page-title',' | About ')
@section('frontend-content')
<?php
$courseee = DB::table('courses')->where('id',Session::get('enrole.course_id'))->first();
// print_r($course);
// die();
?>
<br>
<br>
<section class="course-section-detials position-relative pb-5 pt-5">
    <div class="container">
        <h1 class="display-4 text-center  wid-text-red">Order Summary</h1> <br><br>
        <div class="section-content">
            
            <div class="row">
                <div class="col-md-6 ">
                    <h3 class="wid-text-red">Course Details</h3> <br>
                    <h5>Course name : <?php if(isset($course->course_title) && !empty($course->course_title)){ ?>{{$course->course_title}} <?php }else{ echo $course->name; } ?></h5>
                    
                    <h5>Total Amount :<?php if(isset($course->course_fee) && !empty($course->course_title)){ ?>{{$course->course_fee}} <?php }else{ echo $course->price;} ?><b></b></h5>
                    <h5>Class Start: <?php if(isset($course->course_start) && !empty($course->course_title)){ ?>{{$course->course_start}} <?php }else{ echo $course->start_date; } ?></h5>
                    <br><br>
                    <div class="user-details">
                        <h3 class="wid-text-red pb-3">User Details</h3>
                        <p>{{Auth::user()->fullname}}</p>
                        <p>{{Auth::user()->email}}</p>
                        <p>{{Auth::user()->number}}</p>
                    </div><br><br>
                    <a href="#" class="text-danger"> <i class="fas fa-exclamation-triangle"></i> Privancy</a>
                    <a href="#" class="text-danger"><i class="fas fa-exclamation-triangle"></i> Terms and Condition</a>
                </div>
                <div class="col-md-6 text-left" style="padding: 0;">
                    <h3 class="wid-text-red">Checkout </h3> <br>

                    <h5>Underconstruktion Please Contact  </h5>
                    <h2 class="text-danger">+8801635497868</h2>
                    <br>
                    <a href="{{url('invoice')}}" class="btn btn-danger">Invoice</a>
                    <div class="row">
                        <div class="col-md-8 justify-content-center" id="paypal-btn" style="padding: 0;">
                            <!-- <form class="w3-container w3-display-middle w3-card-4 " method="POST" id="payment-form"  action="/payment/add-funds/paypal">
                                {{ csrf_field() }}
                                <h2 class="w3-text-blue">Payment Form</h2>
                                <p>Demo PayPal form - Integrating paypal in laravel</p>
                                <p>
                                    <label class="w3-text-blue"><b>Enter Amount</b></label>
                                    <input class="w3-input w3-border" name="amount" type="text"></p>
                                <button class="w3-btn w3-blue">Pay with PayPal</button>
                            </form> -->
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