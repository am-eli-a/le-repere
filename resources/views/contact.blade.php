@extends('layouts.main') @push('styles')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}"> @endpush
@push('active_contact')class="active"@endpush

@section('content')
    <br><br>
    <section id="formulaire" class="form-container">
        <h2>Nous contacter</h2>
        <hr>
        <br>
        <form action="{{ route('contact') }}" method="POST">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" placeholder="Entrez votre nom" required>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" placeholder="Entrez votre prénom" required>

            <label for="email">Mail :</label>
            <input type="email" id="email" name="email" placeholder="Entrez votre mail" required>

            <label for="tel">Téléphone :</label>
            <input type="tel" id="tel" name="tel" placeholder="Entrez votre numéro de téléphone">

            <label for="message">Message :</label>
            <textarea id="message" name="message" placeholder="Écrivez un message" rows="7"></textarea>
            <div class="submit">
                <button type="submit" class="bouton">Envoyer</button>
            </div>
        </form>
    </section>
    <br><br>
@endsection
