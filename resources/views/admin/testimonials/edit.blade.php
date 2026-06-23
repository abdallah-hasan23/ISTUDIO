@extends('admin.master')
@section('title', 'Edit testimonial')

@section('content')
<div class="container mt-4">
    <h2>Edit Testimonial</h2>

    <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mt-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control"
                   value="{{ $testimonial->name }}" required>
        </div>

        <div class="form-group mt-3">
            <label>Title (optional)</label>
            <input type="text" name="title" class="form-control"
                   value="{{ $testimonial->title }}">
        </div>

        <div class="form-group mt-3">
            <label>Comment</label>
            <textarea name="comment" class="form-control" rows="4" required>{{ $testimonial->comment }}</textarea>
        </div>


        <div class="form-group mt-3">
            <label>Current Image</label><br>
            @if($testimonial->image)
                <img src="{{ str_starts_with($testimonial->image, 'http') ? $testimonial->image : asset('uploads/Testimonial/'.$testimonial->image) }}" width="100" height="100" style="object-fit: cover; border-radius: 8px;">
            @else
                <p>No image uploaded</p>
            @endif
        </div>

        <div class="form-group mt-3">
            <label>Replace Image (optional)</label>
            <input type="file" name="image" class="form-control-file">
        </div>

        <button class="btn btn-success mt-3">Update</button>

        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary mt-3">Cancel</a>
    </form>
</div>
@endsection