

@extends('Blog.dashboard')
@section('title', 'Blogs_Section')

@section('content')
    <h1>إدارة أقسام المدونات</h1>
    <a href="{{ route('blog_sections.create') }}" class="btn btn-primary">Add New Section</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Section Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sections as $section)
                <tr>
                    <td>{{ $section->id }}</td>
                    <td>{{ $section->name }}</td>
                    <td>{{ $section->description }}</td>
                    <td>
                        <a href="{{ route('blog_sections.show', $section->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('blog_sections.edit', $section->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('blog_sections.destroy', $section->id) }}" method="POST" style="display:inline;">
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

