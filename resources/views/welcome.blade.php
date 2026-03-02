<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pantoo | Operational Control in One Ecosystem</title>
    <meta name="description" content="Pantoo menyatukan HRIS, attendance, dan operasional distribusi multi-cabang dalam satu platform SaaS.">
    <script>
        (function () {
            try {
                var key = 'pantoo-theme';
                var saved = localStorage.getItem(key);
                var theme = (saved === 'light' || saved === 'dark')
                    ? saved
                    : (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
                document.documentElement.setAttribute('data-theme', theme);
            } catch (error) {
                document.documentElement.setAttribute('data-theme', 'light');
            }
        })();
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Sora:wght@500;600;700;800&display=swap" rel="stylesheet">
    @php($hasVite = file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @if ($hasVite)
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            body {
                min-height: 100vh;
                font-family: 'Manrope', ui-sans-serif, system-ui, sans-serif;
                color: #1a2836;
                background-color: #f0fdfa;
                background-image:
                    radial-gradient(64rem 34rem at 10% 0%, rgb(153 246 228 / 55%), transparent 72%),
                    radial-gradient(42rem 26rem at 90% 90%, rgb(13 148 136 / 24%), transparent 72%);
            }

            .section-shell {
                width: 100%;
                padding-left: 1.5rem;
                padding-right: 1.5rem;
            }

            .ds-card {
                border-radius: 1.25rem;
                border: 1px solid rgb(205 217 225 / 80%);
                background: rgb(255 255 255 / 80%);
                box-shadow: 0 20px 48px -24px rgb(31 65 85 / 32%);
                backdrop-filter: blur(10px);
            }

            .ds-panel {
                border-radius: 1.75rem;
                border: 1px solid rgb(94 234 212 / 55%);
                background: rgb(255 255 255 / 88%);
                box-shadow: 0 20px 70px -30px rgb(17 94 89 / 32%);
                backdrop-filter: blur(10px);
            }

            .ds-chip {
                display: inline-flex;
                align-items: center;
                border-radius: 999px;
                border: 1px solid rgb(45 212 191 / 55%);
                background: rgb(204 251 241 / 85%);
                padding: .25rem .75rem;
                font-size: .75rem;
                font-weight: 600;
                letter-spacing: .02em;
                color: #115e59;
            }

            .ds-title {
                font-family: 'Sora', ui-sans-serif, system-ui, sans-serif;
                font-size: clamp(1.875rem, 5vw, 3rem);
                line-height: 1.15;
                color: #1a2836;
            }

            .btn-primary {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                border-radius: 999px;
                background: #0f766e;
                padding: .625rem 1.25rem;
                font-size: .875rem;
                font-weight: 600;
                color: #fff;
                transition: .2s;
            }

            .btn-primary:hover {
                background: #115e59;
            }

            .btn-secondary {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                border-radius: 999px;
                border: 1px solid #aebfcb;
                background: #fff;
                padding: .625rem 1.25rem;
                font-size: .875rem;
                font-weight: 600;
                color: #2e3f4f;
                transition: .2s;
            }

            .btn-secondary:hover {
                border-color: #0d9488;
                color: #115e59;
            }

            .reveal {
                animation: rise .7s ease-out both;
            }

            .reveal-2 {
                animation-delay: .14s;
            }

            .reveal-3 {
                animation-delay: .28s;
            }

            .font-display {
                font-family: 'Sora', ui-sans-serif, system-ui, sans-serif;
            }

            .text-ink-900 { color: #1a2836 !important; }
            .text-ink-800 { color: #2e3f4f !important; }
            .text-ink-700 { color: #3f5263 !important; }
            .text-ink-600 { color: #4f6577 !important; }
            .text-ink-500 { color: #647b8d !important; }
            .text-pantoo-800 { color: #115e59 !important; }
            .bg-pantoo-50 { background-color: #f0fdfa !important; }
            .bg-pantoo-300\/45 { background-color: rgb(94 234 212 / 45%) !important; }
            .bg-pantoo-500\/35 { background-color: rgb(20 184 166 / 35%) !important; }
            .bg-pantoo-200\/60 { background-color: rgb(153 246 228 / 60%) !important; }
            .bg-ink-50\/60 { background-color: rgb(245 248 250 / 60%) !important; }
            .border-ink-200\/80 { border-color: rgb(205 217 225 / 80%) !important; }
            .border-ink-200\/70 { border-color: rgb(205 217 225 / 70%) !important; }
            .border-pantoo-300\/70 { border-color: rgb(94 234 212 / 70%) !important; }
            .hover\:text-pantoo-800:hover { color: #115e59 !important; }

            @keyframes rise {
                from {
                    opacity: 0;
                    transform: translateY(14px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @media (min-width: 1024px) {
                .section-shell {
                    padding-left: 3rem;
                    padding-right: 3rem;
                }
            }

            @media (min-width: 1280px) {
                .section-shell {
                    padding-left: 4rem;
                    padding-right: 4rem;
                }
            }

            @media (min-width: 1536px) {
                .section-shell {
                    padding-left: 5rem;
                    padding-right: 5rem;
                }
            }
        </style>
    @endif
    <style>
        .theme-toggle {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            border-radius: 999px;
            border: 1px solid rgb(174 191 203 / 85%);
            background: rgb(255 255 255 / 78%);
            padding: .35rem .8rem;
            font-size: .75rem;
            font-weight: 700;
            letter-spacing: .02em;
            color: #2e3f4f;
            transition: .2s;
            cursor: pointer;
        }

        .theme-toggle:hover {
            border-color: rgb(13 148 136 / 90%);
            color: #115e59;
        }

        .theme-toggle-dot {
            width: .55rem;
            height: .55rem;
            border-radius: 999px;
            background: #0f766e;
        }

        html[data-theme='dark'] {
            color-scheme: dark;
        }

        html[data-theme='dark'] body {
            color: #e2e8f0;
            background-color: #0f1722;
            background-image:
                radial-gradient(64rem 34rem at 10% 0%, rgb(15 118 110 / 42%), transparent 72%),
                radial-gradient(42rem 26rem at 90% 90%, rgb(17 94 89 / 40%), transparent 72%);
        }

        html[data-theme='dark'] nav.sticky {
            border-color: rgb(71 85 105 / 70%) !important;
            background: rgb(15 23 36 / 58%) !important;
        }

        html[data-theme='dark'] .ds-card {
            border-color: rgb(71 85 105 / 70%) !important;
            background: rgb(15 23 36 / 82%) !important;
            box-shadow: 0 20px 48px -24px rgb(2 6 23 / 65%);
        }

        html[data-theme='dark'] .ds-panel {
            border-color: rgb(51 65 85 / 85%) !important;
            background: rgb(15 23 36 / 92%) !important;
            box-shadow: 0 20px 70px -30px rgb(2 6 23 / 78%);
        }

        html[data-theme='dark'] .ds-chip {
            border-color: rgb(45 212 191 / 55%) !important;
            background: rgb(15 118 110 / 28%) !important;
            color: #d8edf2 !important;
        }

        html[data-theme='dark'] .btn-primary {
            background: #14b8a6 !important;
            color: #0f1722 !important;
        }

        html[data-theme='dark'] .btn-primary:hover {
            background: #2dd4bf !important;
        }

        html[data-theme='dark'] .btn-secondary {
            border-color: rgb(100 116 139 / 90%) !important;
            background: rgb(15 23 36 / 85%) !important;
            color: #dbe8f6 !important;
        }

        html[data-theme='dark'] .btn-secondary:hover {
            border-color: rgb(13 148 136 / 90%) !important;
            color: #e2f4f7 !important;
        }

        html[data-theme='dark'] .theme-toggle {
            border-color: rgb(100 116 139 / 85%);
            background: rgb(15 23 36 / 90%);
            color: #dbe8f6;
        }

        html[data-theme='dark'] .theme-toggle:hover {
            border-color: rgb(13 148 136 / 90%);
            color: #e2f4f7;
        }

        html[data-theme='dark'] .theme-toggle-dot {
            background: #5eead4;
        }

        html[data-theme='dark'] .bg-white {
            background-color: rgb(15 23 36 / 88%) !important;
        }

        html[data-theme='dark'] .bg-pantoo-50 {
            background-color: rgb(15 23 36 / 62%) !important;
        }

        html[data-theme='dark'] .bg-ink-50\/60 {
            background-color: rgb(30 41 59 / 72%) !important;
        }

        html[data-theme='dark'] .text-ink-900 {
            color: #f1f5f9 !important;
        }

        html[data-theme='dark'] .text-ink-800 {
            color: #e2e8f0 !important;
        }

        html[data-theme='dark'] .text-ink-700 {
            color: #cbd5e1 !important;
        }

        html[data-theme='dark'] .text-ink-600 {
            color: #b7c6d8 !important;
        }

        html[data-theme='dark'] .text-ink-500 {
            color: #9fb2c8 !important;
        }

        html[data-theme='dark'] .text-pantoo-800 {
            color: #99f6e4 !important;
        }

        html[data-theme='dark'] .border-ink-200\/80,
        html[data-theme='dark'] .border-ink-200\/70,
        html[data-theme='dark'] .border-pantoo-300\/70 {
            border-color: rgb(71 85 105 / 72%) !important;
        }
    </style>
</head>
<body>
    <div class="relative isolate overflow-x-clip pb-4">
        <div class="pointer-events-none absolute inset-0 -z-10">
            <div class="absolute -left-24 top-0 h-72 w-72 rounded-full bg-pantoo-300/45 blur-3xl"></div>
            <div class="absolute right-0 top-56 h-64 w-64 rounded-full bg-pantoo-500/35 blur-3xl"></div>
            <div class="absolute bottom-0 left-1/3 h-64 w-64 rounded-full bg-pantoo-200/60 blur-3xl"></div>
        </div>

        <nav class="section-shell sticky top-0 z-50 flex items-center justify-between border-b border-ink-200/70 bg-white/55 py-4 backdrop-blur-xl reveal">
            <div class="font-display text-xl tracking-tight text-ink-900">Pantoo</div>
            <div class="hidden items-center gap-6 text-sm font-medium text-ink-700 md:flex">
                <a href="#problem" class="transition hover:text-pantoo-800">Problem</a>
                <a href="#solution" class="transition hover:text-pantoo-800">Solution</a>
                <a href="#features" class="transition hover:text-pantoo-800">Features</a>
                <a href="#market" class="transition hover:text-pantoo-800">Market</a>
                <a href="#strategy" class="transition hover:text-pantoo-800">Strategy</a>
            </div>
            <button id="theme-toggle" type="button" class="theme-toggle" aria-label="Toggle dark and light mode" aria-pressed="false">
                <span class="theme-toggle-dot" aria-hidden="true"></span>
                <span data-theme-label>Light</span>
            </button>
        </nav>

        <main class="section-shell mt-12 space-y-20 pb-20 md:mt-16 md:space-y-24">
            <section class="grid gap-8 lg:grid-cols-[1.25fr_0.75fr]">
                <div class="space-y-7 reveal reveal-2">
                    <span class="ds-chip">Pantoo Company Profile</span>
                    <h1 class="ds-title max-w-5xl text-ink-900">
                        Operational control untuk distribusi modern, dalam satu platform yang siap scale.
                    </h1>
                    <p class="max-w-4xl text-base leading-relaxed text-ink-600 md:text-lg">
                        Pantoo menggabungkan HRIS, attendance, dan sistem distribusi multi-cabang dalam satu ecosystem.
                        Hasilnya: keputusan lebih cepat, kontrol lebih rapi, dan biaya software lebih efisien.
                    </p>
                    <div class="flex flex-wrap items-center gap-3">
                        <a href="#solution" class="btn-primary">Explore Platform</a>
                        <a href="#market" class="btn-secondary">Market & Business Model</a>
                    </div>
                    <div class="grid gap-3 sm:grid-cols-3">
                        <div class="rounded-2xl border border-ink-200/80 p-4">
                            <p class="text-xs uppercase tracking-wider text-ink-500">Core Positioning</p>
                            <p class="mt-2 text-sm font-semibold text-ink-900">Focused ERP for Distribution</p>
                        </div>
                        <div class="rounded-2xl border border-ink-200/80 p-4">
                            <p class="text-xs uppercase tracking-wider text-ink-500">Target Early Market</p>
                            <p class="mt-2 text-sm font-semibold text-ink-900">Perusahaan 2-20 cabang</p>
                        </div>
                        <div class="rounded-2xl border border-ink-200/80 p-4">
                            <p class="text-xs uppercase tracking-wider text-ink-500">Pricing Approach</p>
                            <p class="mt-2 text-sm font-semibold text-ink-900">Subscription, no setup fee</p>
                        </div>
                    </div>
                </div>

                <aside class="ds-panel p-7 reveal reveal-3">
                    <p class="text-xs font-semibold uppercase tracking-[0.18em] text-ink-500">Executive Snapshot</p>
                    <div class="mt-5 grid grid-cols-3 gap-3">
                        <div class="rounded-2xl border border-ink-200/80 bg-white p-3">
                            <p class="text-xs text-ink-500">Model</p>
                            <p class="mt-2 text-xl font-bold text-ink-900">SaaS</p>
                        </div>
                        <div class="rounded-2xl border border-ink-200/80 bg-white p-3">
                            <p class="text-xs text-ink-500">Branch Focus</p>
                            <p class="mt-2 text-xl font-bold text-ink-900">Multi</p>
                        </div>
                        <div class="rounded-2xl border border-ink-200/80 bg-white p-3">
                            <p class="text-xs text-ink-500">Go Live Plan</p>
                            <p class="mt-2 text-xl font-bold text-ink-900">QX 2026</p>
                        </div>
                    </div>
                    <div class="mt-5 rounded-2xl border border-pantoo-300/70 bg-pantoo-50 p-4 text-sm leading-relaxed text-ink-700">
                        Pantoo dirancang sebagai operating system untuk perusahaan distribusi Indonesia:
                        connected data, multi-branch ready, dan fleksibel terhadap SOP tiap organisasi.
                    </div>
                </aside>
            </section>

            <section id="problem" class="space-y-6">
                <div class="flex flex-wrap items-end justify-between gap-4">
                    <div class="space-y-3">
                        <span class="ds-chip">Problem Landscape</span>
                        <h2 class="font-display text-2xl text-ink-900 md:text-3xl">Masalah inti di distribusi & logistik hari ini</h2>
                    </div>
                    <p class="max-w-xl text-sm leading-relaxed text-ink-600 md:text-base">
                        Sebagian besar perusahaan masih menggunakan software terpisah untuk HR dan operasional distribusi,
                        sehingga data lambat, biaya tinggi, dan kontrol cabang tidak konsisten.
                    </p>
                </div>
                <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                    <article class="ds-card p-5 transition duration-300 hover:-translate-y-0.5">
                        <h3 class="text-base font-bold text-ink-900">Sistem terfragmentasi</h3>
                        <p class="mt-2 text-sm leading-relaxed text-ink-600">HRIS dan distribusi tidak berbagi data real-time.</p>
                    </article>
                    <article class="ds-card p-5 transition duration-300 hover:-translate-y-0.5">
                        <h3 class="text-base font-bold text-ink-900">Kontrol cabang lemah</h3>
                        <p class="mt-2 text-sm leading-relaxed text-ink-600">Standar proses antar cabang sulit dijaga saat scale-up.</p>
                    </article>
                    <article class="ds-card p-5 transition duration-300 hover:-translate-y-0.5">
                        <h3 class="text-base font-bold text-ink-900">Compliance berisiko</h3>
                        <p class="mt-2 text-sm leading-relaxed text-ink-600">Attendance lapangan rentan manipulasi dan sulit diaudit.</p>
                    </article>
                    <article class="ds-card p-5 transition duration-300 hover:-translate-y-0.5">
                        <h3 class="text-base font-bold text-ink-900">Cost structure tidak efisien</h3>
                        <p class="mt-2 text-sm leading-relaxed text-ink-600">Dua lisensi, dua vendor, plus biaya integrasi manual.</p>
                    </article>
                    <article class="ds-card p-5 transition duration-300 hover:-translate-y-0.5">
                        <h3 class="text-base font-bold text-ink-900">Fleksibilitas rendah</h3>
                        <p class="mt-2 text-sm leading-relaxed text-ink-600">Banyak solusi tidak cocok dengan SOP unik perusahaan.</p>
                    </article>
                    <article class="ds-card p-5 transition duration-300 hover:-translate-y-0.5">
                        <h3 class="text-base font-bold text-ink-900">Gap pasar masih terbuka</h3>
                        <p class="mt-2 text-sm leading-relaxed text-ink-600">Belum banyak platform yang benar-benar all-in-one.</p>
                    </article>
                </div>
            </section>

            <section id="solution" class="grid gap-5 lg:grid-cols-[1.15fr_0.85fr]">
                <article class="ds-panel p-7 md:p-9">
                    <span class="ds-chip">Solution</span>
                    <h2 class="mt-4 font-display text-2xl text-ink-900 md:text-3xl">One ecosystem. One source of operational truth.</h2>
                    <p class="mt-3 max-w-3xl text-sm leading-relaxed text-ink-600 md:text-base">
                        Pantoo adalah cloud SaaS yang mengintegrasikan HRIS lengkap, attendance & shift management,
                        operasional distribusi, tracking BBM, serta multi-branch management dalam alur yang terkoneksi.
                    </p>
                    <div class="mt-5 rounded-2xl border border-pantoo-300/70 bg-pantoo-50 p-4 text-sm font-semibold text-ink-700">
                        Tidak perlu beli 2 software. Tidak perlu integrasi manual.
                    </div>
                </article>
                <article class="ds-card p-7 md:p-9">
                    <p class="text-xs font-semibold uppercase tracking-[0.16em] text-pantoo-800">Architecture Highlights</p>
                    <ul class="mt-4 space-y-3 text-sm leading-relaxed text-ink-700 md:text-base">
                        <li>- Unified dashboard lintas fungsi</li>
                        <li>- Data terpisah dan filter per cabang</li>
                        <li>- Scalable untuk ekspansi nasional</li>
                        <li>- Customizable mengikuti SOP perusahaan</li>
                        <li>- Subscription model low barrier to entry</li>
                    </ul>
                </article>
            </section>

            <section id="features" class="space-y-6">
                <div class="flex flex-wrap items-end justify-between gap-4">
                    <div class="space-y-3">
                        <span class="ds-chip">Product Deep Dive</span>
                        <h2 class="font-display text-2xl text-ink-900 md:text-3xl">Core modules untuk operasi distribusi yang akuntabel</h2>
                    </div>
                    <p class="max-w-xl text-sm leading-relaxed text-ink-600 md:text-base">
                        Fokus utama Pantoo adalah memadukan kontrol SDM, operasional cabang, dan compliance lapangan
                        tanpa menambah kompleksitas implementasi.
                    </p>
                </div>
                <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                    <article class="ds-card p-5 transition duration-300 hover:-translate-y-0.5">
                        <p class="text-xs font-semibold uppercase tracking-[0.16em] text-pantoo-800">Attendance Compliance</p>
                        <p class="mt-3 text-sm leading-relaxed text-ink-600">Timestamp immutable, GPS coordinate, selfie verification, device tracking.</p>
                    </article>
                    <article class="ds-card p-5 transition duration-300 hover:-translate-y-0.5">
                        <p class="text-xs font-semibold uppercase tracking-[0.16em] text-pantoo-800">Multi-Branch Rules</p>
                        <p class="mt-3 text-sm leading-relaxed text-ink-600">Aturan attendance dan operasional dapat disesuaikan per cabang.</p>
                    </article>
                    <article class="ds-card p-5 transition duration-300 hover:-translate-y-0.5">
                        <p class="text-xs font-semibold uppercase tracking-[0.16em] text-pantoo-800">HRIS Complete</p>
                        <p class="mt-3 text-sm leading-relaxed text-ink-600">Data karyawan, struktur organisasi, dan shift dalam satu sistem.</p>
                    </article>
                    <article class="ds-card p-5 transition duration-300 hover:-translate-y-0.5">
                        <p class="text-xs font-semibold uppercase tracking-[0.16em] text-pantoo-800">Distribution Ops</p>
                        <p class="mt-3 text-sm leading-relaxed text-ink-600">Kontrol operasional distribusi dan aktivitas cabang lebih terukur.</p>
                    </article>
                    <article class="ds-card p-5 transition duration-300 hover:-translate-y-0.5">
                        <p class="text-xs font-semibold uppercase tracking-[0.16em] text-pantoo-800">Fuel Tracking</p>
                        <p class="mt-3 text-sm leading-relaxed text-ink-600">Monitoring BBM untuk efisiensi biaya armada.</p>
                    </article>
                    <article class="ds-card p-5 transition duration-300 hover:-translate-y-0.5">
                        <p class="text-xs font-semibold uppercase tracking-[0.16em] text-pantoo-800">Customizable System</p>
                        <p class="mt-3 text-sm leading-relaxed text-ink-600">Fleksibel terhadap kebutuhan proses dan request fitur internal.</p>
                    </article>
                </div>
            </section>

            <section id="market" class="grid gap-5 lg:grid-cols-2">
                <article class="ds-panel p-7 md:p-9">
                    <span class="ds-chip">Target Market & Size</span>
                    <h3 class="mt-4 font-display text-2xl text-ink-900">Distribusi & logistik Indonesia sebagai pasar utama</h3>
                    <ul class="mt-4 grid gap-2 text-sm text-ink-700 md:text-base">
                        <li>- Perusahaan distribusi nasional</li>
                        <li>- Perusahaan logistik regional</li>
                        <li>- FMCG distributor</li>
                        <li>- Multi-cabang retail</li>
                        <li>- Manufacturing dengan cabang banyak</li>
                    </ul>
                    <div class="mt-6 grid gap-3 sm:grid-cols-3">
                        <div class="rounded-2xl border border-ink-200/70 bg-white p-4">
                            <p class="text-xs uppercase tracking-wider text-ink-500">TAM</p>
                            <p class="mt-2 text-sm font-semibold text-ink-900">Seluruh distribusi & logistik Indonesia</p>
                        </div>
                        <div class="rounded-2xl border border-ink-200/70 bg-white p-4">
                            <p class="text-xs uppercase tracking-wider text-ink-500">SAM</p>
                            <p class="mt-2 text-sm font-semibold text-ink-900">SMB tanpa sistem terintegrasi</p>
                        </div>
                        <div class="rounded-2xl border border-ink-200/70 bg-white p-4">
                            <p class="text-xs uppercase tracking-wider text-ink-500">SOM</p>
                            <p class="mt-2 text-sm font-semibold text-ink-900">Tier 1-2, 2-20 cabang</p>
                        </div>
                    </div>
                </article>

                <article class="ds-card p-7 md:p-9">
                    <span class="ds-chip">Business Model</span>
                    <h3 class="mt-4 font-display text-2xl text-ink-900">Subscription SaaS dengan recurring revenue</h3>
                    <ul class="mt-4 space-y-2 text-sm text-ink-700 md:text-base">
                        <li>- Monthly subscription per perusahaan</li>
                        <li>- Pricing: jumlah karyawan, cabang, modul aktif</li>
                        <li>- Add-on modules sebagai expansion revenue</li>
                        <li>- Optional custom development fee</li>
                    </ul>
                    <div class="mt-6 rounded-2xl border border-pantoo-300/70 bg-pantoo-50 p-4 text-sm leading-relaxed text-ink-700">
                        Keunggulan model: no upfront cost, predictable recurring revenue, dan retention tinggi karena sistem menjadi core operation.
                    </div>
                </article>
            </section>

            <section class="space-y-6">
                <div class="flex flex-wrap items-end justify-between gap-4">
                    <div class="space-y-3">
                        <span class="ds-chip">Competitive Positioning</span>
                        <h2 class="font-display text-2xl text-ink-900 md:text-3xl">Pantoo advantage dibanding kategori solusi lain</h2>
                    </div>
                    <p class="max-w-xl text-sm leading-relaxed text-ink-600 md:text-base">
                        Pantoo menutup gap antara HRIS-only, distribution-only, dan ERP generik yang mahal serta kompleks.
                    </p>
                </div>
                <div class="ds-card overflow-x-auto p-5 md:p-7">
                    <table class="w-full min-w-[760px] text-left text-sm">
                        <thead>
                            <tr class="border-b border-ink-200/70 text-ink-500">
                                <th class="py-3 pr-4 font-semibold">Feature</th>
                                <th class="py-3 pr-4 font-semibold">HRIS Only</th>
                                <th class="py-3 pr-4 font-semibold">Distribusi Only</th>
                                <th class="py-3 font-semibold text-pantoo-800">Pantoo</th>
                            </tr>
                        </thead>
                        <tbody class="text-ink-700">
                            <tr class="border-b border-ink-200/60"><td class="py-3 pr-4 font-medium text-ink-900">HRIS</td><td class="py-3 pr-4">Yes</td><td class="py-3 pr-4">No</td><td class="py-3 font-semibold text-pantoo-800">Yes</td></tr>
                            <tr class="border-b border-ink-200/60"><td class="py-3 pr-4 font-medium text-ink-900">Distribusi</td><td class="py-3 pr-4">No</td><td class="py-3 pr-4">Yes</td><td class="py-3 font-semibold text-pantoo-800">Yes</td></tr>
                            <tr class="border-b border-ink-200/60"><td class="py-3 pr-4 font-medium text-ink-900">Multi Cabang Advanced</td><td class="py-3 pr-4">Limited</td><td class="py-3 pr-4">Limited</td><td class="py-3 font-semibold text-pantoo-800">Yes</td></tr>
                            <tr class="border-b border-ink-200/60"><td class="py-3 pr-4 font-medium text-ink-900">Customizable</td><td class="py-3 pr-4">Limited</td><td class="py-3 pr-4">Limited</td><td class="py-3 font-semibold text-pantoo-800">Yes</td></tr>
                            <tr><td class="py-3 pr-4 font-medium text-ink-900">No Setup Fee</td><td class="py-3 pr-4">No</td><td class="py-3 pr-4">No</td><td class="py-3 font-semibold text-pantoo-800">Yes</td></tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <section id="strategy" class="grid gap-5 lg:grid-cols-[1.1fr_0.9fr]">
                <article class="ds-panel p-7 md:p-9">
                    <span class="ds-chip">Go-to-Market Strategy</span>
                    <h3 class="mt-4 font-display text-2xl text-ink-900">Eksekusi bertahap untuk akuisisi B2B</h3>
                    <div class="mt-5 grid gap-3 md:grid-cols-3">
                        <div class="rounded-2xl border border-ink-200/70 bg-white p-4">
                            <p class="text-xs uppercase tracking-wider text-ink-500">Phase 1</p>
                            <p class="mt-2 text-sm font-semibold text-ink-900">Direct B2B Sales</p>
                            <p class="mt-1 text-xs text-ink-600">Founder-led sales, network acquisition, distribution community.</p>
                        </div>
                        <div class="rounded-2xl border border-ink-200/70 bg-white p-4">
                            <p class="text-xs uppercase tracking-wider text-ink-500">Phase 2</p>
                            <p class="mt-2 text-sm font-semibold text-ink-900">Digital Acquisition</p>
                            <p class="mt-1 text-xs text-ink-600">Meta Ads B2B, LinkedIn outreach, case study marketing.</p>
                        </div>
                        <div class="rounded-2xl border border-ink-200/70 bg-white p-4">
                            <p class="text-xs uppercase tracking-wider text-ink-500">Phase 3</p>
                            <p class="mt-2 text-sm font-semibold text-ink-900">Partnership</p>
                            <p class="mt-1 text-xs text-ink-600">Consultants, software houses, and distribution associations.</p>
                        </div>
                    </div>
                </article>
                <article class="ds-card p-7 md:p-9">
                    <span class="ds-chip">Traction & Vision</span>
                    <h3 class="mt-4 font-display text-2xl text-ink-900">Readiness saat ini dan arah jangka panjang</h3>
                    <ul class="mt-4 space-y-2 text-sm text-ink-700 md:text-base">
                        <li>- Product architecture defined</li>
                        <li>- Core feature roadmap ready</li>
                        <li>- Target pilot customer identified</li>
                        <li>- Beta testing plan QX 2026</li>
                    </ul>
                    <div class="mt-6 rounded-2xl border border-pantoo-300/70 bg-pantoo-50 p-4">
                        <p class="text-xs uppercase tracking-wider text-ink-500">Long-term Vision</p>
                        <p class="mt-2 text-sm font-semibold leading-relaxed text-ink-900">
                            Pantoo menuju posisi sebagai operational operating system untuk perusahaan distribusi Indonesia,
                            lalu berkembang ke ASEAN sebagai vertical-specific modular SaaS.
                        </p>
                    </div>
                </article>
            </section>
        </main>

        <footer class="section-shell border-t border-ink-200/70 py-6 text-sm text-ink-600">
            <div class="flex flex-wrap items-center justify-between gap-3">
                <p>© {{ date('Y') }} Pantoo. Company profile page built from Pantoo pitch deck narrative.</p>
                <p>Laravel {{ app()->version() }} · Tailwind CSS · Static-first website</p>
            </div>
        </footer>
    </div>
    <script>
        (function () {
            var key = 'pantoo-theme';
            var root = document.documentElement;
            var toggle = document.getElementById('theme-toggle');
            var label = toggle ? toggle.querySelector('[data-theme-label]') : null;

            function applyTheme(theme) {
                root.setAttribute('data-theme', theme);
                if (label) {
                    label.textContent = theme === 'dark' ? 'Dark' : 'Light';
                }
                if (toggle) {
                    toggle.setAttribute('aria-pressed', theme === 'dark' ? 'true' : 'false');
                }
            }

            function currentTheme() {
                var saved = localStorage.getItem(key);
                if (saved === 'light' || saved === 'dark') {
                    return saved;
                }

                return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
            }

            applyTheme(currentTheme());

            if (toggle) {
                toggle.addEventListener('click', function () {
                    var next = root.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
                    localStorage.setItem(key, next);
                    applyTheme(next);
                });
            }
        })();
    </script>
</body>
</html>
