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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

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

    {{-- SCRIPT STATISTIK PENGUNJUNG --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Dapatkan tanggal hari ini dalam format YYYY-MM-DD
            const today = new Date().toISOString().split('T')[0];
            const lastVisitKey = 'lastVisitDate';
            const lastVisit = localStorage.getItem(lastVisitKey);

            // Jika belum pernah berkunjung atau kunjungan terakhir bukan hari ini
            if (!lastVisit || lastVisit !== today) {
                // Kirim request ke server untuk mencatat kunjungan
                fetch('/api/record-visit', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            // Jika berhasil, simpan tanggal hari ini ke localStorage
                            localStorage.setItem(lastVisitKey, today);
                            console.log('Visit recorded for ' + today);
                        }
                    })
                    .catch(error => console.error('Error recording visit:', error));
            }
        });
    </script>

</body>

</html>