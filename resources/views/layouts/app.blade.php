<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        // Applique le thème choisi avant le premier rendu, pour éviter un flash sombre/clair.
        (function () {
            var theme = localStorage.getItem('theme');
            if (theme === 'light') {
                document.documentElement.classList.add('light');
            }
        })();
        window.heroTypingPhrases = @json(__('site.home.hero.typing_phrases'));
    </script>
    <title>@yield('title', __('site.home.meta_title'))</title>
    <meta name="description" content="@yield('meta_description', __('site.home.meta_description'))">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Dorice DJETON">
    <meta property="og:title" content="@yield('title', __('site.home.meta_title'))">
    <meta property="og:description" content="@yield('meta_description', __('site.home.meta_description'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('og_image', asset('images/2.jpeg'))">
    <meta property="og:locale" content="{{ app()->getLocale() === 'en' ? 'en_US' : 'fr_FR' }}">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', __('site.home.meta_title'))">
    <meta name="twitter:description" content="@yield('meta_description', __('site.home.meta_description'))">
    <meta name="twitter:image" content="@yield('og_image', asset('images/2.jpeg'))">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-950 text-slate-100 light:bg-white light:text-slate-900">
<div id="scroll-progress"></div>

<nav class="fixed inset-x-0 top-0 z-50 border-b border-white/10 bg-slate-950/90 backdrop-blur-xl shadow-slate-950/40 light:border-slate-200 light:bg-white/90">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
        <a href="/" class="flex items-center gap-4">
            <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-fuchsia-500 text-sm font-bold text-white">D</span>
            <div>
                <p class="font-semibold light:text-slate-900">Dorice</p>
                <p class="text-xs text-slate-400 light:text-slate-500">Soft Skills - EMI</p>
            </div>
        </a>

        <div class="hidden items-center gap-6 md:flex text-sm text-slate-200 light:text-slate-600">
            <a href="/" class="transition hover:text-white light:hover:text-slate-950 {{ request()->is('/') ? 'text-white light:text-slate-950 font-semibold' : '' }}" @if(request()->is('/')) aria-current="page" @endif>{{ __('site.nav.home') }}</a>
            <a href="/#expertise" class="transition hover:text-white light:hover:text-slate-950">{{ __('site.nav.expertise') }}</a>
            <a href="/#programmes" class="transition hover:text-white light:hover:text-slate-950">{{ __('site.nav.programmes') }}</a>
            <a href="/publications" class="transition hover:text-white light:hover:text-slate-950 {{ request()->is('publications') ? 'text-white light:text-slate-950 font-semibold' : '' }}" @if(request()->is('publications')) aria-current="page" @endif>{{ __('site.nav.publications') }}</a>
            <a href="/trophees" class="transition hover:text-white light:hover:text-slate-950 {{ request()->is('trophees') || request()->is('trophies') ? 'text-white light:text-slate-950 font-semibold' : '' }}" @if(request()->is('trophees') || request()->is('trophies')) aria-current="page" @endif>{{ __('site.nav.trophies') }}</a>
            <a href="{{ route('lang.switch', app()->getLocale() === 'en' ? 'fr' : 'en') }}" class="inline-flex h-9 min-w-9 items-center justify-center text-xs font-medium text-slate-500 transition hover:text-slate-200 light:text-slate-400 light:hover:text-slate-700" aria-label="{{ __('site.nav.toggle_lang') }}">
                {{ app()->getLocale() === 'en' ? 'FR' : 'EN' }}
            </a>
            <button id="theme-toggle" type="button" class="inline-flex h-9 w-9 items-center justify-center text-slate-500 transition hover:text-slate-200 light:text-slate-400 light:hover:text-slate-700" aria-label="{{ __('site.nav.toggle_theme') }}">
                <svg aria-hidden="true" class="theme-toggle-sun h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <svg aria-hidden="true" class="theme-toggle-moon h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                </svg>
            </button>
            <a href="/#contact" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-fuchsia-500 to-cyan-500 px-5 py-2 text-sm font-semibold text-slate-950 transition hover:-translate-y-0.5 hover:shadow-lg hover:shadow-fuchsia-500/20">{{ __('site.nav.cta') }}</a>
        </div>

        <div class="flex items-center gap-3 md:hidden">
            <a href="{{ route('lang.switch', app()->getLocale() === 'en' ? 'fr' : 'en') }}" class="inline-flex h-11 min-w-11 items-center justify-center text-xs font-medium text-slate-500 transition hover:text-slate-200 light:text-slate-400 light:hover:text-slate-700" aria-label="{{ __('site.nav.toggle_lang') }}">
                {{ app()->getLocale() === 'en' ? 'FR' : 'EN' }}
            </a>
            <button id="theme-toggle-mobile" type="button" class="inline-flex h-11 w-11 items-center justify-center text-slate-500 transition hover:text-slate-200 light:text-slate-400 light:hover:text-slate-700" aria-label="{{ __('site.nav.toggle_theme') }}">
                <svg aria-hidden="true" class="theme-toggle-sun h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <svg aria-hidden="true" class="theme-toggle-moon h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                </svg>
            </button>
            <button id="mobile-menu-button" type="button" class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-white/10 bg-white/5 text-slate-200 transition hover:bg-white/10 light:border-slate-200 light:bg-slate-100 light:text-slate-700" aria-controls="mobile-menu" aria-expanded="false" data-open-label="{{ __('site.nav.open_menu') }}" data-close-label="{{ __('site.nav.close_menu') }}">
                <span id="mobile-menu-button-label" class="sr-only">{{ __('site.nav.open_menu') }}</span>
                <svg id="mobile-menu-icon-open" aria-hidden="true" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg id="mobile-menu-icon-close" aria-hidden="true" class="hidden h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <div id="mobile-menu" class="max-h-0 overflow-hidden opacity-0 invisible border-t border-white/10 bg-slate-950/95 transition-all duration-300 ease-out md:hidden light:border-slate-200 light:bg-white/95" aria-hidden="true" inert>
        <div class="max-w-7xl mx-auto flex flex-col gap-3 px-6 py-4 text-sm text-slate-200 light:text-slate-600">
            <a href="/" class="block rounded-xl px-3 py-2 transition hover:bg-white/10 light:hover:bg-slate-100 {{ request()->is('/') ? 'bg-white/10 light:bg-slate-100 text-white light:text-slate-950 font-semibold' : '' }}">{{ __('site.nav.home') }}</a>
            <a href="/#expertise" class="block rounded-xl px-3 py-2 transition hover:bg-white/10 light:hover:bg-slate-100">{{ __('site.nav.expertise') }}</a>
            <a href="/#programmes" class="block rounded-xl px-3 py-2 transition hover:bg-white/10 light:hover:bg-slate-100">{{ __('site.nav.programmes') }}</a>
            <a href="/publications" class="block rounded-xl px-3 py-2 transition hover:bg-white/10 light:hover:bg-slate-100 {{ request()->is('publications') ? 'bg-white/10 light:bg-slate-100 text-white light:text-slate-950 font-semibold' : '' }}">{{ __('site.nav.publications') }}</a>
            <a href="/trophees" class="block rounded-xl px-3 py-2 transition hover:bg-white/10 light:hover:bg-slate-100 {{ request()->is('trophees') || request()->is('trophies') ? 'bg-white/10 light:bg-slate-100 text-white light:text-slate-950 font-semibold' : '' }}">{{ __('site.nav.trophies') }}</a>
            <a href="/#contact" class="mt-2 inline-flex items-center justify-center rounded-full bg-gradient-to-r from-fuchsia-500 to-cyan-500 px-5 py-3 text-sm font-semibold text-slate-950 transition hover:-translate-y-0.5">{{ __('site.home.hero.cta_contact') }}</a>
        </div>
    </div>
