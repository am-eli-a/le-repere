@extends('layouts.main') @push('styles')
    <link rel="stylesheet" href="{{ asset('css/annonce.css') }}"> @endpush
@push('active_annonce')class="active"@endpush

@section('content')
    <div class="annonce-content">
        <h2>Les annonces</h2>
        <p>Ici, tu retrouveras toutes les annonces de tournages ou de projets en tout genre. Lorsque quelqu'un cherchera à constituer une équipe ou trouver un rôle en particulier, une annonce sera postée ici et vous serez libre de le contacter.</p>
        <p>N'importe qui peut poster une annonce ici, mais la page est surveillée par la modération pour éviter toute sorte d'abus ou d'actes malveillants.</p>

        @auth
            <a href="{{ route('dashboard') }}" class="bouton">Poster une annonce</a>
        @else
            <p>Vous devez être connecté pour poster une annonce.</p>
            <a href="{{ route('login') }}" class="bouton">Se connecter</a>
        @endauth

        <div class="annonce-bloc">
            @foreach($toutesLesAnnonce as $annonce)
                <div class="annonce-box">
                    @if($annonce->affiche)
                        <div class="annonce-affiche-container">
                            <img src="{{ asset('storage/' . $annonce->affiche) }}" loading="lazy" alt="Affiche {{ $annonce->titre }}">
                        </div>
                    @endif
                    <h3>{{$annonce->titre}}</h3>
                    <p>Description de l'annonce :</p>
                    <p>{{$annonce->description}}</p>
                    <p>Date : {{$annonce->date}}</p>
                    <p>Lieu : {{$annonce->lieu}}</p>
                        <div class="annonce-infos">
                            <p><strong>Publié par :</strong> {{ $annonce->user->prenom }} {{ $annonce->user->nom }}</p>
                            <p><strong>Contact :</strong></p>
                            <ul>
                                <li>Mail : <a href="mailto:{{ $annonce->user->email }}">{{ $annonce->user->email }}</a></li>
                                <li>Insta : {{ $annonce->user->insta ? '@'.ltrim($annonce->user->insta, '@') : 'Non renseigné' }}</li>
                            </ul>

                            <p class="date-publication">
                                Posté le : {{ $annonce->created_at->format('d/m/Y') }}
                                <span style="font-size: 0.8rem; font-style: italic;">({{ $annonce->created_at->diffForHumans() }})</span>
                            </p>
                        </div>
                </div>
            @endforeach

            <div class="annonce-box">
                <h3>Titre</h3>
                <p>Description de l'annonce :</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi itaque magni odit, quaerat
                    similique suscipit totam? Amet culpa, eius fuga incidunt ipsum labore quibusdam rem veniam! A alias
                    aut sit!</p>
                <p>Date</p>
                <p>Lieux</p>
                <p>Participants :</p>
                <li>Participant 1</li>
                <li>Participant 2</li>
                <li>Participant 3</li>
                <p>Contact des participants :</p>
                <li><a href="">Contact du participant 1</a></li>
                <li><a href="">Contact du participant 2</a></li>
                <li><a href="">Contact du participant 3</a></li>
            </div>
        </div>
    </div>
@endsection
