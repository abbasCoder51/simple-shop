@extends('layouts.base')

@section('title', 'Create Category')

@section('content_body')
    <form method="post" action="{{ route('categories.store') }}">
        @csrf
        <div class="form-group">
            <label for="categoryName">Name</label>
            <input type="text" class="form-control" id="categoryName" name="categoryName"
                   placeholder="Enter category name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
