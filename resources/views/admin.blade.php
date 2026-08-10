@extends('layouts.app')

@section('title', 'Administration - Dorice DJETON')
@section('meta_description', "Espace d'administration du site de Dorice DJETON.")

@section('content')

<section class="min-h-screen bg-slate-950 text-white py-24 light:bg-white light:text-slate-900">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Header -->
        <div class="relative text-center mb-12" data-aos="fade-up">
            <form method="POST" action="/logout" class="absolute right-0 top-0">
                @csrf
                <button type="submit" class="rounded-full border border-white/15 bg-white/5 px-4 py-2 text-sm font-semibold text-white transition hover:bg-white/10 light:border-slate-300 light:bg-slate-50 light:text-slate-900">
                    Déconnexion
                </button>
            </form>
            <span class="inline-flex rounded-full bg-fuchsia-500/10 px-3 py-1 text-sm font-semibold uppercase tracking-[0.3em] text-fuchsia-200 light:bg-fuchsia-50 light:text-fuchsia-700">Administration</span>
            <h1 class="mt-4 text-4xl md:text-6xl font-black tracking-tight">Gestion du Portfolio</h1>
            <p class="mt-4 text-slate-300 max-w-2xl mx-auto light:text-slate-600">
                Interface d'administration pour gérer les événements et les trophées du site.
            </p>
        </div>

        <!-- Navigation Tabs -->
        <div class="flex flex-wrap justify-center gap-4 mb-12" data-aos="fade-up" data-aos-delay="100">
            <button id="tab-events" class="tab-btn active rounded-full bg-fuchsia-500/20 px-6 py-3 text-sm font-semibold text-fuchsia-200 border border-fuchsia-500/30 transition hover:bg-fuchsia-500/30 light:text-fuchsia-700">
                Événements
            </button>
            <button id="tab-trophies" class="tab-btn rounded-full bg-violet-500/20 px-6 py-3 text-sm font-semibold text-violet-200 border border-violet-500/30 transition hover:bg-violet-500/30 light:text-violet-700">
                Trophées
            </button>
        </div>

        <!-- Events Tab Content -->
        <div id="content-events" class="tab-content">
            @if(session('success'))
                <div class="mb-8 rounded-xl border border-green-400/30 bg-green-500/10 p-4 text-green-200 light:bg-green-50 light:text-green-700" data-aos="fade-down">
                    <div class="flex items-center gap-3">
                        <svg aria-hidden="true" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            @if(isset($event))
                <!-- Edit Event Form -->
                <div class="mb-8 rounded-[2rem] border border-white/10 bg-white/5 p-8 shadow-2xl shadow-slate-950/20 light:border-slate-200 light:bg-slate-50" data-aos="fade-down">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-cyan-500/20 text-cyan-200 light:text-cyan-700">
                            <svg aria-hidden="true" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold">Modifier l'événement</h2>
                    </div>

                    <form method="POST" action="/admin/{{ $event->id }}" class="space-y-6" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block text-sm font-semibold text-slate-200 mb-2 light:text-slate-700">Titre de l'événement</label>
                            <input type="text" name="title" value="{{ old('title', $event->title) }}"
                                   class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white placeholder-slate-400 focus:border-cyan-400 focus:outline-none focus:ring-2 focus:ring-cyan-400/20 transition light:border-slate-300 light:bg-white light:text-slate-900 light:placeholder-slate-400"
                                   required>
                            @error('title')<p class="mt-2 text-sm text-red-300 light:text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-200 mb-2 light:text-slate-700">Description</label>
                            <textarea name="description" rows="4"
                                      class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white placeholder-slate-400 focus:border-cyan-400 focus:outline-none focus:ring-2 focus:ring-cyan-400/20 transition resize-none light:border-slate-300 light:bg-white light:text-slate-900 light:placeholder-slate-400"
                                      required>{{ old('description', $event->description) }}</textarea>
                            @error('description')<p class="mt-2 text-sm text-red-300 light:text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="grid gap-4 md:grid-cols-2">
                            <div>
                                <label class="block text-sm font-semibold text-slate-200 mb-2 light:text-slate-700">Type</label>
                                <select name="type" class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white focus:border-cyan-400 focus:outline-none focus:ring-2 focus:ring-cyan-400/20 transition light:border-slate-300 light:bg-white light:text-slate-900">
                                    <option value="passe" {{ old('type', $event->type) == 'passe' ? 'selected' : '' }} class="bg-slate-800">Événement passé</option>
                                    <option value="encours" {{ old('type', $event->type) == 'encours' ? 'selected' : '' }} class="bg-slate-800">En cours</option>
                                    <option value="avenir" {{ old('type', $event->type) == 'avenir' ? 'selected' : '' }} class="bg-slate-800">À venir</option>
                                </select>
                                @error('type')<p class="mt-2 text-sm text-red-300 light:text-red-600">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-200 mb-2 light:text-slate-700">Date</label>
                                <input type="date" name="date" value="{{ old('date', $event->date) }}"
                                       class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white focus:border-cyan-400 focus:outline-none focus:ring-2 focus:ring-cyan-400/20 transition light:border-slate-300 light:bg-white light:text-slate-900"
                                       required>
                                @error('date')<p class="mt-2 text-sm text-red-300 light:text-red-600">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-200 mb-2 light:text-slate-700">Photo de l'événement</label>
                            @if($event->photo)
                                <div class="mb-4">
                                    <img src="/images/{{ $event->photo }}" alt="{{ $event->title }}" class="h-32 w-32 rounded-lg object-cover border border-white/10 light:border-slate-200">
                                </div>
                            @endif
                            <input type="file" name="photo" accept="image/*"
                                   class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white focus:border-cyan-400 focus:outline-none focus:ring-2 focus:ring-cyan-400/20 transition file:bg-cyan-500/20 file:border-0 file:text-cyan-200 file:rounded-lg file:px-3 file:py-2 file:cursor-pointer light:border-slate-300 light:bg-white light:text-slate-900">
                            @error('photo')<p class="mt-2 text-sm text-red-300 light:text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="flex gap-4">
                            <button type="submit" class="flex-1 rounded-xl bg-gradient-to-r from-cyan-500 to-blue-500 px-6 py-4 text-base font-semibold text-white shadow-xl shadow-cyan-500/20 transition hover:-translate-y-1 hover:shadow-cyan-500/30 btn-magnetic ripple glow-on-hover">
                                <svg aria-hidden="true" class="mr-2 inline h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Modifier l'événement
                            </button>
                            <a href="/admin" class="rounded-xl border border-white/20 bg-white/5 px-6 py-4 text-base font-semibold text-white transition hover:border-white/30 hover:bg-white/10 light:border-slate-300 light:bg-slate-50 light:text-slate-900">
                                Annuler
                            </a>
                        </div>
                    </form>
                </div>
            @endif

            <div class="grid gap-8 lg:grid-cols-2">

                <!-- Add Event Form -->
                <div class="rounded-[2rem] border border-white/10 bg-white/5 p-8 shadow-2xl shadow-slate-950/20 light:border-slate-200 light:bg-slate-50" data-aos="fade-right">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-fuchsia-500/20 text-fuchsia-200 light:text-fuchsia-700">
                            <svg aria-hidden="true" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold">Ajouter un événement</h2>
                    </div>

                    <form method="POST" action="/admin" class="space-y-6" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <label class="block text-sm font-semibold text-slate-200 mb-2 light:text-slate-700">Titre de l'événement</label>
                            <input type="text" name="title" value="{{ old('title') }}" placeholder="Ex: Atelier Leadership Féminin"
                                   class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white placeholder-slate-400 focus:border-fuchsia-400 focus:outline-none focus:ring-2 focus:ring-fuchsia-400/20 transition light:border-slate-300 light:bg-white light:text-slate-900 light:placeholder-slate-400"
                                   required>
                            @error('title')<p class="mt-2 text-sm text-red-300 light:text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-200 mb-2 light:text-slate-700">Description</label>
                            <textarea name="description" rows="4" placeholder="Décrivez l'événement en détail..."
                                      class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white placeholder-slate-400 focus:border-fuchsia-400 focus:outline-none focus:ring-2 focus:ring-fuchsia-400/20 transition resize-none light:border-slate-300 light:bg-white light:text-slate-900 light:placeholder-slate-400"
                                      required>{{ old('description') }}</textarea>
                            @error('description')<p class="mt-2 text-sm text-red-300 light:text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="grid gap-4 md:grid-cols-2">
                            <div>
                                <label class="block text-sm font-semibold text-slate-200 mb-2 light:text-slate-700">Type</label>
                                <select name="type" class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white focus:border-fuchsia-400 focus:outline-none focus:ring-2 focus:ring-fuchsia-400/20 transition light:border-slate-300 light:bg-white light:text-slate-900">
                                    <option value="passe" {{ old('type') == 'passe' ? 'selected' : '' }} class="bg-slate-800">Événement passé</option>
                                    <option value="encours" {{ old('type') == 'encours' ? 'selected' : '' }} class="bg-slate-800">En cours</option>
                                    <option value="avenir" {{ old('type') == 'avenir' ? 'selected' : '' }} class="bg-slate-800">À venir</option>
                                </select>
                                @error('type')<p class="mt-2 text-sm text-red-300 light:text-red-600">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-200 mb-2 light:text-slate-700">Date</label>
                                <input type="date" name="date" value="{{ old('date') }}"
                                       class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white focus:border-fuchsia-400 focus:outline-none focus:ring-2 focus:ring-fuchsia-400/20 transition light:border-slate-300 light:bg-white light:text-slate-900"
                                       required>
                                @error('date')<p class="mt-2 text-sm text-red-300 light:text-red-600">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-200 mb-2 light:text-slate-700">Photo de l'événement</label>
                            <input type="file" name="photo" accept="image/*"
                                   class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white focus:border-fuchsia-400 focus:outline-none focus:ring-2 focus:ring-fuchsia-400/20 transition file:bg-fuchsia-500/20 file:border-0 file:text-fuchsia-200 file:rounded-lg file:px-3 file:py-2 file:cursor-pointer light:border-slate-300 light:bg-white light:text-slate-900">
                            @error('photo')<p class="mt-2 text-sm text-red-300 light:text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <button type="submit" class="w-full rounded-xl bg-gradient-to-r from-fuchsia-500 to-cyan-500 px-6 py-4 text-base font-semibold text-white shadow-xl shadow-fuchsia-500/20 transition hover:-translate-y-1 hover:shadow-fuchsia-500/30 btn-magnetic ripple glow-on-hover">
                            <svg aria-hidden="true" class="mr-2 inline h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Ajouter l'événement
                        </button>
                    </form>
                </div>

                <!-- Events List -->
                <div class="rounded-[2rem] border border-white/10 bg-white/5 p-8 shadow-2xl shadow-slate-950/20 light:border-slate-200 light:bg-slate-50" data-aos="fade-left">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-cyan-500/20 text-cyan-200 light:text-cyan-700">
                            <svg aria-hidden="true" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold">Événements récents</h2>
                    </div>

                    <div class="space-y-4 max-h-96 overflow-y-auto">
                        @if(isset($events) && $events->count())
                            @foreach($events as $event)
                                <div class="rounded-xl border border-white/10 bg-white/5 p-4 transition hover:border-cyan-400/30 hover:bg-cyan-500/5 light:border-slate-200 light:bg-white">
                                    <div class="flex items-start justify-between">
                                        <div class="flex-1">
                                            <h3 class="font-semibold text-white light:text-slate-900">{{ $event->title }}</h3>
                                            <p class="mt-1 text-sm text-slate-300 line-clamp-2 light:text-slate-600">{{ $event->description }}</p>
                                            <div class="mt-2 flex items-center gap-3 text-xs text-slate-400 light:text-slate-500">
                                                <span class="rounded-full bg-slate-700 px-2 py-1 light:bg-slate-200 light:text-slate-700">{{ ucfirst($event->type) }}</span>
                                                <span>{{ $event->date ? \Carbon\Carbon::parse($event->date)->format('d M Y') : 'Date non définie' }}</span>
                                            </div>
                                        </div>
                                        <div class="flex gap-2 ml-4">
                                            <a href="/admin/{{ $event->id }}/edit" class="rounded-lg bg-slate-700 p-2 text-slate-300 transition hover:bg-slate-600 hover:text-white light:bg-slate-200 light:text-slate-700 light:hover:bg-slate-300 light:hover:text-slate-900">
                                                <svg aria-hidden="true" class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                            </a>
                                            <form method="POST" action="/admin/{{ $event->id }}" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="rounded-lg bg-red-500/20 p-2 text-red-300 transition hover:bg-red-500/30 light:bg-red-50 light:text-red-600">
                                                    <svg aria-hidden="true" class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center py-8 text-slate-400 light:text-slate-500">
                                <svg aria-hidden="true" class="mx-auto h-12 w-12 text-slate-500 light:text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                                <p class="mt-4 text-slate-400 light:text-slate-500">Aucun événement pour le moment</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Trophies Tab Content -->
        <div id="content-trophies" class="tab-content hidden">
            @if(session('success'))
                <div class="mb-8 rounded-xl border border-green-400/30 bg-green-500/10 p-4 text-green-200 light:bg-green-50 light:text-green-700" data-aos="fade-down">
                    <div class="flex items-center gap-3">
                        <svg aria-hidden="true" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            @if(isset($trophy))
                <!-- Edit Trophy Form -->
                <div class="mb-8 rounded-[2rem] border border-white/10 bg-white/5 p-8 shadow-2xl shadow-slate-950/20 light:border-slate-200 light:bg-slate-50" data-aos="fade-down">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-violet-500/20 text-violet-200 light:text-violet-700">
                            <svg aria-hidden="true" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold">Modifier le trophée</h2>
                    </div>

                    <form method="POST" action="/admin/trophees/{{ $trophy->id }}" class="space-y-6" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block text-sm font-semibold text-slate-200 mb-2 light:text-slate-700">Titre du trophée</label>
                            <input type="text" name="title" value="{{ old('title', $trophy->title) }}"
                                   class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white placeholder-slate-400 focus:border-violet-400 focus:outline-none focus:ring-2 focus:ring-violet-400/20 transition light:border-slate-300 light:bg-white light:text-slate-900 light:placeholder-slate-400"
                                   required>
                            @error('title')<p class="mt-2 text-sm text-red-300 light:text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-200 mb-2 light:text-slate-700">Description</label>
                            <textarea name="description" rows="4"
                                      class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white placeholder-slate-400 focus:border-violet-400 focus:outline-none focus:ring-2 focus:ring-violet-400/20 transition resize-none light:border-slate-300 light:bg-white light:text-slate-900 light:placeholder-slate-400"
                                      required>{{ old('description', $trophy->description) }}</textarea>
                            @error('description')<p class="mt-2 text-sm text-red-300 light:text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-200 mb-2 light:text-slate-700">Date</label>
                            <input type="date" name="date" value="{{ old('date', $trophy->date) }}"
                                   class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white focus:border-violet-400 focus:outline-none focus:ring-2 focus:ring-violet-400/20 transition light:border-slate-300 light:bg-white light:text-slate-900"
                                   required>
                            @error('date')<p class="mt-2 text-sm text-red-300 light:text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-200 mb-2 light:text-slate-700">Photo du trophée</label>
                            @if($trophy->photo)
                                <div class="mb-4">
                                    <img src="/images/{{ $trophy->photo }}" alt="{{ $trophy->title }}" class="h-32 w-32 rounded-lg object-cover border border-white/10 light:border-slate-200">
                                </div>
                            @endif
                            <input type="file" name="photo" accept="image/*"
                                   class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white focus:border-violet-400 focus:outline-none focus:ring-2 focus:ring-violet-400/20 transition file:bg-violet-500/20 file:border-0 file:text-violet-200 file:rounded-lg file:px-3 file:py-2 file:cursor-pointer light:border-slate-300 light:bg-white light:text-slate-900">
                            @error('photo')<p class="mt-2 text-sm text-red-300 light:text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="flex gap-4">
                            <button type="submit" class="flex-1 rounded-xl bg-gradient-to-r from-violet-500 to-purple-500 px-6 py-4 text-base font-semibold text-white shadow-xl shadow-violet-500/20 transition hover:-translate-y-1 hover:shadow-violet-500/30 btn-magnetic ripple glow-on-hover">
                                <svg aria-hidden="true" class="mr-2 inline h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Modifier le trophée
                            </button>
                            <a href="/admin" class="rounded-xl border border-white/20 bg-white/5 px-6 py-4 text-base font-semibold text-white transition hover:border-white/30 hover:bg-white/10 light:border-slate-300 light:bg-slate-50 light:text-slate-900">
                                Annuler
                            </a>
                        </div>
                    </form>
                </div>
            @endif

            <div class="grid gap-8 lg:grid-cols-2">

                <!-- Add Trophy Form -->
                <div class="rounded-[2rem] border border-white/10 bg-white/5 p-8 shadow-2xl shadow-slate-950/20 light:border-slate-200 light:bg-slate-50" data-aos="fade-right">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-violet-500/20 text-violet-200 light:text-violet-700">
                            <svg aria-hidden="true" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold">Ajouter un trophée</h2>
                    </div>

                    <form method="POST" action="/admin/trophees" class="space-y-6" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <label class="block text-sm font-semibold text-slate-200 mb-2 light:text-slate-700">Titre du trophée</label>
                            <input type="text" name="title" value="{{ old('title') }}" placeholder="Ex: Assouka Woman 2026"
                                   class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white placeholder-slate-400 focus:border-violet-400 focus:outline-none focus:ring-2 focus:ring-violet-400/20 transition light:border-slate-300 light:bg-white light:text-slate-900 light:placeholder-slate-400"
                                   required>
                            @error('title')<p class="mt-2 text-sm text-red-300 light:text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-200 mb-2 light:text-slate-700">Description</label>
                            <textarea name="description" rows="4" placeholder="Décrivez le trophée ou le prix en détail..."
                                      class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white placeholder-slate-400 focus:border-violet-400 focus:outline-none focus:ring-2 focus:ring-violet-400/20 transition resize-none light:border-slate-300 light:bg-white light:text-slate-900 light:placeholder-slate-400"
                                      required>{{ old('description') }}</textarea>
                            @error('description')<p class="mt-2 text-sm text-red-300 light:text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-200 mb-2 light:text-slate-700">Date</label>
                            <input type="date" name="date" value="{{ old('date') }}"
                                   class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white focus:border-violet-400 focus:outline-none focus:ring-2 focus:ring-violet-400/20 transition light:border-slate-300 light:bg-white light:text-slate-900"
                                   required>
                            @error('date')<p class="mt-2 text-sm text-red-300 light:text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-200 mb-2 light:text-slate-700">Photo du trophée</label>
                            <input type="file" name="photo" accept="image/*"
                                   class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white focus:border-violet-400 focus:outline-none focus:ring-2 focus:ring-violet-400/20 transition file:bg-violet-500/20 file:border-0 file:text-violet-200 file:rounded-lg file:px-3 file:py-2 file:cursor-pointer light:border-slate-300 light:bg-white light:text-slate-900">
                            @error('photo')<p class="mt-2 text-sm text-red-300 light:text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <button type="submit" class="w-full rounded-xl bg-gradient-to-r from-violet-500 to-purple-500 px-6 py-4 text-base font-semibold text-white shadow-xl shadow-violet-500/20 transition hover:-translate-y-1 hover:shadow-violet-500/30 btn-magnetic ripple glow-on-hover">
                            <svg aria-hidden="true" class="mr-2 inline h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Ajouter le trophée
                        </button>
                    </form>
                </div>

                <!-- Trophies List -->
                <div class="rounded-[2rem] border border-white/10 bg-white/5 p-8 shadow-2xl shadow-slate-950/20 light:border-slate-200 light:bg-slate-50" data-aos="fade-left">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-violet-500/20 text-violet-200 light:text-violet-700">
                            <svg aria-hidden="true" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold">Trophées enregistrés</h2>
                    </div>

                    <div class="space-y-4 max-h-96 overflow-y-auto">
                        @if(isset($trophies) && $trophies->count())
                            @foreach($trophies as $t)
                                <div class="rounded-xl border border-white/10 bg-white/5 p-4 transition hover:border-violet-400/30 hover:bg-violet-500/5 light:border-slate-200 light:bg-white">
                                    <div class="flex items-start justify-between">
                                        <div class="flex-1">
                                            <h3 class="font-semibold text-white light:text-slate-900">{{ $t->title }}</h3>
                                            <p class="mt-1 text-sm text-slate-300 line-clamp-2 light:text-slate-600">{{ $t->description }}</p>
                                            <div class="mt-2 flex items-center gap-3 text-xs text-slate-400 light:text-slate-500">
                                                <span>{{ $t->date ? \Carbon\Carbon::parse($t->date)->format('d M Y') : 'Date non définie' }}</span>
                                            </div>
                                        </div>
                                        <div class="flex gap-2 ml-4">
                                            <a href="/admin/trophees/{{ $t->id }}/edit" class="rounded-lg bg-slate-700 p-2 text-slate-300 transition hover:bg-slate-600 hover:text-white light:bg-slate-200 light:text-slate-700 light:hover:bg-slate-300 light:hover:text-slate-900">
                                                <svg aria-hidden="true" class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                            </a>
                                            <form method="POST" action="/admin/trophees/{{ $t->id }}" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce trophée ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="rounded-lg bg-red-500/20 p-2 text-red-300 transition hover:bg-red-500/30 light:bg-red-50 light:text-red-600">
                                                    <svg aria-hidden="true" class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center py-8 text-slate-400 light:text-slate-500">
                                <svg aria-hidden="true" class="mx-auto h-12 w-12 text-slate-500 light:text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                                <p class="mt-4 text-slate-400 light:text-slate-500">Aucun trophée pour le moment</p>
                            </div>
                        @endif
                    </div>
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

    @if(isset($trophy))
        document.getElementById('tab-trophies')?.click();
    @endif
});
</script>