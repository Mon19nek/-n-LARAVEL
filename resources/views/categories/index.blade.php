@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Categories</h1>
    <div class="category-list">
        @foreach($categories as $category)
        <div class="category-item">
            <div class="category-info">
                <h5 class="category-name">{{ $category->name }}</h5>
                <div class="category-actions d-flex">
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this category?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
