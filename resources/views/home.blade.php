@extends('layouts.app')

@section('content')

<section class="relative overflow-hidden" data-parallax="0.3">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(236,72,153,0.25),_transparent_28%),radial-gradient(circle_at_bottom_right,_rgba(59,130,246,0.2),_transparent_24%)] pointer-events-none"></div>
    <div class="min-h-[90vh] flex flex-col justify-center">
        <div class="max-w-5xl mx-auto text-center px-6 py-24">
           
            <h1 class="text-5xl md:text-7xl font-black leading-tight tracking-[-0.04em] text-white" data-aos="fade-up">
                DORICE  DJETON
            </h1>
            <div class="mx-auto my-8 flex items-center justify-center gap-3 text-white/70" data-aos="fade-up" data-aos-delay="100">
                <div class="h-px w-24 rounded-full bg-gradient-to-r from-fuchsia-400 via-cyan-300 to-violet-400"></div>
                <span class="text-xs uppercase tracking-[0.35em]">Identité</span>
                <div class="h-px w-24 rounded-full bg-gradient-to-r from-fuchsia-400 via-cyan-300 to-violet-400"></div>
            </div>
            <h1 class="text-5xl md:text-7xl font-black leading-tight tracking-[-0.04em] text-white" data-aos="fade-up" data-aos-delay="150">
                libère le potentiel féminin avec élégance numérique.
            </h1>

            <div class="mt-10 flex flex-col gap-4 sm:flex-row sm:justify-center">
                <a href="#about" class="inline-flex items-center justify-center rounded-full bg-white text-slate-900 px-8 py-4 text-base font-semibold shadow-xl shadow-fuchsia-500/20 transition hover:-translate-y-1 btn-magnetic ripple glow-on-hover">
                    En savoir plus
                </a>
                <a href="#events" class="inline-flex items-center justify-center rounded-full border border-white/20 bg-white/5 px-8 py-4 text-base font-semibold text-white transition hover:border-white hover:bg-white/10 btn-magnetic ripple">
                    Voir les événements
                </a>
            </div>
            <div class="mt-16 flex flex-col items-center gap-6">
                <div class="rounded-full bg-white/10 px-5 py-4 text-sm text-white/80 ring-1 ring-white/10 backdrop-blur-md animate-float" data-aos="fade-up" data-aos-delay="250">
                    <span class="font-semibold">Missions</span> : <span id="hero-typed" class="font-bold text-white text-gradient"></span>
                </div>
                <div class="grid grid-cols-3 gap-3 w-full max-w-md">
                    <div class="h-2 rounded-full bg-pink-400 animate-pulse-slow"></div>
                    <div class="h-2 rounded-full bg-cyan-400/80 animate-pulse-slow" style="animation-delay: 0.5s;"></div>
                    <div class="h-2 rounded-full bg-violet-400/70 animate-pulse-slow" style="animation-delay: 1s;"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="about" class="relative py-24 bg-slate-950 text-white overflow-hidden">
    <div class="absolute inset-y-0 left-0 w-1/2 bg-gradient-to-r from-fuchsia-600/20 to-transparent pointer-events-none"></div>
    <div class="max-w-6xl mx-auto grid gap-12 lg:grid-cols-[1.15fr_0.85fr] items-center">
        <div data-aos="fade-right">
            <p class="uppercase tracking-[0.35em] text-sm text-fuchsia-300">Leadership féminin & transformation</p>
            <h2 class="mt-4 text-4xl md:text-5xl font-extrabold tracking-tight">Une expérience digitale qui inspire confiance et passage à l’action.</h2>
            <p class="mt-6 text-lg leading-8 text-slate-300">
                DJETON Dorice accompagne les femmes dans la conquête de leur carrière, le renforcement de leur leadership et la maîtrise de leurs soft skills.
            </p>
            <ul class="mt-8 grid gap-3 text-slate-200">
                <li class="flex items-start gap-3">
                    <span class="mt-1 inline-flex h-9 w-9 items-center justify-center rounded-full bg-fuchsia-500/20 text-fuchsia-200">✓</span>
                    Formation immersive, interactive et engagée
                </li>
                <li class="flex items-start gap-3">
                    <span class="mt-1 inline-flex h-9 w-9 items-center justify-center rounded-full bg-cyan-500/20 text-cyan-100">✓</span>
                    Coaching concret, mesurable et orienté impact
                </li>
                <li class="flex items-start gap-3">
                    <span class="mt-1 inline-flex h-9 w-9 items-center justify-center rounded-full bg-violet-500/20 text-violet-100">✓</span>
                    Programmes sur mesure pour chaque étape de projet
                </li>
            </ul>
        </div>
        <div class="relative" data-aos="fade-left">
            <div class="relative overflow-hidden rounded-[2rem] border border-white/10 shadow-2xl shadow-slate-950/20">
                <img src="/images/2.jpeg" alt="DJETON Dorice - Leadership féminin" class="h-full w-full object-cover transition duration-700 hover:scale-105" />
            </div>
        </div>
    </div>
