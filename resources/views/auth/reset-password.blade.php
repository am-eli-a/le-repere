@extends('layouts.main')
@push('styles') <link rel="stylesheet" href="{{ asset('css/login.css') }}"> @endpush

@section('content')
    <div class="login-container">
        <div class="login-box">
            <h2>Créer un compte</h2>
            <hr>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="input-group">
                    <label for="name">Nom</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
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
