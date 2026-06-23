@extends('admin.master')
@section('title', 'Add Projects')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0">Create New Project</h3>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-2"></i> Back to List
            </a>
        </div>

        <div class="card border-0 shadow-sm p-4">
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row g-3">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Project Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter project title" required>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label>Project Description</label>
                            <textarea name="description" class="form-control" rows="4" placeholder="Describe the project details..." required></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Project Category</label>
                            <input type="text" name="category" class="form-control" placeholder="e.g. Modern Architecture">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Project Location</label>
                            <input type="text" name="location" class="form-control" placeholder="City, Country">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Project Type</label>
                            <select name="type" class="form-select">
                                <option value="house">House</option>
                                <option value="office">Office / Desktop</option>
                                <option value="restaurant">Restaurant</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-select">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label>Project Images</label>
                            <div class="bg-light border rounded p-4 text-center mb-2">
                                <i class="bi bi-cloud-arrow-up fs-2 text-muted"></i>
                                <p class="mb-0 text-muted">Click to browse or drag and drop images here</p>
                                <input type="file" name="images[]" class="form-control mt-2" multiple>
                            </div>
                            <small class="text-muted">You can select multiple images for the project gallery.</small>
                        </div>
                    </div>

                    <div class="col-12 mt-4">
                        <button class="btn btn-primary w-100 py-2 fs-5">
                            <i class="bi bi-check-lg me-2"></i> Save Project
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection