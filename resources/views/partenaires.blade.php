@extends('layouts.main') @push('styles')
    <link rel="stylesheet" href="{{ asset('css/partenaires.css') }}"> @endpush
@push('active_partenaires')class="active"@endpush

@section('content')
    <div class="logo-slider-container">
        <div class="logo-slider-track">
            <div class="logo-slide">
                <img src="{{ asset('images/partenaires/phil_production.png') }}" alt="Phil Production">
                <p>Phil Production</p>
            </div>
            <div class="logo-slide">
                <img src="{{ asset('images/partenaires/sequence59.png') }}" alt="Séquence 59">
                <p>Séquence 59</p>
            </div>
            <div class="logo-slide">
                <img src="{{ asset('images/partenaires/studiodu7.png') }}" alt="Studio du 7">
                <p>Studio du 7</p>
            </div>
            <div class="logo-slide">
                <img src="{{ asset('images/partenaires/phil_production.png') }}" alt="Phil Production">
                <p>Phil Production</p>
            </div>
            <div class="logo-slide">
                <img src="{{ asset('images/partenaires/sequence59.png') }}" alt="Séquence 59">
                <p>Séquence 59</p>
            </div>
            <div class="logo-slide">
                <img src="{{ asset('images/partenaires/studiodu7.png') }}" alt="Studio du 7">
                <p>Studio du 7</p>
            </div>
            <div class="logo-slide">
                <img src="{{ asset('images/partenaires/phil_production.png') }}" alt="Phil Production">
                <p>Phil Production</p>
            </div>
            <div class="logo-slide">
                <img src="{{ asset('images/partenaires/sequence59.png') }}" alt="Séquence 59">
                <p>Séquence 59</p>
            </div>
            <div class="logo-slide">
                <img src="{{ asset('images/partenaires/studiodu7.png') }}" alt="Studio du 7">
                <p>Studio du 7</p>
            </div>
        </div>
    </div>
    <div class="partenaires-container">
        <aside class="fil-d_actu">
            <h3>Leurs dernières réalisations</h3>
            <nav>
                <a href="#" class="video-link">vidéo1</a>
                <a href="#" class="video-link">vidéo2</a>
                <a href="#" class="video-link">vidéo3</a>
                <a href="#" class="video-link">vidéo4</a>
                <a href="#" class="video-link">vidéo5</a>
            </nav>
        </aside>
        <div class="partenaires-content">
            <div class="partenaires-textes">
                <h2>Nos partenaires</h2>
                <p>
                    Le Repère collabore avec un réseau d'associations et de structures dynamiques pour booster la visibilité des talents locaux.
                    Nos partenaires nous accompagnent sur chaque projet pour garantir des conditions de tournage professionnelles et innovantes.
                    Ensemble, nous brisons les barrières du secteur audiovisuel pour créer de véritables opportunités de carrière.
                    Découvrez leurs univers et rejoignez un écosystème solidaire dédié à la création.
                </p>
            </div>

            <div class="contact-partenaires" style="margin: 25px 0; display: flex; gap: 20px; align-items: center;">
                <div class="contact-box">
                    <img src="{{ asset('images/partenaires/phil_production.png') }}" alt="Phil Production">
                    <div class="partenaires-textes">
                        <p>Phil Production est une association d'audiovisuel agréée <strong>Université de Lille</strong> qui aime proposer des projets vidéos menés par des passionnés amateurs. Sans budget, sans diplôme et sans prétention, ils proposent films et mini-séries les plus aboutis possibles dans un seul but : faire de leurs rêves une réalité.</p>
                        <div class="social-links" style="display: flex; gap: 15px;">
                            <a href="https://www.instagram.com/phil_production?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" title="Instagram">
                                <img src="{{ asset('images/insta.png') }}" alt="Instagram" style="width: 30px; height: 30px; transition: transform 0.2s;">
                            </a>
                            <a href="https://www.tiktok.com/@philproduction" target="_blank" title="TikTok">
                                <img src="{{ asset('images/tiktok.png') }}" alt="TikTok" style="width: 30px; height: 30px; transition: transform 0.2s;">
                            </a>
                            <a href="mailto:phil.productionvideo@gmail.com" title="Email">
                                <img src="{{ asset('images/mails.png') }}" alt="Email" style="width: 30px; height: 30px; transition: transform 0.2s;">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="contact-box">
                    <img src="{{ asset('images/partenaires/sequence59_noir.png') }}" alt="Séquence 59">
                    <div class="partenaires-textes">
                        <p>Association de distribution de films amateurs et indépendants lillois.</p>
                        <div class="social-links" style="display: flex; gap: 15px;">
                            <a href="https://www.instagram.com/sequence_59?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" title="Instagram">
                                <img src="{{ asset('images/insta.png') }}" alt="Instagram" style="width: 30px; height: 30px; transition: transform 0.2s;">
                            </a>
                            <a href="https://www.tiktok.com/@squence.59" target="_blank" title="TikTok">
                                <img src="{{ asset('images/tiktok.png') }}" alt="TikTok" style="width: 30px; height: 30px; transition: transform 0.2s;">
                            </a>
                            <a href="mailto:sequence.59lille@gmail.com" title="Email">
                                <img src="{{ asset('images/mails.png') }}" alt="Email" style="width: 30px; height: 30px; transition: transform 0.2s;">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="contact-box">
                    <img src="{{ asset('images/partenaires/studiodu7.png') }}" alt="Studio du 7">
                    <div class="partenaires-textes">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam, suscipit.</p>
                        <div class="social-links" style="display: flex; gap: 15px;">
                            <a href="https://www.instagram.com/studiodu7lille?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" title="Instagram">
                                <img src="{{ asset('images/insta.png') }}" alt="Instagram" style="width: 30px; height: 30px; transition: transform 0.2s;">
                            </a>
                            <a href="https://tiktok.com" target="_blank" title="TikTok">
                                <img src="{{ asset('images/tiktok.png') }}" alt="TikTok" style="width: 30px; height: 30px; transition: transform 0.2s;">
                            </a>
                            <a href="mailto:contact@exemple.com" title="Email">
                                <img src="{{ asset('images/mails.png') }}" alt="Email" style="width: 30px; height: 30px; transition: transform 0.2s;">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <a href="{{ route('contact') }}" class="bouton" style="text-align: center">Faire partie des partenaires</a>
        </div>
    </div>
@endsection
