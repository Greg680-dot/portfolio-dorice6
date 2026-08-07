<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dorice DJETON - Soft Skills, Genre et médias')</title>
    <meta name="description" content="@yield('meta_description', 'Dorice DJETON, journaliste et spécialiste Genre et médias, soft skills et leadership féminin au Bénin.')">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Dorice DJETON">
    <meta property="og:title" content="@yield('title', 'Dorice DJETON - Soft Skills, Genre et médias')">
    <meta property="og:description" content="@yield('meta_description', 'Dorice DJETON, journaliste et spécialiste Genre et médias, soft skills et leadership féminin au Bénin.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('og_image', asset('images/2.jpeg'))">
    <meta property="og:locale" content="fr_FR">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Dorice DJETON - Soft Skills, Genre et médias')">
    <meta name="twitter:description" content="@yield('meta_description', 'Dorice DJETON, journaliste et spécialiste Genre et médias, soft skills et leadership féminin au Bénin.')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/2.jpeg'))">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-950 text-slate-100">
<div id="scroll-progress"></div>

<nav class="fixed inset-x-0 top-0 z-50 border-b border-white/10 bg-slate-950/90 backdrop-blur-xl shadow-slate-950/40">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
        <a href="/" class="flex items-center gap-4">
            <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-fuchsia-500 text-sm font-bold text-white">D</span>
            <div>
                <p class="font-semibold">Dorice</p>
                <p class="text-xs text-slate-400">Soft Skills - EMI</p>
            </div>
        </a>

        <div class="hidden items-center gap-6 md:flex text-sm text-slate-200">
            <a href="/" class="transition hover:text-white {{ request()->is('/') ? 'text-white font-semibold' : '' }}" @if(request()->is('/')) aria-current="page" @endif>Accueil</a>
            <a href="/#expertise" class="transition hover:text-white">Expertise</a>
            <a href="/#programmes" class="transition hover:text-white">Programmes</a>
            <a href="/publications" class="transition hover:text-white {{ request()->is('publications') ? 'text-white font-semibold' : '' }}" @if(request()->is('publications')) aria-current="page" @endif>Mes travaux</a>
            <a href="/trophees" class="transition hover:text-white {{ request()->is('trophees') || request()->is('trophies') ? 'text-white font-semibold' : '' }}" @if(request()->is('trophees') || request()->is('trophies')) aria-current="page" @endif>Distinctions</a>
            <a href="/#contact" class="transition hover:text-white">Contact</a>
            <div id="google_translate_element" class="translate-widget" aria-label="Choisir la langue"></div>
        </div>

        <button id="mobile-menu-button" type="button" class="inline-flex items-center justify-center rounded-full border border-white/10 bg-white/5 p-3 text-slate-200 transition hover:bg-white/10 md:hidden" aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Ouvrir le menu</span>
            <svg aria-hidden="true" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <div id="mobile-menu" class="hidden border-t border-white/10 bg-slate-950/95 md:hidden">
        <div class="max-w-7xl mx-auto flex flex-col gap-3 px-6 py-4 text-sm text-slate-200">
            <a href="/" class="block rounded-xl px-3 py-2 transition hover:bg-white/10 {{ request()->is('/') ? 'bg-white/10 text-white font-semibold' : '' }}">Accueil</a>
            <a href="/#expertise" class="block rounded-xl px-3 py-2 transition hover:bg-white/10">Expertise</a>
            <a href="/#programmes" class="block rounded-xl px-3 py-2 transition hover:bg-white/10">Programmes</a>
            <a href="/publications" class="block rounded-xl px-3 py-2 transition hover:bg-white/10 {{ request()->is('publications') ? 'bg-white/10 text-white font-semibold' : '' }}">Publications</a>
            <a href="/trophees" class="block rounded-xl px-3 py-2 transition hover:bg-white/10 {{ request()->is('trophees') || request()->is('trophies') ? 'bg-white/10 text-white font-semibold' : '' }}">Trophées</a>
            <a href="/#contact" class="block rounded-xl px-3 py-2 transition hover:bg-white/10">Contact</a>
            <div id="google_translate_element_mobile" class="translate-widget mt-2" aria-label="Choisir la langue"></div>
        </div>
    </div>
</nav>

<main class="pt-[92px] px-4 pb-12 sm:px-6 lg:px-8">
    @yield('content')
</main>

<footer class="border-t border-white/10 bg-slate-950 px-4 py-12 text-slate-300 sm:px-6 lg:px-8">
    <div class="mx-auto grid max-w-7xl gap-10 md:grid-cols-3">
        <div>
            <a href="/" class="flex items-center gap-3">
                <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-fuchsia-500 text-sm font-bold text-white">D</span>
                <div>
                    <p class="font-semibold text-white">Dorice DJETON</p>
                    <p class="text-xs text-slate-400">Soft Skills - EMI</p>
                </div>
            </a>
            <p class="mt-4 max-w-sm text-sm leading-6 text-slate-400">
                Journaliste, experte Genre et médias et spécialiste des soft skills, au service du leadership féminin et de l'engagement citoyen au Bénin.
            </p>
        </div>

        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-500">Navigation</p>
            <div class="mt-4 flex flex-col gap-2 text-sm">
                <a href="/" class="transition hover:text-white">Accueil</a>
                <a href="/#expertise" class="transition hover:text-white">Expertise</a>
                <a href="/publications" class="transition hover:text-white">Publications</a>
                <a href="/trophees" class="transition hover:text-white">Trophées</a>
                <a href="/#contact" class="transition hover:text-white">Contact</a>
            </div>
        </div>

        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-500">Contact</p>
            <div class="mt-4 flex flex-col gap-2 text-sm">
                <a href="mailto:djetondory@gmail.com" class="transition hover:text-white">djetondory@gmail.com</a>
                <a href="https://www.linkedin.com/in/dorice-djeton-" class="transition hover:text-white">LinkedIn</a>
                <p class="text-slate-400">Abomey-Calavi, Atlantique, Bénin</p>
            </div>
        </div>
    </div>

    <div class="mx-auto mt-10 max-w-7xl border-t border-white/10 pt-6 text-center text-xs text-slate-500">
        &copy; {{ date('Y') }} Dorice DJETON. Tous droits réservés.
    </div>
</footer>

<script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'fr',
            includedLanguages: 'fr,en,es,pt,de',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
            autoDisplay: false,
        }, 'google_translate_element');

        new google.translate.TranslateElement({
            pageLanguage: 'fr',
            includedLanguages: 'fr,en,es,pt,de',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
            autoDisplay: false,
        }, 'google_translate_element_mobile');
    }
</script>
<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" async></script>

</body>
</html>
