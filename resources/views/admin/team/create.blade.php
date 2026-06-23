@extends('admin.master')
@section('title', 'Add Members')
@section('breadcrumb', 'Team / Create')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0">Add New Team Member</h3>
            <a href="{{ route('admin.team.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-2"></i> Back
            </a>
        </div>

        <div class="card border-0 shadow-sm p-4">
            <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Member's Name" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Job Title / Position</label>
                            <input type="text" name="job_title" class="form-control" placeholder="e.g. Lead Designer" required>
                        </div>
                    </div>

                    <div class="col-12 mt-4">
                        <h6 class="fw-bold border-bottom pb-2 mb-3">Social Media Profiles</h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-danger border-end-0"><i class="bi bi-instagram"></i></span>
                                    <input type="text" name="instagram" class="form-control border-start-0" placeholder="Instagram URL">
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
                                    <input type="text" name="linkedin" class="form-control border-start-0" placeholder="LinkedIn URL">
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
                        <div class="form-group">
                            <label>Profile Picture</label>
                            <div class="bg-light rounded p-4 text-center border-dashed" style="border: 2px dashed #dde9e9;">
                                <i class="bi bi-person-bounding-box fs-1 text-muted opacity-50 d-block mb-2"></i>
                                <input type="file" name="image" class="form-control mt-2">
                                <small class="text-muted d-block mt-2">Upload a professional avatar for the member.</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-4">
                        <button class="btn btn-primary w-100 py-2 fs-5">
                            <i class="bi bi-check-circle me-2"></i> Save Member Profile
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection