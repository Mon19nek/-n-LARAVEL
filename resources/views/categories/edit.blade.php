@extends('layouts.app')

@section('content')
<div class="w-100 d-flex">
    <div class="d-flex flex-column w-50">
        <h1>Edit Category</h1>
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{ $category->name }}" required>
            </div>
            <button type="submit">Update</button>
        </form>
    </div>

</div>
@endsection