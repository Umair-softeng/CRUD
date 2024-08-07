@extends('layouts/contentLayoutMaster')

@section('title', 'Categories Details')

@section('content')
        <!-- Details -->
        <div class="card">
            <div class="card-body">
                <h5 class="mb-75">Name :-</h5>
                <p class="card-text badge badge-glow bg-primary">
                    {{$category->name}}
                </p>
            </div>
        </div>
@endsection
