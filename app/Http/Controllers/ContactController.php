<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        // Data kontak sudah disediakan oleh ViewServiceProvider, jadi kita hanya perlu return view
        return view('contact.index');
    }
}