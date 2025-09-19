<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $semuaBerita = Berita::where('is_published', true)
            ->latest('published_at')
            ->paginate(9); // 9 berita per halaman

        return view('berita.index', [
            'berita' => $semuaBerita
        ]);
    }

    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail(); // Error 404 jika tidak ditemukan

        return view('berita.show', [
            'berita' => $berita
        ]);
    }
}