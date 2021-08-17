<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title> {{$store->name}}</title>
        @if ($store->image)
        <link rel="icon" type="image/x-icon" href="{{URL::asset("img/stores/$store->image")}}" />
        @else
        <link rel="icon" type="image/x-icon" href="{{URL::asset("img/stores/default.png")}}" />
        @endif

        <!-- Bootstrap Core CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link href="{{URL::asset('css/backend/bootstrap2.min.css')}}" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{URL::asset('css/backend/metisMenu.min.css')}}" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="{{URL::asset('css/backend/timeline.css')}}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{URL::asset('css/backend/startmin.css')}}" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="{{URL::asset('css/backend/morris.css')}}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{URL::asset('css/backend/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

        <link href="{{URL::asset('css/backend/backend.css')}}" rel="stylesheet">

        @if (app()->getLocale() =='ar')
            <link href="{{URL::asset('css/backend/ar-style.css')}}" rel="stylesheet">
        @endif
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    {{-- <body @if (app()->getLocale() =='ar') dir="rtl" @endif > --}}

    <body dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}" >


