@extends('layouts.main')

@section('content')
    <div class="repertoire-content" style="display: flex; flex-direction: column; align-items: flex-start; text-align: left; max-width: 800px; margin: 0 auto; padding: 40px 20px;">
        <h2 style="color: #1a1a1a; text-transform: uppercase; border-bottom: 4px solid #efc849; padding-bottom: 10px; width: 100%;">Mentions Légales</h2>

        <div class="categorie-box" style="width: 100%; display: flex; flex-direction: column; align-items: flex-start; text-align: left; padding: 30px; background: #ffffff; box-shadow: 6px 6px 0 #1a1a1a;">

            <h3 style="background-color: #efc849; padding: 5px 15px; width: fit-content; text-transform: uppercase; font-size: 1.2rem; color: #1a1a1a; margin-top: 0;">1. Édition du site</h3>
            <p style="margin-bottom: 25px; line-height: 1.6; color: #333; text-align: left;">
                Le site internet <strong>Le Repère</strong> (accessible à l'adresse <em>https://le-repere.ameliadev.fr</em>) est édité par l'association "Le Repère".<br>
                <strong>Directeur de la publication :</strong> Steven Lemée<br>
                <strong>Contact :</strong> sep7em.24@gmail.com
            </p>

            <h3 style="background-color: #efc849; padding: 5px 15px; width: fit-content; text-transform: uppercase; font-size: 1.2rem; color: #1a1a1a;">2. Hébergement</h3>
            <p style="margin-bottom: 25px; line-height: 1.6; color: #333; text-align: left;">
                Le site est hébergé par la plateforme Cloud <strong>Railway</strong>.<br>
                Infrastructure sécurisée et serveurs localisés en Europe / États-Unis selon les grappes de déploiement de la plateforme.<br>
                Site web de l'hébergeur : <a href="https://railway.app" target="_blank" style="color: #1a1a1a; font-weight: bold; text-decoration: underline;">railway.app</a>
            </p>

            <h3 style="background-color: #efc849; padding: 5px 15px; width: fit-content; text-transform: uppercase; font-size: 1.2rem; color: #1a1a1a;">3. Propriété intellectuelle</h3>
            <p style="margin-bottom: 25px; line-height: 1.6; color: #333; text-align: left;">
                L'ensemble des contenus présents sur ce site (textes, logos, designs néo-brutalistes, icônes) sont la propriété exclusive de l'association, à l'exception des images et informations importées par les membres dans la section répertoire et annonces, qui restent sous leur responsabilité.
            </p>

            <h3 style="background-color: #efc849; padding: 5px 15px; width: fit-content; text-transform: uppercase; font-size: 1.2rem; color: #1a1a1a;">4. Cookies techniques</h3>
            <p style="margin-bottom: 25px; line-height: 1.6; color: #333; text-align: left;">
                Ce site utilise uniquement des cookies strictement nécessaires à son bon fonctionnement technique (sessions de connexion chiffrées). Aucun cookie de tracking publicitaire ou de ciblage tiers n'est déposé sur votre navigateur.
            </p>

            <div style="margin-top: 20px; width: 100%;">
                <a href="{{ route('home') }}" class="bouton" style="display: inline-block; text-align: center;">Retour à l'accueil</a>
            </div>
        </div>
    </div>
@endsection
