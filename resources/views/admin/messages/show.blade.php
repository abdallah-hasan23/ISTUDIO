@extends('admin.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Message details</h3>
    </div>

    <div class="card-body">
        <p><strong>Name:</strong> {{ $message->name }}</p>
        <p><strong>Email:</strong> {{ $message->email }}</p>
        <p><strong>Subject:</strong> {{ $message->subject }}</p>
        <p><strong>Message:</strong> {{ $message->message }}</p>
    </div>

    <div class="card-footer">
        <a href="{{ route('admin.messages.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
@endsection
