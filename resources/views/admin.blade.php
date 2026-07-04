@extends('layouts.app')

@section('content')

<section class="min-h-screen bg-slate-950 text-white py-24">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Header -->
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="inline-flex rounded-full bg-fuchsia-500/10 px-3 py-1 text-sm font-semibold uppercase tracking-[0.3em] text-fuchsia-200">Administration</span>
            <h1 class="mt-4 text-4xl md:text-6xl font-black tracking-tight">Gestion du Portfolio</h1>
            <p class="mt-4 text-slate-300 max-w-2xl mx-auto">
                Interface d'administration pour gérer les événements, contenus et paramètres du site.
            </p>
        </div>

        <!-- Navigation Tabs -->
        <div class="flex flex-wrap justify-center gap-4 mb-12" data-aos="fade-up" data-aos-delay="100">
            <button id="tab-events" class="tab-btn active rounded-full bg-fuchsia-500/20 px-6 py-3 text-sm font-semibold text-fuchsia-200 border border-fuchsia-500/30 transition hover:bg-fuchsia-500/30">
                Événements
            </button>
            <button id="tab-stats" class="tab-btn rounded-full bg-cyan-500/20 px-6 py-3 text-sm font-semibold text-cyan-200 border border-cyan-500/30 transition hover:bg-cyan-500/30">
                Statistiques
            </button>
            <button id="tab-settings" class="tab-btn rounded-full bg-violet-500/20 px-6 py-3 text-sm font-semibold text-violet-200 border border-violet-500/30 transition hover:bg-violet-500/30">
                Paramètres
            </button>
        </div>

        <!-- Events Tab Content -->
        <div id="content-events" class="tab-content">
            @if(session('success'))
                <div class="mb-8 rounded-xl border border-green-400/30 bg-green-500/10 p-4 text-green-200" data-aos="fade-down">
                    <div class="flex items-center gap-3">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            @if(isset($event))
                <!-- Edit Event Form -->
                <div class="mb-8 rounded-[2rem] border border-white/10 bg-white/5 p-8 shadow-2xl shadow-slate-950/20" data-aos="fade-down">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-cyan-500/20 text-cyan-200">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold">Modifier l'événement</h2>
                    </div>

                    <form method="POST" action="/admin/{{ $event->id }}" class="space-y-6" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block text-sm font-semibold text-slate-200 mb-2">Titre de l'événement</label>
                            <input type="text" name="title" value="{{ $event->title }}"
                                   class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white placeholder-slate-400 focus:border-cyan-400 focus:outline-none focus:ring-2 focus:ring-cyan-400/20 transition"
                                   required>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-200 mb-2">Description</label>
                            <textarea name="description" rows="4"
                                      class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white placeholder-slate-400 focus:border-cyan-400 focus:outline-none focus:ring-2 focus:ring-cyan-400/20 transition resize-none"
                                      required>{{ $event->description }}</textarea>
                        </div>

                        <div class="grid gap-4 md:grid-cols-2">
                            <div>
                                <label class="block text-sm font-semibold text-slate-200 mb-2">Type</label>
                                <select name="type" class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white focus:border-cyan-400 focus:outline-none focus:ring-2 focus:ring-cyan-400/20 transition">
                                    <option value="passe" {{ $event->type == 'passe' ? 'selected' : '' }} class="bg-slate-800">Événement passé</option>
                                    <option value="encours" {{ $event->type == 'encours' ? 'selected' : '' }} class="bg-slate-800">En cours</option>
                                    <option value="avenir" {{ $event->type == 'avenir' ? 'selected' : '' }} class="bg-slate-800">À venir</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-200 mb-2">Date</label>
                                <input type="date" name="date" value="{{ $event->date }}"
                                       class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white focus:border-cyan-400 focus:outline-none focus:ring-2 focus:ring-cyan-400/20 transition"
                                       required>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-200 mb-2">Photo de l'événement</label>
                            @if($event->photo)
                                <div class="mb-4">
                                    <img src="/images/{{ $event->photo }}" alt="{{ $event->title }}" class="h-32 w-32 rounded-lg object-cover border border-white/10">
                                </div>
                            @endif
                            <input type="file" name="photo" accept="image/*"
                                   class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white focus:border-cyan-400 focus:outline-none focus:ring-2 focus:ring-cyan-400/20 transition file:bg-cyan-500/20 file:border-0 file:text-cyan-200 file:rounded-lg file:px-3 file:py-2 file:cursor-pointer">
                        </div>

                        <div class="flex gap-4">
                            <button type="submit" class="flex-1 rounded-xl bg-gradient-to-r from-cyan-500 to-blue-500 px-6 py-4 text-base font-semibold text-white shadow-xl shadow-cyan-500/20 transition hover:-translate-y-1 hover:shadow-cyan-500/30 btn-magnetic ripple glow-on-hover">
                                <svg class="mr-2 inline h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Modifier l'événement
                            </button>
                            <a href="/admin" class="rounded-xl border border-white/20 bg-white/5 px-6 py-4 text-base font-semibold text-white transition hover:border-white/30 hover:bg-white/10">
                                Annuler
                            </a>
                        </div>
                    </form>
                </div>
            @endif

            <div class="grid gap-8 lg:grid-cols-2">

                <!-- Add Event Form -->
                <div class="rounded-[2rem] border border-white/10 bg-white/5 p-8 shadow-2xl shadow-slate-950/20" data-aos="fade-right">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-fuchsia-500/20 text-fuchsia-200">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold">Ajouter un événement</h2>
                    </div>

                    <form method="POST" action="/admin" class="space-y-6" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <label class="block text-sm font-semibold text-slate-200 mb-2">Titre de l'événement</label>
                            <input type="text" name="title" placeholder="Ex: Atelier Leadership Féminin"
                                   class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white placeholder-slate-400 focus:border-fuchsia-400 focus:outline-none focus:ring-2 focus:ring-fuchsia-400/20 transition"
                                   required>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-200 mb-2">Description</label>
                            <textarea name="description" rows="4" placeholder="Décrivez l'événement en détail..."
                                      class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white placeholder-slate-400 focus:border-fuchsia-400 focus:outline-none focus:ring-2 focus:ring-fuchsia-400/20 transition resize-none"
                                      required></textarea>
                        </div>

                        <div class="grid gap-4 md:grid-cols-2">
                            <div>
                                <label class="block text-sm font-semibold text-slate-200 mb-2">Type</label>
                                <select name="type" class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white focus:border-fuchsia-400 focus:outline-none focus:ring-2 focus:ring-fuchsia-400/20 transition">
                                    <option value="passe" class="bg-slate-800">Événement passé</option>
                                    <option value="encours" class="bg-slate-800">En cours</option>
                                    <option value="avenir" class="bg-slate-800">À venir</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-200 mb-2">Date</label>
                                <input type="date" name="date"
                                       class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white focus:border-fuchsia-400 focus:outline-none focus:ring-2 focus:ring-fuchsia-400/20 transition"
                                       required>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-200 mb-2">Photo de l'événement</label>
                            <input type="file" name="photo" accept="image/*"
                                   class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white focus:border-fuchsia-400 focus:outline-none focus:ring-2 focus:ring-fuchsia-400/20 transition file:bg-fuchsia-500/20 file:border-0 file:text-fuchsia-200 file:rounded-lg file:px-3 file:py-2 file:cursor-pointer">
                        </div>

                        <button type="submit" class="w-full rounded-xl bg-gradient-to-r from-fuchsia-500 to-cyan-500 px-6 py-4 text-base font-semibold text-white shadow-xl shadow-fuchsia-500/20 transition hover:-translate-y-1 hover:shadow-fuchsia-500/30 btn-magnetic ripple glow-on-hover">
                            <svg class="mr-2 inline h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Ajouter l'événement
                        </button>
                    </form>
                </div>

                <!-- Events List -->
                <div class="rounded-[2rem] border border-white/10 bg-white/5 p-8 shadow-2xl shadow-slate-950/20" data-aos="fade-left">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-cyan-500/20 text-cyan-200">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold">Événements récents</h2>
                    </div>

                    <div class="space-y-4 max-h-96 overflow-y-auto">
                        @if(isset($events) && $events->count())
                            @foreach($events as $event)
                                <div class="rounded-xl border border-white/10 bg-white/5 p-4 transition hover:border-cyan-400/30 hover:bg-cyan-500/5">
                                    <div class="flex items-start justify-between">
                                        <div class="flex-1">
                                            <h3 class="font-semibold text-white">{{ $event->title }}</h3>
                                            <p class="mt-1 text-sm text-slate-300 line-clamp-2">{{ $event->description }}</p>
                                            <div class="mt-2 flex items-center gap-3 text-xs text-slate-400">
                                                <span class="rounded-full bg-slate-700 px-2 py-1">{{ ucfirst($event->type) }}</span>
                                                <span>{{ $event->date ? \Carbon\Carbon::parse($event->date)->format('d M Y') : 'Date non définie' }}</span>
                                            </div>
                                        </div>
                                        <div class="flex gap-2 ml-4">
                                            <a href="/admin/{{ $event->id }}/edit" class="rounded-lg bg-slate-700 p-2 text-slate-300 transition hover:bg-slate-600 hover:text-white">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                            </a>
                                            <form method="POST" action="/admin/{{ $event->id }}" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="rounded-lg bg-red-500/20 p-2 text-red-300 transition hover:bg-red-500/30">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center py-8 text-slate-400">
                                <svg class="mx-auto h-12 w-12 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                                <p class="mt-4 text-slate-400">Aucun événement pour le moment</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Tab Content -->
        <div id="content-stats" class="tab-content hidden">
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                <div class="rounded-[2rem] border border-white/10 bg-white/5 p-6 shadow-2xl shadow-slate-950/20 text-center" data-aos="fade-up">
                    <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-fuchsia-500/20 text-fuchsia-200">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white">1,250+</h3>
                    <p class="text-slate-300">Femmes accompagnées</p>
                </div>

                <div class="rounded-[2rem] border border-white/10 bg-white/5 p-6 shadow-2xl shadow-slate-950/20 text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-cyan-500/20 text-cyan-200">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white">52</h3>
                    <p class="text-slate-300">Événements organisés</p>
                </div>

                <div class="rounded-[2rem] border border-white/10 bg-white/5 p-6 shadow-2xl shadow-slate-950/20 text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-violet-500/20 text-violet-200">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white">98%</h3>
                    <p class="text-slate-300">Taux de satisfaction</p>
                </div>

                <div class="rounded-[2rem] border border-white/10 bg-white/5 p-6 shadow-2xl shadow-slate-950/20 text-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-slate-500/20 text-slate-200">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white">€45K+</h3>
                    <p class="text-slate-300">Impact économique</p>
                </div>
            </div>
        </div>

        <!-- Settings Tab Content -->
        <div id="content-settings" class="tab-content hidden">
            <div class="max-w-2xl mx-auto">
                <div class="rounded-[2rem] border border-white/10 bg-white/5 p-8 shadow-2xl shadow-slate-950/20" data-aos="fade-up">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-violet-500/20 text-violet-200">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold">Paramètres du site</h2>
                    </div>

                    <form class="space-y-6">
                        <div>
                            <label class="block text-sm font-semibold text-slate-200 mb-2">Titre du site</label>
                            <input type="text" value="DJETON Dorice - Leadership Féminin"
                                   class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white placeholder-slate-400 focus:border-violet-400 focus:outline-none focus:ring-2 focus:ring-violet-400/20 transition">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-200 mb-2">Description SEO</label>
                            <textarea rows="3" class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white placeholder-slate-400 focus:border-violet-400 focus:outline-none focus:ring-2 focus:ring-violet-400/20 transition resize-none">Formatrice spécialisée dans le leadership féminin, les soft skills et l'accompagnement professionnel des femmes.</textarea>
                        </div>

                        <div class="grid gap-4 md:grid-cols-2">
                            <div>
                                <label class="block text-sm font-semibold text-slate-200 mb-2">Email de contact</label>
                                <input type="email" value="contact@dorice-djeton.com"
                                       class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white placeholder-slate-400 focus:border-violet-400 focus:outline-none focus:ring-2 focus:ring-violet-400/20 transition">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-200 mb-2">Téléphone</label>
                                <input type="tel" value="+33 6 XX XX XX XX"
                                       class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white placeholder-slate-400 focus:border-violet-400 focus:outline-none focus:ring-2 focus:ring-violet-400/20 transition">
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <span class="text-sm font-semibold text-slate-200">Maintenance mode</span>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer">
                                <div class="w-11 h-6 bg-slate-600 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-violet-300/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-violet-500"></div>
                            </label>
                        </div>

                        <button type="submit" class="w-full rounded-xl bg-gradient-to-r from-violet-500 to-fuchsia-500 px-6 py-4 text-base font-semibold text-white shadow-xl shadow-violet-500/20 transition hover:-translate-y-1 hover:shadow-violet-500/30 btn-magnetic ripple glow-on-hover">
                            <svg class="mr-2 inline h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Sauvegarder les paramètres
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');

    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Remove active class from all buttons
            tabButtons.forEach(btn => btn.classList.remove('active'));
            // Add active class to clicked button
            button.classList.add('active');

            // Hide all tab contents
            tabContents.forEach(content => content.classList.add('hidden'));

            // Show the corresponding tab content
            const tabId = button.id.replace('tab-', 'content-');
            document.getElementById(tabId).classList.remove('hidden');
        });
    });
});
</script>