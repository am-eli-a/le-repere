@extends('layouts.main') @push('styles')
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}"> @endpush

@section('content')
    <section class="hero">
        <div class="hero">
        </div>
    </section>
    <div class="bloc">
        <h2>Le Repère</h2>
        <p>Bienvenu dans "Le Repère" ! Un répertoire mis en place par l'association Septem 24 et accessible au
                public. Ce dernier regroupe des personnes en fonction de leur activité qui acceptent d'être contactées
                pour participer à des projets amateurs ou professionnels. Chaque personne est vérifiée par notre
                équipe. </p>
        <a href="{{ route('repertoire') }}" class="bouton">Le répertoire</a>
    </div>
@endsection
