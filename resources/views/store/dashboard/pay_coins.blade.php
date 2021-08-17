@extends('store.dashboard.layout.main')


@section('content')
        <div class="container-fluid">
            <div class="col-lg-12">
                <h1 class="page-header p-4">
                    <i class="fas fa-coins">
                        @lang('site.buy_coins')
                    </i>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
                <div class="clearfix"></div>
                    @if (Session::has('success'))
                        <div class="alert alert-success mt-2"> {{session::get('success')}} </div>
                    @endif
                <div class="clearfix"></div>
                    @if (Session::has('error'))
                        <div class="alert alert-danger mt-2"> {{session::get('error')}} </div>
                    @endif
                <div class="clearfix"></div>

                <div class="clear"></div>
                <div class="accordion mt-1" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <button class="btn btn-link but-stores" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="overflow: hidden ">
                                <h3 class="mb-0 text-left" style="color:#333">
                                    <i class="fas fa-store">
                                        @lang('site.payment_de')
                                    </i>
                                    <i class="fas fa-caret-square-down icon-down"></i>
                                </h3>
                            </button>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample" style="height: 0px">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <h3 class="p-2">
                                        @lang('site.payment_more_de')
                                    </h3>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> {{-- End of Show All Stores --}}
                <br>


            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-12 p-0">
                            <div class="panel panel-default p-0">
                                <div class="panel-heading" style="background-color: #ea382c;">
                                    <h4 class="bold text-light">
                                        Vodafone Cash
                                    </h4>
                                </div>
                                <div class="panel-body p-0">
                                    <div class="col-md-3 col-xs-3 p-0" style="height: 50px">
                                        <img src="{{URL::asset('img/vodafone.jpg')}}" alt="vodafone" class="image-res" >
                                    </div>
                                    <div class="col-md-9 col-xs-9">
                                        <div class="nav-link">
                                            <h4 class="bold">
                                                <i class="fas fa-mobile"></i>
                                                +201061830653
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading" style="background-color: #33c033;">
                                    <h4 class="bold text-dark">
                                        WhatsApp
                                    </h4>
                                </div>
                                <div class="panel-body p-0">
                                    <div class="col-md-3 col-xs-3 p-0" style="height: 50px">
                                        <img src="{{URL::asset('img/whatsapp.jpg')}}" alt="whatsapp" class="image-res" >
                                    </div>
                                    <div class="col-md-9 col-xs-9">
                                        <h4 class="bold">
                                            <i class="fas fa-mobile"></i>
                                            +201129899520
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="col-md-12 p-0">
                            <div class="panel panel-default">
                                <div class="panel-heading bg-primary" >
                                    <h4 class="bold text-light">
                                        PayPal
                                    </h4>
                                </div>
                                <div class="panel-body p-0">
                                    <div class="col-md-3 col-xs-3 p-1" style="height: 50px">
                                        <img src="{{URL::asset('img/paypal.png')}}" alt="" class="image-res" >
                                    </div>
                                    <div class="col-md-9 col-xs-9">
                                        <h3 class="bold">
                                            <i class="fab fa-cc-paypal" style="font-weight:100"></i>
                                            <span class="text-danger">
                                                Soon
                                            </span>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="col-md-12 p-0">
                            <div class="panel panel-default">
                                <div class="panel-heading bg-warning " >
                                    <h4 class="bold text-dark">
                                        Visa & Mastercard
                                    </h4>
                                </div>
                                <div class="panel-body p-0">
                                    <div class="col-md-3 col-xs-3 p-1" style="height: 50px">
                                        <img src="{{URL::asset('img/visa.png')}}" alt="" class="image-res" >
                                    </div>
                                    <div class="col-md-9 col-xs-9">
                                        <h3 class="bold">
                                            <i class="fas fa-money-check"></i>
                                            <span class="text-danger">
                                                Soon
                                            </span>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 btn btn-secondary p-2">
                        <div class="col-md-12 ">
                            <h2 class="text-center text-light">
                                <i class="fas fa-credit-card"></i>
                                @lang('site.more_credit')
                            </h2>
                        </div>
                    </div>
                    <hr>
                    {{-- End The Credit Card Details --}}

                    <div class="col-md-12 bg-dark text-warning bold p-3 text-center">
                        <h4 class="bold ">
                            <i class="fas fa-coins"></i>
                            {{auth()->user()->coins}}
                            @lang('site.your_coins')
                        </h4>
                    </div>
                    {{-- Box My Coins --}}

                    <div class="panel panel-default p-0 mt-3">
                        <div class="panel-heading">
                            <h6 class="bold" style="font-size: 20px">
                                <i class="fas fa-coins"></i>
                                @lang('site.coins_price')
                            </h6>
                        </div>
                        <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col-md-12 panel panel-default p-0">
                                        <div class="panel-heading bg-secondary  text-light">
                                            <h4 class="bold">
                                                <i class="fas fa-info-circle"></i>
                                                @lang('site.plan_one')
                                            </h4>
                                        </div>
                                        <div class="panel-body">
                                            <h4>
                                                <i class="fas fa-coins"></i>
                                                @lang('site.get_coins1')
                                            </h4>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-12 panel panel-default p-0">
                                        <div class="panel-heading bg-secondary  text-light">
                                            <h4 class="bold">
                                                <i class="fas fa-info-circle"></i>
                                                @lang('site.plan_two')
                                            </h4>
                                        </div>
                                        <div class="panel-body">
                                            <h4>
                                                <i class="fas fa-coins"></i>
                                                    @lang('site.get_coins2')
                                            </h4>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <h1 class="page-header p-2 m-0">
                            <i class="fas fa-gem">
                                @lang('site.renew_your_plan')
                            </i>
                        </h1>
                    </div>
                    <div class="col-md-12 mb-3">
                        <h2>
                            <i class="fas fa-store"></i>
                            @lang('site.store_info')
                        </h2>
                        <div class="clear"></div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    @if ($store->image)
                                        <img src="{{URL::asset("img/stores/$store->image")}}" alt="Store Image" class="image-res">
                                    @else
                                        <img src="{{URL::asset("img/stores/default.png")}}" alt="Store Image" class="image-res">
                                    @endif
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <a href="{{route('dashboard', $store->id)}}"><h3>{{$store->name}}</h3></a>
                                    <p>
                                        @php
                                            $timeend = time();
                                            if ($store->subscription == 1) {
                                                $timeend = $store->timeend ;
                                            }
                                            date_default_timezone_set('Egypt');
                                            echo date('Y-m-d / H:m', $timeend );
                                        @endphp
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-primary p-0">
                        <div class="panel-heading">
                            <h6 class="bold" style="font-size: 20px">
                                @lang('site.choose_plane')
                            </h6>
                        </div>
                        <div class="panel-body">
                            <form action="{{route('renew_sub',$store->id)}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col-md-12 panel panel-default p-0">
                                            <div class="panel-heading bg-dark text-light">
                                                <h4 class="bold">
                                                    <i class="fas fa-money-bill-alt"></i>
                                                    @lang('site.months')
                                                </h4>
                                            </div>
                                            <div class="panel-body">
                                                <input type="radio" name="plan" value="1" id="plan2">
                                                <label for="plan2" style="font-size: 1.1em">
                                                    @lang('site.buy_months')
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="col-md-12 panel panel-default p-0">
                                            <div class="panel-heading bg-dark text-light">
                                                <h4 class="bold">
                                                    <i class="fas fa-money-bill-alt"></i>
                                                    @lang('site.years')
                                                </h4>
                                            </div>
                                            <div class="panel-body">
                                                <input type="radio" name="plan" value="2" id="plan1" checked>
                                                    <label for="plan1" style="font-size: 1.1em">
                                                        @lang('site.buy_years')
                                                    </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @error('plan')
                                    <p class="text-danger">
                                        {{$message}}
                                    </p>
                                @enderror
                                <input type="submit" value="Buy Now" class="btn btn-success col-md-6  col-sm-6 col-xs-12 offset-md-3  offset-xs-12 text-dark" style="font-size: 1.5em">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->


@endsection
