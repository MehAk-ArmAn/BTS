@php
    $footerTitle = $siteSettings['site_title'] ?? 'BangTan';
    $footerText = $siteSettings['footer_text'] ?? 'A fan-made BangTan website for ARMY. Learn, quiz, collect points, and support official BTS content.';
    $creatorName = $name ?? 'ARMY';

    $quickLinks = $footerQuickLinks ?? collect();
    $socialLinks = $footerSocialLinks ?? collect();
    $legalLinks = $footerLegalLinks ?? collect();
@endphp

<footer class="site-footer">
    <div class="footer-glow footer-glow-one"></div>
    <div class="footer-glow footer-glow-two"></div>
    <div class="footer-stars"></div>

    <div class="footer-shell">
        <div class="footer-brand-card">
            <a href="{{ url('/') }}" class="footer-brand-link" aria-label="Go to homepage">
                <img class="footer-logo" src="{{ asset('favicons/logo.png') }}" alt="{{ $footerTitle }} logo">

                <div>
                    <h2>{{ $footerTitle }}</h2>
                    <span>{{ $siteSettings['footer_tagline'] ?? 'Fan-made ARMY learning universe' }}</span>
                </div>
            </a>

            <p>{{ $footerText }}</p>

            <div class="footer-mini-badges">
                @forelse($quickLinks as $link)
                    <a href="{{ url($link->url ?: '/') }}">
                        {{ $link->icon }} {{ $link->label }}
                    </a>
                @empty
                    <a href="{{ url('/learn') }}">📚 Learn BTS</a>
                    <a href="{{ url('/quizzes') }}">🧠 Take quizzes</a>
                    <a href="{{ url('/leaderboard') }}">🏆 Earn points</a>
                @endforelse
            </div>
        </div>

        <div class="footer-grid">
            <div class="footer-column">
                <h3>Explore</h3>

                @forelse($navItems as $item)
                    <a href="{{ url($item->url) }}">
                        <span class="footer-link-emoji">✦</span>
                        {{ $item->label }}
                    </a>
                @empty
                    <a href="{{ url('/') }}">
                        <span class="footer-link-emoji">✦</span>
                        Home
                    </a>
                @endforelse
            </div>

            <div class="footer-column">
                <h3>Members</h3>

                <div class="footer-links-grid">
                    @foreach($members as $member)
                        <a href="{{ route('member.show', $member->slug ?: $member->name) }}">
                            <span class="footer-link-emoji">💜</span>
                            <span>{{ $member->name }}</span>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="footer-column footer-bt21-column">
                <h3>BT21</h3>

                <div class="bt21-footer-buttons">
                    @forelse(($footerBt21Characters ?? collect()) as $character)
                        <a href="{{ url('/bt21#' . strtolower($character->name)) }}">
                            {{ $character->emoji ?? '💜' }} {{ $character->name }}
                        </a>
                    @empty
                        <a href="{{ url('/bt21#koya') }}">🐨 KOYA</a>
                        <a href="{{ url('/bt21#rj') }}">🦙 RJ</a>
                        <a href="{{ url('/bt21#shooky') }}">🍪 SHOOKY</a>
                        <a href="{{ url('/bt21#mang') }}">🕺 MANG</a>
                        <a href="{{ url('/bt21#chimmy') }}">🐶 CHIMMY</a>
                        <a href="{{ url('/bt21#tata') }}">💜 TATA</a>
                        <a href="{{ url('/bt21#cooky') }}">🐰 COOKY</a>
                        <a href="{{ url('/bt21#van') }}">🤖 VAN</a>
                    @endforelse
                </div>
            </div>

            <div class="footer-column footer-community-column">
                <h3>Community</h3>

                <p class="footer-contact-line">{{ $adminEmail }}</p>
                <p class="footer-contact-line">{{ $location }}</p>

                @guest
                    <a class="footer-login-link" href="{{ route('register') }}">Join the leaderboard</a>
                @else
                    <a class="footer-login-link" href="{{ route('user.dashboard') }}">Open dashboard</a>
                @endguest

                <div class="footer-legal-links">
                    @forelse($legalLinks as $link)
                        <a href="{{ url($link->url ?: '/') }}">
                            <span class="footer-link-emoji">{{ $link->icon ?: '✦' }}</span>
                            {{ $link->label }}
                        </a>
                    @empty
                        <a href="{{ url('/about') }}">About</a>
                        <a href="{{ url('/contact') }}">Contact</a>
                        <a href="{{ url('/privacy-policy') }}">Privacy Policy</a>
                        <a href="{{ url('/terms') }}">Terms of Use</a>
                        <a href="{{ url('/disclaimer') }}">Disclaimer</a>
                        <a href="{{ url('/cookies') }}">Cookie Policy</a>
                        <a href="{{ url('/community-guidelines') }}">Community Guidelines</a>
                        <a href="{{ url('/copyright') }}">Copyright & Credits</a>
                        <a href="{{ url('/data-deletion') }}">Data Deletion</a>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="footer-social-zone">
            <div class="footer-social-heading">
                <span>{{ $siteSettings['footer_social_kicker'] ?? 'Connect with the BangTan ARMY hub' }}</span>
                <h3>{{ $siteSettings['footer_social_title'] ?? 'Find us across the Universe' }}</h3>
                <p>{{ $siteSettings['footer_social_text'] ?? 'Follow, subscribe, pin, share, and stay connected with every purple corner of BangTan.' }}</p>
            </div>

            <div class="social-galaxy-grid">
                @forelse($socialLinks as $social)
                    <a
                        href="{{ $social->url }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="social-galaxy-card social-{{ $social->css_class ?: 'default' }}"
                        aria-label="Open {{ $social->label }}"
                    >
                        <span class="social-card-shine"></span>

                        <span class="social-icon-orb">
                            {{ $social->icon ?: '💜' }}
                        </span>

                        <span class="social-info">
                            <strong>{{ $social->label }}</strong>
                            <small>{{ $social->handle ?: 'Follow us' }}</small>
                            <em>{{ $social->note ?: 'Tap to visit' }}</em>
                        </span>

                        <span class="social-arrow">↗</span>
                    </a>
                @empty
                    <div class="social-empty-card">
                        <strong>No social links added yet.</strong>
                        <span>We'll give you a way to connect with us soon, until then contact us through out Contact page :)</span>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="footer-bottom">
            <span>© {{ date('Y') }} {{ $footerTitle }}.</span>
            <span class="footer-credit-line">
                Created by <a href="https://pixelcraftslab.com" target="_blank" rel="noopener noreferrer">{{ $creatorName }}</a> · Fan-made · Support official BTS content.
            </span>
        </div>
    </div>
</footer>
