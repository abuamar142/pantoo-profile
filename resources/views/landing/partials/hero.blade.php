    {{-- ==================== HERO SECTION ==================== --}}
    <section id="hero" class="hero-section">
        <div class="hero-grid"></div>
        <div class="relative z-10 mx-auto max-w-7xl px-6 md:px-8 xl:px-10">
            <div class="grid grid-cols-1 items-center gap-12">
                {{-- Hero Content --}}
                <div class="fade-up text-center">
                    <div class="hero-solve-shell mx-auto mb-8 max-w-8xl">
                        <button id="hero-solve-prev" type="button" class="hero-solve-btn hero-solve-btn-prev" aria-label="Previous solved problem">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
                        </button>
                        <div id="hero-solve-carousel" class="hero-solve-carousel">
                            @foreach ($heroSlides as $slide)
                            <article class="hero-solve-slide">
                                <div class="chip mb-6">
                                    <span class="chip-dot"></span>
                                    {{ $slide['chip'] }}
                                </div>
                                <h1 class="mx-auto mb-6 font-display text-[clamp(2rem,5.5vw,3.5rem)] font-extrabold leading-[1.1] text-ink-900 dark:text-ink-100">
                                    {{ $slide['title_line_1'] }}
                                    @if (!empty($slide['title_line_2']))
                                        <br>
                                        <span class="bg-gradient-to-r from-pantoo-600 to-cyan-500 bg-clip-text text-transparent">
                                            {{ $slide['title_line_2'] }}
                                        </span>
                                    @endif
                                </h1>
                                <p class="mx-auto mb-8 max-w-3xl text-lg leading-relaxed text-ink-600 dark:text-ink-300">
                                    {{ $slide['description_1'] }}
                                    {{ $slide['description_2'] }}
                                </p>
                            </article>
                            @endforeach
                        </div>
                        <button id="hero-solve-next" type="button" class="hero-solve-btn hero-solve-btn-next" aria-label="Next solved problem">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
                        </button>
                    </div>
                    <div class="mb-12 flex flex-wrap items-center justify-center gap-3">
                        <a href="#solution" class="btn btn-accent">
                            {{ $copy['hero']['primary_cta'] }}
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </a>
                        <a href="#features" class="btn btn-outline">{{ $copy['hero']['secondary_cta'] }}</a>
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
                    <div class="stat-value">{{ $copy['hero']['stats'][0]['value'] }}</div>
                    <div class="stat-label">{{ $copy['hero']['stats'][0]['label'] }}</div>
                </div>
                <div class="card-flat p-5 text-center">
                    <div class="stat-value">{{ $copy['hero']['stats'][1]['value'] }}</div>
                    <div class="stat-label">{{ $copy['hero']['stats'][1]['label'] }}</div>
                </div>
                <div class="card-flat p-5 text-center">
                    <div class="stat-value">{{ $copy['hero']['stats'][2]['value'] }}</div>
                    <div class="stat-label">{{ $copy['hero']['stats'][2]['label'] }}</div>
                </div>
            </div>
        </div>
    </section>
