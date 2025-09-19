@extends('layouts.public')

@section('title', $berita->judul)

@section('content')
<div class="bg-white pt-24 sm:pt-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-3xl">
            {{-- Judul & Info --}}
            <div>
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $berita->judul }}</h1>
                <p class="mt-4 text-base text-gray-500">
                    Dipublikasikan pada {{ $berita->published_at->translatedFormat('d F Y') }}
                </p>
            </div>

            {{-- Gambar Utama --}}
            <figure class="mt-16">
                <img class="aspect-video rounded-xl bg-gray-50 object-cover w-full" src="{{ $berita->getFirstMediaUrl('berita_images') }}" alt="">
            </figure>

            {{-- Isi Berita --}}
            <div class="mt-10 prose prose-lg max-w-none text-gray-600">
                {!! $berita->isi !!}
            </div>

            {{-- Galeri Gambar (jika ada lebih dari 1 gambar) --}}
            @if($berita->getMedia('berita_images')->count() > 1)
            <div class="mt-16">
                <h2 class="text-2xl font-bold text-gray-900">Galeri Gambar</h2>
                <div class="mt-6 grid grid-cols-2 gap-4 sm:grid-cols-3">
                    @foreach($berita->getMedia('berita_images') as $media)
                    <div class="group relative overflow-hidden rounded-xl">
                        <img class="h-auto max-w-full rounded-xl object-cover" src="{{ $media->getUrl() }}" alt="">
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection