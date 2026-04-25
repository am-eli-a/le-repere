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
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, ducimus earum ex explicabo laborum
                    natus officiis quisquam quod repellat, saepe tempore voluptas voluptatem voluptates! Accusamus
                    adipisci amet aspernatur culpa cum dignissimos dolore eum eveniet explicabo facere ipsa itaque iure
                    labore laborum laudantium mollitia nam necessitatibus nihil nisi nulla, officiis optio, pariatur
                    porro possimus provident quaerat quibusdam quisquam rem reprehenderit similique temporibus velit
                    veniam voluptatem. A, ab accusantium aliquam deserunt doloribus ea error fuga id iste molestiae
                    necessitatibus nihil odit, perferendis porro quos, soluta unde vero voluptas. Ab accusamus dicta
                    doloremque et fugit ipsum numquam omnis rem? Blanditiis excepturi magnam minima minus odit tempore
                    velit voluptate. Earum inventore modi neque, nobis provident quibusdam tenetur. Alias at blanditiis
                    culpa cum doloremque dolorum ducimus, earum eius est impedit ipsa iste maiores, minus modi nam
                    obcaecati omnis optio quasi quidem ratione sed tenetur voluptatibus. Cumque doloremque illum minima
                    minus nam odit quaerat quasi quis ratione repudiandae, rerum saepe sed sit. Adipisci amet assumenda,
                    at beatae consectetur deserunt dolor error eum inventore laboriosam molestiae necessitatibus non
                    numquam placeat quasi ratione reiciendis repellat rerum, sint sit temporibus totam ut voluptatibus.
                    Deserunt, omnis, voluptates? A alias amet aperiam assumenda, autem deserunt eos in magni maxime
                    neque nostrum obcaecati odio possimus quisquam sapiente. Cupiditate fugiat ipsam nostrum nulla
                    praesentium quam! Accusamus accusantium adipisci aliquam amet aspernatur aut autem culpa cupiditate
                    debitis ducimus ea eius explicabo fuga impedit incidunt laboriosam maiores minus molestias mollitia
                    neque nostrum odio quasi quis quo ratione sequi sit vel velit, voluptates voluptatum? Aliquam at
                    delectus distinctio dolores eligendi eum ex fugiat fugit hic impedit iste laudantium minima nesciunt
                    numquam, optio provident quae qui quibusdam quod sequi temporibus veniam vitae voluptates. Ad
                    aliquam asperiores, beatae cum debitis dignissimos eius error esse et, expedita illo inventore
                    libero magni molestias officiis omnis placeat quo rerum sequi, temporibus.</p>
            </div>
        </div>
    </div>
@endsection
