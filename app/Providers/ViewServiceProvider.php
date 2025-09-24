<?php

namespace App\Providers;

use App\Models\Halaman;
use App\Models\Setting; // <-- Tambahkan ini
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\VisitorStat; // <-- Tambahkan ini
use Carbon\Carbon; // <-- Tambahkan ini

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

            $stats = [
                'today' => VisitorStat::where('visit_date', Carbon::today())->value('visits') ?? 0,
                'this_week' => VisitorStat::whereBetween('visit_date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('visits'),
                'total' => VisitorStat::sum('visits'),
            ];
            $view->with('visitorStats', $stats);
        });
    }
}