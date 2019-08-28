@extends('master')
@section('content')
{{--        <style>--}}
{{--            myPieChart {--}}
{{--                -moz-user-select: none;--}}
{{--                -webkit-user-select: none;--}}
{{--                -ms-user-select: none;--}}
{{--            }--}}
{{--        </style>--}}



{{--    <div class="col-lg-4">--}}
{{--        <div class="card mb-3">--}}
{{--            <div class="card-header">--}}
{{--                <i class="fas fa-chart-pie"></i>--}}
{{--                Gender</div>--}}
{{--            <div class="card-body">--}}
{{--                <canvas id="myPieChart" width="100%" height="112.5"></canvas>--}}




{{--            <script>--}}
{{--                var ctx = document.getElementById('myPieChart');--}}
{{--                new Chart(ctx, chartdata);--}}
{{--                var chartdata = {--}}
{{--                    type: 'pie',--}}
{{--                    data: {--}}
{{--                        labels: <?php echo json_encode($Months); ?>,--}}
{{--                        responsive: true,--}}

{{--                        datasets: [--}}
{{--                            {--}}
{{--                                label: 'this year',--}}
{{--                                backgroundColor: ['#007bff', '#dc3545'],--}}
{{--                                borderWidth: 1,--}}
{{--                                data: <?php echo json_encode($Data); ?>--}}
{{--                            }],--}}
{{--                    },--}}
{{--                };--}}

{{--            </script>--}}
{{--            </div>--}}
{{--            <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->--}}
{{--        </div>--}}
{{--    </div>--}}






<!doctype html>
<html>
<head>
    <title>Bar Chart</title>
    <script src="http://www.chartjs.org/dist/2.7.3/Chart.bundle.js"></script>
    <script src="http://www.chartjs.org/samples/latest/utils.js"></script>
{{--    <style>--}}
{{--        /*canvas {*/--}}
{{--        /*    -moz-user-select: none;*/--}}
{{--        /*    -webkit-user-select: none;*/--}}
{{--        /*    -ms-user-select: none;*/--}}
{{--        /*}*/--}}
{{--    </style>--}}
</head>
<body>
{{--<div id="container" style="width: 75%;">--}}
{{--    <canvas id="canvas"></canvas>--}}
{{--</div>--}}


    <div class="col-lg-4">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-chart-pie"></i>
                Gender</div>
            <div class="card-body">
                <canvas id="canvas" width="100%" height="112.5"></canvas>

<script>
    var chartdata = {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($Months); ?>,
            // labels: month,
            datasets: [
                {
                    label: 'this year',
                    backgroundColor: ['#007bff', '#dc3545'],
                    borderWidth: 1,
                    data: <?php echo json_encode($Data); ?>
                }
            ]
        },

    }
    var ctx = document.getElementById('canvas').getContext('2d');
    new Chart(ctx, chartdata);
</script>
</body>
</html>

@endsection

@section('dashboard-footer')
    <script src="{{URL::to('js/demo/chart-area-demo.js')}}"></script>
    <script src="{{URL::to('js/demo/chart-bar-demo.js')}}"></script>
    <script src="{{URL::to('js/demo/chart-pie-demo.js')}}"></script>
{{--    <script src="http://www.chartjs.org/dist/2.7.3/Chart.bundle.js"></script>--}}
{{--    <script src="http://www.chartjs.org/samples/latest/utils.js"></script>--}}
@endsection

