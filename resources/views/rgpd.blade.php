@extends('layouts.main')

@section('content')
    <div class="page-content">
        <h2 class="page-titre">Protection des Données (RGPD)</h2>

        <div class="bloc-brutal">
            <span class="titre-badge">1. Collecte des données</span>
            <p>En vous inscrivant sur <strong>Le Repère</strong>, nous collectons les informations nécessaires à la gestion du répertoire (Nom, Prénom, Âge, Ville, Image de profil, Réseaux sociaux).</p>

            <span class="titre-badge">2. Utilisation et Sécurité</span>
            <p>Ces données servent uniquement à mettre en relation les membres de l'association sur des projets audiovisuels. Elles sont stockées de manière sécurisée sur notre base de données.</p>

            <span class="titre-badge">3. Vos Droits (Loi Informatique et Libertés)</span>
            <p>Conformément au RGPD, vous disposez d'un droit d'accès, de modification et de suppression de vos données. Vous pouvez exercer ce droit de manière totalement autonome en vous rendant dans votre espace profil et en cliquant sur le bouton <strong>"Supprimer mon compte"</strong>.</p>

            <a href="{{ route('home') }}" class="bouton" style="margin-top:20px;">Retour à l'accueil</a>
        </div>
    </div>
@endsection
