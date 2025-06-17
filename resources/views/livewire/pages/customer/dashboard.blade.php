@extends('layouts.sidebar')

@section('content')
<div class="container">
    <h2>Welcome, {{ Auth::user()->name ?? 'Customer' }}!</h2>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Orders</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $ordersCount ?? 0 }}</h5>
                    <p class="card-text">Total Orders</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Inventory</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $inventoryCount ?? 0 }}</h5>
                    <p class="card-text">Items in Inventory</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">Profile</div>
                <div class="card-body">
                    <h5 class="card-title">{{ Auth::user()->email ?? 'Email' }}</h5>
                    <p class="card-text">Account Email</p>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-header">Recent Orders</div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentOrders ?? [] as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->order_date }}</td>
                            <td>{{ $order->status }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="3">No recent orders.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
