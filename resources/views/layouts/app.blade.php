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
    document.addEventListener('DOMContentLoaded', function () {
        const navbar = document.getElementById('navbar');

        window.addEventListener('scroll', function () {
            if (window.scrollY > 50) {
                navbar.classList.remove('bg-transparent');
                navbar.classList.add('bg-black/90', 'backdrop-blur-md', 'shadow-lg');
            } else {
                navbar.classList.add('bg-transparent');
                navbar.classList.remove('bg-black/90', 'backdrop-blur-md', 'shadow-lg');
            }
        });
    });
    </script>

</body>
</html>
