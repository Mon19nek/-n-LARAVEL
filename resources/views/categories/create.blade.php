@extends('layouts.app')

@section('content')
<div class="w-100 d-flex ">
    <div class="d-flex flex-column w-50 ">
        <h1>Tạo danh mục</h1>
        <div>
            <div>
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="name"> Tên danh mục:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <button class="w-25" type="submit">Tạo</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection