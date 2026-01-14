@extends('layouts.app')
@section('title', 'Beranda')

@section('content')

<header class="relative text-white font-body z-40">

    {{-- NAVBAR --}}
    <nav id="navbar"
         class="fixed top-0 left-0 w-full z-30 h-16 md:h-20 transition-all duration-300 bg-transparent">

        <div id="navbar-inner"
             class="max-w-7xl mx-auto px-6 h-full flex items-center">

            {{-- Logo --}}
            <a href="/" class="flex items-center h-full">
                <img src="{{ asset('images/logo.png') }}" class="h-20 object-contain">
            </a>

            {{-- Menu --}}
            <ul class="ml-auto flex gap-10 text-sm font-medium text-white">

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

                                  {{ request()->routeIs($routeName) ? 'text-yellow-400' : '' }}

                                  after:content-[''] after:absolute after:left-1/2
                                  after:-translate-x-1/2 after:-bottom-1 after:h-[2px]
                                  after:bg-yellow-400 after:transition-all after:duration-300

                                  {{ request()->routeIs($routeName) ? 'after:w-full' : 'after:w-0' }}

                                  hover:text-cyan-400 hover:after:w-full">

                            {{ $menu['label'] }}
                        </a>
                    </li>
                @endforeach

            </ul>

        </div>
    </nav>

</header>


{{-- ================= BERANDA SECTION ================= --}}
<section class="relative min-h-screen pt-28 md:pt-32 text-white">


    {{-- Background image --}}
    <img src="{{ asset('images/hero.jpg') }}"
         class="absolute inset-0 w-full h-full object-cover -z-20">

    {{-- Overlay gelap (tidak nutup konten) --}}
    <div class="absolute inset-0 bg-black/60 -z-10"></div>

    {{-- HERO CONTENT --}}
    <div class="relative z-20 max-w-7xl mx-auto px-6 flex items-center min-h-[calc(100vh-8rem)] -mt-6 md:-mt-10">


        {{-- LEFT TEXT --}}
        <div class="max-w-3xl">

            <span class="text-white/80 mb-2 block">
                Selamat Datang di Apotek
                <span class="font-bold text-green-400">Bhakti</span>
                <span class="font-bold text-cyan-400">Medika Farma</span>
            </span>

            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-4">
                Solusi Layanan Kesehatan<br>
                Terpercaya Untuk Anda
            </h1>

            <p class="text-white/90 text-lg leading-relaxed mb-8">
                Kami menyediakan layanan pengecekan kesehatan seperti cek gula darah,
                cek kolesterol, dan cek asam urat dengan cepat, akurat,
                serta ditangani tenaga profesional.
            </p>

            {{-- CTA BUTTON --}}
            <a href="/#kontak"
               class="inline-flex items-center gap-2 px-7 py-3
                       border border-green-400
                      font-semibold rounded-lg
                      shadow-xl  hover:-translate-y-0.5
                      transition-all">

                Hubungi Kami

                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5 12h14M12 5l7 7-7 7"/>
                </svg>
            </a>

        </div>

        {{-- GLASS CARD --}}
        <div class="absolute right-10 bottom-0 translate-y-[45%]
                w-72 md:w-80
                bg-white/10 backdrop-blur-2xl
                border border-white/30 rounded-2xl
                shadow-2xl p-5 z-30">

            <div class="text-sm text-white/80 mb-1">
                Jadwal Operasional
            </div>

            <div class="text-xl font-bold mb-4">
                Jam Buka Apotek
            </div>

            <div class="space-y-2 text-white/90">
                <div class="flex justify-between">
                    <span>Senin – Jumat</span>
                    <span class="font-semibold">08.00 – 20.00</span>
                </div>

                <div class="flex justify-between">
                    <span>Sabtu – Minggu</span>
                    <span class="font-semibold">Tutup</span>
                </div>
            </div>
            
        </div>

    </div>
</section>







