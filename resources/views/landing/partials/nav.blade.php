    {{-- ==================== NAVIGATION ==================== --}}
    <nav class="nav-bar" id="navbar">
        <div class="mx-auto flex h-16 max-w-7xl items-center justify-between px-6 md:px-8 xl:px-10">
            {{-- Logo --}}
            <a href="{{ route('landing', $locale === 'id' ? [] : ['locale' => $locale]) }}" class="flex items-center gap-2 no-underline">
                <div class="flex size-8 items-center justify-center overflow-hidden rounded-lg">
                    <img src="{{ asset('pantoo.ico') }}" alt="Pantoo icon" class="h-full w-full object-cover">
                </div>
                <span class="font-display text-xl font-bold text-ink-900 dark:text-ink-100">Pantoo</span>
            </a>

            {{-- Desktop Nav --}}
            <div class="hidden items-center gap-8 md:flex">
                <a href="#hero" class="nav-link">{{ $copy['nav']['hero'] }}</a>
                <a href="#problem" class="nav-link">{{ $copy['nav']['problem'] }}</a>
                <a href="#solution" class="nav-link">{{ $copy['nav']['solution'] }}</a>
                <a href="#features" class="nav-link">{{ $copy['nav']['features'] }}</a>
                <a href="#positioning" class="nav-link">{{ $copy['nav']['positioning'] }}</a>
                <a href="#pricing" class="nav-link">{{ $copy['nav']['pricing'] }}</a>
            </div>

            {{-- Right Side --}}
            <div class="flex items-center gap-2">
                <div class="lang-switch" aria-label="{{ $copy['lang']['aria'] }}">
                    <a href="{{ route('landing') }}" class="lang-btn {{ $locale === 'id' ? 'active' : '' }}">{{ $copy['lang']['id'] }}</a>
                    <a href="{{ route('landing', ['locale' => 'en']) }}" class="lang-btn {{ $locale === 'en' ? 'active' : '' }}">{{ $copy['lang']['en'] }}</a>
                </div>
                <button id="theme-toggle" type="button" class="theme-btn" aria-label="{{ $copy['theme']['toggle'] }}">
                    <svg id="icon-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
                    <svg id="icon-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="hidden"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
                </button>
                <a href="https://app.pantoo.com/register" class="btn btn-accent hidden h-[38px] px-5 text-xs md:inline-flex">
                    {{ $copy['nav']['cta'] }}
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
                {{-- Mobile hamburger --}}
                <button class="hamburger md:hidden" id="mobile-toggle" aria-label="{{ $copy['nav']['menu'] }}">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
                </button>
            </div>
        </div>
    </nav>

    {{-- Mobile Menu Overlay --}}
    <div class="mobile-menu" id="mobile-menu">
        <div class="mb-8 flex items-center justify-between">
            <span class="font-display text-xl font-bold text-ink-900 dark:text-ink-100">Pantoo</span>
            <button class="hamburger" id="mobile-close" aria-label="{{ $copy['nav']['close_menu'] }}">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>
        <a href="#hero" class="mobile-menu-link" onclick="closeMobileMenu()">{{ $copy['nav']['hero'] }}</a>
        <a href="#problem" class="mobile-menu-link" onclick="closeMobileMenu()">{{ $copy['nav']['problem'] }}</a>
        <a href="#solution" class="mobile-menu-link" onclick="closeMobileMenu()">{{ $copy['nav']['solution'] }}</a>
        <a href="#features" class="mobile-menu-link" onclick="closeMobileMenu()">{{ $copy['nav']['features'] }}</a>
        <a href="#positioning" class="mobile-menu-link" onclick="closeMobileMenu()">{{ $copy['nav']['positioning'] }}</a>
        <a href="#pricing" class="mobile-menu-link" onclick="closeMobileMenu()">{{ $copy['nav']['pricing'] }}</a>
        <div class="mt-4 grid grid-cols-2 gap-2">
            <a href="{{ route('landing') }}" class="btn {{ $locale === 'id' ? 'btn-accent' : 'btn-outline' }} py-2">{{ $copy['lang']['id'] }}</a>
            <a href="{{ route('landing', ['locale' => 'en']) }}" class="btn {{ $locale === 'en' ? 'btn-accent' : 'btn-outline' }} py-2">{{ $copy['lang']['en'] }}</a>
        </div>
        <div class="mt-auto pt-8">
            <a href="https://app.pantoo.com/register" class="btn btn-accent w-full" onclick="closeMobileMenu()">{{ $copy['nav']['cta'] }}</a>
        </div>
    </div>