</section>

<section id="profile" class="py-24 bg-white text-slate-900">
    <div class="max-w-6xl mx-auto grid gap-12 lg:grid-cols-[0.95fr_1.05fr] items-center">
        <div class="order-2 lg:order-1" data-aos="fade-right">
            <div class="rounded-[2rem] overflow-hidden shadow-2xl shadow-slate-900/10 border border-slate-200/80 glow-on-hover">
                <img src="/images/1.jpeg" alt="Portrait DJETON Dorice" class="h-full w-full object-cover transition duration-700 hover:scale-105" />
            </div>
        </div>
        <div class="order-1 lg:order-2" data-aos="fade-left">
            <p class="uppercase tracking-[0.35em] text-sm text-fuchsia-600">Profil professionnel</p>
            <h2 class="mt-4 text-4xl font-extrabold tracking-tight text-slate-900">Présentation de Dorice</h2>
            <p class="mt-6 text-lg leading-8 text-slate-600">
                DJETON Dorice est une formatrice inspirante spécialisée dans le leadership féminin, les soft skills et la transition professionnelle. Elle construit des parcours qui donnent à chaque participante les clés pour se réaliser avec confiance.
            </p>
            <div class="mt-10 grid gap-4 sm:grid-cols-2">
                <div class="rounded-[1.75rem] border border-slate-200/80 bg-slate-50 p-6">
                    <p class="text-xs uppercase tracking-[0.25em] text-slate-500">CV rapide</p>
                    <p class="mt-3 text-xl font-semibold text-slate-900">Formatrice senior depuis 7 ans</p>
                    <p class="mt-2 text-slate-600">Spécialisée en leadership, soft skills et accompagnement de carrière.</p>
                </div>
                <div class="rounded-[1.75rem] border border-slate-200/80 bg-slate-50 p-6">
                    <p class="text-xs uppercase tracking-[0.25em] text-slate-500">Réalisations</p>
                    <p class="mt-3 text-xl font-semibold text-slate-900">+1000 femmes accompagnées</p>
                    <p class="mt-2 text-slate-600">Retours mesurables sur la confiance, la prise de parole et l’impact professionnel.</p>
                </div>
            </div>
            <div class="mt-8 flex flex-wrap gap-3">
                <span class="rounded-full bg-fuchsia-100 px-4 py-2 text-sm font-semibold text-fuchsia-700 hover-lift icon-animate" data-tooltip="Leadership & empowerment">Leadership</span>
                <span class="rounded-full bg-cyan-100 px-4 py-2 text-sm font-semibold text-cyan-700 hover-lift icon-animate" data-tooltip="Coaching personnalisé">Coaching</span>
                <span class="rounded-full bg-violet-100 px-4 py-2 text-sm font-semibold text-violet-700 hover-lift icon-animate" data-tooltip="Compétences relationnelles">Soft Skills</span>
                <span class="rounded-full bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-700 hover-lift icon-animate" data-tooltip="Communication efficace">Communication</span>
            </div>
        </div>
    </div>
</section>

