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
                                    <img src="{{ asset($user->image) }}" loading="lazy" alt="Photo de {{ $user->prenom }}">
                                @else
                                    <img src="{{ asset('images/login.png') }}" alt="Image par défaut">
                                @endif
                                <p>{{ $user->prenom }} {{ $user->nom }}</p>
                                @if($user->age)
                                    <p>{{ $user->age }} ans</p>
                                @endif
                                <p>{{ $user->lieu }}</p>
                                @if($user->insta)
                                    <p>{{ ltrim($user->insta, '@') }}</p>
                                @endif
                                <p>{{($user->email)}}</p>
                                @if($user->lien_demo)
                                    <a href="{{ $user->lien_demo }}" target="_blank">Lien démo</a>
                                @endif
                            </div>
                        @endforeach
                    </div>
            @endforeach
        </div>
    </div>

@endsection
