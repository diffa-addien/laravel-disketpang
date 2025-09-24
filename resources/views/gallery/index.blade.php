@extends('layouts.public')

@section('title', 'Galeri')

@section('content')
{{-- Judul Halaman --}}
<div class="bg-gray-800 pt-32 pb-16">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <h1 class="text-4xl font-bold tracking-tight text-white">Galeri Kegiatan</h1>
        <p class="mt-4 text-lg text-gray-300">Dokumentasi visual dari berbagai program dan kegiatan kami.</p>
    </div>
</div>

{{-- Grid Galeri --}}
<div class="bg-white py-16">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4">
            @forelse ($images as $image)
                {{-- KODE DI BAWAH INI TELAH DIUBAH --}}
                <a href="{{ $image->getUrl() }}" 
                   data-fslightbox="gallery" 
                   class="group relative overflow-hidden rounded-xl aspect-square"> {{-- <-- rasio 1:1 ditambahkan di sini --}}

                    <img class="h-full w-full rounded-xl object-cover transition-transform duration-500 group-hover:scale-110" {{-- <-- class diubah menjadi h-full w-full --}}
                         src="{{ $image->getUrl('preview') }}" 
                         alt="{{ $image->name }}">

                    <div class="absolute inset-0 bg-black bg-opacity-0 transition-all duration-300 group-hover:bg-opacity-40 flex items-center justify-center">
                        <i class="fa-solid fa-magnifying-glass text-white text-3xl opacity-0 group-hover:opacity-100 transition-opacity"></i>
                    </div>
                </a>
            @empty
                <div class="col-span-full text-center text-gray-500">
                    <p>Belum ada gambar di galeri.</p>
                </div>
            @endforelse
        </div>

        {{-- Paginasi --}}
        <div class="mt-12">
            {{ $images->links() }}
        </div>
    </div>
</div>
@endsection

@push('scripts')
{{-- Script untuk Lightbox --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/fslightbox/3.4.1/index.min.js" integrity="sha512-jrAlHmAIPUTPAfD92GGfL1A+2Gf4QfDM23g1H3r0/w3jNfPHDfPlTso/engxJ1t2lH5kC1sLdGwqA2LneSjU7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush