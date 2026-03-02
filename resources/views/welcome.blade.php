<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pantoo | Operational Control in One Ecosystem</title>
    <meta name="description" content="Pantoo menyatukan HRMS, attendance, payroll, approval workflow, inventaris, dan distribusi multi-cabang dalam satu platform SaaS.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    {{-- Theme init (before paint) --}}
    <script>
    (function(){
        var k='pantoo-theme',s=localStorage.getItem(k);
        var t=(s==='light'||s==='dark')?s:(matchMedia('(prefers-color-scheme:dark)').matches?'dark':'light');
        document.documentElement.setAttribute('data-theme',t);
        document.documentElement.classList.toggle('dark', t === 'dark');
    })();
    </script>

    {{-- ==================== NAVIGATION ==================== --}}
    <nav class="nav-bar" id="navbar">
        <div class="mx-auto flex h-16 max-w-7xl items-center justify-between px-6 md:px-8 xl:px-10">
            {{-- Logo --}}
            <a href="#" class="flex items-center gap-2 no-underline">
                <div class="flex size-8 items-center justify-center rounded-lg bg-pantoo-600 dark:bg-pantoo-400">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
                </div>
                <span class="font-display text-xl font-bold text-ink-900 dark:text-ink-100">Pantoo</span>
            </a>

            {{-- Desktop Nav --}}
            <div class="hidden items-center gap-8 md:flex">
                <a href="#problem" class="nav-link">Problem</a>
                <a href="#solution" class="nav-link">Solution</a>
                <a href="#features" class="nav-link">Features</a>
                <a href="#market" class="nav-link">Market</a>
                <a href="#strategy" class="nav-link">Strategy</a>
            </div>

            {{-- Right Side --}}
            <div class="flex items-center gap-2">
                <button id="theme-toggle" type="button" class="theme-btn" aria-label="Toggle theme">
                    <svg id="icon-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
                    <svg id="icon-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="hidden"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
                </button>
                <a href="#solution" class="btn btn-accent hidden py-2 px-5 text-xs md:inline-flex">
                    Coba Gratis
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
                {{-- Mobile hamburger --}}
                <button class="hamburger md:hidden" id="mobile-toggle" aria-label="Menu">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
                </button>
            </div>
        </div>
    </nav>

    {{-- Mobile Menu Overlay --}}
    <div class="mobile-menu" id="mobile-menu">
        <div class="mb-8 flex items-center justify-between">
            <span class="font-display text-xl font-bold text-ink-900 dark:text-ink-100">Pantoo</span>
            <button class="hamburger" id="mobile-close" aria-label="Close menu">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>
        <a href="#problem" class="mobile-menu-link" onclick="closeMobileMenu()">Problem</a>
        <a href="#solution" class="mobile-menu-link" onclick="closeMobileMenu()">Solution</a>
        <a href="#features" class="mobile-menu-link" onclick="closeMobileMenu()">Features</a>
        <a href="#market" class="mobile-menu-link" onclick="closeMobileMenu()">Market</a>
        <a href="#strategy" class="mobile-menu-link" onclick="closeMobileMenu()">Strategy</a>
        <div class="mt-auto pt-8">
            <a href="#solution" class="btn btn-accent w-full" onclick="closeMobileMenu()">Coba Gratis</a>
        </div>
    </div>

    {{-- ==================== HERO SECTION ==================== --}}
    <section class="hero-section">
        <div class="hero-grid"></div>
        <div class="relative z-10 mx-auto max-w-7xl px-6 md:px-8 xl:px-10">
            <div class="grid grid-cols-1 items-center gap-12">
                {{-- Hero Content --}}
                <div class="fade-up text-center">
                    <div class="chip mb-6">
                        <span class="chip-dot"></span>
                        Pantoo Company Profile
                    </div>
                    <h1 class="mx-auto mb-6 font-display text-[clamp(2rem,5.5vw,3.5rem)] font-extrabold leading-[1.1] text-ink-900 dark:text-ink-100">
                        Perusahaan Anda Multi-Cabang,<br>
                        <span class="bg-gradient-to-r from-pantoo-600 to-cyan-500 bg-clip-text text-transparent">
                            Tapi Sistemnya Masih Satu Ukuran untuk Semua?
                        </span>
                    </h1>
                    <p class="mx-auto mb-8 max-w-2xl text-lg leading-relaxed text-ink-600 dark:text-ink-300">
                        Cabang Jakarta jam 8, Surabaya jam 9, Warehouse 3 shift, Marketing reguler, IT on-call.
                        Pantoo membuat setiap cabang dan divisi punya aturan sendiri, tanpa kehilangan kendali terpusat.
                    </p>
                    <div class="mb-12 flex flex-wrap items-center justify-center gap-3">
                        <a href="#solution" class="btn btn-accent">
                            Lihat Solusi Pantoo
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </a>
                        <a href="#features" class="btn btn-outline">Fitur Highlight</a>
                    </div>

                    {{-- Dashboard Mockup --}}
                    <div class="fade-up fade-up-delay-2 relative mx-auto max-w-[600px]">
                        <div class="mockup-dashboard">
                            <div class="mockup-topbar">
                                <div class="mockup-dot bg-red-500"></div>
                                <div class="mockup-dot bg-amber-500"></div>
                                <div class="mockup-dot bg-green-500"></div>
                                <div class="flex-1"></div>
                                <div class="h-2 w-[120px] rounded bg-ink-200 dark:bg-ink-700"></div>
                            </div>
                            <div class="mockup-body">
                                <div class="mockup-sidebar">
                                    <div class="mockup-sidebar-item active w-[70%]"></div>
                                    <div class="mockup-sidebar-item w-[85%]"></div>
                                    <div class="mockup-sidebar-item w-[60%]"></div>
                                    <div class="mockup-sidebar-item w-3/4"></div>
                                    <div class="mockup-sidebar-item w-1/2"></div>
                                    <div class="h-3"></div>
                                    <div class="mockup-sidebar-item w-[65%]"></div>
                                    <div class="mockup-sidebar-item w-4/5"></div>
                                </div>
                                <div class="mockup-content">
                                    <div class="mockup-stat-box"></div>
                                    <div class="mockup-stat-box"></div>
                                    <div class="mockup-stat-box"></div>
                                    <div class="mockup-chart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="mockup-phone">
                            <div class="mockup-phone-notch"></div>
                            <div class="mockup-phone-body">
                                <div class="mockup-phone-row w-[60%]"></div>
                                <div class="mockup-phone-card"></div>
                                <div class="mockup-phone-card"></div>
                                <div class="mockup-phone-row w-[45%]"></div>
                                <div class="mockup-phone-card h-10"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Stats Bar --}}
            <div class="fade-up fade-up-delay-3 mx-auto mt-12 grid max-w-2xl grid-cols-3 gap-4">
                <div class="card-flat p-5 text-center">
                    <div class="stat-value">50+</div>
                    <div class="stat-label">Template aturan kerja</div>
                </div>
                <div class="card-flat p-5 text-center">
                    <div class="stat-value">7</div>
                    <div class="stat-label">Kategori reimbursement</div>
                </div>
                <div class="card-flat p-5 text-center">
                    <div class="stat-value">24/7</div>
                    <div class="stat-label">Dedicated support</div>
                </div>
            </div>
        </div>
    </section>

    {{-- ==================== PROBLEM SECTION ==================== --}}
    <section id="problem" class="section section-alt">
        <div class="mx-auto max-w-7xl px-6 md:px-8 xl:px-10">
            <div class="fade-up mb-14 text-center">
                <div class="chip mb-4">
                    <span class="chip-dot"></span>
                    Problem Landscape
                </div>
                <h2 class="section-title mb-4">Masalah inti di distribusi & logistik hari ini</h2>
                <p class="section-subtitle mx-auto">
                    Sistem HRMS yang kaku membuat perusahaan multi-cabang tetap kerja manual lewat Excel, WhatsApp, dan file terpisah.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                <article class="card fade-up p-7">
                    <div class="feature-icon mb-4 bg-red-500/8">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
                    </div>
                    <h3 class="mb-2 text-base font-bold text-ink-900 dark:text-ink-100">Jam kerja berbeda, sistem tidak fleksibel</h3>
                    <p class="text-sm leading-relaxed text-ink-600 dark:text-ink-300">Setiap cabang & divisi punya jadwal berbeda, tapi sistem hanya mendukung satu aturan global.</p>
                </article>
                <article class="card fade-up fade-up-delay-1 p-7">
                    <div class="feature-icon mb-4 bg-amber-500/8">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                    </div>
                    <h3 class="mb-2 text-base font-bold text-ink-900 dark:text-ink-100">Payroll lintas cabang jadi mimpi buruk</h3>
                    <p class="text-sm leading-relaxed text-ink-600 dark:text-ink-300">UMR, tunjangan, dan lembur berbeda per lokasi membuat kalkulasi gaji rawan error dan telat.</p>
                </article>
                <article class="card fade-up fade-up-delay-2 p-7">
                    <div class="feature-icon mb-4 bg-violet-500/8">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#8b5cf6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    </div>
                    <h3 class="mb-2 text-base font-bold text-ink-900 dark:text-ink-100">Approval tidak sesuai struktur organisasi</h3>
                    <p class="text-sm leading-relaxed text-ink-600 dark:text-ink-300">Cuti, lembur, dan reimbursement sering lewat chat karena sistem tidak mendukung alur approval kompleks.</p>
                </article>
                <article class="card fade-up fade-up-delay-1 p-7">
                    <div class="feature-icon mb-4 bg-pink-500/8">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#ec4899" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                    </div>
                    <h3 class="mb-2 text-base font-bold text-ink-900 dark:text-ink-100">Sudah pakai HRMS, tapi masih manual</h3>
                    <p class="text-sm leading-relaxed text-ink-600 dark:text-ink-300">Presensi terbatas, payroll rigid, dan setiap perubahan harus customisasi mahal.</p>
                </article>
                <article class="card fade-up fade-up-delay-2 p-7">
                    <div class="feature-icon mb-4 bg-cyan-500/8">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#06b6d4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="4 7 4 4 20 4 20 7"/><line x1="9" y1="20" x2="15" y2="20"/><line x1="12" y1="4" x2="12" y2="20"/></svg>
                    </div>
                    <h3 class="mb-2 text-base font-bold text-ink-900 dark:text-ink-100">Data tersebar di banyak file</h3>
                    <p class="text-sm leading-relaxed text-ink-600 dark:text-ink-300">HR dan Finance masih menggabungkan data dari banyak Excel secara berulang tiap bulan.</p>
                </article>
                <article class="card fade-up fade-up-delay-3 p-7">
                    <div class="feature-icon mb-4 bg-green-500/8">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                    </div>
                    <h3 class="mb-2 text-base font-bold text-ink-900 dark:text-ink-100">Audit trail tidak lengkap</h3>
                    <p class="text-sm leading-relaxed text-ink-600 dark:text-ink-300">Pengajuan dan approval sulit ditelusuri saat dibutuhkan untuk compliance dan evaluasi.</p>
                </article>
            </div>
        </div>
    </section>

    {{-- ==================== SOLUTION SECTION ==================== --}}
    <section id="solution" class="section">
        <div class="mx-auto max-w-7xl px-6 md:px-8 xl:px-10">
            <div class="grid grid-cols-1 items-start gap-12 lg:grid-cols-2">
                {{-- Left --}}
                <div class="fade-up">
                    <div class="chip mb-5">
                        <span class="chip-dot"></span>
                        Solution
                    </div>
                    <h2 class="section-title mb-5">Tenang, ada Pantoo.</h2>
                    <p class="section-subtitle mb-8">
                        Pantoo adalah platform ERP yang dirancang agar setiap cabang dan divisi bisa punya aturan sendiri,
                        tanpa kehilangan kontrol terpusat. Semua dapat dikonfigurasi dari satu dashboard, tanpa coding.
                    </p>

                    <div class="info-banner mb-8">
                        <div class="info-banner-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        </div>
                        <p class="text-sm font-semibold text-ink-900 dark:text-ink-100">
                            Customable by design: cukup konfigurasi, bukan development berulang.
                        </p>
                    </div>
                </div>

                {{-- Right: Architecture Highlights --}}
                <div class="card fade-up fade-up-delay-2 p-8">
                    <p class="mb-5 text-xs font-bold uppercase tracking-widest text-pantoo-600 dark:text-pantoo-400">
                        Kelebihan HRMS Pantoo
                    </p>
                    <div class="divide-y divide-ink-100 dark:divide-ink-800">
                        <div class="arch-item">
                            <div class="arch-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                            </div>
                            <div>
                                <p class="text-[.9rem] font-semibold text-ink-900 dark:text-ink-100">Jam kerja dinamis per cabang & divisi</p>
                                <p class="mt-1 text-xs text-ink-500 dark:text-ink-400">Support reguler, multi-shift, on-call dengan aturan berbeda tiap unit</p>
                            </div>
                        </div>
                        <div class="arch-item">
                            <div class="arch-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                            </div>
                            <div>
                                <p class="text-[.9rem] font-semibold text-ink-900 dark:text-ink-100">Payroll mengikuti struktur bisnis Anda</p>
                                <p class="mt-1 text-xs text-ink-500 dark:text-ink-400">Komponen gaji, tunjangan, dan lembur configurable per lokasi/divisi</p>
                            </div>
                        </div>
                        <div class="arch-item">
                            <div class="arch-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                            </div>
                            <div>
                                <p class="text-[.9rem] font-semibold text-ink-900 dark:text-ink-100">Approval workflow configurable</p>
                                <p class="mt-1 text-xs text-ink-500 dark:text-ink-400">Single, sequential, parallel + delegasi otomatis</p>
                            </div>
                        </div>
                        <div class="arch-item">
                            <div class="arch-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                            </div>
                            <div>
                                <p class="text-[.9rem] font-semibold text-ink-900 dark:text-ink-100">Audit trail end-to-end</p>
                                <p class="mt-1 text-xs text-ink-500 dark:text-ink-400">Semua pengajuan dan approval tercatat serta ter-track</p>
                            </div>
                        </div>
                        <div class="arch-item">
                            <div class="arch-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                            </div>
                            <div>
                                <p class="text-[.9rem] font-semibold text-ink-900 dark:text-ink-100">Minim kebutuhan customisasi tambahan</p>
                                <p class="mt-1 text-xs text-ink-500 dark:text-ink-400">Bisnis berkembang, cabang bertambah, tinggal atur langsung jalan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ==================== FEATURES SECTION ==================== --}}
    <section id="features" class="section section-alt">
        <div class="mx-auto max-w-7xl px-6 md:px-8 xl:px-10">
            <div class="fade-up mb-14 text-center">
                <div class="chip mb-4">
                    <span class="chip-dot"></span>
                    Product Deep Dive
                </div>
                <h2 class="section-title mb-4">Satu Platform. Semua Cabang. Semua Kebutuhan.</h2>
                <p class="section-subtitle mx-auto">
                    Kelebihan HRMS Pantoo dirancang untuk operasional harian yang kompleks namun tetap mudah dikontrol.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                <article class="card fade-up p-8">
                    <div class="feature-icon mb-5 bg-pantoo-100 dark:bg-pantoo-600/15">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" class="stroke-pantoo-600 dark:stroke-pantoo-400" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    </div>
                    <h3 class="mb-2 text-base font-bold text-ink-900 dark:text-ink-100">Smart Attendance System</h3>
                    <p class="text-sm leading-relaxed text-ink-600 dark:text-ink-300">Presensi via smartphone + GPS + selfie. Support reguler, shift, on-call, WFH/WFA.</p>
                </article>

                <article class="card fade-up fade-up-delay-1 p-8">
                    <div class="feature-icon mb-5 bg-indigo-500/8">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#6366f1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                    </div>
                    <h3 class="mb-2 text-base font-bold text-ink-900 dark:text-ink-100">Flexible Payroll</h3>
                    <p class="text-sm leading-relaxed text-ink-600 dark:text-ink-300">Kalkulasi otomatis dari presensi & lembur, komponen gaji configurable per cabang.</p>
                </article>

                <article class="card fade-up fade-up-delay-2 p-8">
                    <div class="feature-icon mb-5 bg-pink-500/8">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#ec4899" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    </div>
                    <h3 class="mb-2 text-base font-bold text-ink-900 dark:text-ink-100">Configurable Approval Workflow</h3>
                    <p class="text-sm leading-relaxed text-ink-600 dark:text-ink-300">Single, sequential, atau parallel approval dengan delegasi otomatis.</p>
                </article>

                <article class="card fade-up fade-up-delay-1 p-8">
                    <div class="feature-icon mb-5 bg-amber-500/8">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
                    </div>
                    <h3 class="mb-2 text-base font-bold text-ink-900 dark:text-ink-100">Cuti, Izin & Reimbursement</h3>
                    <p class="text-sm leading-relaxed text-ink-600 dark:text-ink-300">Pengajuan digital, saldo cuti otomatis, 7 kategori reimbursement, multi-currency.</p>
                </article>

                <article class="card fade-up fade-up-delay-2 p-8">
                    <div class="feature-icon mb-5 bg-cyan-500/8">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#06b6d4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                    </div>
                    <h3 class="mb-2 text-base font-bold text-ink-900 dark:text-ink-100">Real-Time Dashboard</h3>
                    <p class="text-sm leading-relaxed text-ink-600 dark:text-ink-300">Monitoring seluruh cabang dari satu layar dengan filter cabang/divisi/periode.</p>
                </article>

                <article class="card fade-up fade-up-delay-3 p-8">
                    <div class="feature-icon mb-5 bg-violet-500/8">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#8b5cf6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                    </div>
                    <h3 class="mb-2 text-base font-bold text-ink-900 dark:text-ink-100">Inventaris & Distribusi</h3>
                    <p class="text-sm leading-relaxed text-ink-600 dark:text-ink-300">Manajemen stok multi-gudang, tracking pengiriman, terintegrasi dengan data HRMS.</p>
                </article>
            </div>
        </div>
    </section>

    {{-- ==================== MARKET & BUSINESS MODEL ==================== --}}
    <section id="market" class="section">
        <div class="mx-auto max-w-7xl px-6 md:px-8 xl:px-10">
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
                {{-- Target Market --}}
                <div class="fade-up">
                    <div class="chip mb-5">
                        <span class="chip-dot"></span>
                        Target Market & Size
                    </div>
                    <h2 class="section-title mb-5">Distribusi & logistik Indonesia sebagai pasar utama</h2>
                    <div class="mb-8 flex flex-col gap-3">
                        @foreach (['Perusahaan distribusi nasional', 'Perusahaan logistik regional', 'FMCG distributor', 'Multi-cabang retail', 'Manufacturing dengan cabang banyak'] as $item)
                        <div class="flex items-center gap-3">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" class="icon-check shrink-0" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                            <span class="text-[.925rem] text-ink-600 dark:text-ink-300">{{ $item }}</span>
                        </div>
                        @endforeach
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        @php
                        $marketSizes = [
                            ['label' => 'TAM', 'desc' => 'Seluruh distribusi & logistik Indonesia'],
                            ['label' => 'SAM', 'desc' => 'SMB tanpa sistem terintegrasi'],
                            ['label' => 'SOM', 'desc' => 'Tier 1-2, 2-20 cabang'],
                        ];
                        @endphp
                        @foreach ($marketSizes as $ms)
                        <div class="card-flat p-5 text-center">
                            <p class="mb-2 text-[.65rem] font-bold uppercase tracking-widest text-ink-400 dark:text-ink-500">{{ $ms['label'] }}</p>
                            <p class="text-xs font-semibold text-ink-900 dark:text-ink-100">{{ $ms['desc'] }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Business Model --}}
                <div class="card fade-up fade-up-delay-2 p-10">
                    <div class="chip mb-5">
                        <span class="chip-dot"></span>
                        Business Model
                    </div>
                    <h3 class="mb-6 font-display text-2xl font-bold text-ink-900 dark:text-ink-100">
                        Subscription SaaS dengan recurring revenue
                    </h3>
                    <div class="mb-8 flex flex-col gap-4">
                        @foreach ([
                            'Monthly subscription per perusahaan',
                            'Pricing: jumlah karyawan, cabang, modul aktif',
                            'Add-on modules sebagai expansion revenue',
                            'Optional custom development fee',
                        ] as $bm)
                        <div class="flex items-start gap-3">
                            <div class="mt-0.5 flex size-7 shrink-0 items-center justify-center rounded-full bg-pantoo-100 dark:bg-pantoo-600/15">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" class="stroke-pantoo-600 dark:stroke-pantoo-400" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                            </div>
                            <span class="text-[.9rem] leading-relaxed text-ink-600 dark:text-ink-300">{{ $bm }}</span>
                        </div>
                        @endforeach
                    </div>
                    <div class="info-banner">
                        <div class="info-banner-icon">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                        </div>
                        <p class="text-xs leading-relaxed text-ink-600 dark:text-ink-300">
                            <strong class="text-ink-900 dark:text-ink-100">Keunggulan model:</strong> no upfront cost, predictable recurring revenue, dan retention tinggi karena sistem menjadi core operation.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ==================== COMPETITIVE POSITIONING ==================== --}}
    <section class="section section-alt">
        <div class="mx-auto max-w-7xl px-6 md:px-8 xl:px-10">
            <div class="fade-up mb-12 text-center">
                <div class="chip mb-4">
                    <span class="chip-dot"></span>
                    Competitive Positioning
                </div>
                <h2 class="section-title mb-4">Pantoo advantage dibanding kategori solusi lain</h2>
                <p class="section-subtitle mx-auto">
                    Mapping langsung masalah nyata perusahaan multi-cabang dengan solusi HRMS Pantoo.
                </p>
            </div>

            <div class="card fade-up overflow-hidden p-0">
                <div class="overflow-x-auto">
                    <table class="compare-table min-w-[680px]">
                        <thead>
                            <tr>
                                <th>Masalah Anda</th>
                                <th class="min-w-[280px]">Solusi Pantoo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $rows = [
                                ['problem' => 'Jam kerja tiap cabang beda, sistem tidak support', 'solution' => 'Konfigurasi independen per cabang & divisi'],
                                ['problem' => 'Shift berbeda antar divisi', 'solution' => 'Reguler, multi-shift, on-call dalam satu sistem'],
                                ['problem' => 'Payroll ribet karena komponen gaji beda per lokasi', 'solution' => 'Struktur payroll configurable per cabang & divisi'],
                                ['problem' => 'Approval cuti/lembur/reimburse lewat WhatsApp', 'solution' => 'Workflow digital: single, sequential, atau parallel'],
                                ['problem' => 'Approver sedang cuti, pengajuan stuck', 'solution' => 'Delegasi approval otomatis'],
                                ['problem' => 'Sudah pakai HRMS tapi masih banyak manual', 'solution' => 'Customable by design, minim manual work'],
                                ['problem' => 'Setiap perubahan harus bayar customisasi', 'solution' => 'Konfigurasi sendiri tanpa biaya tambahan'],
                                ['problem' => 'Data tersebar di banyak Excel', 'solution' => 'Satu dashboard terpusat real-time'],
                            ];
                            @endphp
                            @foreach ($rows as $row)
                            <tr>
                                <td>{{ $row['problem'] }}</td>
                                <td class="font-semibold text-pantoo-700 dark:text-pantoo-400">{{ $row['solution'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    {{-- ==================== STRATEGY SECTION ==================== --}}
    <section id="strategy" class="section">
        <div class="mx-auto max-w-7xl px-6 md:px-8 xl:px-10">
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-2">
                {{-- Go-to-Market --}}
                <div class="fade-up">
                    <div class="chip mb-5">
                        <span class="chip-dot"></span>
                        Go-to-Market Strategy
                    </div>
                    <h2 class="section-title mb-8">Eksekusi bertahap untuk akuisisi B2B</h2>
                    <div class="flex flex-col gap-5">
                        @php
                        $phases = [
                            ['n' => '1', 'title' => 'Direct B2B Sales', 'desc' => 'Founder-led sales, network acquisition, distribution community.'],
                            ['n' => '2', 'title' => 'Digital Acquisition', 'desc' => 'Meta Ads B2B, LinkedIn outreach, case study marketing.'],
                            ['n' => '3', 'title' => 'Partnership', 'desc' => 'Consultants, software houses, and distribution associations.'],
                        ];
                        @endphp
                        @foreach ($phases as $phase)
                        <div class="phase-card">
                            <div class="flex items-start gap-4">
                                <span class="phase-number">{{ $phase['n'] }}</span>
                                <div>
                                    <h4 class="mb-1.5 text-base font-bold text-ink-900 dark:text-ink-100">{{ $phase['title'] }}</h4>
                                    <p class="text-xs leading-relaxed text-ink-600 dark:text-ink-300">{{ $phase['desc'] }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Social Proof --}}
                <div class="fade-up fade-up-delay-2">
                    <div class="chip mb-5">
                        <span class="chip-dot"></span>
                        Dibangun untuk Perusahaan yang Serius Bertumbuh
                    </div>
                    <h2 class="section-title mb-6">Social proof Pantoo</h2>
                    <div class="mb-8 flex flex-col gap-3">
                        @foreach ([
                            'Digunakan oleh perusahaan distribusi, manufaktur, dan retail chain',
                            'Mendukung 50 hingga 5.000+ karyawan',
                            'Multi-cabang tanpa batas',
                            'Private & secure — data Anda hanya milik Anda',
                            'Dedicated support 24/7',
                        ] as $traction)
                        <div class="flex items-center gap-3">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" class="icon-check shrink-0" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                            <span class="text-[.925rem] text-ink-600 dark:text-ink-300">{{ $traction }}</span>
                        </div>
                        @endforeach
                    </div>

                    <div class="card border-pantoo-600/20 bg-pantoo-50 p-7 dark:border-pantoo-400/20 dark:bg-pantoo-600/10">
                        <p class="mb-3 text-[.65rem] font-bold uppercase tracking-widest text-ink-400 dark:text-ink-500">Technology</p>
                        <p class="text-[.9rem] font-semibold leading-relaxed text-ink-900 dark:text-ink-100">
                            Teknologi modern: GraphQL, Node.js, MongoDB. Mobile-first attendance dengan GPS + selfie,
                            tanpa hardware fingerprint.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ==================== CTA SECTION ==================== --}}
    <section class="section pb-20">
        <div class="mx-auto max-w-7xl px-6 md:px-8 xl:px-10">
            <div class="cta-section fade-up">
                <h2 class="mx-auto mb-4 font-display text-[clamp(1.5rem,4vw,2.25rem)] font-bold text-white">
                    Masih mau atur perusahaan multi-cabang pakai Excel dan WhatsApp?
                </h2>
                <p class="mx-auto mb-8 max-w-xl text-base leading-relaxed text-white/80">
                    Coba Pantoo sekarang. Gratis. Tanpa ribet.
                </p>
                <a href="#solution" class="btn btn-white">
                    Coba Gratis Sekarang
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
            </div>
        </div>
    </section>

    {{-- ==================== FOOTER ==================== --}}
    <footer class="footer">
        <div class="mx-auto max-w-7xl px-6 md:px-8 xl:px-10">
            <div class="mb-8 grid grid-cols-1 gap-8 md:grid-cols-3">
                {{-- Brand --}}
                <div>
                    <div class="mb-4 flex items-center gap-2">
                        <div class="flex size-7 items-center justify-center rounded-md bg-pantoo-600 dark:bg-pantoo-400">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
                        </div>
                        <span class="font-display text-lg font-bold text-ink-900 dark:text-ink-100">Pantoo</span>
                    </div>
                    <p class="max-w-xs text-xs leading-relaxed text-ink-500 dark:text-ink-400">
                        Satu platform ERP untuk HRMS, inventaris, dan distribusi yang fleksibel mengikuti struktur bisnis Anda.
                    </p>
                </div>

                {{-- Links --}}
                <div>
                    <p class="mb-4 text-xs font-bold uppercase tracking-widest text-ink-400 dark:text-ink-500">Navigation</p>
                    <div class="flex flex-col gap-2">
                        <a href="#problem" class="footer-link">Problem</a>
                        <a href="#solution" class="footer-link">Solution</a>
                        <a href="#features" class="footer-link">Features</a>
                        <a href="#market" class="footer-link">Market</a>
                        <a href="#strategy" class="footer-link">Strategy</a>
                    </div>
                </div>

                {{-- Tech --}}
                <div>
                    <p class="mb-4 text-xs font-bold uppercase tracking-widest text-ink-400 dark:text-ink-500">Built With</p>
                    <div class="flex flex-wrap gap-2">
                        <span class="tech-badge">Laravel {{ app()->version() }}</span>
                        <span class="tech-badge">Tailwind CSS</span>
                        <span class="tech-badge">Cloud SaaS</span>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap items-center justify-between gap-4 border-t border-ink-200 pt-6 dark:border-ink-700">
                <p class="text-xs text-ink-400 dark:text-ink-500">&copy; {{ date('Y') }} Pantoo. All rights reserved.</p>
                <p class="text-xs text-ink-400 dark:text-ink-500">Company profile — Pantoo pitch deck</p>
            </div>
        </div>
    </footer>

    {{-- ==================== SCRIPTS ==================== --}}
    <script>
    (function() {
        // Theme toggle
        var key = 'pantoo-theme';
        var root = document.documentElement;
        var toggle = document.getElementById('theme-toggle');
        var iconSun = document.getElementById('icon-sun');
        var iconMoon = document.getElementById('icon-moon');

        function applyTheme(t) {
            root.setAttribute('data-theme', t);
            root.classList.toggle('dark', t === 'dark');
            if (iconSun && iconMoon) {
                iconSun.style.display = t === 'dark' ? 'none' : 'block';
                iconMoon.style.display = t === 'dark' ? 'block' : 'none';
            }
        }

        function getTheme() {
            var s = localStorage.getItem(key);
            if (s === 'light' || s === 'dark') return s;
            return matchMedia('(prefers-color-scheme:dark)').matches ? 'dark' : 'light';
        }

        applyTheme(getTheme());

        if (toggle) {
            toggle.addEventListener('click', function() {
                var next = root.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
                localStorage.setItem(key, next);
                applyTheme(next);
            });
        }

        // Mobile menu
        var mobileToggle = document.getElementById('mobile-toggle');
        var mobileClose = document.getElementById('mobile-close');
        var mobileMenu = document.getElementById('mobile-menu');

        if (mobileToggle) {
            mobileToggle.addEventListener('click', function() {
                mobileMenu.classList.add('open');
                document.body.style.overflow = 'hidden';
            });
        }

        window.closeMobileMenu = function() {
            mobileMenu.classList.remove('open');
            document.body.style.overflow = '';
        };

        if (mobileClose) {
            mobileClose.addEventListener('click', window.closeMobileMenu);
        }

        // Navbar scroll shadow
        var navbar = document.getElementById('navbar');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 10) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        }, { passive: true });

        // Scroll animations (Intersection Observer)
        var fadeEls = document.querySelectorAll('.fade-up');
        if ('IntersectionObserver' in window) {
            var obs = new IntersectionObserver(function(entries) {
                entries.forEach(function(e) {
                    if (e.isIntersecting) {
                        e.target.classList.add('visible');
                        obs.unobserve(e.target);
                    }
                });
            }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

            fadeEls.forEach(function(el) { obs.observe(el); });
        } else {
            fadeEls.forEach(function(el) { el.classList.add('visible'); });
        }
    })();
    </script>
</body>
</html>
