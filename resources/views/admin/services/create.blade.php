@extends('admin.master')
@section('title', 'Add Services')
@section('breadcrumb', 'Services / Create')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0">Create New Service</h3>
            <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-2"></i> Back
            </a>
        </div>

        <div class="card border-0 shadow-sm p-4">
            <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-4">
                    <label>Service Title</label>
                    <input type="text" name="title" class="form-control" placeholder="e.g. Interior Design" required>
                </div>

                <div class="form-group mb-4">
                    <label>Service Description</label>
                    <textarea name="description" class="form-control" rows="4" placeholder="Briefly explain what this service offers..." required></textarea>
                </div>

                <div class="form-group mb-4">
                    <label>Service Icon / Image</label>
                    <div class="bg-light rounded p-4 text-center border-dashed" style="border: 2px dashed #dde9e9;">
                        <i class="bi bi-gear fs-1 text-muted opacity-50 d-block mb-2"></i>
                        <input type="file" name="icon" class="form-control mt-2">
                        <small class="text-muted d-block mt-2">Upload an icon or representative image (PNG/JPG).</small>
                    </div>
                </div>

                <div class="mt-4">
                    <button class="btn btn-primary w-100 py-2 fs-5">
                        <i class="bi bi-check-lg me-2"></i> Save Service
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection