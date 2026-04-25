@extends('layouts.main')
@push('styles') <link rel="stylesheet" href="{{ asset('css/login.css') }}"> @endpush

@section('content')
    <div class="login-container">
        <div class="login-box">
            <h2>Zone sécurisée</h2>
            <hr>
            <p style="text-align: left; font-size: 0.9rem; margin-bottom: 20px;">Merci de confirmer votre mot de passe avant de continuer.</p>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf
                <div class="input-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="bouton">Confirmer</button>
            </form>
        </div>
    </div>
@endsection
