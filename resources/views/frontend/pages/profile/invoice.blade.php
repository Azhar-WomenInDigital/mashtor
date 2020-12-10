@extends('frontend.layouts.master')
@section('front-page-title',' | Invoice ')
@section('frontend-content')
<style>
    .invoice-title h2, .invoice-title h3 {
    display: inline-block;
    }

    .table > tbody > tr > .no-line {
        border-top: none;
    }

    .table > thead > tr > .no-line {
        border-bottom: none;
    }

    .table > tbody > tr > .thick-line {
        border-top: 2px solid;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="invoice-title">
                <h2>Invoice</h2><h3 class="pull-right">Order Id # hxs1234567</h3>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <address>
                    <strong>Billed To:</strong><br>
                            Jeenal Yatishkumar Bhatt<br>
                                jbhatt@healthxapp.com
                    </address>
                </div>
                <div class="col-md-6 text-right">
                    <address>
                    <strong>Shipped To:</strong><br>
                    D/36, Block-E Zakir Hossain Road <br> Lalmatia, Mohammadpur <br> Dhaka 1207
                       
                        
                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <address>
                        <strong>Payment Method:</strong><br>
                        <br>
                    
                    </address>
                </div>
                <div class="col-md-6 text-right">
                    <address>
                        <strong>Order Date:</strong><br>
                        March 7th, 2018<br><br>
                    </address>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Order summary</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Medication</strong></td>
                                    <td class="text-center"><strong>Strength</strong></td>
                                    <td class="text-center"><strong>Quantity</strong></td>
                                    <td class="text-right"><strong>Price</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                <tr>
                                    <td>Crosin</td>
                                    <td class="text-center">100 mg</td>
                                    <td class="text-center">10</td>
                                    <td class="text-right">30 INR</td>
                                </tr>
                                <tr>
                                    <td>Paracetamol</td>
                                    <td class="text-center">20 mg</td>
                                    <td class="text-center">3</td>
                                    <td class="text-right">50 INR</td>
                                </tr>
                                <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                    <td class="thick-line text-right">80 INR</td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Shipping</strong></td>
                                    <td class="no-line text-right">15 INR</td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Total</strong></td>
                                    <td class="no-line text-right">95 INR</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('frontend-scripts')
<!-- <script src="https://www.paypal.com/sdk/js?client-id=sb"></script> -->
<!-- <script>paypal.Buttons().render('#paypal-btn');</script> -->
@endsection