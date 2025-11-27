@extends('admin.master')
@section('title', 'Projects')
@section('breadcrumb','Projects')

@section('content')
    {{-- <h1>projects page</h1> --}}

<div class="container">
    <h3 class="mb-4">All Projects</h3>
    @if(session()->has('msg'))
    <div class="alert alert-{{ session('type') }}" role="alert">
        {{ session('msg') }}
    </div>
    @endif
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-lg"></i>Add Projects</a>

    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Type</th>
                <th>Description</th>
                <th>Status</th>
                <th width="150px">Actons</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
               
                    <img src="{{ asset('uploads/projects/' . ($project->images->first()?->image_path ?? 'default.jpg')) }}" 
                        alt="Project Image" width="100">   
                </td>
                <td>{{ $project->title }}</td>
                <td>{{ $project->category }}</td>
                <td>{{ $project->type }}</td>
                <td>{{ $project->description }}</td>
                <td>
                    @if($project->status == 'active')
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Inactive</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.projects.edit',$project->id) }}" class="btn btn-sm btn-info text-white">
                        <i class="bi bi-pen-fill"></i></a>

                    <form action="{{ route('admin.projects.destroy',$project->id) }}" method="POST" style="display:inline-block">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('حذف المشروع؟')">
                            <i class="bi bi-trash-fill"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $projects->links() }}
</div>

@endsection