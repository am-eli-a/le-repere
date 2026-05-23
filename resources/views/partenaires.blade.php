@extends('layouts.main')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/partenaires.css') }}">
@endpush

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

            {{-- Grille des partenaires avec alignement stretch et marge inférieure augmentée --}}
            <div style="display: flex; gap: 30px; align-items: stretch; justify-content: space-between; flex-wrap: wrap; margin-bottom: 50px;">

                {{-- Boîte 1 : Phil Production --}}
                <div class="contact-box" style="flex: 1; min-width: 280px; display: flex; flex-direction: column; justify-content: space-between; border: 3px solid #000; padding: 25px; background: #fff; box-shadow: 5px 5px 0px #000;">
                    <div style="display: flex; flex-direction: column; align-items: center; gap: 15px;">
                        <img src="{{ asset('images/partenaires/phil_production.png') }}" alt="Phil Production">
                        <p style="margin: 0; text-align: justify;">Phil Production est une association d'audiovisuel agréée <strong>Université de Lille</strong> qui aime proposer des projets vidéos menés par des passionnés amateurs.</p>
                    </div>
                    <div class="social-links" style="display: flex; gap: 15px; justify-content: center; margin-top: 25px;">
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

                {{-- Boîte 2 : Séquence 59 --}}
                <div class="contact-box" style="flex: 1; min-width: 280px; display: flex; flex-direction: column; justify-content: space-between; border: 3px solid #000; padding: 25px; background: #fff; box-shadow: 5px 5px 0px #000;">
                    <div style="display: flex; flex-direction: column; align-items: center; gap: 15px;">
                        <img src="{{ asset('images/partenaires/sequence59_noir.png') }}" alt="Séquence 59">
                        <p style="margin: 0; text-align: justify;">Association de distribution de films amateurs et indépendants lillois.</p>
                    </div>
                    <div class="social-links" style="display: flex; gap: 15px; justify-content: center; margin-top: 25px;">
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

                {{-- Boîte 3 : Studio du 7 --}}
                <div class="contact-box" style="flex: 1; min-width: 280px; display: flex; flex-direction: column; justify-content: space-between; border: 3px solid #000; padding: 25px; background: #fff; box-shadow: 5px 5px 0px #000;">
                    <div style="display: flex; flex-direction: column; align-items: center; gap: 15px;">
                        <img src="{{ asset('images/partenaires/studiodu7.png') }}" alt="Studio du 7">
                        <p style="margin: 0; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam, suscipit.</p>
                    </div>
                    <div class="social-links" style="display: flex; gap: 15px; justify-content: center; margin-top: 25px;">
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

            {{-- Bouton d'action principal bien espacé --}}
            <div style="display: flex; justify-content: center; width: 100%;">
                <a href="{{ route('contact') }}" class="bouton" style="text-align: center; display: block; width: 100%;">Faire partie des partenaires</a>
            </div>
        </div>
    </div>
@endsection
