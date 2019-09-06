@extends('master')

@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>

    <!-- Icon Cards-->
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-comments"></i>
                    </div>
                    <div class="mr-5">New CV</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-list"></i>
                    </div>
                    <div class="mr-5">No of downloads </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                 asdf
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-shopping-cart"></i>
                    </div>
                    <div class="mr-5">Looking for job</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-life-ring"></i>
                    </div>
                    <div class="mr-5">13 New Tickets!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                </a>
            </div>
        </div>
    </div>


{{--    <div class="row">--}}
{{--        <div class="col-lg-8">--}}
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-bar"></i>
                    Age Distribution
                </div>
                <div class="card-body">
                    <canvas id="myBarChart" width="100%" height="50"></canvas>


                </div>

                <script>

                    var chartdata = {
                        type: 'bar',
                        data: {
                            labels:<?php echo json_encode($AgeArray); ?>,
                            responsive: true,

                            datasets: [
                                {
                                    // label: 'Range',
                                    label:<?php echo json_encode($AgeArray); ?> ,
                                    backgroundColor: ['#1C9CDB', '#42f5f2','#384747','#6d6b7d','#3c31b0','#871433','#2f8ca3'],
                                    borderWidth: 1,
                                    data: <?php echo json_encode($AgeData); ?>
                                }
                            ],
                        },

                        options: {
                                tooltips: {
                                    callbacks: {
                                        label: function(tooltipItem, data) {
                                            var dataset = data.datasets[tooltipItem.datasetIndex];
                                            var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
                                                return previousValue + currentValue;
                                            });
                                            var currentValue = dataset.data[tooltipItem.index];
                                            var precentage = Math.floor(((currentValue/total) * 100)+0.5);
                                            return precentage + "%";
                                        }
                                    }
                                },
                            scales: {
                                xAxes: [{
                                    time: {
                                        unit: 'Age'
                                    },
                                    gridLines: {
                                        display: false
                                    },
                                    ticks: {
                                        maxTicksLimit: 100
                                    }
                                }],
                                yAxes: [{
                                    stacked: true,
                                    ticks: {
                                        min: 0,
                                        max: <?php echo json_encode($MaxCount)?>,
                                        maxTicksLimit: 5
                                    },
                                    gridLines: {
                                        display: true
                                    }
                                }],
                            },
                            legend: {
                                display: false
                            }
                        }
                    };
                    var ctx = document.getElementById('myBarChart');
                    new Chart(ctx, chartdata);

                </script>
                <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
            </div>


{{--        </div>--}}
{{--    </div>--}}





