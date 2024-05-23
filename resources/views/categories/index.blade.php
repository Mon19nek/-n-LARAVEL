@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tất cả danh mục</h1>
    <div class="category-list">
        @foreach($categories as $category)
            <div class="category-item position-relative">
                <div class="category- d-flex flex-column">
                    <h5 class="category-name">{{ $category->name }}</h5>
                    <div>
                        <ul class="list-unstyled">
                            <div class="overflow-auto h-150"  >
                            @foreach($category->posts as $post)
                                <li >
                                    <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                                </li>
                            @endforeach
                            </div>
                        </ul>
                        <div class="category-actions d-flex position-absolute bottom-0 ">
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-primary">Sửa</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this category?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Xoá</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection