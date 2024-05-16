@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Posts</h1>
    
    <form method="GET" action="{{ route('posts.all') }}">
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category" id="category" class="form-control">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ request('title') }}">
        </div>

        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="author" id="author" class="form-control" value="{{ request('author') }}">
        </div>

        <button type="submit" class="btn btn-primary">Filter</button>
    </form>

    <div class="mt-4">
        @if($posts->count())
            <ul class="list-group">
                @foreach($posts as $post)
                    <li class="list-group-item">
                        <h2>{{ $post->title }}</h2>
                        <p>By {{ $post->user->name }} in {{ $post->category->name }}</p>
                        <p>{{ $post->body }}</p>
                    </li>
                @endforeach
            </ul>
            {{ $posts->links() }}
        @else
            <p>No posts found.</p>
        @endif
    </div>
</div>
@endsection
