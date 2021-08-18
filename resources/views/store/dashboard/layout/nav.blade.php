<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse m-0" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('dashboard',$store->id)}}"> <i class="fas fa-shopping-cart"></i> {{$store->name}} </a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <ul class="nav navbar-right navbar-top-links">
            <li>
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    @if (app()->getLocale() != $localeCode)
                        <li>
                            <a rel="alternate" class=" nav-link text-uppercase bg-light text-dark" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                <i class="fas fa-globe"></i>
                                {{ $localeCode }}
                            </a>
                        </li>
                    @endif
                @endforeach
            </li>
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav p-0" id="side-menu" style="height: 87vh; overflow: auto;">
                    {{-- <li class="sidebar-search  col-sm-12 col-xs-12">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                        </span>
                        </div>
                    </li> --}}

                    <li class="col-md-12 col-xs-12 mb-1 mt-1 p-0">
                        <h4 class="text-center m-0 text-capitalize">
                            <img class="img-circle" src="{{auth()->user()->profile_photo_url}}" alt="">
                            {{auth()->user()->name}}
                        </h4>
                    </li>

                    <li class="col-md-12 col-xs-12 mb-1 mt-1 p-0 bg-dark">
                        <a href="{{route('pay_coins', $store->id)}}" class="bg-dark">
                            <h4 class="text-center text-warning ">
                                <i class="fa fa-coins fa-fw"></i>
                                {{auth()->user()->coins}}
                                @lang('site.your_coins')
                            </h4>
                        </a>
                    </li>

                    <li class="col-md-12 col-xs-12 p-0 mb-1 mt-1 p-0">
                        @if ($store->status == 0)
                            <div class="col-md-12 mb-2 p-0 col-xs-12">
                                <label class="p-4 btn btn-danger btn-outline-danger col-md-12 col-xs-12" style="font-size:1.2em" for="danger-outlined">@lang('site.store_update')</label>
                            </div>
                        @else
                            <div class="col-md-12 mb-2 p-0 col-xs-12">
                                <label class="p-4 btn btn-success btn-outline-success col-md-12 col-xs-12" style="font-size:1.2em" for="success-outlined">@lang('site.store_open')</label>
                            </div>
                        @endif
                    </li>

                    <li class="col-md-12  mb-1 mt-1 p-0">
                        <a href="{{route('store.index',$store->id)}}" target="_blank">
                            @if ($store->image)
                            <img src="{{URL::asset("img/stores/$store->image")}}" alt="store image" class="img-rounded image-res" style="max-height:100px; max-width:100px">
                            @else
                            <img src="{{URL::asset("img/stores/default.png")}}" alt="store image" class="img-rounded image-res" style="max-height:100px; max-width:100px">
                            @endif
                            <div class="clear"></div>
                        </a>
                    </li>

                    <li class="col-md-12 col-xs-12">
                        <a href="{{route('dashboard', $store->id)}}" class="@if(\Request::route()->getName() == 'dashboard') bg-primary text-light @endif ">
                            <i class="fa fa-tools fa-fw"></i>
                            @lang('site.dashboard')
                        </a>
                    </li>

                    <li class="col-md-12 col-xs-12">
                        <a href="{{route('dashboard.items', $store->id)}}" class="@if(\Request::route()->getName() == 'dashboard.items') bg-primary text-light @endif">
                            <i class="fa fa-shopping-cart fa-fw"></i>
                            @lang('site.store_items')
                        </a>
                    </li>

                    <li class="col-md-12 col-xs-12">
                        <a href="{{route('dashboard.order', $store->id)}}" class="@if(\Request::route()->getName() == 'dashboard.order') bg-primary text-light @endif">
                            <i class="fa fa-sitemap fa-fw"></i>
                            @lang('site.sales')
                        </a>
                    </li>

                    <li class="col-md-12 col-xs-12">
                        <a href="{{route('dashboard.career', $store->id)}}" class="@if(\Request::route()->getName() == 'dashboard.career') bg-primary text-light @endif">
                            <i class="fa fa-briefcase fa-fw"></i>
                            @lang('site.career')
                        </a>
                    </li>

                    <li class="col-md-12 col-xs-12">
                        <a href="{{route('dashboard.message',$store->id)}}" class="@if(\Request::route()->getName() == 'dashboard.message') bg-primary text-light @endif">
                            <i class="fa fa-envelope fa-fw"></i>
                            @lang('site.message')
                        </a>
                    </li>

                    <li class="col-md-12 col-xs-12">
                        <a href="{{route('pay_coins',$store->id)}}" class="@if(\Request::route()->getName() == 'pay_coins') bg-primary text-light @endif">
                            <i class="fa fa-coins fa-fw"></i>
                            @lang('site.pay_coins')
                        </a>
                    </li>

                    <li class="col-md-12 col-xs-12">
                        <a href="{{route('store.index', $store->id)}}" target="_blank">
                            <i class="fa fa-home fa-fw"></i>
                            @lang('site.vist_my_store')
                        </a>
                    </li>


                    <li class="col-md-12 col-xs-12">
                        <a href="{{route('home')}}" target="_blank">
                            <i class="fa fa-home fa-fw"></i>
                            @lang('site.main_store')
                        </a>
                    </li>

                    <li class="col-md-12 col-xs-12">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                            <input type="submit" value="logout">
                        </form>
                        <a class="" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out fa-fw"></i> @lang('site.logout')</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                    {{-- <li class="col-md-12 col-xs-12">
                        <a href="#">
                            <i class="fas fa-shipping-fast fa-fw"></i>
                            Delivery Service
                            <p class=" float-right">Soon</p>
                        </a>
                    </li> --}}

                </ul>
            </div>
        </div>
    </nav>
<div id="page-wrapper">
