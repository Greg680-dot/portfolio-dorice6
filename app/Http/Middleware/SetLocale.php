<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Langues disponibles sur le site.
     */
    public const SUPPORTED_LOCALES = ['fr', 'en'];

    /**
     * Applique la langue choisie par le visiteur (mémorisée en session) à chaque requête.
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->session()->get('locale', config('app.locale'));

        if (! in_array($locale, self::SUPPORTED_LOCALES, true)) {
            $locale = config('app.locale');
        }

        App::setLocale($locale);

        return $next($request);
    }
}
