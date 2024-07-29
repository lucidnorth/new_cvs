@extends('layouts.admin')
@section('content')
<div class="content">
<table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Recipient</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($talkToUsEntries as $entry)
                    <tr>
                        <td>{{ $entry->name }}</td>
                        <td>{{ $entry->email }}</td>
                        <td>{{ $entry->recipient }}</td>
                        <td>{{ $entry->subject }}</td>
                        <td>{{ $entry->message }}</td>
                        <td>{{ $entry->created_at->format('Y-m-d H:i:s') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No entries found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>


        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        
        <form  class="mt-5" action="{{ route('admin.complaints.reply') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="recipient" class="form-label">Recipient Email</label>
                <input type="email" class="form-control" id="recipient" name="recipient" required>
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Reply</button>
        </form>
</div>
@endsection