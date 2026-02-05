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
<section class="relative overflow-hidden pt-28 md:pt-32">

    {{-- BACKGROUND GRADIENT ATAS KE PUTIH --}}
    <div class="absolute inset-0 bg-gradient-to-b from-slate-200/40 to-white"></div>

    {{-- IMAGE FULL-WIDTH + SLOW ZOOM --}}
    <div
        class="absolute inset-0 bg-cover bg-center scale-95 animate-heroZoom"
        style="background-image:url('{{ asset('images/Layanan.jpg') }}')">
    </div>

    {{-- OVERLAY PUTIH SANGAT TIPIS (biar teks tetap terbaca) --}}
    <div class="absolute inset-0 bg-gradient-to-r from-white/90 via-white/40 to-transparent animate-fadeSoft"></div>

    {{-- KONTEN --}}
    <div class="relative max-w-7xl mx-auto px-6 py-24 md:py-28">

        <h1 class="text-5xl md:text-7xl font-extrabold text-slate-800 mb-6 opacity-0 animate-fadeUp">
            Layanan Kami
        </h1>

        <p class="text-slate-700 text-lg md:text-xl leading-relaxed max-w-3xl opacity-0 animate-fadeUpDelay">
            Nikmati bebagai layanan pemeriksaan kesehatan yang kami sediakan untuk
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
<section class="relative max-w-7xl mx-auto px-6 pt-10 pb-24">

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        {{-- ================= CARD GULA DARAH ================= --}}
        <div class="service-card relative bg-white rounded-2xl border border-slate-200 p-6
                    overflow-hidden
                    hover:shadow-xl hover:-translate-y-1 transition-all duration-300">

            {{-- WATERMARK --}}
            <div class="watermark absolute inset-0 z-0 pointer-events-none
                        opacity-10 blur-sm transition-all duration-500">
                <img src="{{ asset('images/layanan/gula-darah.png') }}"
                    class="w-full h-full object-cover">
            </div>

            {{-- CONTENT --}}
            <div class="relative z-10">

                <div class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center mb-6">
                    <img
                        src="https://cdn-icons-png.flaticon.com/128/7792/7792556.png"
                        alt="Icon"
                        class="w-6 h-6 object-contain"
                    >
                </div>

                <h3 class="text-lg font-bold text-slate-900 mb-2">
                    Cek Gula Darah
                </h3>

                <p class="text-sm text-slate-600 mb-6">
                    Pemeriksaan kadar gula darah sewaktu
                </p>

                <div class="mb-6">
                    <span class="text-sm text-slate-600">Rp</span>
                    <span class="text-3xl font-bold text-blue-600">10.000</span>
                    <span class="text-sm text-slate-600"> / pemeriksaan</span>
                </div>

                <hr class="mb-6">

                <ul class="space-y-3 text-sm text-slate-700">
                    <li>✔ Pemeriksaan cepat & akurat</li>
                    <li>✔ Hasil dalam 5 menit</li>
                    <li>✔ Alat modern dan steril</li>
                    <li>✔ Konsultasi hasil gratis</li>
                    <li>✔ Laporan cetak</li>
                </ul>

                <a href="https://wa.me/6282246740801"
                target="_blank"
                class="order-btn mt-8 w-full py-3 rounded-xl border border-slate-300
                        font-semibold transition text-center block">
                    Pesan Sekarang
                </a>

            </div>
        </div>

        {{-- ================= CARD KOLESTEROL ================= --}}
        <div class="service-card relative bg-white rounded-2xl border border-slate-200 p-6
                    overflow-hidden
                    hover:shadow-xl hover:-translate-y-1 transition-all duration-300">

            {{-- WATERMARK --}}
            <div class="watermark absolute inset-0 z-0 pointer-events-none
                        opacity-10 blur-sm transition-all duration-500">
                <img src="{{ asset('images/layanan/kolesterol.png') }}"
                    class="w-full h-full object-cover">
            </div>

            {{-- CONTENT --}}
            <div class="relative z-10">

                <div class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center mb-6">
                    <img
                        src="https://cdn-icons-png.flaticon.com/128/10835/10835648.png"
                        alt="Icon"
                        class="w-6 h-6 object-contain"
                    >
                </div>

                <h3 class="text-lg font-bold text-slate-900 mb-2">
                    Cek Kolesterol
                </h3>

                <p class="text-sm text-slate-600 mb-6">
                    Pemeriksaan kadar kolesterol total
                </p>

                <div class="mb-6">
                    <span class="text-sm text-slate-600">Rp</span>
                    <span class="text-3xl font-bold text-green-600">23.000</span>
                    <span class="text-sm text-slate-600"> / pemeriksaan</span>
                </div>

                <hr class="mb-6">

                <ul class="space-y-3 text-sm text-slate-700">
                    <li>✔ Cek kolesterol total</li>
                    <li>✔ Teknologi terkini</li>
                    <li>✔ Hasil akurat & terpercaya</li>
                    <li>✔ Konsultasi apoteker</li>
                    <li>✔ Rekomendasi pola hidup sehat</li>
                </ul>

                <a href="https://wa.me/6282246740801"
                target="_blank"
                class="order-btn mt-8 w-full py-3 rounded-xl border border-slate-300
                        font-semibold transition text-center block">
                    Pesan Sekarang
                </a>

            </div>
        </div>


        {{-- ================= CARD ASAM URAT ================= --}}
        <div class="service-card relative bg-white rounded-2xl border border-slate-200 p-6
                    overflow-hidden
                    hover:shadow-xl hover:-translate-y-1 transition-all duration-300">

            {{-- WATERMARK --}}
            <div class="watermark absolute inset-0 z-0 pointer-events-none
                        opacity-10 blur-sm transition-all duration-500">
                <img src="{{ asset('images/layanan/asam-urat.png') }}"
                    class="w-full h-full object-cover">
            </div>

            {{-- CONTENT --}}
            <div class="relative z-10">

                <div class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center mb-6">
                    <img
                        src="https://cdn-icons-png.flaticon.com/128/9851/9851810.png"
                        alt="Icon"
                        class="w-6 h-6 object-contain"
                    >
                </div>

                <h3 class="text-lg font-bold text-slate-900 mb-2">
                    Cek Asam Urat
                </h3>

                <p class="text-sm text-slate-600 mb-6">
                    Pemeriksaan kadar asam urat dalam darah
                </p>

                <div class="mb-6">
                    <span class="text-sm text-slate-600">Rp</span>
                    <span class="text-3xl font-bold text-blue-600">12.000</span>
                    <span class="text-sm text-slate-600"> / pemeriksaan</span>
                </div>

                <hr class="mb-6">

                <ul class="space-y-3 text-sm text-slate-700">
                    <li>✔ Deteksi dini asam urat tinggi</li>
                    <li>✔ Proses cepat 5-10 menit</li>
                    <li>✔ Alat standar kesehatan</li>
                    <li>✔ Penjelsan hasil lengkap</li>
                    <li>✔ Tips pencegahan</li>
                </ul>

                <a href="https://wa.me/6282246740801"
                target="_blank"
                class="order-btn mt-8 w-full py-3 rounded-xl border border-slate-300
                        font-semibold transition text-center block">
                    Pesan Sekarang
                </a>

            </div>
        </div>

        {{-- ================= CARD TEKANAN DARAH ================= --}}
        <div class="service-card relative bg-white rounded-2xl border border-slate-200 p-6
                    overflow-hidden
                    hover:shadow-xl hover:-translate-y-1 transition-all duration-300">

            {{-- WATERMARK --}}
            <div class="watermark absolute inset-0 z-0 pointer-events-none
                        opacity-10 blur-sm transition-all duration-500">
                <img src="{{ asset('images/layanan/tekanan-darah.png') }}"
                    class="w-full h-full object-cover">
            </div>

            {{-- CONTENT --}}
            <div class="relative z-10">

                <div class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center mb-6">
                    <img
                        src="https://cdn-icons-png.flaticon.com/128/684/684262.png"
                        alt="Icon"
                        class="w-6 h-6 object-contain"
                    >
                </div>

                <h3 class="text-lg font-bold text-slate-900 mb-2">
                    Cek Tekanan Darah
                </h3>

                <p class="text-sm text-slate-600 mb-6">
                    Pemeriksaan tekanan darah (tensi)
                </p>

                <div class="mb-6">
                    <span class="text-3xl font-bold text-green-600">Free</span>
                    <span class="text-sm text-slate-600"> / pemeriksaan</span>
                </div>

                <hr class="mb-6">

                <ul class="space-y-3 text-sm text-slate-700">
                    <li>✔ Cek sistolik & diastolik</li>
                    <li>✔ Tensimeter digital akurat</li>
                    <li>✔ Hasil instan</li>
                    <li>✔ Deteksi hipertensi dini</li>
                    <li>✔ Konsultasi kesehatan</li>
                </ul>

                <a href="https://wa.me/6282246740801"
                target="_blank"
                class="order-btn mt-8 w-full py-3 rounded-xl border border-slate-300
                        font-semibold transition text-center block">
                    Pesan Sekarang
                </a>

            </div>
        </div>

    </div>