{{--    <div class="row">--}}
{{--        <div class="col-lg-8">--}}
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-bar"></i>
                    Industry Distribution
                </div>
                <div class="card-body">
                    <canvas id="myBarChart1" width="100%" height="50"></canvas>


                </div>

                <script>

                    var chartdata = {
                        type: 'horizontalBar',
                        data: {
                            labels: <?php echo json_encode($jobCat);?>,

                            responsive: true,

                            datasets: [
                                {
                                    label: 'Total Candidate',

                                    backgroundColor: ['#1C9CDB', '#dc3545','#36464a','#598f75','#571313','#34f7f4','#0a2606','#dfe2eb','#231f20','#1C9CD8',
                                        '#2E8F83','',''],
                                    borderWidth: 3  ,
                                    data:<?php echo json_encode($jobCatCount); ?>


                                }
                            ],
                        },
                        options: {
                            // tooltips: {
                            //     callbacks: {
                            //         label: function(tooltipItem, data) {
                            //             var dataset = data.datasets[tooltipItem.datasetIndex];
                            //             var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
                            //                 return previousValue + currentValue;
                            //             });
                            //             var currentValue = dataset.data[tooltipItem.index];
                            //             var precentage = Math.floor(((currentValue/total) * 100)+0.5);
                            //             return precentage + "%";
                            //         }
                            //     }
                            // },
                            scales: {
                                xAxes: [{
                                    stacked: true,
                                    time: {
                                        unit: 'Age'
                                    },
                                    gridLines: {
                                        display: false
                                    },
                                    ticks: {
                                        maxTicksLimit: 5
                                    }
                                }],
                                yAxes: [{
                                    // stacked: true,
                                    ticks: {
                                        min: 0,
                                        max: 10 ,
                                        maxTicksLimit: 50
                                    },
                                    gridLines: {
                                        display: true
                                    }
                                }],
                            },
                            legend: {
                                display:false
                            }
                        }

                    };
                    var ctx = document.getElementById('myBarChart1');
                    new Chart(ctx, chartdata);

                </script>

            </div>


    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-pie"></i>
                    Gender
                </div>
                <div class="card-body">
                    <canvas id="myPieChart" width="100%" height="112.5"></canvas>
                </div>


                <script>

                    var chartdata = {
                        type: 'pie',
                        data: {
                            labels: <?php echo json_encode($Gender); ?>,
                            responsive: true,

                            datasets: [
                                {
                                    label: 'Total',
                                    backgroundColor: ['#1C9CDB', '#dc3545','#1C9CDB'],
                                    borderWidth: 1,
                                    data: <?php echo json_encode($GenderCount); ?>
                                }],
                        },
                        options: {
                            tooltips: {
                                callbacks: {
                                    label: function (tooltipItem, data) {
                                        var dataset = data.datasets[tooltipItem.datasetIndex];
                                        var total = dataset.data.reduce(function (previousValue, currentValue, currentIndex, array) {
                                            return previousValue + currentValue;
                                        });
                                        var currentValue = dataset.data[tooltipItem.index];
                                        var precentage = Math.floor(((currentValue / total) * 100) + 0.5);
                                        return precentage + "%";
                                    }
                                }
                            }
                        }

                    };
                    var ctx = document.getElementById('myPieChart');
                    new Chart(ctx, chartdata);

                </script>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-pie"></i>
                    Level of Job
                </div>
                <div class="card-body">
                    <canvas id="myPieChart1" width="100%" height="112.5"></canvas>
                </div>
                <script>
                    var chartdata={
                      type: 'doughnut',
                      data: {
                        // labels: ["Blue", "Red", "Yellow", "Green","white","black"],
                          labels: <?php echo json_encode($JobLevel)?>,


                        responsive: true,
                        datasets:[{
                          // data: [12.21, 15.58, 11.25, 8.32,4.5,7.8],
                          data: <?php echo json_encode($JobLevelCount)?>,
                          backgroundColor: ['#2BDC8C', '#DC2CD2'],
                        }],
                      },
                        options: {
                            tooltips: {
                                callbacks: {
                                    label: function (tooltipItem, data) {
                                        var dataset = data.datasets[tooltipItem.datasetIndex];
                                        var total = dataset.data.reduce(function (previousValue, currentValue, currentIndex, array) {
                                            return previousValue + currentValue;
                                        });
                                        var currentValue = dataset.data[tooltipItem.index];
                                        var precentage = Math.floor(((currentValue / total) * 100) + 0.5);
                                        return precentage + "%";
                                    }
                                }
                            }
                        }
                     }
                    var ctx = document.getElementById("myPieChart1");
                    new Chart(ctx, chartdata);
                    </script>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-pie"></i>
               Interested in Job
                </div>
                <div class="card-body">
                    <canvas id="myPieChart2" width="100%" height="112.5"></canvas>
                </div>


                <script>

                    var chartdata = {
                        type: 'doughnut',
                        data: {
                            labels: <?php echo json_encode($LookingFor); ?>,
                            responsive: true,

                            datasets: [
                                {
                                    label: 'Total',
                                    backgroundColor: ['#007bff', '#dc3545'],
                                    borderWidth: 1,
                                    data: <?php echo json_encode($InterestedCandidateCount); ?>
                                }],
                        },
                        options: {
                            tooltips: {
                                // callbacks: {
                                //     label: function (tooltipItem, data) {
                                //         var dataset = data.datasets[tooltipItem.datasetIndex];
                                //         var total = dataset.data.reduce(function (previousValue, currentValue, currentIndex, array) {
                                //             return previousValue + currentValue;
                                //         });
                                //         var currentValue = dataset.data[tooltipItem.index];
                                //         var precentage = Math.floor(((currentValue / total) * 100) + 0.5);
                                //         return precentage + "%";
                                //     }
                                // }
                            }
                        }

                    };
                    var ctx = document.getElementById('myPieChart2');
                    new Chart(ctx, chartdata);

                </script>
            </div>
        </div>


    </div>




        @endsection

        @section('dashboard-footer')
            <script src="{{URL::to('js/demo/chart-area-demo.js')}}"></script>
            <script src="{{URL::to('js/demo/chart-bar-demo.js')}}"></script>
            <script src="{{URL::to('js/demo/chart-pie-demo.js')}}"></script>

@endsection



{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}

{{--<head>--}}

