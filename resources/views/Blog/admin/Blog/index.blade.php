@extends('Blog.dashboard')
@section('title', 'Blogs List')

@section('content')
    <h1>Blogs List</h1>
    <a href="{{ route('blogs.create') }}" class="btn btn-primary">Add New Blog</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Section</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $blog)
                <tr>
                    <td>{{ $blog->id }}</td>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->section_name }}</td>
                    <td>
                        <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
