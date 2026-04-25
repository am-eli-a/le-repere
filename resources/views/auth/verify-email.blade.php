@extends('layouts.main')
@push('styles') <link rel="stylesheet" href="{{ asset('css/login.css') }}"> @endpush

@section('content')
    <div class="login-container">
        <div class="login-box">
            <h2>Vérifier l'email</h2>
            <hr>
            <p style="text-align: left; font-size: 0.9rem; margin-bottom: 20px;">
                Merci de vous être inscrit ! Avant de commencer, pourriez-vous vérifier votre adresse email en cliquant sur le lien que nous venons de vous envoyer ?
            </p>

            @if (session('status') == 'verification-link-sent')
                <div style="background-color: #efc849; color: #1a1a1a; padding: 10px; margin-bottom: 20px; font-weight: bold; border: 2px solid #1a1a1a; font-size: 0.8rem;">
                    Un nouveau lien de vérification a été envoyé !
                </div>
            @endif

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="bouton" style="margin-bottom: 15px;">Renvoyer l'email</button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="options" style="background:none; border:none; cursor:pointer; text-decoration:underline; width:100%;">
                    Se déconnecter
                </button>
            </form>
        </div>
    </div>
@endsection
