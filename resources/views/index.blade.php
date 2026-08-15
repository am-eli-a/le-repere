@extends('layouts.main') @push('styles')
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}"> @endpush

@section('content')
    <section class="carousel">
        <div class="swiper">
            <div class="swiper-wrapper">
                @for($i = 1; $i <= 11; $i++)
                    <div class="swiper-slide">
                        <img src="{{ asset('images/carrousel/' . $i . '.jpg') }}" alt="Photo de tournage {{ $i }}">
                    </div>
                @endfor
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </section>

    <section class="presentation_texte">
        <div class="presentation">
            <h1 class="titre">Le Repère</h1>
            <p>Bienvenu dans "Le Repère" ! Un répertoire mis en place par l'association Septem 24 et accessible au
                public. Ce dernier regroupe des personnes en fonction de leur activité qui acceptent d'être contactées
                pour participer à des projets amateurs ou professionnels. Chaque personne est vérifiée par notre
                équipe.
            </p>
        </div>
    </section>

    <section class="repertoire">
        <h2>Le répertoire</h2>
        <div class="categorie-box">
            <button>Tous</button>
            @foreach($categories as $categorie)
                <button>{{ $categorie->nom }}</button>
            @endforeach
            <input type="text" placeholder="Recherche..." id="recherche" name="recherche">
        </div>
        <div class="repertoire-box">
            @foreach($users as $user)
                <div class="repertoire-bloc"
                     data-search="{{ strtolower($user->prenom . ' ' . $user->nom . ' ' . $user->lieu . ' ' . $user->age) }}"
                     data-categories="{{ strtolower($user->categories->pluck('nom')->join(',')) }}">
                    @if($user->image)
                        <img src="{{ asset($user->image) }}" loading="lazy" alt="Photo de {{ $user->prenom }}">
                    @else
                        <img src="{{ asset('images/login.png') }}" alt="Image par défaut">
                    @endif
                    <p><strong>{{ $user->prenom }} {{ $user->nom }}</strong></p>
                    @if($user->age)
                        <p>{{ $user->age }} ans</p>
                    @endif
                        @if($user->categories->isNotEmpty())
                            <div class="user-categories">
                                @foreach($user->categories as $cat)
                                    <span class="cat-pill">{{ $cat->nom }}</span>
                                @endforeach
                            </div>
                        @endif
                    <p>{{ $user->lieu }}</p>
                        @if($user->lien_demo)
                            <a href="{{ $user->lien_demo }}" target="_blank">Lien démo</a>
                        @endif
                        @auth
                            @if($user->insta)
                                <p>{{ ltrim($user->insta, '@') }}</p>
                            @endif
                            <p>{{ $user->email }}</p>
                        @endauth
                </div>
            @endforeach
        </div>
    </section>

    <section class="annonces">
        <h2>Les dernières annonces</h2>
        <div class="annonce-box">
            @foreach($annonces as $annonce)
                <div class="annonce-bloc">
                    <p><strong>{{ $annonce->titre }}</strong></p>
                    @if($annonce->lieu)
                        <p>{{ $annonce->lieu }} </p>
                    @endif
                    <p>Publié par : {{ $annonce->user->prenom }} {{ $annonce->user->nom }}</p>
                </div>
            @endforeach
            <a href="{{ route('annonce') }}">Voir toutes les annonces →</a>
        </div>
    </section>

    <section class="cta">
        <div>
            @auth
                <a href="{{ route('dashboard') }}" class="bouton">Poster une annonce</a>
            @else
                <p>Vous devez être connecté pour poster une annonce.</p>
                <a href="{{ route('login') }}" class="bouton">Se connecter</a>
            @endauth
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        const swiper = new Swiper('.swiper', {
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

        document.getElementById('recherche').addEventListener('input', function() {
            const query = this.value.toLowerCase().trim();
            document.querySelectorAll('.repertoire-bloc').forEach(bloc => {
                const data = bloc.getAttribute('data-search');
                bloc.style.display = data.includes(query) ? 'block' : 'none';
            });
        });

        document.querySelectorAll('.categorie-box button').forEach(btn => {
            btn.addEventListener('click', function() {

                document.querySelectorAll('.categorie-box button').forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                const filtre = this.textContent.trim().toLowerCase();

                document.querySelectorAll('.repertoire-bloc').forEach(bloc => {
                    if (filtre === 'tous') {
                        bloc.style.display = 'block';
                    } else {
                        const cats = bloc.getAttribute('data-categories') || '';
                        bloc.style.display = cats.includes(filtre) ? 'block' : 'none';
                    }
                });
            });
        });
    </script>
@endpush
