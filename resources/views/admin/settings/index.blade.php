@extends('admin.master')
@section('title','Settings Page')
@section('breadcrumb','Settings')
@section('content')
<div class="container mt-4">
    <h2>Site Settings</h2>

    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    @if ($settings)
        <a href="{{ route('admin.settings.edit', $settings->id) }}" class="btn btn-primary mb-3">Edit</a>

        <div class="card p-3">
            <h4>{{ $settings->name }}</h4>

            <p><strong>phone :</strong> {{ $settings->phone }}</p>
            <p><strong>email :</strong> {{ $settings->email }}</p>
            <p><strong>address :</strong> {{ $settings->address }}</p>
            <p><strong>facebook :</strong> {{ $settings->facebook }}</p>
            <p><strong>instgram :</strong> {{ $settings->instgram }}</p>
            <p><strong>x :</strong> {{ $settings->x }}</p>
            <p><strong>ln :</strong> {{ $settings->ln }}</p>

            @if ($settings->logo)
                <img src="{{ str_starts_with($settings->logo, 'http') ? $settings->logo : asset('uploads/settings/' . $settings->logo) }}" width="200" class="mt-3">
            @endif
        </div>

    @else
        <a href="{{ route('admin.settings.create') }}" class="btn btn-success mb-3">Add Settings</a>
        <p>No About data found.</p>
    @endif
    {{-- <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="mt-4">
        @csrf

        <div class="form-group mt-3">
            <label>Site Name</label>
            <input type="text" name="site_name" class="form-control" value="{{ $setting->site_name ?? '' }}">
        </div>

        <div class="form-group mt-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $setting->phone ?? '' }}">
        </div>

        <div class="form-group mt-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $setting->email ?? '' }}">
        </div>

        <div class="form-group mt-3">
            <label>Address</label>
            <input type="text" name="address" class="form-control" value="{{ $setting->address ?? '' }}">
        </div>

        <div class="form-group mt-3">
            <label>Logo</label><br>

            @if($setting && $setting->logo)
                <img src="{{ str_starts_with($setting->logo, 'http') ? $setting->logo : asset('storage/'.$setting->logo) }}" width="120" class="mb-2" style="border-radius: 6px;">
            @endif

            <input type="file" name="logo" class="form-control-file mt-2">
        </div>

        <hr>

        <h4>Social Links</h4>

        <div class="form-group mt-3">
            <label>Facebook</label>
            <input type="text" name="facebook" class="form-control" value="{{ $setting->facebook ?? '' }}">
        </div>

        <div class="form-group mt-3">
            <label>Instagram</label>
            <input type="text" name="instagram" class="form-control" value="{{ $setting->instagram ?? '' }}">
        </div>

        <div class="form-group mt-3">
            <label>X</label>
            <input type="text" name="x" class="form-control" value="{{ $setting->twitter ?? '' }}">
        </div>

        <div class="form-group mt-3">
            <label>LinkedIn</label>
            <input type="text" name="ln" class="form-control" value="{{ $setting->linkedin ?? '' }}">
        </div>

        <button class="btn btn-success mt-3">Save</button>
    </form> --}}
</div>
@endsection