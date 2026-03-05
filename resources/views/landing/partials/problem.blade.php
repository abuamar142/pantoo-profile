{{-- ==================== PROBLEM SECTION ==================== --}}
@php
    $problemCardDelays = ['', ' fade-up-delay-1', ' fade-up-delay-2', ' fade-up-delay-1', ' fade-up-delay-2', ' fade-up-delay-3'];
@endphp
<section id="problem" class="section section-alt">
    <div class="mx-auto max-w-7xl px-6 md:px-8 xl:px-10">
        <div class="fade-up mb-14 text-center">
            <div class="chip mb-4">
                <span class="chip-dot"></span>
                {{ $copy['problem']['chip'] }}
            </div>
            <h2 class="section-title mb-4">{{ $copy['problem']['title'] }}</h2>
            <p class="section-subtitle mx-auto">
                {{ $copy['problem']['subtitle'] }}
            </p>
        </div>

        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($copy['problem']['cards'] as $index => $card)
                <article class="card fade-up{{ $problemCardDelays[$index] ?? '' }} p-7">
                    @switch($index)
                        @case(0)
                            <div class="feature-icon mb-4 bg-red-500/8">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
                            </div>
                            @break
                        @case(1)
                            <div class="feature-icon mb-4 bg-amber-500/8">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                            </div>
                            @break
                        @case(2)
                            <div class="feature-icon mb-4 bg-violet-500/8">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#8b5cf6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            </div>
                            @break
                        @case(3)
                            <div class="feature-icon mb-4 bg-pink-500/8">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#ec4899" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                            </div>
                            @break
                        @case(4)
                            <div class="feature-icon mb-4 bg-cyan-500/8">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#06b6d4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="4 7 4 4 20 4 20 7"/><line x1="9" y1="20" x2="15" y2="20"/><line x1="12" y1="4" x2="12" y2="20"/></svg>
                            </div>
                            @break
                        @default
                            <div class="feature-icon mb-4 bg-green-500/8">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                            </div>
                    @endswitch
                    <h3 class="mb-2 text-base font-bold text-ink-900 dark:text-ink-100">{{ $card['title'] }}</h3>
                    <p class="text-sm leading-relaxed text-ink-600 dark:text-ink-300">{{ $card['desc'] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>
