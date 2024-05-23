<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'News Website')</title>

    <!-- Favicons -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon">
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">

    <!-- Template Main CSS Files -->
    <link href="{{ asset('css/variables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <!-- Template Main CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

    <header id="header" class="header d-flex align-items-center ">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="{{ route('home') }}" class="logo d-flex align-items-center">
                <h1>NKhanh</h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li><a href="{{ route('posts.index') }}">Tin tức</a></li>
                    <li class="dropdown">
                        <a href="#"><span>Danh mục</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            @foreach($categories as $category)
                                <li><a
                                        href="{{ route('posts.index', ['category' => $category->id]) }}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{ route('about') }}">Về chúng tôi</a></li>
                    <li><a href="{{ route('contact') }}">Liên hệ</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>


            <div class="position-relative d-flex align-items-center ">
                <div class="me-3">

                    <a href="#" class="mx-2"><span class="bi-facebook"></span></a>
                    <a href="#" class="mx-2"><span class="bi-twitter"></span></a>
                    <a href="#" class="mx-2"><span class="bi-instagram"></span></a>
                </div>

                <div>
                    <ul class="navbar-nav ms-auto">
                        @guest
                            <div class="d-flex">
                                <li class="nav-item "><a class="nav-link text-dark pe-3" href="{{ route('login') }}">Đăng Nhập</a>
                                </li>
                                <li class="nav-item "><a class="nav-link text-dark"
                                        href="{{ route('register') }}">Đăng ký</a>
                                </li>
                            </div>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdownUser" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownUser">
                                <li><a class="dropdown-item text-dark" href="{{ route('users.myAccount') }}">Tải khoản của tôi</a>
                                    </li>    
                                    <li><a class="dropdown-item text-dark" href="{{ route('posts.mypost') }}">Bài viết của tôi</a>
                                    </li>
                                    <li><a class="dropdown-item text-dark" href="{{ route('posts.create') }}">Tạo bài viết</a></li>
                                    @if(Auth::check() && Auth::user()->role === 'admin')
                                    <li><a class="dropdown-item text-dark" href="{{ route('users.index') }}">Xem tất cả tài khoản</a>
                                    </li>
                                
                                    <li><a class="dropdown-item text-dark" href="{{ route('categories.create') }}">Tạo danh mục</a>
                                        </li>
                                        <li><a class="dropdown-item text-dark" href="{{ route('categories.index') }}">Sửa danh mục</a>
                                        </li>
                                    @endif
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST" class="dropdown-item text-dark">
                                            @csrf
                                            <button type="submit" class="btn btn-dark">Đăng xuất</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>

            </div>


        </div>
    </header>

    <div class="container mt-3">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @yield('content')
    </div>

    <!-- Footer -->
    <!-- Remove the container if you want to extend the Footer to full width. -->
    <div class="container-fluid	 my-5">

        <footer style="background-color: #deded5;">
            <div class="container p-4">
                <div class="row">
                    <div class="col-lg-6 col-md-12 mb-4">
                        <h5 class="mb-3" style="letter-spacing: 2px; color: #818963;">Báo tiếng Việt nhiều người xem nhất</h5>
                        <p>
                        Thuộc Bộ Khoa học và Công nghệ <br>
Số giấy phép: 548/GP-BTTTT ngày 24/08/2021</p>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <h5 class="mb-3" style="letter-spacing: 2px; color: #818963;">Page</h5>
                        <ul class="list-unstyled mb-0">
                            <li><a href="{{ route('home') }}">Trang chủ</a></li>
                            <li><a href="{{ route('posts.index') }}">Tin tức</a></li>
                            <li><a href="{{ route('about') }}">Về chúng tôi</a></li>
                            <li><a href="{{ route('contact') }}">Liên hệ</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <h5 class="mb-1" style="letter-spacing: 2px; color: #818963;">Contact</h5>
                        <table class="" style="color: #4f4f4f; border-color: #666;">
                            <tbody>
                                <tr>
                                    <td>
                                        <li style="list-style:none"><a
                                                href="https://www.facebook.com/profile.php?id=100078400862056">Facebook</a>
                                        </li>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <li style="list-style:none"><a href="#">Instagram</a></li>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2020 Copyright:
                <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
            </div>
            <!-- Copyright -->
        </footer>

    </div>
    <!-- End of .container -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>