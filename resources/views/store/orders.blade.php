@extends('store.layout.main')


@section('content')
    <section class="page-section bg-light ">
        <div class="col-md-12 ">
            <user-orders store_id="{{$store_id}}" user_id="{{auth()->user()->id}}" locale="{{app()->getlocale()}}" />
        </div>
    </section>
@endsection
