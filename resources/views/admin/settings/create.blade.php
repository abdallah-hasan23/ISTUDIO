@extends('admin.master')
@section('title', 'Settings')

@section('content')
    <div class="container">
    <h3 class="mb-4">Add New Settings</h3>

        <form action="{{ route('admin.settings.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control">
        </div>
        
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control">
        </div> 

        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" class="form-control">
        </div>

        
           <h5 class="m-4 ms-0 mb-2">Social media links</h5>
        <div class="form-group">
            <label>Instagram</label>
            <input type="text" name="instgram" class="form-control">
        </div>

        <div class="form-group">
            <label>Facebook</label>
            <input type="text" name="facebook" class="form-control">
        </div>

        <div class="form-group">
            <label>Linked in</label>
            <input type="text" name="ln" class="form-control">
        </div>

        <div class="form-group">
            <label>x</label>
            <input type="text" name="x" class="form-control">
        </div>

        <div class="form-group">
            <label>Logo</label>
            <input type="file" name="logo" class="form-control">
        </div>

        <button class="btn btn-success mt-3 ">save</button>
        <a href="{{ route('admin.settings.index') }}" class="btn btn-secondary mt-3 mx-1">back</a>
    </form>
</div>
@endsection