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
        if ($locale === 'id') {
            array_shift($segments); // Remove the locale prefix for 'id' route
        } else {
            $segments[0] = $locale;
        }
        $target = '/'.implode('/', $segments);

        if ($previousQuery !== '') {
            $target .= '?'.$previousQuery;
        }

        return redirect($target);
    }

    return redirect()->route('landing', $locale === 'id' ? [] : ['locale' => $locale]);
})->name('locale.switch');

Route::get('/{locale?}', function (?string $locale = 'id') use ($supportedLocales) {
    if (!in_array($locale, $supportedLocales, true)) {
        abort(404);
    }

    session(['locale' => $locale]);
    app()->setLocale($locale);

    $copy = trans('landing');

    $canonicalUrl = route('landing', $locale === 'id' ? [] : ['locale' => $locale]);
    $alternateIdUrl = route('landing');
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

    $client = new \App\Services\GraphQLClient();

    $query = '
        fragment SalesPackageFeatureFields on SalesPackageFeature {
          _id
          name
          description
          icon
          category
          priority
          is_active
          status
          createdAt
          updatedAt
        }
        fragment SalesPackagePlanFields on SalesPackagePlan {
          _id
          code
          package_name
          description
          price_monthly
          price_yearly
          user_min
          user_max
          branch_min
          branch_max
          feature_ids
          feature_items {
            ...SalesPackageFeatureFields
          }
          features
          is_recommended
          is_active
          status
          createdAt
          updatedAt
        }
        query GetAllSalesPackagePlans($filter: SalesPackagePlanFilter) {
          GetAllSalesPackagePlans(filter: $filter) {
            data { ...SalesPackagePlanFields }
            total
            page
            limit
          }
        }
    ';

    $variables = [
        'filter' => [
            'page' => 1,
            'limit' => 50,
        ]
    ];

    $response = $client->query($query, $variables);
    $pricingPlans = $response['GetAllSalesPackagePlans']['data'] ?? [];

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
        'pricingPlans' => $pricingPlans,
    ]);
})->whereIn('locale', $supportedLocales)->name('landing');
