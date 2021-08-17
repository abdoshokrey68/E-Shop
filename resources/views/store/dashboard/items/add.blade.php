@extends('store.dashboard.layout.main')

@section('content')

    <div class="container-fluid">
        <div class="col-lg-12">
            <h1 class="page-header"> <i class="fas fa-cart-plus"></i> @lang('site.new_item') </h1>
        </div>

        <div class="col-md-12">

            <form action="{{route('dashboard.items.create', $store->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                    <input type="hidden" class="form-control" name="store_id" value=" {{$store->id}} ">
                <div class="form-group">
                    <label for="formGroupExampleInput"> @lang('site.name') </label>
                    <input type="text" class="form-control @if($errors->has('name')) is-invalid @endif " name="name" id="formGroupExampleInput" placeholder=" @lang('site.name') " value="{{ old('name') }}">
                    @error('name')
                        <div style='color:#a94442'> <small> <i class="fas fa-exclamation-triangle"></i> {{ $message }} </small> </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2"> @lang('site.des')</label>
                    <input type="text" class="form-control @if($errors->has('des')) is-invalid @endif " name="des" id="formGroupExampleInput2" placeholder=" @lang('site.des') " value="{{old('des')}}">
                    @error('des')
                        <div style='color:#a94442'> <small> <i class="fas fa-exclamation-triangle"></i> {{ $message }} </small> </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2"> @lang('site.price') </label>
                    <input type="text" class="form-control @if($errors->has('price')) is-invalid @endif " name="price" id="formGroupExampleInput2" placeholder=" @lang('site.price') " value="{{old('price')}}">
                    @error('price')
                        <div style='color:#a94442'> <small> <i class="fas fa-exclamation-triangle"></i> {{ $message }} </small> </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput2"> @lang('site.old_price')</label>
                    <input type="text" class="form-control @if($errors->has('old_price')) is-invalid @endif " name="old_price" id="formGroupExampleInput2" placeholder="@lang('site.old_price')" value="{{old('old_price')}}">
                    @error('old_price')
                        <div style='color:#a94442'> <small> <i class="fas fa-exclamation-triangle"></i> {{ $message }} </small> </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput2"> @lang('site.store_image') </label>
                    <input type="file" class="form-control" name="image" id="formGroupExampleInput2" value="{{old('image')}}">

                    @error('image')
                        <div style='color:#a94442'> <small> <i class="fas fa-exclamation-triangle"></i> {{ $message }} </small> </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput2"> @lang('site.made') </label>
                    <input type="text" class="form-control @if($errors->has('made')) is-invalid @endif " name="made" id="formGroupExampleInput2" placeholder="@lang('site.made')" value="{{old('name')}}">
                    @error('made')
                        <div style='color:#a94442'> <small> <i class="fas fa-exclamation-triangle"></i> {{ $message }} </small> </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput2"> @lang('site.status') </label>
                    <select class="form-select form-select-lg mb-3 @if($errors->has('status')) is-invalid @endif" name="status" aria-label=".form-select-lg example">
                        <option value="0" @if (old('status') == 1) selected @else selected @endif >@lang('site.available')</option>
                        <option value="1" @if (old('status') == 1) selected @endif>@lang('site.quantity')</option>
                        <option value="2" @if (old('status') == 2) selected @endif>@lang('site.quantity_is_out')</option>
                    </select>
                    @error('status')
                        <div style='color:#a94442'> <small> <i class="fas fa-exclamation-triangle"></i> {{ $message }} </small> </div>
                    @enderror
                </div>

                <div class="form-group">
                    <p> @lang('site.size') </p>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="XS" name="size[]" value="1" >
                        <label class="form-check-label" for="XS"> XS </label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="S" name="size[]" value="2" >
                        <label class="form-check-label" for="S"> S</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="M" name="size[]" value="3" >
                        <label class="form-check-label" for="M"> M</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="L" name="size[]" value="4" >
                        <label class="form-check-label" for="L"> L</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="XL" name="size[]" value="5" >
                        <label class="form-check-label" for="XL"> XL</label>
                    </div>
                    <p style="color: #8b7401; font-weight:bold"> <i class="fas fa-exclamation-triangle"></i> Do not specify a value if your product does not support multiple sizes  </p>
                    @error('size')
                        <div style='color:#a94442'> <small> <i class="fas fa-exclamation-triangle"></i> {{ $message }} </small> </div>
                    @enderror
                </div>

                <div class="color-item">
                    <label for="color[]">  @lang('site.select_color') : </label>
                    <a class="btn btn-primary" id="add-color"><i class="fas fa-plus"></i></a>
                    <a class="btn btn-danger" id="clear-color"><i class="fas fa-close"></i></a>
                    <p style="color: #8b7401; font-weight:bold"> <i class="fas fa-exclamation-triangle"></i> Do not select a color if your product does not support multiple Colors </p>
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput2"> @lang('site.category') </label>
                    <select required class="form-select form-select-lg mb-3 @if($errors->has('category_id')) is-invalid @endif "  name="category_id" aria-label=".form-select-lg example" required>
                            <option selected disabled> @lang('site.category') </option>
                        @foreach ($store->categorys as $category)
                            <option value="{{$category->id}}" @if (old('category_id') == $category->id) selected @endif> {{$category->name}} </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div style='color:#a94442'> <small> <i class="fas fa-exclamation-triangle"></i> {{ $message }} </small> </div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <input type="submit" class="form-control btn btn-success" value="@lang('site.new_item')">
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
