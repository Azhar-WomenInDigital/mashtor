<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Mashtor.com">
    <meta name="description" content="e-learning platform Bangaldesh">
    <meta name="keywords" content="e-learning platform bd,web design courses,bangladesh web development training center,hmlt,css,js,php,laravel,Basic Computer,Graphics ">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta name="revisit-after" content=" days">
    <meta name="author" content="Women In Digital">
    <meta name="keywords" content="Mashtor.com">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="all">
    <title>Mashtor.com @yield('title')</title>
    <!-- Bootstrap Core CSS -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{url('frontend/favicon-32x32.png')}}">
    <link rel="stylesheet" href="{{url('frontend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/assets/css/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{url('frontend/assets/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/assets/css/datepicker.min.css')}}">
    <!-- Icons/Glyphs -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.1/css/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{url('frontend/assets/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/assets/css/page.css')}}">
    <link rel="stylesheet" href="{{url('frontend/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{url('frontend/assets/css/responsive.css')}}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Barlow:200,300,300i,400,400i,500,500i,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    @yield('frontend-styles')
    
  </head>
  <body class="cnt-home " id="app">
    <header class="">
      <nav class="navbar navbar-expand-lg navbar-light" id="navbar" style="background:#FFB317;">
        <div class="container-fluid">
          <a class="navbar-brand mashtor-logo" href="{{url('/')}}">
            <img src="{{url('frontend/assets/imgs/WID TECH School.png')}}" alt="" class="img-fluid logo">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon" style="">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item {{ request()->is('/') ? 'active' : '' }}  navig-link">
                <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item dropdown  navig-link">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">   
                 Program
                </a>
                <div class="dropdown-menu custom-dropdown" aria-labelledby="navbarDropdown">
                  <?php
                    $courseCategory = DB::table('course_categories')->get();
                    foreach($courseCategory as $cat){
                  ?>
                  <a class="dropdown-item" href="{{url('courses',$cat->id)}}">{{$cat->name}}</a>
                  <?php
                  } 
                  ?>
                  <!-- <a class="dropdown-item" href="{{url('languages/courses')}}">Language Courses</a>
                  <a class="dropdown-item" href="{{url('professinal/courses')}}">Professinal Traning Courses</a> -->                
                </div>
              </li>

