@extends('frontend.layouts.master')
@section('front-page-title',' | Metarials ')
@section('frontend-content')
<section class="single-metairials p-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{$metarials->title}}</h2> <br>
                <p>{{$metarials->sub_title}}</p>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{url('presentation')}}" class="text-info font-weight-bold"> Workshop slides </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection