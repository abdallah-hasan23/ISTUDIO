@extends('admin.master')

@section('breadcrumb','Messages')
@section('title','Messages')
@section('content')
<h2>Incoming messages</h2>

<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Date Sent</th>
            <th>Status</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($messages as $msg)
            <tr>
                <td>{{ $msg->name }}</td>
                <td>{{ $msg->email }}</td>
                <td>{{ $msg->subject }}</td>
                <td>{{ $msg->created_at->format('Y-m-d') }}</td>
                <td>
                    @if($msg->is_read)
                        <span class="badge bg-success">Read</span>
                    @else
                        <span class="badge bg-danger">Not Read</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.messages.show', $msg->id) }}" class="btn btn-sm btn-primary">Show</a>

                    <form action="{{ route('admin.messages.destroy', $msg->id) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you shure')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $messages->links() }}

@endsection
