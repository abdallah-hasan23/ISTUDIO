@extends('admin.master')
@section('title','Team Page')
@section('breadcrumb','Team')
@section('content')
<div class="container">
    <h3 class="mb-4">All Members</h3>
    @if(session()->has('msg'))
    <div class="alert alert-{{ session('type') }}" role="alert">
        {{ session('msg') }}
    </div>
    @endif
<div class="container">
    <a href="{{ route('admin.team.create') }}" class="btn btn-primary mb-3">Add Member</a>

    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Job</th>
                <th>Control</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $m)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    @if ($m->image)
                        <img src="{{ asset('uploads/team/' . $m->image) }}" width="70">
                    @endif
                </td>
                <td>{{ $m->name }}</td>
                <td>{{ $m->job_title }}</td>
                <td>
                    <a href="{{ route('admin.team.edit', $m->id) }}" class="btn btn-warning btn-sm">edit</a>

                    <form action="{{ route('admin.team.destroy', $m->id) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">delete</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
