@extends('layouts.main') @push('styles')
    <link rel="stylesheet" href="{{ asset('css/information.css') }}"> @endpush
@push('active_informations')class="active"@endpush

@section('content')
    <div class="information-content">
        <h2>Les informations</h2>
        <p>Ici, tu retrouvera toutes les informations supplémentaire liés au projet Le Repère. Des choses qu'on ne peut forcément mettre sur les autres pages. C'est mis à jour constamment donc n'hésitez pas à venir jeter des coup d'oeils de temps en temps. </p>
        <p>Si vous avez la moindre question, n'hésitez pas à contacter Septem 24/Phil Production ou Studiodu7 sur instagram ou via le site</p>

        <a href="{{ route('contact') }}" class="bouton">Nous contacter</a>

        <div class="information-bloc">
            @foreach($informations as $info)
                <div class="information-box">
                    <h3>{{$info->titre}}</h3>
                    <p>{{$info->contenu}}</p>
                    @if($info->image)
                        <div class="annonce-affiche-container">
                            <img src="{{ asset($info->image) }} alt="Image pour {{ $info->titre }}">
                        </div>
                    @endif
                    <p>Date du post : {{ $info->created_at->format('d/m/Y') }}</p>
                </div>
            @endforeach

            <div class="information-box">
                <h3>Le mini-repère</h3>
                <p>L'Association Septem 24 à mis en place un projet complémentaire au Repère. C'est un groupe Instagram pour les personnes dans le milieu du cinéma Lillois amateur ou même professionel. Le but est de rassembler ces personnes pour qu'ils s'entraident. Dans ce groupe, vous pouvez partager vos travaux, vos idées où même chercher vos futurs collègues. Pour rejoindre, rien de plus simple, il suffit de scanner le QR Code si dessous et de faire une demande pour rejoindre le groupe. Ensuite, nous nous occuperons du reste. </p>
                <img src={{asset ('/images/qrcode_le-mini-repere.JPG')}} class="qrcode">
                <p>Date du post : xx.xx.xxxx</p>
            </div>

            <div class="information-box">
                <h3>Partenariats</h3>
                <p>Vous êtes un groupe, un collectif, une association, une société ou autre et vous souhaitez devenir partenaire du Repère ? C'est possible ! Il suffit de contacter Septem 24 par mail : sep7em.24@gmail.com, ou via le formulaire de contact.</p>
                <a href="{{ route('contact') }}" class="bouton">Nous contacter</a>
                <p>Date du post : xx.xx.xxxx</p>
            </div>
        </div>
    </div>
@endsection
