@extends('layouts.app')

@section('content')
<div class="container">
    <div class="hero">
        <h1>Chào mừng tới trang web của NKhanh</h1>
        <a href="{{ route('posts.index') }}">Xem thêm</a>
    </div>

    <h1 class="mt-4 mb-3">My Posts</h1>

    <!-- Danh sách bài đăng của người dùng đã đăng nhập -->
    <ul class="list-unstyled d-flex flex-wrap">
        @foreach($posts as $post)
            <li class="border-bottom mb-3 pb-3 w-50">
                <div class="d-flex align-items-center">
                    @if($post->image)
                        <img src="{{ asset('images/' . $post->image) }}" alt="{{ $post->title }}" class="me-3"
                            style="max-width: 150px;">
                    @endif
                    <div>
                        <a href="{{ route('posts.show', $post->id) }}">Tiêu đề<strong>{{ $post->title }}</strong></a>
                        <p>Tác giả {{ $post->user->name }}</p>
                        <p>
                            {{ \Illuminate\Support\Str::words(strip_tags($post->content), 100, '...') }}
                        </p>
                        <div class="mb-2">
                            @if(Auth::check() && (Auth::id() === $post->user_id || Auth::user()->is_admin))
                                <div class="actions">
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary me-2">Edit</a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>


    <!-- Hiển thị phân trang -->
    <div>
        {{ $posts->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection