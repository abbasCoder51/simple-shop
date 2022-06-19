@extends('layouts.base')

@section('title', 'Create Product')

@section('content_body')
    <form method="post" action="{{ route('products.store') }}">
        @csrf
        <div class="form-group">
            <label for="productName">Name</label>
            <input type="text" class="form-control" id="productName" name="productName"
                   placeholder="Enter product name">
        </div>
        <div class="form-group">
            <label for="productQuantity">Quantity</label>
            <input type="text" class="form-control" id="productQuantity" name="productQuantity"
                   placeholder="Enter product quantity">
        </div>
        <div class="form-group">
            <label for="productCategory">Category</label>
            <select name="productCategory" id="productCategory" class="form-control">
                <option>Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
