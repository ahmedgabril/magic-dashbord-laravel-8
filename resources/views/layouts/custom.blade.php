<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->

  <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <!-- <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">-->
    @stack('css')
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <style>

   html,body{
        font-family: 'Cairo', sans-serif!important;
    }
    </style>
    @livewireStyles
  </head>
  <body class="login-page" cz-shortcut-listen="true" style="min-height: 496.781px;">
  <div class="login-box">
 {{ $slot }}
  </div>
  <!-- /.login-box -->
  @livewireScripts
  <!-- jQuery -->
  <script src="/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->

  <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="/plugins/toastr/toastr.min.js"></script>
  <!-- AdminLTE App -->
  @stack('sc')
  <script src="/dist/js/adminlte.min.js"></script>


  </body>
  </html>
