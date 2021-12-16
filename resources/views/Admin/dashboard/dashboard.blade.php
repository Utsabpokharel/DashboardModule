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
                <div class="col-md-6 col-lg-6 col-xl-3" style="margin-right: 2%;">
                    {{-- <div class="mini-stat widget-chart-sm clearfix bg-white border border-danger">
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
                    </div> --}}
                    <div class="number-card number-card-content">
                        <div class="row">
                            <div class="col">
                                <h1 class="number-card-number"><span>{{$user}}</span></h1>
                                <div><a class="number-card-dollars" href={{route('users.index')}}>Total Users</a></div>
                            </div>
                            <div class="col-right">
                                <div class="number-card-progress-wrapper">
                                    <div class="number-card-progress"><i class="fa fa-users" id="card-icons"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endcan
                </div>
                @can('role-list')
                <div class="col-md-6 col-lg-6 col-xl-3">
                    {{-- <div class="mini-stat widget-chart-sm clearfix bg-white border border-warning">
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
                    </div> --}}
                    <div class="number-card number-card-content">
                        <div class="row">
                            <div class="col">
                                <h1 class="number-card-number"><span>{{$role}}</span></h1>
                                <div><a class="number-card-dollars" href={{route('roles.index')}}>Total Roles</a></div>
                            </div>
                            <div class="col-right">
                                <div class="number-card-progress-wrapper">
                                    <div class="number-card-progress"><i class="fa fa-user-circle" id="card-icons"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endcan
            </div>
            <!-- end row -->
            <div class="row">
                <?php
                    $dataPoints1 = array(
                    	array("label"=> "Education", "y"=> 284935),
                    	array("label"=> "Entertainment", "y"=> 256548),
                    	array("label"=> "Lifestyle", "y"=> 245214),
                    	array("label"=> "Business", "y"=> 233464),
                    	array("label"=> "Music & Audio", "y"=> 200285),
                    	array("label"=> "Personalization", "y"=> 194422),
                    	array("label"=> "Tools", "y"=> 180337),
                    	array("label"=> "Books & Reference", "y"=> 172340),
                    	array("label"=> "Travel & Local", "y"=> 118187),
                    	array("label"=> "Puzzle", "y"=> 107530),
                    );
                ?>

                <div id="chartContainer" style="height: 420px; width: 60%;"></div>


                <div id="pieContainer" style="height: 370px; width: 100%;"></div>

            </div>
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
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script>
        window.onload = function () {
                        var chart = new CanvasJS.Chart("chartContainer", {
                        	animationEnabled: true,
                        	theme: "light2", // "light1", "light2", "dark1", "dark2"
                        	title: {
                        		text: "Top 10 Google Play Categories - till 2017"
                        	},
                        	axisY: {
                        		title: "Number of Apps"
                        	},
                        	data: [{
                        		type: "column",
                        		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
                        	}]
                        });
                        chart.render();
                        }
    //
    </script>
    @endsection
