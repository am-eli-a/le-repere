@extends('layouts.main')
@push('styles')<link rel="stylesheet" href="{{ asset('css/boite_a_idees.css') }}"> @endpush
@push('active_boite-a-idees')class="active"@endpush

@section('content')
    <div class="boite_idee-content">
        <h2>Vos suggestions</h2>
        <p>N'hésitez pas à proposer une idée :)</p>

        @auth
            <a href="{{ route('dashboard') }}" class="bouton">Faire une suggestion</a>
        @else
            <p>Vous devez être connecté pour poster une suggestion.</p>
            <a href="{{ route('login') }}" class="bouton">Se connecter</a>
        @endauth

        <div class="boite_idee-bloc">
            @foreach($suggestions as $suggestion)
                <div class="boite_idee-box">
                    <h3>{{ $suggestion->titre }}</h3>
                    <p>Description de l'idée :</p>
                    <p>{{ $suggestion->description }}</p>

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

            <div class="boite_idee-box">
                <h3>Titre</h3>
                <p>Description de l'idée :</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi itaque magni odit, quaerat
                    similique suscipit totam? Amet culpa, eius fuga incidunt ipsum labore quibusdam rem veniam! A alias
                    aut sit!</p>
                <div class="vote">
                    <button class="aprouve">Je valide !</button>
                </div>
            </div>
        </div>

    </div>
@endsection
