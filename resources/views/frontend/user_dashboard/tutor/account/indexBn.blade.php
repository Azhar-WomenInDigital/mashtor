@extends('frontend.layouts.dashboard_mastering')
@section('dashboard-title',' Dashboard ')
@section('frontend-content')
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <p class="text-muted text-center">You have earned</p> <br>
                    <h5 class="card-title text-center"> <i class="fas fa-wallet"></i> <span class=""> 0.00 BDT</span> </h5>
                    <br>
                    <div class="account-btn text-center">
                        <a href="{{url('tutor/withdraw/money/bn')}}" class="btn btn-success custom-btn">Withdraw Money</a> <br><br>
                        <a href="#" class=""> <i class="far fa-file-excel"></i> Export history</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('frontend-scripts')
@endsection
@endsection