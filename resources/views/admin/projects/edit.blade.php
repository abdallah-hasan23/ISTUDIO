@extends('admin.master')
@section('title', 'Edit Projects')

@section('content')
    <div class="container">
    <h3 class="mb-4">Edit Project: {{ $project->title }}</h3>

        @if(session()->has('msg'))
    <div class="alert alert-{{ session('type') }}" role="alert">
        {{ session('msg') }}
    </div>
    @endif
    <form action="{{ route('admin.projects.update',$project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>Project Title</label>
            <input type="text" name="title" value="{{ old('title',$project->title) }}" class="form-control" required>
            @if($errors->has('title'))
                <div class="alert alert-danger">{{ $errors->first('title') }}</div>
            @endif
        </div>

        <div class="form-group mb-3">
            <label>Project Description</label>
            <textarea name="description" class="form-control" rows="4" required>{{ old('description',$project->description) }}</textarea>
            @if($errors->has('description'))
                <div class="alert alert-danger">{{ $errors->first('description') }}</div>
            @endif
        </div>

        <div class="form-group mb-3">
            <label>Project Category</label>
            <input type="text" name="category" value="{{ old('category',$project->category) }}" class="form-control" required>
            @if($errors->has('category'))
                <div class="alert alert-danger">{{ $errors->first('category') }}</div>
            @endif
        </div>

        <div class="form-group mb-3">
            <label>Project Location</label>
            <input type="text" name="location" value="{{ old('location',$project->location) }}" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Project Type</label>
            <select name="type" class="form-control">
                <option value="house" {{ old('type', $project->type) == 'house' ? 'selected' : '' }}>house</option>
                <option value="office" {{ old('type', $project->type) == 'office' ? 'selected' : '' }}>office</option>
                <option value="restaurant" {{ old('type', $project->type) == 'restaurant' ? 'selected' : '' }}>restaurant</option>
                <option value="other" {{ old('type', $project->type) == 'other' ? 'selected' : '' }}>other</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="active" {{ old('status', $project->status) == 'active' ? 'selected' : '' }}>active</option>
                <option value="inactive" {{ old('status', $project->status) == 'inactive' ? 'selected' : '' }}>inactive</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Project Image (you can choose picture or more)</label>
            <input type="file" name="images[]" class="form-control" multiple>
        </div>

        <button type="submit" class="btn btn-success"><i class="bi bi-floppy2"></i> Save</button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-90deg-left"></i> Back</a>
    </form>

    <h5>current photos</h5>
    <div class="row">
        @foreach($project->images as $img)
        <div class="col-md-3 text-center mb-3">
            <img src="{{ str_starts_with($img->image_path, 'http') ? $img->image_path : asset('uploads/projects/' . $img->image_path) }}" class="img-fluid mb-2" style="height:120px; object-fit:cover;">

            <form action="{{ route('admin.project.image.delete', $img->id) }}" method="POST">
                @csrf @method('DELETE')
                <button class="btn btn-danger btn-sm">Delete</button>
            </form>
        </div>
        @endforeach
    </div>
</div>
@endsection