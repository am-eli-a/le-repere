@extends('layouts.main')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/annonce.css') }}">
@endpush
@push('active_annonce')class="active"@endpush

@section('content')
    <div class="annonce-content">
        <h2>Les annonces</h2>
        <p>Ici, tu retrouveras toutes les annonces de tournages ou de projets en tout genre. Lorsque quelqu'un cherchera à constituer une équipe ou trouver un rôle en particulier, une annonce sera postée ici et vous serez libre de le contacter.</p>
        <p>N'importe qui peut poster une annonce ici, mais la page est surveillée par la modération pour éviter toute sorte d'abus ou d'actes malveillants.</p>

        @auth
            <a href="{{ route('dashboard') }}" class="bouton">Poster une annonce</a>
        @else
            <p>Vous devez être connecté pour poster une annonce.</p>
            <a href="{{ route('login') }}" class="bouton">Se connecter</a>
        @endauth

        <div class="type-box">
            <button class="active" data-type="tous">Tous</button>
            @foreach($types as $key => $label)
                <button data-type="{{ $key }}">{{ $label }}</button>
            @endforeach
            <input type="text" placeholder="Recherche..." id="recherche" name="recherche">
        </div>

        <div class="annonce-bloc">
            @foreach($toutesLesAnnonce as $annonce)
                <div class="annonce-box" data-type="{{ $annonce->type }}" data-search="{{ strtolower($annonce->titre . ' ' . $annonce->description . ' ' . $annonce->lieu) }}">
                    <div class="annonce-box-inner">
                        @if($annonce->affiche)
                            <div class="annonce-affiche-container">
                                <img src="{{ Str::contains($annonce->affiche, 'uploads') ? asset($annonce->affiche) : asset('storage/' . $annonce->affiche) }}" alt="Affiche de {{ $annonce->titre }}" loading="lazy">
                            </div>
                        @endif
                        <span class="annonce-type-badge">{{ $annonce->type_libelle }}</span>
                        <h3>{{ $annonce->titre }}</h3>
                        <p class="annonce-description">{{ $annonce->description }}</p>
                        <p>
                            @if($annonce->lieu) {{ $annonce->lieu }} @endif
                            @if($annonce->date) · {{ \Carbon\Carbon::parse($annonce->date)->format('d/m/Y') }} @endif
                        </p>
                        <div class="annonce-infos">
                            <p><strong>Publié par :</strong> {{ $annonce->user->prenom }} {{ $annonce->user->nom }}</p>
                            <p><strong>Contact :</strong></p>
                            <ul>
                                <li>Mail : <a href="mailto:{{ $annonce->user->email }}">{{ $annonce->user->email }}</a></li>
                                <li>Insta : {{ $annonce->user->insta ? '@'.ltrim($annonce->user->insta, '@') : 'Non renseigné' }}</li>
                            </ul>
                            <p class="date-publication">
                                Posté le : {{ $annonce->created_at->format('d/m/Y') }}
                                <span>({{ $annonce->created_at->diffForHumans() }})</span>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.querySelectorAll('.type-box button').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.type-box button').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                const filtre = this.getAttribute('data-type');
                document.querySelectorAll('.annonce-box').forEach(bloc => {
                    if (filtre === 'tous') {
                        bloc.style.display = 'grid';
                    } else {
                        bloc.style.display = bloc.getAttribute('data-type') === filtre ? 'grid' : 'none';
                    }
                });
            });
        });

        document.getElementById('recherche').addEventListener('input', function() {
            const query = this.value.toLowerCase().trim();
            document.querySelectorAll('.annonce-box').forEach(bloc => {
                const data = bloc.getAttribute('data-search');
                bloc.style.display = data.includes(query) ? 'grid' : 'none';
            });
        });
    </script>
@endpush
