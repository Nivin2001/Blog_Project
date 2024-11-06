@extends('Blog.dashboard')
@section('title', 'Create Users')
@section('content')
    <h1>Create New User</h1>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="form-floating mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name">
            @error('name')
            <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Your email">
            @error('email')
            <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" name="password" placeholder="Your password">
            @error('password')
            <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>
   
        <button type="submit" class="btn btn-primary">Create Users</button>
    </form>

    @endsection
