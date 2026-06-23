@extends('admin.master')
@section('title', 'Team Management')
@section('breadcrumb', 'Team')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold mb-0">Team Members</h3>
    <a href="{{ route('admin.team.create') }}" class="btn btn-primary">
        <i class="bi bi-person-plus me-2"></i> Add New Member
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
                        <th class="ps-4">#</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th class="text-end pe-4">Control</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $m)
                    <tr>
                        <td class="ps-4">{{ $loop->iteration }}</td>
                        <td>
                            @if ($m->image)
                                <img src="{{ str_starts_with($m->image, 'http') ? $m->image : asset('uploads/team/' . $m->image) }}" 
                                    class="rounded-circle shadow-sm" style="width: 50px; height: 50px; object-fit: cover; border: 2px solid #fff;">
                            @else
                                <div class="rounded-circle bg-light d-flex align-items-center justify-content-center border" style="width: 50px; height: 50px;">
                                    <i class="bi bi-person text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td class="fw-medium text-dark">{{ $m->name }}</td>
                        <td><span class="badge bg-light text-dark border">{{ $m->job_title }}</span></td>
                        <td class="text-end pe-4">
                            <div class="btn-group">
                                <a href="{{ route('admin.team.edit', $m->id) }}" class="btn btn-sm btn-outline-info me-2 rounded-2">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.team.destroy', $m->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-2" onclick="return confirm('حذف العضو؟')">
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
