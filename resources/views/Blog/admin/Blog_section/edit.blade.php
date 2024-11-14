@extends('Blog.dashboard')
@section('title', 'Edit Blog Section')

@section('content')
    <h1>Edit Section</h1>
    <form action="{{ route('blog_sections.update', $section->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Section Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $section->name }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ $section->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Section</button>
        <a href="{{ route('blog_sections.index') }}" class="btn btn-secondary mt-3">Cancel</a>
    </form>
@endsection
