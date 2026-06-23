@extends('admin.master')
@section('title', 'Edit Projects')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0">Edit Project: {{ $project->title }}</h3>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-2"></i> Back to List
            </a>
        </div>

        @if(session()->has('msg'))
            <div class="alert alert-{{ session('type') }} alert-dismissible fade show border-0 shadow-sm mb-4" role="alert" style="border-radius: 12px;">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card border-0 shadow-sm p-4 mb-4">
            <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Project Title</label>
                            <input type="text" name="title" value="{{ old('title', $project->title) }}" class="form-control @error('title') is-invalid @enderror" required>
                            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label>Project Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4" required>{{ old('description', $project->description) }}</textarea>
                            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Project Category</label>
                            <input type="text" name="category" value="{{ old('category', $project->category) }}" class="form-control @error('category') is-invalid @enderror" required>
                            @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Project Location</label>
                            <input type="text" name="location" value="{{ old('location', $project->location) }}" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Project Type</label>
                            <select name="type" class="form-select">
                                <option value="house" {{ old('type', $project->type) == 'house' ? 'selected' : '' }}>House</option>
                                <option value="office" {{ old('type', $project->type) == 'office' ? 'selected' : '' }}>Office / Desktop</option>
                                <option value="restaurant" {{ old('type', $project->type) == 'restaurant' ? 'selected' : '' }}>Restaurant</option>
                                <option value="other" {{ old('type', $project->type) == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-select">
                                <option value="active" {{ old('status', $project->status) == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status', $project->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label>Add More Images</label>
                            <input type="file" name="images[]" class="form-control" multiple>
                            <small class="text-muted">Choose files to add to the project gallery.</small>
                        </div>
                    </div>

                    <div class="col-12 mt-4">
                        <button type="submit" class="btn btn-primary px-5 py-2">
                            <i class="bi bi-save me-2"></i> Update Project
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="card border-0 shadow-sm p-4">
            <h5 class="fw-bold mb-4">Current Project Gallery</h5>
            <div class="row g-3">
                @foreach($project->images as $img)
                <div class="col-md-4 col-lg-3">
                    <div class="card border h-100 position-relative overflow-hidden group">
                        <img src="{{ str_starts_with($img->image_path, 'http') ? $img->image_path : asset('uploads/projects/' . $img->image_path) }}" 
                            class="card-img-top" style="height: 150px; object-fit: cover;">
                        <div class="card-body p-2 text-center">
                            <form action="{{ route('admin.project.image.delete', $img->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button class="btn btn-link text-danger p-0 text-decoration-none" onclick="return confirm('حذف الصورة؟')">
                                    <i class="bi bi-trash me-1"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection