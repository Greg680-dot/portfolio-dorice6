@extends('layouts.app')

@section('title', __('site.home.meta_title'))
@section('meta_description', __('site.home.meta_description'))

@section('content')

<section class="relative overflow-hidden bg-slate-950 text-white light:bg-white light:text-slate-900" data-parallax="0.3">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(236,72,153,0.22),_transparent_30%),radial-gradient(circle_at_bottom_right,_rgba(34,211,238,0.16),_transparent_26%)] pointer-events-none"></div>
    <div class="relative min-h-[80vh] flex flex-col justify-center">
        <div class="max-w-6xl mx-auto grid gap-12 px-6 py-12 lg:grid-cols-[1.1fr_0.9fr] lg:items-center">
            <div data-aos="fade-right">
                <span class="inline-flex rounded-full bg-fuchsia-500/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.32em] text-fuchsia-200 light:bg-fuchsia-50 light:text-fuchsia-700">{{ __('site.home.hero.badge') }}</span>
                <h1 class="mt-7 text-5xl md:text-7xl font-black leading-tight text-white light:text-slate-900">
                    Dorice DJETON
                </h1>
                <p class="mt-6 max-w-3xl text-xl leading-9 text-slate-200 light:text-slate-600">
                    {{ __('site.home.hero.lead') }}
                </p>
                <div class="mt-8 flex flex-col gap-4 sm:flex-row">
                    <a href="#profile" class="inline-flex items-center justify-center rounded-full bg-white px-8 py-4 text-base font-semibold text-slate-950 shadow-xl shadow-fuchsia-500/20 transition hover:-translate-y-1 btn-magnetic ripple glow-on-hover light:border light:border-slate-200">
                        {{ __('site.home.hero.cta_profile') }}
                    </a>
                    <a href="#contact" class="inline-flex items-center justify-center rounded-full border border-white/20 bg-white/5 px-8 py-4 text-base font-semibold text-white transition hover:border-white hover:bg-white/10 btn-magnetic ripple light:border-slate-300 light:bg-slate-50 light:text-slate-900">
                        {{ __('site.home.hero.cta_contact') }}
                    </a>
                </div>
                <div class="mt-12 rounded-full bg-white/10 px-5 py-4 text-sm text-white/80 ring-1 ring-white/10 backdrop-blur-md animate-float light:bg-slate-100 light:text-slate-600 light:ring-slate-200">
                    <span class="font-semibold">{{ __('site.home.hero.expertise_label') }}</span> : <span id="hero-typed" class="font-bold text-white text-gradient"></span>
                </div>
            </div>

            <div class="relative" data-aos="fade-left">
                <div class="overflow-hidden rounded-[2rem] border border-white/10 shadow-2xl shadow-slate-950/40 light:border-slate-200">
                    <img src="/images/2.jpeg" alt="Dorice DJETON" class="aspect-[4/5] w-full object-cover transition duration-700 hover:scale-105" />
                </div>
                <div class="absolute -bottom-6 left-6 right-6 rounded-[1.5rem] border border-white/10 bg-slate-950/85 p-5 shadow-2xl backdrop-blur-xl">
                    <p class="text-xs uppercase tracking-[0.25em] text-cyan-200">{{ __('site.home.hero.based_in') }}</p>
                    <p class="mt-2 text-lg font-semibold text-white">{{ __('site.home.hero.location') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="profile" class="py-24 bg-white text-slate-900">
    <div class="max-w-6xl mx-auto grid gap-12 px-6 lg:grid-cols-[0.9fr_1.1fr] lg:items-center">
        <div data-aos="fade-right">
            <div class="rounded-[2rem] overflow-hidden border border-slate-200/80 shadow-2xl shadow-slate-900/10 glow-on-hover">
                <img src="/images/1.jpeg" alt="Portrait de Dorice DJETON" class="h-full w-full object-cover transition duration-700 hover:scale-105" />
            </div>
        </div>
        <div data-aos="fade-left">
            <p class="uppercase tracking-[0.35em] text-sm text-fuchsia-600">{{ __('site.home.profile.eyebrow') }}</p>
            <h2 class="mt-4 text-4xl md:text-5xl font-extrabold tracking-tight text-slate-900">{{ __('site.home.profile.title') }}</h2>
            <p class="mt-6 text-lg leading-8 text-slate-600">
                {{ __('site.home.profile.text') }}
            </p>
            <div class="mt-10 grid gap-4 sm:grid-cols-2">
                <div class="rounded-[1.5rem] border border-slate-200 bg-slate-50 p-6">
                    <p class="text-xs uppercase tracking-[0.25em] text-slate-500">{{ __('site.home.profile.initiative_label') }}</p>
                    <p class="mt-3 text-xl font-semibold text-slate-900">{{ __('site.home.profile.initiative_title') }}</p>
                    <p class="mt-2 text-slate-600">{{ __('site.home.profile.initiative_text') }}</p>
                </div>
                <div class="rounded-[1.5rem] border border-slate-200 bg-slate-50 p-6">
                    <p class="text-xs uppercase tracking-[0.25em] text-slate-500">{{ __('site.home.profile.org_label') }}</p>
                    <p class="mt-3 text-xl font-semibold text-slate-900">{{ __('site.home.profile.org_title') }}</p>
                    <p class="mt-2 text-slate-600">{{ __('site.home.profile.org_text') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="linkedin" class="py-24 bg-slate-900 text-white light:bg-white light:text-slate-900">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:items-start">
            <div data-aos="fade-right">
                <span class="inline-flex rounded-full bg-fuchsia-500/10 px-3 py-1 text-sm font-semibold uppercase tracking-[0.3em] text-fuchsia-200 light:bg-fuchsia-50 light:text-fuchsia-700">{{ __('site.home.linkedin.badge') }}</span>
                <h2 class="mt-4 text-4xl font-black">{{ __('site.home.linkedin.title') }}</h2>
                <p class="mt-6 text-lg leading-8 text-slate-300 light:text-slate-600">
                    {{ __('site.home.linkedin.text') }}
                </p>
                <div class="mt-8 grid gap-4 sm:grid-cols-2">
                    <div class="rounded-[1.25rem] border border-white/10 bg-white/5 p-5 light:border-slate-200 light:bg-slate-50">
                        <p class="text-3xl font-black text-white light:text-slate-900">9 665+</p>
                        <p class="mt-2 text-sm text-slate-300 light:text-slate-600">{{ __('site.home.linkedin.followers') }}</p>
                    </div>
                    <div class="rounded-[1.25rem] border border-white/10 bg-white/5 p-5 light:border-slate-200 light:bg-slate-50">
                        <p class="text-3xl font-black text-white light:text-slate-900">500+</p>
                        <p class="mt-2 text-sm text-slate-300 light:text-slate-600">{{ __('site.home.linkedin.connections') }}</p>
                    </div>
                </div>
            </div>
            <div class="grid gap-4" data-aos="fade-left">
                @foreach(__('site.home.linkedin.highlights') as $highlight)
                    <article class="rounded-[1.25rem] border border-white/10 bg-white/5 p-6 transition hover:-translate-y-1 hover:border-fuchsia-300/30 light:border-slate-200 light:bg-slate-50">
                        <h3 class="text-xl font-bold text-white light:text-slate-900">{{ $highlight['title'] }}</h3>
                        <p class="mt-3 leading-7 text-slate-300 light:text-slate-600">{{ $highlight['text'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
<section id="expertise" class="py-24 bg-slate-950 text-white light:bg-white light:text-slate-900">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="inline-flex rounded-full bg-cyan-500/10 px-3 py-1 text-sm font-semibold uppercase tracking-[0.3em] text-cyan-200 light:bg-cyan-50 light:text-cyan-700">{{ __('site.home.expertise.badge') }}</span>
            <h2 class="mt-4 text-4xl font-black">{{ __('site.home.expertise.title') }}</h2>
        </div>
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach(__('site.home.expertise.items') as $item)
                <article class="rounded-[1.5rem] border border-white/10 bg-white/5 p-7 shadow-2xl shadow-slate-950/20 transition hover:-translate-y-2 hover:border-cyan-300/30 light:border-slate-200 light:bg-slate-50" data-aos="fade-up">
                    <h3 class="text-xl font-bold text-white light:text-slate-900">{{ $item['title'] }}</h3>
                    <p class="mt-4 leading-7 text-slate-300 light:text-slate-600">{{ $item['text'] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section id="programmes" class="py-24 bg-slate-900 text-white light:bg-white light:text-slate-900">
    <div class="max-w-6xl mx-auto grid gap-10 px-6 lg:grid-cols-[1fr_0.95fr] lg:items-start">
        <div data-aos="fade-right">
            <p class="uppercase tracking-[0.35em] text-sm text-fuchsia-300 light:text-fuchsia-700">{{ __('site.home.programmes.eyebrow') }}</p>
            <h2 class="mt-4 text-4xl font-black">{{ __('site.home.programmes.title') }}</h2>
            <p class="mt-6 text-lg leading-8 text-slate-300 light:text-slate-600">
                {{ __('site.home.programmes.text') }}
            </p>
            <div class="mt-8 rounded-[1.5rem] border border-white/10 bg-white/5 p-6 light:border-slate-200 light:bg-slate-50">
                <p class="text-sm uppercase tracking-[0.25em] text-cyan-200 light:text-cyan-700">{{ __('site.home.programmes.experience_label') }}</p>
                <p class="mt-3 text-2xl font-bold text-white light:text-slate-900">{{ __('site.home.programmes.experience_title') }}</p>
                <p class="mt-2 text-slate-300 light:text-slate-600">{{ __('site.home.programmes.experience_since') }}</p>
            </div>
        </div>
        <div class="grid gap-4" data-aos="fade-left">
            @foreach(__('site.home.programmes.steps') as $step)
                <div class="rounded-[1.25rem] border border-white/10 bg-white/5 p-5 light:border-slate-200 light:bg-slate-50">
                    <p class="font-semibold text-white light:text-slate-900">{{ $step['title'] }}</p>
                    <p class="mt-2 text-sm leading-6 text-slate-400 light:text-slate-500">{{ __('site.home.programmes.step_text') }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section id="formation" class="py-24 bg-white text-slate-900">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="inline-flex rounded-full bg-fuchsia-50 px-3 py-1 text-sm font-semibold uppercase tracking-[0.3em] text-fuchsia-700">{{ __('site.home.formation.badge') }}</span>
            <h2 class="mt-4 text-4xl font-black">{{ __('site.home.formation.title') }}</h2>
        </div>
        <div class="grid gap-6 md:grid-cols-2">
            @foreach(__('site.home.formation.items') as $index => $item)
                <article class="rounded-[1.5rem] border border-slate-200 bg-slate-50 p-8" data-aos="fade-up" @if($index > 0) data-aos-delay="120" @endif>
                    <p class="text-sm font-semibold uppercase tracking-[0.25em] text-slate-500">{{ $item['institution'] }}</p>
                    <h3 class="mt-3 text-2xl font-bold text-slate-900">{{ $item['title'] }}</h3>
                    <p class="mt-4 leading-7 text-slate-600">{{ $item['text'] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section id="contact" class="py-24 bg-slate-950 text-white light:bg-white light:text-slate-900">
    <div class="max-w-5xl mx-auto px-6 text-center" data-aos="fade-up">
        <span class="inline-flex rounded-full bg-fuchsia-500/10 px-3 py-1 text-sm font-semibold uppercase tracking-[0.3em] text-fuchsia-200 light:bg-fuchsia-50 light:text-fuchsia-700">{{ __('site.home.contact.badge') }}</span>
        <h2 class="mt-4 text-4xl font-black">{{ __('site.home.contact.title') }}</h2>
        <p class="mt-5 text-lg leading-8 text-slate-300 light:text-slate-600">
            {{ __('site.home.contact.text') }}
        </p>
        <div class="mt-8 flex flex-col items-center justify-center gap-4 sm:flex-row">
            <a href="mailto:djetondory@gmail.com" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-fuchsia-500 to-cyan-500 px-8 py-4 text-base font-semibold text-white shadow-xl shadow-fuchsia-500/20 transition hover:-translate-y-1 btn-magnetic ripple glow-on-hover">djetondory@gmail.com</a>
            <a href="https://www.linkedin.com/in/dorice-djeton-" class="inline-flex items-center justify-center rounded-full border border-white/15 bg-white/5 px-8 py-4 text-base font-semibold text-white transition hover:bg-white/10 light:border-slate-300 light:bg-slate-50 light:text-slate-900">LinkedIn</a>
        </div>

        <div class="mx-auto mt-14 max-w-xl rounded-[2rem] border border-white/10 bg-white/5 p-8 text-left shadow-2xl shadow-slate-950/20 light:border-slate-200 light:bg-slate-50">
            @if(session('contact_success'))
                <div class="mb-6 rounded-xl border border-green-400/30 bg-green-500/10 p-4 text-sm text-green-200 light:bg-green-50 light:text-green-700">
                    {{ session('contact_success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('contact.send') }}" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-semibold text-slate-200 mb-2 light:text-slate-700">{{ __('site.home.contact.form_name') }}</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                           class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white placeholder-slate-400 focus:border-fuchsia-400 focus:outline-none focus:ring-2 focus:ring-fuchsia-400/20 transition light:border-slate-300 light:bg-white light:text-slate-900 light:placeholder-slate-400"
                           required>
                    @error('name')<p class="mt-2 text-sm text-red-300 light:text-red-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-200 mb-2 light:text-slate-700">{{ __('site.home.contact.form_email') }}</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                           class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white placeholder-slate-400 focus:border-fuchsia-400 focus:outline-none focus:ring-2 focus:ring-fuchsia-400/20 transition light:border-slate-300 light:bg-white light:text-slate-900 light:placeholder-slate-400"
                           required>
                    @error('email')<p class="mt-2 text-sm text-red-300 light:text-red-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-200 mb-2 light:text-slate-700">{{ __('site.home.contact.form_message') }}</label>
                    <textarea name="message" rows="5"
                              class="w-full rounded-xl border border-white/20 bg-white/5 px-4 py-3 text-white placeholder-slate-400 focus:border-fuchsia-400 focus:outline-none focus:ring-2 focus:ring-fuchsia-400/20 transition resize-none light:border-slate-300 light:bg-white light:text-slate-900 light:placeholder-slate-400"
                              required>{{ old('message') }}</textarea>
                    @error('message')<p class="mt-2 text-sm text-red-300 light:text-red-600">{{ $message }}</p>@enderror
                </div>

                {{-- Honeypot anti-spam : champ invisible, doit rester vide --}}
                <div class="absolute h-px w-px overflow-hidden" style="clip: rect(0 0 0 0); clip-path: inset(50%);" aria-hidden="true">
                    <label for="website">Ne pas remplir</label>
                    <input type="text" name="website" id="website" tabindex="-1" autocomplete="off">
                </div>

                <button type="submit" class="w-full rounded-xl bg-gradient-to-r from-fuchsia-500 to-cyan-500 px-6 py-4 text-base font-semibold text-white shadow-xl shadow-fuchsia-500/20 transition hover:-translate-y-1 hover:shadow-fuchsia-500/30 btn-magnetic ripple glow-on-hover">
                    {{ __('site.home.contact.form_submit') }}
                </button>
            </form>
        </div>
    </div>
</section>

<section id="events" class="py-24 bg-white text-slate-900">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="inline-flex rounded-full bg-cyan-50 px-3 py-1 text-sm font-semibold uppercase tracking-[0.3em] text-cyan-700">{{ __('site.home.events.badge') }}</span>
            <h2 class="mt-4 text-4xl font-black">{{ __('site.home.events.title') }}</h2>
            <p class="mt-4 text-slate-600 max-w-2xl mx-auto">{{ __('site.home.events.text') }}</p>
        </div>

        @php
            $coverImages = [
                'https://images.unsplash.com/photo-1515165562835-cf9b06149012?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1517242022162-0f7a39b30c86?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=1200&q=80'
            ];
        @endphp
        <div class="grid gap-8 md:grid-cols-3">
            @if(isset($events) && $events->count())
                @foreach($events as $event)
                    @php $cover = $event->photo ? '/images/' . $event->photo : $coverImages[$loop->index % count($coverImages)]; @endphp
                    <article class="group overflow-hidden rounded-[1.5rem] border border-slate-200 bg-white shadow-xl shadow-slate-900/10 transition hover:-translate-y-2" data-aos="fade-up">
                        <img src="{{ $cover }}" alt="{{ $event->title }}" class="h-56 w-full object-cover transition duration-700 group-hover:scale-105" />
                        <div class="p-7">
                            <span class="text-xs uppercase tracking-[0.24em] text-fuchsia-700">{{ strtoupper($event->type ?? 'Événement') }}</span>
                            <h3 class="mt-3 text-xl font-bold text-slate-900">{{ $event->title }}</h3>
                            <p class="mt-3 text-slate-600 leading-7">{{ $event->description }}</p>
                            <p class="mt-5 text-sm text-slate-500">{{ $event->date ? \Carbon\Carbon::parse($event->date)->format('d M Y') : __('site.home.events.date_tbd') }}</p>
                        </div>
                    </article>
                @endforeach
            @else
                <div class="col-span-3 rounded-[1.5rem] border border-slate-200 bg-slate-50 p-12 text-center">
                    <p class="text-lg text-slate-600">{{ __('site.home.events.empty') }}</p>
                </div>
            @endif
        </div>
    </div>
</section>

@endsection