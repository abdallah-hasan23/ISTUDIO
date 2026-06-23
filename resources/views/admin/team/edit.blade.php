@extends('admin.master')
@section('title', 'Edit Member')
@section('breadcrumb', 'Team / Edit')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0">Edit Member: {{ $member->name }}</h3>
            <a href="{{ route('admin.team.index') }}" class="btn btn-outline-secondary btn-sm">
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

        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm text-center p-4">
                    <div class="mb-3">
                        @if ($member->image)
                            <img src="{{ str_starts_with($member->image, 'http') ? $member->image : asset('uploads/team/' . $member->image) }}" 
                                class="rounded-circle shadow border border-4 border-white" style="width: 150px; height: 150px; object-fit: cover;">
                        @else
                            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center border mx-auto" style="width: 150px; height: 150px;">
                                <i class="bi bi-person fs-1 text-muted opacity-50"></i>
                            </div>
                        @endif
                    </div>
                    <h5 class="fw-bold mb-1">{{ $member->name }}</h5>
                    <p class="text-muted small mb-0">{{ $member->job_title }}</p>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card border-0 shadow-sm p-4">
                    <form action="{{ route('admin.team.update', $member->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" name="name" value="{{ old('name', $member->name) }}" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Job Title</label>
                                    <input type="text" name="job_title" value="{{ old('job_title', $member->job_title) }}" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <h6 class="fw-bold border-bottom pb-2 mb-3 text-muted" style="font-size: 0.8rem; text-transform: uppercase;">Social Networks</h6>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-text bg-light text-danger border-end-0"><i class="bi bi-instagram"></i></span>
                                            <input type="text" name="instagram" value="{{ old('instagram', $member->instagram) }}" class="form-control border-start-0">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-text bg-light text-primary border-end-0"><i class="bi bi-facebook"></i></span>
                                            <input type="text" name="facebook" value="{{ old('facebook', $member->facebook) }}" class="form-control border-start-0">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-text bg-light text-info border-end-0"><i class="bi bi-linkedin"></i></span>
                                            <input type="text" name="linkedin" value="{{ old('linkedin', $member->linkedin) }}" class="form-control border-start-0">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-text bg-light text-dark border-end-0"><i class="bi bi-twitter-x"></i></span>
                                            <input type="text" name="x" value="{{ old('x', $member->x) }}" class="form-control border-start-0">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <div class="form-group">
                                    <label>Update Profile Picture</label>
                                    <input type="file" name="image" class="form-control">
                                    <small class="text-muted">Choosing a new image will replace the current one.</small>
                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <button class="btn btn-primary px-5 py-2">
                                    <i class="bi bi-save me-2"></i> Update Profile
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection