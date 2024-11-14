@extends('Blog.dashboard')
@section('title', 'Show Blog Section')

@section('content')
    <h1>Section Details</h1>
    <div class="card">
        <div class="card-body">
            <h3>Section Name: {{ $section->name }}</h3>
            <p>Description: {{ $section->description }}</p>

            <h4>Blogs in this Section:</h4>
            @if($blogs->isEmpty())
                <p>No blogs available in this section.</p>
            @else
                <ul>
                    @foreach($blogs as $blog)
                        <li>{{ $blog->title }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
    <a href="{{ route('blog_sections.index') }}" class="btn btn-secondary mt-3">Back to Sections</a>
@endsection
