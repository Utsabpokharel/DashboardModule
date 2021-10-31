<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="">
            <a href="{{ route('dashboard') }}" class="logo text-center"><img
                    src="{{ URL::asset('assets/images/small/img-2.jpg') }}" width="180" alt="logo"></a>
        </div>
    </div>
    <div class="sidebar-inner slimscrollleft">
        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">Main </li>
                <li class="">
                    <a href="{{route('dashboard')}}" class="waves-effect"><i class="mdi mdi-view-dashboard"></i>
                        <span>
                            Dashboard</span> </a>
                </li>
                @can('role-list')
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-user-circle"></i><span> Roles
                            <span class="pull-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="list-unstyled">
                        @can('role-list')
                        <li><a href="{{ route('roles.index') }}">View Roles</a></li>
                        @endcan
                        @can('role-create')
                        <li><a href="{{ route('roles.create') }}">Add Roles</a></li>
                        @endcan
                    </ul>
                </li>
                @endcan
                @can('user-list')
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-users"></i><span> Users
                            <span class="pull-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="list-unstyled">
                        @can('user-list')
                        <li><a href="{{ route('users.index') }}">View Users</a></li>
                        @endcan
                        @can('user-create')
                        <li><a href="{{ route('users.create') }}">Add Users</a></li>
                        @endcan
                    </ul>
                </li>
                @endcan
                <li class="menu-title">Settings</li>
                <li>
                    <a href="{{route('password.index')}}" class="waves-effect"><i class="mdi mdi-help-circle"></i><span>
                            Change Password
                        </span></a>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
<!-- Left Sidebar End -->
