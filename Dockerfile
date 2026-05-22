FROM php:8.4-fpm-alpine

# 1. Installer les dépendances pour PostgreSQL et extensions PHP
RUN apt-get update && apt-get install -y \
    libpq-dev \
    nginx \
    && docker-php-ext-install pdo_pgsql

# 2. Configurer le dossier racine de Laravel pour Nginx
WORKDIR /var/www/html
COPY --chown=www-data:www-data . /var/www/html

# 3. Installer Composer et les dépendances du projet
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# 4. Configurer Nginx pour lire le port dynamique de Railway ($PORT)
RUN echo 'server { \
    listen 8080; \
    root /var/www/html/public; \
    index index.php index.html; \
    location / { try_files $uri $uri/ /index.php?$query_string; } \
    location ~ \.php$ { \
        include fastcgi_params; \
        fastcgi_pass 127.0.0.1:9000; \
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name; \
    } \
}' > /etc/nginx/sites-available/default

EXPOSE 8080

# 5. Lancement de PHP-FPM et de Nginx en simultané
CMD php artisan config:clear && \
    php artisan cache:clear && \
    php artisan migrate --force && \
    php-fpm -D && nginx -g "daemon off;"
