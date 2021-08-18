@extends('layouts.app')

@section('content')

    <section id="breadcrumbs" class="breadcrumbs p-0">
        <div class="container p-3" style="background-color: #fff">
            <h1>
                <i class="fas fa-user"></i>
                @lang('site.profile')
            </h1>

                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form action="{{route('profile.update', auth()->user()->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 mt-3">
                                <input type="text" name="name"
                                class="form-control"
                                placeholder="Enter Name .. "
                                value="@if($errors->any()){{old('name')}}@else{{$user->name}}@endif">
                                @error('name')
                                    <div class="alert alert-danger mt-2"> <i class="fas fa-times"></i> {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <input type="text" name="email"
                                class="form-control"
                                placeholder="Enter Your Email .. "
                                value="@if($errors->any()){{old('email')}}@else{{$user->email}}@endif">
                                @error('email')
                                    <div class="alert alert-danger mt-2"> <i class="fas fa-times"></i> {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <input type="text" name="phone"
                                class="form-control"
                                placeholder="Enter Your Phone .. "
                                value="@if($errors->any()){{old('phone')}}@else{{$user->phone}}@endif">
                                @error('phone')
                                    <div class="alert alert-danger mt-2"> <i class="fas fa-times"></i> {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <input type="text" name="address"
                                class="form-control"
                                placeholder="Enter Your Address .. "
                                value="@if($errors->any()){{old('address')}}@else{{$user->address}}@endif">
                                @error('address')
                                    <div class="alert alert-danger mt-2"> <i class="fas fa-times"></i> {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <input type="password" name="password"
                                value=""
                                class="form-control"
                                placeholder="Enter Your password .. ">
                                @error('password')
                                    <div class="alert alert-danger mt-2"> <i class="fas fa-times"></i> {{ $message }}</div>
                                @enderror
                                <div class="col-md-12 mt-3">
                                    <ul class="password-validate-list">
                                        <li> <i class="fas @error("password") fa-times text-danger @else fa-check text-success @enderror"></i> @lang('site.password_validate1') </li>
                                        <li> <i class="fas @error("password") fa-times text-danger @else fa-check text-success @enderror"></i> @lang('site.password_validate2') </li>
                                        <li> <i class="fas @error("password") fa-times text-danger @else fa-check text-success @enderror"></i> @lang('site.password_validate3') </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-12 mt-3">
                                <input type="file" name="image"
                                class="form-control">
                                @error('image')
                                    <div class="alert alert-danger mt-2"> <i class="fas fa-times"></i> {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mt-3 justify-content-center">
                                <input type="submit" value="@lang('site.update')" class="col-md-6 btn btn-info">
                            </div>
                        </form>
                    </div>

                    <div class="col-md-4">
                        <div class="col-md-12">
                            @if ($user->image)
                                <img src="{{URL("image/users/$user->image")}}" class="profile-image" alt="UserImage" style="width: 70%; display:flex; margin:auto">
                            @else
                                <img src="{{$user->profile_photo_url}}" class="profile-image" alt="UserImage" style="width: 70%; display:flex; margin:auto">
                            @endif
                        </div>

                        <div class="col-12 mt-3">
                            <h3 class="text-center">
                                <i class="fas fa-user"></i>
                                {{$user->name}}
                            </h3>
                        </div>

                        <div class="col-12 mt-3">
                            <h5 class="text-center">
                                <i class="fas fa-at"></i>
                                {{$user->email}}
                            </h5>
                        </div>

                        @if ($user->phone)
                            <div class="col-12 mt-3">
                                <h4 class="text-center">
                                    <i class="fas fa-mobile"></i>
                                    {{$user->phone}}
                                </h4>
                            </div>
                        @endif

                        @if ($user->address)
                            <div class="col-12 mt-3">
                                <h4 class="text-center">
                                    <i class="fas fa-map-marker-alt"></i>
                                    {{$user->address}}
                                </h4>
                            </div>
                        @endif

                    </div>
                </div>
        </div>
    </section>

@endsection
