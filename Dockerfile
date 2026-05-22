FROM php:8.4-fpm

# 1. Installer Nginx et les dépendances pour PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    nginx \
    && docker-php-ext-install pdo_pgsql \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# 2. Configurer le dossier de travail
WORKDIR /var/www/html
COPY --chown=www-data:www-data . /var/www/html

# 3. Installer Composer et les dépendances du projet
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# 4. Configurer Nginx pour écouter sur le port 8080 et pointer sur /public
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

# 5. Donner les permissions d'écriture pour Laravel
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 8080

# 6. Démarrer PHP-FPM en arrière-plan (-D) et Nginx au premier plan
CMD php-fpm -D && nginx -g "daemon off;"
