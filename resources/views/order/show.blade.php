@extends('layouts/contentLayoutMaster')

@section('title', 'Order Details')

@section('content')
    <!-- Details -->
    <div class="card">
        <div class="card-body">
            <h5 class="mb-75">Order ID :-</h5>
            <p class="card-text badge badge-glow bg-primary">
                {{$order->orderID}}
            </p>
        </div>
        <div class="card-body">
            <h5 class="mb-75">Product Name :-</h5>
            <p class="card-text badge badge-glow bg-primary">
                {{$order->product->name}}
            </p>
        </div>
        <div class="card-body">
            <h5 class="mb-75">Order Date :-</h5>
            <p class="card-text badge badge-glow bg-primary">
                {{$order->date}}
            </p>
        </div>
    </div>
@endsection