</section>

{{-- ======================== SCRIPT CARD ======================== --}}
<script>
    const cards = document.querySelectorAll('.service-card');

    cards.forEach(card => {
        card.addEventListener('click', () => {

            cards.forEach(c => {
                // RESET CARD
                c.classList.remove(
                    'border-green-500',
                    'ring-2',
                    'ring-green-300',
                    'shadow-green-200',
                    'is-active'
                );

                // RESET BUTTON
                const btn = c.querySelector('.order-btn');
                btn.classList.remove('bg-green-500', 'text-white');
            });

            // AKTIF CARD
            card.classList.add(
                'border-green-500',
                'ring-2',
                'ring-green-300',
                'shadow-green-200',
                'is-active'
            );

            // AKTIF BUTTON
            const button = card.querySelector('.order-btn');
            button.classList.add('bg-green-500', 'text-white');
        });
    });
</script>

<style>
    .service-card.is-active .watermark {
        opacity: 0.28;      /* watermark lebih jelas */
        filter: blur(0);    /* hilangkan blur */
        transform: scale(1.05);
    }
</style>








{{-- ======================== SECTION HUBUNGI & JADWAL ======================== --}}
<section class="relative overflow-hidden py-24">

    {{-- BACKGROUND GRADIENT --}}
    <div class="absolute inset-0 bg-gradient-to-br from-emerald-50 via-white to-sky-50"></div>

    {{-- DECORATION BLUR --}}
    <div class="absolute -top-24 -left-24 w-96 h-96 bg-emerald-300/20 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-sky-300/20 rounded-full blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

            {{-- =================== HUBUNGI KAMI =================== --}}
            <div class="group bg-white/80 backdrop-blur-md
                        rounded-3xl shadow-xl border border-white/60
                        p-10 hover:shadow-2xl hover:-translate-y-1
                        transition-all duration-300">

                {{-- BADGE --}}
                <span class="inline-block mb-4 px-4 py-1.5 rounded-full
                             text-sm font-semibold tracking-wide
                             text-emerald-700
                             bg-emerald-100">
                    Hubungi Kami
                </span>

                <h2 class="text-3xl font-bold text-slate-800 mb-3">
                    Butuh Bantuan atau Konsultasi?
                </h2>

                <p class="text-slate-600 mb-8 leading-relaxed">
                    Silakan hubungi kami untuk informasi terkait layanan, konsultasi obat,
                    atau pemesanan obat secara cepat dan mudah.
                </p>

                {{-- INFO KONTAK --}}
                <div class="space-y-4">

                    {{-- TELEPON --}}
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full
                                    bg-emerald-100 text-emerald-600
                                    flex items-center justify-center">
                            <img
                                src="https://cdn-icons-png.flaticon.com/128/4321/4321231.png"
                                alt="Telepon"
                                class="w-5 h-5 object-contain"
                            >
                        </div>
                        <span class="text-slate-700 font-medium">
                            0822-4674-0801
                        </span>
                    </div>


                    {{-- ALAMAT --}}
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full
                                    bg-red-100 text-red-500
                                    flex items-center justify-center
                                    flex-shrink-0">
                            <img
                                src="https://cdn-icons-png.flaticon.com/128/819/819865.png"
                                alt="Lokasi"
                                class="w-5 h-5 object-contain"
                            >
                        </div>
                        <span class="text-slate-700 font-medium leading-relaxed">
                            Apotek Bhakti Medika Farma <br>
                            Jl. Moch. Toha No.77, Cigereleng <br>
                            Kec. Regol, Kota Bandung <br>
                            Jawa Barat 40253
                        </span>
                    </div>


                </div>

                {{-- CTA BUTTONS --}}
                <div class="mt-10 flex flex-wrap gap-4">

                    {{-- BUTTON WHATSAPP --}}
                    <a href="https://wa.me/6282246740801"
                       target="_blank"
                       class="group inline-flex items-center gap-2
                              px-7 py-3.5 rounded-full
                              bg-gradient-to-r from-emerald-500 to-emerald-600
                              text-white font-semibold
                              shadow-lg shadow-emerald-500/30
                              hover:shadow-2xl hover:shadow-emerald-500/40
                              hover:-translate-y-0.5
                              transition-all duration-300">

                        <span>Via WhatsApp</span>
                    </a>

                    {{-- BUTTON LIHAT LOKASI --}}
                    <a href="https://www.google.com/maps/search/?api=1&query=Jl.+Moch.+Toha+No.77,+Cigereleng,+Regol,+Bandung"
                       target="_blank"
                       class="group inline-flex items-center gap-2
                              px-7 py-3.5 rounded-full
                              bg-gradient-to-r from-sky-500 to-indigo-600
                              text-white font-semibold
                              shadow-lg shadow-sky-500/30
                              hover:shadow-2xl hover:shadow-sky-500/40
                              hover:-translate-y-0.5
                              transition-all duration-300">

                        <span>Lihat Lokasi</span>
                    </a>

                </div>

            </div>

            {{-- =================== JADWAL OPERASIONAL =================== --}}
            <div class="group bg-white/80 backdrop-blur-md
                        rounded-3xl shadow-xl border border-white/60
                        p-10 hover:shadow-2xl hover:-translate-y-1
                        transition-all duration-300">

                {{-- BADGE --}}
                <span class="inline-block mb-4 px-4 py-1.5 rounded-full
                             text-sm font-semibold tracking-wide
                             text-sky-700
                             bg-sky-100">
                    Jam Layanan
                </span>

                <h2 class="text-3xl font-bold text-slate-800 mb-3">
                    Jadwal Operasional
                </h2>

                <p class="text-slate-600 mb-8 leading-relaxed">
                    Kami selalu siap melayani Anda sesuai jam operasional berikut:
                </p>

                {{-- TABEL JADWAL --}}
                <div class="rounded-2xl border border-slate-200 overflow-hidden">

                    <table class="w-full text-slate-700">
                        <tbody>
                            <tr class="border-b hover:bg-slate-50 transition">
                                <td class="px-6 py-4 font-semibold">Senin – Sabtu</td>
                                <td class="px-6 py-4 text-right text-emerald-600 font-bold">
                                    08.00 – 20.00
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-6 py-4 font-semibold">Minggu</td>
                                <td class="px-6 py-4 text-right text-red-500 font-bold">
                                    Tutup
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>

                <div class="mt-5 text-sm text-slate-500 italic">
                    *Jam operasional dapat berubah pada hari libur nasional.
                </div>

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