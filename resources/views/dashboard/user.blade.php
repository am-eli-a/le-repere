@extends('layouts.main')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

@section('content')
    <div class="admin-wrapper">
        <aside class="admin-sidebar">
            <div class="user-info-brief">
                <strong>{{ auth()->user()->prenom }} {{ auth()->user()->nom }}</strong>
            </div>
            <nav>
                <a href="#" class="nav-link active" onclick="showSection('accueil')">ACCUEIL</a>
                <a href="#" class="nav-link" onclick="showSection('voir-mon-profil')">VOIR MON PROFIL</a>
                <a href="#" class="nav-link" onclick="showSection('modif-mon-profil')">MODIFIER MON PROFIL</a>
                <a href="#" class="nav-link" onclick="showSection('repertoire-section')">M'INSCRIRE DANS LE REPERTOIRE</a>
                <a href="#" class="nav-link" onclick="showSection('voir-mes-posts')">VOIR MES POSTS</a>
                <a href="#" class="nav-link" onclick="showSection('publier-une-annonce')">PUBLIER UNE ANNONCE</a>
                <a href="#" class="nav-link" onclick="showSection('suggestions-avis')">PROPOSER UN RETOUR</a>
                <a href="#" class="nav-link" onclick="showSection('delete-section')">SUPPRIMER MON COMPTE</a>
                @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bouton-logout">
                            Se déconnecter
                        </button>
                    </form>
                @endauth
            </nav>
        </aside>

        <main class="admin-content">

            {{-- SECTION ACCUEIL --}}
            <section id="accueil" class="admin-section" style="display: block;">
                <div class="admin-card">
                    <h1>Coucou {{ auth()->user()->prenom }} :)</h1>
                    <p>Bienvenue dans votre espace personnel "Le Repère".</p>

                    <div class="stats-grid">
                        <div class="stat-card">
                            <h3>{{ $mes_annonces->count() }}</h3>
                            @if( $mes_annonces->count() == 1)
                                <p>Annonce</p>
                            @else
                                <p>Annonces</p>
                            @endif
                        </div>
                        <div class="stat-card">
                            <h3>{{ $mes_avis->count() }}</h3>
                            <p>Avis</p>
                        </div>
                        <div class="stat-card">
                            <h3>{{ $mes_suggestions->count() }}</h3>
                            @if( $mes_suggestions->count() == 1)
                                <p>Suggestion</p>
                            @else
                                <p>Suggestions</p>
                            @endif
                        </div>
                    </div>

                    <div style="margin-top: 40px; padding: 20px; border: 2px dashed #1a1a1a;">
                        <h4>Dernière mise à jour</h4>
                        <p>Votre profil a été mis à jour le {{ auth()->user()->updated_at->format('d/m/Y') }}</p>
                    </div>
                </div>
            </section>

            {{-- SECTION VOIR PROFIL --}}
            <section id="voir-mon-profil" class="admin-section" style="display: none;">
                <div class="admin-card">
                    <h2>Mes informations actuelles</h2>
                    <div class="info-affichage">
                        <div class="info-box" style="grid-column: 1 / -1; display: flex; align-items: center; gap: 20px;">
                            <img src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : asset('images/login.png') }}" class="pp-preview">
                            <div>
                                <label>Photo de profil</label>
                                <p>{{ auth()->user()->image ? 'Personnalisée' : 'Image par défaut' }}</p>
                            </div>
                        </div>
                        <div class="info-box"><label>Nom complet</label><p>{{ auth()->user()->prenom }} {{ auth()->user()->nom }}</p></div>
                        <div class="info-box"><label>Mail</label><p>{{ auth()->user()->email }}</p></div>
                        <div class="info-box"><label>Age</label><p>{{ auth()->user()->age ?? 'Non renseigné' }}</p></div>
                        <div class="info-box"><label>Lieu / Ville</label><p>{{ auth()->user()->lieu ?? 'Non renseigné' }}</p></div>
                        <div class="info-box">
                            <label>Bande-démo</label>
                            <p>@if(auth()->user()->lien_demo)<a href="{{ auth()->user()->lien_demo }}" target="_blank">Voir la vidéo ↗</a>@else Non renseignée @endif</p>
                        </div>
                        <div class="info-box"><label>Instagram</label><p>{{ auth()->user()->insta ? '@'.ltrim(auth()->user()->insta, '@') : 'Non renseigné' }}</p></div>
                    </div>
                </div>
            </section>

            {{-- SECTION MODIFIER PROFIL --}}
            <section id="modif-mon-profil" class="admin-section" style="display: none;">
                <div class="admin-card">
                    <h2>Mettre à jour mon compte</h2>
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PATCH')
                        <div class="form-group pp-upload">
                            <label>Photo de profil</label>
                            <div style="display: flex; align-items: center; gap: 20px;">
                                <img src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : asset('images/default-pp.png') }}" class="pp-preview">
                                <input type="file" name="image" accept="image/*">
                            </div>
                        </div>
                        <div class="info-affichage">
                            <div class="form-group"><label>Prénom</label><input type="text" name="prenom" value="{{ auth()->user()->prenom }}"></div>
                            <div class="form-group"><label>Nom</label><input type="text" name="nom" value="{{ auth()->user()->nom }}"></div>
                        </div>
                        <div class="form-group"><label>Adresse Mail</label><input type="email" name="email" value="{{ auth()->user()->email }}"></div>
                        <div class="info-affichage">
                            <div class="form-group"><label>Nouveau mot de passe</label><input type="password" name="password"></div>
                            <div class="form-group"><label>Confirmation</label><input type="password" name="password_confirmation"></div>
                        </div>
                        <div class="form-group"><label>Âge</label><input type="number" name="age" min="15" value="{{ auth()->user()->age }}"></div>
                        <div class="form-group"><label>Lieu</label><input type="text" name="lieu" value="{{ auth()->user()->lieu }}"></div>
                        <div class="form-group"><label>Instagram (@...)</label><input type="text" name="insta" value="{{ auth()->user()->insta }}"></div>
                        <div class="form-group"><label>Lien Bande-démo</label><input type="url" name="lien_demo" value="{{ auth()->user()->lien_demo }}"></div>
                        <button type="submit" class="bouton">Sauvegarder</button>
                    </form>
                </div>
            </section>

            <section id="repertoire-section" class="admin-section" style="display: none;">
                <div class="repertoire-card">
                    <div class="card-header">
                        <h2 class="brutal-title">REJOINDRE LE RÉPERTOIRE</h2>
                        <p>Choisissez votre spécialité pour être visible par la communauté.</p>
                    </div>

                    <form action="{{ route('repertoire.join') }}" method="POST" class="brutal-form">
                        @csrf
                        <div class="form-group">
                            <label for="category_id">MA CATÉGORIE</label>
                            <div class="select-wrapper">
                                <select name="category_id" id="category_id" required>
                                    <option value="" disabled selected>Sélectionner un métier...</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <p class="help-text">
                            Votre métier n'est pas dans la liste ?
                            <br>
                            <br>
                            <br>
                            <a href="{{ route('category.request') }}" class="prevenir">Prévenir les administrateurs</a>
                        </p>
                        <button type="submit" class="btn-brutal-join">
                            APPARAÎTRE DANS LE RÉPERTOIRE
                        </button>
                    </form>
                </div>
            </section>

            {{-- SECTION VOIR POSTS --}}
            <section id="voir-mes-posts" class="admin-section" style="display: none;">
                <div class="admin-card">
                    <h2>Mes Annonces :</h2>
                    @forelse($mes_annonces as $annonce)
                        <div class="item-list" style="display: flex; justify-content: space-between; padding: 15px; border: 2px solid #1a1a1a; margin-bottom: 10px;">
                            <span><strong>{{ $annonce->titre }}</strong></span>
                            <span style="color: #666;">- Envoyé le {{ $annonce->created_at->format('d/m/Y') }}</span>
                            <span style="color: #666;">- En attente de modération</span>
                            <form action="{{ route('annonces.destroy', $annonce->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="link-danger" style="background:none; border:none; color:#ff4d4d; font-weight:bold; cursor:pointer;">Supprimer</button>
                            </form>
                        </div>
                    @empty
                        <p>Aucune annonce postée.</p>
                        <button onclick="showSection('publier-une-annonce')" class="bouton">Publier une annonce</button>
                    @endforelse
                </div>

                <div class="admin-card">
                    <h2>Mes Avis :</h2>
                    @forelse($mes_avis as $avis)
                        <div class="item-list" style="display: flex; justify-content: space-between; padding: 15px; border: 2px solid #1a1a1a; margin-bottom: 10px;">
                            <span><strong>Note: {{ $avis->note }}/5</strong> - {{ Str::limit($avis->description, 50) }}</span>
                            <span style="color: #666;">- En attente de modération</span>
                        </div>
                    @empty
                        <p>Aucun avis posté.</p>
                        <button onclick="showSection('suggestions-avis')" class="bouton">Laisser un avis</button>
                    @endforelse
                </div>

                <div class="admin-card">
                    <h2>Mes Suggestions :</h2>
                    @forelse($mes_suggestions as $suggestion)
                        <div class="item-list" style="display: flex; justify-content: space-between; padding: 15px; border: 2px solid #1a1a1a; margin-bottom: 10px;">
                            <span><strong>{{ $suggestion->titre }}</strong> : {{ Str::limit($suggestion->description, 50) }}</span>
                            <span style="color: #666;">- Envoyé le {{ $suggestion->created_at->format('d/m/Y') }}</span>
                            <span style="color: #666;">- En attente de modération</span>
                        </div>
                    @empty
                        <p>Aucune suggestion postée.</p>
                        <button onclick="showSection('suggestions-avis')" class="bouton">Proposer une idée</button>
                    @endforelse
                </div>
            </section>

            {{-- SECTION PUBLIER ANNONCE --}}
            <section id="publier-une-annonce" class="admin-section" style="display: none;">
                <div class="admin-card">
                    <h2>Publier une annonce</h2>
                    <form action="{{ route('annonces.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group affiche-upload">
                            <label>Affiche de l'annonce (Portrait ou Paysage)</label>
                            <div style="display: flex; flex-direction: column; gap: 10px;">
                                <input type="file" name="affiche" accept="image/*" id="afficheInput">
                                <p style="font-size: 0.8rem; font-style: italic;">Format recommandé : JPG ou PNG</p>
                            </div>
                        </div>

                        <div class="form-group"><label>Titre</label><input type="text" name="titre" required></div>
                        <div class="form-group"><label>Description</label><textarea name="description" rows="5" required></textarea></div>
                        <div class="form-group"><label>Lieu</label><input type="text" name="lieu"></div>
                        <div class="form-group"><label>Date</label><input type="date" name="date"></div>

                        <button type="submit" class="bouton">Mettre en ligne</button>
                    </form>
                </div>
            </section>

            {{-- SECTION FORMULAIRE SUGGESTION/AVIS --}}
            <section id="suggestions-avis" class="admin-section" style="display: none;">
                <div class="admin-card">
                    <h2>Une idée pour Le Repère ?</h2>
                    <form action="{{ route('suggestions.store') }}" method="POST">
                        @csrf
                        <div class="form-group"><textarea name="titre" placeholder="Titre de l'idée..." rows="2" required></textarea></div>
                        <div class="form-group"><textarea name="description" placeholder="Votre suggestion..." rows="5" required></textarea></div>
                        <button type="submit" class="bouton">Envoyer l'idée</button>
                    </form>
                </div>
                <div class="admin-card">
                    <h2>Laisser un avis sur la plateforme</h2>
                    <form action="{{ route('avis.store') }}" method="POST">
                        @csrf
                        <div class="form-group"><label>Note /5</label><input type="number" name="note" min="1" max="5" value="5"></div>
                        <div class="form-group"><textarea name="titre" placeholder="Titre du témoignage..." rows="2" required></textarea></div>
                        <div class="form-group"><textarea name="description" placeholder="Votre témoignage..." rows="5" required></textarea></div>
                        <button type="submit" class="bouton">Poster mon avis</button>
                    </form>
                </div>
            </section>

            <section id="delete-section" class="admin-section" style="display: none;">
                <h2 class="text-lg font-medium text-gray-900">Supprimer le compte</h2>
                <p class="mt-1 text-sm text-gray-600">
                    Une fois votre compte supprimé, toutes ses ressources et données (annonces, avis, profil répertoire) seront définitivement effacées.
                </p>

                <form action="{{ route('profile.destroy') }}" method="POST" onsubmit="return confirm('Es-tu vraiment sûr ? Cette action est irréversible.')">
                    @csrf
                    @method('delete')

                    <div class="mt-6">
                        <label for="password">Ton mot de passe pour confirmer :</label>
                        <input type="password" name="password" id="password" required>
                    </div>

                    <button type="submit" class="bouton-danger">
                        SUPPRIMER MON COMPTE DÉFINITIVEMENT
                    </button>
                </form>
            </section>

        </main>
    </div>

    <script>
        function showSection(id) {
            document.querySelectorAll('.admin-section').forEach(s => s.style.display = 'none');
            document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
            const target = document.getElementById(id);
            if (target) target.style.display = 'block';

            const activeLink = document.querySelector(`.nav-link[onclick*="${id}"]`);
            if (activeLink) activeLink.classList.add('active');
        }

        document.addEventListener('DOMContentLoaded', () => {
            const flash = document.getElementById('flash-message');
            if (flash) {
                setTimeout(() => {
                    flash.style.opacity = '0';
                    flash.style.transition = 'opacity 0.5s ease';
                    setTimeout(() => flash.remove(), 500);
                }, 4000);
            }
        });
    </script>
@endsection
