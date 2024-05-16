@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Users</h1>
    <ul class="users-list">
        @foreach($users as $user)
            <li class="user-item">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span>{{ $user->name }}</span>
                        <span class="role">({{ $user->role }})</span>
                        <span class="email">{{ $user->email }}</span>
                    </div>
                    @if(Auth::check() && Auth::user()->is_admin)
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                        </form>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
