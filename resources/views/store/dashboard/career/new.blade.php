@extends('store.dashboard.layout.main')

@section('content')
{{-- <div class="error">
    @if (session::has('error'))

    {{$error}}

    @endif
</div> --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-5">
                <h1 class="page-header ">
                    <i class="fas fa-store"></i>
                    @lang('site.edit_store_info')
                </h1>
            </div>
            <div class="clear"></div>
                <form action="{{route('dashboard.career.create', $store->id)}}" class="col-md-12" method="post">
                    @csrf
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">
                                    <i class="fas fa-store mr-1"></i>
                                    @lang('site.name') </label>
                        <div class="col-lg-9 p-0">
                            <input
                                    name="name"
                                    class="form-control @if($errors->has('name')) is-invalid @endif "
                                    type="text"
                                    value="{{old('name')}}"
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
                                    <i class="fas fa-dollar mr-1"></i>
                                    @lang('site.price') </label>
                        <div class="col-lg-9 p-0">
                            <input
                                    name="salary"
                                    class="form-control @if($errors->has('salary')) is-invalid @endif "
                                    type="number"
                                    value="{{old('salary')}}"
                                    required/>
                                    <div class="col-md-12">
                                        <p class="text-primary">
                                            <strong>
                                                <i class="fas fa-info"></i>
                                                @lang('site.salary_info')
                                            </strong>
                                        </p>
                                    </div>
                            @error('salary')
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
                        <div class="col-lg-9 p-0">
                            <textarea
                                class="@if($errors->has('des')) is-invalid @endif "
                                name="des"
                                id="des"
                                cols="30"
                                rows="10"
                                style="width: 100%; height: 150px"
                                required>{{old('des')}}</textarea>
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
                    <div class="clear"></div>


                    <div class="form-group">
                        <div class="row">
                            <label for="formGroupExampleInput2" class="col-md-3">
                                <i class="fas fa-gem"></i>
                                @lang('site.career_system')
                            </label>
                            <select class="form-select form-select-lg mb-3 col-md-9" style="font-size: 1.2em" name="career_system" aria-label=".form-select-lg example">
                                <option selected disabled > @lang('site.career_system') </option>
                                <option value="0" @if (old('career_system') == 0) selected @endif> @lang('site.unlimited_period')</option>
                                <option value="1" @if (old('career_system') == 1) selected @endif> @lang('site.limited_time')</option>
                                <option value="2" @if (old('career_system') == 2) selected @endif> @lang('site.employment_contract')</option>
                            </select>
                        </div>
                        @error('career_system')
                            <div style='color:#a94442'>
                                <small>
                                    <i class="fas fa-exclamation-triangle"></i>
                                    {{ $message }}
                                </small>
                            </div>
                        @enderror
                    </div>
                    <div class="clear"></div>

                    <div class="form-group row mt-5">
                        <label class="col-lg-3 col-form-label form-control-label"></label>
                        <div class="col-lg-9">
                            <a href="{{route('dashboard', $store->id)}}" class="btn btn-secondary col-md-4 mr-2 ml-2" value="Cancel"> @lang('site.cancel') </a>
                            <input type="submit" class="btn btn-primary col-md-4 mr-2 ml-2" value="@lang('site.add_career')" />
                        </div>
                    </div>

                </form>

        </div>
    </div>
</div>
@endsection
