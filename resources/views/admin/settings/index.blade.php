@extends('admin.master')
@section('title', 'Site Settings')
@section('breadcrumb', 'Settings')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold mb-0">General Settings</h3>
    @if ($settings)
        <a href="{{ route('admin.settings.edit', $settings->id) }}" class="btn btn-primary">
            <i class="bi bi-gear-fill me-2"></i> Edit Settings
        </a>
    @else
        <a href="{{ route('admin.settings.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg me-2"></i> Add Settings
        </a>
    @endif
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert" style="border-radius: 12px;">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white border-bottom py-3">
                <h5 class="fw-bold mb-0">Platform Information</h5>
            </div>
            <div class="card-body p-4">
                 @if ($settings)
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="text-muted small text-uppercase">Site Name</label>
                            <div class="fw-bold fs-5 text-dark">{{ $settings->name }}</div>
                        </div>
                        <div class="col-md-6 text-md-end">
                            @if ($settings->logo)
                                <img src="{{ str_starts_with($settings->logo, 'http') ? $settings->logo : asset('uploads/settings/' . $settings->logo) }}" 
                                    class="img-fluid border rounded p-2 bg-light" style="max-height: 80px;">
                            @endif
                        </div>
                        
                        <div class="col-12 mt-4 border-top pt-4">
                            <h6 class="fw-bold mb-3">Contact Details</h6>
                            <div class="row g-3">
                                <div class="col-md-6 d-flex align-items-center">
                                    <div class="bg-light rounded p-2 me-3 text-primary"><i class="bi bi-telephone"></i></div>
                                    <div>
                                        <div class="small text-muted">Phone Number</div>
                                        <div class="fw-medium">{{ $settings->phone }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex align-items-center">
                                    <div class="bg-light rounded p-2 me-3 text-primary"><i class="bi bi-envelope"></i></div>
                                    <div>
                                        <div class="small text-muted">Email Address</div>
                                        <div class="fw-medium">{{ $settings->email }}</div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex align-items-center">
                                    <div class="bg-light rounded p-2 me-3 text-primary"><i class="bi bi-geo-alt"></i></div>
                                    <div>
                                        <div class="small text-muted">Office Address</div>
                                        <div class="fw-medium">{{ $settings->address }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="text-center py-5">
                         <i class="bi bi-gear-wide-connected fs-1 text-muted opacity-50 mb-3 d-block"></i>
                         <p>No configuration found. Please initialize settings.</p>
                         <a href="{{ route('admin.settings.create') }}" class="btn btn-primary px-4">Setup Settings</a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom py-3">
                <h5 class="fw-bold mb-0">Social Networks</h5>
            </div>
            <div class="card-body p-4">
                @if($settings)
                    <div class="list-group list-group-flush">
                        <div class="list-group-item border-0 px-0 py-3 d-flex align-items-center">
                            <div class="bg-primary text-white rounded p-2 me-3" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-facebook"></i>
                            </div>
                            <div class="flex-grow-1 text-truncate small text-muted">{{ $settings->facebook ?: 'Not Linked' }}</div>
                        </div>
                        <div class="list-group-item border-0 px-0 py-3 d-flex align-items-center">
                            <div class="bg-danger text-white rounded p-2 me-3" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-instagram"></i>
                            </div>
                            <div class="flex-grow-1 text-truncate small text-muted">{{ $settings->instgram ?: 'Not Linked' }}</div>
                        </div>
                        <div class="list-group-item border-0 px-0 py-3 d-flex align-items-center">
                            <div class="bg-dark text-white rounded p-2 me-3" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-twitter-x"></i>
                            </div>
                            <div class="flex-grow-1 text-truncate small text-muted">{{ $settings->x ?: 'Not Linked' }}</div>
                        </div>
                        <div class="list-group-item border-0 px-0 py-3 d-flex align-items-center">
                            <div class="bg-info text-white rounded p-2 me-3" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-linkedin"></i>
                            </div>
                            <div class="flex-grow-1 text-truncate small text-muted">{{ $settings->ln ?: 'Not Linked' }}</div>
                        </div>
                    </div>
                @else
                    <div class="text-center py-4">
                        <p class="text-muted small mb-0">Complete setup to see social links.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection