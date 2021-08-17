<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <nav id="navbar" class="navbar navbar-expand-lg navbar-light col-12">
            <div class="container-fluid col-12">
                <a href="{{route('store.index', $store_id)}}" class="navbar-brand logo d-flex align-items-center">
                    <span>
                        <i class="fas fa-store mr-2 ml-2" style="font-size:25px"></i>
                        {{$store->name}}
                    </span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <i id="mobile-nav-toggle" class="fas fa-list mobile-nav-toggle" style="display: none"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li><a href="{{route('store.index', $store_id)}}" class="nav-link scrollto active" > @lang('site.home') </a></li>
                        @foreach ($store->categorys as $category)
                            <li><a  href="{{route('store.category', $category->id)}}" class="nav-link scrollto active"> {{$category->name}} </a></li>
                        @endforeach

                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">@lang('site.login')</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">@lang('site.register')</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a href="{{route('store.orders', $store_id)}}" class="nav-link btn btn-light p-0 m-0 shop-icon">
                                    <i class="shop-icon fas fa-shopping-cart p-2" style="font-size: 25px"></i>
                                    <span class="bg-danger orders-count">
                                        <orders-count store_id="{{$store->id}}" user_id="{{Auth::id()}}" />
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="{{ route('logout')}}" class="nav-link p-2 m-0 text-danger" role="button"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out p-2" style="font-size: 25px"></i>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </li>
                        @endguest

                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            @if (app()->getLocale() != $localeCode)
                                <li class="nav-item">
                                    <a rel="alternate" class="nav-link text-uppercase m-0 p-2 text-light btn btn-primary" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{-- <i class="fas fa-language"></i> --}}
                                        {{ $localeCode }}
                                    </a>
                                </li>
                            @endif
                        @endforeach

                        @auth
                            @if ($store)
                                @if ($store->user_id == auth()->user()->id)
                                    <a href="{{route('dashboard', $store_id)}}" class="btn ">
                                        {{-- <i class="fas fa- mr-2 ml-2" style="font-size: 20px"></i> --}}
                                        <i class="shop-icon fas fa-user-cog text-danger" style="font-size: 25px; margin-right: 10px;"></i>
                                        {{-- <span class="text-danger">
                                            @lang('site.dashboard')
                                        </span> --}}
                                    </a>
                                @endif
                            @endif
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

    </div>
</header><!-- End Header -->

    <div class="col-md-12">

        <!-- ======= Hero Section ======= -->
        <section id="hero" class="hero d-flex align-items-center" style='background-image: url("{{ URL::asset('img/front/hero-bg.png')}}")'>

            <div class="container">
                <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up"> @lang('site.our_services') </h1>
                    <h2 data-aos="fade-up" style="line-height:45px" data-aos-delay="400"> {{$store->des}} </h2>
                    {{-- <div data-aos="fade-up" data-aos-delay="600">
                    </div> --}}
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{asset('img/front/hero-img.png')}}" style="height:100%" class="img-fluid" alt="">
                </div>
                </div>
            </div>

        </section><!-- End Hero -->


    </div>
