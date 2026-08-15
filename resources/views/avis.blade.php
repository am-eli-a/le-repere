@extends('layouts.main')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/avis.css') }}">
@endpush
@push('active_avis')class="active"@endpush

@section('content')
    <div class="page-content">
        <h2 class="page-titre">Les avis</h2>
        <p class="page-intro">N'hésitez pas à poster un avis :)</p>

        @auth
            <a href="{{ route('dashboard') }}" class="bouton">Poster un avis</a>
        @else
            <p class="page-intro">Vous devez être connecté pour poster un avis.</p>
            <a href="{{ route('login') }}" class="bouton">Se connecter</a>
        @endauth

        <div class="avis-bloc">
            @foreach($touslesavis as $avis)
                <div class="avis-box bloc-brutal">
                    <p class="avis-description">{{ $avis->description }}</p>
                    <div class="avis-meta">
                        <span class="titre-badge">{{ $avis->note }} / 5</span>
                        <span class="date-post">{{ $avis->created_at->format('d/m/Y') }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
