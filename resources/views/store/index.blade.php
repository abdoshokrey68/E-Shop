@extends('store.layout.main')


@section('content')
    <section>
        <front-items currency="{{$store->currency}}" store_id="{{$store_id}}" locale="{{app()->getLocale()}}"/>
    </section>
@endsection
