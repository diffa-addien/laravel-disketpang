<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('halamans', function (Blueprint $table) {
            $table->string('category')->default('Lainnya')->after('slug');
        });
    }

    public function down(): void
    {
        Schema::table('halamans', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }
};