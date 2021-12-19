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
                <div class="col-md-6 col-lg-6 col-xl-3" style="margin-right: 1%;">
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
 
    $dataPoints = array(
	array("label"=> "Jan", "y"=> array(4, 8)),
	array("label"=> "Feb", "y"=> array(3, 8)),
	array("label"=> "Mar", "y"=> array(5, 11)),
	array("label"=> "Apr", "y"=> array(8, 18)),
	array("label"=> "May", "y"=> array(12, 20)),
	array("label"=> "Jun", "y"=> array(17, 26)),
	array("label"=> "Jul", "y"=> array(19, 28)),
	array("label"=> "Aug", "y"=> array(19, 28)),
	array("label"=> "Sep", "y"=> array(16, 25)),
	array("label"=> "Oct", "y"=> array(12, 19)),
	array("label"=> "Nov", "y"=> array(9, 14)),
	array("label"=> "Dec", "y"=> array(6, 10))
    );
	
   ?>

                <div id="chartContainer" style="height: 420px; width: 60%; margin-left: 14px;"></div>

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
	//theme: "light2",
	title: {
		text: "Temperature Variation of Istanbul Over a Year"
	},
	axisY: {
		title: "Temperature (in °C)"
	},
	toolTip: {
		shared: true
	},
	legend: {
		dockInsidePlotArea: true,
		cursor: "pointer",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "rangeArea",
		markerSize: 0,
		name: "Temperature Range",
		showInLegend: true,
		toolTipContent: "{label}<br><span style=\"color:#6D77AC\">{name}</span><br>Min: {y[1]} °C<br>Max: {y[0]} °C",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
addAverages();
 
function addAverages() {
	var dps = [];
	for(var i = 0; i < chart.options.data[0].dataPoints.length; i++) {
		dps.push({
			label: chart.options.data[0].dataPoints[i].label,
			y: (chart.options.data[0].dataPoints[i].y[0] + chart.options.data[0].dataPoints[i].y[1]) / 2
		});
	}
	chart.options.data.push({
		type: "line",
		name: "Average",
		showInLegend: true,
		markerType: "triangle",
		markerSize: 0,
		yValueFormatString: "##.0 °C",
		dataPoints: dps
	});
	chart.render();
}
 
function toggleDataSeries(e) {
	if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	} else {
		e.dataSeries.visible = true;
	}
	e.chart.render();
}
 
}
</script>
    @endsection
