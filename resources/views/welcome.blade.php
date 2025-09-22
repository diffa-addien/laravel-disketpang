@extends('layouts.public')

@section('title', 'Beranda - Disketapang Halmahera Timur')

@section('content')

    {{-- resources/views/welcome.blade.php --}}

    {{-- Hero Section --}}
    <div class="relative h-screen w-full flex items-center justify-center text-white bg-gray-900">

        {{-- Container untuk Background Image & Overlay --}}
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ $heroImageUrl }}')">

            {{-- Lapisan Overlay Gelap --}}
            <div class="absolute inset-0 bg-black opacity-50"></div>
        </div>

        {{-- Container untuk Konten Teks (agar berada di atas background) --}}
        <div class="relative z-10 text-center px-4 flex flex-col items-center">

            {{-- Slogan --}}
            <div class="max-w-4xl">
                <p class="text-lg md:text-xl font-light">Selamat datang di website Dinas Ketahanan Pangan</p>
                <h1 class="text-3xl md:text-5xl font-bold uppercase tracking-wider mt-2">
                    "Menguatkan Pangan, Mewujudkan Kesejahteraan"
                </h1>
            </div>

            {{-- Info Kontak --}}
            <div
                class="mt-12 w-full max-w-5xl p-6 bg-gray-800 bg-opacity-70 backdrop-blur-md rounded-xl border border-gray-700">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="flex items-center gap-4">
                        <i class="fa-solid fa-envelope text-3xl text-sky-400"></i>
                        <div>
                            <p class="font-semibold">{{ $contactSettings['contact_email'] ?? 'Email belum diatur' }}</p>
                            <p class="text-xs text-gray-300">Pesan elektronik 24/7</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <i class="fa-brands fa-whatsapp text-4xl text-sky-400"></i>
                        <div>
                            <p class="font-semibold">{{ $contactSettings['contact_phone'] ?? 'Telepon belum diatur' }}</p>
                            <p class="text-xs text-gray-300">Chat / Telepon via Whatsapp</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <i class="fa-regular fa-map text-3xl text-sky-400"></i>
                        <div>
                            <p class="font-semibold">{{ $contactSettings['contact_address'] ?? 'Alamat belum diatur' }}</p>
                            <p class="text-xs text-gray-300">Buka alamat di Google Maps</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            {{-- Judul Section (tetap sama) --}}
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Informasi & Berita Terkini</h2>
                <p class="mt-2 text-lg leading-8 text-gray-600">
                    Ikuti perkembangan terbaru dan program-program dari Dinas Ketahanan Pangan.
                </p>
            </div>

            {{-- Grid Berita (diubah) --}}
            <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                @forelse ($berita as $item)
                    <article
                        class="flex flex-col items-start justify-between transform transition duration-300 hover:-translate-y-2">
                        {{-- Gambar --}}
                        <div class="relative w-full">
                            {{-- Mengambil gambar pertama dari koleksi --}}
                            <img src="{{ $item->getFirstMediaUrl('berita_images') }}" alt="{{ $item->judul }}"
                                class="aspect-[16/9] w-full rounded-2xl bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]">
                            <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                        </div>
                        {{-- Konten Teks --}}
                        <div class="max-w-xl">
                            <div class="mt-8 flex items-center gap-x-4 text-xs">
                                <time datetime="{{ $item->published_at->toDateString() }}"
                                    class="text-gray-500">{{ $item->published_at->translatedFormat('d F Y') }}</time>
                                {{-- Kategori bisa ditambahkan nanti jika ada fiturnya --}}
                                {{-- <span
                                    class="relative z-10 rounded-full bg-sky-100 px-3 py-1.5 font-medium text-sky-700">Kategori</span>
                                --}}
                            </div>
                            <div class="group relative">
                                <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-sky-600">
                                    {{-- Arahkan link ke halaman detail berita --}}
                                    <a href="{{ route('berita.show', $item->slug) }}">
                                        <span class="absolute inset-0"></span>
                                        {{ $item->judul }}
                                    </a>
                                </h3>
                                {{-- Excerpt bisa kita buat dari sebagian isi berita --}}
                                <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">
                                    {!! Str::limit(strip_tags($item->isi), 150) !!}</p>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-3 text-center text-gray-500">
                        <p>Belum ada berita yang dipublikasikan.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-16 text-center">
                <a href="{{ route('berita.index') }}"
                    class="rounded-md bg-sky-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-sky-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600">
                    Lihat Semua Berita
                </a>
            </div>
        </div>
    </div>

    {{--
    ============================================================
    SECTION GALERI BARU
    ============================================================
    --}}
    @php
        // Data Dummy untuk Galeri
        $galeri = [
            ['url' => 'https://images.unsplash.com/photo-1579367505671-3c5836416810?q=80&w=800&auto=format&fit=crop', 'alt' => 'Kegiatan panen padi bersama'],
            ['url' => 'https://images.unsplash.com/photo-1627923227493-20a2d3c9f34f?q=80&w=800&auto=format&fit=crop', 'alt' => 'Penyuluhan kepada kelompok tani'],
            ['url' => 'https://images.unsplash.com/photo-1599579080598-a1ad95648868?q=80&w=800&auto=format&fit=crop', 'alt' => 'Produk pertanian lokal'],
            ['url' => 'https://images.unsplash.com/photo-1625246333195-78d9c38ad449?q=80&w=800&auto=format&fit=crop', 'alt' => 'Lahan pertanian yang subur'],
            ['url' => 'https://images.unsplash.com/photo-1563201515-ADbe2a245592?q=80&w=800&auto=format&fit=crop', 'alt' => 'Distribusi bantuan pangan'],
            ['url' => 'https://images.unsplash.com/photo-1560493676-04071c5f467b?q=80&w=800&auto=format&fit=crop', 'alt' => 'Pasar tani lokal'],
            ['url' => 'https://images.unsplash.com/photo-1615755959899-31620610336e?q=80&w=800&auto=format&fit=crop', 'alt' => 'Bibit tanaman unggul'],
            ['url' => 'https://images.unsplash.com/photo-1502086228521-7b7e63567023?q=80&w=800&auto=format&fit=crop', 'alt' => 'Anak-anak belajar menanam'],
        ];
    @endphp

    <div class="bg-gray-50 py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            {{-- Judul Section --}}
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Galeri Foto</h2>
                <p class="mt-2 text-lg leading-8 text-gray-600">
                    Dokumentasi visual dari berbagai program dan kegiatan yang telah kami laksanakan.
                </p>
            </div>

            {{-- Grid Galeri --}}
            <div class="mx-auto mt-16 grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4">
                @foreach ($galeri as $item)
                    <div class="group relative overflow-hidden rounded-xl">
                        <img class="h-auto max-w-full rounded-xl object-cover transition-transform duration-500 group-hover:scale-110"
                            src="{{ $item['url'] }}" alt="{{ $item['alt'] }}">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-0 transition-all duration-300 group-hover:bg-opacity-40">
                        </div>
                        <div
                            class="absolute bottom-0 left-0 p-4 text-white opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                            <p class="text-sm font-semibold">{{ $item['alt'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-16 text-center">
                <a href="#"
                    class="rounded-md bg-sky-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-sky-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600">
                    Lihat Galeri Lengkap
                </a>
            </div>
        </div>
    </div>

@endsection