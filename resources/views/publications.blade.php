@extends('layouts.app')

@section('title', __('site.publications_page.title') . ' - Dorice DJETON')
@section('meta_description', __('site.publications_page.text'))

@section('content')

<section class="relative overflow-hidden bg-slate-950 text-white light:bg-white light:text-slate-900">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(236,72,153,0.2),_transparent_28%),radial-gradient(circle_at_bottom_right,_rgba(34,211,238,0.18),_transparent_28%)] pointer-events-none"></div>
    <div class="relative max-w-6xl mx-auto px-6 py-24 text-center">
        <span class="inline-flex rounded-full bg-fuchsia-500/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.32em] text-fuchsia-200 light:bg-fuchsia-50 light:text-fuchsia-700">{{ __('site.publications_page.badge') }}</span>
        <h1 class="mt-6 text-5xl md:text-7xl font-black leading-tight text-white light:text-slate-900">{{ __('site.publications_page.title') }}</h1>
        <p class="mt-6 mx-auto max-w-3xl text-lg leading-8 text-slate-300 light:text-slate-600">
            {{ __('site.publications_page.text') }}
        </p>
    </div>
</section>

@php
    $defaultPhotos = [
        'WhatsApp Image 2026-04-14 at 20.41.50.jpeg',
        'WhatsApp Image 2026-04-14 at 20.41.52.jpeg',
        'WhatsApp Image 2026-04-14 at 21.01.03.jpeg',
        'WhatsApp Image 2026-04-14 at 21.19.46.jpeg',
        'WhatsApp Image 2026-04-14 at 21.26.04.jpeg',
        '3.jpeg',
        '2.jpeg',
        '1.jpeg',
    ];

    $featuredMeta = [
        ['date' => '2026', 'photo' => 'WhatsApp Image 2026-04-14 at 20.41.50.jpeg'],
        ['date' => '30 avril 2026', 'photo' => 'WhatsApp Image 2026-04-14 at 21.01.03.jpeg'],
        ['date' => '7 mars 2026', 'photo' => 'WhatsApp Image 2026-04-14 at 21.26.04.jpeg'],
    ];

    $featuredPublications = collect(__('site.publications_page.featured'))
        ->map(fn ($item, $index) => array_merge($item, $featuredMeta[$index]))
        ->all();
@endphp

<section class="py-24 bg-white text-slate-900">
    <div class="max-w-6xl mx-auto px-6">
        <div class="mb-12 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div>
                <span class="inline-flex rounded-full bg-fuchsia-50 px-3 py-1 text-sm font-semibold uppercase tracking-[0.3em] text-fuchsia-700">{{ __('site.publications_page.featured_badge') }}</span>
                <h2 class="mt-4 text-4xl font-black">{{ __('site.publications_page.featured_title') }}</h2>
            </div>
            <p class="max-w-xl text-slate-600 leading-7">{{ __('site.publications_page.featured_text') }}</p>
        </div>

        <div class="grid gap-8 lg:grid-cols-3">
            @foreach($featuredPublications as $publication)
                <article class="group overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white shadow-xl shadow-slate-900/10 transition hover:-translate-y-2 hover:shadow-2xl" data-aos="fade-up">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/' . $publication['photo']) }}" alt="{{ $publication['title'] }}" class="aspect-[4/3] w-full object-cover transition duration-700 group-hover:scale-105">
                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-slate-950/90 to-transparent p-5">
                            <span class="rounded-full bg-white/90 px-3 py-1 text-xs font-semibold uppercase tracking-[0.22em] text-fuchsia-700">{{ $publication['tag'] }}</span>
                            <h3 class="mt-3 text-2xl font-bold text-white">{{ $publication['title'] }}</h3>
                        </div>
                    </div>
                    <div class="p-7">
                        <p class="text-sm font-semibold uppercase tracking-[0.24em] text-slate-400">{{ $publication['date'] }}</p>
                        <p class="mt-3 leading-7 text-slate-600">{{ $publication['text'] }}</p>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="py-24 bg-slate-950 text-white light:bg-white light:text-slate-900">
    <div class="max-w-6xl mx-auto px-6">
        <div class="mb-12 text-center" data-aos="fade-up">
            <span class="inline-flex rounded-full bg-cyan-500/10 px-3 py-1 text-sm font-semibold uppercase tracking-[0.3em] text-cyan-200 light:bg-cyan-50 light:text-cyan-700">{{ __('site.publications_page.all_events_badge') }}</span>
            <h2 class="mt-4 text-4xl font-black">{{ __('site.publications_page.all_events_title') }}</h2>
            <p class="mt-4 mx-auto max-w-2xl text-slate-300 light:text-slate-600">{{ __('site.publications_page.all_events_text') }}</p>
        </div>

        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            @forelse($events as $event)
                @php
                    $photo = $event->photo ?: $defaultPhotos[$loop->index % count($defaultPhotos)];
                    $labels = [
                        'passe' => __('site.publications_page.label_past'),
                        'encours' => __('site.publications_page.label_ongoing'),
                        'avenir' => __('site.publications_page.label_upcoming'),
                    ];
                @endphp
                <article class="group overflow-hidden rounded-[1.5rem] border border-white/10 bg-white/5 shadow-2xl shadow-slate-950/20 transition hover:-translate-y-2 hover:border-fuchsia-300/30 light:border-slate-200 light:bg-slate-50" data-aos="fade-up">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/' . $photo) }}" alt="{{ $event->title }}" class="aspect-[4/3] w-full object-cover transition duration-700 group-hover:scale-110">
                        <div class="absolute left-4 top-4 rounded-full bg-slate-950/80 px-3 py-1 text-xs font-semibold uppercase tracking-[0.22em] text-white backdrop-blur">
                            {{ $labels[$event->type] ?? __('site.publications_page.label_event') }}
                        </div>
                    </div>
                    <div class="p-7">
                        <p class="text-sm uppercase tracking-[0.25em] text-cyan-200 light:text-cyan-700">{{ $event->date ? \Carbon\Carbon::parse($event->date)->format('d M Y') : __('site.publications_page.date_tbd') }}</p>
                        <h3 class="mt-3 text-xl font-bold text-white light:text-slate-900">{{ $event->title }}</h3>
                        <p class="mt-4 line-clamp-5 leading-7 text-slate-300 light:text-slate-600">{{ $event->description }}</p>
                    </div>
                </article>
            @empty
                <div class="col-span-full rounded-[1.5rem] border border-white/10 bg-white/5 p-12 text-center text-slate-300 light:border-slate-200 light:bg-slate-50 light:text-slate-600">
                    {{ __('site.publications_page.empty') }}

                </div>
            @endforelse
        </div>
    </div>
</section>

@endsection