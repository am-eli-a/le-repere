@extends('layouts.main')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush

@section('content')
    <div class="login-container">
        <div class="login-box">
            <h2>Mot de passe oublié</h2>
            <hr>

            <p style="text-align: left; font-size: 0.9rem; margin-bottom: 25px; color: #444; line-height: 1.4;">
                {{ __('Pas de souci ! Indique-nous ton adresse email et nous t\'enverrons un lien de réinitialisation pour en choisir un nouveau.') }}
            </p>

            @if (session('status'))
                <div style="background-color: #efc849; color: #1a1a1a; padding: 10px; margin-bottom: 20px; font-weight: bold; border: 2px solid #1a1a1a;">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" :value="old('email')" required autofocus>

                    @if ($errors->get('email'))
                        <span style="color: #e3342f; font-size: 0.8rem; font-weight: bold;">
                        {{ $errors->first('email') }}
                    </span>
                    @endif
                </div>

                <div class="options" style="justify-content: center;">
                    <a href="{{ route('login') }}">Retour à la connexion</a>
                </div>

                <button type="submit" class="bouton">
                    {{ __('Envoyer le lien') }}
                </button>
            </form>
        </div>
    </div>
@endsection
