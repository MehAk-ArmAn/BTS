<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterLink;
use Illuminate\Http\Request;

class FooterLinksController extends Controller
{
    public function index()
    {
        return view('admin.footer-links.index', [
            'quickLinks' => FooterLink::where('type', 'quick')->ordered()->get(),
            'socialLinks' => FooterLink::where('type', 'social')->ordered()->get(),
            'legalLinks' => FooterLink::where('type', 'legal')->ordered()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        $data['is_active'] = $request->boolean('is_active', true);
        $data['sort_order'] = $data['sort_order'] ?? 0;

        FooterLink::create($data);

        return back()->with('success', 'Footer item added successfully.');
    }

    public function update(Request $request, FooterLink $footerLink)
    {
        $data = $this->validated($request);

        $data['is_active'] = $request->boolean('is_active');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $footerLink->update($data);

        return back()->with('success', 'Footer item updated successfully.');
    }

    public function destroy(FooterLink $footerLink)
    {
        $footerLink->delete();

        return back()->with('success', 'Footer item deleted successfully.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'type' => ['required', 'string', 'in:quick,social,legal'],
            'label' => ['required', 'string', 'max:255'],
            'handle' => ['nullable', 'string', 'max:255'],
            'url' => ['nullable', 'string', 'max:1000'],
            'icon' => ['nullable', 'string', 'max:50'],
            'note' => ['nullable', 'string', 'max:500'],
            'css_class' => ['nullable', 'string', 'max:100'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);
    }
}
