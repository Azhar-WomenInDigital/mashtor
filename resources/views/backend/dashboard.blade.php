@extends('backend.layouts.master')
@section('page-title','Dashboard')
@section('page-content')
<div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="page-title-box">
                                    <h4 class="page-title float-left">Dashboard</h4>

                                    

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="card-box tilebox-one">
                                    <i class="icon-layers float-right text-muted"></i>
                                    <h6 class="text-muted text-uppercase m-b-20">Total Mashtor</h6>
                                    <h2 class="m-b-20" data-plugin="counterup"> {{$total_tutor}} </h2>
                                    
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-3">
                                <div class="card-box tilebox-one">
                                    <i class="icon-paypal float-right text-muted"></i>
                                    <h6 class="text-muted text-uppercase m-b-20">Today Enroll </h6>
                                    <h2 class="m-b-20"><span data-plugin="counterup">{{$todayenroll}}</span></h2>
                                    
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-3">
                                <div class="card-box tilebox-one">
                                    <i class="icon-paypal float-right text-muted"></i>
                                    <h6 class="text-muted text-uppercase m-b-20">Total Enroll </h6>
                                    <h2 class="m-b-20"><span data-plugin="counterup">{{$totalenroll}}</span></h2>
                                    
                                </div>
                            </div>

                            
                            
                            
                        </div>
                        <!-- end row -->
                    </div> <!-- container -->

                </div>
                @endsection