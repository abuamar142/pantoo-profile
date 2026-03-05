<?php

use Illuminate\Support\Facades\Route;

$supportedLocales = ['id', 'en'];

Route::get('/sitemap.xml', function () use ($supportedLocales) {
    $pages = collect($supportedLocales)->map(function (string $locale): array {
        return [
            'loc' => route('landing', ['locale' => $locale]),
            'lastmod' => now()->toDateString(),
            'changefreq' => 'weekly',
            'priority' => $locale === 'id' ? '1.0' : '0.9',
        ];
    });

    return response()->view('sitemap', ['pages' => $pages], 200, [
        'Content-Type' => 'application/xml; charset=UTF-8',
    ]);
})->name('sitemap');

Route::get('/robots.txt', function () {
    $lines = [
        'User-agent: *',
        'Allow: /',
        'Sitemap: '.route('sitemap'),
    ];

    return response(implode("\n", $lines)."\n", 200, [
        'Content-Type' => 'text/plain; charset=UTF-8',
    ]);
})->name('robots');

Route::get('/locale/{locale}', function (string $locale) use ($supportedLocales) {
    abort_unless(in_array($locale, $supportedLocales, true), 404);

    session(['locale' => $locale]);

    $previousUrl = url()->previous();
    $previousPath = parse_url($previousUrl, PHP_URL_PATH) ?: '';
    $previousQuery = parse_url($previousUrl, PHP_URL_QUERY) ?: '';

    $segments = array_values(array_filter(explode('/', trim($previousPath, '/'))));

    if (isset($segments[0]) && in_array($segments[0], $supportedLocales, true)) {
        $segments[0] = $locale;
        $target = '/'.implode('/', $segments);

        if ($previousQuery !== '') {
            $target .= '?'.$previousQuery;
        }

        return redirect($target);
    }

    return redirect()->route('landing', ['locale' => $locale]);
})->name('locale.switch');

Route::get('/', fn () => redirect()->route('landing', ['locale' => 'id'], 301));

Route::get('/{locale}', function (string $locale) use ($supportedLocales) {
    abort_unless(in_array($locale, $supportedLocales, true), 404);

    session(['locale' => $locale]);
    app()->setLocale($locale);

    $copy = trans('landing');

    $canonicalUrl = route('landing', ['locale' => $locale]);
    $alternateIdUrl = route('landing', ['locale' => 'id']);
    $alternateEnUrl = route('landing', ['locale' => 'en']);

    $robotsContent = app()->environment('production')
        ? 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1'
        : 'noindex, nofollow';

    $ogLocale = $locale === 'id' ? 'id_ID' : 'en_US';
    $ogLocaleAlternate = $locale === 'id' ? 'en_US' : 'id_ID';
    $ogImageUrl = asset('pantoo.ico');

    $schemaGraph = [
        '@context' => 'https://schema.org',
        '@graph' => [
            [
                '@type' => 'Organization',
                '@id' => $alternateIdUrl.'#organization',
                'name' => 'Pantoo',
                'url' => $alternateIdUrl,
                'logo' => $ogImageUrl,
                'description' => $copy['meta']['description'],
            ],
            [
                '@type' => 'WebSite',
                '@id' => $alternateIdUrl.'#website',
                'url' => $alternateIdUrl,
                'name' => 'Pantoo',
                'inLanguage' => $locale === 'id' ? 'id-ID' : 'en-US',
                'publisher' => ['@id' => $alternateIdUrl.'#organization'],
            ],
            [
                '@type' => 'SoftwareApplication',
                '@id' => $canonicalUrl.'#software',
                'name' => 'Pantoo',
                'applicationCategory' => 'BusinessApplication',
                'operatingSystem' => 'Web',
                'url' => $canonicalUrl,
                'description' => $copy['meta']['description'],
                'publisher' => ['@id' => $alternateIdUrl.'#organization'],
                'availableLanguage' => ['id-ID', 'en-US'],
            ],
        ],
    ];

    return view('welcome', [
        'locale' => $locale,
        'copy' => $copy,
        'canonicalUrl' => $canonicalUrl,
        'alternateIdUrl' => $alternateIdUrl,
        'alternateEnUrl' => $alternateEnUrl,
        'robotsContent' => $robotsContent,
        'ogLocale' => $ogLocale,
        'ogLocaleAlternate' => $ogLocaleAlternate,
        'ogImageUrl' => $ogImageUrl,
        'schemaGraph' => $schemaGraph,
        'heroSlides' => $copy['hero']['slides'],
    ]);
})->whereIn('locale', $supportedLocales)->name('landing');
