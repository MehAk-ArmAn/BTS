@php
    $blocks = old('blocks', $page->blocks ?? []);
    $faqs = old('faqs', $page->faqs ?? []);

    $typeOptions = [
        'standard' => 'Standard',
        'about' => 'About',
        'contact' => 'Contact',
        'privacy' => 'Privacy Policy',
        'terms' => 'Terms',
        'disclaimer' => 'Disclaimer',
        'cookies' => 'Cookies',
        'community' => 'Community Guidelines',
        'copyright' => 'Copyright / Credits',
        'data-deletion' => 'Data Deletion',
    ];
@endphp

@if($errors->any())
    <div class="admin-alert danger">
        Please fix the highlighted fields and try again.
    </div>
@endif

<div class="admin-super-form page-builder-form">
    <label>
        Page Title
        <input type="text" name="title" value="{{ old('title', $page->title) }}" required>
        @error('title') <small>{{ $message }}</small> @enderror
    </label>

    <label>
        Slug
        <input type="text" name="slug" value="{{ old('slug', $page->slug) }}" placeholder="privacy-policy">
        @error('slug') <small>{{ $message }}</small> @enderror
    </label>

    <label>
        Page Type
        <select name="type" required>
            @foreach($typeOptions as $value => $label)
                <option value="{{ $value }}" @selected(old('type', $page->type) === $value)>{{ $label }}</option>
            @endforeach
        </select>
    </label>

    <label>
        Nav Label
        <input type="text" name="nav_label" value="{{ old('nav_label', $page->nav_label) }}" placeholder="Privacy">
    </label>

    <label>
        Eyebrow
        <input type="text" name="eyebrow" value="{{ old('eyebrow', $page->eyebrow) }}" placeholder="ARMY HOMEBASE">
    </label>

    <label>
        Hero Title
        <input type="text" name="hero_title" value="{{ old('hero_title', $page->hero_title) }}">
    </label>

    <label class="span-2">
        Hero Subtitle
        <textarea name="hero_subtitle">{{ old('hero_subtitle', $page->hero_subtitle) }}</textarea>
    </label>

    <label>
        Hero Image
        <input type="file" name="hero_image" accept="image/*">
        @if($page->hero_image)
            <small>Current: {{ $page->hero_image }}</small>
        @endif
    </label>

    <label>
        Sort Order
        <input type="number" name="sort_order" value="{{ old('sort_order', $page->sort_order ?? 0) }}">
    </label>

    <label>
        Intro Title
        <input type="text" name="intro_title" value="{{ old('intro_title', $page->intro_title) }}">
    </label>

    <label class="span-2">
        Intro Body
        <textarea name="intro_body">{{ old('intro_body', $page->intro_body) }}</textarea>
    </label>

    <label>
        CTA Label
        <input type="text" name="cta_label" value="{{ old('cta_label', $page->cta_label) }}" placeholder="Contact Support">
    </label>

    <label>
        CTA URL
        <input type="text" name="cta_url" value="{{ old('cta_url', $page->cta_url) }}" placeholder="/contact">
    </label>

    <label class="span-2">
        Main Content HTML
        <textarea class="tall-textarea" name="content_html">{{ old('content_html', $page->content_html) }}</textarea>
        <small>You can use HTML tags like &lt;h2&gt;, &lt;p&gt;, &lt;ul&gt;, &lt;li&gt;, &lt;strong&gt;.</small>
    </label>

    <label>
        Meta Title
        <input type="text" name="meta_title" value="{{ old('meta_title', $page->meta_title) }}">
    </label>

    <label>
        Meta Description
        <textarea name="meta_description">{{ old('meta_description', $page->meta_description) }}</textarea>
    </label>

    <div class="admin-unlock-box span-2">
        <p class="admin-unlock-title">Visibility</p>

        <div class="admin-checkbox-grid">
            <label class="check-row">
                <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $page->is_active))>
                Active
            </label>

            <label class="check-row">
                <input type="checkbox" name="show_in_nav" value="1" @checked(old('show_in_nav', $page->show_in_nav))>
                Show in Navbar
            </label>

            <label class="check-row">
                <input type="checkbox" name="show_in_footer" value="1" @checked(old('show_in_footer', $page->show_in_footer))>
                Show in Footer
            </label>
        </div>
    </div>
</div>

<section class="admin-card professional-card compact-new-box">
    <div class="admin-card-header">
        <div>
            <p class="admin-eyebrow">Editable Cards</p>
            <h2>Page highlight blocks</h2>
            <p class="admin-note">Use these for privacy points, about values, support info, app notices, etc.</p>
        </div>
        <span class="admin-chip">Up to 8 blocks</span>
    </div>

    <div class="admin-super-form">
        @for($i = 0; $i < 8; $i++)
            @php $block = $blocks[$i] ?? []; @endphp

            <div class="admin-details span-2">
                <strong>Block {{ $i + 1 }}</strong>

                <div class="admin-super-form compact-form" style="margin-top:12px;">
                    <label>
                        Icon / Emoji
                        <input type="text" name="blocks[{{ $i }}][icon]" value="{{ $block['icon'] ?? '' }}" placeholder="💜">
                    </label>

                    <label>
                        Title
                        <input type="text" name="blocks[{{ $i }}][title]" value="{{ $block['title'] ?? '' }}">
                    </label>

                    <label class="span-2">
                        Body
                        <textarea name="blocks[{{ $i }}][body]">{{ $block['body'] ?? '' }}</textarea>
                    </label>
                </div>
            </div>
        @endfor
    </div>
</section>

<section class="admin-card professional-card compact-new-box">
    <div class="admin-card-header">
        <div>
            <p class="admin-eyebrow">FAQ Builder</p>
            <h2>Frequently asked questions</h2>
        </div>
        <span class="admin-chip">Up to 8 FAQs</span>
    </div>

    <div class="admin-super-form">
        @for($i = 0; $i < 8; $i++)
            @php $faq = $faqs[$i] ?? []; @endphp

            <div class="admin-details span-2">
                <strong>FAQ {{ $i + 1 }}</strong>

                <div class="admin-super-form compact-form" style="margin-top:12px;">
                    <label>
                        Question
                        <input type="text" name="faqs[{{ $i }}][question]" value="{{ $faq['question'] ?? '' }}">
                    </label>

                    <label>
                        Answer
                        <textarea name="faqs[{{ $i }}][answer]">{{ $faq['answer'] ?? '' }}</textarea>
                    </label>
                </div>
            </div>
        @endfor
    </div>
</section>

<div class="admin-sticky-save">
    <span>Save changes to this public page</span>
    <button type="submit">Save Page</button>
</div>