@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card form-auth mt-5">
                <div class="card-body">
                    <h2 class="h2 text-center"> @lang('site.register') </h2>
                    <hr>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="name" placeholder="@lang('site.fullname')" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="email" placeholder="@lang('site.email')" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password" placeholder="@lang('site.password')" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password-confirm" placeholder="@lang('site.reset_password')" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 ">
                                <button type="submit" class="col-12 btn btn-primary">
                                    @lang('site.register')
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="or"><span class="btn-round">or</span></div>

                    <div class="clear mt-3"></div>

                    <a href="{{route('google.login')}}">
                        <div class="google-div">
                            <div class="google-btn p-0">
                                <div class="col-md-12 p-0 google-icon-wrapper">
                                    <img class="google-icon mr-2 float-start" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"/>
                                    <p class="text-dark p-0 mt-3"> <b>Sign in with google</b> </p>
                                </div>
                            </div>
                        </div>
                    </a>

                    <div class="clear mt-3"></div>

                    <a href="{{route('fb.login')}}">
                        <div class="fb-div mt-3">
                            <a class="facebook-before" href="{{route('fb.login')}}">
                                <span class="fontawesome-facebook col-md-12"><i class="fab fa-facebook" style="fint-size:1.5em;"></i></span>
                            </a>
                            <a href="{{route('fb.login')}}" class="p-3 text-center facebook text-light btn-link"> Login Using Facbook </a>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
