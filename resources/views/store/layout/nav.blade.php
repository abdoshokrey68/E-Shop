<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger logo" href="{{route('store.index', $store->id)}}">
            <i class="fas fa-store"></i>
            {{$store->name}}
            {{-- <img src="{{URL::asset('img/navbar-logo.svg')}}" alt="" /> --}}
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            @lang('site.menu')
            <i class="fas fa-bars ml-1"></i>
        </button>
        <div class="collapse navbar-collapse nav-info" id="navbarResponsive">
            <ul class="navbar-nav ml-auto  ">
                <li class="nav-item mb-2 mt-2">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                    <div class="dropdown-menu @if (app()->getLocale() == 'en') dropdown-menu-right @endif orders-box mr-auto">
                        @auth
                            <a href="{{route('store.orders', $store->id)}}">
                                <div class="col-md-12">
                                    @lang('site.my_orders')
                                </div>
                            </a>
                            <hr>
                            @foreach ($orders as $order)
                                <div class="col-md-12 main-orders-box">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-xl-4">
                                            <img src="https://via.placeholder.com/150" alt="" class="rounded-circle">
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xl-8 p-1">
                                            <h6> {{$order->name}} </h6>
                                            <p> @lang('site.price') : {{$order->price}} </p>
                                            <p for="count">@lang('site.count') : {{$order->count}}</p>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            @empty($orders)
                                <div class="text-dafault">
                                    <h5 class="text-center">
                                        @lang('site.empty')
                                    </h5>
                                </div>
                            @else
                            <div class="col-md-12">
                                <h6 style="color: #2980b9"> @lang('site.total'):  </h6>
                            </div>
                            @endempty
                        @endauth
                        @guest
                            <div>
                                <a href="{{route('login')}}" class="text-danger text-center">You Shoud Login To show Your Orders</a>
                            </div>
                        @endguest
                    </div>
                </li>
                {{-- Start Language Box --}}
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    @if (app()->getLocale() != $localeCode)
                        <li class="nav-item">
                            <a rel="alternate" class="nav-link" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{-- <i class="fas fa-language"></i> --}}
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endif
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
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        {{-- Logout Box --}}
                        <div class="dropdown-menu p-0 @if (app()->getLocale() == 'en') dropdown-menu-right @endif" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item p-1 mt-1" style="display: block" href="{{ route('logout') }}"
                            {{-- <a class="dropdown-item text-center p-1 m-1" style="display: block; justify-content:center" href="{{ route('logout') }}" --}}
                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                @lang('site.logout')
                                <i class="fas fa-sign-out-alt"></i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                        {{-- End Logout Box --}}
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
