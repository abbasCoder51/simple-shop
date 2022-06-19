@extends('layouts.base')

@section('title', 'Product - ' . $product->id)

@section('content_body')
    <p><b>ID:</b> {{ $product->id }}</p>
    <p><b>Name:</b> {{ $product->name }}</p>
    <p><b>Quantity:</b> {{ $product->quantity }}</p>
    <p><b>Category:</b> {{ $product->category->name }}</p>
    <p><b>Created At:</b> {{ $product->created_at }}</p>
    <p><b>Updated At:</b> {{ $product->updated_at }}</p>
@endsection
