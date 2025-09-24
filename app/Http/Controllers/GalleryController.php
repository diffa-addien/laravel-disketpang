<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media; // <-- Import model Media

class GalleryController extends Controller
{
    public function index()
    {
        // Ambil semua media yang merupakan gambar, urutkan dari yang terbaru
        $images = Media::query()
            ->whereIn('mime_type', ['image/jpeg', 'image/png', 'image/gif', 'image/webp'])
            ->latest()
            ->paginate(12); // 12 gambar per halaman

        return view('gallery.index', compact('images'));
    }
}