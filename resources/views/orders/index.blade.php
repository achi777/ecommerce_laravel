@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Orders') }}</div>

                    <div class="card-body">
                        @if (count($orders) > 0)
                            <ul class="list-group">
                                @foreach ($orders as $order)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ $order->name }}
                                        <span class="badge bg-primary rounded-pill">{{ $order->total_price }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="card-text">{{ __('You have not placed any orders yet') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
