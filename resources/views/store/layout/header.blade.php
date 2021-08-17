<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title> {{$store->name}} </title>
    <meta content="" name="description">

    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="{{URL::asset("img/stores/$store->image")}}" />

    <!-- Google Fonts -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> --}}

    <!-- Vendor CSS Files -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    {{-- <link href="{{asset('css/bootstrap-icons.css')}}" rel="stylesheet"> --}}
    <link href="{{asset('css/store/aos.css')}}" rel="stylesheet">
    <link href="{{asset('css/store/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('css/swiper-bundle.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/glightbox.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Template Main CSS File -->
    <link href="{{asset('css/store/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/store/main.css')}}" rel="stylesheet">
    @if (app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{URL::asset('css/front/front-ar.css')}}">
    @endif
</head>

<body dir="{{LaravelLocalization::getCurrentLocaleDirection()}}" >
    <div id="app">
