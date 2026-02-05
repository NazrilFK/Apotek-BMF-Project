@extends('layouts.app')
@section('title', 'Tentang Kami')

@section('content')

{{-- ======================== HEADER (NAVBAR) ======================== --}}
<header class="relative text-white font-body z-40">

    {{-- NAVBAR --}}
    <nav id="navbar"
        x-data="{ open: false }"
        class="fixed top-0 left-0 w-full z-30 h-16 md:h-20
               bg-slate-800/95 backdrop-blur shadow-lg
               transition-all duration-300">

        <div id="navbar-inner"
            class="max-w-7xl mx-auto px-4 md:px-6 h-full flex items-center justify-between">

            {{-- Logo --}}
            <a href="/" class="flex items-center h-full translate-y-5 -ml-8">
            <img src="{{ asset('images/logo.png') }}" class="h-30 object-contain">
            </a>

            {{-- Button Hamburger (Mobile) --}}
            <button @click="open = !open"
                    class="md:hidden text-white focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            {{-- Menu Desktop --}}
            <ul class="hidden md:flex ml-auto gap-10 text-sm font-medium text-white">

                @php
                    $menus = [
                        'beranda' => ['label' => 'Beranda', 'url' => route('beranda')],
                        'tentang' => ['label' => 'Tentang Kami', 'url' => route('tentang')],
                        'layanan' => ['label' => 'Layanan', 'url' => route('layanan')],
                        'produk'  => ['label' => 'Produk', 'url' => route('produk')],
                        'kontak'  => ['label' => 'Kontak & Alamat', 'url' => route('beranda') . '#kontak'],
                    ];
                @endphp

                @foreach ($menus as $routeName => $menu)
                    <li>
                        <a href="{{ $menu['url'] }}"
                           class="relative inline-block transition

                           {{ request()->routeIs($routeName)
                                ? 'bg-gradient-to-r from-green-400 to-cyan-400 bg-clip-text text-transparent font-semibold'
                                : 'text-white' }}

                           after:content-[''] after:absolute after:left-1/2
                           after:-translate-x-1/2 after:-bottom-1 after:h-[2px]
                           after:bg-gradient-to-r after:from-green-400 after:to-cyan-400
                           after:transition-all after:duration-300

                           {{ request()->routeIs($routeName) ? 'after:w-full' : 'after:w-0' }}

                           hover:after:w-full">
                            {{ $menu['label'] }}
                        </a>
                    </li>
                @endforeach

            </ul>
        </div>

        {{-- Menu Mobile --}}
        <div x-show="open"
             x-transition
             @click.outside="open = false"
             class="md:hidden bg-slate-900/95 backdrop-blur px-6 pb-6 pt-4 space-y-4 shadow-lg">

            @foreach ($menus as $routeName => $menu)
                <a href="{{ $menu['url'] }}"
                   @click="open = false"
                   class="block text-sm font-medium transition
                   {{ request()->routeIs($routeName)
                        ? 'bg-gradient-to-r from-green-400 to-cyan-400 bg-clip-text text-transparent font-semibold'
                        : 'text-white' }}
                   hover:text-cyan-400">
                    {{ $menu['label'] }}
                </a>
            @endforeach
        </div>

    </nav>

</header>




{{-- ======================== HERO SECTION ======================== --}}
<section class="relative overflow-hidden pt-24 md:pt-28">

    {{-- BACKGROUND GRADIENT ATAS KE PUTIH --}}
    <div class="absolute inset-0 bg-gradient-to-b from-slate-200/40 to-white"></div>

    {{-- IMAGE FULL-WIDTH + SLOW ZOOM (DIPERKECIL) --}}
    <div
        class="absolute inset-0 bg-cover bg-top scale-90 animate-heroZoom"
        style="background-image:url('{{ asset('images/about.jpg') }}')">
    </div>

    {{-- OVERLAY PUTIH HALUS --}}
    <div class="absolute inset-0 bg-gradient-to-r from-white/95 via-white/70 to-transparent animate-fadeSoft"></div>

    {{-- KONTEN (DIPINDAHKAN KE ATAS) --}}
    <div class="relative max-w-7xl mx-auto px-6 pt-16 md:pt-20 pb-20 md:pb-24">

        {{-- Sub heading kecil --}}
        <span
        class="inline-block mb-3 text-sm md:text-base font-semibold tracking-wide
            bg-gradient-to-r from-teal-500 to-indigo-500
            bg-clip-text text-transparent uppercase
            opacity-0 animate-fadeUp">
        Tentang Kami
        </span>

        {{-- Judul --}}
        <h1 class="text-4xl md:text-6xl font-extrabold text-slate-800 mb-6 leading-tight opacity-0 animate-fadeUp">
            Apotek Bhakti Medika Farma
        </h1>

        {{-- Lead paragraph --}}
        <p class="text-slate-700 text-lg md:text-xl leading-relaxed max-w-3xl mb-4 opacity-0 animate-fadeUpDelay">
            Kami menghadirkan berbagai kebutuhan obat-obatan, alat kesehatan,
            serta layanan pemeriksaan kesehatan sederhana seperti cek gula darah,
            kolesterol, dan asam urat, yang didukung oleh tenaga kefarmasian
            yang kompeten dan berpengalaman.
        </p>

    </div>

