<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media; // <-- Tambahkan ini


class Setting extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['key', 'value'];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('preview')
              ->width(400)
              ->height(300)
              ->sharpen(10);
    }

}