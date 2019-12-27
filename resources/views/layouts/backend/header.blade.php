
<style>
.fa.fa-shopping-cart{
    position: absolute;
    right: 0px;
    top: 0px;
    padding: 9px 12px 7px 10px;
    background: red;
    height: 100%;
    font-size: 130%;
}
.add-to-cart{
    transition: 0.4s;
    color: #fff;
    background-color: #303030;
    text-transform: uppercase;
    position: relative;
    padding-right: 52px
}
</style>

<header class="main-header">


    <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
{{--                <li class="dropdown messages-menu">--}}
{{--                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
{{--                        <i class="fa fa-envelope-o"></i>--}}
{{--                        <span class="label label-success">4</span>--}}
{{--                    </a>--}}
{{--                    <ul class="dropdown-menu">--}}
{{--                        <li class="header">You have 4 messages</li>--}}
{{--                        <li>--}}
{{--                            <!-- inner menu: contains the actual data -->--}}
{{--                            <ul class="menu">--}}
{{--                                <li><!-- start message -->--}}
{{--                                    <a href="#">--}}
{{--                                        <div class="pull-left">--}}
{{--                                            <img src="{{asset('backend/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">--}}
{{--                                        </div>--}}
{{--                                        <h4>--}}
{{--                                            Support Team--}}
{{--                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>--}}
{{--                                        </h4>--}}
{{--                                        <p>Why not buy a new awesome theme?</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <!-- end message -->--}}
{{--                                <li>--}}
{{--                                    <a href="#">--}}
{{--                                        <div class="pull-left">--}}
{{--                                            <img src="{{asset('backend/img/user3-128x128.jpg')}}" class="img-circle" alt="User Image">--}}
{{--                                        </div>--}}
{{--                                        <h4>--}}
{{--                                            AdminLTE Design Team--}}
{{--                                            <small><i class="fa fa-clock-o"></i> 2 hours</small>--}}
{{--                                        </h4>--}}
{{--                                        <p>Why not buy a new awesome theme?</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">--}}
{{--                                        <div class="pull-left">--}}
{{--                                            <img src="{{asset('backend/img/user4-128x128.jpg') }}" class="img-circle" alt="User Image">--}}
{{--                                        </div>--}}
{{--                                        <h4>--}}
{{--                                            Developers--}}
{{--                                            <small><i class="fa fa-clock-o"></i> Today</small>--}}
{{--                                        </h4>--}}
{{--                                        <p>Why not buy a new awesome theme?</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">--}}
{{--                                        <div class="pull-left">--}}
{{--                                            <img src="{{asset('backend/img/user3-128x128.jpg') }}" class="img-circle" alt="User Image">--}}
{{--                                        </div>--}}
{{--                                        <h4>--}}
{{--                                            Sales Department--}}
{{--                                            <small><i class="fa fa-clock-o"></i> Yesterday</small>--}}
{{--                                        </h4>--}}
{{--                                        <p>Why not buy a new awesome theme?</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">--}}
{{--                                        <div class="pull-left">--}}
{{--                                            <img src="{{asset('backend/img/user4-128x128.jpg') }}" class="img-circle" alt="User Image">--}}
{{--                                        </div>--}}
{{--                                        <h4>--}}
{{--                                            Reviewers--}}
{{--                                            <small><i class="fa fa-clock-o"></i> 2 days</small>--}}
{{--                                        </h4>--}}
{{--                                        <p>Why not buy a new awesome theme?</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="footer"><a href="#">See All Messages</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <!-- Notifications: style can be found in dropdown.less -->--}}
{{--                <li class="dropdown notifications-menu">--}}
{{--                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
{{--                        <i class="fa fa-bell-o"></i>--}}
{{--                        <span class="label label-warning">10</span>--}}
{{--                    </a>--}}
{{--                    <ul class="dropdown-menu">--}}
{{--                        <li class="header">You have 10 notifications</li>--}}
{{--                        <li>--}}
{{--                            <!-- inner menu: contains the actual data -->--}}
{{--                            <ul class="menu">--}}
{{--                                <li>--}}
{{--                                    <a href="#">--}}
{{--                                        <i class="fa fa-users text-aqua"></i> 5 new members joined today--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">--}}
{{--                                        <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the--}}
{{--                                        page and may cause design problems--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">--}}
{{--                                        <i class="fa fa-users text-red"></i> 5 new members joined--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">--}}
{{--                                        <i class="fa fa-shopping-cart text-green"></i> 25 sales made--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">--}}
{{--                                        <i class="fa fa-user text-red"></i> You changed your username--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="footer"><a href="#">View all</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <!-- Tasks: style can be found in dropdown.less -->--}}
{{--                <li class="dropdown tasks-menu">--}}
{{--                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
{{--                        <i class="fa fa-flag-o"></i>--}}
{{--                        <span class="label label-danger">9</span>--}}
{{--                    </a>--}}
{{--                    <ul class="dropdown-menu">--}}
{{--                        <li class="header">You have 9 tasks</li>--}}
{{--                        <li>--}}
{{--                            <!-- inner menu: contains the actual data -->--}}
{{--                            <ul class="menu">--}}
{{--                                <li><!-- Task item -->--}}
{{--                                    <a href="#">--}}
{{--                                        <h3>--}}
{{--                                            Design some buttons--}}
{{--                                            <small class="pull-right">20%</small>--}}
{{--                                        </h3>--}}
{{--                                        <div class="progress xs">--}}
{{--                                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"--}}
{{--                                                 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">--}}
{{--                                                <span class="sr-only">20% Complete</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <!-- end task item -->--}}
{{--                                <li><!-- Task item -->--}}
{{--                                    <a href="#">--}}
{{--                                        <h3>--}}
{{--                                            Create a nice theme--}}
{{--                                            <small class="pull-right">40%</small>--}}
{{--                                        </h3>--}}
{{--                                        <div class="progress xs">--}}
{{--                                            <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"--}}
{{--                                                 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">--}}
{{--                                                <span class="sr-only">40% Complete</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <!-- end task item -->--}}
{{--                                <li><!-- Task item -->--}}
{{--                                    <a href="#">--}}
{{--                                        <h3>--}}
{{--                                            Some task I need to do--}}
{{--                                            <small class="pull-right">60%</small>--}}
{{--                                        </h3>--}}
{{--                                        <div class="progress xs">--}}
{{--                                            <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"--}}
{{--                                                 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">--}}
{{--                                                <span class="sr-only">60% Complete</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <!-- end task item -->--}}
{{--                                <li><!-- Task item -->--}}
{{--                                    <a href="#">--}}
{{--                                        <h3>--}}
{{--                                            Make beautiful transitions--}}
{{--                                            <small class="pull-right">80%</small>--}}
{{--                                        </h3>--}}
{{--                                        <div class="progress xs">--}}
{{--                                            <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"--}}
{{--                                                 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">--}}
{{--                                                <span class="sr-only">80% Complete</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <!-- end task item -->--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="footer">--}}
{{--                            <a href="#">View all tasks</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

                <!-- User Account: style can be found in dropdown.less -->

                @hasrole('admin')

                @else
                    <li style="margin-top:10px">
                        {{-- <form method="post" enctype="multipart/form-data" action="{{route('blog.cart')}}" >
                        {{ csrf_field() }} --}}
                        <input type="hidden" name="url" class="on-load-url" value="{{url('/blogs/add_to_cart_update')}}"/>
                        <a href="{{route('blog.cart')}}"  class="add-to-cart" >
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="cart-detail"> </span> item(s)
                        </a>
                        {{-- </form> --}}
                    </li>
                @endrole



                <li class="dropdown user user-menu">
                </h1>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{asset('backend/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{strtoupper(Auth::user()->name) }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{asset('backend/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

                            <p class="custom-user-header">
                                 {{ ucfirst(Auth::user()->name)  }}
                                <small>Member since {{ \Carbon\Carbon::parse(Auth::user()->created_at)->format(' F. Y') }}</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        {{--                        <li class="user-body">--}}
                        {{--                            <div class="row">--}}
                        {{--                                <div class="col-xs-4 text-center">--}}
                        {{--                                    <a href="#">Followers</a>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="col-xs-4 text-center">--}}
                        {{--                                    <a href="#">Sales</a>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="col-xs-4 text-center">--}}
                        {{--                                    <a href="#">Friends</a>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
{{--                            <div class="pull-left">--}}
{{--                                <a href="#" class="btn btn-default btn-flat">Profile</a>--}}
{{--                            </div>--}}
                            <div class="pull-right">
                            <a  class="btn btn-default btn-flat" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>

                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
{{--                <li>--}}
{{--                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>--}}
{{--                </li>--}}
            </ul>
        </div>
    </nav>
</header>
