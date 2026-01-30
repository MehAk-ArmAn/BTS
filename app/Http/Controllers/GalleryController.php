<?php

namespace App\Http\Controllers; // Folder location of this controller
use Illuminate\Support\Facades\DB; //So ts knows what a DB
use Illuminate\Http\Request; // Lets us handle HTTP requests

class GalleryController extends Controller
{
    public function index()
    {
        // array of BTS meme pics (put these in public/extra_gallery/)
        $pics = DB::table('gallery_images')->get();

        return view('gallery', compact('pics'));
    }
}
