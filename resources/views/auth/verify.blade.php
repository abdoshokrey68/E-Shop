@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card form-auth">
                <div class="card-header">@lang('site.verification_email')</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            @lang('site.link_verification ')
                        </div>
                    @endif

                    @lang('site.before_proceeding')
                    @lang('site.not_receive')
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">@lang('site.request_another') </button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
