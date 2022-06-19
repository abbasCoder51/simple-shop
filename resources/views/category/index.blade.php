@extends('layouts.base')

@section('title', 'Categories')

@section('content_body')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div style="padding: 20px; display: flex; justify-content: flex-end;">
        <a href="{{ route('categories.create') }}" class="btn btn-info">Create Category</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Create At</th>
                <th scope="col">Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td><a href="{{ route('categories.show', $category->id) }}">{{ $category->id }}</a></td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>{{ $category->updated_at }}</td>
                    <td>
                        <a href="{{ route('categories.show', $category->id) }}" class="btn btn-primary">Show</a>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                        <form method="POST" action="{{ route('categories.destroy', $category->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form></td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No results found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
