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
<section x-data="produkFilter()" class="relative max-w-7xl mx-auto px-6 py-16">

    {{-- ================= WATERMARK 2 BARIS ================= --}}
    <div
        class="absolute inset-0 pointer-events-none opacity-[0.05]"
        style="
            background-image:
                url('{{ asset('images/tablet.svg') }}'),
                url('{{ asset('images/sirup.svg') }}'),
                url('{{ asset('images/salep.svg') }}'),
                url('{{ asset('images/tetes.svg') }}'),
                url('{{ asset('images/herbal.svg') }}'),

                url('{{ asset('images/tablet.svg') }}'),
                url('{{ asset('images/sirup.svg') }}'),
                url('{{ asset('images/salep.svg') }}'),
                url('{{ asset('images/tetes.svg') }}'),
                url('{{ asset('images/herbal.svg') }}');

            background-size:
                160px, 160px, 160px, 160px, 160px,
                160px, 160px, 160px, 160px, 160px;

            background-position:
                5% 10%,
                25% 20%,
                45% 8%,
                65% 18%,
                85% 12%,

                10% 70%,
                30% 80%,
                50% 68%,
                70% 82%,
                90% 72%;

            background-repeat: no-repeat;
        ">
    </div>

    {{-- =================== KONTEN UTAMA =================== --}}
    <div class="relative z-10">

        {{-- ======== TAB KATEGORI + SEARCH ========= --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

            {{-- TAB KATEGORI --}}
            <div class="relative flex flex-wrap gap-6 font-semibold text-slate-800">

                {{-- animasi underline --}}
                <div
                    class="absolute bottom-0 h-[2px] bg-slate-800 transition-all duration-300"
                    :style="`width:${underlineWidth}px; left:${underlineX}px`">
                </div>

                <template x-for="item in kategori" :key="item">
                    <button
                        @click="activeKategori = item; moveUnderline($event.target)"
                        class="pb-1 transition duration-300 hover:text-slate-900"
                        :class="activeKategori === item ? 'text-slate-900' : 'text-slate-500'">

                        <span
                            class="transition"
                            :class="activeKategori === item ? 'scale-105' : 'opacity-70'">
                            <span x-text="item"></span>
                        </span>
                    </button>
                </template>

            </div>

            {{-- SEARCH --}}
            <div class="relative w-full md:w-80">
                <input
                    type="text"
                    x-model="keyword"
                    placeholder="Cari produk…"
                    class="w-full px-4 py-2 border rounded-full shadow-sm focus:outline-none">

                <span class="absolute right-3 top-2.5 text-slate-500">
                    🔍
                </span>
            </div>

        </div>

        {{-- =================== GRID PRODUK =================== --}}
        <div class="grid grid-cols-2 gap-6 md:grid-cols-5">

            <template x-for="p in filteredProduk()" :key="p.id">

                <div
                    class="relative group rounded-3xl bg-white border-[3px] border-[#dcc051]
                           shadow-lg transition-all duration-300 hover:-translate-y-1">

                    {{-- GLOW HOVER --}}
                    <div
                        class="absolute inset-0 rounded-3xl opacity-0 transition duration-300 group-hover:opacity-100 pointer-events-none"
                        style="box-shadow:0 0 25px rgba(0,150,255,.35)">
                    </div>

                    {{-- BACKGROUND MOTIF --}}
                    <div
                        class="absolute inset-0 rounded-3xl opacity-[0.15]"
                        style="background-image: url('{{ asset('images/pattern.png') }}'); background-size: 140%;">
                    </div>

                    {{-- KONTEN KARTU --}}
                    <div class="relative p-4 m-3 bg-white rounded-2xl border-[2.5px] border-slate-200">

                        {{-- GAMBAR --}}
                        <div class="relative flex items-center justify-center p-1 aspect-square rounded-2xl">
                            <img
                                :src="p.gambar"
                                class="object-contain w-full max-h-full transition duration-300 drop-shadow-md group-hover:scale-105">
                        </div>

                        {{-- NAMA PRODUK BUTTON --}}
                        <div class="mt-3">
                            <a
                                href="{{ url('/#marketplace') }}"
                                class="block w-full py-2 text-sm font-bold tracking-wide text-center text-white bg-[#0c5191] rounded-xl shadow transition duration-200 hover:bg-[#093d6b] active:scale-95">
                                <span x-text="p.nama"></span>
                            </a>
                        </div>

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

            // Sirup
            { id: 1, nama: 'Herbavomitz', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/89.png') }}' },
            { id: 2, nama: 'Plantacid', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/92.png') }}' },
            { id: 3, nama: 'Lambucid', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/93.png') }}' },
            { id: 4, nama: 'Mylanta', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/94.png') }}' },
            { id: 5, nama: 'Polysilane', kategori: 'Sirup', gambar: '{{ asset('images/produk/sirup/95.png') }}' },

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

            // Obat Herbal
            { id: 1, nama: 'Digital Thermometer', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/190.png') }}' },
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
            { id: 19, nama: 'Ika Gandapura', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/107.png') }}' },
            { id: 20, nama: 'Cap Lang Aromatherapy', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/108.png') }}' },
            { id: 21, nama: 'Sidola Kayu Putih', kategori: 'Obat Herbal & Umum', gambar: '{{ asset('images/produk/herbal-umum/110.png') }}' },
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