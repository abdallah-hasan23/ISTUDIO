@extends('admin.master')
@section('title', 'System Settings')
@section('breadcrumb', 'Settings / Create')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0">Platform Configuration</h3>
            <a href="{{ route('admin.settings.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-2"></i> Back
            </a>
        </div>

        <div class="card border-0 shadow-sm p-4">
            <form action="{{ route('admin.settings.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row g-4">
                    <div class="col-12">
                        <h6 class="fw-bold border-bottom pb-2 mb-3 text-primary">General Information</h6>
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Site / Company Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="e.g. IStudio" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Contact Phone</label>
                                    <input type="text" name="phone" class="form-control" placeholder="+1 234 567 890">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Support Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="contact@example.com">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Physical Address</label>
                                    <input type="text" name="address" class="form-control" placeholder="Street, City, Country">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-4">
                        <h6 class="fw-bold border-bottom pb-2 mb-3 text-primary">Social Integration</h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-danger border-end-0"><i class="bi bi-instagram"></i></span>
                                    <input type="text" name="instgram" class="form-control border-start-0" placeholder="Instagram URL">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-primary border-end-0"><i class="bi bi-facebook"></i></span>
                                    <input type="text" name="facebook" class="form-control border-start-0" placeholder="Facebook URL">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-info border-end-0"><i class="bi bi-linkedin"></i></span>
                                    <input type="text" name="ln" class="form-control border-start-0" placeholder="LinkedIn URL">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-dark border-end-0"><i class="bi bi-twitter-x"></i></span>
                                    <input type="text" name="x" class="form-control border-start-0" placeholder="X (Twitter) URL">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-4">
                        <h6 class="fw-bold border-bottom pb-2 mb-3 text-primary">Branding</h6>
                        <div class="form-group">
                            <label>Site Logo</label>
                            <div class="bg-light rounded p-4 text-center border-dashed" style="border: 2px dashed #dde9e9;">
                                <i class="bi bi-vector-pen fs-1 text-muted opacity-50 d-block mb-2"></i>
                                <input type="file" name="logo" class="form-control mt-2">
                                <small class="text-muted d-block mt-2">Upload your official brand logo.</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-4">
                        <button class="btn btn-primary w-100 py-3 fs-5 fw-bold">
                            <i class="bi bi-check-circle me-2"></i> Initialize Settings
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection