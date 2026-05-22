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
                <p>Description de l'avis :</p>
                <p>{{$avis->description}}</p>
                <p>Date du post : {{$avis->created_at->format('d/m/Y')}}</p>
                <p>Note : {{$avis->note}} / 5</p>
            </div>
            @endforeach
        </div>
    </div>
@endsection
