<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SitePage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SitePageController extends Controller
{
    public function index()
    {
        $pages = SitePage::orderBy('sort_order')
            ->orderBy('title')
            ->paginate(20);

        return view('admin.site_pages.index', compact('pages'));
    }

    public function create()
    {
        $page = new SitePage([
            'is_active' => true,
            'show_in_footer' => true,
            'show_in_nav' => false,
            'sort_order' => 0,
        ]);

        return view('admin.site_pages.create', compact('page'));
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $data['slug'] = Str::slug($data['slug']);

        $data = $this->handleImageUpload($request, $data);
        $data = $this->normalizeBuilderData($request, $data);

        SitePage::create($data);

        return redirect()
            ->route('admin.site-pages.index')
            ->with('success', 'Page created successfully.');
    }

    public function edit(SitePage $sitePage)
    {
        $page = $sitePage;

        return view('admin.site_pages.edit', compact('page'));
    }

    public function update(Request $request, SitePage $sitePage)
    {
        $data = $this->validatedData($request, $sitePage->id);

        $data['slug'] = Str::slug($data['slug'] ?: $data['title']);

        $data = $this->handleImageUpload($request, $data);
        $data = $this->normalizeBuilderData($request, $data);

        $sitePage->update($data);

        return back()->with('success', 'Page updated successfully.');
    }

    public function destroy(SitePage $sitePage)
    {
        $protected = [
            'about',
            'contact',
            'privacy-policy',
            'terms',
            'disclaimer',
            'cookies',
            'community-guidelines',
            'copyright',
            'data-deletion',
        ];

        if (in_array($sitePage->slug, $protected, true)) {
            return back()->with('error', 'This is a core page. You can disable it, but not delete it.');
        }

        $sitePage->delete();

        return redirect()
            ->route('admin.site-pages.index')
            ->with('success', 'Page deleted successfully.');
    }

    private function validatedData(Request $request, ?int $ignoreId = null): array
    {
        $uniqueSlug = 'unique:site_pages,slug';

        if ($ignoreId) {
            $uniqueSlug .= ',' . $ignoreId;
        }

        return $request->validate([
            'title' => ['required', 'string', 'max:180'],
            'slug' => ['nullable', 'string', 'max:180', $uniqueSlug],
            'type' => ['required', 'string', 'max:60'],
            'nav_label' => ['nullable', 'string', 'max:120'],

            'eyebrow' => ['nullable', 'string', 'max:180'],
            'hero_title' => ['nullable', 'string', 'max:220'],
            'hero_subtitle' => ['nullable', 'string'],
            'hero_image' => ['nullable', 'image', 'max:4096'],

            'intro_title' => ['nullable', 'string', 'max:220'],
            'intro_body' => ['nullable', 'string'],
            'content_html' => ['nullable', 'string'],

            'cta_label' => ['nullable', 'string', 'max:120'],
            'cta_url' => ['nullable', 'string', 'max:255'],

            'meta_title' => ['nullable', 'string', 'max:180'],
            'meta_description' => ['nullable', 'string', 'max:500'],

            'is_active' => ['nullable', 'boolean'],
            'show_in_nav' => ['nullable', 'boolean'],
            'show_in_footer' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
        ]);
    }

    private function handleImageUpload(Request $request, array $data): array
    {
        unset($data['hero_image']);

        if ($request->hasFile('hero_image')) {
            $file = $request->file('hero_image');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
            $filename .= '.' . $file->getClientOriginalExtension();

            $destination = public_path('imgs/pages');

            if (! is_dir($destination)) {
                mkdir($destination, 0755, true);
            }

            $file->move($destination, $filename);

            $data['hero_image'] = 'imgs/pages/' . $filename;
        }

        return $data;
    }

    private function normalizeBuilderData(Request $request, array $data): array
    {
        $data['is_active'] = $request->boolean('is_active');
        $data['show_in_nav'] = $request->boolean('show_in_nav');
        $data['show_in_footer'] = $request->boolean('show_in_footer');
        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);

        $data['blocks'] = collect($request->input('blocks', []))
            ->map(function ($block) {
                return [
                    'icon' => trim((string) ($block['icon'] ?? '')),
                    'title' => trim((string) ($block['title'] ?? '')),
                    'body' => trim((string) ($block['body'] ?? '')),
                ];
            })
            ->filter(fn ($block) => $block['title'] !== '' || $block['body'] !== '')
            ->values()
            ->all();

        $data['faqs'] = collect($request->input('faqs', []))
            ->map(function ($faq) {
                return [
                    'question' => trim((string) ($faq['question'] ?? '')),
                    'answer' => trim((string) ($faq['answer'] ?? '')),
                ];
            })
            ->filter(fn ($faq) => $faq['question'] !== '' || $faq['answer'] !== '')
            ->values()
            ->all();

        return $data;
    }
}