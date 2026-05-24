@extends('layouts.app')

@section('content')
    <div class="repertoire-content" style="display: flex; flex-direction: column; align-items: flex-start; text-align: left; max-width: 800px; margin: 0 auto; padding: 40px 20px;">
        <h2 style="color: #1a1a1a; text-transform: uppercase; border-bottom: 4px solid #efc849; padding-bottom: 10px; width: 100%;">Protection des Données (RGPD)</h2>

        <div class="categorie-box" style="width: 100%; display: flex; flex-direction: column; align-items: flex-start; text-align: left; padding: 30px; background: #ffffff; box-shadow: 6px 6px 0 #1a1a1a;">
            <h3 style="background-color: #efc849; padding: 5px 15px; width: fit-content; text-transform: uppercase; font-size: 1.2rem; color: #1a1a1a; margin-top: 0;">1. Collecte des données</h3>
            <p style="color: #333; line-height: 1.6; margin-bottom: 25px; text-align: left;">En vous inscrivant sur <strong>Le Repère</strong>, nous collectons les informations nécessaires à la gestion du répertoire (Nom, Prénom, Âge, Ville, Image de profil, Réseaux sociaux).</p>

            <h3 style="background-color: #efc849; padding: 5px 15px; width: fit-content; text-transform: uppercase; font-size: 1.2rem; color: #1a1a1a;">2. Utilisation et Sécurité</h3>
            <p style="color: #333; line-height: 1.6; margin-bottom: 25px; text-align: left;">Ces données servent uniquement à mettre en relation les membres de l'association sur des projets audiovisuels. Elles sont stockées de manière sécurisée sur notre base de données.</p>

            <h3 style="background-color: #efc849; padding: 5px 15px; width: fit-content; text-transform: uppercase; font-size: 1.2rem; color: #1a1a1a;">3. Vos Droits (Loi Informatique et Libertés)</h3>
            <p style="color: #333; line-height: 1.6; margin-bottom: 25px; text-align: left;">Conformément au RGPD, vous disposez d'un droit d'accès, de modification et de suppression de vos données. Vous pouvez exercer ce droit de manière totalement autonome en vous rendant dans votre espace profil et en cliquant sur le bouton <strong>"Supprimer mon compte"</strong>.</p>

            <div style="margin-top: 20px; width: 100%;">
                <a href="{{ route('home') }}" class="bouton" style="display: inline-block; text-align: center;">Retour à l'accueil</a>
            </div>
        </div>
    </div>
@endsection
