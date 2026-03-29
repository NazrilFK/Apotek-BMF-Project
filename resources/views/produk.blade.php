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
        class="absolute inset-0 bg-cover bg-center scale-105 animate-heroZoom"
        style="background-image:url('{{ asset('images/produk.jpg') }}')">
    </div>

    {{-- OVERLAY PUTIH SANGAT TIPIS (biar teks tetap terbaca) --}}
    <div class="absolute inset-0 bg-gradient-to-r from-white/90 via-white/40 to-transparent animate-fadeSoft"></div>

    {{-- KONTEN --}}
    <div class="relative max-w-7xl mx-auto px-6 py-24 md:py-28">

        <h1 class="text-5xl md:text-7xl font-extrabold text-slate-800 mb-6 opacity-0 animate-fadeUp">
            Produk Kami
        </h1>

        <p class="text-slate-700 text-lg md:text-xl leading-relaxed max-w-3xl opacity-0 animate-fadeUpDelay">
            Temukan berbagai produk obat dan kebutuhan kesehatan yang lengkap, mudah diakses, dan siap memenuhi kebutuhan Anda setiap hari.
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



{{-- ======================== SECTION PRODUK ======================== --}}
<section
    x-data="produkFilter()"
    class="relative max-w-7xl mx-auto px-6 py-16 bg-white overflow-hidden"
