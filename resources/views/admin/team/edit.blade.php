@extends('admin.master')
@section('title', 'Edit Member')

@section('content')
    <div class="container">
    <h3 class="mb-4">Edit Member: {{ $member->Name }}</h3>

        @if(session()->has('msg'))
    <div class="alert alert-{{ session('type') }}" role="alert">
        {{ session('msg') }}
    </div>
    @endif

     <form action="{{ route('admin.team.update',$member->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name',$member->name) }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Job</label>
            <input type="text" name="job_title" value="{{ old('job_title',$member->job_title) }}" class="form-control">
        </div>
           <h5 class="m-4 ms-0 mb-2">Social media links</h5>
        <div class="form-group">
            <label>Instagram</label>
            <input type="text" name="instagram" value="{{ old('instagram',$member->instagram) }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Facebook</label>
            <input type="text" name="facebook" value="{{ old('facebook',$member->facebook) }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Linked in</label>
            <input type="text" name="linkedin" value="{{ old('linkedin',$member->linkedin) }}" class="form-control">
        </div>

        <div class="form-group">
            <label>x</label>
            <input type="text" name="x" value="{{ old('x',$member->x) }}" class="form-control">
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