<section id="skills" class="py-24 bg-slate-950 text-white">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="inline-flex rounded-full bg-fuchsia-500/10 px-3 py-1 text-sm font-semibold uppercase tracking-[0.3em] text-fuchsia-200">Compétences</span>
            <h2 class="mt-4 text-4xl font-black">Expertise opérationnelle</h2>
            <p class="mt-4 text-slate-300 max-w-2xl mx-auto">
                Un mix de savoir-faire stratégique et d'expérience terrain pour accompagner les femmes vers une réussite durable.
            </p>
        </div>
        <div class="grid gap-8 lg:grid-cols-2">
            <div data-aos="fade-up">
                <div class="space-y-6">
                    @php $skills = [
                        ['title' => 'Leadership & prise de parole', 'percent' => 95],
                        ['title' => 'Coaching & accompagnement', 'percent' => 92],
                        ['title' => 'Gestion du changement', 'percent' => 88],
                        ['title' => 'Soft skills et communication', 'percent' => 94],
                    ];
                    @endphp
                    @foreach($skills as $skill)
                        <div>
                            <div class="flex items-center justify-between text-sm font-medium text-slate-200">
                                <span>{{ $skill['title'] }}</span>
                                <span>{{ $skill['percent'] }}%</span>
                            </div>
                            <div class="mt-3 h-3 rounded-full bg-slate-800">
                                <div class="h-3 rounded-full bg-gradient-to-r from-fuchsia-500 via-cyan-400 to-violet-500" style="width: {{ $skill['percent'] }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="rounded-[2rem] border border-white/10 bg-white/5 p-8 shadow-2xl shadow-slate-950/20" data-aos="fade-left">
                <p class="uppercase tracking-[0.35em] text-sm text-cyan-200">Parcours</p>
                <h3 class="mt-4 text-3xl font-bold text-white">Chemin professionnel</h3>
                <div class="mt-8 space-y-6">
                    <div class="grid gap-4 sm:grid-cols-[auto_1fr]">
                        <div class="text-sm text-fuchsia-300">2018</div>
                        <div>
                            <p class="font-semibold text-white">Début du coaching</p>
                            <p class="mt-2 text-slate-300">Lancement des premières formations centrées sur la confiance, la communication et le leadership.</p>
                        </div>
                    </div>
                    <div class="grid gap-4 sm:grid-cols-[auto_1fr]">
                        <div class="text-sm text-cyan-300">2021</div>
                        <div>
                            <p class="font-semibold text-white">Programme collectif</p>
                            <p class="mt-2 text-slate-300">Création de parcours de groupe pour accompagner des cohortes de femmes vers la prise de responsabilités.</p>
                        </div>
                    </div>
                    <div class="grid gap-4 sm:grid-cols-[auto_1fr]">
                        <div class="text-sm text-violet-300">2024</div>
                        <div>
                            <p class="font-semibold text-white">Accompagnement premium</p>
                            <p class="mt-2 text-slate-300">Déploiement de masterclasses haut de gamme et de sessions individuelles personnalisées.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="partners" class="py-24 bg-slate-900 text-white">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="inline-flex rounded-full bg-fuchsia-500/10 px-3 py-1 text-sm font-semibold uppercase tracking-[0.3em] text-fuchsia-200">Organisations</span>
            <h2 class="mt-4 text-4xl font-black">Avec qui Dorice collabore</h2>
            <p class="mt-4 text-slate-300 max-w-2xl mx-auto">
                Des partenaires engagés, des institutions influentes et des réseaux professionnels qui amplifient l’impact de chaque programme.
            </p>
        </div>
        <div class="grid gap-6 md:grid-cols-3">
            <div class="rounded-[2rem] border border-white/10 bg-white/5 p-8 text-center shadow-2xl shadow-slate-950/20 transition hover:-translate-y-2" data-aos="fade-up">
                <div class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-3xl bg-fuchsia-500/10 text-fuchsia-200 text-2xl font-bold">A</div>
                <h3 class="text-xl font-semibold text-white">Association Horizons</h3>
                <p class="mt-3 text-slate-300">Accompagnement de leader féminins et sessions en présentiel pour les nouvelles générations.</p>
            </div>
            <div class="rounded-[2rem] border border-white/10 bg-white/5 p-8 text-center shadow-2xl shadow-slate-950/20 transition hover:-translate-y-2" data-aos="fade-up" data-aos-delay="100">
                <div class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-3xl bg-cyan-500/10 text-cyan-200 text-2xl font-bold">N</div>
                <h3 class="text-xl font-semibold text-white">Network Women</h3>
                <p class="mt-3 text-slate-300">Plateforme d’échanges, mentorat et visibilité pour les entrepreneures.</p>
            </div>
            <div class="rounded-[2rem] border border-white/10 bg-white/5 p-8 text-center shadow-2xl shadow-slate-950/20 transition hover:-translate-y-2" data-aos="fade-up" data-aos-delay="200">
                <div class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-3xl bg-violet-500/10 text-violet-200 text-2xl font-bold">C</div>
                <h3 class="text-xl font-semibold text-white">Creative Campus</h3>
                <p class="mt-3 text-slate-300">Masterclasses créatives et bootcamps intensifs pour leadership inclusif.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-white text-slate-900">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="inline-flex rounded-full bg-white/10 px-3 py-1 text-sm font-semibold uppercase tracking-[0.3em] text-slate-700">Galerie</span>
            <h2 class="mt-4 text-4xl font-black">Des photos qui racontent la transformation</h2>
            <p class="mt-4 text-slate-600 max-w-2xl mx-auto">
                Immortalisez l’énergie des ateliers, des sessions de coaching et des groupes inspirants avec une galerie photo signée Djeton Dorice.
            </p>
        </div>

        <div class="max-w-6xl mx-auto grid gap-6 lg:grid-cols-3">
            <article class="group overflow-hidden rounded-[2rem] bg-slate-900/70 shadow-2xl shadow-slate-950/30 transition hover:shadow-slate-950/50 card-enter" data-aos="fade-up">
                <div class="relative aspect-[4/3] overflow-hidden">
                    <img src="/images/atelier-1.jpg" alt="Discussion de groupe inspirante" class="h-full w-full object-cover transition duration-700 group-hover:scale-110" />
                    <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-slate-950/90 to-transparent p-6">
                        <p class="text-xs uppercase tracking-[0.25em] text-cyan-200">Atelier</p>
                        <h3 class="mt-3 text-xl font-bold">Connexion, ambition et action</h3>
                    </div>
                </div>
            </article>
            <article class="group overflow-hidden rounded-[2rem] bg-slate-900/70 shadow-2xl shadow-slate-950/30 transition hover:shadow-slate-950/50 card-enter" data-aos="fade-up" data-aos-delay="100">
                <div class="relative aspect-[4/3] overflow-hidden">
                    <img src="/images/leadership-1.jpg" alt="Femme dirige une réunion" class="h-full w-full object-cover transition duration-700 group-hover:scale-110" />
                    <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-slate-950/90 to-transparent p-6">
                        <p class="text-xs uppercase tracking-[0.25em] text-fuchsia-200">Leadership</p>
                        <h3 class="mt-3 text-xl font-bold">Présence assurée en public et en ligne</h3>
                    </div>
                </div>
            </article>
            <article class="group overflow-hidden rounded-[2rem] bg-slate-900/70 shadow-2xl shadow-slate-950/30 transition hover:shadow-slate-950/50 card-enter" data-aos="fade-up" data-aos-delay="200">
                <div class="relative aspect-[4/3] overflow-hidden">
                    <img src="/images/transformation-1.jpg" alt="Portrait d’une participante épanouie" class="h-full w-full object-cover transition duration-700 group-hover:scale-110" />
                    <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-slate-950/90 to-transparent p-6">
                        <p class="text-xs uppercase tracking-[0.25em] text-violet-200">Émotion</p>
                        <h3 class="mt-3 text-xl font-bold">Visages, moments et transformation réelle</h3>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>

