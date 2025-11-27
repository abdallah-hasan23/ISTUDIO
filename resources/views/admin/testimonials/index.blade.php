@extends('admin.master')
@section('title','Testimonial Page')
@section('breadcrumb','Testimonial')
@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h2>Testimonials</h2>
        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">Add New</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Title</th>
                <th>Comment</th>

                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($testimonials as $item)
                <tr>
                    <td>{{ $item->id }}</td>

                    <td>
                        @if($item->image)
                            <img src="{{ asset('uploads/Testimonial/'.$item->image) }}" width="60" height="60" style="object-fit: cover; border-radius: 6px;">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>

                    <td>{{ $item->name }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ Str::limit($item->comment, 50) }}</td>
                    <td>
                        <a href="{{ route('admin.testimonials.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('admin.testimonials.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this testimonial?')">
                                Delete
                            </button>
                        </form>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No testimonials found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection