<?php

namespace App\Providers;

use App\Models\Halaman;
use App\Models\Setting; // <-- Tambahkan ini
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    // ... (method register) ...

    public function boot(): void
    {
        // Composer untuk Navbar (sudah ada)
        View::composer('layouts.partials.navbar', function ($view) {
            $profilPages = Halaman::where('category', 'Profil')
                                  ->where('is_published', true)
                                  ->get();
            $view->with('profilPages', $profilPages);
        });

        // ==========================================================
        // COMPOSER BARU UNTUK FOOTER
        // ==========================================================
        View::composer('layouts.partials.footer', function ($view) {
            $contactKeys = ['contact_email', 'contact_phone', 'contact_address', 'social_facebook', 'social_instagram', 'social_youtube', 'social_twitter'];
            $contactSettings = Setting::whereIn('key', $contactKeys)->pluck('value', 'key');
            $view->with('contactSettings', $contactSettings);
        });
    }
}