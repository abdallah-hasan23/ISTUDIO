@extends('admin.master')
@section('title', 'Projects')
@section('breadcrumb', 'Projects')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold mb-0">Project Management</h3>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-2"></i> Add New Project
    </a>
</div>

@if(session()->has('msg'))
    <div class="alert alert-{{ session('type') }} alert-dismissible fade show border-0 shadow-sm mb-4" role="alert" style="border-radius: 12px;">
        <i class="bi bi-check-circle-fill me-2"></i>
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
                        <th class="ps-4">#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                    <tr>
                        <td class="ps-4">{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ str_starts_with(($project->images->first()?->image_path ?? 'default.jpg'), 'http') ? ($project->images->first()?->image_path ?? 'default.jpg') : asset('uploads/projects/' . ($project->images->first()?->image_path ?? 'default.jpg')) }}" 
                                alt="Project Image" class="rounded shadow-sm" style="width: 60px; height: 60px; object-fit: cover;">   
                        </td>
                        <td class="fw-medium text-dark">{{ $project->title }}</td>
                        <td><span class="badge bg-light text-dark border">{{ $project->category }}</span></td>
                        <td>{{ $project->type }}</td>
                        <td><small class="text-muted">{{ Str::limit($project->description, 50) }}</small></td>
                        <td>
                            @if($project->status == 'active')
                                <span class="badge bg-success-subtle text-success border border-success-subtle">Active</span>
                            @else
                                <span class="badge bg-danger-subtle text-danger border border-danger-subtle">Inactive</span>
                            @endif
                        </td>
                        <td class="text-end pe-4">
                            <div class="btn-group">
                                <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-outline-info me-2 rounded-2">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-2" onclick="return confirm('هل أنت متأكد من الحذف؟')">
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

<div class="mt-4 d-flex justify-content-center">
    {{ $projects->links() }}
</div>

@endsection