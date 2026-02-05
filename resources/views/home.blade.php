@extends('layouts.app')
@section('title', 'Beranda')

@section('content')

{{-- ======================== HEADER (NAVBAR) ======================== --}}
<header class="relative text-white font-body z-40">
    <nav
        id="navbar"
        x-data="{ open: false }"
        class="fixed top-0 left-0 w-full z-30 h-16 md:h-20 transition-all duration-300
        {{ request()->routeIs('beranda') ? 'bg-transparent text-black' : 'bg-slate-800 text-white' }}"
    >
        <div
            id="navbar-inner"
            class="max-w-7xl mx-auto px-4 md:px-6 h-full flex items-center justify-between"
        >
            {{-- Logo --}}
            <a href="/" class="flex items-center h-full translate-y-5 -ml-8">
                <img src="{{ asset('images/logo.png') }}" class="h-30 object-contain" alt="Logo">
            </a>

            {{-- Button Hamburger (Mobile) --}}
            <button @click="open = !open" class="md:hidden focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            {{-- Menu Desktop --}}
            <ul id="navMenu" class="hidden md:flex ml-auto gap-10 text-sm font-medium transition-colors duration-300">
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
                        <a
                            href="{{ $menu['url'] }}"
                            class="relative inline-block transition
                            {{ request()->routeIs($routeName)
                                ? 'bg-gradient-to-r from-green-400 to-cyan-400 bg-clip-text text-transparent font-semibold'
                                : '' }}
                            after:content-[''] after:absolute after:left-1/2 after:-translate-x-1/2 after:-bottom-1 after:h-[2px]
                            after:bg-gradient-to-r after:from-green-400 after:to-cyan-400 after:transition-all after:duration-300
                            {{ request()->routeIs($routeName) ? 'after:w-full' : 'after:w-0' }}
                            hover:after:w-full"
                        >
                            {{ $menu['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- Menu Mobile --}}
        <div
            x-show="open"
            x-transition
            @click.outside="open = false"
            class="md:hidden bg-slate-800 px-6 pb-6 pt-4 space-y-4"
        >
            @foreach ($menus as $routeName => $menu)
                <a
                    href="{{ $menu['url'] }}"
                    @click="open = false"
                    class="block text-sm font-medium transition
                    {{ request()->routeIs($routeName)
                        ? 'bg-gradient-to-r from-green-400 to-cyan-400 bg-clip-text text-transparent font-semibold'
                        : 'text-white' }}
                    hover:text-cyan-400"
                >
                    {{ $menu['label'] }}
                </a>
            @endforeach
        </div>
    </nav>
</header>

<script>
    const navbar = document.getElementById('navbar');
    const isBeranda = {{ request()->routeIs('beranda') ? 'true' : 'false' }};

    if (isBeranda) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                // Saat scroll: navbar gelap, teks putih
                navbar.classList.add('bg-slate-800', 'text-white');
                navbar.classList.remove('bg-transparent', 'text-black');
            } else {
                // Di atas: navbar transparan, teks hitam
                navbar.classList.add('bg-transparent', 'text-black');
                navbar.classList.remove('bg-slate-800', 'text-white');
            }
        });
    }
</script>


