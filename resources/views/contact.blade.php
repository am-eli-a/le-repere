@extends('layouts.main')
@push('active_contact')class="active"@endpush

@section('content')
    <div class="page-content">
        <h2 class="page-titre">Nous contacter</h2>

        <div class="bloc-brutal" style="max-width:600px; text-align:center; margin:0 auto;">
            <span class="titre-badge">Page en maintenance</span>
            <p class="page-intro" style="margin-top:15px;">
                Notre système d'envoi de messages est actuellement en cours de mise à jour pour mieux vous répondre.
            </p>
            <p class="page-intro">
                Pour toute demande, contactez-nous directement à :<br>
                <strong style="font-size:1.1rem;">sep7em.24@gmail.com</strong>
            </p>
            <a href="{{ route('home') }}" class="bouton" style="margin-top:10px;">Retour à l'accueil</a>
        </div>
    </div>
@endsection