<li class="nav-item dropdown  navig-link">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">   
                 Projects 
                </a>
                <div class="dropdown-menu custom-dropdown" aria-labelledby="navbarDropdown">
                  <?php
                    $user_course_categories = DB::table('user_course_categories')->get();
                    if (isset($user_course_categories) && !empty($user_course_categories)) {
                    foreach ($user_course_categories as  $user_course_category) {
                    ?>
                    <a class="dropdown-item" href="{{ url('user-course-category', $user_course_category->id) }}">{{$user_course_category->user_course_category_name}}</a>
                    <?php
                    }
                  } 
                  ?>
                </div>
              </li>




            
              <li class="nav-item {{ request()->is('/teacher/find-tutor') ? 'active' : '' }}  navig-link">
                <a class="nav-link"  href="{{url('teacher/find-tutor')}}">Find Mashtor</a>
              </li>
              <li class="nav-item {{ request()->is('/live-class') ? 'active' : '' }}  navig-link">
                <a class="nav-link"  href="{{url('live-class')}}">Demo <span class="pulse"></span></a>
              </li>
              <li class="nav-item {{ request()->is('/mashtor-alumni') ? 'active' : '' }}  navig-link">
                <a class="nav-link"  href="{{url('mashtor-alumni')}}">Alumni</a>
              </li>
              <li class="nav-item {{ request()->is('/teacher/become-a-teacher') ? 'active' : '' }}  navig-link">
                <a class="nav-link btn btn-dark text-white" href="{{url('/teacher/become-a-teacher')}}">Become  a mashtor</a>
              </li>
              <!-- <li class="nav-item {{ request()->is('/live-chat') ? 'active' : '' }}">
                <a class="nav-link" href="{{url('/live-chat')}}">Live Chat</a>
              </li> -->
              <!-- <li class="nav-item {{ request()->is('about') ? 'active' : '' }}">
                <a class="nav-link" href="{{url('#')}}">Study Material</a>
              </li> -->
              @auth
              <li class="nav-item dropdown  navig-link">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <?php echo"<img src='".asset(Auth::user()->image)."' alt='sdfd' style='height: 30px;width: 30px;border-radius: 100%;object-fit: cover;object-position: center center;'>"; ?> {{Auth::user()->fullname}}
                </a>
                <div class="dropdown-menu custom-dropdown" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{url('user/dashboard')}}">Dashboard</a>
                  <a class="dropdown-item" href="{{url('live-chat')}}">Message</a>
                  <a class="dropdown-item" href="{{url('notification')}}">Notifications</a>
                  <a class="dropdown-item" href="#">Purchase History</a>
                  <a class="dropdown-item" href="{{url('help')}}">Help</a>
                  <a class="dropdown-item" href="{{url('logout')}}">Log Out</a>
                </div>
              </li>
              @else
              <li class="nav-item {{ request()->is('login') ? 'active' : '' }}  navig-link">
                <a class="nav-link text-success-custom" href="{{url('login')}}">Log in</a>
              </li>
              <li class="nav-item  navig-link">
                <a class="nav-link text-success-custom" href="#">|</a>
              </li>
              <li class="nav-item {{ request()->is('user-type') ? 'active' : '' }}  navig-link">
                <a class="nav-link text-success-custom" href="{{url('register')}}">Sign up</a>
              </li>
              @endauth
            </ul>
          </div>
        </div>
      </nav>
    </header>
    @yield('frontend-content')
 
    <br>
      <div class="flex social-btns">
        <a class="app-btn blu flex vert" href="https://www.apple.com/app-store/" target="_blank" style="text-decoration: none;">
            <i class="fab fa-apple"></i>
            <p>Available on the <br/> <span class="big-txt">App Store</span></p>
        </a>
        <a class="app-btn blu flex vert" href="https://play.google.com/store/apps"  target="_blank" style="text-decoration: none;">
            <i class="fab fa-google-play"></i>
            <p>Get it on <br/> <span class="big-txt">Google Play</span></p>
        </a>
      </div>
      <br>



      <footer class="pt-4 pb-2">
        <div class="footer">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <p class="copy-right"> &copy Copyright Women in Digital - <?php echo date('Y'); ?></p>
            </div>
            <div class="col-md-6">
              <ul class="float-right social-icon">
                <li><a href="#"><i class="fab fa-facebook-f footer-icon facebook"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter footer-icon twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram footer-icon instagram"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin-in footer-icon linkedin"></i></a></li>
                <li><a href="#"><i class="fab fa-google-plus-g footer-icon google-plus"></i></a></li>
              </ul>
            </div>
          </div>
          </div>
        </div>
      </footer>
                <!-- <div class="alert alert-warning alert-dismissible fade show fixed-bottom" style="margin:0px;" role="alert">
  <strong>Notice</strong> This site is  Development mood.You have face any problem or issu or bug please <a href="#" target="_blank">contact us</a>.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div> -->
