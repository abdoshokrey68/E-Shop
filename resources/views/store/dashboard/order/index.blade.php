@extends('store.dashboard.layout.main')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <i class="fas fa-truck"></i>
                        @lang('site.my_orders')
                    </h1>
                </div>

                <div class="clear"> </div>

                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{session::get('success')}}
                    </div>
                @endif

                <div class="col-md-12">
                    <div class="panel panel-default ">
                        <div class="panel-heading">
                            <h4>
                                <i class="fas fa-truck"></i>
                                @lang('site.order_list')
                            </h4>
                        </div>

                        <div class="panel-body">
                                <table class="table table-hover">
                                <thead class="thead-dark">
                                    <tr class="bg-dark" style="color: #fff">
                                        <th scope="col">#</th>
                                        <th scope="col">@lang('site.item_name')</th>
                                        <th scope="col">@lang('site.purchaser')</th>
                                        <th scope="col">@lang('site.price')</th>
                                        <th scope="col">@lang('site.count')</th>
                                        <th scope="col">@lang('site.status')</th>
                                        <th scope="col">@lang('site.control')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($orders as $key => $order)
                                            <tr class="">
                                                <th scope="row"> {{$key +1}} </th>
                                                <td>
                                                    {{$order->name}}
                                                </td>
                                                <td> {{$order->users->name}} </td>
                                                <td> {{$order->price}} </td>
                                                <td> {{$order->count}} </td>
                                                <td style="@if ($order->status == 1) color:#080; @endif"> @if ($order->status == 0) @lang('site.customer_waiting') @else @lang('site.been_completed') @endif </td>
                                                <td>
                                                    <a href="{{route('dashboard.order.delete', $order->id)}}" class="btn btn-danger mb-2 col-md-4 col-sm-12 col-xl-12 bold"> <i class="fas fa-trash"></i> @lang('site.delete') </a>
                                                    <button class="btn btn-primary mb-2 col-md-4 col-sm-12 col-xl-12 bold" data-toggle="modal" data-target="#exampleModalLong{{$order->id}}">
                                                        <i class="fas fa-eye"></i>
                                                        @lang('site.show')
                                                    </button>
                                                    @if ($order->status == 0)
                                                        <a href="{{route('dashboard.order.done', $order->id)}}" class="btn btn-success mb-2 col-md-4 col-sm-12 col-xl-12 bold"> @lang('site.is_over') </a>
                                                    @else
                                                        <a href="{{route('dashboard.order.pending', $order->id)}}" class="btn btn-warning mb-2 col-md-4 col-sm-12 col-xl-12 bold" style="color:#000"> @lang('site.demand') </a>
                                                    @endif
                                                </td>
                                            </tr>
                                            <div class="modal fade animate" id="exampleModalLong{{$order->id}}" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content animate-bottom"> <!-- Here you have the juicy hahah -->
                                                        <div class="modal-header bg-primary">
                                                            <h4 class="modal-title" id="myModalLabel"> @lang('site.buyer_name') : {{$order->users->name}} </h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <ul class="list-group">
                                                                <li class="list-group-item"> @lang('site.item_name') : {{$order->name}} </li>
                                                                <li class="list-group-item"> @lang('site.des') : {{$order->des}} </li>
                                                                <li class="list-group-item"> @lang('site.buyer_name') : {{$order->users->name}} </li>
                                                                <li class="list-group-item"> @lang('site.buyer_phone') : {{$order->users->phone}}</li>
                                                                <li class="list-group-item"> @lang('site.buyer_address') : {{$order->users->address}}</li>
                                                                <li class="list-group-item"> @lang('site.count') : {{$order->count}}</li>
                                                                <li class="list-group-item color-size">
                                                                    @if ($order->color)
                                                                        @php
                                                                            $color_info = explode(',',$order->color);
                                                                        @endphp
                                                                        <div class=" col-md-12 row">
                                                                            The  Color :
                                                                            @foreach ($color_info as $color)
                                                                            <input type="color" class="col-md-2 mb-2" disabled value='{{$color}}'>
                                                                            @endforeach
                                                                        </div>
                                                                    @endif
                                                                </li>
                                                                <div class="clear"></div>
                                                                <li class="list-group-item color-size">
                                                                    @if ($order->size)
                                                                        @php
                                                                            $size_info = explode(',',$order->size);
                                                                            $size_name = array('Extra Small','Small', 'Medium','Large', 'Extra Large')
                                                                        @endphp
                                                                        <div class="col-md-12 row">
                                                                            The Size :
                                                                            <ul>
                                                                            @foreach ($size_name as $key => $name)
                                                                                @if (in_array($key, $size_info))
                                                                                <li>
                                                                                    <span> {{$name}} </span>
                                                                                </li>
                                                                                @endif
                                                                            @endforeach
                                                                            </ul>

                                                                        </div>
                                                                    @endif
                                                                </li>
                                                                <div class="clear"></div>

                                                            </ul>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                </tbody>
                                </table>





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
