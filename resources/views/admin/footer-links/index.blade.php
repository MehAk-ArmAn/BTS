@extends('layouts.admin.app')

@section('title', 'Footer CMS · BTS Admin')
@section('page_heading', 'Footer CMS 💜')

@section('content')
@include('admin.partials.page-nav')

<section class="admin-card professional-card">
    <div class="admin-card-header">
        <div>
            <p class="admin-eyebrow">Footer builder</p>
            <h2>Add Footer Item</h2>
        </div>
        <span class="admin-chip">Editable public footer</span>
    </div>

    <form method="POST" action="{{ route('admin.footer-links.store') }}" class="admin-grid-form">
        @csrf

        <label>
            Type
            <select name="type" required>
                <option value="quick">Quick Badge</option>
                <option value="social" selected>Social Media</option>
                <option value="legal">Legal / Page Link</option>
            </select>
        </label>

        <label>
            Label
            <input name="label" placeholder="Instagram / About / Learn BTS" required>
        </label>

        <label>
            Handle
            <input name="handle" placeholder="@your_username / Join Server / Contact me">
        </label>

        <label>
            URL
            <input name="url" placeholder="https://instagram.com/yourname or /about">
        </label>

        <label>
            Icon
            <input name="icon" placeholder="📸">
        </label>

        <label>
            CSS Class
            <input name="css_class" placeholder="instagram, youtube, tiktok, privacy">
        </label>

        <label>
            Sort Order
            <input type="number" name="sort_order" value="0" min="0">
        </label>

        <label class="check-row">
            <input type="checkbox" name="is_active" value="1" checked>
            Active
        </label>

        <label class="span-2">
            Note
            <textarea name="note" placeholder="Short cute description shown on social cards"></textarea>
        </label>

        <button class="span-2">Add Footer Item</button>
    </form>
</section>

@include('admin.footer-links.partials.table', [
    'title' => 'Quick Footer Badges',
    'eyebrow' => 'Small CTA badges',
    'items' => $quickLinks,
])

@include('admin.footer-links.partials.table', [
    'title' => 'Social Media Links',
    'eyebrow' => 'Social galaxy cards',
    'items' => $socialLinks,
])

@include('admin.footer-links.partials.table', [
    'title' => 'Legal / Footer Page Links',
    'eyebrow' => 'Footer page links',
    'items' => $legalLinks,
])
@endsection
