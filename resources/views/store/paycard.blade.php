@section('main')

<script src="https://test.oppwa.com/v1/paymentWidgets.js?checkoutId={{$responseData->id}}"></script>

<form action="{{route('store.orders', $store_id)}}" class="paymentWidgets" data-brands="VISA MASTER AMEX"></form>

@endsection