{{-- ================= BERANDA SECTION ================= --}}
<section class="relative z-10 min-h-screen pt-28 md:pt-32 pb-24 bg-gradient-to-br from-white via-green-50 to-cyan-50 overflow-visible">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">

        {{-- ================= LEFT CONTENT ================= --}}
        <div>
            {{-- Badge + Rating --}}
            <div class="flex items-center gap-4 mb-6">
                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-gradient-to-r from-green-500 to-blue-500 text-white text-sm font-semibold shadow">
                    Apotek Terpercaya
                </span>

                <div class="flex items-center gap-2 text-yellow-400">
                    ★★★★★
                    <span class="text-slate-600 text-sm">(4.9/5.0)</span>
                </div>
            </div>

            {{-- Headline --}}
            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight text-slate-900 mb-4">
                Solusi <span class="text-green-600">Kesehatan</span><br>
                Keluarga Anda
            </h1>

            {{-- Deskripsi --}}
            <p class="text-slate-600 text-lg leading-relaxed mb-8 max-w-xl">
                Dapatkan akses ke layanan pemeriksaan kesehatan, konsultasi dengan apoteker,
                dan pelayanan terbaik untuk menjaga kesehatan Anda dan keluarga.
            </p>

            {{-- CTA Buttons --}}
            <div class="flex flex-wrap gap-4">
                <a
                    href="https://wa.me/6282246740801"
                    target="_blank"
                    class="inline-flex items-center gap-2 px-7 py-3 bg-gradient-to-r from-green-500 to-cyan-500 text-white font-semibold rounded-lg shadow-lg hover:-translate-y-0.5 active:scale-95 active:shadow-md focus:outline-none focus:ring-4 focus:ring-green-300 transition-all duration-200"
                >
                    Hubungi Kami Sekarang →
                </a>

                <a
                    href="https://www.google.com/maps/search/?api=1&query=Jl.+Moch.+Toha+No.77,+Cigereleng,+Regol,+Bandung"
                    target="_blank"
                    class="inline-flex items-center gap-2 px-7 py-3 border-2 border-green-500 text-green-600 font-semibold rounded-lg hover:bg-green-50 active:scale-95 active:bg-green-100 focus:outline-none focus:ring-4 focus:ring-green-200 transition-all duration-200"
                >
                    <img src="https://cdn-icons-png.flaticon.com/128/2838/2838912.png" alt="Lokasi" class="w-5 h-5 object-contain">
                    <span>Lokasi Apotek</span>
                </a>
            </div>

            {{-- Stats --}}
            <div class="grid grid-cols-3 gap-6 mt-12 max-w-xl">
                <div>
                    <div class="text-3xl font-extrabold text-cyan-600">14+</div>
                    <div class="text-slate-600 text-sm">Tahun Pengalaman</div>
                </div>
                <div>
                    <div class="text-3xl font-extrabold text-cyan-600">50K+</div>
                    <div class="text-slate-600 text-sm">Pelanggan Setia</div>
                </div>
                <div>
                    <div class="text-3xl font-extrabold text-cyan-600">5000+</div>
                    <div class="text-slate-600 text-sm">Produk Tersedia</div>
                </div>
            </div>
        </div>

        {{-- ================= RIGHT IMAGE ================= --}}
        <div class="relative">
            <div class="overflow-hidden rounded-3xl shadow-2xl">
                <img src="{{ asset('images/hero2.jpg') }}" class="w-full h-[480px] object-cover" alt="Hero">
            </div>

            {{-- Card: 100% Original --}}
            <div class="absolute top-0 -left-6 bg-white rounded-2xl shadow-lg p-4 flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-gradient-to-r from-green-500 to-cyan-500 flex items-center justify-center">
                    <img src="https://cdn-icons-png.flaticon.com/128/1962/1962520.png" alt="Original" class="w-6 h-6 object-contain">
                </div>
                <div>
                    <div class="font-bold text-slate-900">100% Original</div>
                    <div class="text-sm text-slate-600">Produk Terjamin</div>
                </div>
            </div>

            {{-- Card: Jam Buka --}}
            <div class="absolute top-1/2 -right-4 -translate-y-1/2 bg-white rounded-2xl shadow-lg p-4 flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-gradient-to-r from-green-500 to-cyan-500 flex items-center justify-center">
                    <img src="https://cdn-icons-png.flaticon.com/128/15826/15826325.png" alt="Jam Operasional" class="w-6 h-6 object-contain">
                </div>
                <div>
                    <div class="font-bold text-slate-900">Senin–Sabtu</div>
                    <div class="text-sm text-slate-600">08:00 – 22:00 WIB</div>
                </div>
            </div>

            {{-- Card: Konsultasi Gratis --}}
            <div class="absolute -bottom-10 left-1/2 -translate-x-1/2 bg-gradient-to-r from-green-500 to-cyan-500 text-white rounded-2xl shadow-xl p-5 flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center">
                    <img src="https://cdn-icons-png.flaticon.com/128/1692/1692130.png" alt="Konsultasi" class="w-6 h-6 object-contain">
                </div>
                <div>
                    <div class="font-bold">Konsultasi Gratis</div>
                    <div class="text-sm text-white/90">dengan Apoteker</div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    const toggleBtn = document.getElementById('toggleSchedule');
    const card = document.getElementById('scheduleCard');

    let open = false;

    if (toggleBtn && card) {
        toggleBtn.addEventListener('click', () => {
            open = !open;

            if (open) {
                card.classList.remove('translate-x-full');
                toggleBtn.innerText = '◀';
            } else {
                card.classList.add('translate-x-full');
                toggleBtn.innerText = '▶';
            }
        });
    }
