@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $product->name }}</div>

                    <div class="card-body">
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text"><small class="text-muted">{{ __('Price') }}: {{ $product->price }}</small></p>
                        <form action="{{ route('carts.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <button type="submit" class="btn btn-primary">{{ __('Add to cart') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