{{-- ================= TENTANG KAMI ================= --}}
<section class="relative bg-white pt-36 pb-28 overflow-hidden pr-12 lg:pr-24
                animate-fade-up">

    {{-- GREEN BLUR LIGHT --}}
    <div class="absolute -top-32 -left-32 w-[520px] h-[520px]
                bg-emerald-400/30
                rounded-full blur-[120px]">
    </div>

    {{-- CYAN BLUR LIGHT --}}
    <div class="absolute top-1/3 -right-40 w-[560px] h-[560px]
                bg-cyan-400/25
                rounded-full blur-[140px]">
    </div>

    {{-- SOFT BACKGROUND LAYER --}}
    <div class="absolute inset-0
                bg-gradient-to-br
                from-emerald-50/40
                via-white
                to-cyan-50/40">
    </div>

    {{-- CONTENT --}}
    <div class="relative z-10
                max-w-7xl mx-auto grid lg:grid-cols-2 gap-20 items-center px-6">

        {{-- LEFT CONTENT --}}
        <div class="animate-slide-left">

            <h2 class="text-5xl font-bold text-slate-900 leading-tight mb-0">
                Tentang Kami
            </h2>

            <p class="text-2xl font-semibold text-slate-800 mb-10">
                Apotek Bhakti Medika Farma
            </p>

            <a href="/tentang-kami"
               class="inline-flex items-center justify-center
                      bg-yellow-400 hover:bg-cyan-500
                      text-white font-semibold
                      px-8 py-3 rounded-lg
                      transition-all duration-300
                      hover:scale-105 hover:shadow-xl">
                Selengkapnya
            </a>

        </div>

        {{-- RIGHT CONTENT --}}
        <div class="relative w-full max-w-xl mx-auto animate-slide-right">

            {{-- BACK CARD --}}
            <div class="absolute top-8 left-8 w-full h-full
                        bg-white/80
                        border-2 border-emerald-400/70
                        rounded-2xl
                        shadow-xl
                        animate-float backdrop-blur-sm">
            </div>

            {{-- MAIN CARD --}}
            <div class="relative bg-white
                        border-2 border-cyan-400
                        rounded-2xl
                        shadow-[0_30px_60px_rgba(0,0,0,0.12)]
                        p-10
                        transition-all duration-500
                        hover:-translate-y-3
                        hover:shadow-[0_40px_80px_rgba(0,0,0,0.18)]">

                <p class="text-slate-700 leading-relaxed text-base">
                    “Apotek Bhakti Medika Farma adalah apotek terpercaya yang
                    menyediakan obat-obatan berkualitas, produk kesehatan
                    masyarakat. Dengan tenaga farmasi berlisensi dan pelayanan
                    ramah, kami berkomitmen memberikan informasi obat yang akurat,
                    solusi kesehatan yang aman.”
                </p>

                <div class="flex gap-3 mt-10 justify-end">
                    <span class="w-2.5 h-2.5 rounded-full bg-slate-800"></span>
                    <span class="w-2.5 h-2.5 rounded-full bg-slate-300"></span>
                    <span class="w-2.5 h-2.5 rounded-full bg-slate-300"></span>
                </div>

            </div>
        </div>

    </div>
</section>



