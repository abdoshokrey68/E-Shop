<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        {{-- {{request()->route()->getName()}} --}}
        @lang('site.' . request()->route()->getName())
    </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <link href="{{URL::asset('img/home/favicon.png')}}" rel="icon">
    <link href="{{URL::asset('img/home/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <!-- Vendor CSS Files -->
    <link href="{{URL::asset('css/animate.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/bootstrap-icons.css')}}" rel="stylesheet">
    {{-- <link href="{{URL::asset('css/boxicons.min.css')}}" rel="stylesheet"> --}}
    {{-- <link href="{{URL::asset('css/all.min.css')}}" rel="stylesheet"> --}}
    <link href="{{URL::asset('css/glightbox.min.css')}}" rel="stylesheet">
    {{-- <link href="{{URL::asset('css/remixicon.css')}}" rel="stylesheet"> --}}
    <link href="{{URL::asset('css/swiper-bundle.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/app.css') }}" rel="stylesheet">
    <link href="{{URL::asset('css/home/home.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/home/home2.css')}}" rel="stylesheet">
    @if (App::getLocale() == 'ar')
        <link href="{{URL::asset('css/home/home-ar.css')}}" rel="stylesheet">
    @endif
</head>
<body id="page-top" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}" >
    <div id="app">
        <section id="topbar" class="d-flex align-items-center">
            <div class="container">
                <div class="container d-flex justify-content-center justify-content-md-between">
                <div class="contact-info d-flex align-items-center">
                    <div class="mr-2 ml-2">
                        <a href="tel:+20-1129899520"> <i class="fas fa-phone align-items-center mr-1 ml-2"> </i>+20-1129899520</a>
                    </div>
                    <div class="mr-2 ml-2">
                        <a href="mailto:abdoshokrey68@gmail.com"><i class="fas fa-at mr-1 ml-2"></i>abdoshokrey68@gmail.com</a>
                    </div>
                </div>
                <div class="social-links d-none d-md-flex align-items-center">

                    <div class="lang mr-4 ml-4">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            @if ($localeCode != app()->getLocale())
                                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            @endif
                        @endforeach
                    </div>

                    <a href="https://twitter.com/abdoshokrey68"  target=”_blank” class="twitter"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.facebook.com/BooDY.01149743903"  target=”_blank” ><i class="fab fa-facebook"></i></a>
                    <a href="https://www.instagram.com/abdallahshokrey/"  target=”_blank” class="instagram"><i class="fab fa-instagram"></i></a>
                    {{-- <a href="#" class="linkedin"><i class="fab fa-linkedin"></i></i></a> --}}
                </div>
                </div>
            </div>

        </section><!-- End Top Bar-->

        <header id="header" class="d-flex align-items-center">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light col-12">
                    <div class="container-fluid col-12">
                        <div class="logo">
                            <a href="{{route('home')}}">
                                <h1> X-Dealer </h1>
                            </a>
                            <!-- Uncomment below if you prefer to use an image logo -->
                            <!-- <a href="#"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
                        </div>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li><a class="p-1 @if(request()->route()->getName() == 'home') active @endif" href="{{route('home')}}"> <i class="fas fa-home mr-2 ml-2"></i> @lang('site.home')</a></li>
                                {{-- <li><a class="p-1 @if(request()->route()->getName() == 'contact') active @endif" href="{{route('contact')}}"> <i class="fas fa-headset mr-2 ml-2"></i> @lang('site.contact')</a></li> --}}
                                <li><a class="p-1 @if(request()->route()->getName() == 'career') active @endif" href="{{route('career')}}"> <i class="fas fa-briefcase mr-2 ml-2"></i> @lang('site.career')</a></li>
                                <li>
                                    <a href="{{route('addstore')}}" class=" p-1 @if(request()->route()->getName() == 'addstore') active @endif">
                                        <i class="fas fa-plus-square mr-2 ml-2"></i>
                                        @lang('site.create_store')
                                    </a>
                                </li> {{-- create new store --}}
                                @guest
                                    @if (Route::has('login'))
                                        <li>
                                            <a class=" p-1 @if(request()->route()->getName() == 'login') active @endif" href="{{ route('login') }}">
                                                <i class="fas fa-user ml-2 mr-2"></i>
                                                @lang('site.login')
                                            </a>
                                        </li>
                                    @endif {{-- End  login --}}
                                    @if (Route::has('register'))
                                        <li>
                                            <a class=" p-1 @if(request()->route()->getName() == 'register') active @endif" href="{{ route('register') }}">
                                                <i class="fas fa-user-plus ml-2 mr-2"></i>

                                                @lang('site.register')
                                            </a>
                                        </li>
                                    @endif  {{-- End  register --}}
                                @else {{-- Else If This Member Is Not Guest --}}
                                    @if (auth()->user()->store)
                                        <li>
                                            <a href="{{route('dashboard', auth()->user()->store->id)}}" class="p-1 btn">
                                                <i class="fas fa-shopping-cart mr-2 ml-2"></i>
                                                @lang('site.your_stores')
                                            </a>
                                        </li> {{-- All Member Stores --}}

                                        <li>
                                            <div class="col-md-12 p-0">
                                                <a href="{{route('pay_coins', auth()->user()->store->id)}}" class="p-1 btn">
                                                    <i class="fas fa-coins mr-2 ml-2"></i>
                                                    {{-- <span class="mr-2 ml-2"> --}}
                                                        {{auth()->user()->coins}}
                                                    {{-- </span> --}}
                                                        @lang('site.your_coins')
                                                </a>
                                            </div>
                                        </li> {{-- All Member Coins --}}
                                    @endif

                                    <li class="nav-item dropdown exit">
                                        <a id="navbarDropdown" class=" p-1 dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <i class="fas fa-user" style="font-size: 20px"></i>
                                        </a> {{-- Logout Box --}}
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item p-1" style="display: block" href="{{ route('profile.edit',auth()->user()->id) }}">
                                                @lang('site.profile')
                                                <i class="fas fa-user-edit"></i>
                                            </a>
                                            <a class="dropdown-item p-1 mt-1" style="display: block" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                                @lang('site.logout')
                                                <i class="fas fa-sign-out-alt"></i>
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div> {{-- End Logout Box --}}
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header><!-- End Header -->

        <div class="session">
            @if (Session::has('success'))
                <div class="success-box bg-success">
                    <i class="fas fa-check fa-2x"></i>
                    {{session::get('success')}}
                </div>
            @endif

            @if (Session::has('error'))
                <div class="success-box bg-danger">
                    <i class="fas fa-times fa-2x"></i>
                    {{session::get('error')}}
                </div>
            @endif
        </div>
        <main class="main">
                @yield('content')
        </main>
    </div>
    <div class="loading">Loading&#8230;</div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> --}}

        {{-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script> --}}
        {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> --}}
        <!-- Vendor JS Files -->
        <script src="{{URL::asset('js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{URL::asset('js/glightbox.min.js')}}"></script>
        <script src="{{URL::asset('js/isotope.pkgd.min.js')}}"></script>
        <script src="{{URL::asset('js/validate.js')}}"></script>
        <script src="{{URL::asset('js/purecounter.js')}}"></script>
        <script src="{{URL::asset('js/swiper-bundle.min.js')}}"></script>
        <script src="{{URL::asset('js/noframework.waypoints.js')}}"></script>
        <!-- Template Main JS File -->
        <script src="{{URL::asset('js/app.js')}}" defer></script>
        <script src="{{URL::asset('js/home/home.js')}}"></script>
        <script src="{{URL::asset('js/home/home2.js')}}"></script>

</body>
</html>
