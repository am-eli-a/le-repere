@extends('layouts.main') @push('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}"> @endpush

@section('content')
    <div class="login-container">
        <div class="login-box">
            <h2>Connexion Admin</h2>
            <hr>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required autofocus>
                </div>

                <div class="input-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="options">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                    @endif
                </div>
                <button type="submit" class="bouton">Se connecter</button>
            </form>
        </div>
    </div>
@endsection