</section>


<style>
@keyframes heroZoom {
  from { transform: scale(1.05); }
  to   { transform: scale(1.12); }
}

@keyframes fadeUp {
  from { opacity: 0; transform: translateY(20px); }
  to   { opacity: 1; transform: translateY(0); }
}

@keyframes fadeSoft {
  from { opacity: 0; }
  to   { opacity: 1; }
}

.animate-heroZoom {
  animation: heroZoom 18s ease-out infinite alternate;
}

.animate-fadeUp {
  animation: fadeUp 0.9s ease-out forwards;
}

.animate-fadeUpDelay {
  animation: fadeUp 1.2s ease-out forwards;
}

.animate-fadeSoft {
  animation: fadeSoft 1.2s ease-out forwards;
}
</style>


{{-- ======================== HERO SECTION VISI & MISI ======================== --}}
<section class="relative max-w-7xl mx-auto px-6 py-24 overflow-hidden">

    {{-- BACKGROUND GRADIENT + ORNAMEN --}}
    <div class="absolute inset-0 -z-10 bg-gradient-to-b from-slate-100 via-white to-slate-50"></div>

    {{-- ORNAMEN BLUR BULAT --}}
    <div class="absolute -top-24 -left-24 w-96 h-96 bg-teal-300/20 rounded-full blur-3xl"></div>
    <div class="absolute top-1/3 -right-24 w-96 h-96 bg-indigo-300/20 rounded-full blur-3xl"></div>

    <div class="grid md:grid-cols-2 gap-10 items-start relative z-10">

        {{-- FOTO TIM --}}
        <div class="relative group ">

            {{-- CARD BAYANGAN DI BELAKANG --}}
            <div
                class="absolute -inset-4 rounded-3xl bg-gradient-to-br
                       from-teal-300/30 to-indigo-300/30 blur-xl opacity-70
                       group-hover:opacity-100 transition duration-700">
            </div>

            {{-- BACK CARD --}}
            <div
                class="absolute top-4 left-4 w-full h-full rounded-3xl
                       bg-white shadow-2xl border border-slate-100">
            </div>

            {{-- CARD UTAMA – ANIMASI FLOAT --}}
            <div
                class="relative rounded-3xl shadow-2xl bg-white overflow-hidden
                       animate-[float_6s_ease-in-out_infinite]
                       transition duration-500 group-hover:shadow-3xl">

                <img
                    src="{{ asset('images/team-apotek.jpg') }}"
                    class="w-full rounded-3xl object-cover md:h-[550px]">
            </div>

        </div>

        {{-- VISI & MISI --}}
        <div class="flex flex-col h-full space-y-6">

            {{-- VISI --}}
            <div
                class="relative bg-white/90 backdrop-blur rounded-3xl shadow-xl p-8
                       hover:shadow-2xl transition duration-500 border border-slate-100">

                {{-- GARIS AKSEN --}}
                <div class="absolute top-0 left-3 h-1 w-24 bg-gradient-to-r from-teal-500 to-indigo-500 rounded-tr-full"></div>

                <h3 class="text-2xl font-extrabold mb-3 text-slate-800">
                    Visi Kami
                </h3>
                <p class="text-gray-700 leading-relaxed">
                    Menjadi apotek terpercaya dan terdepan dalam memberikan
                    pelayanan kefarmasian yang profesional, aman, dan
                    berorientasi pada kepuasan serta keselamatan masyarakat.
                </p>
            </div>

            {{-- MISI --}}
            <div
                class="relative bg-white/90 backdrop-blur rounded-3xl shadow-xl p-8
                       hover:shadow-2xl transition duration-500 mt-auto border border-slate-100">

                {{-- GARIS AKSEN --}}
                <div class="absolute top-0 left-3 h-1 w-24 bg-gradient-to-r from-indigo-500 to-teal-500 rounded-tr-full"></div>

                <h3 class="text-2xl font-extrabold mb-4 text-slate-800">
                    Misi Kami
                </h3>

                <ul class="space-y-3 text-gray-700">
                    <li class="flex gap-3 items-start">
                        <span class="mt-1 h-2 w-2 rounded-full bg-teal-500"></span>
                        Menyediakan perbekalan kefarmasian yang aman, bermutu,
                        dan terjangkau bagi seluruh lapisan masyarakat.
                    </li>

                    <li class="flex gap-3 items-start">
                        <span class="mt-1 h-2 w-2 rounded-full bg-teal-500"></span>
                        Memberikan pelayanan yang ramah, cepat, dan profesional
                        dengan mengutamakan kebutuhan konsumen.
                    </li>

                    <li class="flex gap-3 items-start">
                        <span class="mt-1 h-2 w-2 rounded-full bg-teal-500"></span>
                        Mengutamakan keselamatan dan ketepatan dalam setiap
                        proses pelayanan kefarmasian.
                    </li>

                    <li class="flex gap-3 items-start">
                        <span class="mt-1 h-2 w-2 rounded-full bg-teal-500"></span>
                        Membangun hubungan yang harmonis dan berkelanjutan
                        dengan seluruh stakeholder terkait.
                    </li>
                </ul>
            </div>

        </div>

    </div>