</script>









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
                      bg-gradient-to-r from-green-500 to-blue-600
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
            style="background-image: url('{{ asset('images/cek-layanan.jpg') }}');">
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

    </div>

</section>




{{-- ================= PRODUK ================= --}}
<section class="relative py-28 bg-white overflow-hidden">

    @php
        use Illuminate\Support\Str;
    @endphp

    {{-- WATERMARK --}}
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

            {{-- CARD (BUKAN LINK) --}}
            <div
                class="relative group bg-white rounded-3xl shadow-xl p-6 block overflow-hidden
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

                    {{-- PANAH (INI SAJA YANG BISA DIKLIK) --}}
                    <a
                        href="{{ route('produk') }}?kategori={{ Str::slug($label) }}"
                        class="inline-flex mt-6 w-9 h-9 rounded-full border border-green-400
                               items-center justify-center
                               transition-all duration-500
                               hover:translate-x-1
                               hover:bg-gradient-to-r hover:from-green-400 hover:to-cyan-400
                               hover:shadow-[0_0_25px_rgba(34,197,94,0.5)]"
                        title="Lihat produk"
                    >
                        →
                    </a>

                </div>

            </div>

            @endforeach

        </div>

    </div>
</section>





{{-- ================= MARKETPLACE ================= --}}
<section
    id="marketplace"
    x-data="{ show:false }"
    x-intersect.once="show = true"
    class="relative py-28 text-center overflow-hidden
           bg-gradient-to-br from-emerald-50 via-white to-sky-50"
>

    {{-- ORNAMEN BLUR ATAS KIRI --}}
    <div class="absolute -top-32 -left-32 w-[400px] h-[400px]
                bg-emerald-200/40 rounded-full blur-3xl"></div>

    {{-- ORNAMEN BLUR BAWAH KANAN --}}
    <div class="absolute -bottom-32 -right-32 w-[400px] h-[400px]
                bg-sky-200/40 rounded-full blur-3xl"></div>

    <!-- WRAPPER ANIMASI -->
    <div
        x-show="show"
        x-transition.duration.800ms
        class="relative opacity-0 transform translate-y-8"
        x-bind:class="show ? 'opacity-100 translate-y-0' : ''"
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



<form action="{{ route('kontak.kirim') }}" method="POST" class="space-y-4">
    @csrf

    <input
        type="text"
        name="nama"
        required
        class="w-full p-3 rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-yellow-400"
        placeholder="Full Name"
    >

    <input
        type="email"
        name="email"
        required
        class="w-full p-3 rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-yellow-400"
        placeholder="Your Email"
    >

    <input
        type="text"
        name="telepon"
        class="w-full p-3 rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-yellow-400"
        placeholder="Phone"
    >

    <textarea
        name="pesan"
        required
        class="w-full p-3 rounded-lg shadow h-32 resize-none focus:outline-none focus:ring-2 focus:ring-yellow-400"
        placeholder="Message"
    ></textarea>

    <button
        type="submit"
        class="inline-flex items-center justify-center
                      bg-gradient-to-r from-green-500 to-blue-600
                      text-white font-semibold
                      px-8 py-3 rounded-lg
                      transition-all duration-300
                      hover:scale-105 hover:shadow-xl">
        Kirim Pesan 
    </button>

    @if(session('success'))
        <div class="mt-4 p-4 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif
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
                    Jam Operasional
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

@endsection
