<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    {{-- Ganti dengan nama instansi Anda --}}
    <title>@yield('title', 'Disketapang Halmahera Timur')</title>

    {{-- CDN Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- CDN Font Awesome 6 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- CDN Alpine.js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @stack('styles')
</head>
<body class="bg-gray-100 font-sans">
    
    {{-- Komponen Navbar akan kita letakkan di sini --}}
    @include('layouts.partials.navbar')

    <main>
        @yield('content')
    </main>

    {{-- Nanti kita bisa tambahkan footer di sini --}}
    @include('layouts.partials.footer')

    @stack('scripts')
</body>
</html>