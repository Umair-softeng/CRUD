@extends('layouts/contentLayoutMaster')

@section('title', 'Order Edit')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add Order Details</h4>
        </div>
        <div class="card-body">
            <form action="{{route('order.update', $order->orderID)}}" class="row gy-1 pt-75 needs-validation" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-2 form-group row {{ $errors->has('productID') ? 'has-error' : '' }}">
                    <label class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2 col-form-label {{ $errors->has('productID') ? 'has-error' : '' }}" for="productID" style="font-size: 14px">Product</label>
                    <div class="col-12 col-sm-6 col-md-8 col-lg-10 col-xl-10 col-xxl-10">
                        <select class="form-select select2 @if($errors->has('productID')) is-invalid @endif" name="productID" id="productID">
                            <option value="">Select Product</option>
                            @foreach($products as $product)
                                <option value="{{$product->productID}}" {{$order->productID == $product->productID ? "selected" : ""}}>{{$product->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('productID'))
                            <em class="invalid-feedback">
                                {{ $errors->first('productID') }}
                            </em>
                        @endif
                    </div>
                </div>
                <div class="mb-2 form-group row {{ $errors->has('quantity') ? 'has-error' : '' }}">
                    <label for="quantity" class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2 col-form-label" style="font-size: 14px">Quantity:</label>
                    <div class="col-12 col-sm-6 col-md-8 col-lg-10 col-xl-10 col-xxl-10">
                        <input type="number" name="quantity" class="form-control @if($errors->has('quantity')) is-invalid @endif" value="{{ old('quantity', $order->quantity) }}" placeholder="Enter Quantity">
                        @if($errors->has('quantity'))
                            <em class="invalid-feedback">
                                {{ $errors->first('quantity') }}
                            </em>
                        @endif
                    </div>
                </div>
                <div class="mb-2 form-group row {{ $errors->has('date') ? 'has-error' : '' }}">
                    <label for="date" class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2 col-form-label" style="font-size: 14px">Date:</label>
                    <div class="col-12 col-sm-6 col-md-8 col-lg-10 col-xl-10 col-xxl-10">
                        <input type="date" name="date" class="form-control @if($errors->has('date')) is-invalid @endif" value="{{ old('date', $order->date) }}" placeholder="Enter Date">
                        @if($errors->has('date'))
                            <em class="invalid-feedback">
                                {{ $errors->first('date') }}
                            </em>
                        @endif
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light" style="float: right">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection


