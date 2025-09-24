<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    public function index()
    {
        $dokumens = Dokumen::where('is_published', true)
            ->latest()
            ->paginate(10); // 10 dokumen per halaman

        return view('dokumen.index', compact('dokumens'));
    }
}