{{-- ================= LAYANAN ================= --}}
<section class="relative py-32 overflow-hidden bg-gray-100">

    {{-- BACKGROUND --}}
    <div class="absolute inset-0">

        {{-- FOTO BACKGROUND --}}
        <div
            class="absolute inset-0 bg-cover bg-right"
            style="background-image: url('{{ asset('images/layanan.jpg') }}');">
        </div>

        {{-- GRADIENT OVERLAY --}}
        <div class="absolute inset-0 bg-gradient-to-r
                    from-gray-100 via-gray-100/90 to-transparent">
        </div>

    </div>

    {{-- CONTENT --}}
    <div class="relative max-w-7xl mx-auto px-6 grid lg:grid-cols-2 items-center">

        {{-- TEKS --}}
        <div>

            <h2 class="text-5xl font-bold text-slate-900 leading-tight mb-6">
                Penyediaan Layanan<br>
                Cek Kesehatan di<br>
                Apotek Kami
            </h2>

            <p class="text-slate-600 max-w-md mb-6">
                “Apotek kami menyediakan layanan cek gula darah, kolesterol,
                asam urat, dan tekanan darah dengan hasil cepat dan akurat
                untuk memantau kesehatan anda.”
            </p>

            {{-- GARIS TIPIS --}}
            <div class="w-full max-w-md h-px bg-slate-200 mb-6"></div>

            {{-- TOMBOL --}}
            <a href="/layanan"
               class="group relative inline-flex items-center gap-3
                      bg-white text-blue-600 font-semibold
                      px-7 py-3 rounded-full
                      shadow-md hover:shadow-xl
                      overflow-hidden
                      transition-all duration-300
                      active:scale-95">

                {{-- RIPPLE / CLICK EFFECT --}}
                <span class="absolute inset-0
                             bg-gradient-to-r from-emerald-400/20 to-cyan-400/20
                             opacity-0 group-active:opacity-100
                             transition-opacity duration-300">
                </span>

                {{-- TEXT --}}
                <span class="relative z-10">
                    Baca Selengkapnya
                </span>

                {{-- ICON --}}
                <span class="relative z-10 flex items-center justify-center
                             transition-all duration-300
                             group-hover:translate-x-1
                             group-hover:rotate-12">

                    <img src="{{ asset('images/Icon.svg') }}"
                         alt="Arrow Icon"
                         class="w-5 h-5">
                </span>

                {{-- GLOW RING --}}
                <span class="absolute -inset-1 rounded-full
                             border border-emerald-400/0
                             group-hover:border-emerald-400/40
                             transition-all duration-300">
                </span>

            </a>

        </div>

    </div> {{-- <- ini tadi belum ditutup, sekarang sudah benar --}}

</section>




{{-- ================= PRODUK ================= --}}
<section class="relative py-28 bg-white overflow-hidden">

    @php
        use Illuminate\Support\Str;
    @endphp

    {{-- WATERMARK (FIX TIDAK MENUMPUK) --}}
    <div
        class="absolute inset-0 pointer-events-none opacity-[0.05]"
        style="
            background-image:
                url('{{ asset('images/tablet.svg') }}'),
                url('{{ asset('images/sirup.svg') }}'),
                url('{{ asset('images/salep.svg') }}'),
                url('{{ asset('images/tetes.svg') }}'),
                url('{{ asset('images/herbal.svg') }}');

            background-size:
                160px,
                160px,
                160px,
                160px,
                160px;

            background-position:
                5% 10%,
                25% 35%,
                45% 15%,
                65% 40%,
                85% 20%;

            background-repeat: no-repeat;
        "
    ></div>

    <div class="relative max-w-7xl mx-auto px-6">

        {{-- HEADER --}}
        <div class="flex items-start justify-between mb-20">

            <div class="max-w-3xl">
                <p class="text-base md:text-lg lg:text-xl font-semibold text-slate-600 mb-4">
                    Apotek Bhakti Medika Farma
                </p>

                <h2 class="text-5xl lg:text-6xl font-bold text-slate-900 leading-tight mb-6">
                    Produk Terbaik untuk<br>
                    Kesehatan Anda
                </h2>

                <p class="text-slate-600 text-lg max-w-xl">
                    “Temukan Koleksi Lengkap Produk Berkualitas & Terpercaya
                    untuk Solusi Kesehatan Anda.”
                </p>
            </div>

        </div>

        {{-- GRID PRODUK --}}
        <div class="grid grid-cols-2 md:grid-cols-5 gap-10">

            @php
                $products = [
                    ['Tablet & Kapsul', 'tablet.svg', 'Obat oral dengan dosis terukur untuk terapi yang praktis & efektif.'],
                    ['Sirup', 'sirup.svg', 'Cocok untuk anak-anak dan dewasa yang kesulitan menelan tablet.'],
                    ['Salep & Krim', 'salep.svg', 'Perawatan kulit untuk iritasi, luka ringan, dan infeksi ringan.'],
                    ['Obat Tetes', 'tetes.svg', 'Obat tetes untuk mata, telinga, atau hidung sesuai kebutuhan.'],
                    ['Obat Herbal & Umum', 'herbal.svg', 'Produk herbal alami untuk menjaga daya tahan tubuh.'],
                ];
            @endphp

            @foreach ($products as [$label, $icon, $text])

            {{-- CARD KATEGORI MENJADI LINK --}}
            <a
                href="{{ route('produk') }}?kategori={{ Str::slug($label) }}"
                class="relative group bg-white rounded-3xl shadow-xl p-8 block overflow-hidden
                       transition-all duration-500 hover:-translate-y-2"
            >

                {{-- BUBBLE KIRI ATAS --}}
                <div class="absolute -left-10 -top-10 w-44 h-44 rounded-full bg-gray-100
                            transition-all duration-500 group-hover:scale-110"></div>

                {{-- BUBBLE KANAN BAWAH --}}
                <div class="absolute -right-10 -bottom-10 w-40 h-40 rounded-full bg-gray-100
                            transition-all duration-500 group-hover:scale-110"></div>

                {{-- ISI CARD --}}
                <div class="relative">

                    <img src="{{ asset('images/'.$icon) }}" class="w-14 mb-4">

                    <h3 class="text-xl font-bold mb-2">
                        {{ $label }}
                    </h3>

                    <p class="text-gray-600 leading-relaxed">
                        {{ $text }}
                    </p>

                    {{-- PANAH --}}
                    <div
                        class="mt-6 w-9 h-9 rounded-full border flex items-center justify-center
                               transition-all duration-500 group-hover:translate-x-1
                               group-hover:bg-yellow-400 group-hover:shadow-[0_0_25px_rgba(250,204,21,0.6)]"
                    >
                        →
                    </div>

                </div>

            </a>

            @endforeach

        </div>

    </div>
