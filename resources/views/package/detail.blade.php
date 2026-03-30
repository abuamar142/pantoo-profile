<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', $locale) }}" class="scroll-smooth">
<head>
    @include('landing.partials.head')
</head>
<body class="bg-slate-50 font-sans text-ink-900 antialiased dark:bg-ink-950 dark:text-ink-50">
    <div class="flex min-h-screen flex-col overflow-x-hidden pt-16">
        @include('landing.partials.nav')

        <main class="flex-grow pb-24 pt-8">
            <div class="mx-auto max-w-4xl px-6 md:px-8 xl:px-10">
                <div class="mb-8 flex items-center gap-4">
                    <a href="{{ route('landing', $locale === 'id' ? [] : ['locale' => $locale]) }}#pricing" class="inline-flex items-center text-sm font-medium text-ink-500 hover:text-indigo-600 dark:hover:text-indigo-400">
                        <svg class="mr-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                        {{ $locale === 'id' ? 'Kembali' : 'Back' }}
                    </a>
                </div>

                <div class="card p-8 md:p-12 shadow-xl border border-indigo-100 dark:border-indigo-900 bg-white dark:bg-ink-900 rounded-3xl relative overflow-hidden">
                    <div class="absolute -right-24 -top-24 size-64 rounded-full bg-indigo-50 blur-3xl dark:bg-indigo-900/20"></div>
                    
                    <div class="relative z-10 mb-8">
                        @if($package['is_recommended'])
                            <span class="mb-4 inline-block rounded-full bg-indigo-100 px-3 py-1 text-xs font-semibold text-indigo-600 dark:bg-indigo-900/30 dark:text-indigo-400">{{ $locale === 'id' ? 'Rekomendasi' : 'Recommended' }}</span>
                        @endif
                        <h1 class="text-4xl font-extrabold text-ink-900 dark:text-ink-100 mb-4">{{ $package['package_name'] }}</h1>
                        <p class="text-lg text-ink-600 dark:text-ink-300">{{ $package['description'] ?: 'Tidak ada deskripsi.' }}</p>
                    </div>

                    <div class="relative z-10 grid md:grid-cols-2 gap-6 mb-10">
                        <div class="bg-indigo-50/50 dark:bg-indigo-900/20 p-6 rounded-2xl border border-indigo-100 dark:border-indigo-800/50">
                            <span class="block text-sm font-medium text-ink-500 mb-2">{{ $locale === 'id' ? 'Harga Bulanan' : 'Monthly Price' }}</span>
                            <span class="text-3xl font-bold text-indigo-600 dark:text-indigo-400">Rp {{ number_format($package['price_monthly'], 0, ',', '.') }}</span>
                        </div>
                        <div class="bg-ink-50/50 dark:bg-ink-800/20 p-6 rounded-2xl border border-ink-100 dark:border-ink-800">
                            <span class="block text-sm font-medium text-ink-500 mb-2">{{ $locale === 'id' ? 'Harga Tahunan' : 'Yearly Price' }}</span>
                            <span class="text-3xl font-bold text-ink-900 dark:text-ink-100">Rp {{ number_format($package['price_yearly'], 0, ',', '.') }}</span>
                        </div>
                    </div>
                    
                    <div class="relative z-10 mb-10">
                        <h3 class="text-xl font-bold mb-6 border-b border-ink-200 dark:border-ink-800 pb-2">{{ $locale === 'id' ? 'Batas Penggunaan' : 'Usage Limits' }}</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="flex items-center gap-4 bg-white dark:bg-ink-950 p-4 border border-ink-100 dark:border-ink-800 rounded-xl shadow-sm">
                                <div class="bg-indigo-100 dark:bg-indigo-900/40 p-3 rounded-lg">
                                    <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                </div>
                                <div>
                                    <span class="block text-xs font-semibold uppercase tracking-wide text-ink-400 dark:text-ink-500">{{ $locale === 'id' ? 'Limit User' : 'User Limit' }}</span>
                                    <span class="font-bold text-lg text-ink-900 dark:text-ink-100">{{ $package['user_max'] ? number_format($package['user_max'], 0, ',', '.') . ' User' : 'Unlimited' }}</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 bg-white dark:bg-ink-950 p-4 border border-ink-100 dark:border-ink-800 rounded-xl shadow-sm">
                                <div class="bg-indigo-100 dark:bg-indigo-900/40 p-3 rounded-lg">
                                    <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                                </div>
                                <div>
                                    <span class="block text-xs font-semibold uppercase tracking-wide text-ink-400 dark:text-ink-500">{{ $locale === 'id' ? 'Limit Cabang' : 'Branch Limit' }}</span>
                                    <span class="font-bold text-lg text-ink-900 dark:text-ink-100">{{ $package['branch_max'] ? number_format($package['branch_max'], 0, ',', '.') . ' Cabang' : 'Unlimited' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(!empty($package['feature_items']) && count($package['feature_items']) > 0)
                    <div class="relative z-10 mb-10">
                        <h3 class="text-xl font-bold mb-6 border-b border-ink-200 dark:border-ink-800 pb-2">{{ $locale === 'id' ? 'Fitur-fitur yang Termasuk' : 'Included Features' }}</h3>
                        <ul class="grid md:grid-cols-2 gap-x-6 gap-y-4">
                            @foreach($package['feature_items'] as $feature)
                            <li class="flex items-start gap-3 bg-slate-50 dark:bg-ink-800/30 p-3 rounded-lg border border-transparent hover:border-indigo-100 dark:hover:border-indigo-900/50 transition duration-200">
                                <div class="mt-0.5 rounded-full bg-indigo-100 p-1 dark:bg-indigo-900/40">
                                    <svg class="h-4 w-4 shrink-0 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                </div>
                                <div>
                                    <strong class="block text-ink-900 dark:text-ink-100 text-sm">{{ $feature['name'] }}</strong>
                                    @if($feature['description'])
                                        <span class="block mt-1 text-xs text-ink-500 dark:text-ink-400">{{ $feature['description'] }}</span>
                                    @endif
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="relative z-10 text-center pt-8 mt-4 border-t border-ink-200 dark:border-ink-800">
                        <a href="https://siswa.pantoo.my.id/register?package={{ $package['_id'] }}" class="inline-flex w-full sm:w-auto items-center justify-center rounded-xl bg-indigo-600 px-8 py-4 text-base font-bold text-white shadow-lg transition hover:bg-indigo-700 hover:-translate-y-1 focus:outline-none focus:ring-4 focus:ring-indigo-500/30">
                            {{ $locale === 'id' ? 'Pilih Paket Ini Sekarang' : 'Choose This Plan Now' }}
                        </a>
                    </div>
                </div>
            </div>
        </main>

        @include('landing.partials.footer')
    </div>
</body>
</html>
