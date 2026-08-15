@extends('layouts.main')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/information.css') }}">
@endpush
@push('active_informations')class="active"@endpush

@section('content')
    <div class="page-content">
        <h2 class="page-titre">Les informations</h2>
        <p class="page-intro">Ici, tu retrouveras toutes les informations supplémentaires liées au projet Le Repère. C'est mis à jour constamment donc n'hésitez pas à revenir jeter un coup d'œil.</p>
        <p class="page-intro">Si vous avez la moindre question, n'hésitez pas à contacter Septem 24, Phil Production ou Studio du 7 sur Instagram ou via le site.</p>

        <a href="{{ route('contact') }}" class="bouton">Nous contacter</a>

        <div class="information-bloc">
            @foreach($informations as $info)
                <div class="information-box">
                    <span class="titre-badge">{{ $info->titre }}</span>
                    <p>{{ $info->contenu }}</p>
                    @if($info->image)
                        <div class="info-image-container">
                            <img src="{{ Str::contains($info->image, 'uploads') ? asset($info->image) : asset('storage/' . $info->image) }}" alt="{{ $info->titre }}">
                        </div>
                    @endif
                    <p class="date-post">Posté le {{ $info->created_at->format('d/m/Y') }}</p>
                </div>
            @endforeach

            <div class="information-box">
                <span class="titre-badge">Le mini-repère</span>
                <p>L'association Septem 24 a mis en place un projet complémentaire au Repère. C'est un groupe Instagram pour les personnes dans le milieu du cinéma lillois amateur ou professionnel. Le but est de rassembler ces personnes pour qu'elles s'entraident. Dans ce groupe, vous pouvez partager vos travaux, vos idées ou même chercher vos futurs collaborateurs.</p>
                <img src="{{ asset('/images/qrcode_le-mini-repere.JPG') }}" class="qrcode" alt="QR Code mini-repère">
                <p class="date-post">Posté le xx.xx.xxxx</p>
            </div>

            <div class="information-box">
                <span class="titre-badge">Partenariats</span>
                <p>Vous êtes un groupe, un collectif, une association, une société ou autre et vous souhaitez devenir partenaire du Repère ? C'est possible ! Contactez Septem 24 par mail : sep7em.24@gmail.com, ou via le formulaire de contact.</p>
                <a href="{{ route('contact') }}" class="bouton">Nous contacter</a>
                <p class="date-post">Posté le xx.xx.xxxx</p>
            </div>
        </div>
    </div>
@endsection
