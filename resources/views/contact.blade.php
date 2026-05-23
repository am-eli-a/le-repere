@extends('layouts.main') @push('styles')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}"> @endpush
@push('active_contact')class="active"@endpush

@section('content')
    <br><br>
    <section id="formulaire" class="form-container">
        <h2>Nous contacter</h2>
        <hr>
        <br>
        <form action="{{ route('contact.submit') }}" method="POST">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" placeholder="Entrez votre nom" required>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" placeholder="Entrez votre prénom" required>

            <label for="email">Mail :</label>
            <input type="email" id="email" name="email" placeholder="Entrez votre mail" required>

            <label for="objet">Objet</label>
            <div class="select-wrapper">
                <select name="objet" id="objet" required>
                    <option value="" disabled selected>Sélectionner une demande</option>
                    <option value="Demande d'ajout d'une catégorie">Ajout d'une catégorie dans le répertoire</option>
                    <option value="Demande de partenariats">Faire parti des partenaires</option>
                    <option value="Toute autre demande">Toute autre demande</option>
                </select>
            </div>

            <label for="message">Message :</label>
            <textarea id="message" name="message" placeholder="Écrivez un message" rows="7"></textarea>
            <div class="submit">
                @auth
                    <button type="submit" class="bouton">Envoyer</button>
                @else
                    <p>Vous devez être connecté pour envoyer un message.</p>
                    <br>
                    <a href="{{ route('login') }}" class="bouton">Se connecter</a>
                @endauth
            </div>
        </form>
    </section>
    <br><br>
@endsection