{{--    <meta charset="utf-8">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">--}}
{{--    <meta name="description" content="">--}}
{{--    <meta name="author" content="">--}}

{{--    <title>SB Admin - Dashboard</title>--}}

{{--    <!-- Custom fonts for this template-->--}}

{{--    <link href="{{URL::to('/vendors/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">--}}

{{--    <!-- Page level plugin CSS-->--}}

{{--    <link href="{{URL::to('vendors/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">--}}

{{--    <!-- Custom styles for this template-->--}}
{{--    <script src="{{URL::to('js/sb-admin.min.js')}}"></script>--}}
{{--    <link href="{{URL::to('css/sb-admin.css')}}" rel="stylesheet" >--}}


{{--</head>--}}

{{--<body id="page-top">--}}

{{--<nav class="navbar navbar-expand navbar-dark bg-dark static-top">--}}

{{--    <a class="navbar-brand mr-1" href="index.html">Start Bootstrap</a>--}}

{{--    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">--}}
{{--        <i class="fas fa-bars"></i>--}}
{{--    </button>--}}

{{--    <!-- Navbar Search -->--}}

{{--    <!-- Navbar -->--}}

{{--</nav>--}}

{{--<div id="wrapper">--}}

{{--    <!-- Sidebar -->--}}
{{--    <ul class="sidebar navbar-nav">--}}
{{--        <li class="nav-item active">--}}
{{--            <a class="nav-link" href="index.html">--}}
{{--                <i class="fas fa-fw fa-tachometer-alt"></i>--}}
{{--                <span>Dashboard</span>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="charts.html">--}}
{{--                <i class="fas fa-fw fa-chart-area"></i>--}}
{{--                <span>Charts</span></a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="tables.html">--}}
{{--                <i class="fas fa-fw fa-table"></i>--}}
{{--                <span>Tables</span></a>--}}
{{--        </li>--}}
{{--    </ul>--}}

{{--    <div id="content-wrapper">--}}

{{--        <div class="container-fluid">--}}

{{--            <!-- Breadcrumbs-->--}}
{{--            <ol class="breadcrumb">--}}
{{--                <li class="breadcrumb-item">--}}
{{--                    <a href="#">Dashboard</a>--}}
{{--                </li>--}}
{{--                <li class="breadcrumb-item active">Overview</li>--}}
{{--            </ol>--}}

{{--            <!-- Icon Cards-->--}}
{{--            <div class="row">--}}
{{--                <div class="col-xl-3 col-sm-6 mb-3">--}}
{{--                    <div class="card text-white bg-primary o-hidden h-100">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="card-body-icon">--}}
{{--                                <i class="fas fa-fw fa-comments"></i>--}}
{{--                            </div>--}}
{{--                            <div class="mr-5">26 New Messages!</div>--}}
{{--                        </div>--}}
{{--                        <a class="card-footer text-white clearfix small z-1" href="#">--}}
{{--                            <span class="float-left">View Details</span>--}}
{{--                            <span class="float-right">--}}
{{--                  <i class="fas fa-angle-right"></i>--}}
{{--                </span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-3 col-sm-6 mb-3">--}}
{{--                    <div class="card text-white bg-warning o-hidden h-100">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="card-body-icon">--}}
{{--                                <i class="fas fa-fw fa-list"></i>--}}
{{--                            </div>--}}
{{--                            <div class="mr-5">11 New Tasks!</div>--}}
{{--                        </div>--}}
{{--                        <a class="card-footer text-white clearfix small z-1" href="#">--}}
{{--                            <span class="float-left">View Details</span>--}}
{{--                            <span class="float-right">--}}
{{--                  <i class="fas fa-angle-right"></i>--}}
{{--                </span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-3 col-sm-6 mb-3">--}}
{{--                    <div class="card text-white bg-success o-hidden h-100">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="card-body-icon">--}}
{{--                                <i class="fas fa-fw fa-shopping-cart"></i>--}}
{{--                            </div>--}}
{{--                            <div class="mr-5">123 New Orders!</div>--}}
{{--                        </div>--}}
{{--                        <a class="card-footer text-white clearfix small z-1" href="#">--}}
{{--                            <span class="float-left">View Details</span>--}}
{{--                            <span class="float-right">--}}
{{--                  <i class="fas fa-angle-right"></i>--}}
{{--                </span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-3 col-sm-6 mb-3">--}}
{{--                    <div class="card text-white bg-danger o-hidden h-100">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="card-body-icon">--}}
{{--                                <i class="fas fa-fw fa-life-ring"></i>--}}
{{--                            </div>--}}
{{--                            <div class="mr-5">13 New Tickets!</div>--}}
{{--                        </div>--}}
{{--                        <a class="card-footer text-white clearfix small z-1" href="#">--}}
{{--                            <span class="float-left">View Details</span>--}}
{{--                            <span class="float-right">--}}
{{--                  <i class="fas fa-angle-right"></i>--}}
{{--                </span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Area Chart Example-->--}}
{{--            <div class="card mb-3">--}}
{{--                <div class="card-header">--}}
{{--                    <i class="fas fa-chart-area"></i>--}}
{{--                    Area Chart Example</div>--}}
{{--                <div class="card-body">--}}
{{--                    <canvas id="myAreaChart" width="100%" height="30"></canvas>--}}
{{--                </div>--}}
{{--                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>--}}
{{--            </div>--}}

{{--            <!-- DataTables Example -->--}}
{{--            <div class="card mb-3">--}}
{{--                <div class="card-header">--}}
{{--                    <i class="fas fa-table"></i>--}}
{{--                    Data Table Example</div>--}}
{{--                <div class="card-body">--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>Name</th>--}}
{{--                                <th>Position</th>--}}
{{--                                <th>Office</th>--}}
{{--                                <th>Age</th>--}}
{{--                                <th>Start date</th>--}}
{{--                                <th>Salary</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tfoot>--}}
{{--                            <tr>--}}
{{--                                <th>Name</th>--}}
{{--                                <th>Position</th>--}}
{{--                                <th>Office</th>--}}
{{--                                <th>Age</th>--}}
{{--                                <th>Start date</th>--}}
{{--                                <th>Salary</th>--}}
{{--                            </tr>--}}
{{--                            </tfoot>--}}
{{--                            <tbody>--}}
{{--                            <tr>--}}
{{--                                <td>Tiger Nixon</td>--}}
{{--                                <td>System Architect</td>--}}
{{--                                <td>Edinburgh</td>--}}
{{--                                <td>61</td>--}}
{{--                                <td>2011/04/25</td>--}}
{{--                                <td>$320,800</td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Garrett Winters</td>--}}
{{--                                <td>Accountant</td>--}}
{{--                                <td>Tokyo</td>--}}
{{--                                <td>63</td>--}}
{{--                                <td>2011/07/25</td>--}}
{{--                                <td>$170,750</td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Ashton Cox</td>--}}
{{--                                <td>Junior Technical Author</td>--}}
{{--                                <td>San Francisco</td>--}}
{{--                                <td>66</td>--}}
{{--                                <td>2009/01/12</td>--}}
{{--                                <td>$86,000</td>--}}
{{--                            </tr>--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--        <!-- /.container-fluid -->--}}

{{--        <!-- Sticky Footer -->--}}
{{--        <footer class="sticky-footer">--}}
{{--            <div class="container my-auto">--}}
{{--                <div class="copyright text-center my-auto">--}}
{{--                    <span>Copyright © Your Website 2019</span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </footer>--}}

{{--    </div>--}}
{{--    <!-- /.content-wrapper -->--}}

{{--</div>--}}
{{--<!-- /#wrapper -->--}}

{{--<!-- Scroll to Top Button-->--}}
{{--<a class="scroll-to-top rounded" href="#page-top">--}}
{{--    <i class="fas fa-angle-up"></i>--}}
{{--</a>--}}

{{--<!-- Logout Modal-->--}}
{{--<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--    <div class="modal-dialog" role="document">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>--}}
{{--                <button class="close" type="button" data-dismiss="modal" aria-label="Close">--}}
{{--                    <span aria-hidden="true">×</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>--}}
{{--            <div class="modal-footer">--}}
{{--                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>--}}
{{--                <a class="btn btn-primary" href="login.html">Logout</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


{{--<!-- Bootstrap core JavaScript-->--}}
{{--<script src="../../vendors/jquery/jquery.min.js"></script>--}}
{{--<script src="{{URL::to('vendors/jquery/jquery.min.js')}}"></script>--}}
{{--<script src="{{URL::to('vendors/bootstrap/js/bootstrap.bundle.min.js')}}"></script>--}}

{{--<!-- Core plugin JavaScript-->--}}
{{--<script src="{{URL::to('vendors/jqeury-easing/jquery.easing.min.js')}}"></script>--}}

{{--<!-- Page level plugin JavaScript-->--}}
{{--<script src="{{URL::to('vendors/chart.js/Chart.min.js')}}"></script>--}}

{{--<script src="{{URL::to('vendors/datatables/jquery.dataTables.js')}}"></script>--}}
{{--<script src="{{URL::to('vendors/datatables/datatables.bootstrap4.js')}}"></script>--}}

{{--<!-- Custom scripts for all pages-->--}}

{{--<script src="{{URL::to('js/sb-admin.min.js')}}"></script>--}}

{{--<!-- Demo scripts for this page-->--}}
{{--<script src="{{URL::to('js/demo/datatables-demo.js')}}"></script>--}}
{{--<script src="{{URL::to('js/demo/chart-area-demo.js')}}"></script>--}}

{{--</body>--}}

{{--</html>--}}
