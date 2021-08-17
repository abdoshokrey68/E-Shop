@extends('store.layout.main')

@section('content')
    <div class="container">
        <header class="section-header">
            <h2> Odit </h2>
            <p>Odit est perspiciatis laborum et dicta</p>
        </header>
        <hr>
        <div class="row">
            <div class="col-md-9">
                <div class="col-md-12 mt-5">
                    <category-items store_id="{{$store_id}}" locale="{{app()->getLocale()}}"/>
                </div>
            </div>
            <div class="col-md-3">
                <category-bests store_id="{{$store_id}}" locale="{{app()->getLocale()}}" />
            </div>
        </div>
    </div>
@endsection

