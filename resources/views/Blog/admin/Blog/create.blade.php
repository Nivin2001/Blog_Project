@extends('Blog.dashboard')
@section('title', 'Create Blog')
@section('content')
    <h1>Create New Blog</h1>
    <form action="{{ route('blogs.store') }}" method="POST">
        @csrf
        <div class="form-floating mb-3">
            <label for="title">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Title of the Blog">
            @error('title')
            <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <label for="content">Content</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" placeholder="Content of the Blog"></textarea>
            @error('content')
            <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="blog_section_id">Section</label>
            <select name="blog_section_id" id="blog_section_id" class="form-control @error('blog_section_id') is-invalid @enderror">
                <option value="">Select Section</option>
                @foreach($sections as $section)
                    <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                @endforeach
            </select>
            @error('blog_section_id')
            <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create Blog</button>
    </form>
@endsection

