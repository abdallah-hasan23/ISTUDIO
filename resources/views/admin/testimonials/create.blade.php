@extends('admin.master')
@section('title', 'Add Testimonial')
@section('breadcrumb', 'Testimonials / Create')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0">New Testimonial</h3>
            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-2"></i> Back
            </a>
        </div>

        <div class="card border-0 shadow-sm p-4">
            <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-4">
                    <label>Client Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="e.g. John Doe" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group mb-4">
                    <label>Position / Company (optional)</label>
                    <input type="text" name="title" class="form-control" placeholder="e.g. CEO, Tech Corp">
                </div>

                <div class="form-group mb-4">
                    <label>Feedback / Comment</label>
                    <textarea name="comment" class="form-control @error('comment') is-invalid @enderror" rows="4" placeholder="What the client said..." required></textarea>
                    @error('comment') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group mb-4">
                    <label>Client Photo</label>
                    <div class="bg-light rounded p-4 text-center border-dashed" style="border: 2px dashed #dde9e9;">
                        <i class="bi bi-person-badge fs-1 text-muted opacity-50 d-block mb-2"></i>
                        <input type="file" name="image" class="form-control mt-2">
                        <small class="text-muted d-block mt-2">Upload a profile picture for the client.</small>
                    </div>
                </div>

                <div class="mt-4">
                    <button class="btn btn-primary w-100 py-2 fs-5">
                        <i class="bi bi-chat-quote me-2"></i> Publish Testimonial
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection