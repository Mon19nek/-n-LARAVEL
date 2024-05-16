@extends('layouts.app')

@section('content')
<div >
    <h1>Create Comment</h1>
    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <div>
            <label for="post_id">Post:</label>
            <select name="post_id" id="post_id" required>
                @foreach($posts as $post)
                    <option value="{{ $post->id }}">{{ $post->title }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="content">Content:</label>
            <textarea name="content" id="content" required></textarea>
        </div>
        <button type="submit">Create</button>
    </form>
</div>
@endsection
