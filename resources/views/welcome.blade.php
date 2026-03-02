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
                <a href="#platform" class="transition hover:text-pantoo-800">Platform</a>
                <a href="#benefit" class="transition hover:text-pantoo-800">Benefit</a>
                <a href="#approach" class="transition hover:text-pantoo-800">Approach</a>
            </div>
            <button id="theme-toggle" type="button" class="theme-toggle" aria-label="Toggle dark and light mode" aria-pressed="false">
                <span class="theme-toggle-dot" aria-hidden="true"></span>
                <span data-theme-label>Light</span>
            </button>
        </nav>

        <main class="section-shell mt-10 space-y-16 md:mt-14 md:space-y-20">
            <section class="grid items-start gap-8 lg:grid-cols-[1.2fr_0.8fr]">
                <div class="space-y-6 reveal reveal-2">
                    <span class="ds-chip">Operational Control in One Ecosystem</span>
                    <h1 class="ds-title max-w-3xl text-ink-900">
                        HRIS + Distribusi untuk perusahaan multi-cabang, dalam satu platform yang solid.
                    </h1>
                    <p class="max-w-2xl text-base leading-relaxed text-ink-600 md:text-lg">
                        Pantoo dirancang untuk tim distribusi dan logistik yang butuh kontrol operasional yang rapi,
                        data terhubung antar cabang, serta fondasi compliance yang siap berkembang.
                    </p>
                    <div class="flex flex-wrap items-center gap-3">
                        <a href="#platform" class="btn-primary">Lihat Struktur Platform</a>
                        <a href="#approach" class="btn-secondary">Tentang Pendekatan Pantoo</a>
                    </div>
                </div>

                <aside class="ds-panel p-6 reveal reveal-3">
                    <p class="text-xs font-semibold uppercase tracking-[0.18em] text-ink-500">Control Snapshot</p>
                    <div class="mt-5 grid grid-cols-3 gap-3">
                        <div class="rounded-2xl border border-ink-200/80 bg-white p-3">
                            <p class="text-xs text-ink-500">Data Layer</p>
                            <p class="mt-2 text-2xl font-bold text-ink-900">1</p>
                        </div>
                        <div class="rounded-2xl border border-ink-200/80 bg-white p-3">
                            <p class="text-xs text-ink-500">Cabang</p>
                            <p class="mt-2 text-2xl font-bold text-ink-900">N+</p>
                        </div>
                        <div class="rounded-2xl border border-ink-200/80 bg-white p-3">
                            <p class="text-xs text-ink-500">Sistem</p>
                            <p class="mt-2 text-2xl font-bold text-ink-900">2 in 1</p>
                        </div>
                    </div>
                    <div class="mt-5 rounded-2xl border border-pantoo-300/70 bg-pantoo-50 p-4 text-sm leading-relaxed text-ink-700">
                        Arah awal web ini dibuat statis agar pesan produk dan identitas brand Pantoo sudah konsisten
                        sebelum fitur aplikasi dibuka bertahap.
                    </div>
                </aside>
            </section>

            <section id="platform" class="space-y-6">
                <div class="max-w-2xl space-y-3">
                    <span class="ds-chip">Platform Essentials</span>
                    <h2 class="font-display text-2xl text-ink-900 md:text-3xl">Fondasi produk untuk operasi harian yang terukur</h2>
                </div>
                <div class="grid gap-4 md:grid-cols-3">
                    <article class="ds-card p-5">
                        <p class="text-xs font-semibold uppercase tracking-[0.16em] text-pantoo-800">Connected HRIS</p>
                        <h3 class="mt-3 text-lg font-bold text-ink-900">Data SDM terhubung dengan operasional</h3>
                        <p class="mt-2 text-sm leading-relaxed text-ink-600">
                            Struktur karyawan, shift, dan presensi tidak berdiri sendiri, tapi langsung terkoneksi ke aktivitas cabang.
                        </p>
                    </article>
                    <article class="ds-card p-5">
                        <p class="text-xs font-semibold uppercase tracking-[0.16em] text-pantoo-800">Distribution Ops</p>
                        <h3 class="mt-3 text-lg font-bold text-ink-900">Kontrol distribusi lintas cabang</h3>
                        <p class="mt-2 text-sm leading-relaxed text-ink-600">
                            Cocok untuk model bisnis yang berkembang dari satu kota ke banyak cabang dengan kebutuhan kontrol konsisten.
                        </p>
                    </article>
                    <article class="ds-card p-5">
                        <p class="text-xs font-semibold uppercase tracking-[0.16em] text-pantoo-800">Compliance Layer</p>
                        <h3 class="mt-3 text-lg font-bold text-ink-900">Presensi dan jejak aktivitas lebih valid</h3>
                        <p class="mt-2 text-sm leading-relaxed text-ink-600">
                            Mendorong proses attendance yang lebih akurat untuk menekan manipulasi dan meningkatkan disiplin operasional.
                        </p>
                    </article>
                </div>
            </section>

            <section id="benefit" class="grid gap-5 lg:grid-cols-2">
                <article class="ds-panel p-6 md:p-7">
                    <span class="ds-chip">Untuk Manajemen</span>
                    <h3 class="mt-4 font-display text-2xl text-ink-900">Satu dashboard untuk keputusan yang lebih cepat</h3>
                    <p class="mt-3 text-sm leading-relaxed text-ink-600 md:text-base">
                        Saat data HR dan distribusi menyatu, tim manajemen bisa melihat kondisi cabang tanpa menunggu rekap manual
                        dari sistem yang terpisah.
                    </p>
                    <ul class="mt-5 space-y-2 text-sm text-ink-700">
                        <li>- kontrol performa cabang dalam satu alur</li>
                        <li>- standar proses lebih konsisten antar tim</li>
                        <li>- kesiapan scale-up lebih terstruktur</li>
                    </ul>
                </article>
                <article class="ds-card p-6 md:p-7">
                    <span class="ds-chip">Untuk Operasional</span>
                    <h3 class="mt-4 font-display text-2xl text-ink-900">Proses lebih rapi, supervisi lebih ringan</h3>
                    <p class="mt-3 text-sm leading-relaxed text-ink-600 md:text-base">
                        Tim operasional mendapat alur kerja yang lebih jelas untuk attendance, koordinasi cabang,
                        dan monitoring aktivitas lapangan.
                    </p>
                    <div class="mt-5 grid gap-3 sm:grid-cols-2">
                        <div class="rounded-2xl border border-ink-200/70 bg-ink-50/60 p-4">
                            <p class="text-xs uppercase tracking-wider text-ink-500">Attendance</p>
                            <p class="mt-1 text-sm font-semibold text-ink-900">Lebih akuntabel</p>
                        </div>
                        <div class="rounded-2xl border border-ink-200/70 bg-ink-50/60 p-4">
                            <p class="text-xs uppercase tracking-wider text-ink-500">Cabang</p>
                            <p class="mt-1 text-sm font-semibold text-ink-900">Lebih terkontrol</p>
                        </div>
                    </div>
                </article>
            </section>

            <section id="approach" class="ds-card p-6 md:p-8">
                <div class="flex flex-wrap items-start justify-between gap-4">
                    <div class="max-w-2xl">
                        <span class="ds-chip">Implementation Approach</span>
                        <h2 class="mt-3 font-display text-2xl text-ink-900 md:text-3xl">Build clean foundation first, then scale feature by feature</h2>
                        <p class="mt-3 text-sm leading-relaxed text-ink-600 md:text-base">
                            Versi saat ini sengaja dibuat fokus ke company profile dan identitas brand. Tahap berikutnya bisa
                            melanjutkan modul produk secara terarah dengan design system yang sama.
                        </p>
                    </div>
                    <a href="#" class="btn-primary">Masuk Fase Selanjutnya</a>
                </div>
            </section>
        </main>

        <footer class="section-shell mt-14 border-t border-ink-200/70 pt-6 text-sm text-ink-600">
            <div class="flex flex-wrap items-center justify-between gap-3">
                <p>© {{ date('Y') }} Pantoo. Static company profile phase.</p>
                <p>Built with Laravel {{ app()->version() }} + Tailwind CSS</p>
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
