@extends('layouts.public')

@section('title', 'Publikasi Dokumen')

@section('content')
{{-- Judul Halaman --}}
<div class="bg-gray-800 pt-32 pb-16">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <h1 class="text-4xl font-bold tracking-tight text-white">Publikasi Dokumen</h1>
        <p class="mt-4 text-lg text-gray-300">Unduh dokumen resmi yang dipublikasikan oleh Dinas Ketahanan Pangan.</p>
    </div>
</div>

{{-- Daftar Dokumen --}}
<div class="bg-white py-16">
    <div class="mx-auto max-w-4xl px-6 lg:px-8">
        <div class="space-y-8">
            @forelse ($dokumens as $dokumen)
                <div class="p-6 border rounded-lg shadow-sm">
                    <h2 class="text-xl font-semibold text-gray-900">{{ $dokumen->title }}</h2>
                    <p class="mt-2 text-sm text-gray-600">{{ $dokumen->description }}</p>
                    <div class="mt-4 flex items-center justify-between">
                        @if($file = $dokumen->getFirstMedia('dokumen_file'))
                            <div class="text-xs text-gray-500">
                                Tipe: {{ strtoupper(pathinfo($file->file_name, PATHINFO_EXTENSION)) }} | Ukuran: {{ $file->humanReadableSize }}
                            </div>
                            <a href="{{ $file->getUrl() }}" target="_blank" download class="inline-flex items-center gap-2 rounded-md bg-sky-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-sky-700">
                                <i class="fa-solid fa-download fa-sm"></i>
                                Unduh
                            </a>
                        @endif
                    </div>
                </div>
            @empty
                <div class="text-center text-gray-500">
                    <p>Belum ada dokumen yang dipublikasikan.</p>
                </div>
            @endforelse
        </div>

        {{-- Paginasi --}}
        <div class="mt-12">
            {{ $dokumens->links() }}
        </div>
    </div>
</div>
@endsection