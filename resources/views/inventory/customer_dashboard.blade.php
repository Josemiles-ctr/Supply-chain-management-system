@extends('layouts.sidebar')

@section('content')
<div class="container mt-4">
    <h2>Welcome, {{ $customer->name ?? 'Customer' }}</h2>
    <p class="text-muted">This is your inventory dashboard.</p>
    <div class="row my-4">
        <div class="col-md-6">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Orders</div>
                <div class="card-body">
                    <h3 class="card-title">{{ $customer->orders()->count() }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Recent Order</div>
                <div class="card-body">
                    <h5 class="card-title">
                        {{ optional($customer->orders()->latest()->first())->status ?? 'No orders yet' }}
                    </h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
