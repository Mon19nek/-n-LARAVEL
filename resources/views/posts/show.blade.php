@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials.breadcrumb')
    <h1 class="post-title">{{ $post->title }}</h1>
    @if($post->image)
        <img src="{{ asset('images/' . $post->image) }}" alt="Post Image" class="post-image">
    @endif
    <div class="post-info">
        <p>Tác giả: {{ $post->user->name }}</p>
        <p>Danh Mục:
            {{ $post->category->name }}
        </p>
        <p>{{ $post->content }}</p>
    </div>

    <div class="comments-section">
        <h2>Comments</h2>
        <ul>
            @foreach($post->comments as $comment)   
                <li class="comment">
                    <p>{{ $comment->content }} by {{ $comment->user->name }}</p>
                </li>
            @endforeach
        </ul>
    </div>

    @auth
        <div class="form-container w-50">
            <form class="m-0" action="{{ route('comments.store') }}" method="POST">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="form-group">
                    <label for="content" class="form-label">Comment:</label>
                    <textarea name="content" id="content" class="form-input" required></textarea>
                </div>
                <button type="submit" class=" w-50 form-button">Add Comment</button>
            </form>
        </div>
    @endauth
</div>
@endsection