>

        {{-- ================= WATERMARK AUTO ================= --}}
    <div
    class="absolute inset-0 pointer-events-none"
    style="
        background-image: url('{{ asset('images/Groupicon.png') }}');
        background-size: 100% auto;
        background-repeat: repeat-y;
        background-position: center top;
        opacity: 0.08;
    ">
    </div>


    {{-- KONTEN --}}
    <div class="relative z-10">

        {{-- TAB + SEARCH --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-10">

            {{-- TAB --}}
            <div class="relative flex flex-wrap gap-6 font-semibold text-slate-800">

                <div
                    class="hidden md:block absolute bottom-0 h-[2px] bg-slate-800 transition-all duration-300"
                    :style="`width:${underlineWidth}px; left:${underlineX}px`">
                </div>

                <template x-for="item in kategori" :key="item">
                    <button
                        @click="activeKategori = item; $nextTick(() => moveUnderline($event.target))"
                        class="pb-1 transition hover:text-slate-900
                            border-b-2 md:border-b-0"
                        :class="
                            activeKategori === item
                            ? 'text-slate-900 border-slate-800'
                            : 'text-slate-500 border-transparent'
                        "
                    >
                        <span x-text="item"></span>
                    </button>
                </template>

            </div>

            {{-- SEARCH --}}
            <div class="relative w-full md:w-80">
                <input
                    type="text"
                    x-model="keyword"
                    placeholder="Cari produk…"
                    class="w-full pl-5 pr-4 py-3 rounded-full border border-slate-300 
                    bg-white shadow-sm focus:outline-none focus:border-[#0c5191] focus:ring-2 focus:ring-[#0c5191]/30 transition"
                >
            </div>

        </div>

        {{-- GRID PRODUK --}}
        <div class="relative z-10 grid grid-cols-2 gap-6 md:grid-cols-5">
            <template x-for="p in filteredProduk()" :key="p.id">
                <div
                    class="relative group rounded-3xl bg-white border-[3px] border-[#dcc051]
                           shadow-lg transition hover:-translate-y-1">

                    {{-- GLOW --}}
                    <div
                        class="absolute inset-0 rounded-3xl opacity-0 group-hover:opacity-100
                               pointer-events-none"
                        style="box-shadow:0 0 25px rgba(0,150,255,.35)">
                    </div>

                    {{-- CARD --}}
                    <div class="relative p-4 m-3 bg-white rounded-2xl border">

                        <div class="aspect-square flex items-center justify-center">
                            <img
                                :src="p.gambar"
                                class="object-contain max-h-full"
                            >
                        </div>

                        <a
                            href="{{ url('/#marketplace') }}"
                            class="block mt-3 py-2 text-sm font-bold text-center
                                   text-white bg-[#0c5191] rounded-xl"
                        >
                            <span x-text="p.nama"></span>
                        </a>

                    </div>
                </div>
            </template>
        </div>

    </div>
</section>





<script>
function produkFilter() {
    return {
        keyword: '',
        activeKategori: 'Tablet & Kapsul',

        underlineWidth: 0,
        underlineX: 0,

        kategori: [
            'Tablet & Kapsul',
            'Sirup',
            'Salep & Krim',
            'Obat Tetes',
            'Obat Herbal & Umum'
        ],

        produk: [
            // Tablet & Kapsul
            { id: 1, nama: 'Paraflu', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/206.png') }}' },
            { id: 2, nama: 'Tera-f Paracetamol', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/207.png') }}' },
            { id: 3, nama: 'Diatabs Tablet Diare', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/208.png') }}' },
            { id: 4, nama: 'Ambeven', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/209.png') }}' },
            { id: 5, nama: 'Diapet', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/210.png') }}' },
            { id: 6, nama: 'Sumagesic Paracetamol', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/211.png') }}' },
            { id: 7, nama: 'Sanmolforte', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/212.png') }}' },
            { id: 8, nama: 'Inza Paracetamol', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/213.png') }}' },
            { id: 9, nama: 'intunal-F', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/214.png') }}' },
            { id: 10, nama: 'Decolgen', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/215.png') }}' },
            { id: 11, nama: 'Decolsin', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/216.png') }}' },
            { id: 12, nama: 'Neo Rheumacyl Neuro', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/217.png') }}' },
            { id: 13, nama: 'Neo Rheumacyl', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/218.png') }}' },
            { id: 14, nama: 'Demacolyn Paracetamol', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/219.png') }}' },
            { id: 15, nama: 'Coparcetin kaplet', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/220.png') }}' },
            { id: 16, nama: 'Bisolvin', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/221.png') }}' },
            { id: 17, nama: 'Paramex', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/195.png') }}' },
            { id: 18, nama: 'Oskadon', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/196.png') }}' },
            { id: 19, nama: 'Oskadon SP', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/197.png') }}' },
            { id: 20, nama: 'Biogesic Paracetamol', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/198.png') }}' },
            { id: 21, nama: 'Dulcolax', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/199.png') }}' },
            { id: 22, nama: 'Contrexyn Jeruk', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/200.png') }}' },
            { id: 23, nama: 'Konidin', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/201.png') }}' },
            { id: 24, nama: 'Eyevit', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/202.png') }}' },
            { id: 25, nama: 'Combatrin', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/203.png') }}' },
            { id: 26, nama: 'Xepazym', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/204.png') }}' },
            { id: 27, nama: 'Entrostop', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/205.png') }}' },
            { id: 28, nama: 'Bodrexin Anak', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/180.png') }}' },
            { id: 29, nama: 'Bodrex Paracetamol', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/181.png') }}' },
            { id: 30, nama: 'Bodrex Migra', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/182.png') }}' },
            { id: 31, nama: 'Bodrex Extra', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/183.png') }}' },
            { id: 32, nama: 'Panadol Paracetamol', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/184.png') }}' },
            { id: 33, nama: 'Panadol Extra', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/185.png') }}' },
            { id: 34, nama: 'Panadol Cold & Flu', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/186.png') }}' },
            { id: 35, nama: 'Antimo', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/187.png') }}' },
            { id: 36, nama: 'Poldan Mig', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/188.png') }}' },
            { id: 37, nama: 'Paramex Nyeri Otot', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/189.png') }}' },
            { id: 38, nama: 'Imboost Original', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/141.png') }}' },
            { id: 39, nama: 'Imboost Force FCT', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/142.png') }}' },
            { id: 40, nama: 'Caviplex Cdez', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/143.png') }}' },
            { id: 41, nama: 'Becom-Zet Multivitamin', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/144.png') }}' },
            { id: 42, nama: 'Vitalong Vitamin C', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/145.png') }}' },
            { id: 43, nama: 'kapsida Kembang Bulan', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/128.png') }}' },
            { id: 44, nama: 'Sangobion', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/138.png') }}' },
            { id: 45, nama: 'Folic Acid 1000 MCG', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/139.png') }}' },
            { id: 46, nama: 'Livron B.Plex', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/140.png') }}' },
            { id: 47, nama: 'Welmove', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/146.png') }}' },
            { id: 48, nama: 'Enervon-C Multivitamin', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/147.png') }}' },
            { id: 49, nama: 'Redoxon Jeruk', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/19.png') }}' },
            { id: 50, nama: 'Laxing', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/85.png') }}' },
            { id: 51, nama: 'Disflatyl Simethicone', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/86.png') }}' },
            { id: 52, nama: 'Polysilane', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/87.png') }}' },
            { id: 53, nama: 'Promag', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/90.png') }}' },
            { id: 54, nama: 'Mylanta Antasid', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/91.png') }}' },
            { id: 55, nama: 'Biolysin Kids Rasa Anggur', kategori: 'Tablet & Kapsul', gambar: '{{ asset('images/produk/tablet-kapsul/34.png') }}' },

            // Sirup
            { id: 1, nama: 'Herbavomitz', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/89.png') }}' },
            { id: 2, nama: 'Plantacid', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/92.png') }}' },
            { id: 3, nama: 'Lambucid', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/93.png') }}' },
            { id: 4, nama: 'Mylanta', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/94.png') }}' },
            { id: 5, nama: 'Polysilane', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/95.png') }}' },
            { id: 6, nama: 'Itrasal', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/78.png') }}' },
            { id: 7, nama: 'Kompolax', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/80.png') }}' },
            { id: 8, nama: 'Guanistrep Suspensi', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/81.png') }}' },
            { id: 9, nama: 'Maagel Suspensi', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/96.png') }}' },
            { id: 10, nama: 'Gastrucid', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/97.png') }}' },
            { id: 11, nama: 'Termorex Paracteamol', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/65.png') }}' },
            { id: 12, nama: 'Fasidol Paracetamol', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/66.png') }}' },
            { id: 13, nama: 'Lactulose Dexa', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/82.png') }}' },
            { id: 14, nama: 'Lactulax', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/83.png') }}' },
            { id: 15, nama: 'Laxadine Emulsi', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/84.png') }}' },
            { id: 16, nama: 'Bodrexin Jeruk', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/67.png') }}' },
            { id: 17, nama: 'Bufect Forte', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/68.png') }}' },
            { id: 18, nama: 'Etafen Ibuprofen', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/69.png') }}' },
            { id: 19, nama: 'Proris Forte', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/70.png') }}' },
            { id: 20, nama: 'Termorex Plus Jeruk', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/71.png') }}' },
            { id: 21, nama: 'Pim-Tra-Kol Rasa Cherry', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/72.png') }}' },
            { id: 22, nama: 'Pim-Tra-Kol Rasa Lemon', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/73.png') }}' },
            { id: 23, nama: 'Paratusin', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/74.png') }}' },
            { id: 24, nama: 'Buffagan Expectorant', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/75.png') }}' },
            { id: 25, nama: 'Coparcetin Rasa Frambozen', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/76.png') }}' },
            { id: 26, nama: 'Coparcetin Rasa Jeruk', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/77.png') }}' },
            { id: 28, nama: 'Sanmol Paracetamol', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/56.png') }}' },
            { id: 29, nama: 'Tempra Forte Rasa Jeruk', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/57.png') }}' },
            { id: 30, nama: 'Tempra Forte Rasa Strawberry', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/58.png') }}' },
            { id: 31, nama: 'Tempra Syrup Rasa Anggur', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/59.png') }}' },
            { id: 32, nama: 'Tempra Drops Rasa Strawberry', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/60.png') }}' },
            { id: 33, nama: 'Actifed', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/36.png') }}' },
            { id: 34, nama: 'Tempra Drops Rasa Anggur', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/61.png') }}' },
            { id: 35, nama: 'Praxion Rasa Jeruk', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/62.png') }}' },
            { id: 36, nama: 'Praxion Drops Rasa Jeruk', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/63.png') }}' },
            { id: 37, nama: 'Actifed Obat Flu & Batuk', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/37.png') }}' },
            { id: 38, nama: 'Siladex Flu & Batuk', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/38.png') }}' },
            { id: 39, nama: 'Siladex Batuk Berdahak', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/39.png') }}' },
            { id: 40, nama: 'Vics Formula 44 Sirup', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/40.png') }}' },
            { id: 41, nama: 'Praxion Paracetamol Rasa Jeruk', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/64.png') }}' },
            { id: 42, nama: 'Woods Batuk tidak Berdahak', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/41.png') }}' },
            { id: 43, nama: 'OBH Combi FLu & Batuk Jahe', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/42.png') }}' },
            { id: 44, nama: 'OBH Combi Flu & Batuk Menthol', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/43.png') }}' },
            { id: 45, nama: 'OBH Combi Batuk Rasa Menthol', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/44.png') }}' },
            { id: 46, nama: 'OBH Combi Anak Rasa Jeruk', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/45.png') }}' },
            { id: 47, nama: 'OBH Combi Anak Rasa Apel', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/46.png') }}' },
            { id: 48, nama: 'Hufagrip Flu & Batuk Anak', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/47.png') }}' },
            { id: 49, nama: 'OB Herbal Junior', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/48.png') }}' },
            { id: 50, nama: 'Intunal Batuk & Flu', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/49.png') }}' },
            { id: 51, nama: 'Coldrexin Batuk & Pilek Anak', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/50.png') }}' },
            { id: 52, nama: 'Sari Kurma al-Jazira', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/51.png') }}' },
            { id: 53, nama: 'Madu As Salamah', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/52.png') }}' },
            { id: 54, nama: 'Madu SP As Salamah', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/53.png') }}' },
            { id: 55, nama: 'Laserin Madu Anak', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/31.png') }}' },
            { id: 56, nama: 'Flucadex Flu & Batuk Anak', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/32.png') }}' },
            { id: 57, nama: 'TJ Joybie Rasa Jeruk', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/33.png') }}' },
            { id: 58, nama: 'Sirplus Sirup Strawberry', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/88.png') }}' },
            { id: 59, nama: 'Imboost Force Vitamin Anak', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/35.png') }}' },
            { id: 60, nama: 'Biolysin Smart Anak Rasa Jeruk', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/30.png') }}' },
            { id: 61, nama: 'OB Herbal Junior Rasa Madu', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/29.png') }}' },
            { id: 62, nama: 'Woods Batuk Berdahak Rasa Mint', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/28.png') }}' },
            { id: 63, nama: 'Colfin Flu & Batuk', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/26.png') }}' },
            { id: 64, nama: 'Laserin Obat Batuk', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/21.png') }}' },
            { id: 65, nama: 'OB Herbal', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/22.png') }}' },
            { id: 66, nama: 'Siladex Antitussive', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/23.png') }}' },
            { id: 67, nama: 'Siladex DMP', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/24.png') }}' },
            { id: 68, nama: 'Sildaex Cough & Flu', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/25.png') }}' },
            { id: 69, nama: 'Pasaba Flu & Batuk Anak', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/15.png') }}' },
            { id: 70, nama: 'Vics Formula 44 Anak Rasa Strawberry', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/16.png') }}' },
            { id: 71, nama: 'OBH Combi Anak Rasa Strawberry', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/17.png') }}' },
            { id: 72, nama: 'Ternix Plus Rasa Jeruk', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/18.png') }}' },
            { id: 73, nama: 'Silex Flu & Batuk', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/20.png') }}' },
            { id: 74, nama: 'Hufagripp BP Anak', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/10.png') }}' },
            { id: 75, nama: 'Anakonidin OBH Anak Cherry', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/11.png') }}' },
            { id: 76, nama: 'Anakonidin OBH Anak Strawberry', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/12.png') }}' },
            { id: 77, nama: 'Anacetine Flu & Batuk Anak', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/13.png') }}' },
            { id: 78, nama: 'Flutop-c Anak Rasa Lemon', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/14.png') }}' },
            { id: 79, nama: 'Actifed Pilek & Alergi', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/5.png') }}' },
            { id: 80, nama: 'OBH Combi Batuk Berdahak Menthol', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/7.png') }}' },
            { id: 81, nama: 'Hufagripp BP Obat Pilek', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/9.png') }}' },
            { id: 82, nama: 'Dekadryl Flu & Batuk', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/1.png') }}' },
            { id: 83, nama: 'Ikadryl Rasa Apel', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/2.png') }}' },
            { id: 84, nama: 'Allerin Flu & Batuk', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/3.png') }}' },
            { id: 85, nama: 'Decolsin Flu & Batuk', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/4.png') }}' },
            { id: 86, nama: 'Wormetrin Sirup Rasa Jeruk', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/54.png') }}' },
            { id: 87, nama: 'Sirplus Sirup Jeruk', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/85.png') }}' },
            { id: 88, nama: 'Sirplus Sirup Melon', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/90.png') }}' },


            // Salep & Krim
            { id: 1, nama: 'Sriti Cream', kategori: 'Salep & Krim', gambar: '{{ asset('images/produk/salep-krim/167.png') }}' },
            { id: 2, nama: 'Canesten', kategori: 'Salep & Krim', gambar: '{{ asset('images/produk/salep-krim/168.png') }}' },
            { id: 3, nama: 'Kalpanax Krim', kategori: 'Salep & Krim', gambar: '{{ asset('images/produk/salep-krim/169.png') }}' },
            { id: 4, nama: 'Ichtiyol Zalf', kategori: 'Salep & Krim', gambar: '{{ asset('images/produk/salep-krim/170.png') }}' },
            { id: 5, nama: 'Salep Zam-Buk', kategori: 'Salep & Krim', gambar: '{{ asset('images/produk/salep-krim/171.png') }}' },
            { id: 6, nama: 'Salep 88', kategori: 'Salep & Krim', gambar: '{{ asset('images/produk/salep-krim/172.png') }}' },
            { id: 7, nama: 'Salep Cap Nosib', kategori: 'Salep & Krim', gambar: '{{ asset('images/produk/salep-krim/173.png') }}' },
            { id: 8, nama: 'Bepanthen Baby', kategori: 'Salep & Krim', gambar: '{{ asset('images/produk/salep-krim/174.png') }}' },
            { id: 9, nama: 'Mycoral Ketoconazole', kategori: 'Salep & Krim', gambar: '{{ asset('images/produk/salep-krim/175.png') }}' },
            { id: 10, nama: 'Benzolac 5', kategori: 'Salep & Krim', gambar: '{{ asset('images/produk/salep-krim/176.png') }}' },
            { id: 11, nama: 'Thrombogel Gel', kategori: 'Salep & Krim', gambar: '{{ asset('images/produk/salep-krim/157.png') }}' },
            { id: 12, nama: 'Flamar Gel', kategori: 'Salep & Krim', gambar: '{{ asset('images/produk/salep-krim/158.png') }}' },
            { id: 13, nama: 'Momilen Diaper Rash', kategori: 'Salep & Krim', gambar: '{{ asset('images/produk/salep-krim/177.png') }}' },
            { id: 14, nama: 'Nursing Cream', kategori: 'Salep & Krim', gambar: '{{ asset('images/produk/salep-krim/178.png') }}' },
            { id: 15, nama: 'Krim Pi Kang Shuang', kategori: 'Salep & Krim', gambar: '{{ asset('images/produk/salep-krim/179.png') }}' },
            { id: 16, nama: 'Carbon Norid', kategori: 'Salep & Krim', gambar: '{{ asset('images/produk/salep-krim/159.png') }}' },
            { id: 17, nama: 'Thrombophob Gel', kategori: 'Salep & Krim', gambar: '{{ asset('images/produk/salep-krim/160.png') }}' },
            { id: 18, nama: 'Counterpain', kategori: 'Salep & Krim', gambar: '{{ asset('images/produk/salep-krim/161.png') }}' },
            { id: 19, nama: 'Salep 24', kategori: 'Salep & Krim', gambar: '{{ asset('images/produk/salep-krim/164.png') }}' },
            { id: 20, nama: 'Daktarin Krim', kategori: 'Salep & Krim', gambar: '{{ asset('images/produk/salep-krim/165.png') }}' },
            { id: 21, nama: 'Balpirik', kategori: 'Salep & Krim', gambar: '{{ asset('images/produk/salep-krim/117.png') }}' },
            { id: 22, nama: 'Geliga', kategori: 'Salep & Krim', gambar: '{{ asset('images/produk/salep-krim/118.png') }}' },
            { id: 23, nama: 'Balsem Telon', kategori: 'Salep & Krim', gambar: '{{ asset('images/produk/salep-krim/121.png') }}' },
            { id: 24, nama: 'Vicks Vaporub Saku', kategori: 'Salep & Krim', gambar: '{{ asset('images/produk/salep-krim/122.png') }}' },
            { id: 25, nama: 'Vicks Vaporub', kategori: 'Salep & Krim', gambar: '{{ asset('images/produk/salep-krim/123.png') }}' },
            { id: 26, nama: 'Vicks Inhaler', kategori: 'Salep & Krim', gambar: '{{ asset('images/produk/salep-krim/124.png') }}' },
            { id: 27, nama: 'Salep Neo Ultrasiline', kategori: 'Salep & Krim', gambar: '{{ asset('images/produk/salep-krim/24.png') }}' },
            { id: 28, nama: 'Hot In Cream Aromatherapy', kategori: 'Salep & Krim', gambar: '{{ asset('images/produk/salep-krim/26.png') }}' },
            { id: 29, nama: 'Hot In Cream Botol', kategori: 'Salep & Krim', gambar: '{{ asset('images/produk/salep-krim/28.png') }}' },
            { id: 30, nama: 'Hot In Cream Strong Botol', kategori: 'Salep & Krim', gambar: '{{ asset('images/produk/salep-krim/29.png') }}' },
            { id: 31, nama: 'Minyak Gosok Cap Tawon', kategori: 'Salep & Krim', gambar: '{{ asset('images/produk/salep-krim/32.png') }}' },
            { id: 32, nama: 'Hot In Cream Strong Tube', kategori: 'Salep & Krim', gambar: '{{ asset('images/produk/salep-krim/33.png') }}' },
            { id: 34, nama: 'Hot In Cream Tube', kategori: 'Salep & Krim', gambar: '{{ asset('images/produk/salep-krim/34.png') }}' },


            // Obat Tetes
            { id: 1, nama: 'Cooling 5 Plus', kategori: 'Obat Tetes', gambar: '{{ asset('images/produk/tetes/129.png') }}' },
            { id: 2, nama: 'Cooling 5 CoolMint', kategori: 'Obat Tetes', gambar: '{{ asset('images/produk/tetes/130.png') }}' },
            { id: 3, nama: 'Rohto Lens Lubricant', kategori: 'Obat Tetes', gambar: '{{ asset('images/produk/tetes/131.png') }}' },
            { id: 4, nama: 'Y-rins', kategori: 'Obat Tetes', gambar: '{{ asset('images/produk/tetes/132.png') }}' },
            { id: 5, nama: 'Vital Ear Oil', kategori: 'Obat Tetes', gambar: '{{ asset('images/produk/tetes/133.png') }}' },
            { id: 6, nama: 'Rohto Cool', kategori: 'Obat Tetes', gambar: '{{ asset('images/produk/tetes/134.png') }}' },
            { id: 7, nama: 'Rohto', kategori: 'Obat Tetes', gambar: '{{ asset('images/produk/tetes/135.png') }}' },
            { id: 8, nama: 'Insto Dry Eyes', kategori: 'Obat Tetes', gambar: '{{ asset('images/produk/tetes/136.png') }}' },
            { id: 9, nama: 'Insto Regular', kategori: 'Obat Tetes', gambar: '{{ asset('images/produk/tetes/137.png') }}' },

            // Obat Herbal & Umum
            { id: 1, nama: 'Digital Thermometer Flexible', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/190.png') }}' },
            { id: 2, nama: 'Onemed Plester', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/191.png') }}' },
            { id: 3, nama: 'Daryant-Tulle', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/192.png') }}' },
            { id: 4, nama: 'hansaplast Jumbo', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/193.png') }}' },
            { id: 5, nama: 'Hansaplast', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/194.png') }}' },
            { id: 6, nama: 'Onemed Masker', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/148.png') }}' },
            { id: 7, nama: 'Onemed Masker New', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/149.png') }}' },
            { id: 8, nama: 'Die Da Yao Jing', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/154.png') }}' },
            { id: 9, nama: 'Betadine Antiseptic', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/155.png') }}' },
            { id: 10, nama: 'Betadine Solution', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/156.png') }}' },
            { id: 11, nama: 'Koyo Cabe', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/150.png') }}' },
            { id: 12, nama: 'Salonpas Hot', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/151.png') }}' },
            { id: 13, nama: 'Salonpas', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/152.png') }}' },
            { id: 14, nama: 'Inhaler Lang', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/153.png') }}' },
            { id: 15, nama: 'Salonpas Spray', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/125.png') }}' },
            { id: 16, nama: 'Plossa Red Hot', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/126.png') }}' },
            { id: 17, nama: 'Plossa Blue Mountain', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/127.png') }}' },
            { id: 18, nama: 'Minyak Otot Geliga', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/105.png') }}' },
            { id: 19, nama: 'Ika Minyak Gandapura', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/107.png') }}' },
            { id: 20, nama: 'Cap Lang Aromatherapy', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/108.png') }}' },
            { id: 21, nama: 'Sidola Kayu Putih', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/110.png') }}' },
            { id: 22, nama: 'Sidola Angin Cap Kapak', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/112.png') }}' },
            { id: 23, nama: 'Minyak Kayu Putih CapLang', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/116.png') }}' },
            { id: 24, nama: 'Esemag Herbal Mint', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/88.png') }}' },
            { id: 25, nama: 'Tolakangin Herbal', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/98.png') }}' },
            { id: 26, nama: 'Tolak Angin Anak', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/99.png') }}' },
            { id: 27, nama: 'Tolak Angin Herbal FLU', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/100.png') }}' },
            { id: 28, nama: 'Polident', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/54.png') }}' },
            { id: 29, nama: 'Microlax Gel', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/79.png') }}' },
            { id: 30, nama: 'Tolak Linu Herbal Mint', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/104.png') }}' },
            { id: 31, nama: 'Lamandel', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/103.png') }}' },
            { id: 32, nama: 'Antangin Junior', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/102.png') }}' },
            { id: 33, nama: 'Balsem Lang', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/35.png') }}' },
            { id: 34, nama: 'Acnol Lotion Jerawat', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/22.png') }}' },
            { id: 35, nama: 'Cap Lang Minyak Angin', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/23.png') }}' },
            { id: 36, nama: 'My Baby Minyak Telon Plus', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/24.png') }}' },
            { id: 37, nama: 'Sabun JF Anti Acne', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/25.png') }}' },
            { id: 38, nama: 'Sabun JF Dermaned', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/26.png') }}' },
            { id: 39, nama: 'Kool Fever Bayi', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/28.png') }}' },
            { id: 40, nama: 'Oilum Cleansing Bar', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/29.png') }}' },
            { id: 41, nama: 'Kool Fever Anak', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/30.png') }}' },
            { id: 42, nama: 'Bye Bye Fever Anak', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/31.png') }}' },
            { id: 43, nama: 'Altamed Alcohol Swab', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/32.png') }}' },
            { id: 44, nama: 'H&W Duckbill Face Mask', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/33.png') }}' },
            { id: 45, nama: 'Surgical Face Mask', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/34.png') }}' },
            { id: 46, nama: 'Harmonie Cutton Buds', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/37.png') }}' },
            { id: 47, nama: 'Medika Alcohol 70%', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/38.png') }}' },
            { id: 48, nama: 'Medika Rivanol 100 ml', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/39.png') }}' },
            { id: 49, nama: 'Medika Rivanol 300 ml', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/40.png') }}' },
            { id: 50, nama: 'Herocyn', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/42.png') }}' },
            { id: 51, nama: 'Ika Talk Salicyl Menthol', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/43.png') }}' },
            { id: 52, nama: 'Digital Thermometer Rigid', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/44.png') }}' },
            { id: 53, nama: 'Madu Murni Nusantara', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/46.png') }}' },

        ],

        filteredProduk() {
            return this.produk.filter(p =>
                p.kategori === this.activeKategori &&
                p.nama.toLowerCase().includes(this.keyword.toLowerCase())
            )
        },

        moveUnderline(el) {
            this.underlineWidth = el.offsetWidth;
            this.underlineX = el.offsetLeft;
        },

        init() {
            this.$nextTick(() => {
                const first = document.querySelector('[x-data] button');
                if (first) this.moveUnderline(first);
            });
        }
    }
}
</script>








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