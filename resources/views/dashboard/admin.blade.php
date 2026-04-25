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
                <a href="#" class="nav-link" onclick="showSection('gestion-suggestions')">💡 Boîte à idées</a>
                <a href="#" class="nav-link" onclick="showSection('gestion-avis')">💬 Avis clients</a>

                @if(auth()->user()->role === 'super_admin')
                    <div class="super-admin-divider">
                        <span>Zone Secrète</span>
                        <a href="#" class="nav-link link-danger" onclick="showSection('gestion-admins')">👑 Gérer les Admins</a>
                    </div>
                @endif
            </nav>
        </aside>

        <main class="admin-content">

            <div class="message-container">
                @if(session('success'))
                    <div class="alert-flash alert-success" id="flash-message">
                        <span class="icon">✅</span>
                        <p>{{ session('success') }}</p>
                    </div>
                @endif
                @if($errors->any())
                    <div class="alert-flash alert-danger">
                        <span class="icon">⚠️</span>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <section id="accueil" class="admin-section" style="display: block;">
                <h1>Salut {{ auth()->user()->prenom }} :)</h1>
                <p>Bienvenue sur ton interface de gestion {{ auth()->user()->role }}. Utilise le menu à gauche pour naviguer.</p>

                <div style="margin-top: 40px; padding: 20px; border: 2px dashed #1a1a1a;">
                    <h4>Dernière mise à jour</h4>
                    <p>Votre profil a été mis à jour le {{ auth()->user()->updated_at->format('d/m/Y') }}</p>
                </div>
            </section>

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

            <section id="gestion-membres" class="admin-section" style="display: none;">
                <div class="admin-card">
                    <h3>👥 Liste des Membres ({{ $users->count() }})</h3>
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
                                    @if ($u->role === 'user' || (auth()->user()->role === 'super_admin' && $u->id !== auth()->id()))
                                        <form action="{{ route('user.destroy', $u->id) }}" method="POST" onsubmit="return confirm('Supprimer cet utilisateur ?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn-delete">Supprimer</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </section>

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
                    <div style="display: flex; wrap: wrap; gap: 10px; margin-top: 20px;">
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

            <section id="gestion-suggestions" class="admin-section" style="display: none;">
                <div class="admin-card">
                    <h3>💡 Suggestions à modérer</h3>
                    @forelse($suggestions as $sug)
                        <div class="item-list">
                            <p><strong>{{ $sug->titre }}</strong></p>
                            <form action="{{ route('suggestions.validate', $sug->id) }}" method="POST">
                                @csrf @method('PATCH')
                                <button class="bouton-small">Valider</button>
                            </form>
                        </div>
                    @empty
                        <p>Aucune suggestion en attente.</p>
                    @endforelse
                </div>
            </section>

            @if(auth()->user()->role === 'super_admin')
                <section id="gestion-admins" class="admin-section" style="display: none;">
                    <div class="admin-card card-danger">
                        <h3>👑 Gestion des Administrateurs</h3>
                        <table class="admin-table">
                            @foreach($all_admins as $admin)
                                <tr>
                                    <td>{{ $admin->prenom }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>
                                        <form action="{{ route('user.demote', $admin->id) }}" method="POST">
                                            @csrf @method('PATCH')
                                            <button class="bouton-small">Rétrograder en User</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </section>
            @endif
        </main>
    </div>

    <script>
        function showSection(id) {
            document.querySelectorAll('.admin-section').forEach(s => s.style.display = 'none');
            document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));

            const target = document.getElementById(id);
            if(target) target.style.display = 'block';

            event.currentTarget.classList.add('active');
        }
    </script>
@endsection
