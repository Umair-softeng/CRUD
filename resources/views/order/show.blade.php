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
            <h5 class="mb-75">Product Category Name :-</h5>
            <p class="card-text badge badge-glow bg-primary">
                {{$order->product->category->name}}
            </p>
        </div>
        <div class="card-body">
            <h5 class="mb-75">Product Price :-</h5>
            <p class="card-text badge badge-glow bg-primary">
                {{$order->product->price}}
            </p>
        </div>
        <div class="card-body">
            <h5 class="mb-75">Quantity :-</h5>
            <p class="card-text badge badge-glow bg-primary">
                {{$order->quantity}}
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
