    {{-- ==================== FOOTER ==================== --}}
    <footer class="footer">
        <div class="mx-auto max-w-7xl px-6 md:px-8 xl:px-10">
            <div class="mb-8 grid grid-cols-1 gap-8 md:grid-cols-3">
                {{-- Brand --}}
                <div>
                    <div class="mb-4 flex items-center gap-2">
                        <div class="flex size-7 items-center justify-center overflow-hidden rounded-md">
                            <img src="{{ asset('pantoo.ico') }}" alt="Pantoo icon" class="h-full w-full object-cover">
                        </div>
                        <span class="font-display text-lg font-bold text-ink-900 dark:text-ink-100">Pantoo</span>
                    </div>
                    <p class="max-w-xs text-xs leading-relaxed text-ink-500 dark:text-ink-400">
                        {{ $copy['footer']['description'] }}
                    </p>
                </div>

                {{-- Links --}}
                <div>
                    <p class="mb-4 text-xs font-bold uppercase tracking-widest text-ink-400 dark:text-ink-500">{{ $copy['footer']['nav_title'] }}</p>
                    <div class="flex flex-col gap-2">
                        <a href="#hero" class="footer-link">{{ $copy['nav']['hero'] }}</a>
                        <a href="#problem" class="footer-link">{{ $copy['nav']['problem'] }}</a>
                        <a href="#solution" class="footer-link">{{ $copy['nav']['solution'] }}</a>
                        <a href="#features" class="footer-link">{{ $copy['nav']['features'] }}</a>
                        <a href="#positioning" class="footer-link">{{ $copy['nav']['positioning'] }}</a>
                    </div>
                </div>

                {{-- Tech --}}
                <div>
                    <p class="mb-4 text-xs font-bold uppercase tracking-widest text-ink-400 dark:text-ink-500">{{ $copy['footer']['built_with'] }}</p>
                    <div class="flex flex-wrap gap-2">
                        <span class="tech-badge">Laravel {{ app()->version() }}</span>
                        <span class="tech-badge">Tailwind CSS</span>
                        <span class="tech-badge">{{ $copy['footer']['cloud_saas'] }}</span>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap items-center justify-between gap-4 border-t border-ink-200 pt-6 dark:border-ink-700">
                <p class="text-xs text-ink-400 dark:text-ink-500">&copy; {{ date('Y') }} Pantoo. {{ $copy['footer']['copyright'] }}</p>
                <p class="text-xs text-ink-400 dark:text-ink-500">{{ $copy['footer']['company_profile'] }}</p>
            </div>
        </div>
    </footer>
