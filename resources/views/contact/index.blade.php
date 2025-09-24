@extends('layouts.public')

@section('title', 'Kontak')

@section('content')
{{-- Judul Halaman --}}
<div class="bg-gray-800 pt-32 pb-16">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <h1 class="text-4xl font-bold tracking-tight text-white">Hubungi Kami</h1>
        <p class="mt-4 text-lg text-gray-300">Kami siap membantu dan menerima masukan dari Anda.</p>
    </div>
</div>

{{-- Konten Kontak & Peta --}}
<div class="bg-white py-16">
    <div class="mx-auto max-w-7xl px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
        {{-- Kolom Informasi Kontak --}}
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Informasi Kontak</h2>
            <ul class="mt-6 space-y-6 text-gray-700">
                <li class="flex items-start gap-4">
                    <i class="fa-solid fa-location-dot text-2xl text-sky-600 mt-1"></i>
                    <div>
                        <h3 class="font-semibold">Alamat Kantor</h3>
                        <p>{{ $contactSettings['contact_address'] ?? 'Alamat belum diatur' }}</p>
                    </div>
                </li>
                <li class="flex items-start gap-4">
                    <i class="fa-solid fa-envelope text-2xl text-sky-600 mt-1"></i>
                    <div>
                        <h3 class="font-semibold">Email</h3>
                        <a href="mailto:{{ $contactSettings['contact_email'] ?? '' }}" class="hover:text-sky-600 transition">{{ $contactSettings['contact_email'] ?? 'Email belum diatur' }}</a>
                    </div>
                </li>
                <li class="flex items-start gap-4">
                    <i class="fa-solid fa-phone text-2xl text-sky-600 mt-1"></i>
                    <div>
                        <h3 class="font-semibold">Telepon / Whatsapp</h3>
                        <a href="tel:{{ $contactSettings['contact_phone'] ?? '' }}" class="hover:text-sky-600 transition">{{ $contactSettings['contact_phone'] ?? 'Telepon belum diatur' }}</a>
                    </div>
                </li>
            </ul>
        </div>

        {{-- Kolom Peta --}}
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Lokasi Kami</h2>
            <div class="mt-6 w-full aspect-video rounded-lg overflow-hidden shadow-md">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.540451995569!2d128.2868463749648!3d0.6762123993171959!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x329c40f168290aad%3A0x95a7aef226403a4c!2sDISKETPANG%20HALTIM!5e0!3m2!1sid!2sid!4v1758695326189!5m2!1sid!2sid"
                    width="100%"
                    height="100%"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</div>
@endsection