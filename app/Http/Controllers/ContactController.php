<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:180'],
            'subject' => ['nullable', 'string', 'max:180'],
            'category' => ['nullable', 'string', 'max:80'],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
        ]);

        $data['ip_address'] = $request->ip();
        $data['user_agent'] = substr((string) $request->userAgent(), 0, 255);

        ContactMessage::create($data);

        return back()->with('success', 'Message sent successfully. We will get back to you soon.');
    }
}