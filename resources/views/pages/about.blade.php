@extends('layouts.app')
@section('content')
<!-- About 1 - Bootstrap Brain Component -->
<div class="py-3 py-md-5">
    <div class="container">
        <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
            <div class="col-12 col-lg-6 col-xl-5">
                <img class="img-fluid rounded" loading="lazy"
                    src="{{asset('images/360_F_135709080_2XHH0eeTGZ6rAaxgyuLKKdTaUCZAgPCZ.jpg')}}" alt="About 1">
            </div>
            <div class="col-12 col-lg-6 col-xl-7">
                <div class="row justify-content-xl-center">
                    <div class="col-12 col-xl-11">
                        <h2 class="mb-3">Chúng tôi là ai?</h2>
                        <p class="lead fs-4 text-secondary mb-3">Chúng tôi là một đội ngũ đam mê với sứ mệnh cung cấp
                            thông tin chất lượng và đa dạng cho cộng đồng. Chúng tôi cam kết mang đến cho độc giả những
                            tin tức chính xác, đáng tin cậy và phong phú.</p>
                        <p class="mb-5">Sứ mệnh của chúng tôi là giữ cho bạn luôn cập nhật với những sự kiện quan trọng
                            nhất từ khắp nơi trên thế giới. Chúng tôi không chỉ là người kể chuyện, mà còn là người đem
                            lại sự hiểu biết và cái nhìn sâu sắc về thế giới xung quanh.</p>
                        <div class="row gy-4 gy-md-0 gx-xxl-5X">
                            <div class="col-12 col-md-6">
                                <div class="d-flex">
                                    <div class="me-4 text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h2 class="h4 mb-3">Đa Dạng trong Tin Tức
                                        </h2>
                                        <p class="text-secondary mb-0">Chúng tôi không chỉ chuyên về một lĩnh vực cụ thể
                                            mà còn cung cấp đa dạng thông tin về nhiều lĩnh vực khác nhau. Từ chính trị
                                            đến khoa học, từ văn hóa đến công nghệ, chúng tôi đều đang đặt bước chân
                                            trên mọi lĩnh vực để mang đến cho bạn cái nhìn toàn diện về thế giới.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="d-flex">
                                    <div class="me-4 text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            fill="currentColor" class="bi bi-fire" viewBox="0 0 16 16">
                                            <path
                                                d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16Zm0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15Z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h2 class="h4 mb-3">Đội Ngũ Ưu Việt
                                        </h2>
                                        <p class="text-secondary mb-0">Chúng tôi là một đội ngũ gồm những người có kiến
                                            thức chuyên môn sâu rộng và lòng đam mê với nghề báo. Chúng tôi không ngừng
                                            nỗ lực để nâng cao chất lượng của các bài viết và đảm bảo rằng mọi thông tin
                                            mà chúng tôi cung cấp đều đáng tin cậy và hữu ích cho độc giả.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection