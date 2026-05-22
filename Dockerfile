FROM serversideup/php:8.4-fpm-nginx

# 1. Passer en root pour installer les dépendances PostgreSQL
USER root

RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# 2. Configurer le dossier racine pour Laravel (indispensable pour Nginx)
ENV DOCUMENT_ROOT=/var/www/html/public

# 3. Copier les fichiers du projet dans le conteneur
COPY --chown=www-data:www-data . /var/www/html

# 4. Repasser sur l'utilisateur par défaut pour exécuter Composer et Laravel
USER www-data

# 5. Installer les dépendances PHP (sans les outils de dev local)
RUN composer install --no-dev --optimize-autoloader

# 6. Exposer le port par défaut que Railway va écouter
EXPOSE 8080

# 7. Script de démarrage : Nettoyage, migrations automatiques et lancement du serveur
CMD php artisan config:clear && \
    php artisan cache:clear && \
    php artisan view:clear && \
    php artisan migrate --force && \
    docker-php-entrypoint
