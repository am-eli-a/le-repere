@extends('layouts.main') @push('styles')
    <link rel="stylesheet" href="{{ asset('css/annonce.css') }}"> @endpush
@push('active_annonce')class="active"@endpush

@section('content')
    <div class="annonce-content">
        <h2>Les annonces</h2>
        <p>Ici, tu retrouveras toutes les annonces de tournages ou de projets en tout genre. Lorsque quelqu'un cherchera à constituer une équipe ou trouver un rôle en particulier, une annonce sera postée ici et vous serez libre de le contacter.</p>
        <p>N'importe qui peut poster une annonce ici, mais la page est surveillée par la modération pour éviter toute sorte d'abus ou d'actes malveillants.</p>

        <a href="{{ route('contact') }}" class="bouton">Poster une annonce</a>

        <div class="annonce-bloc">
            @foreach($toutesLesAnnonce as $annonce)
                <div class="annonce-box">
                    <img src="{{ asset('images/img_tmp.png') }}" class="affiche" alt="affiche canva">
                    <h3>{{$annonce->titre}}</h3>
                    <p>Description de l'annonce :</p>
                    <p>{{$annonce->description}}</p>
                    <p>{{$annonce->date}}</p>
                    <p>{{$annonce->lieu}}</p>
                    <p>Participants :</p>
                    <li>Participant 1</li>
                    <li>Participant 2</li>
                    <li>Participant 3</li>
                    <p>Contact des participants :</p>
                    <li><a href="">Contact du participant 1</a></li>
                    <li><a href="">Contact du participant 2</a></li>
                    <li><a href="">Contact du participant 3</a></li>
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
