@extends('admin.master')
@section('title', 'Edit Settings')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('admin.settings.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Logo</label>
                <input type="file" name="logo" class="form-control">
                @if($setting && $setting->logo)
                    <img src="{{ asset('uploads/settings/' . $setting->logo) }}" width="80" class="mt-2">
                @endif
            </div>

            <div class="mb-3">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" value="{{ $setting->phone }}">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="{{ $setting->email }}">
            </div>

            <div class="mb-3">
                <label>Address</label>
                <input type="text" name="address" class="form-control" value="{{ $setting->address }}">
            </div>

            <hr>

            <div class="mb-3">
                <label>Facebook</label>
                <input type="text" name="facebook" class="form-control" value="{{ $setting->facebook }}">
            </div>

            <div class="mb-3">
                <label>Instagram</label>
                <input type="text" name="instgram" class="form-control" value="{{ $setting->instgram }}">
            </div>

            <div class="mb-3">
                <label>X (Twitter)</label>
                <input type="text" name="x" class="form-control" value="{{ $setting->x }}">
            </div>

            <div class="mb-3">
                <label>LinkedIn</label>
                <input type="text" name="ln" class="form-control" value="{{ $setting->ln }}">
            </div>

            <button class="btn btn-primary">Update</button>

        </form>

    </div>
</div>

@endsection