</section>

<style>
@keyframes float {
  0%   { transform: translateY(0px); }
  50%  { transform: translateY(-10px); }
  100% { transform: translateY(0px); }
}
</style>








{{-- ================= FOOTER ================= --}}
<footer class="bg-gradient-to-b from-slate-800 to-slate-950 text-gray-300 pt-16">

    <div class="max-w-7xl mx-auto px-4 md:px-6 grid gap-12 md:gap-16 md:grid-cols-3">

        {{-- ================= BRAND ================= --}}
        <div class="text-center md:text-left">

            {{-- LOGO --}}
            <div class="flex items-center justify-center md:justify-start gap-3 mb-5">
                <img src="{{ asset('images/logo-apotek.svg') }}"
                     alt="Apotek Bhakti Medika Farma"
                     class="h-10 w-auto">

                <span class="text-xl font-semibold text-white">
                    Bhakti Medika Farma
                </span>
            </div>

            {{-- DESKRIPSI --}}
            <p class="text-sm leading-relaxed text-white max-w-xs mx-auto md:mx-0 mb-6">
                Menyediakan produk kesehatan berkualitas, aman,
                dan terpercaya untuk kebutuhan keluarga Anda.
            </p>

            {{-- MARKETPLACE / SOSIAL ICON --}}
            <div class="flex items-center justify-center md:justify-start gap-4">

                <a href="https://vt.tiktok.com/ZS5HehMDs/?page=Mall"
                   target="_blank"
                   class="hover:opacity-100 transition">
                    <img src="{{ asset('images/tiktok-ft.png') }}"
                         alt="TikTok"
                         class="w-5 h-5 opacity-80">
                </a>

                <a href="https://tk.tokopedia.com/ZS5m7LkSk/"
                   target="_blank"
                   class="hover:opacity-100 transition">
                    <img src="{{ asset('images/tokopedia-ft.png') }}"
                         alt="Tokopedia"
                         class="w-6 h-6 opacity-80">
                </a>

                <a href="https://www.lazada.co.id/shop/apotek-bhakti-medika-farma/?spm=a2o4j.pdp_revamp.seller.1.65d64dff2BgHkW&itemId=8778758839&channelSource=pdp"
                   target="_blank"
                   class="hover:opacity-100 transition">
                    <img src="{{ asset('images/lazada-ft.png') }}"
                         alt="Lazada"
                         class="w-8 h-8 opacity-80">
                </a>

            </div>
        </div>

        {{-- ================= LINK CEPAT ================= --}}
        <div class="text-center md:text-left md:pl-56">

            <p class="text-lg font-semibold text-white mb-6">
                Link Cepat
            </p>

            <ul class="space-y-3 text-sm">
                <li><a href="/" class="text-center md:text-left hover:bg-gradient-to-r hover:from-green-400 hover:to-cyan-400 hover:bg-clip-text hover:text-transparent">Beranda</a></li>
                <li><a href="/tentang-kami" class="text-center md:text-left hover:bg-gradient-to-r hover:from-green-400 hover:to-cyan-400 hover:bg-clip-text hover:text-transparent">Tentang Kami</a></li>
                <li><a href="/layanan" class="text-center md:text-left hover:bg-gradient-to-r hover:from-green-400 hover:to-cyan-400 hover:bg-clip-text hover:text-transparent">Layanan</a></li>
                <li><a href="/produk" class="text-center md:text-left hover:bg-gradient-to-r hover:from-green-400 hover:to-cyan-400 hover:bg-clip-text hover:text-transparent">Produk</a></li>
                <li><a href="/#kontak" class="text-center md:text-left hover:bg-gradient-to-r hover:from-green-400 hover:to-cyan-400 hover:bg-clip-text hover:text-transparent">Kontak</a></li>
            </ul>

        </div>

        {{-- ================= CONTACT INFO ================= --}}
        <div class="text-center md:text-left">

            <p class="text-lg font-semibold text-white mb-6">
                Contact Info
            </p>

            <ul class="space-y-4 text-sm text-gray-300">

                {{-- EMAIL --}}
                <li class="flex flex-col md:flex-row items-center md:items-start justify-center md:justify-start gap-3 md:gap-4">
                    <svg class="w-5 h-5 text-white"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24">
                        <path d="M4 4h16v16H4z"></path>
                        <path d="M22 6l-10 7L2 6"></path>
                    </svg>

                    <a href="mailto:bhaktimedikafarma2@gmail.com"
                    class="text-center md:text-left hover:bg-gradient-to-r hover:from-green-400 hover:to-cyan-400 hover:bg-clip-text hover:text-transparent">
                        bhaktimedikafarma2@gmail.com
                    </a>
                </li>

                {{-- TELEPON --}}
                <li class="flex flex-col md:flex-row items-center md:items-start justify-center md:justify-start gap-3 md:gap-4">
                    <svg class="w-5 h-5 text-white"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24">
                        <path d="M22 16.92V21a2 2 0 01-2.18 2
                                19.79 19.79 0 01-8.63-3.07
                                19.5 19.5 0 01-6-6
                                19.79 19.79 0 01-3.07-8.67
                                A2 2 0 014 3h4.09
                                a2 2 0 012 1.72
                                12.05 12.05 0 00.57 2.57
                                2 2 0 01-.45 2.11L9.09 10.91
                                a16 16 0 006 6l1.51-1.51
                                a2 2 0 012.11-.45
                                12.05 12.05 0 002.57.57
                                a2 2 0 011.72 2z"></path>
                    </svg>

                    <a href="https://wa.me/6282246740801"
                    target="_blank"
                    class="text-center md:text-left hover:bg-gradient-to-r hover:from-green-400 hover:to-cyan-400 hover:bg-clip-text hover:text-transparent">
                        +62 822-4674-0801
                    </a>
                </li>

                {{-- ALAMAT --}}
                <li class="flex flex-col md:flex-row items-center md:items-start justify-center md:justify-start gap-3 md:gap-4">
                    <svg class="w-5 h-5 text-white mt-0.5 md:mt-1"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24">
                        <path d="M12 21s-6-5.686-6-10
                                a6 6 0 1112 0
                                c0 4.314-6 10-6 10z"></path>
                        <circle cx="12" cy="11" r="2"></circle>
                    </svg>

                    <a href="https://www.google.com/maps/search/?api=1&query=Jl.+Moch.+Toha+No.77,+Cigereleng,+Regol,+Bandung"
                    target="_blank"
                    class="text-center md:text-left hover:bg-gradient-to-r hover:from-green-400 hover:to-cyan-400 hover:bg-clip-text hover:text-transparent">
                        Apotek Bhakti Medika Farma<br>
                        Jl. Moch. Toha No.77, Cigereleng<br>
                        Kec. Regol, Kota Bandung<br>
                        Jawa Barat 40253
                    </a>
                </li>

            </ul>
        </div>


    </div>

    {{-- DIVIDER --}}
    <div class="border-t border-slate-800 mt-14"></div>

    {{-- COPYRIGHT --}}
    <div class="text-center py-6 text-sm text-gray-500 px-4">
        © 2025 Apotek Bhakti Medika Farma. All rights reserved.
    </div>

</footer>