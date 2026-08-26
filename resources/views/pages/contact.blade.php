@extends('layouts.frontend.app')

@section('title', $page->meta_title ?: 'Contact · BangTan')

@section('content')
@php
    $heroImage = $page->hero_image
        ? (str_starts_with($page->hero_image, 'http') ? $page->hero_image : asset($page->hero_image))
        : asset('imgs/background.jpeg');

    $blocks = $page->blocks ?? [];
    $faqs = $page->faqs ?? [];
@endphp

<section class="cms-hero contact-hero page-shell">
    <div class="cms-hero-copy reveal-pop">
        <span class="eyebrow">{{ $page->eyebrow ?: 'Contact BangTan' }}</span>
        <h1>{{ $page->hero_title ?: 'Talk to us' }}</h1>
        <p>{{ $page->hero_subtitle ?: 'Questions, feedback, corrections, support requests, or website ideas — send them here.' }}</p>

        <div class="hero-actions">
            <a class="btn primary" href="#contactForm">Send Message</a>
            <a class="btn ghost" href="{{ route('pages.privacy') }}">Privacy Policy</a>
        </div>
    </div>

    <div class="cms-orbit-card contact-orbit reveal-pop">
        <div class="cms-orbit-ring"></div>
        <img src="{{ $heroImage }}" alt="Contact BangTan">
        <span>ARMY Support</span>
    </div>
</section>

<section class="page-shell contact-layout">
    <div class="contact-form-panel glass-panel reveal-pop" id="contactForm">
        <span class="eyebrow">Message Center</span>
        <h2>Send us a message</h2>
        <p class="form-note">We will get to you as soon as possible :)</p>

        @if(session('success'))
            <div class="public-alert success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="public-alert error">
                Please check the form and try again.
            </div>
        @endif

        <form method="POST" action="{{ route('contact.submit') }}" class="contact-form">
            @csrf

            <label>
                Your Name
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Your name" required>
                @error('name') <small>{{ $message }}</small> @enderror
            </label>

            <label>
                Email
                <input type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required>
                @error('email') <small>{{ $message }}</small> @enderror
            </label>

            <label>
                Category
                <select name="category">
                    <option value="">Choose category</option>
                    <option value="Support" @selected(old('category') === 'Support')>Support</option>
                    <option value="Feedback" @selected(old('category') === 'Feedback')>Feedback</option>
                    <option value="Correction" @selected(old('category') === 'Correction')>Correction</option>
                    <option value="Privacy" @selected(old('category') === 'Privacy')>Privacy</option>
                    <option value="Other" @selected(old('category') === 'Other')>Other</option>
                </select>
            </label>

            <label>
                Subject
                <input type="text" name="subject" value="{{ old('subject') }}" placeholder="What is this about?">
            </label>

            <label class="span-2">
                Message
                <textarea name="message" placeholder="Write your message..." required>{{ old('message') }}</textarea>
                @error('message') <small>{{ $message }}</small> @enderror
            </label>

            <button type="submit" class="btn primary span-2">Send Message</button>
        </form>
    </div>

    <aside class="contact-side-panel reveal-pop">
        @foreach($blocks as $block)
            <article class="cms-info-card">
                <div class="cms-icon">{{ $block['icon'] ?? '💜' }}</div>
                <h3>{{ $block['title'] ?? '' }}</h3>
                <p>{{ $block['body'] ?? '' }}</p>
            </article>
        @endforeach
    </aside>
</section>

@if($page->content_html)
    <section class="page-shell cms-content-layout">
        <article class="cms-rich-content glass-panel reveal-pop">
            {!! $page->content_html !!}
        </article>
    </section>
@endif

@if(count($faqs))
    <section class="page-shell section-block">
        <div class="section-heading reveal-pop">
            <span class="eyebrow">Contact FAQ</span>
            <h2>Before you send</h2>
        </div>

        <div class="cms-faq-list">
            @foreach($faqs as $faq)
                <details class="cms-faq reveal-pop">
                    <summary>{{ $faq['question'] ?? '' }}</summary>
                    <p>{{ $faq['answer'] ?? '' }}</p>
                </details>
            @endforeach
        </div>
    </section>
@endif
@endsection