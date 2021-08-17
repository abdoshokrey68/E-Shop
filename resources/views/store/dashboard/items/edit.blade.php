@extends('store.dashboard.layout.main')

@section('content')


    <div class="container-fluid">
        <div class="col-lg-12">
            <h1 class="page-header"> <i class="fas fa-edit"></i> @lang('site.edit_item') : " {{$item->name}} "</h1>
        </div>
        <div class="col-md-12">

                <form action="{{route('dashboard.items.update', $item->id)}}" method="post">
                    @csrf
                    <input type="hidden" class="form-control" name="store_id" value=" {{$store->id}} ">
                    <div class="form-group">
                        <label for="formGroupExampleInput"> @lang('site.name') </label>
                        <input
                            type="text" class="form-control @if($errors->has('name')) is-invalid @endif "
                            name="name"
                            id="formGroupExampleInput"
                            placeholder="@lang('site.name')"
                            value="@if($errors->any()) {{old('name')}} @else {{$item->name}} @endif">
                        @error('name')
                            <div style='color:#a94442'>
                                <small>
                                    <i class="fas fa-exclamation-triangle"></i>
                                    {{ $message }}
                                </small>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2"> @lang('site.des')</label>
                        <textarea
                            type="text" class="form-control @if($errors->has('des')) is-invalid @endif"
                            name="des">@if($errors->any()){{old('des')}}@else{{$item->des}}@endif</textarea>
                    @error('des')
                        <div style='color:#a94442'>
                            <small>
                                <i class="fas fa-exclamation-triangle"></i>
                                {{ $message }}
                            </small>
                        </div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2"> @lang('site.price') </label>
                        <input
                            type="text" class="form-control @if($errors->has('price')) is-invalid @endif"
                            name="price"
                            id="formGroupExampleInput2"
                            placeholder="@lang('site.des')"
                            value="@if($errors->any()) {{old('price')}} @else {{$item->price}} @endif">
                    @error('price')
                        <div style='color:#a94442'>
                            <small>
                                <i class="fas fa-exclamation-triangle"></i>
                                {{ $message }}
                            </small>
                        </div>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput2"> @lang('site.old_price')</label>
                        <input
                            type="text" class="form-control @if($errors->has('old_price')) is-invalid @endif"
                            name="old_price"
                            id="formGroupExampleInput2"
                            placeholder="@lang('site.old_price')"
                            value="@if($errors->any()) {{old('old_price')}} @else {{$item->old_price}} @endif">
                    @error('old_price')
                        <div style='color:#a94442'>
                            <small>
                                <i class="fas fa-exclamation-triangle"></i>
                                {{ $message }}
                            </small>
                        </div>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput2"> @lang('site.made') </label>
                        <input
                            type="text" class="form-control @if($errors->has('made')) is-invalid @endif"
                            name="made"
                            id="formGroupExampleInput2"
                            placeholder="@lang('site.made')"
                            value="@if($errors->any()) {{old('made')}} @else {{$item->made}} @endif">
                    @error('made')
                        <div style='color:#a94442'>
                            <small>
                                <i class="fas fa-exclamation-triangle"></i>
                                {{ $message }}
                            </small>
                        </div>
                    @enderror
                    </div>

                    {{-- <div class="form-group">
                        <label for="formGroupExampleInput2"> Item Image </label>
                        <input type="file" class="form-control" name="image" id="formGroupExampleInput2">

                        @error('image')
                            <div class="clear"></div>
                            <div style='color:#a94442'> <small> <i class="fas fa-exclamation-triangle"></i> {{ $message }} </small> </div>
                        @enderror
                    </div> --}}

                    {{-- <div class="form-group">
                        <label for="formGroupExampleInput2"> Item Image </label>
                        <input type="file" class="form-control" name="image" id="formGroupExampleInput2" value="{{old('image')}}">
                        <div class="col-md-5">
                            <div class="card">
                                @if ($item->image)
                                    <img src="{{URL::asset("image/items/$item->image")}}">
                                @else
                                    <img src="{{URL::asset("image/items/empty.jpg")}}" class="image-item">
                                @endif
                            </div>
                        </div>
                        <div class="clear"></div>
                        <p style="color: #8b7401; font-weight:bold"> <i class="fas fa-exclamation-triangle"></i> @lang('site.name') </p>
                        @error('image')
                            <div style='color:#a94442'> <small> <i class="fas fa-exclamation-triangle"></i> {{ $message }} </small> </div>
                        @enderror
                    </div> --}}

                    <div class="clear"></div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2"> @lang('site.status') </label>
                        <select class="form-select form-select-lg mb-3" name="status" aria-label=".form-select-lg example">
                            <option value="0" @if ($item->status == 0) selected @endif> @lang('site.available')</option>
                            <option value="1" @if ($item->status == 1) selected @endif> @lang('site.quantity')</option>
                            <option value="2" @if ($item->status == 2) selected @endif> @lang('site.quantity_is_out')</option>
                        </select>
                        @error('status')
                            <div style='color:#a94442'>
                                <small>
                                    <i class="fas fa-exclamation-triangle"></i>
                                    {{ $message }}
                                </small>
                            </div>
                        @enderror
                    </div>


                <div class="form-group">
                    <p> @lang('site.size') </p>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="XS" name="size[]" value="1"  @if(in_array(1, $item_size)) checked @endif>
                        <label class="form-check-label" for="XS"> XS </label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="S" name="size[]" value="2"  @if(in_array(2, $item_size)) checked @endif>
                        <label class="form-check-label" for="S"> S</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="M" name="size[]" value="3"  @if(in_array(3, $item_size)) checked @endif>
                        <label class="form-check-label" for="M"> M</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="L" name="size[]" value="4"  @if(in_array(4, $item_size)) checked @endif>
                        <label class="form-check-label" for="L"> L</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="XL" name="size[]" value="5"  @if(in_array(5, $item_size)) checked @endif>
                        <label class="form-check-label" for="XL"> XL</label>
                    </div>
                    @error('size')
                        <div style='color:#a94442'> <small> <i class="fas fa-exclamation-triangle"></i> {{ $message }} </small> </div>
                    @enderror
                </div>

                <div class="color-item">
                    <label for="color[]">@lang('site.select_color') : </label>
                    @if ($item->color)
                        @foreach ($item_color as $color)
                            <input type="color" name="color[]" id="color-item" value="{{$color}}">
                        @endforeach
                    @endif
                    <a class="btn btn-primary" id="add-color"><i class="fas fa-plus"></i></a>
                    <a class="btn btn-danger" id="clear-color"><i class="fas fa-close"></i></a>
                {{-- <p style="color: #8b7401; font-weight:bold"> <i class="fas fa-exclamation-triangle"></i> Do not select a color if your product does not support multiple Colors </p> --}}
                </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput2"> @lang('site.name') </label>
                        <select class="form-select form-select-lg mb-3 @if($errors->has('category_id')) is-invalid @endif"  name="category_id" aria-label=".form-select-lg example" required>
                                <option value="0"> @lang('site.select_category') </option>
                            @foreach ($store->categorys as $category)
                                <option value="{{$category->id}}" @if ($category->id == $item->category_id) selected @endif> {{$category->name}} </option>
                            @endforeach
                        </select>
                    @error('category_id')
                        <div style='color:#a94442'>
                            <small>
                                <i class="fas fa-exclamation-triangle"></i>
                                {{ $message }}
                            </small>
                        </div>
                    @enderror
                    </div>

                    <div class="col-md-4">
                        <input
                            type="submit" class="form-control btn btn-success" value="Save">
                    </div>
                    {{-- <div class="clear"></div>
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger mt-2"> {{$error}} </div>
                    @endforeach
                    @endif --}}
                </form>


        </div>
    </div>
</div>

@endsection
