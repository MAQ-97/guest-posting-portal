<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('backend/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{strtoupper(Auth::user()->name) }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>User</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('users.index')}}"><i class="fa fa-circle-o"></i> All User</a></li>
                    <li><a href="{{route('users.create')}}"><i class="fa fa-circle-o"></i> Add User</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-key"></i> <span>Roles</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class=""><a href="{{ route('roles.index')}}"><i class="fa fa-circle-o"></i> All Roles</a></li>
                    <li><a href="{{route('roles.create')}}"><i class="fa fa-circle-o"></i> Add Role</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-key"></i> <span>Permissions</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class=""><a href="{{route('permissions.index')}}"><i class="fa fa-circle-o"></i> All Permissions</a></li>
                    <li><a href="{{route('permissions.create')}}"><i class="fa fa-circle-o"></i> Add Permission</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-font"></i><span>Keywords</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class=""><a href="{{route('keywords.index')}}"><i class="fa fa-circle-o"></i> All Keywords</a></li>
                    <li><a href="{{route('keywords.create')}}"><i class="fa fa-circle-o"></i> Add keyword</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-industry"></i><span>Industries</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class=""><a href="{{route('industry.index')}}"><i class="fa fa-circle-o"></i> All Industries</a></li>
                    <li><a href="{{route('industry.create')}}"><i class="fa fa-circle-o"></i> Add Industry</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-sticky-note-o"></i><span>Blogs</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class=""><a href="{{route('blogs.index')}}"><i class="fa fa-circle-o"></i> All Blogs</a></li>
                    <li><a href="{{route('blogs.create')}}"><i class="fa fa-circle-o"></i> Add Blog</a></li>
                </ul>
            </li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cart"></i><span>Orders</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class=""><a href="{{route('orders.index')}}"><i class="fa fa-circle-o"></i> All Orders</a></li>
{{--                    <li><a href="{{route('orders.create')}}"><i class="fa fa-circle-o"></i> Add keyword</a></li>--}}
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
