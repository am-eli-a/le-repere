@extends('layouts.main') @push('styles')
    <link rel="stylesheet" href="{{ asset('css/avis.css') }}"> @endpush
@push('active_avis')class="active"@endpush

@section('content')
    <div class="avis-content">
        <h2>Les avis</h2>
        <p>N'hésitez pas à poster un avis :)</p>
        @auth
            <a href="{{ route('dashboard') }}" class="bouton">Poster un avis</a>
        @else
            <p>Vous devez être connecté pour poster un avis.</p>
            <a href="{{ route('login') }}" class="bouton">Se connecter</a>
        @endauth

        <div class="avis-bloc">
            @foreach($touslesavis as $avis)
            <div class="avis-box">
                <h3>{{$avis->nom}}</h3>
                <p>Description de l'avis :</p>
                <p>{{$avis->description}}</p>
                <p>Date du post : {{$avis->created_at->format('d/m/Y')}}</p>
                <p>{{$avis->note}}</p>
            </div>
            @endforeach

            <div class="avis-box">
                <h3>titre</h3>
                <p>Description de l'avis :</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab dolor error, facere incidunt maxime
                    optio placeat saepe sapiente! Doloribus eos fuga laudantium quasi, repellendus reprehenderit tempore
                    unde. Ad, beatae modi pariatur, perspiciatis quam quibusdam quod rerum similique sit suscipit totam,
                    ut vero? At cumque doloribus error inventore odit quam quod?</p>
                <p>Date du post : xx.xx.xxxx</p>
                <p>note /5 ?</p>
            </div>
        </div>
    </div>
@endsection
