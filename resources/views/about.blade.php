@extends('layouts.app')
@section('title', 'Tentang Kami')

@section('content')

{{-- ======================== HEADER & NAVBAR ======================== --}}
<header>

{{-- NAVBAR (TIDAK DIUBAH) --}}
<nav class="fixed top-0 left-0 w-full z-30 h-16 md:h-20 bg-black">

    <div class="max-w-7xl mx-auto px-6 h-full flex items-center">

        {{-- Logo --}}
        <a href="/" class="flex items-center h-full">
            <img src="{{ asset('images/logo.png') }}" class="h-20  object-contain">
        </a>

{{-- Menu --}}
<ul class="ml-auto flex gap-10 text-sm font-medium text-white">

    @php
        $menus = [
            'beranda' => ['label' => 'Beranda', 'url' => route('beranda')],
            'tentang' => ['label' => 'Tentang Kami', 'url' => route('tentang')],
            'layanan' => ['label' => 'Layanan', 'url' => route('layanan')],
            'produk' => ['label' => 'Produk', 'url' => route('produk')],
            'kontak' => ['label' => 'Kontak & Alamat', 'url' => route('beranda') . '#kontak'],
    ];
    @endphp

    @foreach ($menus as $routeName => $menu)
        <li>
            <a href="{{ $menu['url'] }}"
               class="relative inline-block transition
                      {{ request()->routeIs($routeName) ? 'text-yellow-400' : '' }}
                      after:content-[''] after:absolute after:left-1/2 after:-translate-x-1/2
                      after:-bottom-1 after:h-[2px] after:bg-yellow-400
                      after:transition-all after:duration-300
                      {{ request()->routeIs($routeName)  ? 'after:w-full' : 'after:w-0' }}
                      hover:text-cyan-400 hover:after:w-full">
                {{ $menu['label'] }}
            </a>
        </li>
    @endforeach

</ul>

    </div>

</nav>

</header>


{{-- ======================== HERO SECTION ======================== --}}
<section class="relative overflow-hidden pt-28 md:pt-32">

    {{-- BACKGROUND GRADIENT ATAS KE PUTIH --}}
    <div class="absolute inset-0 bg-gradient-to-b from-slate-200/40 to-white"></div>

    {{-- IMAGE FULL-WIDTH + SLOW ZOOM --}}
    <div
        class="absolute inset-0 bg-cover bg-center scale-105 animate-heroZoom"
        style="background-image:url('{{ asset('images/about.jpg') }}')">
    </div>

    {{-- OVERLAY PUTIH SANGAT TIPIS (biar teks tetap terbaca) --}}
    <div class="absolute inset-0 bg-gradient-to-r from-white/90 via-white/40 to-transparent animate-fadeSoft"></div>

    {{-- KONTEN --}}
    <div class="relative max-w-7xl mx-auto px-6 py-24 md:py-28">

        <h1 class="text-5xl md:text-7xl font-extrabold text-slate-800 mb-6 opacity-0 animate-fadeUp">
            Tentang Kami
        </h1>

        <p class="text-slate-700 text-lg md:text-xl leading-relaxed max-w-3xl opacity-0 animate-fadeUpDelay">
            Kami berkomitmen memberikan pelayanan kefarmasian terbaik,
            terpercaya, serta mudah dijangkau oleh seluruh masyarakat.
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



{{-- ======================== SECTION VISI & MISI ======================== --}}
<section class="relative max-w-7xl mx-auto px-6 py-20">

    <div class="absolute inset-0 -z-10 bg-gradient-to-b from-slate-100/40 to-white"></div>

    <div class="grid md:grid-cols-2 gap-8 items-start">

        {{-- FOTO TIM --}}
        <div class="relative group">

            {{-- CARD BAYANGAN DI BELAKANG --}}
            <div class="absolute -inset-4 rounded-3xl bg-gradient-to-br from-teal-300/20 to-indigo-300/20 blur-xl opacity-70 group-hover:opacity-100 transition duration-700"></div>

            {{-- BACK CARD --}}
            <div class="absolute top-4 left-4 w-full h-full rounded-3xl bg-white shadow-2xl border border-slate-100"></div>

            {{-- CARD UTAMA – ANIMASI FLOAT --}}
            <div class="relative rounded-3xl shadow-2xl bg-white overflow-hidden
            animate-[float_6s_ease-in-out_infinite] transition duration-500 group-hover:shadow-3xl">

                <img
                    src="{{ asset('images/team-apotek.jpg') }}"
                    class="w-full rounded-3xl object-cover md:h-[480px]">
            </div>


        </div>

        {{-- VISI & MISI --}}
        <div class="flex flex-col h-full space-y-6">

            {{-- VISI --}}
            <div class="bg-white rounded-3xl shadow-xl p-8 hover:shadow-2xl transition duration-500">
                <h3 class="text-2xl font-extrabold mb-3 text-slate-800">VISI</h3>
                <p class="text-gray-700 leading-relaxed">
                    Menjadi Apotek yang terpercaya, terbaik, dan terdepan dalam memberikan pelayanan
                    kepada masyarakat luas dengan harga yang terjangkau.
                </p>
            </div>

            {{-- MISI --}}
            <div class="bg-white rounded-3xl shadow-xl p-8 hover:shadow-2xl transition duration-500 mt-auto">
                <h3 class="text-2xl font-extrabold mb-3 text-slate-800">MISI</h3>

                <ul class="space-y-2 text-gray-700">
                    <li>• Menyediakan perbekalan kefarmasian yang aman, bermutu, dan terjangkau.</li>
                    <li>• Memberikan pelayanan prima terhadap seluruh konsumen.</li>
                    <li>• Mengutamakan keselamatan konsumen dalam pelayanan.</li>
                    <li>• Menjalin hubungan baik dengan seluruh stakeholder terkait.</li>
                </ul>
            </div>

        </div>


    </div>

