@extends('layouts.app')

@section('content')
<div >
    <h1>Comments</h1>
    <ul>
        @foreach($comments as $comment)
            <li>{{ $comment->content }} by {{ $comment->user->name }} on <a href="{{ route('posts.show', $comment->post->id) }}">{{ $comment->post->title }}</a></li>
        @endforeach
    </ul>
</div>
@endsection
