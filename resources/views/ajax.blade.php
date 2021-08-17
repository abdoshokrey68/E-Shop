<!DOCTYPE html>
<html lang="en">
    <!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <link href="{{URL::asset('img/home/favicon.png')}}" rel="icon">
        <link href="{{URL::asset('img/home/apple-touch-icon.png')}}" rel="apple-touch-icon">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Vendor CSS Files -->
        <link href="{{URL::asset('css/animate.min.css')}}" rel="stylesheet">
        <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{URL::asset('css/bootstrap-icons.css')}}" rel="stylesheet">
        <link href="{{URL::asset('css/home/home.css')}}" rel="stylesheet">
        <link href="{{URL::asset('css/home/home2.css')}}" rel="stylesheet">
    </head>
<body>

    <div class="sidebar-item search-form">
        <div data-vist="{{route('search')}}">
            <input list="searchs" class="form-control" name="search" id="search" placeholder="Search .." class="form-control dynamic">
            <datalist id="searchs"></datalist>
        </div>
    </div><!-- End sidebar search formn-->

    <h3 class="sidebar-title">Categories</h3>
    <div class="sidebar-item categories">
        <ul>

            <li><input type="checkbox" name="delivery" id="delivery" value="false"> خدمة التوصيل </li>

        </ul>
    </div><!-- End sidebar categories-->



    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="{{URL::asset('js/validate.js')}}"></script>

    <script src="{{URL::asset('js/home2.js')}}"></script>
</body>
</html>