</section>

<style>
@keyframes float {
  0% { transform: translateY(0px); }
  50% { transform: translateY(-10px); }
  100% { transform: translateY(0px); }
}
</style>





{{-- ================= FOOTER ================= --}}
<footer class="bg-gradient-to-b from-slate-900 to-slate-950 text-gray-300 pt-20">

    <div class="max-w-7xl mx-auto px-6 grid gap-16 md:grid-cols-3">

        {{-- ================= BRAND ================= --}}
        <div>

            {{-- LOGO --}}
            <div class="flex items-center gap-3 mb-5">
                <img src="{{ asset('images/logo-apotek.svg') }}"
                     alt="Apotek Bhakti Medika Farma"
                     class="h-9 w-auto">

                <span class="text-xl font-semibold text-white">
                    Bhakti Medika Farma
                </span>
            </div>

            {{-- DESKRIPSI --}}
            <p class="text-sm leading-relaxed text-white max-w-xs mb-6">
                Menyediakan produk kesehatan berkualitas, aman,
                dan terpercaya untuk kebutuhan keluarga Anda.
            </p>

            {{-- MARKETPLACE / SOSIAL ICON --}}
            <div class="flex items-center gap-4">

                {{-- TikTok --}}
                <a href="https://vt.tiktok.com/ZS5HehMDs/?page=Mall"
                target="_blank"
                   class="text-gray-400 hover:text-gray-200 transition duration-300">
                    <img src="{{ asset('images/tiktok-ft.png') }}"
                         alt="Tokopedia"
                         class="w-5 h-5 opacity-80 hover:opacity-100 transition">
                </a>

                {{-- Tokopedia --}}
                <a href="https://tk.tokopedia.com/ZS5m7LkSk/"
                target="_blank"
                   class="text-gray-400 hover:text-gray-200 transition duration-300">
                    <img src="{{ asset('images/tokopedia-ft.png') }}"
                         alt="Tokopedia"
                         class="w-6 h-6 opacity-80 hover:opacity-100 transition">
                </a>

                {{-- Lazada --}}
                <a href="https://www.lazada.co.id/shop/apotek-bhakti-medika-farma/?spm=a2o4j.pdp_revamp.seller.1.65d64dff2BgHkW&itemId=8778758839&channelSource=pdp"
                target="_blank"
                   class="text-gray-400 hover:text-gray-200 transition duration-300">
                    <img src="{{ asset('images/lazada-ft.png') }}"
                         alt="Shopee"
                         class="w-8 h-8 opacity-80 hover:opacity-100 transition">
                </a>

            </div>
        </div>

        {{-- ================= LINK CEPAT ================= --}}
        <div class="ml-56">

            <p class="text-lg font-semibold text-white mb-6">
                Link Cepat
            </p>

            <ul class="space-y-3 text-sm">
                <li><a href="/" class="hover:text-yellow-400 transition">Beranda</a></li>
                <li><a href="/tentang-kami" class="hover:text-yellow-400 transition">Tentang Kami</a></li>
                <li><a href="/layanan" class="hover:text-yellow-400 transition">Layanan</a></li>
                <li><a href="/produk" class="hover:text-yellow-400 transition">Produk</a></li>
                <li><a href="/#kontak" class="hover:text-yellow-400 transition">Kontak</a></li>
            </ul>

        </div>

        {{-- ================= CONTACT INFO ================= --}}
        <div>

            <p class="text-lg font-semibold text-white mb-6">
                Contact Info
            </p>

            <ul class="space-y-4 text-sm text-gray-300">

                {{-- EMAIL --}}
                <li class="flex items-center gap-4">
                    <svg class="w-5 h-5 text-white"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2"
                         viewBox="0 0 24 24">
                        <path d="M4 4h16v16H4z"></path>
                        <path d="M22 6l-10 7L2 6"></path>
                    </svg>

                    <a href="mailto:bhaktimedikafarma2@gmail.com"
                       class="hover:text-yellow-400 transition">
                        bhaktimedikafarma2@gmail.com
                    </a>
                </li>

                {{-- TELEPON --}}
                <li class="flex items-center gap-4">
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
                       class="hover:text-yellow-400 transition">
                        +62 822-4674-0801
                    </a>
                </li>

                {{-- ALAMAT --}}
                <li class="flex items-start gap-4">
                    <svg class="w-5 h-5 text-white mt-0.5"
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
                       class="hover:text-yellow-400 transition">
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
    <div class="border-t border-slate-800 mt-16"></div>

    {{-- COPYRIGHT --}}
    <div class="text-center py-6 text-sm text-gray-500">
        © 2025 Apotek Bhakti Medika Farma. All rights reserved.
    </div>

</footer>