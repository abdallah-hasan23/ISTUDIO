@extends('admin.master')
@section('title', 'Add testimonial')

@section('content')
<div class="container mt-4">
    <h2>Add Testimonial</h2>

    <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mt-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group mt-3">
            <label>Title (optional)</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="form-group mt-3">
            <label>Comment</label>
            <textarea name="comment" class="form-control" rows="4" required></textarea>
            @error('comment') <small class="text-danger">{{ $message }}</small> @enderror
        </div>


        <div class="form-group mt-3">
            <label>Client Image (optional)</label>
            <input type="file" name="image" class="form-control-file">
        </div>

        <button class="btn btn-success mt-3">Save</button>

        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary mt-3">Cancel</a>
    </form>
</div>
@endsection