</nav>

<div id="mobile-menu-backdrop" class="fixed inset-0 z-40 bg-slate-950/60 opacity-0 invisible transition-opacity duration-300 md:hidden" aria-hidden="true"></div>

<main class="pt-[92px] px-4 pb-12 sm:px-6 lg:px-8">
    @yield('content')
</main>

<footer class="border-t border-white/10 bg-slate-950 px-4 py-12 text-slate-300 sm:px-6 lg:px-8 light:border-slate-200 light:bg-white light:text-slate-600">
    <div class="mx-auto grid max-w-7xl grid-cols-2 gap-10 md:grid-cols-3">
        <div class="col-span-2 md:col-span-1">
            <a href="/" class="flex items-center gap-3">
                <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-fuchsia-500 text-sm font-bold text-white">D</span>
                <div>
                    <p class="font-semibold text-white light:text-slate-900">Dorice DJETON</p>
                    <p class="text-xs text-slate-400 light:text-slate-500">Soft Skills - EMI</p>
                </div>
            </a>
            <p class="mt-4 max-w-sm text-sm leading-6 text-slate-400 light:text-slate-500">
                {{ __('site.footer.tagline') }}
            </p>
        </div>

        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-500">{{ __('site.footer.navigation') }}</p>
            <div class="mt-4 flex flex-col gap-2 text-sm">
                <a href="/" class="transition hover:text-white light:hover:text-slate-950">{{ __('site.nav.home') }}</a>
                <a href="/#expertise" class="transition hover:text-white light:hover:text-slate-950">{{ __('site.nav.expertise') }}</a>
                <a href="/#programmes" class="transition hover:text-white light:hover:text-slate-950">{{ __('site.nav.programmes') }}</a>
                <a href="/publications" class="transition hover:text-white light:hover:text-slate-950">{{ __('site.nav.publications') }}</a>
                <a href="/trophees" class="transition hover:text-white light:hover:text-slate-950">{{ __('site.nav.trophies') }}</a>
                <a href="/#contact" class="transition hover:text-white light:hover:text-slate-950">{{ __('site.nav.contact') }}</a>
            </div>
        </div>

        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-500">{{ __('site.footer.contact') }}</p>
            <div class="mt-4 flex flex-col gap-2 text-sm">
                <a href="mailto:djetondory@gmail.com" class="transition hover:text-white light:hover:text-slate-950">djetondory@gmail.com</a>
                <a href="https://www.linkedin.com/in/dorice-djeton-" class="transition hover:text-white light:hover:text-slate-950">LinkedIn</a>
                <p class="text-slate-400 light:text-slate-500">{{ __('site.footer.location') }}</p>
            </div>
        </div>
    </div>

    <div class="mx-auto mt-10 max-w-7xl border-t border-white/10 pt-6 text-center text-xs text-slate-500 light:border-slate-200">
        &copy; {{ date('Y') }} Dorice DJETON. {{ __('site.footer.rights') }}
    </div>
</footer>

</body>
</html>
