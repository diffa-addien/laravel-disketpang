<footer class="bg-gray-900 text-gray-300">
    <div class="max-w-screen-xl px-4 py-16 mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
            {{-- Kolom 1: Tentang Instansi --}}
            <div>
                <div class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="/logo.png" class="h-12" alt="Logo Disketapang">
                    <div class="text-white text-base">
                        <span class="font-bold block leading-tight">Dinas Ketahanan Pangan</span>
                        <span class="block leading-tight">Kabupaten Halmahera Timur</span>
                    </div>
                </div>
                <p class="mt-4 text-sm text-gray-400">
                    Menyediakan informasi dan layanan terkait ketahanan pangan untuk mendukung kesejahteraan masyarakat
                    di Kabupaten Halmahera Timur.
                </p>
                <div class="flex mt-6 space-x-4 text-gray-400">
                    <a href="#" class="hover:text-white"><i class="fa-brands fa-facebook fa-lg"></i></a>
                    <a href="#" class="hover:text-white"><i class="fa-brands fa-instagram fa-lg"></i></a>
                    <a href="#" class="hover:text-white"><i class="fa-brands fa-youtube fa-lg"></i></a>
                    <a href="#" class="hover:text-white"><i class="fa-brands fa-twitter fa-lg"></i></a>
                </div>
            </div>

            {{-- Kolom 2 & 3: Tautan & Kontak --}}
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:col-span-2 lg:grid-cols-3">
                <div>
                    <p class="font-medium text-white">Tautan Cepat</p>
                    <ul class="mt-6 space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white transition">Profil</a></li>
                        <li><a href="#" class="hover:text-white transition">Layanan</a></li>
                        <li><a href="#" class="hover:text-white transition">PPID</a></li>
                        <li><a href="#" class="hover:text-white transition">Galeri</a></li>
                    </ul>
                </div>
                <div>
                    <p class="font-medium text-white">Layanan</p>
                    <ul class="mt-6 space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white transition">Informasi Harga Pangan</a></li>
                        <li><a href="#" class="hover:text-white transition">Penyuluhan Pertanian</a></li>
                        <li><a href="#" class="hover:text-white transition">Program Lumbung Pangan</a></li>
                    </ul>
                </div>
                <div>
                    <p class="font-medium text-white">Hubungi Kami</p>
                    <ul class="mt-6 space-y-4 text-sm">
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-location-dot mt-1"></i>
                            <span>{{ $contactSettings['contact_address'] ?? 'Alamat belum diatur' }}</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-envelope mt-1"></i>
                            <a href="mailto:{{ $contactSettings['contact_email'] ?? '' }}"
                                class="hover:text-white transition">{{ $contactSettings['contact_email'] ?? 'Email belum diatur' }}</a>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-phone mt-1"></i>
                            <a href="tel:{{ $contactSettings['contact_phone'] ?? '' }}"
                                class="hover:text-white transition">{{ $contactSettings['contact_phone'] ?? 'Telepon belum diatur' }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Copyright --}}
        <div class="mt-12 border-t border-gray-800 pt-6">
            <p class="text-sm text-center text-gray-500">
                &copy; {{ date('Y') }} Dinas Ketahanan Pangan Kabupaten Halmahera Timur. All rights reserved.
            </p>
        </div>
    </div>
</footer>