</section>




{{-- ================= MARKETPLACE ================= --}}
<section
    id="marketplace"
    x-data="{ show:false }"
    x-intersect.once="show = true"
    class="py-24 bg-white text-center"
>

    <!-- WRAPPER ANIMASI -->
    <div
        x-show="show"
        x-transition.duration.800ms
        class="opacity-0 transform translate-y-8"
        x-bind:class="show ? 'opacity-100 translate-y-0' : ''"
    >

        {{-- TITLE --}}
        <h2 class="text-4xl font-bold mb-3">
            TERSEDIA DI MARKETPLACE
        </h2>

        <p class="text-lg text-gray-700 mb-4">
            Pilih Official Store Kami di bawah ini
        </p>

        <p class="text-gray-500 max-w-2xl mx-auto mb-16">
            Dapatkan produk kesehatan berkualitas langsung dari genggaman Anda
            dengan jaminan keaslian 100%.
        </p>

        {{-- MARKETPLACE CARD --}}
        <div class="flex justify-center gap-10 flex-wrap">

            {{-- TIKTOK --}}
            <a
                href="https://vt.tiktok.com/ZS5HehMDs/?page=Mall"
                target="_blank"
                class="w-[280px] h-[160px] bg-white rounded-2xl
                       flex items-center justify-center
                       shadow-[0_10px_30px_rgba(0,0,0,0.12)]
                       transition duration-300
                       hover:-translate-y-2
                       hover:shadow-[0_20px_40px_rgba(0,0,0,0.18)]"
            >
                <img
                    src="{{ asset('images/tiktok.png') }}"
                    class="h-24 transition duration-300 group-hover:scale-110"
                >
            </a>

            {{-- LAZADA --}}
            <a
                href="https://www.lazada.co.id/shop/apotek-bhakti-medika-farma/?spm=a2o4j.pdp_revamp.seller.1.65d64dff2BgHkW&itemId=8778758839&channelSource=pdp"
                target="_blank"
                class="w-[280px] h-[160px] bg-white rounded-2xl
                       flex items-center justify-center
                       shadow-[0_10px_30px_rgba(0,0,0,0.12)]
                       transition duration-300
                       hover:-translate-y-2
                       hover:shadow-[0_20px_40px_rgba(0,0,0,0.18)]"
            >
                <img
                    src="{{ asset('images/lazada.png') }}"
                    class="h-28 transition duration-300 group-hover:scale-110"
                >
            </a>

            {{-- TOKOPEDIA --}}
            <a
                href="https://tk.tokopedia.com/ZS5m7LkSk/"
                target="_blank"
                class="w-[280px] h-[160px] bg-white rounded-2xl
                       flex items-center justify-center
                       shadow-[0_10px_30px_rgba(0,0,0,0.12)]
                       transition duration-300
                       hover:-translate-y-2
                       hover:shadow-[0_20px_40px_rgba(0,0,0,0.18)]"
            >
                <img
                    src="{{ asset('images/tokopedia.png') }}"
                    class="h-16 transition duration-300 group-hover:scale-110"
                >
            </a>

        </div>

        {{-- BENEFIT --}}
        <div class="flex justify-center gap-10 mt-14 flex-wrap text-gray-700">

            <div class="flex items-center gap-3">
                <span class="w-6 h-6 flex items-center justify-center rounded-full border border-gray-400">
                    ✓
                </span>
                <span class="text-sm">Produk Original</span>
            </div>

            <div class="flex items-center gap-3">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path d="M3 7h13l3 5v5a1 1 0 01-1 1h-1"></path>
                    <circle cx="7" cy="17" r="2"></circle>
                    <circle cx="17" cy="17" r="2"></circle>
                </svg>
                <span class="text-sm">Pengiriman Aman & Cepat</span>
            </div>

            <div class="flex items-center gap-3">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <rect x="5" y="11" width="14" height="10" rx="2"></rect>
                    <path d="M8 11V7a4 4 0 018 0v4"></path>
                </svg>
                <span class="text-sm">Transaksi Terjamin</span>
            </div>

        </div>

    </div>

