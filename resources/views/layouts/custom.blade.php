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
  <!-- Daterange picker -->


  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">


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
  <body class="login-page" cz-shortcut-listen="true" style="min-height: 496.781px;">

        {{ $slot }}

  <!-- /.login-box -->
  @livewireScripts
  <script src="/plugins/jquery/jquery.min.js"></script>

  <!-- jQuery -->
  <script src="/js/app.js"></script>

  <!-- jQuery UI 1.11.4 -->
  <script src="/plugins/jquery-ui/jquery-ui.min.js"></script>


  <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  @stack('sc')
  <!-- ChartJS -->


  <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>

  <script src="/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

  </body>
  </html>
