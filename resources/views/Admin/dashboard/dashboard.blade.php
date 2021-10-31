@extends('Admin.layouts.master')

@section('css')
<!--Morris Chart CSS -->
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/morris/morris.css') }}">
@endsection

@section('breadcrumb')
<h3 class="page-title">Dashboard </h1>
    @endsection

    @section('content')
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                @can('user-list')
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="mini-stat widget-chart-sm clearfix bg-white border border-danger">
                        <span class="peity-donut float-left"
                            data-peity='{ "fill": ["#3bc3e9", "#f2f2f2"], "innerRadius": 23, "radius": 32 }'
                            data-width="60" data-height="60"></span>
                        <div class="mini-stat-info text-right">
                            <span class="counter text-info text-center">{{$user}}</span>
                            <div class="text-center">
                                <a href={{route('users.index')}}>Total Users</a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    @endcan
                </div>
                @can('role-list')
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="mini-stat widget-chart-sm clearfix bg-white border border-warning">
                        <span class="peity-donut float-left"
                            data-peity='{ "fill": ["#3bc3e9", "#f2f2f2"], "innerRadius": 23, "radius": 32 }'
                            data-width="60" data-height="60"></span>
                        <div class="mini-stat-info text-right">
                            <span class="counter text-info text-center">{{$role}}</span>
                            <div class="text-center">
                                <a href={{route('roles.index')}}>Total Roles</a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                @endcan
            </div>
            <!-- end row -->
        </div><!-- container -->
    </div> <!-- Page content Wrapper -->

    @endsection

    @section('script')
    <!-- Peity chart JS -->
    <script src="{{ URL::asset('assets/plugins/peity-chart/jquery.peity.min.js') }}"></script>
    <!--Morris Chart-->
    <script src="{{ URL::asset('assets/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/raphael/raphael-min.js') }}"></script>
    <!-- Page specific js -->
    <script src="{{ URL::asset('assets/pages/dashborad-2.js') }}"></script>
    @endsection
