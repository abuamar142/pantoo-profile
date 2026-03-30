{{-- ==================== PRICING SECTION ==================== --}}
<section id="pricing" class="section">
    <div class="mx-auto max-w-7xl px-6 md:px-8 xl:px-10">
        <div class="fade-up mb-14 text-center">
            <div class="chip mb-4">
                <span class="chip-dot"></span>
                {{ $copy['pricing']['chip'] }}
            </div>
            <h2 class="section-title mb-4">{{ $copy['pricing']['title'] }}</h2>
            <p class="section-subtitle mx-auto">
                {{ $copy['pricing']['subtitle'] }}
            </p>
        </div>

        @if(!empty($pricingPlans) && count($pricingPlans) > 0)
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:gap-8">
                @foreach ($pricingPlans as $plan)
                    <article class="card flex flex-col justify-between p-8 fade-up {{ $plan['is_recommended'] ? 'border-indigo-500 shadow-xl dark:border-indigo-500' : '' }}">
                        <div>
                            @if($plan['is_recommended'])
                                <span class="mb-4 inline-block rounded-full bg-indigo-100 px-3 py-1 text-xs font-semibold text-indigo-600 dark:bg-indigo-900/30 dark:text-indigo-400">
                                    {{ $copy['pricing']['recommended'] }}
                                </span>
                            @endif
                            <h3 class="mb-2 text-2xl font-bold text-ink-900 dark:text-ink-100">{{ $plan['package_name'] }}</h3>
                            <p class="mb-6 text-sm text-ink-600 dark:text-ink-300">{{ $plan['description'] }}</p>

                            <div class="mb-6">
                                <span class="text-4xl font-extrabold text-ink-900 dark:text-ink-100">Rp {{ number_format($plan['price_monthly'], 0, ',', '.') }}</span>
                                <span class="text-base font-medium text-ink-500">{{ $copy['pricing']['monthly'] }}</span>
                            </div>

                            <ul class="mb-8 space-y-4 text-sm text-ink-700 dark:text-ink-300">
                                <li class="flex items-center gap-3">
                                    <svg class="h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    {{ str_replace(':max', $plan['user_max'], $copy['pricing']['user_limit']) }}
                                </li>
                                <li class="flex items-center gap-3">
                                    <svg class="h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    {{ str_replace(':max', $plan['branch_max'], $copy['pricing']['branch_limit']) }}
                                </li>
                                @if(!empty($plan['feature_items']))
                                    <li class="mt-4 font-semibold">{{ $copy['pricing']['features_title'] }}</li>
                                    @foreach($plan['feature_items'] as $feature)
                                        <li class="flex items-center gap-3">
                                            <svg class="h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                            {{ $feature['name'] }}
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        
                        <a href="{{ route('package.detail' . ($locale === 'id' ? '' : '.locale'), $locale === 'id' ? ['id' => $plan['_id']] : ['locale' => $locale, 'id' => $plan['_id']]) }}" class="mt-4 block w-full rounded-xl bg-ink-900 px-6 py-3 text-center text-sm font-semibold text-white transition hover:bg-ink-800 dark:bg-white dark:text-ink-900 dark:hover:bg-ink-200 {{ $plan['is_recommended'] ? 'bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600 dark:text-white' : '' }}">
                            {{ $copy['pricing']['cta'] }}
                        </a>
                    </article>
                @endforeach
            </div>
        @else
            <div class="text-center text-ink-500">
                <p>Loading pricing data...</p>
            </div>
        @endif
    </div>
</section>
