<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Dokumen extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'dokumens';

    protected $fillable = [
        'title',
        'description',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('dokumen_file')
            ->singleFile(); // Menandakan bahwa setiap entri hanya memiliki satu file
    }
}