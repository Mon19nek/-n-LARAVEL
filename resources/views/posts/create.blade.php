@extends('layouts.app')

@section('content')
<div>
    <h1>Tạo bài viết</h1>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Tên:</label>
            <input class="w-100" type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="content">Nội dung:</label>
            <textarea class="w-100" name="content" id="content" required></textarea>
        </div>
        <div>
            <label for="category_id">Danh mục:</label>
            <select name="category_id" id="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Ảnh:</label>
            <input type="file" name="image" id="image" class="form-control-file" onchange="previewImage(event)">
            <img id="image-preview" src="" alt="Post Image"
                class="mt-2 img-thumbnail" style="max-width: 200px;">
        </div>
        <button type="submit">Tạo</button>
    </form>
    
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
</div>
@endsection