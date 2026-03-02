<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pantoo | Operational Control in One Ecosystem</title>
    <meta name="description" content="Pantoo menyatukan HRIS, attendance, dan operasional distribusi multi-cabang dalam satu platform SaaS.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Sora:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @php($hasVite = file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @if ($hasVite)
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif
    <style>
        :root {
            --c-bg: #ffffff;
            --c-bg-alt: #f8fafb;
            --c-bg-hero: linear-gradient(135deg, #f0fdf9 0%, #ecfdf5 30%, #f0f9ff 70%, #faf5ff 100%);
            --c-surface: #ffffff;
            --c-surface-hover: #f8fafb;
            --c-border: #e5e7eb;
            --c-border-light: #f3f4f6;
            --c-text-primary: #111827;
            --c-text-secondary: #4b5563;
            --c-text-tertiary: #6b7280;
            --c-text-muted: #9ca3af;
            --c-accent: #0d9488;
            --c-accent-dark: #0f766e;
            --c-accent-light: #ccfbf1;
            --c-accent-bg: #f0fdfa;
            --c-green-check: #10b981;
            --c-nav-bg: rgba(255,255,255,.82);
            --c-card-shadow: 0 1px 3px rgba(0,0,0,.06), 0 6px 16px -4px rgba(0,0,0,.08);
            --c-card-shadow-hover: 0 4px 12px rgba(0,0,0,.08), 0 16px 40px -8px rgba(0,0,0,.12);
            --font-body: 'Inter', ui-sans-serif, system-ui, -apple-system, sans-serif;
            --font-display: 'Sora', ui-sans-serif, system-ui, -apple-system, sans-serif;
        }

        html[data-theme='dark'] {
            --c-bg: #0b0f19;
            --c-bg-alt: #111827;
            --c-bg-hero: linear-gradient(135deg, #0b0f19 0%, #0d1525 30%, #0f172a 70%, #111320 100%);
            --c-surface: #1f2937;
            --c-surface-hover: #374151;
            --c-border: #374151;
            --c-border-light: #1f2937;
            --c-text-primary: #f9fafb;
            --c-text-secondary: #d1d5db;
            --c-text-tertiary: #9ca3af;
            --c-text-muted: #6b7280;
            --c-accent: #2dd4bf;
            --c-accent-dark: #14b8a6;
            --c-accent-light: rgba(13,148,136,.15);
            --c-accent-bg: rgba(13,148,136,.08);
            --c-green-check: #34d399;
            --c-nav-bg: rgba(11,15,25,.82);
            --c-card-shadow: 0 1px 3px rgba(0,0,0,.3), 0 6px 16px -4px rgba(0,0,0,.4);
            --c-card-shadow-hover: 0 4px 12px rgba(0,0,0,.35), 0 16px 40px -8px rgba(0,0,0,.5);
            color-scheme: dark;
        }

        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body {
            margin: 0;
            min-height: 100vh;
            font-family: var(--font-body);
            color: var(--c-text-primary);
            background: var(--c-bg);
            -webkit-font-smoothing: antialiased;
        }

        .font-display { font-family: var(--font-display); }

        /* Layout */
        .container-main {
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }
        @media (min-width: 768px) { .container-main { padding: 0 2rem; } }
        @media (min-width: 1280px) { .container-main { padding: 0 2.5rem; } }

        /* Navigation */
        .nav-bar {
            position: sticky; top: 0; z-index: 100;
            background: var(--c-nav-bg);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            border-bottom: 1px solid var(--c-border);
            transition: background .3s, box-shadow .3s;
        }
        .nav-bar.scrolled { box-shadow: 0 1px 12px rgba(0,0,0,.06); }
        .nav-link {
            font-size: .875rem; font-weight: 500;
            color: var(--c-text-tertiary);
            text-decoration: none;
            padding: .5rem 0;
            position: relative;
            transition: color .2s;
        }
        .nav-link:hover, .nav-link.active { color: var(--c-accent); }
        .nav-link::after {
            content: ''; position: absolute; bottom: -.25rem; left: 0; right: 0;
            height: 2px; background: var(--c-accent);
            transform: scaleX(0); transition: transform .25s;
        }
        .nav-link:hover::after, .nav-link.active::after { transform: scaleX(1); }

        /* Buttons */
        .btn {
            display: inline-flex; align-items: center; justify-content: center; gap: .5rem;
            font-family: var(--font-body);
            font-size: .9rem; font-weight: 600;
            padding: .75rem 1.75rem;
            border-radius: .75rem;
            border: none;
            cursor: pointer;
            text-decoration: none;
            transition: all .25s ease;
        }
        .btn-accent {
            background: var(--c-accent); color: #fff;
            box-shadow: 0 2px 8px rgba(13,148,136,.25);
        }
        .btn-accent:hover {
            background: var(--c-accent-dark);
            box-shadow: 0 4px 16px rgba(13,148,136,.35);
            transform: translateY(-1px);
        }
        .btn-outline {
            background: transparent;
            color: var(--c-text-primary);
            border: 1.5px solid var(--c-border);
        }
        .btn-outline:hover {
            border-color: var(--c-accent);
            color: var(--c-accent);
            transform: translateY(-1px);
        }

        /* Chip / Badge */
        .chip {
            display: inline-flex; align-items: center; gap: .375rem;
            font-size: .75rem; font-weight: 600;
            letter-spacing: .04em;
            text-transform: uppercase;
            padding: .375rem .875rem;
            border-radius: 999px;
            background: var(--c-accent-light);
            color: var(--c-accent);
            border: 1px solid rgba(13,148,136,.2);
        }
        .chip-dot {
            width: 6px; height: 6px; border-radius: 50%;
            background: var(--c-accent);
        }

        /* Card */
        .card {
            background: var(--c-surface);
            border: 1px solid var(--c-border);
            border-radius: 1rem;
            box-shadow: var(--c-card-shadow);
            transition: all .3s ease;
        }
        .card:hover {
            box-shadow: var(--c-card-shadow-hover);
            transform: translateY(-2px);
        }
        .card-flat {
            background: var(--c-surface);
            border: 1px solid var(--c-border);
            border-radius: 1rem;
        }

        /* Hero */
        .hero-section {
            position: relative;
            background: var(--c-bg-hero);
            overflow: hidden;
            padding: 5rem 0 4rem;
        }
        @media (min-width: 768px) { .hero-section { padding: 6rem 0 5rem; } }
        .hero-section::before {
            content: '';
            position: absolute;
            top: -50%; right: -20%;
            width: 800px; height: 800px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(13,148,136,.08) 0%, transparent 70%);
            pointer-events: none;
        }
        .hero-section::after {
            content: '';
            position: absolute;
            bottom: -30%; left: -10%;
            width: 600px; height: 600px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(99,102,241,.06) 0%, transparent 70%);
            pointer-events: none;
        }
        .hero-grid {
            position: absolute; inset: 0;
            background-image:
                linear-gradient(to right, rgba(13,148,136,.03) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(13,148,136,.03) 1px, transparent 1px);
            background-size: 64px 64px;
            pointer-events: none;
        }

        /* Feature icon box */
        .feature-icon {
            width: 48px; height: 48px;
            border-radius: .75rem;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.4rem;
            flex-shrink: 0;
        }

        /* Stat card */
        .stat-card {
            text-align: center;
            padding: 1.5rem 1rem;
        }
        .stat-value {
            font-family: var(--font-display);
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--c-accent);
        }
        .stat-label {
            font-size: .8rem;
            color: var(--c-text-tertiary);
            margin-top: .25rem;
        }

        /* Section */
        .section { padding: 5rem 0; }
        .section-alt { background: var(--c-bg-alt); }
        .section-title {
            font-family: var(--font-display);
            font-size: clamp(1.75rem, 4vw, 2.5rem);
            font-weight: 700;
            line-height: 1.2;
            color: var(--c-text-primary);
        }
        .section-subtitle {
            font-size: 1.05rem;
            line-height: 1.7;
            color: var(--c-text-secondary);
            max-width: 640px;
        }

        /* Comparison table */
        .compare-table { width: 100%; border-collapse: collapse; }
        .compare-table th, .compare-table td {
            padding: 1rem 1.25rem;
            text-align: left;
            font-size: .875rem;
            border-bottom: 1px solid var(--c-border);
        }
        .compare-table thead th {
            font-size: .75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .06em;
            color: var(--c-text-muted);
            background: var(--c-bg-alt);
        }
        .compare-table thead th:last-child {
            color: var(--c-accent);
        }
        .compare-table td { color: var(--c-text-secondary); }
        .compare-table td:first-child { font-weight: 600; color: var(--c-text-primary); }
        .compare-table td:last-child { color: var(--c-accent); font-weight: 600; }
        .compare-table tr:last-child td { border-bottom: none; }

        /* Phase timeline */
        .phase-card {
            position: relative;
            padding: 1.5rem;
            border-radius: 1rem;
            background: var(--c-surface);
            border: 1px solid var(--c-border);
        }
        .phase-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px; height: 32px;
            border-radius: 50%;
            background: var(--c-accent);
            color: #fff;
            font-size: .8rem;
            font-weight: 700;
        }

        /* CTA section */
        .cta-section {
            background: linear-gradient(135deg, #0f766e 0%, #0d9488 50%, #14b8a6 100%);
            border-radius: 1.5rem;
            padding: 4rem 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .cta-section::before {
            content: '';
            position: absolute;
            top: -50%; right: -20%;
            width: 500px; height: 500px;
            border-radius: 50%;
            background: rgba(255,255,255,.06);
            pointer-events: none;
        }

        /* Scroll animation */
        .fade-up {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity .7s ease, transform .7s ease;
        }
        .fade-up.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .fade-up-delay-1 { transition-delay: .1s; }
        .fade-up-delay-2 { transition-delay: .2s; }
        .fade-up-delay-3 { transition-delay: .3s; }
        .fade-up-delay-4 { transition-delay: .4s; }
        .fade-up-delay-5 { transition-delay: .5s; }

        /* Mockup placeholder */
        .mockup-container {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .mockup-dashboard {
            width: 100%;
            max-width: 520px;
            aspect-ratio: 4/3;
            border-radius: 1rem;
            background: var(--c-surface);
            border: 1px solid var(--c-border);
            box-shadow: 0 25px 60px -12px rgba(0,0,0,.15);
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }
        .mockup-topbar {
            height: 36px;
            background: var(--c-bg-alt);
            border-bottom: 1px solid var(--c-border);
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 0 12px;
        }
        .mockup-dot {
            width: 10px; height: 10px;
            border-radius: 50%;
        }
        .mockup-body {
            flex: 1;
            display: grid;
            grid-template-columns: 180px 1fr;
            gap: 0;
        }
        @media (max-width: 640px) {
            .mockup-body { grid-template-columns: 1fr; }
            .mockup-sidebar { display: none; }
        }
        .mockup-sidebar {
            border-right: 1px solid var(--c-border);
            padding: 16px 12px;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }
        .mockup-sidebar-item {
            height: 10px;
            border-radius: 4px;
            background: var(--c-border);
        }
        .mockup-sidebar-item.active {
            background: var(--c-accent);
            opacity: .5;
        }
        .mockup-content {
            padding: 16px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: auto 1fr;
            gap: 10px;
        }
        .mockup-stat-box {
            height: 48px;
            border-radius: 8px;
            background: var(--c-accent-bg);
            border: 1px solid rgba(13,148,136,.12);
        }
        .mockup-chart {
            grid-column: 1 / -1;
            height: 100%;
            min-height: 80px;
            border-radius: 8px;
            background: var(--c-bg-alt);
            border: 1px solid var(--c-border);
            position: relative;
            overflow: hidden;
        }
        .mockup-chart::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0; right: 0;
            height: 60%;
            background: linear-gradient(to top, rgba(13,148,136,.08), transparent);
        }

        /* Mobile phone mockup */
        .mockup-phone {
            position: absolute;
            right: -20px;
            bottom: -10px;
            width: 130px;
            height: 240px;
            border-radius: 20px;
            background: var(--c-surface);
            border: 2px solid var(--c-border);
            box-shadow: 0 20px 40px -8px rgba(0,0,0,.18);
            display: flex;
            flex-direction: column;
            overflow: hidden;
            z-index: 2;
        }
        @media (max-width: 640px) {
            .mockup-phone {
                width: 100px; height: 180px;
                right: -10px; bottom: -5px;
                border-radius: 14px;
            }
        }
        .mockup-phone-notch {
            width: 50%; height: 6px;
            margin: 6px auto 0;
            border-radius: 0 0 6px 6px;
            background: var(--c-border);
        }
        .mockup-phone-body {
            flex: 1;
            padding: 8px;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }
        .mockup-phone-row {
            height: 8px;
            border-radius: 3px;
            background: var(--c-border);
        }
        .mockup-phone-card {
            height: 28px;
            border-radius: 6px;
            background: var(--c-accent-bg);
            border: 1px solid rgba(13,148,136,.12);
        }

        /* Theme toggle */
        .theme-btn {
            width: 38px; height: 38px;
            border-radius: .625rem;
            border: 1px solid var(--c-border);
            background: var(--c-surface);
            color: var(--c-text-tertiary);
            display: flex; align-items: center; justify-content: center;
            cursor: pointer;
            transition: all .2s;
        }
        .theme-btn:hover {
            border-color: var(--c-accent);
            color: var(--c-accent);
        }
        .theme-btn svg { width: 18px; height: 18px; }

        /* Mobile menu */
        .mobile-menu {
            position: fixed; top: 0; left: 0; right: 0; bottom: 0;
            z-index: 200;
            background: var(--c-bg);
            padding: 1.5rem;
            display: none;
            flex-direction: column;
        }
        .mobile-menu.open { display: flex; }
        .mobile-menu-link {
            display: block;
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--c-text-primary);
            text-decoration: none;
            padding: 1rem 0;
            border-bottom: 1px solid var(--c-border);
            transition: color .2s;
        }
        .mobile-menu-link:hover { color: var(--c-accent); }

        /* Hamburger */
        .hamburger {
            width: 38px; height: 38px;
            border-radius: .625rem;
            border: 1px solid var(--c-border);
            background: var(--c-surface);
            color: var(--c-text-primary);
            display: flex; align-items: center; justify-content: center;
            cursor: pointer;
        }

        /* Architecture list */
        .arch-item {
            display: flex;
            align-items: flex-start;
            gap: .75rem;
            padding: .75rem 0;
        }
        .arch-icon {
            width: 24px; height: 24px;
            border-radius: 50%;
            background: var(--c-accent-light);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
            margin-top: 2px;
        }
        .arch-icon svg { width: 12px; height: 12px; color: var(--c-accent); }

        /* Info banner */
        .info-banner {
            background: var(--c-accent-bg);
            border: 1px solid rgba(13,148,136,.15);
            border-radius: .75rem;
            padding: 1rem 1.25rem;
            display: flex;
            align-items: center;
            gap: .75rem;
        }
        .info-banner-icon {
            width: 32px; height: 32px;
            border-radius: 50%;
            background: var(--c-accent);
            color: #fff;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }

        /* Footer */
        .footer {
            border-top: 1px solid var(--c-border);
            padding: 3rem 0 2rem;
            background: var(--c-bg);
        }
    </style>
</head>
<body>
    <!-- Theme init (before paint) -->
    <script>
    (function(){
        var k='pantoo-theme',s=localStorage.getItem(k);
        var t=(s==='light'||s==='dark')?s:(matchMedia('(prefers-color-scheme:dark)').matches?'dark':'light');
        document.documentElement.setAttribute('data-theme',t);
    })();
    </script>

    <!-- ==================== NAVIGATION ==================== -->
    <nav class="nav-bar" id="navbar">
        <div class="container-main" style="display:flex;align-items:center;justify-content:space-between;height:64px;">
            <!-- Logo -->
            <a href="#" style="text-decoration:none;display:flex;align-items:center;gap:.5rem;">
                <div style="width:32px;height:32px;border-radius:.5rem;background:var(--c-accent);display:flex;align-items:center;justify-content:center;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
                </div>
                <span class="font-display" style="font-size:1.25rem;font-weight:700;color:var(--c-text-primary);">Pantoo</span>
            </a>

            <!-- Desktop Nav -->
            <div style="display:flex;align-items:center;gap:2rem;" class="hidden md:flex">
                <a href="#problem" class="nav-link">Problem</a>
                <a href="#solution" class="nav-link">Solution</a>
                <a href="#features" class="nav-link">Features</a>
                <a href="#market" class="nav-link">Market</a>
                <a href="#strategy" class="nav-link">Strategy</a>
            </div>

            <!-- Right Side -->
            <div style="display:flex;align-items:center;gap:.5rem;">
                <button id="theme-toggle" type="button" class="theme-btn" aria-label="Toggle theme">
                    <svg id="icon-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
                    <svg id="icon-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:none;"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
                </button>
                <a href="#solution" class="btn btn-accent hidden md:inline-flex" style="padding:.5rem 1.25rem;font-size:.8rem;">
                    Explore Platform
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
                <!-- Mobile hamburger -->
                <button class="hamburger md:hidden" id="mobile-toggle" aria-label="Menu">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu Overlay -->
    <div class="mobile-menu" id="mobile-menu">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:2rem;">
            <span class="font-display" style="font-size:1.25rem;font-weight:700;color:var(--c-text-primary);">Pantoo</span>
            <button class="hamburger" id="mobile-close" aria-label="Close menu">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>
        <a href="#problem" class="mobile-menu-link" onclick="closeMobileMenu()">Problem</a>
        <a href="#solution" class="mobile-menu-link" onclick="closeMobileMenu()">Solution</a>
        <a href="#features" class="mobile-menu-link" onclick="closeMobileMenu()">Features</a>
        <a href="#market" class="mobile-menu-link" onclick="closeMobileMenu()">Market</a>
        <a href="#strategy" class="mobile-menu-link" onclick="closeMobileMenu()">Strategy</a>
        <div style="margin-top:auto;padding-top:2rem;">
            <a href="#solution" class="btn btn-accent" style="width:100%;" onclick="closeMobileMenu()">Explore Platform</a>
        </div>
    </div>

    <!-- ==================== HERO SECTION ==================== -->
    <section class="hero-section">
        <div class="hero-grid"></div>
        <div class="container-main" style="position:relative;z-index:1;">
            <div style="display:grid;grid-template-columns:1fr;gap:3rem;align-items:center;">
                <!-- Hero Content -->
                <div style="text-align:center;" class="fade-up">
                    <div class="chip" style="margin-bottom:1.5rem;">
                        <span class="chip-dot"></span>
                        Pantoo Company Profile
                    </div>
                    <h1 class="font-display" style="font-size:clamp(2rem,5.5vw,3.5rem);font-weight:800;line-height:1.1;color:var(--c-text-primary);margin:0 0 1.5rem;">
                        Operational Control<br>
                        <span style="background:linear-gradient(135deg,var(--c-accent),#06b6d4);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">
                            dalam Satu Ecosystem
                        </span>
                    </h1>
                    <p style="font-size:1.125rem;line-height:1.8;color:var(--c-text-secondary);max-width:640px;margin:0 auto 2rem;">
                        Pantoo menggabungkan HRIS, attendance, dan sistem distribusi multi-cabang dalam satu platform SaaS.
                        Keputusan lebih cepat, kontrol lebih rapi, biaya software lebih efisien.
                    </p>
                    <div style="display:flex;flex-wrap:wrap;gap:.75rem;justify-content:center;margin-bottom:3rem;">
                        <a href="#solution" class="btn btn-accent">
                            Explore Platform
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </a>
                        <a href="#market" class="btn btn-outline">Market & Business Model</a>
                    </div>

                    <!-- Dashboard Mockup -->
                    <div class="mockup-container fade-up fade-up-delay-2" style="max-width:600px;margin:0 auto;">
                        <div class="mockup-dashboard">
                            <div class="mockup-topbar">
                                <div class="mockup-dot" style="background:#ef4444;"></div>
                                <div class="mockup-dot" style="background:#f59e0b;"></div>
                                <div class="mockup-dot" style="background:#22c55e;"></div>
                                <div style="flex:1;"></div>
                                <div style="height:8px;width:120px;border-radius:4px;background:var(--c-border);"></div>
                            </div>
                            <div class="mockup-body">
                                <div class="mockup-sidebar">
                                    <div class="mockup-sidebar-item active" style="width:70%;"></div>
                                    <div class="mockup-sidebar-item" style="width:85%;"></div>
                                    <div class="mockup-sidebar-item" style="width:60%;"></div>
                                    <div class="mockup-sidebar-item" style="width:75%;"></div>
                                    <div class="mockup-sidebar-item" style="width:50%;"></div>
                                    <div style="height:12px;"></div>
                                    <div class="mockup-sidebar-item" style="width:65%;"></div>
                                    <div class="mockup-sidebar-item" style="width:80%;"></div>
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
                                <div class="mockup-phone-row" style="width:60%;"></div>
                                <div class="mockup-phone-card"></div>
                                <div class="mockup-phone-card"></div>
                                <div class="mockup-phone-row" style="width:45%;"></div>
                                <div class="mockup-phone-card" style="height:40px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Bar -->
            <div class="fade-up fade-up-delay-3" style="display:grid;grid-template-columns:repeat(3,1fr);gap:1rem;margin-top:3rem;max-width:640px;margin-left:auto;margin-right:auto;">
                <div class="card-flat stat-card">
                    <div class="stat-value">SaaS</div>
                    <div class="stat-label">Business Model</div>
                </div>
                <div class="card-flat stat-card">
                    <div class="stat-value">Multi</div>
                    <div class="stat-label">Branch Focus</div>
                </div>
                <div class="card-flat stat-card">
                    <div class="stat-value">2026</div>
                    <div class="stat-label">Go Live Plan</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== PROBLEM SECTION ==================== -->
    <section id="problem" class="section section-alt">
        <div class="container-main">
            <div style="text-align:center;margin-bottom:3.5rem;" class="fade-up">
                <div class="chip" style="margin-bottom:1rem;">
                    <span class="chip-dot"></span>
                    Problem Landscape
                </div>
                <h2 class="section-title" style="margin:0 0 1rem;">Masalah inti di distribusi & logistik hari ini</h2>
                <p class="section-subtitle" style="margin:0 auto;">
                    Sebagian besar perusahaan masih menggunakan software terpisah untuk HR dan operasional distribusi,
                    sehingga data lambat, biaya tinggi, dan kontrol cabang tidak konsisten.
                </p>
            </div>

            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:1.25rem;">
                <article class="card fade-up" style="padding:1.75rem;">
                    <div class="feature-icon" style="background:rgba(239,68,68,.08);margin-bottom:1rem;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
                    </div>
                    <h3 style="font-size:1rem;font-weight:700;color:var(--c-text-primary);margin:0 0 .5rem;">Sistem terfragmentasi</h3>
                    <p style="font-size:.875rem;line-height:1.7;color:var(--c-text-secondary);margin:0;">HRIS dan distribusi tidak berbagi data real-time, menyebabkan keputusan lambat.</p>
                </article>
                <article class="card fade-up fade-up-delay-1" style="padding:1.75rem;">
                    <div class="feature-icon" style="background:rgba(245,158,11,.08);margin-bottom:1rem;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                    </div>
                    <h3 style="font-size:1rem;font-weight:700;color:var(--c-text-primary);margin:0 0 .5rem;">Kontrol cabang lemah</h3>
                    <p style="font-size:.875rem;line-height:1.7;color:var(--c-text-secondary);margin:0;">Standar proses antar cabang sulit dijaga saat scale-up.</p>
                </article>
                <article class="card fade-up fade-up-delay-2" style="padding:1.75rem;">
                    <div class="feature-icon" style="background:rgba(139,92,246,.08);margin-bottom:1rem;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#8b5cf6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    </div>
                    <h3 style="font-size:1rem;font-weight:700;color:var(--c-text-primary);margin:0 0 .5rem;">Compliance berisiko</h3>
                    <p style="font-size:.875rem;line-height:1.7;color:var(--c-text-secondary);margin:0;">Attendance lapangan rentan manipulasi dan sulit diaudit.</p>
                </article>
                <article class="card fade-up fade-up-delay-1" style="padding:1.75rem;">
                    <div class="feature-icon" style="background:rgba(236,72,153,.08);margin-bottom:1rem;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#ec4899" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                    </div>
                    <h3 style="font-size:1rem;font-weight:700;color:var(--c-text-primary);margin:0 0 .5rem;">Cost structure tidak efisien</h3>
                    <p style="font-size:.875rem;line-height:1.7;color:var(--c-text-secondary);margin:0;">Dua lisensi, dua vendor, plus biaya integrasi manual.</p>
                </article>
                <article class="card fade-up fade-up-delay-2" style="padding:1.75rem;">
                    <div class="feature-icon" style="background:rgba(6,182,212,.08);margin-bottom:1rem;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#06b6d4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="4 7 4 4 20 4 20 7"/><line x1="9" y1="20" x2="15" y2="20"/><line x1="12" y1="4" x2="12" y2="20"/></svg>
                    </div>
                    <h3 style="font-size:1rem;font-weight:700;color:var(--c-text-primary);margin:0 0 .5rem;">Fleksibilitas rendah</h3>
                    <p style="font-size:.875rem;line-height:1.7;color:var(--c-text-secondary);margin:0;">Banyak solusi tidak cocok dengan SOP unik perusahaan.</p>
                </article>
                <article class="card fade-up fade-up-delay-3" style="padding:1.75rem;">
                    <div class="feature-icon" style="background:rgba(34,197,94,.08);margin-bottom:1rem;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                    </div>
                    <h3 style="font-size:1rem;font-weight:700;color:var(--c-text-primary);margin:0 0 .5rem;">Gap pasar masih terbuka</h3>
                    <p style="font-size:.875rem;line-height:1.7;color:var(--c-text-secondary);margin:0;">Belum banyak platform yang benar-benar all-in-one.</p>
                </article>
            </div>
        </div>
    </section>

    <!-- ==================== SOLUTION SECTION ==================== -->
    <section id="solution" class="section">
        <div class="container-main">
            <div style="display:grid;grid-template-columns:1fr;gap:3rem;align-items:start;" class="lg:grid-cols-2">
                <!-- Left -->
                <div class="fade-up">
                    <div class="chip" style="margin-bottom:1.25rem;">
                        <span class="chip-dot"></span>
                        Solution
                    </div>
                    <h2 class="section-title" style="margin:0 0 1.25rem;">One ecosystem.<br>One source of operational truth.</h2>
                    <p class="section-subtitle" style="margin:0 0 2rem;">
                        Pantoo adalah cloud SaaS yang mengintegrasikan HRIS lengkap, attendance & shift management,
                        operasional distribusi, tracking BBM, serta multi-branch management dalam alur yang terkoneksi.
                    </p>

                    <div class="info-banner" style="margin-bottom:2rem;">
                        <div class="info-banner-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        </div>
                        <p style="font-size:.875rem;font-weight:600;color:var(--c-text-primary);margin:0;">
                            Tidak perlu beli 2 software. Tidak perlu integrasi manual.
                        </p>
                    </div>
                </div>

                <!-- Right: Architecture Highlights -->
                <div class="card fade-up fade-up-delay-2" style="padding:2rem;">
                    <p style="font-size:.75rem;font-weight:700;text-transform:uppercase;letter-spacing:.08em;color:var(--c-accent);margin:0 0 1.25rem;">
                        Architecture Highlights
                    </p>
                    <div>
                        <div class="arch-item">
                            <div class="arch-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                            </div>
                            <div>
                                <p style="font-size:.9rem;font-weight:600;color:var(--c-text-primary);margin:0;">Unified dashboard lintas fungsi</p>
                                <p style="font-size:.8rem;color:var(--c-text-tertiary);margin:.25rem 0 0;">Semua data operasional dalam satu tampilan</p>
                            </div>
                        </div>
                        <div class="arch-item" style="border-top:1px solid var(--c-border-light);">
                            <div class="arch-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                            </div>
                            <div>
                                <p style="font-size:.9rem;font-weight:600;color:var(--c-text-primary);margin:0;">Data terpisah dan filter per cabang</p>
                                <p style="font-size:.8rem;color:var(--c-text-tertiary);margin:.25rem 0 0;">Isolasi data dengan kontrol akses granular</p>
                            </div>
                        </div>
                        <div class="arch-item" style="border-top:1px solid var(--c-border-light);">
                            <div class="arch-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                            </div>
                            <div>
                                <p style="font-size:.9rem;font-weight:600;color:var(--c-text-primary);margin:0;">Scalable untuk ekspansi nasional</p>
                                <p style="font-size:.8rem;color:var(--c-text-tertiary);margin:.25rem 0 0;">Tambah cabang tanpa ubah arsitektur</p>
                            </div>
                        </div>
                        <div class="arch-item" style="border-top:1px solid var(--c-border-light);">
                            <div class="arch-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                            </div>
                            <div>
                                <p style="font-size:.9rem;font-weight:600;color:var(--c-text-primary);margin:0;">Customizable mengikuti SOP perusahaan</p>
                                <p style="font-size:.8rem;color:var(--c-text-tertiary);margin:.25rem 0 0;">Fleksibel terhadap proses bisnis unik</p>
                            </div>
                        </div>
                        <div class="arch-item" style="border-top:1px solid var(--c-border-light);">
                            <div class="arch-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                            </div>
                            <div>
                                <p style="font-size:.9rem;font-weight:600;color:var(--c-text-primary);margin:0;">Subscription model low barrier</p>
                                <p style="font-size:.8rem;color:var(--c-text-tertiary);margin:.25rem 0 0;">Mulai tanpa biaya setup besar</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== FEATURES SECTION ==================== -->
    <section id="features" class="section section-alt">
        <div class="container-main">
            <div style="text-align:center;margin-bottom:3.5rem;" class="fade-up">
                <div class="chip" style="margin-bottom:1rem;">
                    <span class="chip-dot"></span>
                    Product Deep Dive
                </div>
                <h2 class="section-title" style="margin:0 0 1rem;">Core modules untuk operasi distribusi yang akuntabel</h2>
                <p class="section-subtitle" style="margin:0 auto;">
                    Fokus utama Pantoo adalah memadukan kontrol SDM, operasional cabang, dan compliance lapangan
                    tanpa menambah kompleksitas implementasi.
                </p>
            </div>

            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:1.25rem;">
                <article class="card fade-up" style="padding:2rem;">
                    <div class="feature-icon" style="background:var(--c-accent-light);margin-bottom:1.25rem;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="var(--c-accent)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    </div>
                    <h3 style="font-size:1rem;font-weight:700;color:var(--c-text-primary);margin:0 0 .5rem;">Attendance Compliance</h3>
                    <p style="font-size:.875rem;line-height:1.7;color:var(--c-text-secondary);margin:0;">Timestamp immutable, GPS coordinate, selfie verification, device tracking.</p>
                </article>

                <article class="card fade-up fade-up-delay-1" style="padding:2rem;">
                    <div class="feature-icon" style="background:rgba(99,102,241,.08);margin-bottom:1.25rem;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#6366f1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                    </div>
                    <h3 style="font-size:1rem;font-weight:700;color:var(--c-text-primary);margin:0 0 .5rem;">Multi-Branch Rules</h3>
                    <p style="font-size:.875rem;line-height:1.7;color:var(--c-text-secondary);margin:0;">Aturan attendance dan operasional dapat disesuaikan per cabang.</p>
                </article>

                <article class="card fade-up fade-up-delay-2" style="padding:2rem;">
                    <div class="feature-icon" style="background:rgba(236,72,153,.08);margin-bottom:1.25rem;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#ec4899" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    </div>
                    <h3 style="font-size:1rem;font-weight:700;color:var(--c-text-primary);margin:0 0 .5rem;">HRIS Complete</h3>
                    <p style="font-size:.875rem;line-height:1.7;color:var(--c-text-secondary);margin:0;">Data karyawan, struktur organisasi, dan shift dalam satu sistem.</p>
                </article>

                <article class="card fade-up fade-up-delay-1" style="padding:2rem;">
                    <div class="feature-icon" style="background:rgba(245,158,11,.08);margin-bottom:1.25rem;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
                    </div>
                    <h3 style="font-size:1rem;font-weight:700;color:var(--c-text-primary);margin:0 0 .5rem;">Distribution Ops</h3>
                    <p style="font-size:.875rem;line-height:1.7;color:var(--c-text-secondary);margin:0;">Kontrol operasional distribusi dan aktivitas cabang lebih terukur.</p>
                </article>

                <article class="card fade-up fade-up-delay-2" style="padding:2rem;">
                    <div class="feature-icon" style="background:rgba(6,182,212,.08);margin-bottom:1.25rem;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#06b6d4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                    </div>
                    <h3 style="font-size:1rem;font-weight:700;color:var(--c-text-primary);margin:0 0 .5rem;">Fuel Tracking</h3>
                    <p style="font-size:.875rem;line-height:1.7;color:var(--c-text-secondary);margin:0;">Monitoring BBM untuk efisiensi biaya armada.</p>
                </article>

                <article class="card fade-up fade-up-delay-3" style="padding:2rem;">
                    <div class="feature-icon" style="background:rgba(139,92,246,.08);margin-bottom:1.25rem;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#8b5cf6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                    </div>
                    <h3 style="font-size:1rem;font-weight:700;color:var(--c-text-primary);margin:0 0 .5rem;">Customizable System</h3>
                    <p style="font-size:.875rem;line-height:1.7;color:var(--c-text-secondary);margin:0;">Fleksibel terhadap kebutuhan proses dan request fitur internal.</p>
                </article>
            </div>
        </div>
    </section>

    <!-- ==================== MARKET & BUSINESS MODEL ==================== -->
    <section id="market" class="section">
        <div class="container-main">
            <div style="display:grid;grid-template-columns:1fr;gap:2rem;" class="lg:grid-cols-2">
                <!-- Target Market -->
                <div class="fade-up">
                    <div class="chip" style="margin-bottom:1.25rem;">
                        <span class="chip-dot"></span>
                        Target Market & Size
                    </div>
                    <h2 class="section-title" style="margin:0 0 1.25rem;">Distribusi & logistik Indonesia sebagai pasar utama</h2>
                    <div style="display:flex;flex-direction:column;gap:.75rem;margin-bottom:2rem;">
                        <div style="display:flex;align-items:center;gap:.75rem;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--c-green-check)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                            <span style="font-size:.925rem;color:var(--c-text-secondary);">Perusahaan distribusi nasional</span>
                        </div>
                        <div style="display:flex;align-items:center;gap:.75rem;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--c-green-check)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                            <span style="font-size:.925rem;color:var(--c-text-secondary);">Perusahaan logistik regional</span>
                        </div>
                        <div style="display:flex;align-items:center;gap:.75rem;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--c-green-check)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                            <span style="font-size:.925rem;color:var(--c-text-secondary);">FMCG distributor</span>
                        </div>
                        <div style="display:flex;align-items:center;gap:.75rem;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--c-green-check)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                            <span style="font-size:.925rem;color:var(--c-text-secondary);">Multi-cabang retail</span>
                        </div>
                        <div style="display:flex;align-items:center;gap:.75rem;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--c-green-check)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                            <span style="font-size:.925rem;color:var(--c-text-secondary);">Manufacturing dengan cabang banyak</span>
                        </div>
                    </div>
                    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:1rem;">
                        <div class="card-flat" style="padding:1.25rem;text-align:center;">
                            <p style="font-size:.65rem;font-weight:700;text-transform:uppercase;letter-spacing:.08em;color:var(--c-text-muted);margin:0 0 .5rem;">TAM</p>
                            <p style="font-size:.8rem;font-weight:600;color:var(--c-text-primary);margin:0;">Seluruh distribusi & logistik Indonesia</p>
                        </div>
                        <div class="card-flat" style="padding:1.25rem;text-align:center;">
                            <p style="font-size:.65rem;font-weight:700;text-transform:uppercase;letter-spacing:.08em;color:var(--c-text-muted);margin:0 0 .5rem;">SAM</p>
                            <p style="font-size:.8rem;font-weight:600;color:var(--c-text-primary);margin:0;">SMB tanpa sistem terintegrasi</p>
                        </div>
                        <div class="card-flat" style="padding:1.25rem;text-align:center;">
                            <p style="font-size:.65rem;font-weight:700;text-transform:uppercase;letter-spacing:.08em;color:var(--c-text-muted);margin:0 0 .5rem;">SOM</p>
                            <p style="font-size:.8rem;font-weight:600;color:var(--c-text-primary);margin:0;">Tier 1-2, 2-20 cabang</p>
                        </div>
                    </div>
                </div>

                <!-- Business Model -->
                <div class="card fade-up fade-up-delay-2" style="padding:2.5rem;">
                    <div class="chip" style="margin-bottom:1.25rem;">
                        <span class="chip-dot"></span>
                        Business Model
                    </div>
                    <h3 class="font-display" style="font-size:1.5rem;font-weight:700;color:var(--c-text-primary);margin:0 0 1.5rem;">
                        Subscription SaaS dengan recurring revenue
                    </h3>
                    <div style="display:flex;flex-direction:column;gap:1rem;margin-bottom:2rem;">
                        <div style="display:flex;align-items:flex-start;gap:.75rem;">
                            <div style="width:28px;height:28px;border-radius:50%;background:var(--c-accent-light);display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:2px;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="var(--c-accent)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                            </div>
                            <span style="font-size:.9rem;color:var(--c-text-secondary);line-height:1.6;">Monthly subscription per perusahaan</span>
                        </div>
                        <div style="display:flex;align-items:flex-start;gap:.75rem;">
                            <div style="width:28px;height:28px;border-radius:50%;background:var(--c-accent-light);display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:2px;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="var(--c-accent)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                            </div>
                            <span style="font-size:.9rem;color:var(--c-text-secondary);line-height:1.6;">Pricing: jumlah karyawan, cabang, modul aktif</span>
                        </div>
                        <div style="display:flex;align-items:flex-start;gap:.75rem;">
                            <div style="width:28px;height:28px;border-radius:50%;background:var(--c-accent-light);display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:2px;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="var(--c-accent)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                            </div>
                            <span style="font-size:.9rem;color:var(--c-text-secondary);line-height:1.6;">Add-on modules sebagai expansion revenue</span>
                        </div>
                        <div style="display:flex;align-items:flex-start;gap:.75rem;">
                            <div style="width:28px;height:28px;border-radius:50%;background:var(--c-accent-light);display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:2px;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="var(--c-accent)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                            </div>
                            <span style="font-size:.9rem;color:var(--c-text-secondary);line-height:1.6;">Optional custom development fee</span>
                        </div>
                    </div>
                    <div class="info-banner">
                        <div class="info-banner-icon">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                        </div>
                        <p style="font-size:.8rem;color:var(--c-text-secondary);margin:0;line-height:1.6;">
                            <strong style="color:var(--c-text-primary);">Keunggulan model:</strong> no upfront cost, predictable recurring revenue, dan retention tinggi karena sistem menjadi core operation.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== COMPETITIVE POSITIONING ==================== -->
    <section class="section section-alt">
        <div class="container-main">
            <div style="text-align:center;margin-bottom:3rem;" class="fade-up">
                <div class="chip" style="margin-bottom:1rem;">
                    <span class="chip-dot"></span>
                    Competitive Positioning
                </div>
                <h2 class="section-title" style="margin:0 0 1rem;">Pantoo advantage dibanding kategori solusi lain</h2>
                <p class="section-subtitle" style="margin:0 auto;">
                    Pantoo menutup gap antara HRIS-only, distribution-only, dan ERP generik yang mahal serta kompleks.
                </p>
            </div>

            <div class="card fade-up" style="overflow:hidden;padding:0;">
                <div style="overflow-x:auto;">
                    <table class="compare-table" style="min-width:680px;">
                        <thead>
                            <tr>
                                <th>Feature</th>
                                <th>HRIS Only</th>
                                <th>Distribusi Only</th>
                                <th style="min-width:120px;">Pantoo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>HRIS</td>
                                <td>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--c-green-check)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                </td>
                                <td style="color:var(--c-text-muted);">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--c-text-muted)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/></svg>
                                </td>
                                <td>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--c-accent)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                </td>
                            </tr>
                            <tr>
                                <td>Distribusi</td>
                                <td>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--c-text-muted)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/></svg>
                                </td>
                                <td>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--c-green-check)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                </td>
                                <td>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--c-accent)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                </td>
                            </tr>
                            <tr>
                                <td>Multi Cabang Advanced</td>
                                <td style="font-size:.8rem;color:var(--c-text-muted);">Limited</td>
                                <td style="font-size:.8rem;color:var(--c-text-muted);">Limited</td>
                                <td>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--c-accent)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                </td>
                            </tr>
                            <tr>
                                <td>Customizable</td>
                                <td style="font-size:.8rem;color:var(--c-text-muted);">Limited</td>
                                <td style="font-size:.8rem;color:var(--c-text-muted);">Limited</td>
                                <td>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--c-accent)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                </td>
                            </tr>
                            <tr>
                                <td>No Setup Fee</td>
                                <td>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--c-text-muted)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/></svg>
                                </td>
                                <td>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--c-text-muted)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/></svg>
                                </td>
                                <td>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--c-accent)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== STRATEGY SECTION ==================== -->
    <section id="strategy" class="section">
        <div class="container-main">
            <div style="display:grid;grid-template-columns:1fr;gap:3rem;" class="lg:grid-cols-2">
                <!-- Go-to-Market -->
                <div class="fade-up">
                    <div class="chip" style="margin-bottom:1.25rem;">
                        <span class="chip-dot"></span>
                        Go-to-Market Strategy
                    </div>
                    <h2 class="section-title" style="margin:0 0 2rem;">Eksekusi bertahap untuk akuisisi B2B</h2>
                    <div style="display:flex;flex-direction:column;gap:1.25rem;">
                        <div class="phase-card">
                            <div style="display:flex;align-items:flex-start;gap:1rem;">
                                <span class="phase-number">1</span>
                                <div>
                                    <h4 style="font-size:1rem;font-weight:700;color:var(--c-text-primary);margin:0 0 .375rem;">Direct B2B Sales</h4>
                                    <p style="font-size:.8rem;color:var(--c-text-secondary);margin:0;line-height:1.6;">Founder-led sales, network acquisition, distribution community.</p>
                                </div>
                            </div>
                        </div>
                        <div class="phase-card">
                            <div style="display:flex;align-items:flex-start;gap:1rem;">
                                <span class="phase-number">2</span>
                                <div>
                                    <h4 style="font-size:1rem;font-weight:700;color:var(--c-text-primary);margin:0 0 .375rem;">Digital Acquisition</h4>
                                    <p style="font-size:.8rem;color:var(--c-text-secondary);margin:0;line-height:1.6;">Meta Ads B2B, LinkedIn outreach, case study marketing.</p>
                                </div>
                            </div>
                        </div>
                        <div class="phase-card">
                            <div style="display:flex;align-items:flex-start;gap:1rem;">
                                <span class="phase-number">3</span>
                                <div>
                                    <h4 style="font-size:1rem;font-weight:700;color:var(--c-text-primary);margin:0 0 .375rem;">Partnership</h4>
                                    <p style="font-size:.8rem;color:var(--c-text-secondary);margin:0;line-height:1.6;">Consultants, software houses, and distribution associations.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Traction & Vision -->
                <div class="fade-up fade-up-delay-2">
                    <div class="chip" style="margin-bottom:1.25rem;">
                        <span class="chip-dot"></span>
                        Traction & Vision
                    </div>
                    <h2 class="section-title" style="margin:0 0 1.5rem;">Readiness saat ini dan arah jangka panjang</h2>
                    <div style="display:flex;flex-direction:column;gap:.75rem;margin-bottom:2rem;">
                        <div style="display:flex;align-items:center;gap:.75rem;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--c-green-check)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                            <span style="font-size:.925rem;color:var(--c-text-secondary);">Product architecture defined</span>
                        </div>
                        <div style="display:flex;align-items:center;gap:.75rem;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--c-green-check)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                            <span style="font-size:.925rem;color:var(--c-text-secondary);">Core feature roadmap ready</span>
                        </div>
                        <div style="display:flex;align-items:center;gap:.75rem;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--c-green-check)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                            <span style="font-size:.925rem;color:var(--c-text-secondary);">Target pilot customer identified</span>
                        </div>
                        <div style="display:flex;align-items:center;gap:.75rem;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--c-green-check)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                            <span style="font-size:.925rem;color:var(--c-text-secondary);">Beta testing plan QX 2026</span>
                        </div>
                    </div>

                    <div class="card" style="padding:1.75rem;border-color:rgba(13,148,136,.2);background:var(--c-accent-bg);">
                        <p style="font-size:.65rem;font-weight:700;text-transform:uppercase;letter-spacing:.08em;color:var(--c-text-muted);margin:0 0 .75rem;">Long-term Vision</p>
                        <p style="font-size:.9rem;font-weight:600;line-height:1.7;color:var(--c-text-primary);margin:0;">
                            Pantoo menuju posisi sebagai operational operating system untuk perusahaan distribusi Indonesia,
                            lalu berkembang ke ASEAN sebagai vertical-specific modular SaaS.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== CTA SECTION ==================== -->
    <section class="section" style="padding-bottom:5rem;">
        <div class="container-main">
            <div class="cta-section fade-up">
                <h2 class="font-display" style="font-size:clamp(1.5rem,4vw,2.25rem);font-weight:700;color:#fff;margin:0 0 1rem;">
                    Siap transformasi operasional distribusi Anda?
                </h2>
                <p style="font-size:1rem;color:rgba(255,255,255,.8);max-width:520px;margin:0 auto 2rem;line-height:1.7;">
                    Pantoo dirancang sebagai operating system untuk perusahaan distribusi Indonesia:
                    connected data, multi-branch ready, dan fleksibel terhadap SOP tiap organisasi.
                </p>
                <a href="#solution" class="btn" style="background:#fff;color:#0f766e;font-weight:700;box-shadow:0 4px 16px rgba(0,0,0,.15);">
                    Explore Platform
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- ==================== FOOTER ==================== -->
    <footer class="footer">
        <div class="container-main">
            <div style="display:grid;grid-template-columns:1fr;gap:2rem;margin-bottom:2rem;" class="md:grid-cols-3">
                <!-- Brand -->
                <div>
                    <div style="display:flex;align-items:center;gap:.5rem;margin-bottom:1rem;">
                        <div style="width:28px;height:28px;border-radius:.375rem;background:var(--c-accent);display:flex;align-items:center;justify-content:center;">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
                        </div>
                        <span class="font-display" style="font-size:1.1rem;font-weight:700;color:var(--c-text-primary);">Pantoo</span>
                    </div>
                    <p style="font-size:.8rem;color:var(--c-text-tertiary);line-height:1.7;max-width:300px;margin:0;">
                        Operational control untuk distribusi modern, dalam satu platform yang siap scale.
                    </p>
                </div>

                <!-- Links -->
                <div>
                    <p style="font-size:.75rem;font-weight:700;text-transform:uppercase;letter-spacing:.08em;color:var(--c-text-muted);margin:0 0 1rem;">Navigation</p>
                    <div style="display:flex;flex-direction:column;gap:.5rem;">
                        <a href="#problem" style="font-size:.85rem;color:var(--c-text-secondary);text-decoration:none;transition:color .2s;" onmouseover="this.style.color='var(--c-accent)'" onmouseout="this.style.color='var(--c-text-secondary)'">Problem</a>
                        <a href="#solution" style="font-size:.85rem;color:var(--c-text-secondary);text-decoration:none;transition:color .2s;" onmouseover="this.style.color='var(--c-accent)'" onmouseout="this.style.color='var(--c-text-secondary)'">Solution</a>
                        <a href="#features" style="font-size:.85rem;color:var(--c-text-secondary);text-decoration:none;transition:color .2s;" onmouseover="this.style.color='var(--c-accent)'" onmouseout="this.style.color='var(--c-text-secondary)'">Features</a>
                        <a href="#market" style="font-size:.85rem;color:var(--c-text-secondary);text-decoration:none;transition:color .2s;" onmouseover="this.style.color='var(--c-accent)'" onmouseout="this.style.color='var(--c-text-secondary)'">Market</a>
                        <a href="#strategy" style="font-size:.85rem;color:var(--c-text-secondary);text-decoration:none;transition:color .2s;" onmouseover="this.style.color='var(--c-accent)'" onmouseout="this.style.color='var(--c-text-secondary)'">Strategy</a>
                    </div>
                </div>

                <!-- Tech -->
                <div>
                    <p style="font-size:.75rem;font-weight:700;text-transform:uppercase;letter-spacing:.08em;color:var(--c-text-muted);margin:0 0 1rem;">Built With</p>
                    <div style="display:flex;flex-wrap:wrap;gap:.5rem;">
                        <span style="font-size:.7rem;font-weight:600;padding:.375rem .75rem;border-radius:999px;background:var(--c-accent-light);color:var(--c-accent);border:1px solid rgba(13,148,136,.15);">Laravel {{ app()->version() }}</span>
                        <span style="font-size:.7rem;font-weight:600;padding:.375rem .75rem;border-radius:999px;background:var(--c-accent-light);color:var(--c-accent);border:1px solid rgba(13,148,136,.15);">Tailwind CSS</span>
                        <span style="font-size:.7rem;font-weight:600;padding:.375rem .75rem;border-radius:999px;background:var(--c-accent-light);color:var(--c-accent);border:1px solid rgba(13,148,136,.15);">Cloud SaaS</span>
                    </div>
                </div>
            </div>
            <div style="border-top:1px solid var(--c-border);padding-top:1.5rem;display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between;gap:1rem;">
                <p style="font-size:.75rem;color:var(--c-text-muted);margin:0;">© {{ date('Y') }} Pantoo. All rights reserved.</p>
                <p style="font-size:.75rem;color:var(--c-text-muted);margin:0;">Company profile — Pantoo pitch deck</p>
            </div>
        </div>
    </footer>

    <!-- ==================== SCRIPTS ==================== -->
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

        // Responsive grid classes (Tailwind CDN fallback for custom classes)
        function applyResponsiveGrids() {
            var w = window.innerWidth;
            document.querySelectorAll('.lg\\:grid-cols-2').forEach(function(el) {
                if (w >= 1024) {
                    el.style.gridTemplateColumns = 'repeat(2, 1fr)';
                } else {
                    el.style.gridTemplateColumns = '1fr';
                }
            });
            document.querySelectorAll('.md\\:grid-cols-3').forEach(function(el) {
                if (w >= 768) {
                    el.style.gridTemplateColumns = 'repeat(3, 1fr)';
                } else {
                    el.style.gridTemplateColumns = '1fr';
                }
            });
            // Nav items
            document.querySelectorAll('.hidden.md\\:flex').forEach(function(el) {
                el.style.display = w >= 768 ? 'flex' : 'none';
            });
            document.querySelectorAll('.hidden.md\\:inline-flex').forEach(function(el) {
                el.style.display = w >= 768 ? 'inline-flex' : 'none';
            });
            document.querySelectorAll('.md\\:hidden').forEach(function(el) {
                el.style.display = w >= 768 ? 'none' : 'flex';
            });
        }

        applyResponsiveGrids();
        window.addEventListener('resize', applyResponsiveGrids);
    })();
    </script>
</body>
</html>
