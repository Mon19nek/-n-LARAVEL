@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Hero 4 - Bootstrap Brain Component -->
    <section class="bg-primary">
        <div class="container-fluid overflow-hidden">
            <div class="row">
                <div class="col-12 col-md-6 order-1 order-md-0 align-self-md-end">
                    <div class="row py-3 py-sm-5 py-xl-9 mt-md-10 justify-content-sm-center">
                        <div class="col-12 col-sm-10">
                            <h1 class="display-2 fw-bolder mb-4 text-white">Chúng tôi cung cấp những thông tin mới nhất
                            </h1>
                            <div class="row">
                                <div class="col-12 col-xxl-8">
                                    <p class="fs-5 mb-5 text-white">Những bài báo chất lượng được các nhà báo viết trên
                                        toàn thế giới về những mẫu chuyện nóng bỏng nhất.</p>
                                </div>
                            </div>
                            <div class="d-grid gap-2 d-sm-flex">
                                <a href="{{route('posts.index')}}">
                                    <button type="button" class="btn btn-warning bsb-btn-3xl rounded-pill">Xem
                                        thêm</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 p-0">
                    <img class="img-fluid w-100 h-100 object-fit-cover" loading="lazy"
                        src="{{asset('images/phong-vien-va-nha-bao-1.jpg')}}" alt="">
                </div>
            </div>
        </div>
    </section>


    <hr class="mb-0">


    <!-- List of posts -->
    <div class="d-flex justify-content-between  mb-3">
        <div class="w-85  border-end border-dark">
            <div class=" d-flex justify-content-between align-items-center">
                <h1 class="py-3">Bài viết mới cập nhập</h1>
            </div>
            <ul class="d-flex list-unstyled flex-wrap">
                <div class="">
                    <div class="">
                        @foreach($posts as $post)
                            <div class="row">
                                <div class="col-sm-4 grid-margin">
                                    <div class="position-relative">
                                        <div class="rotate-img">
                                            <img src="{{ asset('images/' . $post->image) }}" alt="{{ $post->title }}"
                                                class="img-fluid">
                                        </div>
                                        <div class="badge-positioned">
                                            <span class="badge badge-danger font-weight-bold">Flash news</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8 grid-margin">
                                    <h2 class="mb-2 font-weight-600">
                                        <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                                    </h2>
                                    <div class="fs-13 mb-2">
                                        <span class="mr-2">Tác giả: </span>{{ $post->user->name }}
                                    </div>
                                    <p class="mb-0">
                                        {{ \Illuminate\Support\Str::words(strip_tags($post->content), 40, '...') }}
                                        <a class="text-info" href="{{ route('posts.show', $post->id) }}">Xem thêm</a>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </ul>
        </div>
        <div class="w-15">
            <div class=" d-flex ps-3 justify-content-start flex-column">
                <h3 class="py-3">Danh mục </h3>
                <ul class="nav flex-column">
                    @foreach($categories as $category)
                        <li class="nav-item"><a class="nav-link text-dark"
                                href="{{ route('posts.index', ['category' => $category->id]) }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>


    <!-- Pagination links -->
    <div>
        {{ $posts->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection