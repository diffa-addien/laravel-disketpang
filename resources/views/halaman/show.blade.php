@extends('layouts.public')

@section('title', $halaman->title)

@section('content')

{{-- Judul Halaman --}}
<div class="bg-gray-800 pt-32 pb-16">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <h1 class="text-4xl font-bold tracking-tight text-white">{{ $halaman->title }}</h1>
    </div>
</div>

{{-- Konten Halaman --}}
<div class="bg-white py-16">
    <div class="mx-auto max-w-3xl px-6 lg:px-8">
        {{-- Gunakan class 'prose' dari Tailwind untuk styling otomatis konten --}}
        <div class="prose prose-lg max-w-none">
            {!! $halaman->content !!}
        </div>
    </div>
</div>

@endsection