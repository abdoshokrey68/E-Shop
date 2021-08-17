@extends('store.dashboard.layout.main')

@section('content')
{{-- <div class="error">
    @if (session::has('error'))

    {{$error}}

    @endif
</div> --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                    <i class="fas fa-store"></i>
                    @lang('site.edit_store_info')
                </h1>
            </div>
            <div class="clear"></div>
                <form role="form" action="{{route('dashboard.info.update', $store->id)}}" class="col-md-12" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <input type="radio" class="btn-check" name="status" id="success-outlined" value="1" @if($store->status == 1) checked @endif autocomplete="off" >
                                <label class="btn btn-outline-success col-md-12 col-sm-12" for="success-outlined" style="font-size: 1.5em">@lang('site.store_open')</label>
                            </div>
                            <div class="col-md-4 mb-2">
                                <input type="radio" class="btn-check" name="status" id="danger-outlined" value="0" @if($store->status == 0) checked @endif autocomplete="off">
                                <label class="btn btn-outline-danger col-md-12 col-sm-12" for="danger-outlined" style="font-size: 1.5em">@lang('site.store_update')</label>
                            </div>
                        </div>

                        @error('status')
                            <div style='color:#a94442'>
                                <small>
                                    <i class="fas fa-exclamation-triangle"></i>
                                    {{ $message }}
                                </small>
                            </div>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">
                                    <i class="fas fa-store mr-1"></i>
                                    @lang('site.name') </label>
                        <div class="col-lg-9">
                            <input
                                    name="name"
                                    class="form-control @if($errors->has('name')) is-invalid @endif "
                                    type="text"
                                    value="@if($errors->any()){{old('name')}}@else{{$store->name}} @endif "
                                    required/>
                            @error('name')
                                <div style='color:#a94442'>
                                    <small>
                                        <i class="fas fa-exclamation-triangle"></i>
                                        {{ $message }}
                                    </small>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">
                                    <i class="fas fa-info-circle"></i>
                                    @lang('site.des') </label>
                        <div class="col-lg-9">
                            <textarea
                                class="@if($errors->has('des')) is-invalid @endif "
                                name="des"
                                id="des"
                                cols="30"
                                rows="10"
                                style="width: 100%; height: 150px"
                                required>@if($errors->any()){{old('des')}}@else{{$store->des}}@endif</textarea>
                            @error('des')
                                <div style='color:#a94442'>
                                    <small>
                                        <i class="fas fa-exclamation-triangle"></i>
                                        {{$message}}
                                    </small>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">
                                <i class="fas fa-mobile mr-1"></i>
                                @lang('site.phone') </label>
                        <div class="col-lg-9">
                            <input
                                name="phone"
                                class="form-control  @if($errors->has('phone')) is-invalid @endif "
                                type="text"
                                value="@if($errors->any()) {{old('phone')}} @else  {{$store->phone}} @endif "
                                required/>
                            @error('phone')
                                <div style='color:#a94442'>
                                    <small>
                                        <i class="fas fa-exclamation-triangle"></i>
                                        {{ $message }}
                                    </small>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">
                            <i class="fas fa-envelope-open-text mr-1"></i>
                            @lang('site.email') </label>
                        <div class="col-lg-9">
                            <input
                                name="email"
                                class="form-control @if($errors->has('email')) is-invalid @endif "
                                type="text"
                                value="@if($errors->any()) {{old('email')}} @else  {{$store->email }} @endif "
                                required />
                            @error('email')
                                <div style='color:#a94442'>
                                    <small>
                                        <i class="fas fa-exclamation-triangle"></i>
                                        {{ $message }}
                                    </small>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">
                            <i class="fas fa-map-marker mr-1"></i>
                            @lang('site.address') </label>
                        <div class="col-lg-9">
                            <input
                                name="address"
                                class="form-control @if($errors->has('address')) is-invalid @endif "
                                type="text"
                                value="@if($errors->any()) {{old('address')}} @else  {{$store->address }} @endif "
                                required />
                            @error('address')
                                <div style='color:#a94442'>
                                    <small>
                                        <i class="fas fa-exclamation-triangle"></i>
                                        {{ $message }}
                                    </small>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">
                            <i class="fas fa-map-marker mr-1"></i>
                            @lang('site.currency') </label>
                        <div class="col-lg-9">
                                <select name="currency" id="currency" class="form-control">
                                    @php
                                        $currencys = ['USD', 'EGP', 'SAR', 'EUR'];
                                    @endphp
                                    @foreach ($currencys as $currency)
                                        <option value="{{$currency}}"
                                                @if($errors->any())
                                                    @if(old('currency')==$currency)
                                                        selected
                                                    @endif
                                                @else
                                                    @if($store->currency==$currency)
                                                        selected
                                                    @endif
                                                @endif> {{$currency}} </option>
                                    @endforeach
                                </select>
                            @error('currency')
                                <div style='color:#a94442'>
                                    <small>
                                        <i class="fas fa-exclamation-triangle"></i>
                                        {{ $message }}
                                    </small>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">
                            <i class="fab fa-facebook-square mr-1"></i>
                            Facebook </label>
                        <div class="col-lg-9">
                            <input
                                name="facebook"
                                class="form-control @if($errors->has('facebook')) is-invalid @endif "
                                type="text"
                                value="@if($errors->any()) {{old('facebook')}} @else  {{$store->facebook }} @endif "
                                required />
                            @error('facebook')
                                <div style='color:#a94442'>
                                    <small>
                                        <i class="fas fa-exclamation-triangle"></i>
                                        {{ $message }}
                                    </small>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">
                            <i class="fab fa-twitter-square mr-1"></i>
                            Twitter </label>
                        <div class="col-lg-9">
                            <input
                                name="twitter"
                                class="form-control @if($errors->has('twitter')) is-invalid @endif "
                                type="text"
                                value="@if($errors->any()) {{old('twitter')}} @else  {{$store->twitter }} @endif "
                                required />
                            @error('twitter')
                                <div style='color:#a94442'>
                                    <small>
                                        <i class="fas fa-exclamation-triangle"></i>
                                        {{ $message }}
                                    </small>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">
                            <i class="fab fa-instagram mr-1"></i>
                            Instagram </label>
                        <div class="col-lg-9">
                            <input
                                name="instagram"
                                class="form-control @if($errors->has('instagram')) is-invalid @endif "
                                type="text"
                                value="@if($errors->any()) {{old('instagram')}} @else  {{$store->instagram }} @endif "
                                required />
                            @error('instagram')
                                <div style='color:#a94442'>
                                    <small>
                                        <i class="fas fa-exclamation-triangle"></i>
                                        {{ $message }}
                                    </small>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">
                            <i class="fab fa-linkedin"></i>
                            Linked In </label>
                        <div class="col-lg-9">
                            <input
                                name="linkedin"
                                class="form-control @if($errors->has('linkedin')) is-invalid @endif "
                                type="text"
                                value="@if($errors->any()) {{old('linkedin')}} @else  {{$store->linkedin }} @endif "
                                required />
                            @error('linkedin')
                                <div style='color:#a94442'>
                                    <small>
                                        <i class="fas fa-exclamation-triangle"></i>
                                        {{ $message }}
                                    </small>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="clear"></div>
                    <div class="form-group">
                        <div class="row">
                            <label for="formGroupExampleInput2" class="col-md-3">
                                <i class="fas fa-truck mr-1"></i>
                                @lang('site.delivery')
                            </label>
                            <select class="form-select form-select-lg mb-3 col-md-9" name="delivery" aria-label=".form-select-lg example">
                                <option disabled > @lang('site.delivery') </option>
                                <option value="1" @if ($store->delivery > 0) selected @endif> @lang('site.delivery_av')</option>
                                <option value="0" @if ($store->delivery == 0) selected @endif> @lang('site.delivery_not_av')</option>
                            </select>
                        </div>
                        @error('delivery')
                            <div style='color:#a94442'>
                                <small>
                                    <i class="fas fa-exclamation-triangle"></i>
                                    {{ $message }}
                                </small>
                            </div>
                        @enderror
                    </div>
                    <div class="clear"></div>

                    <div class="form-group">
                        <div class="row">
                            <label for="formGroupExampleInput2" class="col-md-3">
                                <i class="fas fa-gem"></i>
                                @lang('site.payment')
                            </label>
                            <select class="form-select form-select-lg mb-3 col-md-9" name="payment" aria-label=".form-select-lg example">
                                <option disabled > @lang('site.payment') </option>
                                <option value="1" @if ($store->payment > 0) selected @endif> @lang('site.payment_av')</option>
                                <option value="0" @if ($store->payment == 0) selected @endif> @lang('site.payment_not_av')</option>
                            </select>
                        </div>
                        @error('payment')
                            <div style='color:#a94442'>
                                <small>
                                    <i class="fas fa-exclamation-triangle"></i>
                                    {{ $message }}
                                </small>
                            </div>
                        @enderror
                    </div>
                    <div class="clear"></div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">
                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                            @lang('site.store_image')
                        </label>
                        <div class="col-lg-9">
                            <input
                                name="image"
                                class="form-control @if($errors->has('image'))is-invalid @endif"
                                type="file"/>
                            @error('image')
                                <div style='color:#a94442'>
                                    <small>
                                        <i class="fas fa-exclamation-triangle"></i>
                                        {{ $message }}
                                    </small>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="clear"></div>

                    <div class="col-md-6 mb-6 mt-5 ml-auto mr-auto">
                        @if ($store->image)
                        <img src="{{URL::asset("img/stores/$store->image")}}" alt="store-image" class="image-res img-rounded">
                        @else
                        <img src="{{URL::asset("img/stores/default.png")}}" alt="store-image" class="image-res img-rounded">
                        @endif
                    </div>
                    <div class="clear"></div>

                    <div class="form-group row mt-5">
                        <label class="col-lg-3 col-form-label form-control-label"></label>
                        <div class="col-lg-9">
                            <a href="{{route('dashboard', $store->id)}}" class="btn btn-secondary col-md-4 mr-2 ml-2" value="Cancel"> Cancel </a>
                            <input type="submit" class="btn btn-primary col-md-4 mr-2 ml-2" value="Save Changes" />
                        </div>
                    </div>

                </form>

        </div>
    </div>
</div>
@endsection
