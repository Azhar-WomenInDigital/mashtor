
<!--Page Title-->
<div class="section  bg-off-white pb-5 pt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        
                    
                <div class="sidebar border-1">
                    <div class="sidebar-header text-center">
                        <?php echo"<img src='".asset(Auth::user()->image)."' alt='sdfd' style='height: 100px;width: 100px;border-radius: 100%;object-fit: cover;object-position: center center;' class='profile-pic'>"; ?>
                        <h5>{{Auth::user()->fullname}}</h5>
                    </div>
                    <br>
                    
                    <div class="nav flex-column nav-pills custom-nav-text" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link  {{ request()->is('user/dashboard') ? 'active' : '' }}" id="" href="{{url('user/dashboard')}}">Dashboard</a>
                        <a class="nav-link {{ request()->is('user-course-info') ? 'active' : '' }}" id="" href="{{url('user-course-info')}}">Course Info</a>
                        <a class="nav-link  {{ request()->is('user/class') ? 'active' : '' }}" id="" href="{{url('user/class')}}">Live Class Active</a>

                        <a class="nav-link {{ request()->is('profile') ? 'active' : '' }}" id="" href="{{url('profile')}}">Profile</a>
                        <a class="nav-link {{ request()->is('notification') ? 'active' : '' }}" id="" href="{{url('notification')}}">Notifications</a>
                        
                        <a class="nav-link  {{ request()->is('profile/account') ? 'active' : '' }}" id="" href="{{url('profile/account')}}">Setting</a>
                        <a class="nav-link {{ request()->is('help') ? 'active' : '' }}" id="" href="{{url('help')}}">Help</a>
                        <a class="nav-link {{ request()->is('profile/delete/account') ? 'active' : '' }}" id="" href="{{url('profile/delete/account')}}">Close Account</a>
                    </div>
                </div>
                </div>
                </div>
            </div>
           