</section>




{{-- ================= KONTAK ================= --}}
<section id="kontak" class="py-24 bg-gray-100 scroll-mt-28">

    {{-- FORM & MAP --}}
    <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-16 px-6">

        {{-- FORM --}}
        <div>
            <h2 class="text-3xl font-bold mb-2">Hubungi Kami</h2>

            <p class="text-gray-600 mb-6">
                Ada pertanyaan? Tim kami siap membantu Anda.
                Hubungi kami melalui formulir atau kontak di bawah ini.
            </p>

            <form class="space-y-4">
                <input
                    class="w-full p-3 rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    placeholder="Full Name"
                >

                <input
                    class="w-full p-3 rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    placeholder="Your Email"
                >

                <input
                    class="w-full p-3 rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    placeholder="Phone"
                >

                <textarea
                    class="w-full p-3 rounded-lg shadow h-32 resize-none focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    placeholder="Message"
                ></textarea>

                {{-- BUTTON --}}
                <button
                    type="submit"
                    class="mt-4 w-full md:w-auto px-8 py-3
                           bg-yellow-400 text-gray-900 font-semibold
                           rounded-lg shadow
                           hover:bg-yellow-500 transition"
                >
                    Kirim Pesan
                </button>
            </form>
        </div>

        {{-- MAP --}}
        <div class="rounded-xl overflow-hidden shadow-lg">
            <iframe
                class="w-full h-full min-h-[350px]"
                src="https://maps.google.com/maps?q=Apotek%20Bhakti%20Medika%20Farma%20Bandung&t=&z=17&ie=UTF8&iwloc=&output=embed"
            ></iframe>
        </div>

    </div>

    {{-- INFO KONTAK --}}
    <div class="max-w-6xl mx-auto mt-20 px-6">
        <div class="grid md:grid-cols-3 gap-8 text-center">

            {{-- JADWAL --}}
            <div
                class="group bg-white rounded-2xl p-8
                       shadow-[0_10px_30px_rgba(0,0,0,0.08)]
                       transition-all duration-500
                       hover:-translate-y-3
                       hover:shadow-[0_25px_60px_rgba(0,0,0,0.18)]"
            >
                <div
                    class="relative w-16 h-16 mx-auto mb-5
                           flex items-center justify-center
                           rounded-full bg-yellow-100 text-yellow-500
                           transition-all duration-500
                           group-hover:scale-110 group-hover:rotate-6"
                >
                    <div
                        class="absolute inset-0 rounded-full
                               bg-yellow-300 opacity-0 blur-xl
                               group-hover:opacity-30 transition"
                    ></div>

                    <svg
                        class="w-7 h-7 relative z-10"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                    >
                        <rect x="3" y="4" width="18" height="18" rx="2"></rect>
                        <path d="M16 2v4M8 2v4M3 10h18"></path>
                    </svg>
                </div>

                <h4 class="font-semibold mb-1 text-gray-800">
                    Operating Hours
                </h4>

                <p class="text-sm text-gray-600">
                    Senin – Sabtu : 08:00 – 20:00
                </p>
            </div>

            {{-- EMAIL --}}
            <div
                class="group bg-white rounded-2xl p-8
                       shadow-[0_10px_30px_rgba(0,0,0,0.08)]
                       transition-all duration-500
                       hover:-translate-y-3
                       hover:shadow-[0_25px_60px_rgba(0,0,0,0.18)]"
            >
                <div
                    class="relative w-16 h-16 mx-auto mb-5
                           flex items-center justify-center
                           rounded-full bg-blue-100 text-blue-500
                           transition-all duration-500
                           group-hover:scale-110 group-hover:-rotate-6"
                >
                    <div
                        class="absolute inset-0 rounded-full
                               bg-blue-300 opacity-0 blur-xl
                               group-hover:opacity-30 transition"
                    ></div>

                    <svg
                        class="w-7 h-7 relative z-10"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                    >
                        <path d="M4 4h16v16H4z"></path>
                        <path d="M22 6l-10 7L2 6"></path>
                    </svg>
                </div>

                <h4 class="font-semibold mb-1 text-gray-800">
                    Email
                </h4>

                <p class="text-sm text-gray-600 break-all">
                    bhaktimedikafarma2@gmail.com
                </p>
            </div>

            {{-- TELEPON / WHATSAPP --}}
            <a
                href="https://wa.me/6282246740801?text=Halo%20Apotek%20Bhakti%20Medika%20Farma,%20saya%20ingin%20bertanya"
                target="_blank"
                class="block"
            >
                <div
                    class="group bg-white rounded-2xl p-8
                           shadow-[0_10px_30px_rgba(0,0,0,0.08)]
                           transition-all duration-500
                           hover:-translate-y-3
                           hover:shadow-[0_25px_60px_rgba(0,0,0,0.18)]"
                >
                    <div
                        class="relative w-16 h-16 mx-auto mb-5
                               flex items-center justify-center
                               rounded-full bg-green-100 text-green-500
                               transition-all duration-500
                               group-hover:scale-110 group-hover:rotate-6"
                    >
                        <div
                            class="absolute inset-0 rounded-full
                                   bg-green-300 opacity-0 blur-xl
                                   group-hover:opacity-30 transition"
                        ></div>

                        <svg
                            class="w-7 h-7 relative z-10"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M22 16.92V21a2 2 0 01-2.18 2
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
                                   a2 2 0 011.72 2z"
                            ></path>
                        </svg>
                    </div>

                    <h4 class="font-semibold mb-1 text-gray-800">
                        Contact
                    </h4>

                    <p class="text-sm text-gray-600">
                        +62 822-4674-0801
                    </p>
                </div>
            </a>

        </div>
    </div>

</section>





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





@endsection
