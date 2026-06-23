@extends('admin.master')
@section('title', 'Edit Settings')
@section('breadcrumb', 'Settings / Edit')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0">System Configuration</h3>
            <a href="{{ route('admin.settings.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-2"></i> Back
            </a>
        </div>

        <div class="card border-0 shadow-sm overflow-hidden mb-4">
            <form action="{{ route('admin.settings.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card-body p-4 p-lg-5">
                    <div class="row g-4">
                        <div class="col-12">
                            <h6 class="fw-bold border-bottom pb-2 mb-3 text-primary">Core Branding</h6>
                            <div class="row g-3 align-items-center">
                                <div class="col-md-4 text-center">
                                    <div class="bg-light rounded p-3 mb-2 border border-dashed" style="border: 2px dashed #dde9e9 !important;">
                                        @if($setting && $setting->logo)
                                            <img src="{{ str_starts_with($setting->logo, 'http') ? $setting->logo : asset('uploads/settings/' . $setting->logo) }}" 
                                                class="img-fluid rounded shadow-sm" style="max-height: 100px;">
                                        @else
                                            <i class="bi bi-image fs-1 text-muted opacity-50"></i>
                                        @endif
                                    </div>
                                    <small class="text-muted d-block">Current Logo</small>
                                </div>
                                <div class="col-md-8">
                                    <label>Upload New Logo</label>
                                    <input type="file" name="logo" class="form-control">
                                    <small class="text-muted small">Choose a transparent PNG for best results.</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-5">
                            <h6 class="fw-bold border-bottom pb-2 mb-3 text-primary">Contact & Location</h6>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label>Support phone</label>
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $setting->phone) }}">
                                </div>
                                <div class="col-md-6">
                                    <label>Official Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email', $setting->email) }}">
                                </div>
                                <div class="col-12">
                                    <label>Physical Address</label>
                                    <input type="text" name="address" class="form-control" value="{{ old('address', $setting->address) }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-5">
                            <h6 class="fw-bold border-bottom pb-2 mb-3 text-primary">Social Connectivity</h6>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-primary border-end-0"><i class="bi bi-facebook"></i></span>
                                        <input type="text" name="facebook" class="form-control border-start-0" value="{{ old('facebook', $setting->facebook) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-danger border-end-0"><i class="bi bi-instagram"></i></span>
                                        <input type="text" name="instgram" class="form-control border-start-0" value="{{ old('instgram', $setting->instgram) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-dark border-end-0"><i class="bi bi-twitter-x"></i></span>
                                        <input type="text" name="x" class="form-control border-start-0" value="{{ old('x', $setting->x) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-info border-end-0"><i class="bi bi-linkedin"></i></span>
                                        <input type="text" name="ln" class="form-control border-start-0" value="{{ old('ln', $setting->ln) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light border-top p-4 text-end">
                    <button type="submit" class="btn btn-primary px-5 py-2 fw-bold">
                        <i class="bi bi-save me-2"></i> Update Configuration
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection