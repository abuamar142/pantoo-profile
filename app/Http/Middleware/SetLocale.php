<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $supportedLocales = ['id', 'en'];
        $routeLocale = $request->route('locale');

        if (is_string($routeLocale) && in_array($routeLocale, $supportedLocales, true)) {
            $locale = $routeLocale;
            session(['locale' => $locale]);
        } else {
            $locale = session('locale', config('app.locale', 'id'));

            if (! in_array($locale, $supportedLocales, true)) {
                $locale = config('app.fallback_locale', 'en');
            }
        }

        app()->setLocale($locale);

        return $next($request);
    }
}
