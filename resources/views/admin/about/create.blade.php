@extends('admin.master')

@section('content')
<h2>Add About Information</h2>

<form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Title</label>
    <input type="text" name="title" class="form-control" required>

    <label>Description</label>
    <textarea name="description" class="form-control" required></textarea>

    <label>Image (optional)</label>
    <input type="file" name="image" class="form-control">

    <button class="btn btn-primary mt-3">Save</button>
</form>
@endsection
