<!-- Top Bar Start -->
<div class="topbar">

    <nav class="navbar-custom">
        <!-- Search input -->
        <div class="search-wrap" id="search-wrap">
            <div class="search-bar">
                <input class="search-input" type="search" placeholder="Search" />
                <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                    <i class="mdi mdi-close-circle"></i>
                </a>
            </div>
        </div>

        <ul class="list-inline float-right mb-0">
            <!-- Search -->
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link waves-effect toggle-search" href="#" data-target="#search-wrap">
                    <i class="mdi mdi-magnify noti-icon"></i>
                </a>
            </li>
            <!-- Fullscreen -->
            <li class="list-inline-item dropdown notification-list hidden-xs-down">
                <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                    <i class="mdi mdi-fullscreen noti-icon"></i>
                </a>
            </li>

            <!-- notification-->
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="ion-ios7-bell noti-icon"></i>
                    <span
                        class="badge badge-danger noti-icon-badge">{{count(auth()->user()->unreadNotifications)}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5>Notification ({{count(auth()->user()->unreadNotifications)}})</h5>
                    </div>
                    <!-- item-->

                    @foreach(auth()->user()->unreadNotifications as $notification )
                    @if($notification->type=='App\Notifications\NewUserNotify')
                    <a href="{{route('Usermarkasread')}}" class="dropdown-item notify-item active">
                        <div class="notify-icon bg-success"><i class="fa fa-user"></i></div>
                        <p class="notify-details"><b>New User Created</b><small
                                class="text-muted">{{$notification->data['thread']['added_to']}} is created
                                by
                                {{$notification->data['thread']['added_by']}} <br>
                                <i class="pull-right">{{$notification->created_at}}</i></small>
                        </p>

                    </a>
                    @endif
                    @endforeach

                    <!-- All-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        View All
                    </a>
                </div>
            </li>
            <!-- User-->
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    Hello, {{Auth::user()->name}}
                    {{-- @if (Auth::user()->user_image ==[])
                    <img src="{{asset('assets/images/users/profile.png')}}" alt="image" width="100px">
                    @else
                    <img src="{{asset('Uploads/Admin/Image/'.$user->user_image)}}" alt="image" width="150px">
                    @endif --}}
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    {{-- <a class="dropdown-item" href="#"><i class="dripicons-user text-muted"></i> Profile</a> --}}
                    {{-- Role :- {{Auth::user()->roles}} --}}
                    <a class="dropdown-item" href="{{route('password.index')}}"><i
                            class="dripicons-gear text-muted"></i> Settings</a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"><i class="dripicons-exit text-muted"></i>
                        Logout</a>
                </div>
            </li>
        </ul>
        <!-- Page title -->
        <ul class="list-inline menu-left mb-0">
            <li class="list-inline-item">
                <button type="button" class="button-menu-mobile open-left waves-effect">
                    <i class="ion-navicon"></i>
                </button>
            </li>
            <li class="hide-phone list-inline-item app-search">
                @yield('breadcrumb')
            </li>
        </ul>
        <div class="clearfix"></div>
    </nav>
</div>
<!-- Top Bar End -->