<section class="py-20 bg-slate-900 text-white">
    <div class="max-w-6xl mx-auto grid gap-8 md:grid-cols-3">
        <div class="rounded-[2rem] border border-white/10 bg-white/5 p-8 shadow-2xl shadow-slate-950/20 transition hover:-translate-y-2" data-aos="fade-up">
            <p class="text-sm uppercase tracking-[0.3em] text-cyan-300">Valeur</p>
            <h3 class="mt-4 text-4xl font-bold">+1000</h3>
            <p class="mt-3 text-slate-300">Femmes impactées</p>
        </div>
        <div class="rounded-[2rem] border border-white/10 bg-white/5 p-8 shadow-2xl shadow-slate-950/20 transition hover:-translate-y-2" data-aos="fade-up" data-aos-delay="150">
            <p class="text-sm uppercase tracking-[0.3em] text-fuchsia-300">Portée</p>
            <h3 class="mt-4 text-4xl font-bold"><span data-count-target="50">0</span>+</h3>
            <p class="mt-3 text-slate-300">Formations réalisées</p>
        </div>
        <div class="rounded-[2rem] border border-white/10 bg-white/5 p-8 shadow-2xl shadow-slate-950/20 transition hover:-translate-y-2" data-aos="fade-up" data-aos-delay="300">
            <p class="text-sm uppercase tracking-[0.3em] text-violet-300">Leadership</p>
            <h3 class="mt-4 text-4xl font-bold"><span data-count-target="20">0</span>+</h3>
            <p class="mt-3 text-slate-300">Événements dirigés</p>
        </div>
    </div>
</section>

