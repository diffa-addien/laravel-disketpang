<nav x-data="{ mobileMenuOpen: false }"
    class="bg-gray-900 bg-opacity-80 backdrop-blur-sm fixed w-full z-20 top-0 start-0 border-b border-gray-700">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        {{-- Logo & Brand --}}
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ url('assets/logo_haltim.png') }}" class="h-10" alt="Logo Disketapang">
            <div class="text-white text-sm">
                <span class="font-bold block leading-tight">Dinas Ketahanan Pangan</span>
                <span class="block leading-tight">Kabupaten Halmahera Timur</span>
            </div>
        </a>

        {{-- Tombol Hamburger --}}
        <div class="flex md:hidden md:order-2">
            <button @click="mobileMenuOpen = !mobileMenuOpen" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-400 rounded-lg md:hidden hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600"
                aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Buka menu utama</span>
                <i class="fa-solid fa-bars fa-lg"></i>
            </button>
        </div>

        {{-- Menu Links --}}
        <div :class="{'block': mobileMenuOpen, 'hidden': !mobileMenuOpen}"
            class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul
                class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-700 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                <li><a href="/"
                        class="block py-2 px-3 text-white rounded bg-sky-600 md:bg-transparent md:text-sky-500 md:p-0"
                        aria-current="page">Beranda</a></li>

                {{-- ========================================================== --}}
                {{-- DROPDOWN PROFIL DINAMIS --}}
                {{-- ========================================================== --}}
                <li x-data="{ dropdownOpen: false }" class="relative">
                    <button @click="dropdownOpen = !dropdownOpen" @click.away="dropdownOpen = false"
                        class="flex items-center justify-between w-full py-2 px-3 text-gray-400 hover:text-white md:hover:bg-transparent md:border-0 md:p-0 md:w-auto">
                        Profil <i class="fa-solid fa-chevron-down fa-xs ml-2"></i>
                    </button>
                    <div x-show="dropdownOpen" x-transition
                        class="absolute mt-2 w-48 bg-white rounded-lg shadow-lg z-10">
                        {{-- Loop data dari View Composer --}}
                        @forelse ($profilPages as $page)
                            <a href="{{ route('halaman.show', $page->slug) }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{ $page->title }}</a>
                        @empty
                            <span class="block px-4 py-2 text-sm text-gray-400">Belum ada halaman</span>
                        @endforelse
                    </div>
                </li>
                <li><a href="#"
                        class="block py-2 px-3 text-gray-400 hover:text-white md:hover:bg-transparent md:p-0">Galeri</a>
                </li>
                <li><a href="#"
                        class="block py-2 px-3 text-gray-400 hover:text-white md:hover:bg-transparent md:p-0">Kontak</a>
                </li>
                <li><a href="{{ route('dokumen.index') }}"
                        class="block py-2 px-3 text-gray-400 hover:text-white md:hover:bg-transparent md:p-0">Publikasi</a>
                </li>
            </ul>
        </div>
    </div>
</nav>