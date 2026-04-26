FROM php:8.4-apache

# 1. Installation des dépendances système (on ajoute curl et gnupg pour Node.js)
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libpng-dev \
    zip \
    unzip \
    git \
    curl \
    gnupg \
    && docker-php-ext-install pdo pdo_pgsql gd

# 2. Installation de Node.js (nécessaire pour compiler le CSS/JS avec Vite)
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get install -y nodejs

# 3. Activation du module rewrite d'Apache
RUN a2enmod rewrite

# 4. Copie des fichiers du projet dans le conteneur
COPY . /var/www/html

# 5. Configuration d'Apache pour pointer sur le dossier /public de Laravel
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# 6. Installation de Composer et des dépendances PHP
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# 7. Installation des dépendances NPM et compilation des assets (CSS/JS)
RUN npm install
RUN npm run build || (echo "Erreur lors du build Vite" && exit 1)

# 8. Réglage des permissions pour Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 9. Port exposé
EXPOSE 80

# 10. Création du script de démarrage (Migrations + Lancement Apache)
RUN echo '#!/bin/sh\n\
php artisan config:clear\n\
php artisan migrate --force\n\
apache2-foreground' > /usr/local/bin/start.sh

RUN chmod +x /usr/local/bin/start.sh

CMD ["/usr/local/bin/start.sh"]
