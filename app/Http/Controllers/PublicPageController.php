<?php

namespace App\Http\Controllers;

use App\Models\SitePage;
use Illuminate\Http\Request;

class PublicPageController extends Controller
{
    public function show(string $slug)
    {
        $page = SitePage::active()
            ->where('slug', $slug)
            ->firstOrFail();

        if ($page->type === 'contact') {
            return view('pages.contact', compact('page'));
        }

        return view('pages.show', compact('page'));
    }
}