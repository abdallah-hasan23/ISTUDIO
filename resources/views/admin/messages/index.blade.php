@extends('admin.master')

@section('breadcrumb', 'Messages')
@section('title', 'Messages')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold mb-0">Incoming Messages</h3>
    <div class="text-muted small">Total: {{ $messages->total() }} messages</div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">Sender Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Sent Date</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $msg)
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary rounded-circle me-3 d-flex align-items-center justify-content-center text-white" style="width: 35px; height: 35px; font-size: 0.8rem; background-color: var(--primary-color) !important;">
                                        {{ strtoupper(substr($msg->name, 0, 1)) }}
                                    </div>
                                    <span class="fw-medium">{{ $msg->name }}</span>
                                </div>
                            </td>
                            <td><a href="mailto:{{ $msg->email }}" class="text-decoration-none text-muted">{{ $msg->email }}</a></td>
                            <td><span class="text-dark">{{ Str::limit($msg->subject, 30) }}</span></td>
                            <td class="text-muted small">{{ $msg->created_at->format('M d, Y') }}</td>
                            <td>
                                @if($msg->is_read)
                                    <span class="badge bg-success-subtle text-success border border-success-subtle">Read</span>
                                @else
                                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle">New</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <div class="btn-group">
                                    <a href="{{ route('admin.messages.show', $msg->id) }}" class="btn btn-sm btn-outline-primary me-2 rounded-2">
                                        <i class="bi bi-eye"></i> View
                                    </a>
                                    <form action="{{ route('admin.messages.destroy', $msg->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger rounded-2" onclick="return confirm('Delete this message?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="mt-4">
    {{ $messages->links() }}
</div>

@endsection
