@extends('layouts.base')

@section('title', 'Categories')

@section('content_body')
    <form method="post" action="{{ route('categories.update', $category->id) }}">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="categoryName">Name</label>
            <input type="text" class="form-control" id="categoryName" name="categoryName"
                   placeholder="Enter category name" value="{{ $category->name }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
