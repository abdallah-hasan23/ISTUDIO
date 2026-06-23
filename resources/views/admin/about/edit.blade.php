@extends('admin.master')

@section('content')
<h2>Edit About Information</h2>

<form action="{{ route('admin.about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Title</label>
    <input type="text" name="title" class="form-control" value="{{ $about->title }}" required>

    <label>Description</label>
    <textarea name="description" class="form-control" required>{{ $about->description }}</textarea>

    <label>Image (optional)</label>
    <input type="file" name="image" class="form-control">

    @if ($about->image)
        <p class="mt-3">Current Image:</p>
        <img src="{{ str_starts_with($about->image, 'http') ? $about->image : asset('uploads/about/' . $about->image) }}" width="200">
    @endif

    <button class="btn btn-primary mt-3">Update</button>
</form>
@endsection
