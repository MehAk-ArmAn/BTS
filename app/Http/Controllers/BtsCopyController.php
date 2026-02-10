<?php

namespace App\Http\Controllers;

use App\Models\BtsCopy;  // Model that talks to the DB table
use Illuminate\Http\Request;  // Used to read form inputs
use Illuminate\Validation\Rule;

class BtsCopyController extends Controller
{
    // Shows the create form page
    public function create()
    {
        // Return the Blade view file:
        // resources/views/bts_copies/create.blade.php
        return view('bts_copies.create');
    }

    // Saves form data into DB
    public function store(Request $request)
    {

        // 1) VALIDATE INPUTS
        // If validation fails, Laravel automatically sends user back
        // and fills $errors in Blade file.
        $validated = $request->validate([
            'bts_name' => ['required', 'string', 'max:255'],
            'copy_extra_name' => ['nullable', 'string', 'max:255'],
            'copy_title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('bts_copies')
                    ->where('bts_name', $request->bts_name),
            ],
            'description' => ['nullable', 'string', 'max:5000'],
        ], [
            'copy_title.unique' => '😤 This BTS copy already exists. Stop trying to clone it.',
        ]);


        // 2) SAVE INTO DATABASE
        // This uses the model to insert a new row into `bts_copies` table
        BtsCopy::create($validated);

        // 3) REDIRECT BACK WITH A SUCCESS MESSAGE
        // with('success', ...) stores a one-time message in session
        return redirect()
            ->route('bts_copies.create')
            ->with('success', '✅ BTS Copy saved successfully!');
    }

    // (Optional) Shows list of all saved copies
    public function index()
    {
        // latest() means newest first (ORDER BY created_at DESC)
        $copies = \App\Models\BtsCopy::latest()->get();

        // Send $copies to view as a variable
        return view('bts_copies.index', compact('copies'));
    }

}
