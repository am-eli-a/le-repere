@extends('layouts.main') @push('styles')
    <link rel="stylesheet" href="{{ asset('css/repertoire.css') }}"> @endpush
@push('active_repertoire')class="active"@endpush

@section('content')
    <div class="repertoire-content">
        <h2>Le répertoire</h2>
        <p>Ici les coordonnés des personnes voulant être contactés sur des projets</p>
        <p>Si vous désirez faire partie de ce répertoire, ou ne plus en faire partie, veuillez contacter Septem 24 / Phil Production ou Studiodu7 sur notre site ou sur Instagram</p>
        <p> De nouvelles catégories sont ajoutées constamment, si vous voulez intégrer une catégorie qui n'existe pas encore, prévenez-nous et nous procéderons à l'ajout.</p>
        <a href="{{ route('contact') }}" class="bouton">Nous contacter</a>

        <div class="repertoire-bloc">
            @foreach($categories as $categorie)
                <div class="repertoire-bloc">
                    <h3>{{ $categorie->nom }}</h3>
                    <div class="repertoire-box">
                        @foreach($categorie->users as $user)
                        <div class="categorie-box">
                            @if($user->image)
                                <img src="{{ asset('storage/' . $user->image) }}" loading="lazy" alt="Photo de {{ $user->prenom }}">
                            @else
                                <img src="{{ asset('images/login.png') }}" alt="Image par défaut">
                            @endif
                            <p>{{ $user->prenom }} {{ $user->nom }}</p>
                            <p>{{ $user->age }}</p>
                            <p>{{ $user->lieu }}</p>
                            <p><span>@</span>{{ ltrim($user->insta, '@') }}</p>
                            @if($user->lien_demo)
                                <a href="{{ $user->lien_demo }}" target="_blank">Lien démo</a>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <h3>Acteur.ices</h3>
            <div class="repertoire-box">
                <div class="categorie-box">
                    <img src="{{asset ('images/login.png')}}" alt="img acteur">
                    <p>Nom, prénom</p>
                    <p>Âge</p>
                    <p>lieux</p>
                    <p>Contact</p>
                    <a href="#">Lien démo</a>
                </div>
                <div class="categorie-box">
                    <img src="{{asset ('images/login.png')}}" alt="img acteur">
                    <p>Nom, prénom</p>
                    <p>Âge</p>
                    <p>lieux</p>
                    <p>Contact</p>
                    <a href="#">Lien démo</a>
                </div>
                <div class="categorie-box">
                    <img src="{{asset ('images/login.png')}}" alt="img acteur">
                    <p>Nom, prénom</p>
                    <p>Âge</p>
                    <p>lieux</p>
                    <p>Contact</p>
                    <a href="#">Lien démo</a>
                </div>
            </div>
        </div>

        <div class="repertoire-bloc">
            <h3>Réalisateur.ices</h3>
            <div class="repertoire-box">
                <div class="categorie-box">
                    <img src="{{asset ('images/login.png')}}" alt="img acteur">
                    <p>Nom, prénom</p>
                    <p>Âge</p>
                    <p>lieux</p>
                    <p>Contact</p>
                    <a href="#">Lien démo</a>
                </div>
                <div class="categorie-box">
                    <img src="{{asset ('images/login.png')}}" alt="img acteur">
                    <p>Nom, prénom</p>
                    <p>Âge</p>
                    <p>lieux</p>
                    <p>Contact</p>
                    <a href="#">Lien démo</a>
                </div>
                <div class="categorie-box">
                    <img src="{{asset ('images/login.png')}}" alt="img acteur">
                    <p>Nom, prénom</p>
                    <p>Âge</p>
                    <p>lieux</p>
                    <p>Contact</p>
                    <a href="#">Lien démo</a>
                </div>
            </div>
        </div>

        <div class="repertoire-bloc">
            <h3>Scénaristes</h3>
            <div class="repertoire-box">
                <div class="categorie-box">
                    <img src="{{asset ('images/login.png')}}" alt="img acteur">
                    <p>Nom, prénom</p>
                    <p>Âge</p>
                    <p>lieux</p>
                    <p>Contact</p>
                    <a href="#">Lien démo</a>
                </div>
                <div class="categorie-box">
                    <img src="{{asset ('images/login.png')}}" alt="img acteur">
                    <p>Nom, prénom</p>
                    <p>Âge</p>
                    <p>lieux</p>
                    <p>Contact</p>
                    <a href="#">Lien démo</a>
                </div>
                <div class="categorie-box">
                    <img src="{{asset ('images/login.png')}}" alt="img acteur">
                    <p>Nom, prénom</p>
                    <p>Âge</p>
                    <p>lieux</p>
                    <p>Contact</p>
                    <a href="#">Lien démo</a>
                </div>
            </div>
        </div>
    </div>

@endsection
