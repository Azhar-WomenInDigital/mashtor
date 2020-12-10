@extends('frontend.layouts.dashboard_mastering')
@section('franchise-dashboard-title',' Dashboard ')
@section('frontend-styles')

<link rel="stylesheet" href="{{url('frontend/assets/css/fullcalendar.min.css')}}">
<script src="https://static.opentok.com/v2/js/opentok.min.js"></script>

    <!-- Polyfill for fetch API so that we can fetch the sessionId and token in IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@7/dist/polyfill.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fetch/2.0.3/fetch.min.js" charset="utf-8"></script>
@endsection
@section('frontend-content')
<div class="container-fluid mt-5 mb-5">
    <br><br><br>
      <?php
        $current_date =  date("Y-m-d"); 
        $current_hour  = date('H');
        $current_minute = date('i');
        $current_amOrpm = date('A');

                    $connect_user = DB::table('booking_sessions')
                    ->where('sutdent_id',Auth::user()->id)
                    ->where('session_accept',1)
                    ->first();

                    if(isset($connect_user)){
                      
                        
                    
                  ?>
    <div class="row">
      <div class="col-md-8">
        <iframe src="https://www.webwhiteboard.com/board/2kahmbvv" style="height: 600px;width: 100%;"></iframe>
      </div>
        <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <!-- <h5 class="text-center">Check that your vedio is working </h5> -->
                    <br>
                  <iframe
                  src="https://tokbox.com/embed/embed/ot-embed.js?embedId=8b604420-4715-4fe0-b405-360fb007978d&room=DEFAULT_ROOM&iframe=true"
                  width=100%
                  height=440px
                  allow="microphone; camera"
                ></iframe>
    
                
              </div>
            </div>
        </div>
    </div>
    <?php
                     }else{
      echo "you have no session " ;
    }
    ?>
    
</div>
<br>
<br>
@section('frontend-scripts')
<script src="https://static.opentok.com/v2/js/opentok.min.js"></script>
<!-- <script src="{{url('frontend/vedio/config.js')}}"></script>
<script src="{{url('frontend/vedio/app.js')}}"></script> -->

@endsection
@endsection