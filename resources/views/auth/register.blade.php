@extends('layouts.main')
@push('styles') <link rel="stylesheet" href="{{ asset('css/login.css') }}"> @endpush

@section('content')
    <div class="login-container">
        <div class="login-box">
            <h2>Créer un compte</h2>
            <hr>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                @if ($errors->any())
                    <div style="border: 2px solid #ff4444; padding: 10px; margin-bottom: 20px; background: #ffebeb; box-shadow: 4px 4px 0 #ff4444;">
                        @foreach ($errors->all() as $error)
                            <p style="color: #ff4444; font-weight: bold;">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <div class="input-group">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" required autofocus>
                </div>
                <div class="input-group">
                    <label for="prenom">Prenom</label>
                    <input type="text" id="prenom" name="prenom" required autofocus>
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="input-group">
                    <label for="password_confirmation">Confirmer le mot de passe</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                </div>
                <div class="options">
                    <a href="{{ route('login') }}">Déjà inscrit ?</a>
                </div>
                <button type="submit" class="bouton">S'inscrire</button>
            </form>
        </div>
    </div>
@endsection
