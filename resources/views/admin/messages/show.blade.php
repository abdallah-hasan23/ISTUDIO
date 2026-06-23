@extends('admin.master')

@section('breadcrumb', 'Messages / Details')
@section('title', 'Message Details')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0">Message Transcript</h3>
            <a href="{{ route('admin.messages.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-2"></i> Back to Inbox
            </a>
        </div>

        <div class="card border-0 shadow-sm overflow-hidden">
            <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <div class="bg-light rounded-circle me-3 d-flex align-items-center justify-content-center text-primary fw-bold" style="width: 50px; height: 50px; font-size: 1.2rem;">
                        {{ strtoupper(substr($message->name, 0, 1)) }}
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold">{{ $message->name }}</h5>
                        <small class="text-muted">{{ $message->email }}</small>
                    </div>
                </div>
                <div class="text-end">
                    <span class="badge bg-light text-muted border">{{ $message->created_at->format('M d, Y - h:i A') }}</span>
                </div>
            </div>

            <div class="card-body p-4 p-lg-5">
                <div class="mb-5">
                    <h6 class="text-uppercase text-muted fw-bold small mb-2" style="font-size: 0.7rem; letter-spacing: 1px;">Subject</h6>
                    <h4 class="fw-bold text-dark">{{ $message->subject }}</h4>
                </div>

                <div>
                    <h6 class="text-uppercase text-muted fw-bold small mb-3" style="font-size: 0.7rem; letter-spacing: 1px;">Message Content</h6>
                    <div class="p-4 bg-light rounded-4 text-dark lh-lg" style="white-space: pre-line; border-left: 4px solid var(--primary-color);">
                        {{ $message->message }}
                    </div>
                </div>
            </div>

            <div class="card-footer bg-light border-top p-4 d-flex justify-content-between">
                <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <button class="btn btn-outline-danger btn-sm rounded-pill px-4" onclick="return confirm('Delete this message?')">
                        <i class="bi bi-trash me-2"></i> Delete Permanently
                    </button>
                </form>
                <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject }}" class="btn btn-primary rounded-pill px-5">
                    <i class="bi bi-reply me-2"></i> Reply via Email
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