<section id="events" class="py-24 bg-white text-slate-900">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="inline-flex rounded-full bg-fuchsia-50 px-3 py-1 text-sm font-semibold uppercase tracking-[0.3em] text-fuchsia-700">Événements live</span>
            <h2 class="mt-4 text-4xl font-black">Programmes et événements récents</h2>
            <p class="mt-4 text-slate-600 max-w-2xl mx-auto">
                Des expériences hybrides et des masterclasses conçues pour faire émerger des leaders authentiques.
            </p>
        </div>

        @php
            $coverImages = [
                'https://images.unsplash.com/photo-1515165562835-cf9b06149012?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1545239351-1141bd82e8a6?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1517242022162-0f7a39b30c86?auto=format&fit=crop&w=1200&q=80'
            ];
        @endphp
        <div class="grid gap-8 md:grid-cols-3">
            @if(isset($events) && $events->count())
                @foreach($events as $event)
                    @php $cover = $coverImages[$loop->index % count($coverImages)]; @endphp
                    <article class="group overflow-hidden rounded-[2rem] border border-slate-200/80 bg-white shadow-xl shadow-slate-900/10 transition hover:-translate-y-2 hover:border-fuchsia-300/30 card-enter glow-on-hover" data-aos="fade-up">
                        <div class="relative overflow-hidden">
                            <img src="{{ $cover }}" alt="{{ $event->title }}" class="h-56 w-full object-cover transition duration-700 group-hover:scale-105" />
                            <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-slate-950/90 to-transparent p-5">
                                <span class="text-xs uppercase tracking-[0.24em] text-white/90">{{ strtoupper($event->type ?? 'Événement') }}</span>
                                <h3 class="mt-3 text-xl font-bold text-white">{{ $event->title }}</h3>
                            </div>
                        </div>
                        <div class="p-8 bg-white">
                            <p class="text-slate-600 leading-7">{{ $event->description }}</p>
                            <div class="mt-6 flex items-center justify-between text-sm text-slate-500">
                                <span>{{ $event->date ? \Carbon\Carbon::parse($event->date)->format('d M Y') : 'Date à venir' }}</span>
                                <span class="rounded-full bg-slate-100 px-3 py-1 text-slate-700">{{ $event->type ?? 'Général' }}</span>
                            </div>
                        </div>
                    </article>
                @endforeach
            @else
                <div class="col-span-3 rounded-[2rem] border border-slate-200/80 bg-slate-50 p-12 text-center">
                    <p class="text-lg text-slate-600">Pas encore d'événements enregistrés. Revenez bientôt pour des programmes encore plus puissants.</p>
                </div>
            @endif
        </div>
    </div>
</section>

<section class="py-24 bg-gradient-to-r from-purple-700 via-fuchsia-600 to-indigo-700 text-white">
    <div class="max-w-6xl mx-auto grid gap-10 lg:grid-cols-[1fr_0.9fr] items-center">
        <div data-aos="fade-right">
            <p class="uppercase text-sm tracking-[0.35em] text-cyan-200">Prêt à passer à l’étape supérieure ?</p>
            <h2 class="mt-4 text-4xl font-extrabold">Un suivie digne d’une marque internationale.</h2>
            <p class="mt-6 text-lg leading-8 text-white/80">
                Des animations subtiles, des interactions pensées pour le visiteur et une mise en lumière claire de chaque valeur.
            </p>
            <div class="mt-8 flex flex-wrap gap-3">
                <span class="rounded-full bg-white/10 px-4 py-2 text-sm text-white/90 hover-lift icon-animate" data-tooltip="Leadership féminin">Leadership</span>
                <span class="rounded-full bg-white/10 px-4 py-2 text-sm text-white/90 hover-lift icon-animate" data-tooltip="Communauté inspirante">Community</span>
                <span class="rounded-full bg-white/10 px-4 py-2 text-sm text-white/90 hover-lift icon-animate" data-tooltip="Impact mesurable">Impact</span>
            </div>
        </div>
        <div class="relative" data-aos="fade-left">
            <div class="rounded-[2rem] bg-white/10 p-8 shadow-2xl shadow-slate-950/30 backdrop-blur-xl">
                <div class="grid gap-4">
                    <div class="rounded-[1.5rem] bg-white/5 p-6">
                        <p class="text-sm uppercase tracking-[0.28em] text-cyan-200">Experience</p>
                        <h3 class="mt-3 text-2xl font-bold">7+ ans dans l’animation de formations haut de gamme.</h3>
                    </div>
                    <div class="rounded-[1.5rem] bg-white/5 p-6">
                        <p class="text-sm uppercase tracking-[0.28em] text-fuchsia-200">Résultats</p>
                        <h3 class="mt-3 text-2xl font-bold">98 % des participantes recommandent les programmes.</h3>
                    </div>
                    <div class="rounded-[1.5rem] bg-white/5 p-6">
                        <p class="text-sm uppercase tracking-[0.28em] text-violet-200">Momentum</p>
                        <h3 class="mt-3 text-2xl font-bold">Chaque session transforme confiance en leadership.</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 