@extends('layouts.app')

@section('title', 'Trophées & prix - Dorice DJETON')
@section('meta_description', 'Les récompenses et distinctions reçues par Dorice DJETON tout au long de son parcours.')

@section('content')

<section class="relative overflow-hidden bg-slate-950 text-white">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(236,72,153,0.2),_transparent_28%),radial-gradient(circle_at_bottom_right,_rgba(34,211,238,0.18),_transparent_28%)] pointer-events-none"></div>
    <div class="relative max-w-6xl mx-auto px-6 py-24 text-center">
        <span class="inline-flex rounded-full bg-fuchsia-500/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.32em] text-fuchsia-200">Distinctions</span>
        <h1 class="mt-6 text-5xl md:text-7xl font-black leading-tight text-white">Trophées &amp; prix</h1>
        <p class="mt-6 mx-auto max-w-3xl text-lg leading-8 text-slate-300">
            Les récompenses et distinctions reçues par Dorice DJETON tout au long de son parcours.
        </p>
    </div>
</section>

<section class="py-24 bg-white text-slate-900">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            @forelse($trophies as $trophy)
                <article class="group overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white shadow-xl shadow-slate-900/10 transition hover:-translate-y-2 hover:shadow-2xl" data-aos="fade-up">
                    <div class="relative overflow-hidden">
                        @if($trophy->photo)
                            <img src="{{ asset('images/' . $trophy->photo) }}" alt="{{ $trophy->title }}" class="aspect-[4/3] w-full object-cover transition duration-700 group-hover:scale-105">
                        @else
                            <div class="aspect-[4/3] bg-gradient-to-br from-fuchsia-500/20 via-cyan-500/10 to-violet-500/20 flex items-center justify-center">
                                <div class="text-center">
                                    <div class="inline-flex h-16 w-16 items-center justify-center rounded-3xl bg-fuchsia-500/20 text-fuchsia-700 text-2xl font-bold mb-4">
                                        🏆
                                    </div>
                                    <p class="text-xs uppercase tracking-[0.25em] text-slate-500">Trophée</p>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="p-7">
                        <p class="text-sm font-semibold uppercase tracking-[0.24em] text-slate-400">
                            {{ $trophy->date ? \Carbon\Carbon::parse($trophy->date)->format('d M Y') : 'Date non renseignée' }}
                        </p>
                        <h3 class="mt-3 text-2xl font-bold text-slate-900">{{ $trophy->title }}</h3>
                        <p class="mt-3 leading-7 text-slate-600">{{ $trophy->description }}</p>
                    </div>
                </article>
            @empty
                <div class="col-span-full rounded-[1.5rem] border border-slate-200 bg-slate-50 p-12 text-center">
                    <p class="text-lg text-slate-600">Aucun trophée publié pour le moment.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@endsection
