@extends('layouts.base')

@section('title', 'Product - ' . $product->name)

@section('content_body')
    <form method="post" action="{{ route('products.update', $product->id) }}">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="productName">Name</label>
            <input type="text" class="form-control" id="productName" name="productName"
                   placeholder="Enter product name" value="{{ $product->name }}">
        </div>
        <div class="form-group">
            <label for="productQuantity">Quantity</label>
            <input type="text" class="form-control" id="productQuantity" name="productQuantity"
                   placeholder="Enter product quantity" value="{{ $product->quantity }}">
        </div>
        <div class="form-group">
            <label for="productCategory">Category</label>
            <select name="productCategory" id="productCategory" class="form-control">
                <option>Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id == $product->category->id) selected @endif>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
