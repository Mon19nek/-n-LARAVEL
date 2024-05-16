@extends('layouts.app')

@section('content')
<div class="container">
    <div class="hero">
        <h1>Chào mừng tới trang web của NKhanh</h1>
        <a href="{{ route('posts.index') }}">Xem thêm</a>
    </div>

    <div class="category-dropdown mb-4">
        <h4>Danh Mục</h4>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="categoryDropdown"
                data-bs-toggle="dropdown" aria-expanded="false">
                {{ request()->query('category') ? $categories->firstWhere('id', request()->query('category'))->name : 'All Categories' }}
            </button>
            <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                <li><a class="dropdown-item" href="{{ route('posts.index') }}">All</a></li>
                @foreach($categories as $category)
                    <li><a class="dropdown-item"
                            href="{{ route('posts.index', ['category' => $category->id]) }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>

    <hr>

    <!-- Danh sách bài đăng đã lọc -->
    <ul class="posts-list flex-wrap d-flex">
        @foreach($posts as $post)
            <li class="post-item w-50">
                <div class="d-flex align-items-center">
                    @if($post->image)
                        <img src="{{ asset('images/' . $post->image) }}" alt="{{ $post->title }}" class="me-3">
                    @endif
                    <div class="post-content">
                        <a href="{{ route('posts.show', $post->id) }}"
                            >Tiêu đề:<strong>{{ $post->title }}</strong></a>
                        <p class="author">Tác giả: {{ $post->user->name }}</p>
                        <!-- Display truncated content -->
                        <p>
                            {{ \Illuminate\Support\Str::words(strip_tags($post->content), 100, '...') }}
                        </p>
                        <!-- Actions (Edit/Delete) for authenticated users -->
                        @if(Auth::check() && (Auth::id() === $post->user_id || Auth::user()->is_admin))
                            <div class="actions">
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </li>
        @endforeach
    </ul>

    <!-- Hiển thị phân trang -->
    <div class="pagination">
        {{ $posts->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection