@extends('frontend.layouts.dashboard_mastering')
@section('franchise-dashboard-title',' Dashboard ')
@section('frontend-styles')
<link rel="stylesheet" href="{{url('frontend/assets/css/fullcalendar.min.css')}}">
@endsection
@section('frontend-content')
<div class="container mt-5 mb-5">
    <br><br><br>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <a class="btn btn-danger custom-btn" href="{{url('start/vedio/chat')}}">Click here to start session</a>
        </div>
    </div>
    
    
</div>
<br>
<br>
@section('frontend-scripts')
<script src="{{url('frontend/assets/js/jquery-ui.min.js')}}"></script>
<script src="{{url('frontend/assets/js/moment.js')}}"></script>
<script src="{{url('frontend/assets/js/fullcalendar.min.js')}}"></script>
<script src="{{url('frontend/assets/js/jquery.fullcalendar.js')}}"></script>
@endsection
@endsection