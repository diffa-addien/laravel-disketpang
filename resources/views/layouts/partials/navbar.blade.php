<nav x-data="{ mobileMenuOpen: false }" class="bg-gray-900 bg-opacity-80 backdrop-blur-sm fixed w-full z-20 top-0 start-0 border-b border-gray-700">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        {{-- Logo & Brand --}}
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            {{-- Ganti 'logo.png' dengan path logo Anda di folder /public --}}
            <img src="/logo.png" class="h-10" alt="Logo Disketapang">
            <div class="text-white text-sm">
                <span class="font-bold block leading-tight">Dinas Ketahanan Pangan</span>
                <span class="block leading-tight">Kabupaten Halmahera Timur</span>
            </div>
        </a>

        {{-- Tombol Login & Hamburger --}}
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <a href="/admin" class="text-white bg-sky-600 hover:bg-sky-700 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center gap-2">
                Masuk
                <i class="fa-solid fa-arrow-right-to-bracket"></i>
            </a>
            <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-400 rounded-lg md:hidden hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Buka menu utama</span>
                <i class="fa-solid fa-bars fa-lg"></i>
            </button>
        </div>

        {{-- Menu Links --}}
        <div :class="{'block': mobileMenuOpen, 'hidden': !mobileMenuOpen}" class="items-center justify-between w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-700 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                <li><a href="#" class="block py-2 px-3 text-white rounded bg-sky-600 md:bg-transparent md:text-sky-500 md:p-0" aria-current="page">Beranda</a></li>
                {{-- Contoh Dropdown dengan Alpine.js --}}
                <li x-data="{ dropdownOpen: false }" class="relative">
                    <button @click="dropdownOpen = !dropdownOpen" @click.away="dropdownOpen = false" class="flex items-center justify-between w-full py-2 px-3 text-gray-400 hover:text-white md:hover:bg-transparent md:border-0 md:p-0 md:w-auto">
                        Profil <i class="fa-solid fa-chevron-down fa-xs ml-2"></i>
                    </button>
                    <div x-show="dropdownOpen" x-transition class="absolute mt-2 w-44 bg-white rounded-lg shadow-lg z-10">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Visi Misi</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Struktur Organisasi</a>
                    </div>
                </li>
                <li><a href="#" class="block py-2 px-3 text-gray-400 hover:text-white md:hover:bg-transparent md:p-0">Layanan</a></li>
                <li><a href="#" class="block py-2 px-3 text-gray-400 hover:text-white md:hover:bg-transparent md:p-0">Galeri</a></li>
                <li><a href="#" class="block py-2 px-3 text-gray-400 hover:text-white md:hover:bg-transparent md:p-0">Kontak</a></li>
            </ul>
        </div>
    </div>
</nav>