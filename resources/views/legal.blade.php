@extends('layouts.app')

@section('content')
    <div class="repertoire-content" style="align-items: flex-start; text-align: left; max-width: 800px; margin: 0 auto; padding: 40px 20px;">
        <h2>Mentions Légales</h2>

        <div class="categorie-box" style="width: 100%; align-items: flex-start; text-align: left; padding: 30px; background: #ffffff;">

            <h3 style="font-size: 1.2rem; margin-top: 0;">1. Édition du site</h3>
            <p style="margin-bottom: 20px; line-height: 1.6; color: #333;">
                Le site internet <strong>Le Repère</strong> (accessible à l'adresse <em>https://le-repere.ameliadev.fr</em>) est édité par l'association "Le Repère".<br>
                <strong>Directeur de la publication :</strong> Steven Lemée<br>
                <strong>Contact :</strong> sep7em.24@gmail.com
            </p>

            <h3 style="font-size: 1.2rem;">2. Hébergement</h3>
            <p style="margin-bottom: 20px; line-height: 1.6; color: #333;">
                Le site est hébergé par la plateforme Cloud <strong>Railway</strong>.<br>
                Infrastructure sécurisée et serveurs localisés en Europe / États-Unis selon les grappes de déploiement de la plateforme.<br>
                Site web de l'hébergeur : <a href="https://railway.app" target="_blank" style="color: #1a1a1a; font-weight: bold;">railway.app</a>
            </p>

            <h3 style="font-size: 1.2rem;">3. Propriété intellectuelle</h3>
            <p style="margin-bottom: 20px; line-height: 1.6; color: #333;">
                L'ensemble des contenus présents sur ce site (textes, logos, designs néo-brutalistes, icônes) sont la propriété exclusive de l'association, à l'exception des images et informations importées par les membres dans la section répertoire et annonces, qui restent sous leur responsabilité.
            </p>

            <h3 style="font-size: 1.2rem;">4. Cookies techniques</h3>
            <p style="margin-bottom: 10px; line-height: 1.6; color: #333;">
                Ce site utilise uniquement des cookies strictement nécessaires à son bon fonctionnement technique (sessions de connexion chiffrées). Aucun cookie de tracking publicitaire ou de ciblage tiers n'est déposé sur votre navigateur.
            </p>

            <div style="margin-top: 30px;">
                <a href="{{ route('home') }}">Retour à l'accueil</a>
            </div>
        </div>
    </div>
@endsection
