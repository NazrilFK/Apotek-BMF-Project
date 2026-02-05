<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Apotek Bhakti Medika Farma')</title>

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500;600&family=Pacifico&display=swap" rel="stylesheet">

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Alpine Intersect Plugin --}}
    <script defer src="https://unpkg.com/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>

    {{-- Alpine Core --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>


<body class="font-sans text-gray-800 overflow-x-hidden" style="font-family:'Poppins', sans-serif;">


    @yield('content')

    {{-- Navbar Scroll Script --}}
    <script>
        const navbar = document.getElementById('navbar');

        const isBeranda = {{ request()->routeIs('beranda') ? 'true' : 'false' }};

        if (isBeranda) {
            window.addEventListener('scroll', () => {
                if (window.scrollY > 50) {
                    navbar.classList.add('bg-slate-800');
                    navbar.classList.remove('bg-transparent');
                } else {
                    navbar.classList.add('bg-transparent');
                    navbar.classList.remove('bg-slate-800');
                }
            });
        } else {
            // Halaman lain: paksa selalu solid
            navbar.classList.add('bg-slate-800');
            navbar.classList.remove('bg-transparent');
        }
    </script>


</body>
</html>
