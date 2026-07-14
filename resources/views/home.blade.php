@extends('layouts.app')

@section('content')

<section class="relative overflow-hidden bg-slate-950 text-white" data-parallax="0.3">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(236,72,153,0.22),_transparent_30%),radial-gradient(circle_at_bottom_right,_rgba(34,211,238,0.16),_transparent_26%)] pointer-events-none"></div>
    <div class="relative min-h-[80vh] flex flex-col justify-center">
        <div class="max-w-6xl mx-auto grid gap-12 px-6 py-12 lg:grid-cols-[1.1fr_0.9fr] lg:items-center">
            <div data-aos="fade-right">
                <span class="inline-flex rounded-full bg-fuchsia-500/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.32em] text-fuchsia-200">Soft Skills Specialist - Genre et medias - EMI</span>
                <h1 class="mt-7 text-5xl md:text-7xl font-black leading-tight text-white">
                    Dorice DJETON
                </h1>
                <p class="mt-6 max-w-3xl text-xl leading-9 text-slate-200">
                    Journaliste, experte Genre et medias, specialiste des competences de vie et fondatrice de DG PARTNERS ONG.
                    Elle accompagne les jeunes, les femmes, les medias et les organisations vers un leadership utile, inclusif et responsable.
                </p>
                <div class="mt-8 flex flex-col gap-4 sm:flex-row">
                    <a href="#profile" class="inline-flex items-center justify-center rounded-full bg-white px-8 py-4 text-base font-semibold text-slate-950 shadow-xl shadow-fuchsia-500/20 transition hover:-translate-y-1 btn-magnetic ripple glow-on-hover">
                        Voir le profil
                    </a>
                    <a href="#contact" class="inline-flex items-center justify-center rounded-full border border-white/20 bg-white/5 px-8 py-4 text-base font-semibold text-white transition hover:border-white hover:bg-white/10 btn-magnetic ripple">
                        Contacter Dorice
                    </a>
                </div>
                <div class="mt-12 rounded-full bg-white/10 px-5 py-4 text-sm text-white/80 ring-1 ring-white/10 backdrop-blur-md animate-float">
                    <span class="font-semibold">Expertise</span> : <span id="hero-typed" class="font-bold text-white text-gradient"></span>
                </div>
            </div>

            <div class="relative" data-aos="fade-left">
                <div class="overflow-hidden rounded-[2rem] border border-white/10 shadow-2xl shadow-slate-950/40">
                    <img src="/images/2.jpeg" alt="Dorice DJETON" class="aspect-[4/5] w-full object-cover transition duration-700 hover:scale-105" />
                </div>
                <div class="absolute -bottom-6 left-6 right-6 rounded-[1.5rem] border border-white/10 bg-slate-950/85 p-5 shadow-2xl backdrop-blur-xl">
                    <p class="text-xs uppercase tracking-[0.25em] text-cyan-200">Basee au Benin</p>
                    <p class="mt-2 text-lg font-semibold text-white">Abomey-Calavi, Atlantique</p>
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
            <p class="uppercase tracking-[0.35em] text-sm text-fuchsia-600">Profil professionnel</p>
            <h2 class="mt-4 text-4xl md:text-5xl font-extrabold tracking-tight text-slate-900">Journalisme, recherche-action et impact communautaire.</h2>
            <p class="mt-6 text-lg leading-8 text-slate-600">
                Pendant 15 ans, Dorice DJETON a concilie sa passion pour le journalisme avec son engagement au service de la paix, de la securite et de l'inclusion. Laureate de plusieurs prix medias au Benin et dans la sous-region, elle intervient sur l'Education aux Medias et a l'Information, les soft skills, les violences basees sur le genre facilitees par la technologie et la citoyennete numerique responsable.
            </p>
            <div class="mt-10 grid gap-4 sm:grid-cols-2">
                <div class="rounded-[1.5rem] border border-slate-200 bg-slate-50 p-6">
                    <p class="text-xs uppercase tracking-[0.25em] text-slate-500">Initiative</p>
                    <p class="mt-3 text-xl font-semibold text-slate-900">Women Journalists for Investigation</p>
                    <p class="mt-2 text-slate-600">Projet initie en 2022 avec le soutien de l'Ambassade des USA pour former de jeunes femmes journalistes a l'investigation.</p>
                </div>
                <div class="rounded-[1.5rem] border border-slate-200 bg-slate-50 p-6">
                    <p class="text-xs uppercase tracking-[0.25em] text-slate-500">Organisation</p>
                    <p class="mt-3 text-xl font-semibold text-slate-900">DG PARTNERS ONG</p>
                    <p class="mt-2 text-slate-600">Association engagee pour le bien-etre des filles, l'autonomisation des femmes et l'education citoyenne aux medias.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="linkedin" class="py-24 bg-slate-900 text-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:items-start">
            <div data-aos="fade-right">
                <span class="inline-flex rounded-full bg-fuchsia-500/10 px-3 py-1 text-sm font-semibold uppercase tracking-[0.3em] text-fuchsia-200">Activite LinkedIn</span>
                <h2 class="mt-4 text-4xl font-black">Une voix suivie sur le leadership, les soft skills et l impact social.</h2>
                <p class="mt-6 text-lg leading-8 text-slate-300">
                    Le profil LinkedIn de Dorice DJETON rassemble plus de 9 665 abonnes et met en avant ses prises de parole sur le mentorat, la collaboration hybride, la sante mentale, la sororite et le leadership feminin.
                </p>
                <div class="mt-8 grid gap-4 sm:grid-cols-2">
                    <div class="rounded-[1.25rem] border border-white/10 bg-white/5 p-5">
                        <p class="text-3xl font-black text-white">9 665+</p>
                        <p class="mt-2 text-sm text-slate-300">abonnes LinkedIn</p>
                    </div>
                    <div class="rounded-[1.25rem] border border-white/10 bg-white/5 p-5">
                        <p class="text-3xl font-black text-white">500+</p>
                        <p class="mt-2 text-sm text-slate-300">relations professionnelles</p>
                    </div>
                </div>
            </div>
            <div class="grid gap-4" data-aos="fade-left">
                @foreach([
                    ['title' => 'Sisters Mentors', 'text' => 'Engagement comme mentor au sein du programme porte par Benin Women Alumni Association pour transmettre confiance, reseau et leadership aux jeunes femmes.'],
                    ['title' => 'Soft Skills Panel', 'text' => 'Panel sur la collaboration intelligente en environnement hybride, organise avec DG Partners et Woman Be Proud.'],
                    ['title' => 'Assouka Woman 2026', 'text' => 'Mise en lumiere par Assouka Magazine autour des piliers informer, engager et transformer.'],
                    ['title' => 'Conference Soft Skills', 'text' => 'Conference dediee aux jeunes femmes leaders, autour de la charge mentale, de l intelligence emotionnelle et de l epanouissement professionnel.'],
                ] as $highlight)
                    <article class="rounded-[1.25rem] border border-white/10 bg-white/5 p-6 transition hover:-translate-y-1 hover:border-fuchsia-300/30">
                        <h3 class="text-xl font-bold text-white">{{ $highlight['title'] }}</h3>
                        <p class="mt-3 leading-7 text-slate-300">{{ $highlight['text'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
<section id="expertise" class="py-24 bg-slate-950 text-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="inline-flex rounded-full bg-cyan-500/10 px-3 py-1 text-sm font-semibold uppercase tracking-[0.3em] text-cyan-200">Domaines d'expertise</span>
            <h2 class="mt-4 text-4xl font-black">Des competences au service du changement social</h2>
        </div>
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @php $expertises = [
                ['title' => 'Education aux Medias et a l Information', 'text' => 'Former les citoyens, les jeunes et les organisations a une lecture critique, responsable et utile de l information.'],
                ['title' => 'Genre et medias', 'text' => 'Analyser, former et produire des contenus sensibles au genre, a l inclusion et a la representation equitable.'],
                ['title' => 'Soft skills et leadership', 'text' => 'Renforcer les competences de vie pour construire un leadership inspirant, positif et durable.'],
                ['title' => 'Capitalisation d experience', 'text' => 'Transformer les actions de terrain en apprentissages, recits d impact et outils de decision.'],
                ['title' => 'Renforcement des OSC', 'text' => 'Accompagner techniquement et strategiquement les organisations de jeunesse, de femmes et de la societe civile.'],
                ['title' => 'VBG et citoyennete numerique', 'text' => 'Sensibiliser aux violences basees sur le genre, notamment celles facilitees par la technologie.'],
            ]; @endphp
            @foreach($expertises as $item)
                <article class="rounded-[1.5rem] border border-white/10 bg-white/5 p-7 shadow-2xl shadow-slate-950/20 transition hover:-translate-y-2 hover:border-cyan-300/30" data-aos="fade-up">
                    <h3 class="text-xl font-bold text-white">{{ $item['title'] }}</h3>
                    <p class="mt-4 leading-7 text-slate-300">{{ $item['text'] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section id="programmes" class="py-24 bg-slate-900 text-white">
    <div class="max-w-6xl mx-auto grid gap-10 px-6 lg:grid-cols-[1fr_0.95fr] lg:items-start">
        <div data-aos="fade-right">
            <p class="uppercase tracking-[0.35em] text-sm text-fuchsia-300">Programme actuel</p>
            <h2 class="mt-4 text-4xl font-black">OSC APPUI-CONSEIL</h2>
            <p class="mt-6 text-lg leading-8 text-slate-300">
                Dorice coordonne le programme OSC APPUI-CONSEIL au sein de DG PARTNERS ONG / actiondurable.info. Ce programme d'accompagnement technique et strategique aide les organisations de la societe civile a creer plus de synergie, de coherence et d'impact.
            </p>
            <div class="mt-8 rounded-[1.5rem] border border-white/10 bg-white/5 p-6">
                <p class="text-sm uppercase tracking-[0.25em] text-cyan-200">Experience</p>
                <p class="mt-3 text-2xl font-bold text-white">Coordonnatrice du Programme OSC APPUI-CONSEIL</p>
                <p class="mt-2 text-slate-300">Depuis juin 2024 - Cotonou, Littoral, Benin</p>
            </div>
        </div>
        <div class="grid gap-4" data-aos="fade-left">
            @foreach(['Diagnostic des besoins', 'Conseil strategique', 'Renforcement des capacites', 'Suivi de l impact'] as $step)
                <div class="rounded-[1.25rem] border border-white/10 bg-white/5 p-5">
                    <p class="font-semibold text-white">{{ $step }}</p>
                    <p class="mt-2 text-sm leading-6 text-slate-400">Une etape du dispositif d accompagnement pour structurer l action, ameliorer la collaboration et produire des resultats durables.</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section id="formation" class="py-24 bg-white text-slate-900">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="inline-flex rounded-full bg-fuchsia-50 px-3 py-1 text-sm font-semibold uppercase tracking-[0.3em] text-fuchsia-700">Formation</span>
            <h2 class="mt-4 text-4xl font-black">Parcours academique et certifications</h2>
        </div>
        <div class="grid gap-6 md:grid-cols-2">
            <article class="rounded-[1.5rem] border border-slate-200 bg-slate-50 p-8" data-aos="fade-up">
                <p class="text-sm font-semibold uppercase tracking-[0.25em] text-slate-500">Universite d Abomey-Calavi</p>
                <h3 class="mt-3 text-2xl font-bold text-slate-900">Sciences du langage et de la communication</h3>
                <p class="mt-4 leading-7 text-slate-600">Maitrise / DEA en sociolinguistique, medias et communication, avec une orientation recherche-action. Promotion 2015.</p>
            </article>
            <article class="rounded-[1.5rem] border border-slate-200 bg-slate-50 p-8" data-aos="fade-up" data-aos-delay="120">
                <p class="text-sm font-semibold uppercase tracking-[0.25em] text-slate-500">Erich Brost Institute of International Journalism</p>
                <h3 class="mt-3 text-2xl font-bold text-slate-900">Certificat de formatrice, chercheuse et educatrice</h3>
                <p class="mt-4 leading-7 text-slate-600">Formation sur les enjeux des medias, du journalisme et de l Education aux Medias et a l Information. Septembre - octobre 2024.</p>
            </article>
        </div>
    </div>
</section>

<section id="contact" class="py-24 bg-slate-950 text-white">
    <div class="max-w-5xl mx-auto px-6 text-center" data-aos="fade-up">
        <span class="inline-flex rounded-full bg-fuchsia-500/10 px-3 py-1 text-sm font-semibold uppercase tracking-[0.3em] text-fuchsia-200">Contact</span>
        <h2 class="mt-4 text-4xl font-black">Collaborer avec Dorice DJETON</h2>
        <p class="mt-5 text-lg leading-8 text-slate-300">
            Pour des missions de formation, de capitalisation, de conseil strategique, de representation ou de point focal pour medias, organisations internationales, fondations et institutions.
        </p>
        <div class="mt-8 flex flex-col items-center justify-center gap-4 sm:flex-row">
            <a href="mailto:djetondory@gmail.com" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-fuchsia-500 to-cyan-500 px-8 py-4 text-base font-semibold text-white shadow-xl shadow-fuchsia-500/20 transition hover:-translate-y-1 btn-magnetic ripple glow-on-hover">djetondory@gmail.com</a>
            <a href="https://www.linkedin.com/in/dorice-djeton-" class="inline-flex items-center justify-center rounded-full border border-white/15 bg-white/5 px-8 py-4 text-base font-semibold text-white transition hover:bg-white/10">LinkedIn</a>
        </div>
    </div>
</section>

<section id="events" class="py-24 bg-white text-slate-900">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="inline-flex rounded-full bg-cyan-50 px-3 py-1 text-sm font-semibold uppercase tracking-[0.3em] text-cyan-700">Actualites</span>
            <h2 class="mt-4 text-4xl font-black">Programmes et evenements</h2>
            <p class="mt-4 text-slate-600 max-w-2xl mx-auto">Retrouvez les activites, formations et initiatives recentes portees par Dorice et ses partenaires.</p>
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
                            <span class="text-xs uppercase tracking-[0.24em] text-fuchsia-700">{{ strtoupper($event->type ?? 'Evenement') }}</span>
                            <h3 class="mt-3 text-xl font-bold text-slate-900">{{ $event->title }}</h3>
                            <p class="mt-3 text-slate-600 leading-7">{{ $event->description }}</p>
                            <p class="mt-5 text-sm text-slate-500">{{ $event->date ? \Carbon\Carbon::parse($event->date)->format('d M Y') : 'Date a venir' }}</p>
                        </div>
                    </article>
                @endforeach
            @else
                <div class="col-span-3 rounded-[1.5rem] border border-slate-200 bg-slate-50 p-12 text-center">
                    <p class="text-lg text-slate-600">Aucun evenement publie pour le moment.</p>
                </div>
            @endif
        </div>
    </div>
</section>

@endsection