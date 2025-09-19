@extends('layouts.public')

@section('title', 'Semua Berita - Disketapang Halmahera Timur')

@section('content')

{{-- Judul Halaman --}}
<div class="bg-gray-800 pt-32 pb-16">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <h1 class="text-4xl font-bold tracking-tight text-white">Semua Berita</h1>
        <p class="mt-4 text-lg text-gray-300">Informasi dan kegiatan terbaru dari Dinas Ketahanan Pangan.</p>
    </div>
</div>

{{-- Konten --}}
<div class="bg-white py-20 sm:py-24">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        {{-- Grid Berita --}}
        <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            @forelse ($berita as $item)
            {{-- Kode artikel sama persis dengan di halaman beranda --}}
            <article class="flex flex-col items-start justify-between transform transition duration-300 hover:-translate-y-2">
                <div class="relative w-full">
                    <img src="{{ $item->getFirstMediaUrl('berita_images') }}" alt="{{ $item->judul }}" class="aspect-[16/9] w-full rounded-2xl bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]">
                    <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                </div>
                <div class="max-w-xl">
                    <div class="mt-8 flex items-center gap-x-4 text-xs">
                        <time datetime="{{ $item->published_at->toDateString() }}" class="text-gray-500">{{ $item->published_at->translatedFormat('d F Y') }}</time>
                    </div>
                    <div class="group relative">
                        <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-sky-600">
                            <a href="{{ route('berita.show', $item->slug) }}">
                                <span class="absolute inset-0"></span>
                                {{ $item->judul }}
                            </a>
                        </h3>
                        <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{!! Str::limit(strip_tags($item->isi), 150) !!}</p>
                    </div>
                </div>
            </article>
            @empty
            <div class="col-span-3 text-center text-gray-500">
                <p>Belum ada berita yang dipublikasikan.</p>
            </div>
            @endforelse
        </div>

        {{-- Paginasi --}}
        <div class="mt-16">
            {{ $berita->links() }}
        </div>
    </div>
</div>
@endsection