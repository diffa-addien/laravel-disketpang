<?php

// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Models\Berita;
use App\Http\Controllers\BeritaController; // <-- Tambahkan ini

Route::get('/', function () {
    $beritaTerbaru = Berita::where('is_published', true)
        ->latest('published_at') // Urutkan dari yang paling baru
        ->take(3) // Ambil 3 saja
        ->get();

    return view('welcome', [
        'berita' => $beritaTerbaru
    ]);
});

Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');