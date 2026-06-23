@extends('admin.master')
@section('title', 'Testimonials Management')
@section('breadcrumb', 'Testimonials')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold mb-0">Client Testimonials</h3>
    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-2"></i> Add New Testimonial
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert" style="border-radius: 12px;">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">#</th>
                        <th>Client</th>
                        <th>Role/Title</th>
                        <th>Feedback</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($testimonials as $item)
                        <tr>
                            <td class="ps-4">{{ $loop->iteration }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($item->image)
                                        <img src="{{ str_starts_with($item->image, 'http') ? $item->image : asset('uploads/Testimonial/'.$item->image) }}" 
                                            class="rounded-circle me-3 border" style="width: 45px; height: 45px; object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded-circle me-3 d-flex align-items-center justify-content-center border" style="width: 45px; height: 45px;">
                                            <i class="bi bi-person text-muted"></i>
                                        </div>
                                    @endif
                                    <span class="fw-medium">{{ $item->name }}</span>
                                </div>
                            </td>
                            <td><span class="text-muted small">{{ $item->title }}</span></td>
                            <td><small class="text-dark">"{{ Str::limit($item->comment, 60) }}"</small></td>
                            <td class="text-end pe-4">
                                <div class="btn-group">
                                    <a href="{{ route('admin.testimonials.edit', $item->id) }}" class="btn btn-sm btn-outline-info me-2 rounded-2">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.testimonials.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger rounded-2" onclick="return confirm('Delete this testimonial?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="bi bi-chat-square-quote fs-1 d-block mb-2"></i>
                                    No testimonials found
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection