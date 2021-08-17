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
                    <i class="fas fa-briefcase"></i>
                    @lang('site.career')
                </h1>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-12 p-0">
                            <a href="{{route('dashboard.career.new', $store->id)}}" class="btn btn-primary col-md-12 p-4">
                                <i class="fas fa-plus"></i>
                                @lang('site.new_career')
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                @foreach ($store->careers as $career)
                    <div class="col-md-12 card mt-4">

                        <h3 class="h3"> <strong> @lang('site.career_name') :</strong> {{$career->name}} </h3>

                        <p> {{$career->date}} </p>

                        <hr class="m-1">

                        <h4 class="h4" style="line-height:35px"> <strong> @lang('site.career_des') : </strong> {{$career->des}} </h4>

                        <div class="">
                            <a href="{{route('dashboard.career.edit', $career->id)}}" class="btn btn-success">
                                <i class="fas fa-edit"></i>
                                @lang('site.edit')
                            </a>
                            <a href="{{route('dashboard.career.delete', $career->id)}}" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                                @lang('site.delete')
                            </a>
                            {{-- @if ($career->status == 1)
                                <a href="{{route('dashboard.career.status_n_av', $career->id)}}" class="btn btn-primary">
                                    <i class="fas fa-times"></i>
                                    @lang('site.job_not_available')
                                </a>
                            @endif
                            @if ($career->status == 0)
                                <a href="{{route('dashboard.career.status_av', $career->id)}}" class="text-dark btn btn-warning">
                                    <i class="fas fa-hourglass-end"></i>
                                    @lang('site.job_available')
                                </a>
                            @endif --}}
                        </div>

                        <h4 class="h4" style="line-height:35px">
                            <strong> @lang('site.career_system') : </strong>
                            @if ($career->career_system == 0)
                                @lang('site.unlimited_period')
                            @endif
                            @if ($career->career_system == 1)
                                @lang('site.limited_time')
                            @endif
                            @if ($career->career_system == 2)
                                @lang('site.employment_contract')
                            @endif
                        </h4>

                        <h4 class="p-4 h4 mt-2 text-warning text-center bg-dark">
                            <strong> @lang('site.price') : </strong> {{$career->salary}}
                        </h4>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
