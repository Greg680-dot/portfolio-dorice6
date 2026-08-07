@extends('layouts.app')

@section('title', 'Connexion administration - Dorice DJETON')

@section('content')

<section class="flex min-h-[70vh] items-center justify-center bg-slate-950 text-white py-16">
    <div class="w-full max-w-md rounded-[2rem] border border-white/10 bg-white/5 p-8 shadow-2xl shadow-slate-950/20" data-aos="fade-up">
        <div class="text-center mb-8">
            <span class="inline-flex rounded-full bg-fuchsia-500/10 px-3 py-1 text-sm font-semibold uppercase tracking-[0.3em] text-fuchsia-200">Administration</span>
            <h1 class="mt-4 text-3xl font-black">Connexion</h1>
            <p class="mt-2 text-slate-300">Accès réservé à l'administration du site.</p>
        </div>

        @if ($errors->any())
            <div class="mb-6 rounded-xl border border-red-400/30 bg-red-500/10 p-4 text-red-200">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="/login" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-slate-200 mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white placeholder-slate-400 focus:border-fuchsia-400 focus:outline-none focus:ring-2 focus:ring-fuchsia-400/20 transition"
                       required autofocus>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-200 mb-2">Mot de passe</label>
                <input type="password" name="password"
                       class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white placeholder-slate-400 focus:border-fuchsia-400 focus:outline-none focus:ring-2 focus:ring-fuchsia-400/20 transition"
                       required>
            </div>

            <label class="flex items-center gap-2 text-sm text-slate-300">
                <input type="checkbox" name="remember" class="rounded border-white/20 bg-white/5">
                Se souvenir de moi
            </label>

            <button type="submit" class="w-full rounded-xl bg-gradient-to-r from-fuchsia-500 to-cyan-500 px-6 py-4 text-base font-semibold text-white shadow-xl shadow-fuchsia-500/20 transition hover:-translate-y-1 hover:shadow-fuchsia-500/30 btn-magnetic ripple glow-on-hover">
                Se connecter
            </button>
        </form>
    </div>
</section>

@endsection
