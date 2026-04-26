FROM php:8.4-apache

# 1. Installation des dépendances système pour PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libpng-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_pgsql gd

# 2. Activation du module rewrite
RUN a2enmod rewrite

# 3. Copie des fichiers (y compris ton dossier public/build compilé sur ton PC)
COPY . /var/www/html

# 4. Configuration d'Apache
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# 5. Installation de Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# 6. Permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80

# 7. Script de démarrage (Config clear + Migration)
RUN echo '#!/bin/sh\n\
php artisan config:clear\n\
php artisan cache:clear\n\
php artisan migrate --force\n\
apache2-foreground' > /usr/local/bin/start.sh

RUN chmod +x /usr/local/bin/start.sh

CMD ["/usr/local/bin/start.sh"]
