@extends('layouts.admin.app')

@section('title', 'Edit Page · BTS Admin')
@section('page_heading', 'Edit Page')

@section('content')
@include('admin.partials.page-nav')

<section class="admin-card professional-card">
    <div class="admin-card-header">
        <div>
            <p class="admin-eyebrow">CMS Editor</p>
            <h2>{{ $page->title }}</h2>
            <p class="admin-note">Public URL: /{{ $page->slug }}</p>
        </div>

        <a class="btn" href="{{ route('admin.site-pages.index') }}">Back</a>
    </div>

    @if(session('success'))
        <div class="admin-alert success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="admin-alert danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.site-pages.update', $page) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.site_pages.partials.form')
    </form>

    <form method="POST" action="{{ route('admin.site-pages.destroy', $page) }}" onsubmit="return confirm('Delete this page?')" style="margin-top:18px;">
        @csrf
        @method('DELETE')
        <button type="submit" class="danger">Delete Page</button>
    </form>
</section>
@endsection