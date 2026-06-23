@extends('admin.master')
@section('title', 'Edit About Information')
@section('breadcrumb', 'About / Edit')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0">Edit About Info</h3>
            <a href="{{ route('admin.about.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-2"></i> Back
            </a>
        </div>

        <div class="card border-0 shadow-sm p-4">
            <form action="{{ route('admin.about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group mb-4">
                    <label>Module Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $about->title) }}" placeholder="e.g. Who We Are" required>
                </div>

                <div class="form-group mb-4">
                    <label>Main Description</label>
                    <textarea name="description" class="form-control" rows="8" placeholder="Detailed information about the studio..." required>{{ old('description', $about->description) }}</textarea>
                </div>

                <div class="form-group mb-4">
                    <label>Cover Image</label>
                    <div class="bg-light rounded p-4 text-center border-dashed mb-3" style="border: 2px dashed #dde9e9;">
                        @if ($about->image)
                            <div class="mb-3">
                                <img src="{{ str_starts_with($about->image, 'http') ? $about->image : asset('uploads/about/' . $about->image) }}" 
                                    class="rounded shadow-sm" style="max-height: 150px;">
                                <p class="small text-muted mt-2">Current Image</p>
                            </div>
                        @else
                            <i class="bi bi-image fs-1 text-muted opacity-50 d-block mb-2"></i>
                        @endif
                        <input type="file" name="image" class="form-control mt-2">
                        <small class="text-muted d-block mt-1">Upload a high-quality photo for the section.</small>
                    </div>
                </div>

                <div class="mt-4">
                    <button class="btn btn-primary w-100 py-2 fs-5">
                        <i class="bi bi-check-circle me-2"></i> Update Information
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
