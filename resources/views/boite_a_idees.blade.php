@extends('layouts.main')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/boite_a_idees.css') }}">
@endpush
@push('active_boite-a-idees')class="active"@endpush

@section('content')
    <div class="page-content">
        <h2 class="page-titre">Vos suggestions</h2>
        <p class="page-intro">N'hésitez pas à proposer une idée pour améliorer le site ou la communauté :)</p>

        @auth
            <a href="{{ route('dashboard') }}" class="bouton">Faire une suggestion</a>
        @else
            <p class="page-intro">Vous devez être connecté pour poster une suggestion.</p>
            <a href="{{ route('login') }}" class="bouton">Se connecter</a>
        @endauth

        <div class="boite_idee-bloc">
            @foreach($suggestions as $suggestion)
                <div class="boite_idee-box bloc-brutal">
                    <span class="titre-badge">{{ $suggestion->titre }}</span>
                    <p class="suggestion-description">{{ $suggestion->description }}</p>

                    <div class="vote">
                        @auth
                            <form action="{{ route('suggestions.like', $suggestion->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="aprouve {{ $suggestion->isLikedBy(auth()->user()) ? 'already-voted' : '' }}">
                                    Je valide !
                                    <span class="count-badge">{{ $suggestion->likes_count }}</span>
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="aprouve" style="text-decoration: none;">
                                Je valide !
                                <span class="count-badge">{{ $suggestion->likes()->count() }}</span>
                            </a>
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