<script src="https://js.pusher.com/5.0/pusher.min.js"></script>
        <!-- JavaScripts placed at the end of the document so the pages load faster -->
        <script src="{{url('frontend/assets/js/jquery-3.4.1.min.js')}}"></script>
        <script src="{{url('frontend/assets/js/popper.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<!-- <script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script> -->

        <script src="{{url('frontend/assets/js/bootstrap.min.js')}}"></script>
        <script src="{{url('frontend/assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{url('frontend/assets/js/select2.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.1/js/bootstrap-datepicker.js"></script>
        <script src="{{url('frontend/assets/js/datepicker.min.js')}}"></script>
        <script src="{{url('frontend/assets/js/main.js')}}"></script>
          
      <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://cdnjs.com/libraries/Chart.js"></script>
      <script>
    var receiver_id = '';
    var my_id = "{{ Auth::id() }}";
    $(document).ready(function () {
        // ajax setup form csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('57ce91fc4ad95a2d776b', {
            cluster: 'ap2',
            forceTLS: true
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function (data) {
            // alert(JSON.stringify(data));
            if (my_id == data.from) {
                $('#' + data.to).click();
            } else if (my_id == data.to) {
                if (receiver_id == data.from) {
                    // if receiver is selected, reload the selected user ...
                    $('#' + data.from).click();
                } else {
                    // if receiver is not seleted, add notification for that user
                    var pending = parseInt($('#' + data.from).find('.pending').html());

                    if (pending) {
                        $('#' + data.from).find('.pending').html(pending + 1);
                    } else {
                        $('#' + data.from).append('<span class="pending">1</span>');
                    }
                }
            }
        });
        getLiveMsg();
        function getLiveMsg(){
          $('.user').click(function () {
              $('.user').removeClass('active');
              $(this).addClass('active');
              $(this).find('.pending').remove();

              receiver_id = $(this).attr('id');
              $.ajax({
                  type: "get",
                  url: "livechatmessage/" + receiver_id, // need to create this route
                  data: "",
                  cache: false,
                  success: function (data) {
                      $('#messages').html(data);
                      scrollToBottomFunc();
                  }
              });
          });
        }

        $(document).on('keyup', '.input-text input', function (e) {
            var message = $(this).val();

            // check if enter key is pressed and message is not null also receiver is selected
            if (e.keyCode == 13 && message != '' && receiver_id != '') {
                $(this).val(''); // while pressed enter text box will be empty

                var datastr = "receiver_id=" + receiver_id + "&message=" + message;
                $.ajax({
                    type: "post",
                    url: "message", // need to create this post route
                    data: datastr,
                    cache: false,
                    success: function (data) {
                      getLiveMsg();
                    },
                    error: function (jqXHR, status, err) {
                    },
                    complete: function () {
                        scrollToBottomFunc();
                    }
                })
            }
        });
    });

    // make a function to scroll down auto
    function scrollToBottomFunc() {
        $('.message-wrapper').animate({
            scrollTop: $('.message-wrapper').get(0).scrollHeight
        }, 50);
    }
  </script>
        <script>




        $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
        $('#years').datepicker({
        format      :   "YYYY",
        viewMode    :   "years",
        });
        
        });
        </script>
        <script>
        $(document).ready(function() {
  var date = new Date();
  var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
  var end = new Date(date.getFullYear(), date.getMonth(), date.getDate());

  $('#datepicker1').datepicker({
format: "mm/dd/yyyy",
todayHighlight: true,
startDate: today,
endDate: end,
autoclose: true
  });
  $('#datepicker2').datepicker({
format: "mm/dd/yyyy",
todayHighlight: true,
startDate: today,
endDate: end,
autoclose: true
  });

  $('#datepicker1,#datepicker2').datepicker('setDate', today);
});
        $("#datepicker").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years"
});

        $('.play-icon').click(function () {
    var video = '<iframe allowfullscreen src="' + $(this).attr('data-video') + '"></iframe>';
    $(this).replaceWith(video);
  });

  $('.play-icon').mousemove(function (e) {
    var parentOffset = $(this).offset();
    var relX = e.pageX - parentOffset.left;
    var relY = e.pageY - parentOffset.top;
    $(".play-button").css({ left: relX, top: relY});
  });
  $('.play-icon').mouseout(function() {
    $(".play-button").css({ left: '50%', top: '50%'});
  });

  $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});


  $(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});
        </script>


 <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0&appId=889132938152872&autoLogAppEvents=1"></script>
        @yield('frontend-scripts')


      </body>
    </html>