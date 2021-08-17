@extends('store.dashboard.layout.main')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        {{-- <i class="fas fa-cart-plus"> --}}
                        @lang('site.new_categoryb')
                    </h1>
                </div>
                <div class='clear'> </div>

                        <div class="col-md-12">

            <form action="{{route('dashboard.categorys.create', $store->id)}}" method="post">
                @csrf
                    <input type="hidden" class="form-control" name="store_id" value=" {{$store->id}} ">
                <div class="form-group">
                    <label for="formGroupExampleInput"> Name </label>
                    <input type="text" class="form-control @if($errors->has('name')) is-invalid @endif " name="name" id="formGroupExampleInput" placeholder="Item Name" value="{{ old('name') }}">
                    @error('name')
                        <div style='color:#a94442'> <small> <i class="fas fa-exclamation-triangle"></i> {{ $message }} </small> </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2"> Descreption</label>
                    <input type="text" class="form-control @if($errors->has('des')) is-invalid @endif " name="des" id="formGroupExampleInput2" placeholder="Item Descreption" value="{{old('des')}}">
                    @error('des')
                        <div style='color:#a94442'> <small> <i class="fas fa-exclamation-triangle"></i> {{ $message }} </small> </div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <input type="submit" class="form-control btn btn-success" value="Create Category">
                </div>
            </form>
        </div>
            </div>
        </div>
    </div>
</div>
@endsection
