@extends('admin.master')

@section('breadcrumb','About')
@section('title','About')
@section('content')
<h2>About Information</h2>

@if ($about)
    <a href="{{ route('admin.about.edit', $about->id) }}" class="btn btn-primary mb-3">Edit</a>

    <div class="card p-3">
        <h4>{{ $about->title }}</h4>

        <p>{{ $about->description }}</p>



        @if ($about->image)
            <img src="{{ asset('uploads/about/' . $about->image) }}" width="200" class="mt-3">
        @endif
    </div>

@else
    <a href="{{ route('admin.about.create') }}" class="btn btn-success mb-3">Add About Info</a>
    <p>No About data found.</p>
@endif

@endsection
