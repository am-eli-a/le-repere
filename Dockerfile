FROM php:8.4-fpm

# 1. Installer Nginx, les outils de décompression (zip/unzip) et PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    nginx \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo_pgsql \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# 2. Configurer le dossier de travail
WORKDIR /var/www/html
COPY --chown=www-data:www-data . /var/www/html

# 3. Récupérer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 4. Autoriser Composer à tourner de manière fluide dans Docker
ENV COMPOSER_ALLOW_SUPERUSER=1

# 5. Installer les dépendances PHP
RUN composer install --no-dev --optimize-autoloader

# 6. Configurer Nginx pour écouter sur le port 8080 et pointer sur /public
RUN echo 'server { \
    listen 8080 default_server; \
    root /var/www/html/public; \
    index index.php index.html; \
    charset utf-8; \
    location / { \
        try_files $uri $uri/ /index.php?$query_string; \
    } \
    location ~ \.php$ { \
        include fastcgi_params; \
        fastcgi_pass 127.0.0.1:9000; \
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name; \
    } \
}' > /etc/nginx/sites-available/default && \
ln -sf /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default

# 7. Donner les permissions d'écriture pour Laravel
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 8080

# 8. Utiliser le format JSON recommandé pour la commande finale
CMD ["sh", "-c", "php-fpm -D && nginx -g 'daemon off;'"]
