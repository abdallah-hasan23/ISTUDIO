@extends('admin.master')

@section('breadcrumb', 'About')
@section('title', 'About Information')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold mb-0">About Company</h3>
    @if ($about)
        <a href="{{ route('admin.about.edit', $about->id) }}" class="btn btn-primary">
            <i class="bi bi-pencil-square me-2"></i> Edit Information
        </a>
    @else
        <a href="{{ route('admin.about.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg me-2"></i> Add About Info
        </a>
    @endif
</div>

<div class="card border-0 shadow-sm overflow-hidden">
    @if ($about)
        <div class="row g-0">
            @if ($about->image)
            <div class="col-md-4">
                <img src="{{ str_starts_with($about->image, 'http') ? $about->image : asset('uploads/about/' . $about->image) }}" 
                    class="img-fluid h-100" style="object-fit: cover; min-height: 250px;">
            </div>
            @endif
            <div class="{{ $about->image ? 'col-md-8' : 'col-12' }}">
                <div class="card-body p-4 p-lg-5">
                    <h4 class="fw-bold mb-3 text-primary" style="color: var(--primary-color) !important;">{{ $about->title }}</h4>
                    <div class="text-muted lh-lg" style="white-space: pre-line;">
                        {{ $about->description }}
                    </div>
                    
                    <div class="mt-4 pt-4 border-top">
                        <div class="row g-3">
                            <div class="col-6 col-md-3">
                                <small class="d-block text-uppercase fw-bold text-muted mb-1" style="font-size: 0.7rem;">Status</small>
                                <span class="badge bg-success-subtle text-success border border-success-subtle">Published</span>
                            </div>
                            <div class="col-6 col-md-3">
                                <small class="d-block text-uppercase fw-bold text-muted mb-1" style="font-size: 0.7rem;">Last Updated</small>
                                <span class="text-dark small">{{ $about->updated_at?->diffForHumans() ?? 'N/A' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="card-body p-5 text-center">
            <div class="py-5">
                <i class="bi bi-file-earmark-text fs-1 text-muted mb-3 d-block"></i>
                <h4 class="text-muted">No "About Us" information has been added yet.</h4>
                <p class="text-muted mb-4">Provide details about your project/studio to show on the public site.</p>
                <a href="{{ route('admin.about.create') }}" class="btn btn-primary px-4">Create it Now</a>
            </div>
        </div>
    @endif
</div>

@endsection
