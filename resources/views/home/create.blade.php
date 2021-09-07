@extends('layouts.app')


@section('content')
    <link href="{{URL::asset('css/home/create-store.css')}}" rel="stylesheet">

    <div class="wrapper fadeInDown create-store">
        {{-- <div id="formContent"> --}}

            <div class="row">

                <div class="col-md-4">
                    <!-- Icon -->
                    <div class="fadeIn first">
                        <img src="{{URL::asset('img/home/store/create.jpg')}}" id="icon" alt="User Icon" style="width: 100%; height: 100%" />
                        <div class="background"></div>
                    </div>
                </div>

                <div class="col-md-8">

                    <!-- Login Form -->
                    <form action="{{route('createstore')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h2 class="h2"> @lang('site.create_store') </h2>
                        <h5 class="h5"> @lang('site.free_month') </h5>
                        <hr>
                        <input type="text" id="name" class="fadeIn third second mr-4" name="name" value="{{old('name')}}" placeholder="@lang('site.store_name')" required>
                        <div class="clear"></div>
                        @error('name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                        <div class="clear"></div>
                        <textarea name="des" id="descreption" cols="30" rows="10" class="fadeIn third mr-4"  placeholder="@lang('site.store_des')" required>{{old('des')}}</textarea>
                        <div class="clear"></div>
                        @error('des')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                        <div class="clear"></div>
                        <input type="text" id="address" class="fadeIn  third mr-4" name="address" value="{{old('address')}}" placeholder="@lang('site.store_address')" required>
                        <div class="clear"></div>
                        @error('address')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                        <div class="clear"></div>
                        <input type="text" id="phone" class="fadeIn  third mr-4" name="phone" value="{{old('phone')}}" placeholder="@lang('site.store_phone') : +201123456789" required>
                        <div class="clear"></div>
                        @error('phone')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                        <div class="clear"></div>
                        <input type="text" id="email" class="fadeIn  third mr-4" name="email" value="{{old('email')}}" placeholder="@lang('site.email') : email@example.com" required>
                        <div class="clear"></div>
                        @error('email')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                        <div class="clear"></div>
                        <input type="file" name="image" value="{{old('image')}}" id="image" class="fadeIn third mr-4" >
                        <div class="clear"></div>
                        @error('image')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                        <div class="clear"></div>
                        <select name="delivery" id="delivery" class="mr-4" required>
                            <option disabled selected> @lang('site.delivery') </option>
                            <option value="1"> @lang('site.delivery_av') </option>
                            <option value="0"> @lang('site.delivery_not_av') </option>
                        </select>
                        <div class="clear"></div>
                        @error('delivery')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                        <div class="clear"></div>
                        <select name="payment" id="payment" class="mr-4" required>
                            <option disabled selected> @lang('site.payment') </option>
                            <option value="1"> @lang('site.payment_av') </option>
                            <option value="0"> @lang('site.payment_not_av') </option>
                        </select>
                        <div class="clear"></div>
                        @error('payment')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                        <div class="col-md-12 mt-3">
                            <h4> @lang('site.enter_your_site') </h4>
                            <ul style="list-style-type:none">
                                <li> <i class="fas fa-check text-success"></i> @lang('site.enter_site1') </li>
                                <li> <i class="fas fa-check text-success"></i> @lang('site.enter_site2') </li>
                            </ul>
                        </div>
                        <div class="clear"></div>
                            <input type="submit" class="fadeIn third fourth mt-3 col-md-12" value="@lang('site.create')">
                    </form>
                </div>
            </div>
    </div>

@endsection
