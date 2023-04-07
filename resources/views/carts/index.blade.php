@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h1>My Cart</h1>

        <div class="row mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if($cart && $cart->products->isNotEmpty())
                            <ul class="list-group list-group-flush">
                                @foreach($cart->products as $product)
                                    <li class="list-group-item">{{ $product->name }} - ${{ $product->price }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p>Your cart is empty.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
