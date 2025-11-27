@extends('admin.master')
@section('title', 'Edit Services')

@section('content')
    <div class="container">
    <h3 class="mb-4">Edit Service: {{ $service->title }}</h3>

        @if(session()->has('msg'))
    <div class="alert alert-{{ session('type') }}" role="alert">
        {{ session('msg') }}
    </div>
    @endif
    <form action="{{ route('admin.services.update',$service->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>Service Title</label>
            <input type="text" name="title" value="{{ old('title',$service->title) }}" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Service Description</label>
            <textarea name="description" class="form-control" rows="4" required>{{ old('description',$service->description) }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label>Service Image (you can choose picture or more)</label>
            <input type="file" name="icon" class="form-control" multiple>
        </div>

        <h5>current photos</h5>
        <div class="row">
            <div class="col-md-3 text-center mb-3">
                <img src="{{ asset('uploads/services/' . $service->image) }}" class="img-fluid mb-2" style="height:120px; object-fit:cover;">

                {{-- <form action="{{ route('admin.services.delete', $service->image) }}" method="POST">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form> --}}
            </div>
        </div>

        <button class="btn btn-success"><i class="bi bi-floppy2"></i> Save</button>
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-90deg-left"></i> Back</a>
    </form>
</div>
@endsection