@extends('layouts.app')

@section('content')
<div class="container d-flex align-items-center justify-content-center flex-column">
    <div class="w-50">
        <h1>Login</h1>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="w-75">
                <div>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>
                </div>
            </div>
            <div class="w-75">
                <div>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>
                </div>
            </div>
            <div class="w-75 d-flex justify-content-center  align-items-center">
                <button type="submit">Login</button>
                <div class="nav-item ms-3">
                    <a href="{{ route('register') }}">Register</a>
                </div>
            </div>
        </form>
    </div>

</div>
@endsection