@extends('layouts.main')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

@section('content')
    <div class="admin-wrapper">
        <aside class="admin-sidebar">
            <div class="user-info-brief">
                <strong>{{ auth()->user()->prenom }} {{ auth()->user()->nom }}</strong>
                <span class="badge-role">{{ auth()->user()->role }}</span>
            </div>
            <nav>
                <a href="#" class="nav-link active" onclick="showSection('accueil')">🏠 Accueil</a>
                <a href="#" class="nav-link" onclick="showSection('voir-mon-profil')">VOIR MON PROFIL</a>
                <a href="#" class="nav-link" onclick="showSection('modif-mon-profil')">MODIFIER MON PROFIL</a>
                <a href="#" class="nav-link" onclick="showSection('gestion-membres')">👥 Membres</a>
                <a href="#" class="nav-link" onclick="showSection('gestion-categories')">🛠 Métiers</a>
                <a href="#" class="nav-link" onclick="showSection('gestion-informations')">🛈 Informations</a>
                <a href="#" class="nav-link" onclick="showSection('publication-informations')">🛈 Publier une information</a>
                <a href="#" class="nav-link" onclick="showSection('gestion-suggestions')">💡 Boîte à idées</a>
                <a href="#" class="nav-link" onclick="showSection('gestion-annonces')">📢 Annonces</a>
                <a href="#" class="nav-link" onclick="showSection('gestion-avis')">💬 Avis</a>
                <a href="#" class="nav-link" onclick="showSection('delete-section')">Supprimer mon compte</a>

                @if(auth()->user()->role === 'super_admin')
                    <div class="super-admin-divider">
                        <a href="#" class="nav-link link-danger" onclick="showSection('gestion-admins')">👑 Gérer les Admins</a>
                    </div>
                @endif

                @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bouton-logout">Se déconnecter</button>
                    </form>
                @endauth
            </nav>
        </aside>

        <main class="admin-content">

            {{-- VUE ACCUEIL --}}
            <section id="accueil" class="admin-section" style="display: block;">
                <div class="admin-card">
                    <h1>Salut {{ auth()->user()->prenom }} :)</h1>
                    <p>Bienvenue sur ton interface de gestion {{ auth()->user()->role }}. Utilise le menu à gauche pour naviguer.</p>

                    <div style="margin-top: 40px; padding: 20px; border: 2px dashed #1a1a1a;">
                        <h4>Dernière mise à jour</h4>
                        <p>Votre profil a été mis à jour le {{ auth()->user()->updated_at->format('d/m/Y') }}</p>
                    </div>
                </div>
            </section>

            {{-- VUE VOIR MON PROFIL --}}
            <section id="voir-mon-profil" class="admin-section" style="display: none;">
                <div class="admin-card">
                    <h2>Mes informations actuelles</h2>
                    <div class="info-affichage">
                        <div class="info-box" style="grid-column: 1 / -1; display: flex; align-items: center; gap: 20px;">
                            <img src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : asset('images/default-pp.png') }}" class="pp-preview">
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

            {{-- VUE MODIFIER MON PROFIL --}}
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
                        <div class="form-group"><label>Âge</label><input type="number" name="age" value="{{ auth()->user()->age }}"></div>
                        <div class="form-group"><label>Lieu</label><input type="text" name="lieu" value="{{ auth()->user()->lieu }}"></div>
                        <div class="form-group"><label>Instagram (@...)</label><input type="text" name="insta" value="{{ auth()->user()->insta }}"></div>
                        <div class="form-group"><label>Lien Bande-démo</label><input type="url" name="lien_demo" value="{{ auth()->user()->lien_demo }}"></div>
                        <button type="submit" class="bouton">Sauvegarder</button>
                    </form>
                </div>
            </section>

            {{-- VUE GESTION MEMBRES (SÉCURISÉE AVEC SCROLLHORIZONTAL) --}}
            <section id="gestion-membres" class="admin-section" style="display: none;">
                <div class="admin-card">
                    <h3>👥 Liste des Membres ({{ $users->count() }})</h3>
                    <div class="table-responsive">
                        <table class="admin-table">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Rôle</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $u)
                                <tr>
                                    <td>{{ $u->prenom }} {{ $u->nom }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td>{{ $u->role }}</td>
                                    <td>
                                        @if(auth()->user()->role === 'super_admin')
                                            @if($u->role === 'user')
                                                <form action="{{ route('user.promote', $u->id) }}" method="POST" style="display:inline;">
                                                    @csrf @method('PATCH')
                                                    <button type="submit" class="bouton-small success">Promouvoir Admin</button>
                                                </form>
                                            @elseif($u->role === 'admin')
                                                <form action="{{ route('user.demote', $u->id) }}" method="POST" style="display:inline;">
                                                    @csrf @method('PATCH')
                                                    <button type="submit" class="bouton-small">Rétrograder</button>
                                                </form>
                                            @endif
                                        @endif
                                        @if($u->id !== auth()->id())
                                            <form action="{{ route('user.destroy', $u->id) }}" method="POST" style="display:inline;">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="bouton-small danger">Supprimer</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            {{-- VUE METIERS --}}
            <section id="gestion-categories" class="admin-section" style="display: none;">
                <div class="admin-card">
                    <h3>Ajouter un métier / catégorie</h3>
                    <form action="{{ route('category.store') }}" method="POST" style="display: flex; gap: 10px;">
                        @csrf
                        <input type="text" name="nom" placeholder="Ex: Chef Opérateur" required style="flex-grow: 1;">
                        <button type="submit" class="bouton">Ajouter</button>
                    </form>
                </div>
                <div class="admin-card">
                    <h3>Liste des catégories</h3>
                    <div style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 20px;">
                        @foreach($categories as $cat)
                            <div class="stat-card" style="display: flex; align-items: center; gap: 10px; padding: 10px;">
                                <span>{{ $cat->nom }}</span>
                                <form action="{{ route('category.destroy', $cat->id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" style="background:none; border:none; color:red; cursor:pointer; font-weight:bold;">X</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            {{-- VUE PUBLICATION INFOS --}}
            <section id="publication-informations" class="admin-section" style="display: none;">
                <div class="admin-card">
                    <h2>Publier une information</h2>
                    <form action="{{ route('information.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Image de l'information</label>
                            <input type="file" name="affiche" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label>Titre</label>
                            <input type="text" name="titre" required>
                        </div>
                        <div class="form-group">
                            <label>Contenu</label>
                            <textarea name="description" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="bouton">Mettre en ligne</button>
                    </form>
                </div>
            </section>

            {{-- VUE GESTION INFOS --}}
            <section id="gestion-informations" class="admin-section" style="display: none;">
                <div class="admin-card">
                    <h3>🛈 Gérer les informations publiées</h3>
                    @forelse($toutesLesInfos as $info)
                        <div class="item-list">
                            <div>
                                <strong>{{ $info->titre }}</strong><br>
                                <small>Publié le {{ $info->created_at->format('d/m/Y') }} par {{ $info->user->prenom }}</small>
                            </div>
                            <form action="{{ route('information.destroy', $info->id) }}" method="POST" onsubmit="return confirm('Supprimer cette info ?')">
                                @csrf @method('DELETE')
                                <button type="submit" style="color: red; background: none; border: none; font-weight: bold; cursor: pointer;">Supprimer</button>
                            </form>
                        </div>
                    @empty
                        <p>Aucune information publiée pour le moment.</p>
                    @endforelse
                </div>
            </section>

            {{-- VUE BOITE A IDÉES --}}
            <section id="gestion-suggestions" class="admin-section" style="display: none;">
                <div class="admin-card">
                    <h3>💡 Suggestions à modérer</h3>
                    @forelse($suggestions as $sug)
                        <div class="suggestion-card" style="border-bottom: 2px solid #000; padding-bottom: 20px; margin-bottom: 20px;">
                            <div class="suggestion-meta">
                                <p><strong>Posté par :</strong> {{ $sug->user->prenom ?? 'Utilisateur supprimé' }} {{ $sug->user->nom ?? '' }}</p>
                                <p><strong>Le :</strong> {{ $sug->created_at->format('d/m/Y à H:i') }} <span class="date-relative">({{ $sug->created_at->diffForHumans() }})</span></p>
                                <p><strong>Titre :</strong> {{ $sug->titre }}</p>
                            </div>
                            <div class="suggestion-content">
                                <p>{{ $sug->description }}</p>
                            </div>
                            <form action="{{ route('suggestions.validate', $sug->id) }}" method="POST">
                                @csrf @method('PATCH')
                                <button type="submit" class="bouton-valider">Valider la suggestion</button>
                            </form>
                        </div>
                    @empty
                        <p>Aucune suggestion en attente de modération. 👌</p>
                    @endforelse
                    <hr style="margin: 40px 0; border: 1px solid #eee;">
                    <h3>✅ Suggestions déjà publiées ({{ $suggestions_count }})</h3>
                    @forelse($suggestionsEnLigne as $item)
                        <div class="item-list">
                            <div>
                                <strong>{{ $item->titre }}</strong><br>
                                <small style="color: #666;">Par : {{ $item->user->prenom . ' ' . $item->user->nom ?? 'Inconnu' }} | Publié le : {{ $item->created_at->format('d/m/Y') }}</small>
                            </div>
                            <form action="{{ route('suggestion.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Supprimer cette suggestion ?')">
                                @csrf @method('DELETE')
                                <button type="submit" style="background:none; border:none; color:#ff4d4d; font-weight:bold; cursor:pointer;">Supprimer</button>
                            </form>
                        </div>
                    @empty
                        <p>Aucune suggestion en ligne pour le moment.</p>
                    @endforelse
                </div>
            </section>

            {{-- VUE ANNONCES --}}
            <section id="gestion-annonces" class="admin-section" style="display: none;">
                <div class="admin-card">
                    <h3>📢 Annonces à modérer</h3>
                    @forelse($toutesLesAnnonce as $annonce)
                        <div class="suggestion-card" style="border-bottom: 2px solid #000; padding-bottom: 20px; margin-bottom: 20px;">
                            <div class="suggestion-meta">
                                <p><strong>Posté par :</strong> {{ $annonce->user->prenom }} {{ $annonce->user->nom }}</p>
                                <p><strong>Le :</strong> {{ $annonce->created_at->format('d/m/Y à H:i') }}</p>
                            </div>
                            <div class="suggestion-content">
                                <p><strong>Titre : </strong>{{ $annonce->titre }}</p>
                                @if($annonce->affiche)
                                    <img src="{{ asset('storage/' . $annonce->affiche) }}" style="max-width: 150px; border-radius: 5px;">
                                @endif
                            </div>
                            <form action="{{ route('annonces.validate', $annonce->id) }}" method="POST" style="margin-top: 10px;">
                                @csrf @method('PATCH')
                                <button type="submit" class="bouton-valider">Valider l'annonce</button>
                            </form>
                        </div>
                    @empty
                        <p>Aucune annonce en attente. 👌</p>
                    @endforelse
                    <hr style="margin: 40px 0; border: 1px solid #eee;">
                    <h3>✅ Annonces déjà publiées ({{ $annonces_count }})</h3>
                    @forelse($annoncesEnLigne as $item)
                        <div class="item-list">
                            <div>
                                <strong>{{ $item->titre }}</strong><br>
                                <small style="color: #666;">Par : {{ $item->user->prenom . ' ' . $item->user->nom ?? 'Inconnu' }} | Publié le : {{ $item->created_at->format('d/m/Y') }}</small>
                            </div>
                            <form action="{{ route('annonces.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Supprimer définitivement cette annonce ?')">
                                @csrf @method('DELETE')
                                <button type="submit" style="background:none; border:none; color:#ff4d4d; font-weight:bold; cursor:pointer;">Supprimer</button>
                            </form>
                        </div>
                    @empty
                        <p>Aucune annonce en ligne pour le moment.</p>
                    @endforelse
                </div>
            </section>

            {{-- VUE AVIS --}}
            <section id="gestion-avis" class="admin-section" style="display: none;">
                <div class="admin-card">
                    <h3>💬 Avis à modérer</h3>
                    @forelse($avis_a_valider as $avi)
                        <div class="suggestion-card" style="border-bottom: 2px solid #000; padding-bottom: 20px; margin-bottom: 20px;">
                            <div class="suggestion-meta">
                                <p><strong>Posté par :</strong> {{ $avi->user->prenom ?? 'Utilisateur supprimé' }} {{ $avi->user->nom ?? '' }}</p>
                                <p><strong>Le :</strong> {{ $avi->created_at->format('d/m/Y à H:i') }}</p>
                            </div>
                            <div class="suggestion-content">
                                <p>{{ \Illuminate\Support\Str::limit($avi->description, 50, '...') }}</p>
                            </div>
                            <form action="{{ route('avis.validate', $avi->id) }}" method="POST">
                                @csrf @method('PATCH')
                                <button type="submit" class="bouton-valider">Valider l'avis</button>
                            </form>
                        </div>
                    @empty
                        <p>Aucun avis en attente de modération. 👌</p>
                    @endforelse
                    <hr style="margin: 40px 0; border: 1px solid #eee;">
                    <h3>✅ Avis déjà publiés ({{ $avis_count }})</h3>
                    @forelse($avisEnLigne as $item)
                        <div class="item-list">
                            <div>
                                <strong>{{ \Illuminate\Support\Str::limit($item->description, 50, '...') }}</strong><br>
                                <small style="color: #666;">Par : {{ $item->user->prenom . ' ' . $item->user->nom ?? 'Inconnu' }} | Publié le : {{ $item->created_at->format('d/m/Y') }}</small>
                            </div>
                            <form action="{{ route('avis.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Supprimer cet avis ?')">
                                @csrf @method('DELETE')
                                <button type="submit" style="background:none; border:none; color:#ff4d4d; font-weight:bold; cursor:pointer;">Supprimer</button>
                            </form>
                        </div>
                    @empty
                        <p>Aucun avis en ligne pour le moment.</p>
                    @endforelse
                </div>
            </section>

            {{-- VUE GESTION ADMINS SUPER_ADMIN (SÉCURISÉE AVEC SCROLLHORIZONTAL) --}}
            @if(auth()->user()->role === 'super_admin')
                <section id="gestion-admins" class="admin-section" style="display: none;">
                    <div class="admin-card card-danger">
                        <h3>👑 Gestion des Administrateurs</h3>
                        <div class="table-responsive">
                            <table class="admin-table">
                                <thead>
                                <tr>
                                    <th>Prénom</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($all_admins as $admin)
                                    <tr>
                                        <td>{{ $admin->prenom }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td>
                                            @if($admin->id !== auth()->id())
                                                <form action="{{ route('user.demote', $admin->id) }}" method="POST">
                                                    @csrf @method('PATCH')
                                                    <button class="bouton-small">Rétrograder en User</button>
                                                </form>
                                            @else
                                                <span style="font-style: italic; color: #666; font-size: 0.85rem;">Votre compte</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            @endif

            {{-- VUE DESTRUCTION DU COMPTE --}}
            <section id="delete-section" class="admin-section" style="display: none;">
                    <h2>Supprimer le compte</h2>
                    <p style="border-left: 5px solid #ff5555; padding-left: 15px; font-weight: 600;">
                        Une fois votre compte supprimé, toutes ses ressources et données (annonces, avis, profil répertoire) seront définitivement effacées.
                    </p>
                    <form action="{{ route('profile.destroy') }}" method="POST" onsubmit="return confirm('Es-tu vraiment sûr ? Cette action est irréversible.')">
                        @csrf @method('delete')
                        <div class="mt-6">
                            <label for="password">Ton mot de passe pour confirmer :</label>
                            <input type="password" name="password" id="password" required style="box-shadow: 4px 4px 0px #000;">
                        </div>
                        <button type="submit" class="bouton-danger">SUPPRIMER MON COMPTE DÉFINITIVEMENT</button>
                    </form>
            </section>

        </main>
    </div>

    <script>
        function showSection(id) {
            document.querySelectorAll('.admin-section').forEach(s => s.style.display = 'none');
            document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));

            const target = document.getElementById(id);
            if(target) target.style.display = 'block';

            const activeLink = document.querySelector(`.nav-link[onclick*="${id}"]`);
            if (activeLink) activeLink.classList.add('active');
        }
    </script>
@endsection
