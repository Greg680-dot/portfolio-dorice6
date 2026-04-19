<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DJETON DORICE</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-950 text-slate-100">
<div id="scroll-progress"></div>

<nav class="fixed inset-x-0 top-0 z-50 border-b border-white/10 bg-slate-950/90 backdrop-blur-xl shadow-slate-950/40">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
        <div class="flex items-center gap-4">
            <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-fuchsia-500 text-sm font-bold text-white">D</span>
            <div>
                <p class="font-semibold">Dorice</p>
                <p class="text-xs text-slate-400">Leadership & formation</p>
            </div>
        </div>
        <div class="hidden items-center gap-6 md:flex text-sm text-slate-200">
            <a href="/" class="transition hover:text-white">Accueil</a>
            <a href="/events" class="transition hover:text-white">Événements</a>
        </div>
    </div>
</nav>

<main class="pt-[92px] px-4 pb-12 sm:px-6 lg:px-8">
    @yield('content')
</main>

</body>
</html>