@extends('layouts.public')

@section('title', 'Beranda - Disketapang Halmahera Timur')

@section('content')

    {{-- Hero Section --}}
    <div class="relative h-screen w-full flex items-center justify-center bg-gray-900 text-white">
        {{-- Ganti 'hero-bg.jpg' dengan path gambar background Anda di folder /public --}}
        <div class="absolute inset-0 bg-black opacity-50 z-0"
            style="background-image: url('/hero-bg.jpg'); background-size: cover; background-position: center;"></div>

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
                    {{-- Email --}}
                    <div class="flex items-center gap-4">
                        <i class="fa-solid fa-envelope text-3xl text-sky-400"></i>
                        <div>
                            <p class="font-semibold">disketapang@haltimkab.go.id</p>
                            <p class="text-xs text-gray-300">Pesan elektronik 24/7</p>
                        </div>
                    </div>
                    {{-- Whatsapp --}}
                    <div class="flex items-center gap-4">
                        <i class="fa-brands fa-whatsapp text-4xl text-sky-400"></i>
                        <div>
                            <p class="font-semibold">0812-XXXX-XXXX</p>
                            <p class="text-xs text-gray-300">Chat / Telepon via Whatsapp</p>
                        </div>
                    </div>
                    {{-- Alamat --}}
                    <div class="flex items-center gap-4">
                        <i class="fa-regular fa-map text-3xl text-sky-400"></i>
                        <div>
                            <p class="font-semibold">Kompleks Perkantoran Bupati</p>
                            <p class="text-xs text-gray-300">Buka alamat di Google Maps</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--
    ============================================================
    SECTION BERITA BARU
    ============================================================
    --}}
    @php
        // Data Dummy untuk Berita
        $berita = [
            [
                'gambar' => 'https://placehold.co/600x400/22c55e/white?text=Program',
                'kategori' => 'Program',
                'judul' => 'Disketapang Haltim Luncurkan Gerakan Tanam Cabai di Pekarangan Rumah',
                'excerpt' => 'Sebagai langkah strategis untuk menekan inflasi dan meningkatkan ketahanan pangan keluarga, program ini disambut antusias oleh warga.',
                'tanggal' => '15 September 2025',
            ],
            [
                'gambar' => 'https://placehold.co/600x400/3b82f6/white?text=Pasar',
                'kategori' => 'Pasar Murah',
                'judul' => 'Pasar Murah Diserbu Warga, Disketapang Pastikan Stok Pangan Aman',
                'excerpt' => 'Operasi pasar murah yang diadakan di Lapangan Maba berhasil menstabilkan harga beberapa komoditas pokok menjelang akhir tahun.',
                'tanggal' => '12 September 2025',
            ],
            [
                'gambar' => 'https://placehold.co/600x400/f97316/white?text=Penyuluhan',
                'kategori' => 'Penyuluhan',
                'judul' => 'Penyuluhan Pemanfaatan Lahan Tidur untuk Tanaman Produktif',
                'excerpt' => 'Puluhan kelompok tani dari berbagai desa mendapatkan pelatihan intensif mengenai cara mengelola lahan tidur menjadi sumber pangan.',
                'tanggal' => '10 September 2025',
            ],
        ];
    @endphp

    <div class="bg-white py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            {{-- Judul Section --}}
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Informasi & Berita Terkini</h2>
                <p class="mt-2 text-lg leading-8 text-gray-600">
                    Ikuti perkembangan terbaru dan program-program dari Dinas Ketahanan Pangan.
                </p>
            </div>

            {{-- Grid Berita --}}
            <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                @foreach ($berita as $item)
                    <article
                        class="flex flex-col items-start justify-between transform transition duration-300 hover:-translate-y-2">
                        {{-- Gambar --}}
                        <div class="relative w-full">
                            <img src="{{ $item['gambar'] }}" alt=""
                                class="aspect-[16/9] w-full rounded-2xl bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]">
                            <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                        </div>
                        {{-- Konten Teks --}}
                        <div class="max-w-xl">
                            <div class="mt-8 flex items-center gap-x-4 text-xs">
                                <time datetime="2025-09-17" class="text-gray-500">{{ $item['tanggal'] }}</time>
                                <span
                                    class="relative z-10 rounded-full bg-sky-100 px-3 py-1.5 font-medium text-sky-700">{{ $item['kategori'] }}</span>
                            </div>
                            <div class="group relative">
                                <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-sky-600">
                                    <a href="#">
                                        <span class="absolute inset-0"></span>
                                        {{ $item['judul'] }}
                                    </a>
                                </h3>
                                <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{{ $item['excerpt'] }}</p>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-16 text-center">
                <a href="#"
                    class="rounded-md bg-sky-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-sky-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600">
                    Lihat Semua Berita
                </a>
            </div>
        </div>
    </div>

@endsection