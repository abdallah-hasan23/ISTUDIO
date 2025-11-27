@extends('admin.master')
@section('title', 'Add Services')

@section('content')
    <div class="container">
    <h3 class="mb-4">Add New Service</h3>

    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label>Service Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Service Description</label>
            <textarea name="description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="form-group mb-3">
            <label>Service Image</label>
            <input type="file" name="icon" class="form-control" multiple>
        </div>

        <button class="btn btn-success">Save</button>
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection