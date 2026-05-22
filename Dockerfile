FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    libpq-dev \
    libpng-dev \
    libjpeg-dev \
    nginx \
    zip \
    unzip \
    git \
    && docker-php-ext-configure gd --with-jpeg \
    && docker-php-ext-install pdo_pgsql gd \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html
COPY --chown=www-data:www-data . /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer install --no-dev --optimize-autoloader

RUN echo 'events {} \
http { \
    include /etc/nginx/mime.types; \
    server { \
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
    } \
}' > /etc/nginx/nginx.conf

# 5. Créer les sous-dossiers d'uploads requis, droits et permissions
RUN mkdir -p /var/www/html/public/uploads/avatars \
             /var/www/html/public/uploads/profiles \
             /var/www/html/public/uploads/affiches \
             /var/www/html/public/uploads/informations && \
    chown -R www-data:www-data /var/www/html/storage \
                               /var/www/html/bootstrap/cache \
                               /var/www/html/public/uploads && \
    chmod -R 775 /var/www/html/storage \
                  /var/www/html/bootstrap/cache \
                  /var/www/html/public/uploads

EXPOSE 8080

CMD php artisan storage:link && php artisan migrate --force && php-fpm -D && nginx -g "daemon off;"
