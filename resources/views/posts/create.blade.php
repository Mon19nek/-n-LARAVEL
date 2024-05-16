@extends('layouts.app')

@section('content')
<div>
    <h1>Create Post</h1>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input class="w-100" type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="content">Content:</label>
            <textarea class="w-100" name="content" id="content" required></textarea>
        </div>
        <div>
            <label for="category_id">Category:</label>
            <select name="category_id" id="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="my-3">
            <label class="mb-3" for="image">Image:</label>
            <input class="mb-3" type="file" name="image" id="image">
        </div>
        <button type="submit">Create</button>
    </form>
</div>
@endsection