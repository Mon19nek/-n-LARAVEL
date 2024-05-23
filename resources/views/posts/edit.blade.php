@extends('layouts.app')

@section('content')
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">

        <div class=" border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Chỉnh sửa bài viết</h4>
                </div>
                <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Tên:</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Nội dung:</label>
                        <textarea name="content" id="content" class="form-control" rows="5"
                            required>{{ $post->content }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label">Danh mục:</label>
                        <select name="category_id" id="category_id" class="form-control" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Ảnh:</label>
                        <input type="file" name="image" id="image" class="form-control-file"
                            onchange="previewImage(event)">
                        <img id="image-preview" src="{{ asset('images/' . $post->image) }}" alt="Post Image"
                            class="mt-2 img-thumbnail" style="max-width: 200px;">
                    </div>
                    <div class=" text-start">
                        <button type="submit" class="btn btn-primary">Cập nhập</button>
                    </div>
                    <div class="d-flex flex-row justify-content-center">
                    </div>
                </form>
                <div>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="mt-3">
                        @csrf
                        @method('DELETE')
                        <div class="text-start">
                            <button tton type="submit" class="btn btn-danger"
                                onclick="return confirm('Bạn có chắc muốn xoá bài viết này?')">Xoá</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function previewImage(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function () {
            var dataURL = reader.result;
            var output = document.getElementById('image-preview');
            output.src = dataURL;
        };
        reader.readAsDataURL(input.files[0]);
    }
</script>
@endsection