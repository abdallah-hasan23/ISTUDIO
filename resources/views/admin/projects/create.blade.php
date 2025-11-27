@extends('admin.master')
@section('title', 'Add Projects')

@section('content')
    <div class="container">
    <h3 class="mb-4">Add New Project</h3>

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label>Project Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Project Description</label>
            <textarea name="description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="form-group mb-3">
            <label>Project Category</label>
            <input type="text" name="category" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Project Location</label>
            <input type="text" name="location" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Project Type</label>
            <select name="type" class="form-control">
                <option value="house">House</option>
                <option value="office">Desktop</option>
                <option value="restaurant">Restaurant</option>
                <option value="other">Other</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="active">Active</option>
                <option value="inactive">DisActive</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Project Image (you can choose picture or more)</label>
            <input type="file" name="images[]" class="form-control" multiple>
        </div>

        <button class="btn btn-success">Save</button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection