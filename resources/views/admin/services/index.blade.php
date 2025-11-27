@extends('admin.master')
@section('title','Services Page')
@section('breadcrumb','Services')
@section('content')
<div class="container">
    <h3 class="mb-4">All Services</h3>
    @if(session()->has('msg'))
    <div class="alert alert-{{ session('type') }}" role="alert">
        {{ session('msg') }}
    </div>
    @endif
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary mb-3">Add Service</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($services as $service)
            <tr>
                <td>
                    @if($service->icon)
                        <img src="{{ asset('uploads/services/'.$service->icon) }}" width="80">
                    @endif
                </td>

                <td>{{ $service->title }}</td>
                <td>{{ $service->description }}</td>

                <td>
                    <a href="{{ route('admin.services.edit',$service->id) }}" class="btn btn-warning">Edit</a>

                    <form action="{{ route('admin.services.destroy',$service->id) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>
@endsection
