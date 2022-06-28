<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title>Calculator</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="Calculator">
    <meta property="og:type" content="Application">
    <meta property="og:url" content="{{url('/')}}">
    <meta property="og:image" content="{{asset("img/demo.png")}}">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->
    <meta name="theme-color" content="#fafafa">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

<div class="container">
    @yield('content')
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/08e910b786.js" crossorigin="anonymous"></script>
<script src="{{asset('js/app.js')}}" crossorigin="anonymous"></script>
</body>

</html>
