@extends('frontend.layouts.master')
@section('front-page-title',' | Became a Teacher ')
@section('frontend-style')
@endsection
@section('frontend-content')
<br>
<br>
<section class="become-teacher pt-5 pb-5 bg-off-white">
    <div class="container">
        
        <div class="=">
            
            <div class="row">
                <div class="col-12">
                    <form action="{{url('search')}}" method="post">
                                @csrf
                    <div class="search-box bg-pink px-5">
                        <br>
                        <h2 class="wid-text-red wid-c-font-1">Search Mashtor</h2> <br>
                        <div class="input-group mb-3">
                            
                            <input type="text" class="form-control" placeholder="Search Mashtor" aria-label="Recipient's username" aria-describedby="button-addon2" name="q">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary wid-bg-red" type="submit" id="button-addon">Search</button>
                            </div>
                           
                        </div> <br><br>
                    </div>
                    <br>
                     </form>
                    <br>
                </div>
            </div>
            <section class="bg-faded">
                <div class="row py-3 flex-items-sm-center">
                    <!--
                    User Card
                    -->
                    <?php
                        if(isset($tutors) && !empty($tutors)){
                            foreach($tutors as $tutor){
                        
                    ?>
                    <div class="col-xs-12 col-sm-3 py-2 clearfix">
                        <a href="{{url('teacher/tutor-details',$tutor->user_id)}}" style="text-decoration: none;">
                            <div class="card profile-card">
                                <figure>
                                    <!-- <input id="fab" type="checkbox" class="fab"><label for="fab" class="toggle">+</label> -->
                                    <?php echo "<img src='".asset($tutor->image)."' class='img-fluid img-profile' alt='Card image'>";?>
                                </figure>
                                <div class="card-block text-center">
                                    <p class="h4 card-title font-weight-bold">{{$tutor->fullname}}</p>
                                    <p class="h6 card-subtitle text-muted">{{$tutor->profile_tag}}</p><br>
                                </div>
                                <div class="card-footer">
                                    <span class="float-left number2">{{$tutor->price}} Tk/Per hour</span>
                                    <span class="float-right">Hire</span>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php }}?>
                </div>
            </section>
        </div>
        
    </section>
    @section('frontend-scripts')
    <script>
    </script>
    @endsection
    @endsection