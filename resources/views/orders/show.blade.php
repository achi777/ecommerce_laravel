@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Order Details') }}</div>

                    <div class="card-body">
                        <p><strong>{{ __('Order ID') }}:</strong> {{ $order->id }}</p>
                        <p><strong>{{ __('Name') }}:</strong> {{ $order->name }}</p>
                        <p><strong>{{ __('Email') }}:</strong> {{ $order->email }}</p>
                        <p><strong>{{ __('Address') }}:</strong> {{ $order->address }}</p>
                        <p><strong>{{ __('Total price') }}:</strong> {{ $order->total_price }}</p>

                        <h4>{{ __('Order Items') }}</h4>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ __('Product') }}</th>
                                <th>{{ __('Quantity') }}</th>
                                <th>{{ __('Price') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($order->items as $item)
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->price }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
