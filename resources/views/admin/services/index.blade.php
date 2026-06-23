@extends('admin.master')
@section('title', 'Services Management')
@section('breadcrumb', 'Services')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold mb-0">Services</h3>
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-2"></i> Add New Service
    </a>
</div>

@if(session()->has('msg'))
    <div class="alert alert-{{ session('type') }} alert-dismissible fade show border-0 shadow-sm mb-4" role="alert" style="border-radius: 12px;">
        <i class="bi bi-info-circle-fill me-2"></i>
        {{ session('msg') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">Icon/Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                    <tr>
                        <td class="ps-4">
                            @if($service->icon)
                                <img src="{{ str_starts_with($service->icon, 'http') ? $service->icon : asset('uploads/services/'.$service->icon) }}" 
                                    class="rounded shadow-sm" style="width: 50px; height: 50px; object-fit: cover;">
                            @else
                                <div class="bg-light rounded d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="bi bi-gear text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td class="fw-medium text-dark">{{ $service->title }}</td>
                        <td><small class="text-muted">{{ Str::limit($service->description, 70) }}</small></td>
                        <td class="text-end pe-4">
                            <div class="btn-group">
                                <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-sm btn-outline-info me-2 rounded-2">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-2" onclick="return confirm('هل تريد حذف هذه الخدمة؟')">
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
@endsection
