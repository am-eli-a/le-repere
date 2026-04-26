FROM php:8.2-apache

# Installation des dépendances système et PHP pour PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libpng-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_pgsql gd

# Activation du module rewrite d'Apache
RUN a2enmod rewrite

# Copie des fichiers du projet
COPY . /var/www/html

# Configuration du DocumentRoot sur le dossier public de Laravel
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Installation de Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Permissions pour Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Port exposé
EXPOSE 80
