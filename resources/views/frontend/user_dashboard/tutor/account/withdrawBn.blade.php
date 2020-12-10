@extends('frontend.layouts.dashboard_mastering')
@section('dashboard-title',' Dashboard ')
@section('frontend-content')
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <nav>
                        <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">

                            <a class="nav-item nav-link active" id="nav-payneer-tab" data-toggle="tab" href="#nav-payneer" role="tab" aria-controls="nav-payneer" aria-selected="true">
                                <img src="{{url('account/payoneer.png')}}" alt="" style="width: 80px;height:auto;display: inline-block;">
                            </a>

                            <a class="nav-item nav-link" id="nav-paypal-tab" data-toggle="tab" href="#nav-paypal" role="tab" aria-controls="nav-paypal" aria-selected="false">
                                 <img src="{{url('account/paypal.png')}}" alt="" style="width: 80px;height:auto;display: inline-block;">
                            </a>

                            <a class="nav-item nav-link" id="nav-stripe-tab" data-toggle="tab" href="#nav-stripe" role="tab" aria-controls="nav-stripe" aria-selected="false">
                                <img src="{{url('account/stripe.png')}}" alt="" style="width: 80px;height:auto;display: inline-block;">
                            </a>

                            <a class="nav-item nav-link" id="nav-skrill-tab" data-toggle="tab" href="#nav-skrill" role="tab" aria-controls="nav-skrill" aria-selected="false">
                                <img src="{{url('account/skrill.png')}}" alt="" style="width: 80px;height:auto;display: inline-block;">
                            </a>

                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">

                        <div class="tab-pane fade show active" id="nav-payneer" role="tabpanel" aria-labelledby="nav-payneer-tab">
                            <br><br>

                        <form action="" method="post">
                        
                            
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-4 col-form-label">Withdrawal amount</label>
                                <div class="col-sm-8">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">BDT</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <p class="text-center"> Linked to the  account</p>
                                <br>
                                <a href="#" class="btn btn-success custom-btn">Send the payment</a> <span><b>or <a href="#">Cancel</a></b></span>
                            </div>
                        
                    </form>
                    


                        </div>

                        <div class="tab-pane fade" id="nav-paypal" role="tabpanel" aria-labelledby="nav-paypal-tab">
                            <br><br>
                            <form action="" method="post">
                        
                            
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-4 col-form-label">Withdrawal amount</label>
                                <div class="col-sm-8">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">BDT</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <p class="text-center"> Linked to the i-pay account</p>
                                <br>
                                <a href="#" class="btn btn-success custom-btn">Send the payment</a> <span><b>or <a href="#">Cancel</a></b></span>
                            </div>
                        
                    </form>
                    
                        </div>

                        <div class="tab-pane fade" id="nav-stripe" role="tabpanel" aria-labelledby="nav-stripe-tab">
                            <br><br>
                            <form action="" method="post">
                        
                            
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-4 col-form-label">Withdrawal amount</label>
                                <div class="col-sm-8">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">BDT</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <p class="text-center"> Linked to the i-pay account</p>
                                <br>
                                <a href="#" class="btn btn-success custom-btn">Send the payment</a> <span><b>or <a href="#">Cancel</a></b></span>
                            </div>
                        
                    </form>
                        </div>

                        <div class="tab-pane fade" id="nav-skrill" role="tabpanel" aria-labelledby="nav-skrill-tab">
                            <br><br>
                            <form action="" method="post">
                        
                            
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-4 col-form-label">Withdrawal amount</label>
                                <div class="col-sm-8">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">BDT</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <p class="text-center"> Linked to the i-pay account</p>
                                <br>
                                <a href="#" class="btn btn-success custom-btn">Send the payment</a> <span><b>or <a href="#">Cancel</a></b></span>
                            </div>
                        
                    </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('frontend-scripts')
@endsection
@endsection