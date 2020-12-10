@extends('backend.layouts.master')
@section('page-title','Tutors')
@section('page-content')
<!-- Start content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Users</h4>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashoard</a></li>
                        <li class="breadcrumb-item active">users</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="table-rep-plugin">
                        <p> Username : {{$enrol->fullname}} </p>
                        <p> Email : {{$enrol->email}}</p>
                        <p> Course : {{$enrol->name}}</p>

                        <p> Course Fee : {{$enrol->price}}</p>
                        <p> Discount Code: {{$enrol->discount}}</p>
                        <p> Discount Percentage: 
                            <?php
                                $discountper = DB::table('discount_codes')->where('discount_code',$enrol->discount)->first();
if(isset($discountper->discount) && !empty($discountper->discount)){
                                echo $discountper->discount;

                            ?>
                        </p>
                        <p> Total Course Fee : <?php
                            $discount = $discountper->discount;
                            $coursefee = $enrol->price;
                            $totalprice = $coursefee*$discount/100;
                            echo $grandtotal = $coursefee-$totalprice;
                        } ?></p>
                        <p> Course Start At : {{$enrol->start_date}}</p>
                        <p> Course Duration : {{$enrol->duration}}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
        </div> <!-- container -->
        </div> <!-- content -->
        <script>
        function deleteconfirm()
        {
        deletedata = confirm("Are you sure to delete permanently?");
        if (deletedata != true)
        {
        return false;
        }
        }
        </script>
        @endsection

