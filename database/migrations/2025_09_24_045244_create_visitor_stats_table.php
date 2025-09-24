<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visitor_stats', function (Blueprint $table) {
            $table->id();
            $table->date('visit_date')->unique(); // Hanya ada 1 baris per tanggal
            $table->unsignedInteger('visits')->default(0); // Jumlah kunjungan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visitor_stats');
    }
};