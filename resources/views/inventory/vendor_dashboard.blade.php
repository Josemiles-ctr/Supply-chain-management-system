@extends('layouts.sidebar')

@section('content')
<div class="container mt-4">
    <h2>Welcome, {{ $vendor->name ?? 'Vendor' }}</h2>
    <p class="text-muted">This is your inventory dashboard.</p>
    <div class="row my-4">
        <div class="col-md-6">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Products</div>
                <div class="card-body">
                    <h3 class="card-title">{{ $vendor->products()->count() }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Latest Product</div>
                <div class="card-body">
                    <h5 class="card-title">
                        {{ optional($vendor->products()->latest()->first())->name ?? 'No products yet' }}
                    </h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
