@extends('admin.master')
@section('title', 'Edit Testimonial')
@section('breadcrumb', 'Testimonials / Edit')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0">Edit Testimonial</h3>
            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-2"></i> Back
            </a>
        </div>

        <div class="card border-0 shadow-sm p-4">
            <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group mb-4">
                    <label>Client Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $testimonial->name) }}" required>
                </div>

                <div class="form-group mb-4">
                    <label>Position / Company</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $testimonial->title) }}">
                </div>

                <div class="form-group mb-4">
                    <label>Feedback / Comment</label>
                    <textarea name="comment" class="form-control" rows="4" required>{{ old('comment', $testimonial->comment) }}</textarea>
                </div>

                <div class="form-group mb-4">
                    <label>Update Client Photo</label>
                    <div class="bg-light rounded p-4 text-center border-dashed mb-3" style="border: 2px dashed #dde9e9;">
                        @if ($testimonial->image)
                            <div class="mb-3">
                                <img src="{{ str_starts_with($testimonial->image, 'http') ? $testimonial->image : asset('uploads/Testimonial/'.$testimonial->image) }}" 
                                    class="rounded-circle shadow border border-3 border-white" style="width: 100px; height: 100px; object-fit: cover;">
                            </div>
                        @else
                            <i class="bi bi-person-badge fs-1 text-muted opacity-50 d-block mb-2"></i>
                        @endif
                        <input type="file" name="image" class="form-control mt-2">
                    </div>
                </div>

                <div class="mt-4">
                    <button class="btn btn-primary w-100 py-2 fs-5">
                        <i class="bi bi-save me-2"></i> Update Testimonial
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection