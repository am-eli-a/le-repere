<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Le Repère</title>
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    @stack('styles')
    <link rel="icon" href="{{ asset('/images/logo_tmp.png') }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
</head>

<body>

<header class="head">
    <div class="logo">
        <a href="{{ route('home') }}"><img src="{{ asset('images/logo_lerepere.png') }}" alt="Logo" class="logo"></a>
    </div>

    <input type="checkbox" id="menu-toggle" class="menu-toggle">
    <label for="menu-toggle" class="burger">
        <span></span>
        <span></span>
        <span></span>
    </label>

    <div class="nav-liens">
        <nav>
            <ul>
                <li><a href="{{ route('partenaires') }}" @stack('active_partenaires')>Partenaires</a></li>
                <li><a href="{{ route('annonce') }}" @stack('active_annonce')>Annonces</a></li>
                <li><a href="{{ route('contact') }}" @stack('active_contact')>Nous contacter</a></li>
                <li><a href="{{ route('information') }}" @stack('active_informations')>Informations</a></li>
                <li><a href="{{ route('avis') }}" @stack('active_avis')>Avis</a></li>
                <li><a href="{{ route('boite_a_idees') }}" @stack('active_boite-a-idees')>Boite à idées</a></li>
                <li>
                    <a href="{{ auth()->check() ? route('dashboard') : route('register') }}">
                        <img src="{{ asset('images/login.png') }}" alt="login" class="login">
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>

<main>
    <div class="erreurs">
        @if(session('success'))
            <div class="brutal-alert success">
                <span class="icon">✅</span> {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="brutal-alert error">
                <span class="icon">⚠️</span>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    @yield('content')
</main>

<footer class="foot">
    <div class="footer-all">
        <div class="footer-container">
            <div class="footer-about_contact">
                <div class="footer-about">
                    <h4>Le Repère</h4>
                    <p>Bienvenu dans "Le Repère" !<br>
                        Un répertoire mis en place par l'association Septem 24 et accessible au public.
                    </p>
                </div>
                <div class="footer-contact">
                    <h4>Contact</h4>
                    <p style="margin: 0;">Email : <a href="mailto:sep7em.24@gmail.com" title="Email" style="text-decoration: underline; font-weight: bold;">sep7em.24@gmail.com</a></p>
                </div>
            </div>
            <div class="footer-nav">
                <h4>Liens rapides</h4>
                <nav>
                    <ul>
                        <li><a href="{{ route('partenaires') }}">Partenaires</a></li>
                        <li><a href="{{ route('annonce') }}">Annonces</a></li>
                        <li><a href="{{ route('contact') }}">Nous contacter</a></li>
                        <li><a href="{{ route('information') }}">Informations</a></li>
                        <li><a href="{{ route('avis') }}">Avis</a></li>
                        <li><a href="{{ route('boite_a_idees') }}">Boite à idées</a></li>
                        <li><a href="{{ route('rgpd') }}" style="font-weight: 600;">Politique de Confidentialité (RGPD)</a></li>
                        <li><a href="{{ route('legal') }}" style="font-weight: 600;">Mentions Légales</a></li>
                        <li><a href="{{ route('dashboard') }}">Me connecter</a></li>
                    </ul>
                </nav>
            </div>
            <div class="footer-social">
                <h4>Suivez-nous !</h4>
                <div class="social-icons">
                    <div class="bloc-reseaux">
                        <img src="{{ asset('/images/insta.png') }}" alt="Instagram">
                        <a href="https://www.instagram.com/septem.24?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" style="list-style: none; color:#1a1a1a"><p>Instagram</p></a>
                    </div>
                    <div class="bloc-reseaux">
                        <img src="{{ asset('/images/tiktok.png') }}" alt="Tiktok">
                        <a href="https://www.tiktok.com/@sep7em.24?is_from_webapp=1&sender_device=pc" style="list-style: none; color:#1a1a1a"><p>Tiktok</p></a>
                    </div>
                </div>
            </div>
        </div>
        <p style="text-align: center; width: 100%; margin: 20px 0 0 0; padding-top: 20px; border-top: 1px solid rgba(26,26,26,0.1); font-weight: 500;">&copy; {{ date('Y') }} Le Repère. Tous droits réservés.</p>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
@stack('scripts')
</body>
</html>
