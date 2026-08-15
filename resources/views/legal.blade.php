@extends('layouts.main')

@section('content')
    <div class="page-content">
        <h2 class="page-titre">Mentions Légales</h2>

        <div class="bloc-brutal">
            <span class="titre-badge">1. Édition du site</span>
            <p>Le site internet <strong>Le Repère</strong> (accessible à l'adresse <em>https://le-repere.ameliadev.fr</em>) est édité par l'association "Le Repère".<br>
                <strong>Directeur de la publication :</strong> Steven Lemée<br>
                <strong>Contact :</strong> sep7em.24@gmail.com</p>

            <span class="titre-badge">2. Hébergement</span>
            <p>Le site est hébergé par la plateforme Cloud <strong>Railway</strong>.<br>
                Infrastructure sécurisée, serveurs localisés en Europe / États-Unis selon les grappes de déploiement.<br>
                Site web de l'hébergeur : <a href="https://railway.app" target="_blank" style="font-weight:bold;">railway.app</a></p>

            <span class="titre-badge">3. Propriété intellectuelle</span>
            <p>L'ensemble des contenus présents sur ce site (textes, logos, designs, icônes) sont la propriété exclusive de l'association, à l'exception des images et informations importées par les membres dans la section répertoire et annonces, qui restent sous leur responsabilité.</p>

            <span class="titre-badge">4. Cookies techniques</span>
            <p>Ce site utilise uniquement des cookies strictement nécessaires à son bon fonctionnement (sessions de connexion chiffrées). Aucun cookie de tracking publicitaire ou de ciblage tiers n'est déposé.</p>

            <a href="{{ route('home') }}" class="bouton" style="margin-top:20px;">Retour à l'accueil</a>
        </div>
    </div>
@endsection
