<?php

namespace App\Filament\Widgets;

use App\Models\VisitorStat;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class VisitorStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $today = VisitorStat::where('visit_date', Carbon::today())->value('visits') ?? 0;
        $thisWeek = VisitorStat::whereBetween('visit_date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('visits');
        $total = VisitorStat::sum('visits');

        return [
            Stat::make('Pengunjung Hari Ini', number_format($today))
                ->description('Jumlah kunjungan unik hari ini')
                ->icon('heroicon-o-user-group'),
            Stat::make('Pengunjung Minggu Ini', number_format($thisWeek))
                ->description('Total kunjungan dalam 7 hari terakhir')
                ->icon('heroicon-o-calendar-days'),
            Stat::make('Total Semua Pengunjung', number_format($total))
                ->description('Total kunjungan sejak awal')
                ->icon('heroicon-o-chart-bar'),
        ];
    }
}