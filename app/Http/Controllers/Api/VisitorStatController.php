<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VisitorStat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VisitorStatController extends Controller
{
    public function recordVisit()
    {
        $today = Carbon::today();

        // Cari data hari ini, jika tidak ada buat baru.
        // Lalu langsung increment kolom 'visits' sebanyak 1.
        // Ini adalah operasi atomik yang aman dari race condition.
        VisitorStat::updateOrCreate(
            ['visit_date' => $today],
            ['visits' => DB::raw('visits + 1')]
        );

        return response()->json(['status' => 'success']);
    }
}