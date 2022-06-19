@extends('layouts.base')

@section('title', 'Categories')

@section('content_body')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div style="padding: 20px; display: flex; justify-content: flex-end;">
        <a href="{{ route('products.create') }}" class="btn btn-info">Create Product</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Category</th>
            <th scope="col">Create At</th>
            <th scope="col">Updated At</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($products as $product)
            <tr>
                <td><a href="{{ route('products.show', $product->id) }}">{{ $product->id }}</a></td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->created_at }}</td>
                <td>{{ $product->updated_at }}</td>
                <td>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Show</a>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                    <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form></td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">No results found</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
