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
                <a href="https://www.youtube.com/watch?v=j8jlWGUFPKI" class="video-link">Phil Production - Nature morte (Nikon festival)</a>
                <a href="https://www.youtube.com/watch?v=T2v75mqmPvY" class="video-link">Sequence 59 - V4B EUROPA</a>
                <a href="https://www.youtube.com/watch?v=m7xn12y1LbA" class="video-link">Sequence 59 - Tue (Making off)</a>
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

            <div style="display: flex; flex-wrap: wrap; gap: 30px; align-items: stretch; justify-content: space-between; margin-bottom: 40px;">
                <div class="contact-box" style="flex: 1; min-width: 280px; display: flex; flex-direction: column; justify-content: space-between; border: 3px solid #000; padding: 25px; background: #fff; box-shadow: 5px 5px 0px #000;">
                    <div style="display: flex; flex-direction: column; align-items: center; gap: 15px;">
                        <div class="image" style="display: flex; align-items: center; justify-content: center;">
                            <img src="{{ asset('images/partenaires/phil_production.png') }}" alt="Phil Production" style="max-height: 100%; max-width: 100%; object-fit: contain;">
                        </div>
                        <div class="partenaires-textes" style="min-height: 100px; display: flex; align-items: center;">
                            <p>Phil Production est une association d'audiovisuel agréée <strong>Université de Lille</strong> qui aime proposer des projets vidéos menés par des passionnés amateurs.</p>
                        </div>
                    </div>
                    <div class="social-links" style="display: flex; gap: 15px; justify-content: center; margin-top: 25px;">
                        <a href="https://www.instagram.com/phil_production?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" title="Instagram">
                            <img src="{{ asset('images/insta.png') }}" alt="Instagram" style="width: 40px; height: 40px; transition: transform 0.2s;">
                        </a>
                        <a href="https://www.tiktok.com/@philproduction" target="_blank" title="TikTok">
                            <img src="{{ asset('images/tiktok.png') }}" alt="TikTok" style="width: 40px; height: 40px; transition: transform 0.2s;">
                        </a>
                        <a href="mailto:phil.productionvideo@gmail.com" title="Email">
                            <img src="{{ asset('images/mails.png') }}" alt="Email" style="width: 40px; height: 40px; transition: transform 0.2s;">
                        </a>
                    </div>
                </div>

                <div class="contact-box" style="flex: 1; min-width: 280px; display: flex; flex-direction: column; justify-content: space-between; border: 3px solid #000; padding: 25px; background: #fff; box-shadow: 5px 5px 0px #000;">
                    <div style="display: flex; flex-direction: column; align-items: center; gap: 15px;">
                        <div class="image" style="display: flex; align-items: center; justify-content: center;">
                            <img src="{{ asset('images/partenaires/sequence59_noir.png') }}" alt="Séquence 59" style="max-height: 100%; max-width: 100%; object-fit: contain;">
                        </div>
                        <div class="partenaires-textes" style="min-height: 100px; display: flex; align-items: center;">
                            <p>Association de distribution de films amateurs et indépendants lillois.</p>
                        </div>
                    </div>
                    <div class="social-links" style="display: flex; gap: 15px; justify-content: center; margin-top: 25px;">
                        <a href="https://www.instagram.com/sequence_59?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" title="Instagram">
                            <img src="{{ asset('images/insta.png') }}" alt="Instagram" style="width: 40px; height: 40px; transition: transform 0.2s;">
                        </a>
                        <a href="https://www.tiktok.com/@squence.59" target="_blank" title="TikTok">
                            <img src="{{ asset('images/tiktok.png') }}" alt="TikTok" style="width: 40px; height: 40px; transition: transform 0.2s;">
                        </a>
                        <a href="mailto:sequence.59lille@gmail.com" title="Email">
                            <img src="{{ asset('images/mails.png') }}" alt="Email" style="width: 40px; height: 40px; transition: transform 0.2s;">
                        </a>
                    </div>
                </div>

                <div class="contact-box" style="flex: 1; min-width: 280px; display: flex; flex-direction: column; justify-content: space-between; border: 3px solid #000; padding: 25px; background: #fff; box-shadow: 5px 5px 0px #000;">
                    <div style="display: flex; flex-direction: column; align-items: center; gap: 15px;">
                        <div class="image" style="display: flex; align-items: center; justify-content: center;">
                            <img src="{{ asset('images/partenaires/studiodu7.png') }}" alt="Studio du 7" style="max-height: 100%; max-width: 100%; object-fit: contain;">
                        </div>
                        <div class="partenaires-textes" style="min-height: 100px; display: flex; align-items: center;">
                            <p>Studio de production</p>
                        </div>
                    </div>
                    <div class="social-links" style="display: flex; gap: 15px; justify-content: center; margin-top: 25px;">
                        <a href="https://www.instagram.com/studiodu7lille?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" title="Instagram">
                            <img src="{{ asset('images/insta.png') }}" alt="Instagram" style="width: 40px; height: 40px; transition: transform 0.2s;">
                        </a>
                        <a href="mailto:studiodu7@gmail.com" title="Email">
                            <img src="{{ asset('images/mails.png') }}" alt="Email" style="width: 40px; height: 40px; transition: transform 0.2s;">
                        </a>
                    </div>
                </div>

            </div>
            <br>
            <br>

            <a href="{{ route('contact') }}" class="bouton" style="text-align: center">Faire partie des partenaires</a>
        </div>
    </div>
@endsection
