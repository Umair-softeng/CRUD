@extends('layouts/contentLayoutMaster')

@section('title', 'Product Create')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add Product Details</h4>
        </div>
        <div class="card-body">
            <form action="{{route('product.store')}}" class="row gy-1 pt-75 needs-validation" method="POST">
                @csrf
                <div class="mb-2 form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name" class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2 col-form-label">Product Name:</label>
                    <div class="col-12 col-sm-6 col-md-8 col-lg-10 col-xl-10 col-xxl-10">
                        <input type="text" name="name" class="form-control @if($errors->has('name')) is-invalid @endif" value="{{ old('name') }}" placeholder="Enter Product Name">
                        @if($errors->has('name'))
                            <em class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </em>
                        @endif
                    </div>
                </div>
                <div class="mb-2 form-group row {{ $errors->has('categoryID') ? 'has-error' : '' }}">
                    <label class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2 col-form-label {{ $errors->has('categoryID') ? 'has-error' : '' }}" for="categoryID" style="font-size: 14px">Category</label>
                    <div class="col-12 col-sm-6 col-md-8 col-lg-10 col-xl-10 col-xxl-10">
                        <select class="form-select select2 @if($errors->has('categoryID')) is-invalid @endif" name="categoryID" id="categoryID">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->categoryID}}" {{old('categoryID') == $category->categoryID ? "selected" : ""}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('categoryID'))
                            <em class="invalid-feedback">
                                {{ $errors->first('categoryID') }}
                            </em>
                        @endif
                    </div>
                </div>
                <div class="mb-2 form-group row {{ $errors->has('price') ? 'has-error' : '' }}">
                    <label for="price" class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2 col-form-label">Price:</label>
                    <div class="col-12 col-sm-6 col-md-8 col-lg-10 col-xl-10 col-xxl-10">
                        <input type="number" name="price" class="form-control @if($errors->has('price')) is-invalid @endif" value="{{ old('price') }}" placeholder="Enter Price">
                        @if($errors->has('price'))
                            <em class="invalid-feedback">
                                {{ $errors->first('price') }}
                            </em>
                        @endif
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light" style="float: right">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection


