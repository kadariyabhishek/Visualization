
<!-- Bootstrap core JavaScript-->
{{--<script src="../../vendors/jquery/jquery.min.js"></script>--}}
<script src="{{URL::to('vendors/jquery/jquery.min.js')}}"></script>
<script src="{{URL::to('vendors/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{URL::to('vendors/jqeury-easing/jquery.easing.min.js')}}"></script>

<!-- Page level plugin JavaScript-->
<script src="{{URL::to('vendors/chart.js/Chart.min.js')}}"></script>

<script src="{{URL::to('vendors/datatables/jquery.dataTables.js')}}"></script>
<script src="{{URL::to('vendors/datatables/datatables.bootstrap4.js')}}"></script>

<!-- Custom scripts for all pages-->

<script src="{{URL::to('js/sb-admin.min.js')}}"></script>

<!-- Demo scripts for this page-->
<script src="{{URL::to('js/demo/datatables-demo.js')}}"></script>
<script src="{{URL::to('js/demo/chart-area-demo.js')}}"></script>

@yield('dashboard-footer')
</body>
</html>





