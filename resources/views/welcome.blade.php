<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Inventory Laravel+Vue</title>

  <link rel="{{ mix('/css/app.css') }}" href="style.css">
  <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('admin/css/sb-admin.css') }}" rel="stylesheet">

</head>

<body id="page-top">
<div id="app">
  @include('include.nav')
  <div id="wrapper">
    @include('include.sidebar')
    <div id="content-wrapper">
      <div class="container-fluid">
        <router-view></router-view>
      </div>
    </div>
  </div>
</div>

  <script src="{{ mix('/js/app.js') }}"></script>
  <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('admin/js/sb-admin.min.js') }}"></script>

</body>

</html>
