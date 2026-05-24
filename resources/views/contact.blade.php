@extends('layouts.main') @push('styles')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}"> @endpush
@push('active_contact')class="active"@endpush

@section('content')
    <br><br>
    <section id="formulaire" class="form-container">
        <h2>Nous contacter</h2>
        <hr>
        <br>
        <div class="repertoire-content">
            <div class="categorie-box" style="width: 100%; max-width: 600px; margin: 40px auto; text-align: center; align-items: center;">
                <div style="background-color: #efc849; color: #1a1a1a; padding: 10px 20px; font-weight: bold; border: 2px solid #1a1a1a; box-shadow: 4px 4px 0 #1a1a1a; margin-bottom: 25px; text-transform: uppercase;">
                    La page de contact est actuellement en maintenance
                </div>

                <p style="font-size: 1.1rem; color: #1a1a1a; margin-bottom: 20px; line-height: 1.6;">
                    Notre système d'envoi de messages est actuellement en cours de mise à jour pour mieux vous répondre.
                </p>

                <p style="font-size: 1rem; color: #444; margin-bottom: 30px;">
                    Pour toute demande, vous pouvez nous contacter directement à notre adresse mail :<br>
                    <strong style="color: #1a1a1a; font-size: 1.1rem;">sep7em.24@gmail.ccom</strong>
                </p>

                <a href="{{ route('home') }}">Retour à l'accueil</a>
            </div>
        </div>
    </section>
    <br><br>
@endsection
