<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dorice DJETON - Soft Skills, Genre et medias</title>

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
            <a href="/" class="transition hover:text-white">Accueil</a>
            <a href="/#expertise" class="transition hover:text-white">Expertise</a>
            <a href="/#programmes" class="transition hover:text-white">Programmes</a>
            <a href="/publications" class="transition hover:text-white">Publications</a>
            <a href="/#contact" class="transition hover:text-white">Contact</a>
        </div>

        <button id="mobile-menu-button" type="button" class="inline-flex items-center justify-center rounded-full border border-white/10 bg-white/5 p-3 text-slate-200 transition hover:bg-white/10 md:hidden" aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Ouvrir le menu</span>
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <div id="mobile-menu" class="hidden border-t border-white/10 bg-slate-950/95 md:hidden">
        <div class="max-w-7xl mx-auto flex flex-col gap-3 px-6 py-4 text-sm text-slate-200">
            <a href="/" class="block rounded-xl px-3 py-2 transition hover:bg-white/10">Accueil</a>
            <a href="/#expertise" class="block rounded-xl px-3 py-2 transition hover:bg-white/10">Expertise</a>
            <a href="/#programmes" class="block rounded-xl px-3 py-2 transition hover:bg-white/10">Programmes</a>
            <a href="/publications" class="block rounded-xl px-3 py-2 transition hover:bg-white/10">Publications</a>
            <a href="/#contact" class="block rounded-xl px-3 py-2 transition hover:bg-white/10">Contact</a>
        </div>
    </div>
</nav>

<main class="pt-[92px] px-4 pb-12 sm:px-6 lg:px-8">
    @yield('content')
</main>

</body>
</html>