@extends('store.dashboard.layout.main')


@section('content')
        <div class="container-fluid">
            <div class="accordion mt-5" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <button class="btn btn-link but-stores" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="overflow: hidden ">
                            <h1 class="mb-0 text-left" style="color:#333">
                                <i class="fas mr-2 ml-2 fa-store">
                                    @lang('site.your_stores')
                                </i>
                                <i class="fas mr-2 ml-2 fa-caret-square-down icon-down"></i>
                            </h1>
                        </button>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample" style="height: 0px">
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="row">
                                    @foreach ($all_stores as $my_store)
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-4 mb-5">
                                                    @if ($my_store->image)
                                                        <img src="{{URL::asset("img/stores/$my_store->image")}}" alt="store image" class="image-res">
                                                    @else
                                                        <img src="{{URL::asset('img/stores/default.png')}}" alt="store image" class="image-res">
                                                    @endif
                                                </div>
                                                <div class="col-md-8">
                                                    <h4>
                                                        <a href="{{route('dashboard', $my_store->id)}}">{{$my_store->name}}</a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> {{-- End of Show All Stores --}}

            @if (Session::has('success'))
                <div class="alert alert-success mt-2"> {{session::get('success')}} </div>
            @endif

            <div class="col-lg-12">
                <h1 class="page-header">
                    <i class="fas mr-2 ml-2 fa-tools">
                        @lang('site.dashboard')
                    </i>
                </h1>
            </div>
            <!-- /.col-lg-12 -->

            <div class="row panels-box">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading black">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fas mr-2 ml-2 fa-envelope-open-text fa-5x"></i>
                                </div>
                                <div class="col-xs-9 @if (app()->getLocale() =='ar') text-left @else text-right @endif ">
                                    <div class="huge"> {{auth()->user()->store->messages->count()}} </div>
                                    <div> @lang('site.messages') </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('dashboard.message',auth()->user()->store->id)}}">
                            <div class="panel-footer">
                                <span class="pull-left"> @lang('site.view_details') </span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading black">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 @if (app()->getLocale() =='ar') text-left @else text-right @endif ">
                                    <div class="huge"> {{auth()->user()->store->categorys->count()}} </div>
                                    <div>@lang('site.categorys')</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('dashboard.items', auth()->user()->store->id)}}">
                            <div class="panel-footer">
                                <span class="pull-left"> @lang('site.view_details') </span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading black">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 @if (app()->getLocale() =='ar') text-left @else text-right @endif ">
                                    {{-- <div class="huge"> {{$store->items->count()}} </div> --}}
                                    <div class="huge"> {{auth()->user()->store->items->count()}} </div>
                                    <div>@lang('site.all_items')</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('dashboard.items', auth()->user()->store->id)}}">
                            <div class="panel-footer">
                                <span class="pull-left">@lang('site.view_details')</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading black">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fab fa-first-order fa-5x"></i>
                                </div>
                                <div class="col-xs-9 @if (app()->getLocale() =='ar') text-left @else text-right @endif ">
                                    <div class="huge"> {{auth()->user()->store->orders->count()}} </div>
                                    <div>@lang('site.new_orders')</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('dashboard.order', auth()->user()->store->id)}}">
                            <div class="panel-footer">
                                <span class="pull-left"> @lang('site.view_details') </span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            {{-- <div class="row">
                <div class="col-md-4">
                    <h4>
                        تاريخ الانتهاء
                    </h4>
                </div>
                <div class="col-md-8">
                    @php
                        $timeend = time();
                        echo date('Y-m-d', $timeend);
                    @endphp
                </div>
            </div> --}}


            <div class="panel panel-default p-0 mt-3">
                <div class="panel-heading">
                    <h6 class="bold" style="font-size: 20px">
                        <i class="fas mr-2 ml-2 fa-info-circle"></i>
                        @lang('site.next_sub')
                    </h6>
                </div>
                <div class="panel-body row p-2 m-2">
                    <div class="col-md-3 col-sm-3 col-xs-3 p-0">
                        @if ($store->image)
                            <img src="{{URL::asset("img/stores/$store->image")}}" alt="Store Image" style="max-height:200px" class="image-res">
                        @else
                            <img src="{{URL::asset("img/stores/default.png")}}" alt="Store Image" style="max-height:200px" class="image-res">
                        @endif
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-9">
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

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading p-0">
                            <div class="row">
                                <div class="col-md-8 col-xs-8 mt-1">
                                    <div class="col-md-12">
                                        <h4 class="p-1">
                                            @lang('site.store_info')
                                        </h4>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-4 mt-2">
                                    <div class="col-md-12">
                                        <a href="{{route('dashboard.info.edit', $store->id)}}" class="col-md-12 btn btn-success float-right">
                                            <i class="fas mr-2 ml-2 fa-edit"></i>
                                            @lang('site.edit')
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel-body">
                            <ul class="list-group list-group-flush list-hover">
                                <li class="list-group-item">
                                    <div class="row">
                                        <span class="col-md-4 font-weight-bold text-capitalize">
                                            @lang('site.name')
                                        </span>
                                        <span class="col-md-8 text-capitalize">
                                            <i class="fas mr-2 ml-2 fa-store "></i>
                                            {{$store->name}} </span>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <span class="col-md-4 font-weight-bold text-capitalize">
                                            @lang('site.des')
                                        </span>
                                        <span class="col-md-8 text-capitalize">
                                        <i class="fas mr-2 ml-2 fa-info-circle"></i>
                                            {{$store->des}} </span>
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <div class="row">
                                        <span class="col-md-4 font-weight-bold text-capitalize">
                                            @lang('site.currency')
                                        </span>
                                        <span class="col-md-8 text-capitalize">
                                        <i class="fas mr-2 ml-2 fa-money-bill-wave"></i>
                                            {{$store->currency}} </span>
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <div class="row">
                                        <span class="col-md-4 font-weight-bold text-capitalize">
                                            @lang('site.email')
                                        </span>
                                        <span class="col-md-8 text-capitalize">
                                            <i class="fas mr-2 ml-2 fa-envelope-open-text"></i>
                                            {{$store->email}} </span>
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <div class="row">
                                        <span class="col-md-4 font-weight-bold text-capitalize">
                                            @lang('site.phone')
                                        </span>
                                        <span class="col-md-8 text-capitalize">
                                                <i class="fas mr-2 ml-2 fa-mobile mr-1"></i>
                                            {{$store->phone}} </span>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <span class="col-md-4 font-weight-bold text-capitalize">
                                            @lang('site.address')
                                        </span>
                                        <span class="col-md-8 text-capitalize">
                                            <i class="fas mr-2 ml-2 fa-map-marker mr-1"></i>
                                            {{$store->address}} </span>
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <div class="row">
                                        <span class="col-md-4 font-weight-bold text-capitalize">
                                            @lang('site.payment')
                                        </span>
                                        <span class="col-md-8 text-capitalize">
                                            <i class="fas mr-2 ml-2 fa-gem "></i>
                                            @if ($store->payment == 0)
                                            <span class="text-danger bold">
                                                @lang('site.disabled')
                                            </span>
                                            @else
                                            <span class="text-success bold">
                                                @lang('site.enabled')
                                            </span>
                                            @endif
                                        </span>
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <div class="row">
                                        <span class="col-md-4 font-weight-bold text-capitalize">
                                            @lang('site.delivery')
                                        </span>
                                        <span class="col-md-8 text-capitalize">
                                            <i class="fas mr-2 ml-2 fa-truck"></i>
                                            @if ($store->delivery == 0)
                                            <span class="text-danger bold">
                                                @lang('site.disabled')
                                            </span>
                                            @else
                                            <span class="text-success bold">
                                                @lang('site.enabled')
                                            </span>
                                            @endif
                                        </span>
                                    </div>
                                </li>

                                @if ($store->facebook)
                                    <li class="list-group-item">
                                        <div class="row">
                                            <span class="col-md-4 font-weight-bold text-capitalize">
                                                Facebook
                                            </span>
                                            <span class="col-md-8 text-capitalize">
                                                <i class="fab fa-facebook-square mr-1"></i>
                                                {{$store->facebook}} </span>
                                        </div>
                                    </li>
                                @endif

                                @if ($store->twitter)
                                    <li class="list-group-item">
                                        <div class="row">
                                            <span class="col-md-4 font-weight-bold text-capitalize">
                                                Twitter
                                            </span>
                                            <span class="col-md-8 text-capitalize">
                                                <i class="fab fa-twitter-square mr-1"></i>
                                                {{$store->twitter}} </span>
                                        </div>
                                    </li>
                                @endif

                                @if ($store->instagram)
                                    <li class="list-group-item">
                                        <div class="row">
                                            <span class="col-md-4 font-weight-bold text-capitalize">
                                                Instagram
                                            </span>
                                            <span class="col-md-8 text-capitalize">
                                                <i class="fab fa-instagram mr-1"></i>
                                                {{$store->instagram}} </span>
                                        </div>
                                    </li>
                                @endif

                                @if ($store->linkedin)
                                    <li class="list-group-item">
                                        <div class="row">
                                            <span class="col-md-4 font-weight-bold text-capitalize">
                                                Iinked In
                                            </span>
                                            <span class="col-md-8 text-capitalize">
                                                <i class="fab fa-linkedin"></i>
                                                {{$store->linkedin}} </span>
                                        </div>
                                    </li>
                                @endif

                            </ul>

                        </div>

                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->


@endsection
