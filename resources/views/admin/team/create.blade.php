@extends('admin.master')
@section('title', 'Add Members')

@section('content')
    <div class="container">
    <h3 class="mb-4">Add New Member</h3>

        <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group">
            <label>Job</label>
            <input type="text" name="job_title" class="form-control">
        </div>
           <h5 class="m-4 ms-0 mb-2">Social media links</h5>
        <div class="form-group">
            <label>Instagram</label>
            <input type="text" name="instagram" class="form-control">
        </div>

        <div class="form-group">
            <label>Facebook</label>
            <input type="text" name="facebook" class="form-control">
        </div>

        <div class="form-group">
            <label>Linked in</label>
            <input type="text" name="linkedin" class="form-control">
        </div>

        <div class="form-group">
            <label>x</label>
            <input type="text" name="x" class="form-control">
        </div>

        <div class="form-group">
            <label>image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-success mt-3 ">save</button>
        <a href="{{ route('admin.team.index') }}" class="btn btn-secondary mt-3 mx-1">back</a>
    </form>
</div>
@endsection