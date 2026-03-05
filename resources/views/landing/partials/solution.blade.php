    {{-- ==================== SOLUTION SECTION ==================== --}}
    <section id="solution" class="section">
        <div class="mx-auto max-w-7xl px-6 md:px-8 xl:px-10">
            <div class="grid grid-cols-1 items-start gap-12 lg:grid-cols-2">
                {{-- Left --}}
                <div class="fade-up">
                    <div class="chip mb-5">
                        <span class="chip-dot"></span>
                        {{ $copy['solution']['chip'] }}
                    </div>
                    <h2 class="section-title mb-5">{{ $copy['solution']['title'] }}</h2>
                    <p class="section-subtitle mb-8">
                        {{ $copy['solution']['subtitle_1'] }}
                        {{ $copy['solution']['subtitle_2'] }}
                    </p>

                    <div class="info-banner mb-8">
                        <div class="info-banner-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        </div>
                        <p class="text-sm font-semibold text-ink-900 dark:text-ink-100">
                            {{ $copy['solution']['banner'] }}
                        </p>
                    </div>
                </div>

                {{-- Right: Architecture Highlights --}}
                <div class="card fade-up fade-up-delay-2 p-8">
                    <p class="mb-5 text-xs font-bold uppercase tracking-widest text-pantoo-600 dark:text-pantoo-400">
                        {{ $copy['solution']['highlights_title'] }}
                    </p>
                    <div class="divide-y divide-ink-100 dark:divide-ink-800">
                        @foreach ($copy['solution']['highlights'] as $highlight)
                        <div class="arch-item">
                            <div class="arch-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                            </div>
                            <div>
                                <p class="text-[.9rem] font-semibold text-ink-900 dark:text-ink-100">{{ $highlight['title'] }}</p>
                                <p class="mt-1 text-xs text-ink-500 dark:text-ink-400">{{ $highlight['desc'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
