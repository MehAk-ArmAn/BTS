@extends('layouts.admin.app')

@section('title', 'Site Pages · BTS Admin')
@section('page_heading', 'Site Pages')

@section('content')
@include('admin.partials.page-nav')

<section class="admin-card professional-card">
    <div class="admin-card-header">
        <div>
            <p class="admin-eyebrow">CMS Pages</p>
            <h2>Manage public pages</h2>
            <p class="admin-note">Edit About, Contact, Privacy Policy, Terms, Disclaimer, Cookies, Copyright, Community Guidelines, and Data Deletion pages.</p>
        </div>

        <a class="btn" href="{{ route('admin.site-pages.create') }}">Create Page</a>
    </div>

    @if(session('success'))
        <div class="admin-alert success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="admin-alert danger">{{ session('error') }}</div>
    @endif

    <div class="professional-table admin-table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Page</th>
                    <th>Slug</th>
                    <th>Type</th>
                    <th>Nav</th>
                    <th>Footer</th>
                    <th>Status</th>
                    <th>Sort</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($pages as $page)
                    <tr>
                        <td>
                            <strong>{{ $page->title }}</strong>
                            <br>
                            <small class="muted">{{ $page->meta_title }}</small>
                        </td>
                        <td>
                            <code>{{ $page->slug }}</code>
                        </td>
                        <td>{{ $page->type }}</td>
                        <td>{{ $page->show_in_nav ? 'Yes' : 'No' }}</td>
                        <td>{{ $page->show_in_footer ? 'Yes' : 'No' }}</td>
                        <td>
                            <span class="admin-chip">{{ $page->is_active ? 'Active' : 'Hidden' }}</span>
                        </td>
                        <td>{{ $page->sort_order }}</td>
                        <td>
                            <a class="btn" href="{{ route('admin.site-pages.edit', $page) }}">Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">No pages yet. Run the seeder below.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="admin-pagination">
        {{ $pages->links() }}
    </div>
</section>
@endsection