@extends('layouts.admin.app')

@section('title', 'Contact Message · BTS Admin')
@section('page_heading', 'Contact Message')

@section('content')
@include('admin.partials.page-nav')

<section class="admin-card professional-card">
    <div class="admin-card-header">
        <div>
            <p class="admin-eyebrow">Message</p>
            <h2>{{ $contactMessage->subject ?: 'No subject' }}</h2>
            <p class="admin-note">From {{ $contactMessage->name }} · {{ $contactMessage->email }}</p>
        </div>

        <a class="btn" href="{{ route('admin.contact-messages.index') }}">Back</a>
    </div>

    @if(session('success'))
        <div class="admin-alert success">{{ session('success') }}</div>
    @endif

    <div class="admin-details">
        <p><strong>Name:</strong> {{ $contactMessage->name }}</p>
        <p><strong>Email:</strong> {{ $contactMessage->email }}</p>
        <p><strong>Category:</strong> {{ $contactMessage->category ?: 'General' }}</p>
        <p><strong>Received:</strong> {{ $contactMessage->created_at->format('M d, Y H:i') }}</p>
        <p><strong>IP:</strong> {{ $contactMessage->ip_address }}</p>
    </div>

    <div class="admin-details">
        <h3>Message</h3>
        <p style="white-space:pre-line;">{{ $contactMessage->message }}</p>
    </div>

    <form method="POST" action="{{ route('admin.contact-messages.update', $contactMessage) }}" class="admin-super-form compact-form">
        @csrf
        @method('PUT')

        <label>
            Status
            <select name="status">
                <option value="new" @selected($contactMessage->status === 'new')>New</option>
                <option value="read" @selected($contactMessage->status === 'read')>Read</option>
                <option value="replied" @selected($contactMessage->status === 'replied')>Replied</option>
                <option value="archived" @selected($contactMessage->status === 'archived')>Archived</option>
            </select>
        </label>

        <label>
            Save
            <button type="submit">Update Status</button>
        </label>
    </form>

    <form method="POST" action="{{ route('admin.contact-messages.destroy', $contactMessage) }}" onsubmit="return confirm('Delete this message?')" style="margin-top:18px;">
        @csrf
        @method('DELETE')
        <button type="submit" class="danger">Delete Message</button>
    </form>
</section>
@endsection