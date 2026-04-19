@extends('layouts.app')

@section('content')

<section class="py-24 bg-slate-950 text-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="inline-flex rounded-full bg-fuchsia-500/10 px-3 py-1 text-sm font-semibold uppercase tracking-[0.3em] text-fuchsia-200">Événements</span>
            <h1 class="mt-4 text-5xl font-black tracking-tight">Programmes et formations</h1>
            <p class="mt-6 text-lg text-slate-300 max-w-2xl mx-auto">
                Découvrez tous les événements passés, en cours et à venir. Des expériences uniques pour développer votre potentiel.
            </p>
        </div>

        <!-- ÉVÉNEMENTS À VENIR -->
        @if($events->where('type', 'avenir')->count() > 0)
        <div class="mb-20" data-aos="fade-up">
            <div class="flex items-center gap-4 mb-8">
                <div class="h-px bg-gradient-to-r from-fuchsia-500 to-cyan-500 flex-1"></div>
                <span class="inline-flex rounded-full bg-fuchsia-500/10 px-4 py-2 text-sm font-semibold uppercase tracking-[0.3em] text-fuchsia-200">À venir</span>
                <div class="h-px bg-gradient-to-r from-cyan-500 to-fuchsia-500 flex-1"></div>
            </div>
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($events->where('type', 'avenir') as $event)
                <article class="group overflow-hidden rounded-[2rem] border border-white/10 bg-white/5 shadow-2xl shadow-slate-950/20 transition hover:-translate-y-2 hover:border-fuchsia-300/30">
                    <div class="relative overflow-hidden">
                        <div class="aspect-[4/3] bg-gradient-to-br from-fuchsia-500/20 via-cyan-500/10 to-violet-500/20 flex items-center justify-center">
                            <div class="text-center">
                                <div class="inline-flex h-16 w-16 items-center justify-center rounded-3xl bg-fuchsia-500/20 text-fuchsia-200 text-2xl font-bold mb-4">
                                    📅
                                </div>
                                <p class="text-xs uppercase tracking-[0.25em] text-white/70">Prochainement</p>
                            </div>
                        </div>
                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-slate-950/90 to-transparent p-6">
                            <span class="inline-flex rounded-full bg-fuchsia-100/90 px-3 py-1 text-xs uppercase tracking-[0.24em] text-fuchsia-700">{{ strtoupper($event->type ?? 'Événement') }}</span>
                            <h3 class="mt-3 text-xl font-bold text-white">{{ $event->title }}</h3>
                        </div>
                    </div>
                    <div class="p-8">
                        <p class="text-slate-300 leading-7 mb-6">{{ $event->description }}</p>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-slate-400">{{ $event->date ? \Carbon\Carbon::parse($event->date)->format('d M Y') : 'Date à confirmer' }}</span>
                            <span class="rounded-full bg-fuchsia-500/10 px-3 py-1 text-fuchsia-200">À venir</span>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
        @endif

        <!-- ÉVÉNEMENTS EN COURS -->
        @if($events->where('type', 'encours')->count() > 0)
        <div class="mb-20" data-aos="fade-up" data-aos-delay="200">
            <div class="flex items-center gap-4 mb-8">
                <div class="h-px bg-gradient-to-r from-cyan-500 to-violet-500 flex-1"></div>
                <span class="inline-flex rounded-full bg-cyan-500/10 px-4 py-2 text-sm font-semibold uppercase tracking-[0.3em] text-cyan-200">En cours</span>
                <div class="h-px bg-gradient-to-r from-violet-500 to-cyan-500 flex-1"></div>
            </div>
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($events->where('type', 'encours') as $event)
                <article class="group overflow-hidden rounded-[2rem] border border-white/10 bg-gradient-to-br from-cyan-500/10 to-violet-500/10 shadow-2xl shadow-slate-950/20 transition hover:-translate-y-2 hover:border-cyan-300/30">
                    <div class="relative overflow-hidden">
                        <div class="aspect-[4/3] bg-gradient-to-br from-cyan-500/20 via-violet-500/10 to-fuchsia-500/20 flex items-center justify-center">
                            <div class="text-center">
                                <div class="inline-flex h-16 w-16 items-center justify-center rounded-3xl bg-cyan-500/20 text-cyan-200 text-2xl font-bold mb-4 animate-pulse">
                                    🚀
                                </div>
                                <p class="text-xs uppercase tracking-[0.25em] text-white/70">Actuellement</p>
                            </div>
                        </div>
                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-slate-950/90 to-transparent p-6">
                            <span class="inline-flex rounded-full bg-cyan-100/90 px-3 py-1 text-xs uppercase tracking-[0.24em] text-cyan-700">{{ strtoupper($event->type ?? 'Événement') }}</span>
                            <h3 class="mt-3 text-xl font-bold text-white">{{ $event->title }}</h3>
                        </div>
                    </div>
                    <div class="p-8">
                        <p class="text-slate-300 leading-7 mb-6">{{ $event->description }}</p>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-slate-400">{{ $event->date ? \Carbon\Carbon::parse($event->date)->format('d M Y') : 'En cours' }}</span>
                            <span class="rounded-full bg-cyan-500/10 px-3 py-1 text-cyan-200">En cours</span>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
        @endif

        <!-- ÉVÉNEMENTS PASSÉS -->
        @if($events->where('type', 'passe')->count() > 0)
        <div class="mb-20" data-aos="fade-up" data-aos-delay="400">
            <div class="flex items-center gap-4 mb-8">
                <div class="h-px bg-gradient-to-r from-violet-500 to-fuchsia-500 flex-1"></div>
                <span class="inline-flex rounded-full bg-violet-500/10 px-4 py-2 text-sm font-semibold uppercase tracking-[0.3em] text-violet-200">Passés</span>
                <div class="h-px bg-gradient-to-r from-fuchsia-500 to-violet-500 flex-1"></div>
            </div>
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($events->where('type', 'passe') as $event)
                <article class="group overflow-hidden rounded-[2rem] border border-white/10 bg-white/5 shadow-2xl shadow-slate-950/20 transition hover:-translate-y-2 hover:border-violet-300/30 opacity-75 hover:opacity-100">
                    <div class="relative overflow-hidden">
                        <div class="aspect-[4/3] bg-gradient-to-br from-violet-500/20 via-fuchsia-500/10 to-slate-500/20 flex items-center justify-center">
                            <div class="text-center">
                                <div class="inline-flex h-16 w-16 items-center justify-center rounded-3xl bg-violet-500/20 text-violet-200 text-2xl font-bold mb-4">
                                    ✅
                                </div>
                                <p class="text-xs uppercase tracking-[0.25em] text-white/70">Terminé</p>
                            </div>
                        </div>
                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-slate-950/90 to-transparent p-6">
                            <span class="inline-flex rounded-full bg-violet-100/90 px-3 py-1 text-xs uppercase tracking-[0.24em] text-violet-700">{{ strtoupper($event->type ?? 'Événement') }}</span>
                            <h3 class="mt-3 text-xl font-bold text-white">{{ $event->title }}</h3>
                        </div>
                    </div>
                    <div class="p-8">
                        <p class="text-slate-300 leading-7 mb-6">{{ $event->description }}</p>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-slate-400">{{ $event->date ? \Carbon\Carbon::parse($event->date)->format('d M Y') : 'Terminé' }}</span>
                            <span class="rounded-full bg-violet-500/10 px-3 py-1 text-violet-200">Passé</span>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
        @endif

        <!-- MESSAGE SI AUCUN ÉVÉNEMENT -->
        @if($events->count() === 0)
        <div class="text-center py-20" data-aos="fade-up">
            <div class="inline-flex h-24 w-24 items-center justify-center rounded-3xl bg-slate-800 text-slate-400 text-4xl mb-6">
                📅
            </div>
            <h3 class="text-2xl font-bold text-white mb-4">Aucun événement pour le moment</h3>
            <p class="text-slate-400 max-w-md mx-auto">
                Revenez bientôt pour découvrir nos prochains programmes et formations exclusives.
            </p>
        </div>
        @endif
    </div>
</section>

@endsection