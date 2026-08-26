@extends('layouts.admin.app')

@section('title', 'Contact Messages · BTS Admin')
@section('page_heading', 'Contact Messages')

@section('content')
@include('admin.partials.page-nav')

<section class="admin-card professional-card">
    <div class="admin-card-header">
        <div>
            <p class="admin-eyebrow">Inbox</p>
            <h2>Website contact messages</h2>
        </div>

        <form method="GET" class="admin-user-search">
            <select name="status">
                <option value="">All statuses</option>
                <option value="new" @selected(request('status') === 'new')>New</option>
                <option value="read" @selected(request('status') === 'read')>Read</option>
                <option value="replied" @selected(request('status') === 'replied')>Replied</option>
                <option value="archived" @selected(request('status') === 'archived')>Archived</option>
            </select>

            <button type="submit">Filter</button>
        </form>
    </div>

    @if(session('success'))
        <div class="admin-alert success">{{ session('success') }}</div>
    @endif

    <div class="professional-table admin-table-wrap">
        <table>
            <thead>
                <tr>
                    <th>From</th>
                    <th>Subject</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Received</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($messages as $message)
                    <tr>
                        <td>
                            <strong>{{ $message->name }}</strong>
                            <br>
                            <small class="muted">{{ $message->email }}</small>
                        </td>
                        <td>{{ $message->subject ?: 'No subject' }}</td>
                        <td>{{ $message->category ?: 'General' }}</td>
                        <td><span class="admin-chip">{{ ucfirst($message->status) }}</span></td>
                        <td>{{ $message->created_at->format('M d, Y H:i') }}</td>
                        <td>
                            <a class="btn" href="{{ route('admin.contact-messages.show', $message) }}">Open</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No messages yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="admin-pagination">
        {{ $messages->links() }}
    </div>
</section>
@endsection