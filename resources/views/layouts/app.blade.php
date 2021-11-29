<!DOCTYPE html>
<html lang="en" style="height: auto">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ahmed gabril</title>

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">


  @stack('styles')

  <!-- Theme style -->
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->


  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

  <link rel="stylesheet" href="{{ asset('dist/css/custom.css') }}">

  <!--<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>-->
  @livewireStyles


  <style>
    html,body{
        font-family: 'Cairo', sans-serif!important;
    }
       @media print {

           button,a,select,input{
           display: none!important;

           }


       }
       .loader{
           position: fixed;
           top :0;
           left:0;
           background-color: #191c24;
           display:flex;
           justify-content: center;
           align-items: center;
           height: 100%;
           width:100%;
           z-index: 1000000;

       }
       .disaper{
           animation: pre 1.6s forwards;


       }
       @keyframes pre {
        50%{
               opacity: 1.1;

           }
           70%{
               opacity: 0.4;

           }
           100%{
               opacity: 0;
               visibility: hidden;
           }
       }
       </style>




</head>

<body class="sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed control-sidebar-slide-open" cz-shortcut-listen="true" style="direction:rtl ;text-align:right!important;margin:3px!important">
    <div class="loader disaper flex-column justify-content-center align-items-center">
        <img  src="/dist/img/pre3.gif" alt="ahmedgabril" height="170" width="170" >

     </div>
    <div class="wrapper">
    <!-- Preloader -->
    <!--
    <div class="preloader flex-column justify-content-center align-items-center bg-dark">
      <img class="animation__shake" src="/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>
  -->

    <!-- BEGIN: Header-->
    @include("baespage/navbar")

      @include("baespage/sidebar")
        <!-- Content Wrapper. Contains page content -->



    <!-- /.content-header -->
    <div class="content-wrapper" style="min-height: 269px;">
      <!-- Content Header (Page header) -->
     <main>



      <!-- /.content-header -->
      @yield('content')
     {{$slot}}

      <!-- Main content -->
    </main>
      <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020-2021 <a href="#">ahmed-gabril.</a>**phone:+201092586526</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

@livewireScripts
<script src="/plugins/jquery/jquery.min.js"></script>

<!-- jQuery -->
<script src="/js/app.js"></script>
<script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
@stack('scripts')
<!-- jQuery UI 1.11.4 -->
<script src="/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
<script>

  $(function() {
    bsCustomFileInput.init();
$(".loader").on("load",function(){
    $(this).addClass("disaper");
 });
   @if (session()->has('message'))
   const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 4500,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'welecom ..{{ session('message') }} '
})
/*
Swal.fire({
  position: 'top-start',
  icon: 'success',
  title: 'welecom ..{{ session('message') }} ',
  showConfirmButton: false,
  timer: 2500
})*/
@endif

  });
</script>

<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- ChartJS -->


<!-- JQVMap -->
<!--<script src="/plugins/jqvmap/jquery.vmap.min.js"></script>-->
<!--<script src="/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>-->
<!-- jQuery Knob Chart -->
{{--}}
<script src="/plugins/jquery-knob/jquery.knob.min.js"></script>


<!-- Tempusdominus Bootstrap 4 -->
<script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<!-- overlayScrollbars -->
{{--}}



<script src="/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<script src="/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- AdminLTE App -->
<!-- AdminLTE for demo purposes -->
<script src="/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="/plugins/raphael/raphael.min.js"></script>
<script src="/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<script src="/plugins/chart.js/Chart.min.js"></script>
<script src="/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="/dist/js/adminlte.js"></script>

<script src="/dist/js/demo.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

</body>
</html>
