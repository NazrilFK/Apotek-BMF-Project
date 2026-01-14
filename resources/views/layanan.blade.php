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
            Layanan Kami
        </h1>

        <p class="text-slate-700 text-lg md:text-xl leading-relaxed max-w-3xl opacity-0 animate-fadeUpDelay">
            Nikamti bebagai layanan pemeriksaan kesehatan yang kami sediakan untuk
            mendukung kesehatan Anda dan keluarga.
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




{{-- ======================== SECTION KARTU LAYANAN ======================== --}}
<section class="relative max-w-7xl mx-auto px-6 pb-24 -mt-10">

    {{-- CARD CONTAINER --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        {{-- ============== CARD 1 – CEK GULA DARAH ============== --}}
        <div
            class="bg-white rounded-2xl shadow-lg p-8 border border-slate-100 hover:-translate-y-1 hover:shadow-2xl transition-all duration-300">

            <div class="w-14 h-14 rounded-full bg-red-100 flex items-center justify-center mb-4">
                🩸
            </div>

            <h3 class="text-2xl font-bold text-slate-800 mb-2">
                Cek Gula Darah
            </h3>

            <p class="text-slate-600 leading-relaxed">
                Pemeriksaan kadar glukosa darah untuk deteksi dini diabetes
                dan memantau kondisi kesehatan Anda secara berkala.
            </p>
        </div>

        {{-- ============== CARD 2 – CEK KOLESTEROL ============== --}}
        <div
            class="bg-white rounded-2xl shadow-lg p-8 border border-slate-100 hover:-translate-y-1 hover:shadow-2xl transition-all duration-300">

            <div class="w-14 h-14 rounded-full bg-yellow-100 flex items-center justify-center mb-4">
                🫀
            </div>

            <h3 class="text-2xl font-bold text-slate-800 mb-2">
                Cek Kolesterol
            </h3>

            <p class="text-slate-600 leading-relaxed">
                Pemeriksaan kadar kolesterol total, membantu mencegah risiko
                penyakit jantung dan gangguan pembuluh darah.
            </p>
        </div>

        {{-- ============== CARD 3 – CEK ASAM URAT ============== --}}
        <div
            class="bg-white rounded-2xl shadow-lg p-8 border border-slate-100 hover:-translate-y-1 hover:shadow-2xl transition-all duration-300">

            <div class="w-14 h-14 rounded-full bg-green-100 flex items-center justify-center mb-4">
                🦶
            </div>

            <h3 class="text-2xl font-bold text-slate-800 mb-2">
                Cek Asam Urat
            </h3>

            <p class="text-slate-600 leading-relaxed">
                Deteksi kadar asam urat dalam darah untuk mencegah nyeri sendi
                dan gejala rematik akibat penumpukan kristal urat.
            </p>
        </div>

    </div>
</section>

{{-- ======================== SECTION HUBUNGI & JADWAL ======================== --}}
<section class="relative max-w-7xl mx-auto px-6 pb-24">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        {{-- =================== HUBUNGI KAMI =================== --}}
        <div class="bg-white rounded-2xl shadow-xl border border-slate-100 p-8">

            <h2 class="text-3xl font-bold text-slate-800 mb-3">Hubungi Kami</h2>

            <p class="text-slate-600 mb-6">
                Silakan hubungi kami untuk informasi layanan, konsultasi obat,
                atau pemesanan obat secara cepat.
            </p>

            {{-- INFO KONTAK --}}
            <div class="space-y-3">

                {{-- TELEPON --}}
                <div class="flex items-center gap-3">
                    📞
                    <span class="text-slate-700 font-medium">
                        Telp: 0822-4674-0801
                    </span>
                </div>

                {{-- ALAMAT --}}
                <div class="flex items-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-6 h-6 text-red-500 flex-shrink-0"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 11a3 3 0 100-6 3 3 0 000 6z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 22s8-7.4 8-13a8 8 0 10-16 0c0 5.6 8 13 8 13z" />
                    </svg>

                    <span class="text-slate-700 font-medium leading-relaxed">
                        Apotek Bhakti Medika Farma <br>
                        Jl. Moch. Toha No.77, Cigereleng <br>
                        Kec. Regol, Kota Bandung <br>
                        Jawa Barat 40253
                    </span>
                </div>

            </div>

            {{-- CTA BUTTONS --}}
            <div class="mt-8 flex flex-wrap gap-4">

                {{-- BUTTON WHATSAPP --}}
                <a href="https://wa.me/6282246740801"
                   target="_blank"
                   class="group inline-flex items-center gap-2 px-6 py-3.5 rounded-full
                          bg-gradient-to-r from-green-500 to-green-600
                          text-white font-semibold shadow-xl
                          hover:shadow-2xl hover:shadow-green-400/40
                          hover:-translate-y-0.5 transition-all duration-300">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5 text-white"
                         fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M20.52 3.48A11.77 11.77 0 0012 0a11.94 11.94 0 00-10.4 17.94L0 24l6.22-1.63A11.94 11.94 0 0012 24a12 12 0 008.48-20.52zM12 21.5a9.5 9.5 0 01-4.84-1.3l-.35-.2-3.69 1 1-3.59-.23-.37A9.49 9.49 0 1112 21.5zm5-7.16c-.27-.13-1.6-.79-1.84-.88s-.43-.13-.62.13-.71.88-.87 1.06-.32.2-.59.07a7.74 7.74 0 01-2.28-1.4 8.49 8.49 0 01-1.57-1.94c-.16-.27 0-.42.12-.55s.27-.32.4-.48a1.78 1.78 0 00.27-.45.5.5 0 00-.02-.48c-.06-.13-.62-1.49-.85-2.04s-.46-.47-.62-.48h-.53a1 1 0 00-.72.34A3 3 0 005 9.1a5.21 5.21 0 00.56 2.69 11.89 11.89 0 004.93 5.38 16 16 0 001.6.74 3.81 3.81 0 002.6.16 2.63 2.63 0 001.72-1.21 2.17 2.17 0 00.15-1.21c-.06-.12-.24-.19-.5-.31z" />
                    </svg>

                    <span>Via WhatsApp</span>
                </a>

                {{-- BUTTON LIHAT LOKASI --}}
                <a href="https://www.google.com/maps/search/?api=1&query=Jl.+Moch.+Toha+No.77,+Cigereleng,+Regol,+Bandung"
                   target="_blank"
                   class="group inline-flex items-center gap-2 px-6 py-3.5 rounded-full
                          bg-gradient-to-r from-blue-500 to-indigo-600
                          text-white font-semibold shadow-xl
                          hover:shadow-2xl hover:shadow-blue-400/40
                          hover:-translate-y-0.5 transition-all duration-300">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5 text-white"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 11a3 3 0 100-6 3 3 0 000 6z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 22s8-7.4 8-13a8 8 0 10-16 0c0 5.6 8 13 8 13z" />
                    </svg>

                    <span>Lihat Lokasi</span>
                </a>

            </div>

        </div>

        {{-- =================== JADWAL OPERASIONAL =================== --}}
        <div class="bg-white rounded-2xl shadow-xl border border-slate-100 p-8">

            <h2 class="text-3xl font-bold text-slate-800 mb-3">Jadwal Operasional</h2>

            <p class="text-slate-600 mb-6">
                Kami selalu siap melayani Anda sesuai jam operasional berikut:
            </p>

            {{-- TABEL JADWAL --}}
            <div class="rounded-xl border border-slate-200 overflow-hidden">
                <table class="w-full text-slate-700">
                    <tbody>
                        <tr class="border-b">
                            <td class="px-5 py-3 font-semibold">Senin – Jumat</td>
                            <td class="px-5 py-3 text-right">08.00 – 20.00</td>
                        </tr>
                        <tr>
                            <td class="px-5 py-3 font-semibold">Sabtu – Minggu</td>
                            <td class="px-5 py-3 text-right">Tutup</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-4 text-sm text-slate-500">
                *Jam operasional dapat berubah pada hari libur nasional.
            </div>

        </div>

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