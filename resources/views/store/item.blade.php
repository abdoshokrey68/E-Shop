@extends('store.layout.main')


@section('content')
    <section class="page-section bg-light">
            <div class="col-md-12">
                <item-info item_id="{{$item->id}}" locale="{{app()->getLocale()}}" />
            </div>
            <div class="col-md-12 mt-4">
                <best-items locale="{{app()->getLocale()}}" />
            </div>
    </section>
@endsection
