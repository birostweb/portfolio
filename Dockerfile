# --- Étape 1: Build des assets frontend (CSS) ---
FROM node:20-alpine AS builder

WORKDIR /app

# Copie des fichiers de manifeste
COPY package.json package-lock.json ./
RUN npm install

# Copie et compilation du CSS
COPY src/input.css ./src/input.css
RUN ./node_modules/.bin/tailwindcss -i ./src/input.css -o ./src/output.css --minify


# --- Étape 2: Image finale PHP + Apache ---
FROM php:8.2-apache

# Activation du module rewrite
RUN a2enmod rewrite

# Configuration du ServerName pour éviter les warnings
RUN echo "ServerName localhost" > /etc/apache2/conf-available/servername.conf \
    && a2enconf servername

# Installation des extensions PHP nécessaires
RUN apt-get update && apt-get install -y \
        libzip-dev \
        unzip \
    && docker-php-ext-install zip \
    && rm -rf /var/lib/apt/lists/*

# Installation de Composer
COPY --from=composer:lts /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Installation des dépendances Composer
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Copie du code source
COPY src/ ./

# Copie du CSS compilé DANS LE BON RÉPERTOIRE
COPY --from=builder /app/src/output.css ./output.css

# Configuration Apache SIMPLIFIÉE
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html|g' /etc/apache2/sites-available/000-default.conf && \
    sed -i '/<\/VirtualHost>/i \
    <Directory /var/www/html>\n\
        Options Indexes FollowSymLinks\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>' /etc/apache2/sites-available/000-default.conf

# Permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Configuration de l'entrypoint
COPY entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/entrypoint.sh

EXPOSE 80

ENTRYPOINT ["entrypoint.sh"]
CMD ["apache2-foreground"]