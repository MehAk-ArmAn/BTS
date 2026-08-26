@extends('layouts.frontend.app')

@section('title', $page->meta_title ?: $page->title . ' · BangTan')

@section('content')
@php
    $heroImage = $page->hero_image
        ? (str_starts_with($page->hero_image, 'http') ? $page->hero_image : asset($page->hero_image))
        : asset('imgs/background.jpeg');

    $blocks = $page->blocks ?? [];
    $faqs = $page->faqs ?? [];
@endphp

<section class="cms-hero page-shell">
    <div class="cms-hero-copy reveal-pop">
        <span class="eyebrow">{{ $page->eyebrow ?: 'BangTan' }}</span>
        <h1>{{ $page->hero_title ?: $page->title }}</h1>
        <p>{{ $page->hero_subtitle ?: $page->intro_body }}</p>

        @if($page->cta_label && $page->cta_url)
            <div class="hero-actions">
                <a class="btn primary" href="{{ $page->cta_url }}">{{ $page->cta_label }}</a>
                <a class="btn ghost" href="{{ route('pages.contact') }}">Contact</a>
            </div>
        @endif
    </div>

    <div class="cms-orbit-card reveal-pop">
        <div class="cms-orbit-ring"></div>
        <img src="{{ $heroImage }}" alt="{{ $page->title }}">
        <span>{{ $page->nav_label ?: $page->title }}</span>
    </div>
</section>

@if($page->intro_title || $page->intro_body)
    <section class="page-shell cms-intro-grid">
        <div class="glass-panel reveal-pop">
            <span class="eyebrow">Overview</span>
            <h2>{{ $page->intro_title ?: $page->title }}</h2>
            <p>{{ $page->intro_body }}</p>
        </div>

        @php
            $miniStatus = match($page->type) {
                'about' => [
                    'label' => 'ARMY Origin Point',
                    'text' => 'Discover why this BangTanSonyeondan space exists and what it was built for.',
                ],

                'contact' => [
                    'label' => 'Message Portal',
                    'text' => 'Send feedback, corrections, support requests, or ideas directly to the team.',
                ],

                'privacy' => [
                    'label' => 'Privacy Promise',
                    'text' => 'See how your information is collected, protected, used, and handled here.',
                ],

                'terms' => [
                    'label' => 'Website Rules',
                    'text' => 'Understand the terms for using this fan-made Beyond The Scene experience safely and respectfully.',
                ],

                'disclaimer' => [
                    'label' => 'Fan-Site Notice',
                    'text' => 'Important details about this website being fan-made, independent, and unofficial.',
                ],

                'cookies' => [
                    'label' => 'Cookie Control',
                    'text' => 'Learn how cookies help with login sessions, security, preferences, and smooth browsing.',
                ],

                'community' => [
                    'label' => 'Safe ARMY Zone',
                    'text' => 'Guidelines for keeping this space kind, respectful, positive, and welcoming.',
                ],

                'copyright' => [
                    'label' => 'Credits & Respect',
                    'text' => 'How this site respects BTS, BT21, official owners, artists, and creative rights.',
                ],

                'data-deletion' => [
                    'label' => 'Data Request Center',
                    'text' => 'Request account, profile, quiz, or personal data deletion from this website.',
                ],

                default => [
                    'label' => 'BangTanSonyeondan Page',
                    'text' => 'Explore this fan-made BTS page created for ARMY with love and care.',
                ],
            };
        @endphp

        <div class="cms-mini-status reveal-pop">
            <b>{{ $miniStatus['label'] }}</b>
            <span>{{ $miniStatus['text'] }}</span>
            <small>Updated {{ optional($page->updated_at)->format('M d, Y') }}</small>
        </div>
    </section>
@endif

@if(count($blocks))
    <section class="page-shell section-block">
        @php
            $highlightHeading = match($page->type) {
                'about' => [
                    'eyebrow' => 'Inside The Project',
                    'title' => 'What makes this ARMY space special',
                    'text' => 'A fan-made home built to celebrate BTS stories, music, learning, memories, and the purple bond with ARMY.',
                ],

                'contact' => [
                    'eyebrow' => 'Reach Out',
                    'title' => 'Choose the right way to contact us',
                    'text' => 'Whether it is feedback, corrections, support, privacy, or ideas, this page helps your message reach the right place.',
                ],

                'privacy' => [
                    'eyebrow' => 'Your Information',
                    'title' => 'How your data is handled with care',
                    'text' => 'Understand what information may be collected, why it is used, and how privacy requests can be managed.',
                ],

                'terms' => [
                    'eyebrow' => 'Website Use',
                    'title' => 'Simple rules for a safe fan experience',
                    'text' => 'These points explain how visitors should use BangTan respectfully, safely, and responsibly.',
                ],

                'disclaimer' => [
                    'eyebrow' => 'Important Notice',
                    'title' => 'Clear details about this fan-made website',
                    'text' => 'Learn what this site is, what it is not, and how content, links, and references should be understood.',
                ],

                'cookies' => [
                    'eyebrow' => 'Browsing Experience',
                    'title' => 'How cookies support smoother website features',
                    'text' => 'Cookies may help with login sessions, security, preferences, and basic website functionality.',
                ],

                'community' => [
                    'eyebrow' => 'ARMY Space',
                    'title' => 'Guidelines for keeping this place positive',
                    'text' => 'These highlights help protect kindness, respect, safety, and good energy across the website.',
                ],

                'copyright' => [
                    'eyebrow' => 'Credits & Ownership',
                    'title' => 'Respecting official content and creators',
                    'text' => 'This page explains how BangTan respects BTS, BT21, artists, platforms, and rights owners.',
                ],

                'data-deletion' => [
                    'eyebrow' => 'Data Requests',
                    'title' => 'What to know before requesting deletion',
                    'text' => 'These points explain what details to include, what may be removed, and how requests are reviewed safely.',
                ],

                default => [
                    'eyebrow' => 'Page Highlights',
                    'title' => 'Key details from this BangTan page',
                    'text' => 'Explore the most important points from this fan-made BTS information page.',
                ],
            };
        @endphp

        <div class="section-heading reveal-pop">
            <span class="eyebrow">{{ $highlightHeading['eyebrow'] }}</span>
            <h2>{{ $highlightHeading['title'] }}</h2>
            <p>{{ $highlightHeading['text'] }}</p>
        </div>

        <div class="cms-card-grid">
            @foreach($blocks as $block)
                <article class="cms-info-card reveal-pop tilt-card">
                    <div class="cms-icon">{{ $block['icon'] ?? '💜' }}</div>
                    <h3>{{ $block['title'] ?? '' }}</h3>
                    <p>{{ $block['body'] ?? '' }}</p>
                </article>
            @endforeach
        </div>
    </section>
@endif

@if($page->content_html)
    <section class="page-shell cms-content-layout">
        <article class="cms-rich-content glass-panel reveal-pop">
            {!! $page->content_html !!}
        </article>

        <aside class="cms-side-panel reveal-pop">
            <span class="eyebrow">Quick Links</span>
            <a href="{{ route('pages.privacy') }}">Privacy Policy</a>
            <a href="{{ route('pages.terms') }}">Terms</a>
            <a href="{{ route('pages.disclaimer') }}">Disclaimer</a>
            <a href="{{ route('pages.data-deletion') }}">Data Deletion</a>
            <a href="{{ route('pages.contact') }}">Contact Support</a>
        </aside>
    </section>
@endif

@if(count($faqs))
    <section class="page-shell section-block">
        <div class="section-heading reveal-pop">
            <span class="eyebrow">FAQ</span>
            <h2>Quick answers</h2>
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