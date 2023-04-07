@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Products') }}</div>

                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($products as $product)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                    <span class="badge bg-primary rounded-pill">{{ $product->price }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
