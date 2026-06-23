@extends('admin.master')
@section('title', 'Edit Service')
@section('breadcrumb', 'Services / Edit')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0">Edit Service: {{ $service->title }}</h3>
            <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-2"></i> Back
            </a>
        </div>

        @if(session()->has('msg'))
            <div class="alert alert-{{ session('type') }} alert-dismissible fade show border-0 shadow-sm mb-4" role="alert" style="border-radius: 12px;">
                <i class="bi bi-info-circle-fill me-2"></i>
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card border-0 shadow-sm p-4">
            <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group mb-4">
                    <label>Service Title</label>
                    <input type="text" name="title" value="{{ old('title', $service->title) }}" class="form-control" placeholder="e.g. Interior Design" required>
                </div>

                <div class="form-group mb-4">
                    <label>Service Description</label>
                    <textarea name="description" class="form-control" rows="4" placeholder="Briefly explain what this service offers..." required>{{ old('description', $service->description) }}</textarea>
                </div>

                <div class="form-group mb-4">
                    <label>Update Icon / Image</label>
                    <div class="bg-light rounded p-4 text-center border-dashed mb-3" style="border: 2px dashed #dde9e9;">
                        @if ($service->icon)
                            <div class="mb-3">
                                <img src="{{ str_starts_with($service->icon, 'http') ? $service->icon : asset('uploads/services/' . $service->icon) }}" 
                                    class="rounded shadow-sm" style="max-height: 100px;">
                                <p class="small text-muted mt-2">Current Image</p>
                            </div>
                        @else
                            <i class="bi bi-gear fs-1 text-muted opacity-50 d-block mb-2"></i>
                        @endif
                        <input type="file" name="icon" class="form-control mt-2">
                    </div>
                </div>

                <div class="mt-4">
                    <button class="btn btn-primary w-100 py-2 fs-5">
                        <i class="bi bi-save me-2"></i> Update Service
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection