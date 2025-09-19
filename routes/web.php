<?php

// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Models\Berita;
use App\Http\Controllers\BeritaController; // <-- Tambahkan ini
use App\Models\Setting; // <-- Tambahkan ini


Route::get('/', function () {
    $beritaTerbaru = Berita::where('is_published', true)
        ->latest('published_at')
        ->take(3)
        ->get();

    // Ambil data setting background hero
    $heroSetting = Setting::where('key', 'hero_background')->first();
    // Jika ada, ambil URL gambar pertama, jika tidak, siapkan fallback
    $heroImageUrl = $heroSetting ? $heroSetting->getFirstMediaUrl('hero_background') : '/hero-bg.jpg';

    return view('welcome', [
        'berita' => $beritaTerbaru,
        'heroImageUrl' => $heroImageUrl, // Kirim URL ke view
    ]);
});

Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');