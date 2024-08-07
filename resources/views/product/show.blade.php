@extends('layouts/contentLayoutMaster')

@section('title', 'Product Details')

@section('content')
    <!-- Details -->
    <div class="card">
        <div class="card-body">
            <h5 class="mb-75">Product ID :-</h5>
            <p class="card-text badge badge-glow bg-primary">
                {{$product->productID}}
            </p>
        </div>
        <div class="card-body">
            <h5 class="mb-75">Product Name :-</h5>
            <p class="card-text badge badge-glow bg-primary">
                {{$product->name}}
            </p>
        </div>
        <div class="card-body">
            <h5 class="mb-75">Category Name :-</h5>
            <p class="card-text badge badge-glow bg-primary">
                {{$product->category->name}}
            </p>
        </div>
    </div>
@endsection
