<!-- resources/views/categories/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Category: {{ $category->name }}</h1>

    <ul class="list-group mb-3">
        @foreach($posts as $post)
            <li class="list-group-item">
                <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                <p class="mb-0">by {{ $post->user->name }}</p>
            </li>
        @endforeach
    </ul>

    {{ $posts->links() }}
</div>
@endsection
