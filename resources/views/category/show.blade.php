@extends('layouts.base')

@section('title', 'Category - ' . $category->id)

@section('content_body')
    <p><b>ID:</b> {{ $category->id }}</p>
    <p><b>Created At:</b> {{ $category->created_at }}</p>
    <p><b>Updated At:</b> {{ $category->updated_at }}</p>
@endsection
