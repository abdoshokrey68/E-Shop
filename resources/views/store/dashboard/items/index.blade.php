@extends('store.dashboard.layout.main')
{{--
    === The WareHouse Page ===

    ** Items Controller
    ** Categorys Controller

--}}
@section('content')

    <div class="container-fluid">
        <div class="col-lg-12 mt-2">
            <h1 class="page-header"> <i class="fa fa-industry"></i> @lang('site.warehouse') </h1>
        </div>
        <div class="clear"></div>
        @if (Session::has('success'))
            <div class="alert alert-success"> {{session::get('success')}} </div>
        @endif
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-dark">
                    <div class="panel-body">


                        <div class="row mb-3">
                            <a href="{{route('dashboard.items.add', $store->id)}}" class="btn col-md-4 offset-md-1 mb-3" style="background: #16a085"> <h4>@lang('site.new_item')</h4> </a>
                            <a href="{{route('dashboard.categorys.add', $store->id)}}" class="btn col-md-4 offset-md-1 mb-3" style="background: #3498db"> <h4>@lang('site.new_category')</h4> </a>
                        </div>

                        {{-- Start Categorys Show --}}
                        @foreach ($store->categorys as $category)

                            <div class="panel-heading header-control col-md-12" style="background: #2c3e50; color:#fff;">
                                    <div class="btn btn-link bg-secondary bold text-light" data-toggle="collapse" data-target="#collapseOne{{$category->id}}" aria-expanded="true" aria-controls="collapseOne">
                                        <h4>
                                            <i class="fa fa-dedent fa-5"></i>
                                            {{$category->name}}
                                        </h4>
                                        <div class="control-btn float-right">
                                            <a href="{{route('dashboard.categorys.edit', $category->id)}}" class="btn btn-success">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter{{$category->id}}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                            <div class="modal fade" id="exampleModalCenter{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content panel panel-red">
                                                        <div class="modal-header panel-heading">
                                                        <h5 class="modal-title" id="exampleModalLongTitle"> @lang('site.delete_category') </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @lang('site.confirm_delete_category')
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                        <a href="{{route('dashboard.categorys.delete', $category->id)}}" class="btn btn-danger" style="color: #000">
                                                            <i class="fas fa-trash"></i>
                                                            @lang('site.delete')
                                                        </a>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                            </div>

                            <div class="clear"></div>
                            <div class="row card-body collapse show" style="height: 0px; overflow: hidden;" id="collapseOne{{$category->id}}" aria-labelledby="headingOne" data-parent="#accordion">
                                @foreach ($store->items as $item)
                                    @if ($item->category_id == $category->id)
                                        <div class="card edit-card-control col-md-3" style="margin-bottom: 15px">
                                            <div>
                                                @if ($item->image)
                                                    <img class="card-img-top image-item" src="{{URL::asset("image/items/$item->image")}}" alt="Card image cap">
                                                @else
                                                    <img src="{{URL::asset("image/items/empty.jpg")}}" class="image-item">
                                                @endif
                                                <div class="col-md-12">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{$item->name}}</h5>
                                                        <p class="card-text"><small class="text-muted"> @lang('site.price'): {{$item->price}} </small></p>
                                                        <p class="card-text"><small class="text-muted"> {{$item->date}} </small></p>
                                                        <div class="row">
                                                            <div class="col">
                                                                <a href="{{route('dashboard.items.edit', $item->id)}}" class="col-md-12 btn btn-success">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                            </div>
                                                            <div class="col">
                                                                <button type="button" class="btn btn-danger  col-md-12" data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                                <div class="modal fade" id="exampleModalCenter{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                                        <div class="modal-content panel panel-red">
                                                                            <div class="modal-header panel-heading">
                                                                            <h5 class="modal-title" id="exampleModalLongTitle"> @lang('site.delete_item') </h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                @lang('site.confirm_delete_item') {{$item->name}}
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('site.close')</button>
                                                                            <a href="{{route('dashboard.items.delete', $item->id)}}" class="btn btn-danger" style="color: #000">
                                                                                <i class="fas fa-trash"></i>
                                                                                @lang('site.delete')
                                                                            </a>
                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endforeach
                        {{-- End Categorys Show --}}
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

@endsection
