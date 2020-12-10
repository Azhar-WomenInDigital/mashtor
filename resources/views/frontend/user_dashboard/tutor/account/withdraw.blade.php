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

                            <a class="nav-item nav-link active" id="nav-ipay-tab" data-toggle="tab" href="#nav-ipay" role="tab" aria-controls="nav-ipay" aria-selected="true">i-Pay</a>

                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">XYZ</a>

                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">XYZ</a>

                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">

                        <div class="tab-pane fade show active" id="nav-ipay" role="tabpanel" aria-labelledby="nav-ipay-tab">
                            <br><br>

                        <div class="media">
                          <img src="{{url('account/withdraw.png')}}" class="mr-3" alt="..." style="width: 20%;height: auto;">
                          <div class="media-body">
                            <h5 class="mt-0">Withdraw earnings easily with ..</h5>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. <br><br>
                            <a href="{{url('tutor/withdraw/ipay')}}" class="btn btn-success custom-btn">Create an  i-Pay account</a>
                          </div>
                        </div>


                        </div>

                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>

                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('frontend-scripts')
@endsection
@endsection