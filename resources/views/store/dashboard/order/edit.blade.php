@extends('store.dashboard.layout.main')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <i class="fas fa-edit"> </i>
                        Edit Category ' {{$category->name}} '
                    </h1>
                </div>
                <div class='clear'> </div>

                        <div class="col-md-12">

            <form action="{{route('dashboard.categorys.update', $store->id)}}" method="post">
                @csrf
                    <input type="hidden" class="form-control" name="store_id" value=" {{$store->id}} ">
                <div class="form-group">
                    <label for="formGroupExampleInput"> Name </label>
                    <input type="text" class="form-control @if($errors->has('name')) is-invalid @endif " name="name" id="formGroupExampleInput" placeholder="Item Name" value="@if($errors->any()){{old('name')}}@else{{$category->name}} @endif">
                    @error('name')
                        <div style='color:#a94442'> <small> <i class="fas fa-exclamation-triangle"></i> {{ $message }} </small> </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2"> Descreption</label>
                    <input type="text" class="form-control @if($errors->has('des')) is-invalid @endif " name="des" id="formGroupExampleInput2" placeholder="Item Descreption" value="@if($errors->any()){{old('des')}}@else{{$category->des}} @endif">
                    @error('des')
                        <div style='color:#a94442'> <small> <i class="fas fa-exclamation-triangle"></i> {{ $message }} </small> </div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <input type="submit" class=" btn btn-success col-md-4 mb-2" value=" Save ">
                    <a href="{{route('dashboard.categorys.delete', $category->id)}}" class="btn btn-danger col-md-4 offset-md-1 mb-2" style="color: #000">
                        <i class="fas fa-trash"></i>
                        Delete
                    </a>
                </div>
            </form>
        </div>
            </div>
        </div>
    </div>
</div>
@endsection
