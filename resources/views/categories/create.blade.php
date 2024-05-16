@extends('layouts.app')

@section('content')
<div class="w-100 d-flex ">
    <div class="d-flex flex-column w-50 ">
        <h1>Create Category</h1>
        <div>
            <div>
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="name">Category Name:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <button class="w-25" type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection