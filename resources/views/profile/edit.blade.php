<section class="delete-section">
    <header>
        <h2 class="text-lg font-medium text-gray-900">Supprimer le compte</h2>
        <p class="mt-1 text-sm text-gray-600">
            Une fois votre compte supprimé, toutes ses ressources et données (annonces, avis, profil répertoire) seront définitivement effacées.
        </p>
    </header>

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
