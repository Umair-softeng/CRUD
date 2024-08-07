@extends('layouts/contentLayoutMaster')

@section('title', 'Categories Create')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add Category Details</h4>
        </div>
        <div class="card-body">
            <form action="{{route('category.store')}}" class="row gy-1 pt-75 needs-validation" method="POST">
                @csrf
                <div class="mb-2 form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name" class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2 col-form-label">Category Name:</label>
                    <div class="col-12 col-sm-6 col-md-8 col-lg-10 col-xl-10 col-xxl-10">
                        <input type="text" name="name" class="form-control @if($errors->has('name')) is-invalid @endif" value="{{ old('name') }}" placeholder="Enter Category Name">
                        @if($errors->has('name'))
                            <em class="invalid-feedback">
                                {{ $errors->first('name') }}
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


