FROM serversideup/php:8.4-fpm-nginx

# 1. Passer en root pour installer l'extension PostgreSQL
USER root

RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# 2. Configurer le dossier racine pour Laravel
ENV DOCUMENT_ROOT=/var/www/html/public

# 4. Copier les fichiers du projet
COPY --chown=www-data:www-data . /var/www/html

# 5. Repasser sur l'utilisateur par défaut pour exécuter Composer
USER www-data
RUN composer install --no-dev --optimize-autoloader

# 6. Exposer le port 8080
EXPOSE 80

# 7. Lancement des commandes Laravel et du serveur
CMD php artisan config:clear && \
    php artisan cache:clear && \
    php artisan view:clear && \
    php artisan migrate --force && \
    docker-php-entrypoint
