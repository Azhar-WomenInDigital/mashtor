@extends('frontend.layouts.dashboard_mastering')
@section('dashboard-title',' Dashboard | Account | i-Pay')
@section('frontend-content')
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center">i-Pay</h3> <br>
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
@section('frontend-scripts')
@endsection
@endsection