{{-- <div class="best-sellar">
    <h3 class="mt-3"> @lang('site.best_seller') </h3>
    <div class="col-md-12">
        <div class="row">
            @foreach ($best_items  as $item)
                <div class="row col-md-12  best-box" >
                    <div class="col-md-4 col-sm-4 p-0 mt-2">
                        <a class="portfolio-link" href="{{route('store.item', $item->id)}}">
                            @if ($item->image)
                                <img class="card-img-top image-item" src="{{URL::asset("image/items/$item->image")}}" alt="Card image cap">
                            @else
                                <img src="{{URL::asset("image/items/empty.jpg")}}" class="image-item">
                            @endif
                        </a>
                        </div>
                    <div class="col-md-8 col-sm-8 info">
                        <h6> <a href="{{route('store.item',$item->id)}}">{{$item->name}}</a> </h6>
                        <p> <span class="bold"> @lang('site.price') : </span> {{$item->price}} <del> {{$item->old_price}}  </del> </p>
                        <p> </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="best-sellar">
    <h3 class="mt-3"> @lang('site.other_items') </h3>
    <div class="col-md-12">
        <div class="row">
            @foreach ($other_items  as $item)
                <div class="row col-md-12  best-box mb-2" >
                    <div class="col-md-4 col-sm-4 p-0 mt-2">
                        <a class="portfolio-link" href="{{route('store.item', $item->id)}}">
                            @if ($item->image)
                                <img class="card-img-top image-item" src="{{URL::asset("image/items/$item->image")}}" alt="Card image cap">
                            @else
                                <img src="{{URL::asset("image/items/empty.jpg")}}" class="image-item">
                            @endif
                        </a>
                    </div>
                    <div class="col-md-8 col-sm-8 info">
                        <h6><a href="{{route('store.item',$item->id)}}"> {{$item->name}}</a> </h6>
                        <p> <span class="bold"> @lang('site.price') : </span> {{$item->price}} <del> {{$item->old_price}}  </del> </p>
                        <p> </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div> --}}
