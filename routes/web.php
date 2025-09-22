<?php

// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Models\Berita;
use App\Http\Controllers\BeritaController; // <-- Tambahkan ini
use App\Models\Setting; // <-- Tambahkan ini
use App\Models\Halaman; // <-- Tambahkan ini di atas



Route::get('/', function () {
    $beritaTerbaru = Berita::where('is_published', true)
        ->latest('published_at')
        ->take(3)
        ->get();

    // Ambil data setting background hero
    $heroSetting = Setting::where('key', 'hero_background')->first();
    // Jika ada, ambil URL gambar pertama, jika tidak, siapkan fallback
    $heroImageUrl = $heroSetting ? $heroSetting->getFirstMediaUrl('hero_background') : '/hero-bg.jpg';
    $contactKeys = ['contact_email', 'contact_phone', 'contact_address'];
    $contactSettings = Setting::whereIn('key', $contactKeys)->pluck('value', 'key');

    return view('welcome', [
        'berita' => $beritaTerbaru,
        'heroImageUrl' => $heroImageUrl, // Kirim URL ke view
        'contactSettings' => $contactSettings, // <-- Kirim data kontak ke view
    ]);
});

Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');

Route::get('/page/{slug}', function ($slug) {
    $halaman = Halaman::where('slug', $slug)
        ->where('is_published', true)
        ->firstOrFail(); // Otomatis 404 jika tidak ada atau tidak publish

    return view('halaman.show', ['halaman' => $halaman]);
})->name('halaman.show');