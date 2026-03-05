{{-- ==================== FEATURES SECTION ==================== --}}
@php
    $featureItemDelays = ['', ' fade-up-delay-1', ' fade-up-delay-2', ' fade-up-delay-1', ' fade-up-delay-2', ' fade-up-delay-3'];
@endphp
<section id="features" class="section section-alt">
    <div class="mx-auto max-w-7xl px-6 md:px-8 xl:px-10">
        <div class="fade-up mb-14 text-center">
            <div class="chip mb-4">
                <span class="chip-dot"></span>
                {{ $copy['features']['chip'] }}
            </div>
            <h2 class="section-title mb-4">{{ $copy['features']['title'] }}</h2>
            <p class="section-subtitle mx-auto">
                {{ $copy['features']['subtitle'] }}
            </p>
        </div>

        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($copy['features']['items'] as $index => $item)
                <article class="card fade-up{{ $featureItemDelays[$index] ?? '' }} p-8">
                    @switch($index)
                        @case(0)
                            <div class="feature-icon mb-5 bg-pantoo-100 dark:bg-pantoo-600/15">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" class="stroke-pantoo-600 dark:stroke-pantoo-400" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            </div>
                            @break
                        @case(1)
                            <div class="feature-icon mb-5 bg-indigo-500/8">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#6366f1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                            </div>
                            @break
                        @case(2)
                            <div class="feature-icon mb-5 bg-pink-500/8">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#ec4899" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                            </div>
                            @break
                        @case(3)
                            <div class="feature-icon mb-5 bg-amber-500/8">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
                            </div>
                            @break
                        @case(4)
                            <div class="feature-icon mb-5 bg-cyan-500/8">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#06b6d4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                            </div>
                            @break
                        @default
                            <div class="feature-icon mb-5 bg-violet-500/8">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#8b5cf6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                            </div>
                    @endswitch
                    <h3 class="mb-2 text-base font-bold text-ink-900 dark:text-ink-100">{{ $item['title'] }}</h3>
                    <p class="text-sm leading-relaxed text-ink-600 dark:text-ink-300">{{ $item['desc'] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>
