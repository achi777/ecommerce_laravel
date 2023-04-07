@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Thank you!') }}</div>

                    <div class="card-body">
                        <p>{{ __('Your order has been placed successfully.') }}</p>
                        <p>{{ __('Order ID') }}: {{ $order->id }}</p>
                        <p>{{ __('Name') }}: {{ $order->name }}</p>
                        <p>{{ __('Email') }}: {{ $order->email }}</p>
                        <p>{{ __('Address') }}: {{ $order->address }}</p>
                        <p>{{ __('Total price') }}: {{ $order->total_price }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
