@extends('layouts.app')

@section('content')
<div class="container">

    <div class="hero">
        <h1>Chào mừng tới trang web của NKhanh</h1>
        <a href="{{ route('posts.index') }}">Xem thêm</a>
    </div>

    <div class="mb-4 d-flex justify-content-between align-items-center">
        <h4>Danh Mục</h4>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="categoryDropdown"
                data-bs-toggle="dropdown" aria-expanded="false">
                {{ request()->query('category') ? $categories->firstWhere('id', request()->query('category'))->name : 'All Categories' }}
            </button>
            <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                <li><a class="dropdown-item" href="{{ route('home') }}">All</a></li>
                @foreach($categories as $category)
                    <li><a class="dropdown-item"
                            href="{{ route('home', ['category' => $category->id]) }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>

    <hr>

    <!-- List of posts -->
    <ul class="d-flex list-unstyled flex-wrap">
        @foreach($posts as $post)
            <li class="border-bottom pb-3 w-50">
                <div class="d-flex align-items-center">
                    <a class="text-decoration-none" href="{{ route('posts.show', $post->id) }}">
                        <img src=" {{ asset('images/' . $post->image) }}" alt="{{ $post->title }}" class="me-3"
                            style="max-width: 150px;">
                    </a>
                    <div>
                        <a href="{{ route('posts.show', $post->id) }}">Tiêu đề:<strong>{{ $post->title }}</strong></a>
                        <p>Tác giả: {{ $post->user->name }}</p>
                        <!-- Add edit/delete buttons here if needed -->

                        <!-- Display truncated content -->
                        <p>
                            {{ \Illuminate\Support\Str::words(strip_tags($post->content), 50, '...') }}
                        </p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>


    <!-- Pagination links -->
    <div>
        {{ $posts->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection