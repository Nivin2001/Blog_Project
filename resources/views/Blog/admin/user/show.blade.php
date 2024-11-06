@extends('Blog.dashboard')

@section('title', 'Show User')

@section('content')

    <div class="container">
        <h1>{{ $user->name }} Details</h1>
        <div class="card mb-3">
            <div class="card-body">
                <div class="row align-items-center">

                    <div class="col-md-3">
                        <!-- Displaying the user's avatar using the name -->
                        <img src="https://ui-avatars.com/api/?name={{ $user->name }}" class="p-1" style="border: 1px solid #ccc; width:100px;">
                    </div>

                    <div class="col-md-9">
                        <h5 class="card-title">{{ $user->name }} (<small>{{ $user->role ? 'Admin' : 'User' }}</small>)</h5>
                        <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>

                        <p class="card-text"><strong>Account Created:</strong> {{ \Carbon\Carbon::parse($user->created_at)->format('M d, Y') }}</p>


                </div>
            </div>
        </div>

        <a href="{{ route('users.index') }}" class="btn btn-primary w-100">Back to List</a>
    </div>

@endsection
