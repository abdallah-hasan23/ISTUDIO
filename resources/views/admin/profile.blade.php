@extends('admin.master')
@section('title', 'Admin Profile')
@section('breadcrumb', 'Profile')

@section('content')
<div class="container-fluid p-0">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert" style="border-radius: 12px;">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4">
        <div class="col-md-4">
            <!-- Profile Info Card -->
            <div class="card border-0 shadow-sm overflow-hidden">
                <div class="bg-primary py-5 text-center" style="background-color: var(--primary-color) !important;">
                    <img class="rounded-circle border border-4 border-white shadow-sm mb-3"
                         src="https://ui-avatars.com/api/?name={{ implode('', array_map(function($part) { return substr($part, 0, 1); }, explode(' ', auth()->user()->name))) }}&size=160&background=fff&color=0d6b68"
                         alt="User profile picture" style="width: 120px; height: 120px;">
                    <h4 class="text-white fw-bold mb-0">{{ auth()->user()->name }}</h4>
                    <p class="text-white-50 small mb-0">{{ auth()->user()->type }}</p>
                </div>
                <div class="card-body p-4">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span class="text-muted">Email</span>
                            <span class="fw-medium">{{ auth()->user()->email }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span class="text-muted">Role</span>
                            <span class="badge bg-light text-dark border">{{ auth()->user()->type }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span class="text-muted">Member Since</span>
                            <span class="fw-medium">{{ auth()->user()->created_at->format('M Y') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <!-- Profile Edit Card -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="fw-bold mb-0">Edit Account Settings</h5>
                </div>
                <form method="POST" action="{{ route('admin.profile.update') }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body p-4">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" required>
                                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required>
                                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="col-12 mt-4 pt-2 border-top">
                                <h6 class="fw-bold mb-3">Security & Password</h6>
                                <p class="text-muted small">Update your password to keep your account secure. Leave blank if you don't want to change it.</p>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="••••••••">
                                    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="••••••••">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-light border-top p-4 text-end">
                        <button type="submit" class="btn btn-primary px-5">
                             Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
