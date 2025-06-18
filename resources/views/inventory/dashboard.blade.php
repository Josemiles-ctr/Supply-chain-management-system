{{-- filepath: resources/views/inventory/dashboard.blade.php --}}
@extends('layouts.sidebar')

@section('content')
<div class="container mt-4">
    <h2>Welcome to Inventory Dashboard</h2>
    <p class="text-muted">Monitor your stock and inventory performance in real time.</p>

    <div class="row my-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Products</div>
                <div class="card-body">
                    <h3 class="card-title">{{ $productsCount }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Total Stock</div>
                <div class="card-body">
                    <h3 class="card-title">{{ $totalStock }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">Stock Value</div>
                <div class="card-body">
                    <h3 class="card-title">₦{{ number_format($stockValue, 2) }}</h3>
                </div>
            </div>
        </div>
    </div>

    <h4>Recent Products</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Stock</th>
                <th>Unit Price</th>
                <th>Last Updated</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recentProducts as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->currentStock() }}</td>
                <td>₦{{ number_format($product->price, 2) }}</td>
                <td>{{ $product->updated_at->diffForHumans() }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection