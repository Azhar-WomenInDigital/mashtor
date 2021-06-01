<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul>
                <li class="text-muted menu-title">Navigation</li>
                
                <li class="has_sub">
                    <a href="{{route('dashboard')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i><span> Dashboard </span> </a>
                </li>

                
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-user-o"></i> <span> Administration </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('admin/users')}}">Users</a></li>
                        
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-user-o"></i> <span> Users </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('admin/users/tutors')}}">Tutors</a></li>
                        <li><a href="{{url('admin/all/users')}}">All Users</a></li>
                        
                    </ul>
                </li>
            
            
                
                <li class="has_sub">
                    <a href="{{url('admin/mashtor/request')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i><span>Mashtor Request </span> </a>
                </li>

                
                


                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-widgets"></i> <span> Accounts </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('#')}}">Accounts</a></li>
                    </ul>
                </li>

                <!-- <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-widgets"></i> <span> Student Suggesion </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('admin/suggesion')}}">Suggesion List</a></li>
                    </ul>
                </li> -->

                <li class="has_sub">
                    <a href="{{url('admin/metarials')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i><span> Metarials </span> </a>
                </li>

                <li class="has_sub">
                    <a href="{{url('admin/courses')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i><span> Courses </span> </a>
                </li>

                <li class="has_sub">
                    <a href="{{url('admin/courseoutline')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i><span> Courses Outline</span> </a>
                </li>

<li class="has_sub">
                    <a href="{{url('admin/instructor')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i><span> Courses Instructor</span> </a>
                </li>

                <li class="has_sub">
                    <a href="{{url('admin/coursescategory')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i><span> Course Category </span> </a>
                </li>

                <li class="has_sub">
                    <a href="{{url('admin/enroll')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i><span>Enroll </span> </a>
                </li>

                 
                <li class="has_sub">
                    <a href="{{url('admin/discount-code')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i><span> Discount Code </span> </a>
                </li>

                <li class="has_sub">
                    <a href="{{url('admin/user-course-category')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i><span> User Course Category </span> </a>
                </li>

                <li class="has_sub">
                    <a href="{{url('admin/user-course')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i><span> User Course </span> </a>
                </li>
                
                
            </ul>
            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>
    </div>
</div>