@extends('layouts.app')

@section('title', __('site.events_page.title') . ' - Dorice DJETON')
@section('meta_description', __('site.events_page.text'))

@section('content')

<section class="py-24 bg-slate-950 text-white light:bg-white light:text-slate-900">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="inline-flex rounded-full bg-fuchsia-500/10 px-3 py-1 text-sm font-semibold uppercase tracking-[0.3em] text-fuchsia-200 light:bg-fuchsia-50 light:text-fuchsia-700">{{ __('site.events_page.badge') }}</span>
            <h1 class="mt-4 text-5xl font-black tracking-tight">{{ __('site.events_page.title') }}</h1>
            <p class="mt-6 text-lg text-slate-300 max-w-2xl mx-auto light:text-slate-600">
                {{ __('site.events_page.text') }}
            </p>
        </div>

        <!-- ÉVÉNEMENTS À VENIR -->
        @if($events->where('type', 'avenir')->count() > 0)
        <div class="mb-20" data-aos="fade-up">
            <div class="flex items-center gap-4 mb-8">
                <div class="h-px bg-gradient-to-r from-fuchsia-500 to-cyan-500 flex-1"></div>
                <span class="inline-flex rounded-full bg-fuchsia-500/10 px-4 py-2 text-sm font-semibold uppercase tracking-[0.3em] text-fuchsia-200 light:bg-fuchsia-50 light:text-fuchsia-700">{{ __('site.events_page.upcoming') }}</span>
                <div class="h-px bg-gradient-to-r from-cyan-500 to-fuchsia-500 flex-1"></div>
            </div>
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($events->where('type', 'avenir') as $event)
                <article class="group overflow-hidden rounded-[2rem] border border-white/10 bg-white/5 shadow-2xl shadow-slate-950/20 transition hover:-translate-y-2 hover:border-fuchsia-300/30 light:border-slate-200 light:bg-slate-50">
                    <div class="relative overflow-hidden">
                        @if($event->photo)
                            <img src="/images/{{ $event->photo }}" alt="{{ $event->title }}" class="aspect-[4/3] w-full object-cover transition duration-700 group-hover:scale-110">
                        @else
                            <div class="aspect-[4/3] bg-gradient-to-br from-fuchsia-500/20 via-cyan-500/10 to-violet-500/20 flex items-center justify-center">
                                <div class="text-center">
                                    <div class="inline-flex h-16 w-16 items-center justify-center rounded-3xl bg-fuchsia-500/20 text-fuchsia-200 text-2xl font-bold mb-4 light:text-fuchsia-700">
                                        📅
                                    </div>
                                    <p class="text-xs uppercase tracking-[0.25em] text-white/70 light:text-slate-500">{{ __('site.events_page.soon') }}</p>
                                </div>
                            </div>
                        @endif
                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-slate-950/90 to-transparent p-6">
                            <span class="inline-flex rounded-full bg-fuchsia-100/90 px-3 py-1 text-xs uppercase tracking-[0.24em] text-fuchsia-700">{{ strtoupper($event->type ?? 'Événement') }}</span>
                            <h3 class="mt-3 text-xl font-bold text-white">{{ $event->title }}</h3>
                        </div>
                    </div>
                    <div class="p-8">
                        <p class="text-slate-300 leading-7 mb-6 light:text-slate-600">{{ $event->description }}</p>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-slate-400 light:text-slate-500">{{ $event->date ? \Carbon\Carbon::parse($event->date)->format('d M Y') : __('site.events_page.date_upcoming') }}</span>
                            <span class="rounded-full bg-fuchsia-500/10 px-3 py-1 text-fuchsia-200 light:bg-fuchsia-50 light:text-fuchsia-700">{{ __('site.events_page.tag_upcoming') }}</span>
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
                <span class="inline-flex rounded-full bg-cyan-500/10 px-4 py-2 text-sm font-semibold uppercase tracking-[0.3em] text-cyan-200 light:bg-cyan-50 light:text-cyan-700">{{ __('site.events_page.ongoing') }}</span>
                <div class="h-px bg-gradient-to-r from-violet-500 to-cyan-500 flex-1"></div>
            </div>
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($events->where('type', 'encours') as $event)
                <article class="group overflow-hidden rounded-[2rem] border border-white/10 bg-gradient-to-br from-cyan-500/10 to-violet-500/10 shadow-2xl shadow-slate-950/20 transition hover:-translate-y-2 hover:border-cyan-300/30 light:border-slate-200">
                    <div class="relative overflow-hidden">
                        @if($event->photo)
                            <img src="/images/{{ $event->photo }}" alt="{{ $event->title }}" class="aspect-[4/3] w-full object-cover transition duration-700 group-hover:scale-110">
                        @else
                            <div class="aspect-[4/3] bg-gradient-to-br from-cyan-500/20 via-violet-500/10 to-fuchsia-500/20 flex items-center justify-center">
                                <div class="text-center">
                                    <div class="inline-flex h-16 w-16 items-center justify-center rounded-3xl bg-cyan-500/20 text-cyan-200 text-2xl font-bold mb-4 animate-pulse light:text-cyan-700">
                                        🚀
                                    </div>
                                    <p class="text-xs uppercase tracking-[0.25em] text-white/70 light:text-slate-500">{{ __('site.events_page.now') }}</p>
                                </div>
                            </div>
                        @endif
                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-slate-950/90 to-transparent p-6">
                            <span class="inline-flex rounded-full bg-cyan-100/90 px-3 py-1 text-xs uppercase tracking-[0.24em] text-cyan-700">{{ strtoupper($event->type ?? 'Événement') }}</span>
                            <h3 class="mt-3 text-xl font-bold text-white">{{ $event->title }}</h3>
                        </div>
                    </div>
                    <div class="p-8">
                        <p class="text-slate-300 leading-7 mb-6 light:text-slate-600">{{ $event->description }}</p>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-slate-400 light:text-slate-500">{{ $event->date ? \Carbon\Carbon::parse($event->date)->format('d M Y') : __('site.events_page.date_ongoing') }}</span>
                            <span class="rounded-full bg-cyan-500/10 px-3 py-1 text-cyan-200 light:bg-cyan-50 light:text-cyan-700">{{ __('site.events_page.tag_ongoing') }}</span>
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
                <span class="inline-flex rounded-full bg-violet-500/10 px-4 py-2 text-sm font-semibold uppercase tracking-[0.3em] text-violet-200 light:bg-violet-50 light:text-violet-700">{{ __('site.events_page.past') }}</span>
                <div class="h-px bg-gradient-to-r from-fuchsia-500 to-violet-500 flex-1"></div>
            </div>
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($events->where('type', 'passe') as $event)
                <article class="group overflow-hidden rounded-[2rem] border border-white/10 bg-white/5 shadow-2xl shadow-slate-950/20 transition hover:-translate-y-2 hover:border-violet-300/30 opacity-75 hover:opacity-100 light:border-slate-200 light:bg-slate-50">
                    <div class="relative overflow-hidden">
                        @if($event->photo)
                            <img src="/images/{{ $event->photo }}" alt="{{ $event->title }}" class="aspect-[4/3] w-full object-cover transition duration-700 group-hover:scale-110">
                        @else
                            <div class="aspect-[4/3] bg-gradient-to-br from-violet-500/20 via-fuchsia-500/10 to-slate-500/20 flex items-center justify-center">
                                <div class="text-center">
                                    <div class="inline-flex h-16 w-16 items-center justify-center rounded-3xl bg-violet-500/20 text-violet-200 text-2xl font-bold mb-4 light:text-violet-700">
                                        ✅
                                    </div>
                                    <p class="text-xs uppercase tracking-[0.25em] text-white/70 light:text-slate-500">{{ __('site.events_page.done') }}</p>
                                </div>
                            </div>
                        @endif
                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-slate-950/90 to-transparent p-6">
                            <span class="inline-flex rounded-full bg-violet-100/90 px-3 py-1 text-xs uppercase tracking-[0.24em] text-violet-700">{{ strtoupper($event->type ?? 'Événement') }}</span>
                            <h3 class="mt-3 text-xl font-bold text-white">{{ $event->title }}</h3>
                        </div>
                    </div>
                    <div class="p-8">
                        <p class="text-slate-300 leading-7 mb-6 light:text-slate-600">{{ $event->description }}</p>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-slate-400 light:text-slate-500">{{ $event->date ? \Carbon\Carbon::parse($event->date)->format('d M Y') : __('site.events_page.date_done') }}</span>
                            <span class="rounded-full bg-violet-500/10 px-3 py-1 text-violet-200 light:bg-violet-50 light:text-violet-700">{{ __('site.events_page.tag_past') }}</span>
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
            <div class="inline-flex h-24 w-24 items-center justify-center rounded-3xl bg-slate-800 text-slate-400 text-4xl mb-6 light:bg-slate-100">
                📅
            </div>
            <h3 class="text-2xl font-bold text-white mb-4 light:text-slate-900">{{ __('site.events_page.empty_title') }}</h3>
            <p class="text-slate-400 max-w-md mx-auto light:text-slate-500">
                {{ __('site.events_page.empty_text') }}
            </p>
        </div>
        @endif
    </div>
</section>

@endsection