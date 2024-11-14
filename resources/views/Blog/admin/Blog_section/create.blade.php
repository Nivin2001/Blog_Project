@extends('Blog.dashboard')
@section('title', 'Add Sections')
@section('content')
    <h1>Create New Sections</h1>
    <form action="{{ route('blog_sections.store') }}" method="POST">
        @csrf
        <div class="form-floating mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name">
            @error('name')
            <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <label for="email">Descripation</label>
            <input type="text" class="form-control @error('text') is-invalid @enderror" id="description" name="description" placeholder="Your description">
            @error('description')
            <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
    </form>

    @endsection
