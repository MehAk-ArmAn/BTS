@extends('layouts.admin.app')

@section('title', 'Create Page · BTS Admin')
@section('page_heading', 'Create Page')

@section('content')
@include('admin.partials.page-nav')

<section class="admin-card professional-card">
    <div class="admin-card-header">
        <div>
            <p class="admin-eyebrow">New CMS Page</p>
            <h2>Create public page</h2>
        </div>

        <a class="btn" href="{{ route('admin.site-pages.index') }}">Back</a>
    </div>

    <form method="POST" action="{{ route('admin.site-pages.store') }}" enctype="multipart/form-data">
        @csrf
        @include('admin.site_pages.partials.form')
    </form>
</section>
@endsection