@extends('layouts.app')

@section('content')
<div class="w-100 container d-flex align-items-center justify-content-center flex-column">
    <div class="w-50">
        <h1>Register</h1>
        <form action="{{ route('register') }}" method="POST" class="w-75">
            @csrf
            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div>
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>
            <div>
                <label for="role">Role:</label>
                <select name="role" id="role" required>
                    <option value="user">User</option>
                </select>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <button class="w-25 me-5" type="submit">Register</button>
                <div class="nav-item">
                    <a href="{{ route('login') }}">Login</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection