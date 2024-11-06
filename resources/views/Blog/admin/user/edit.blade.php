@extends('Blog.dashboard')
@section('title', 'Edit User')

@section('content')
    <h3>Edit Users</h3>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('Blog.flash_error') <!-- Assuming you have a file for showing errors -->

        <div class="form-floating mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                placeholder="Name" value="{{ old('name', $user->name) }}">
            @error('name')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                placeholder="Your email" value="{{ old('email', $user->email) }}">
            @error('email')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <label for="password">Password</label>
            <div class="input-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Your password">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                        <i class="fa fa-eye"></i>
                    </button>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            const passwordInput = $('#password');
            const toggleButton = $('#togglePassword');

            // Toggle password visibility
            toggleButton.on('click', function() {
                const type = passwordInput.attr('type');
                if (type === 'password') {
                    passwordInput.attr('type', 'text');
                    toggleButton.find('i').removeClass('fa-eye').addClass('fa-times');
                } else {
                    passwordInput.attr('type', 'password');
                    toggleButton.find('i').removeClass('fa-times').addClass('fa-eye');
                }
            });

            // Show password on mouseenter
            toggleButton.on('mouseenter', function() {
                passwordInput.attr('type', 'text');
                toggleButton.find('i').removeClass('fa-eye').addClass('fa-times');
            });

            // Hide password on mouseleave
            toggleButton.on('mouseleave', function() {
                const type = passwordInput.attr('type');
                if (type !== 'password') {
                    passwordInput.attr('type', 'password');
                    toggleButton.find('i').removeClass('fa-times').addClass('fa-eye');
                }
            });
        });
    </script>
@endsection
