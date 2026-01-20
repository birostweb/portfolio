# --- Étape 1: Build des assets frontend (CSS) ---
# On utilise une image Node.js pour installer les dépendances et compiler le CSS.
FROM node:20-alpine AS builder

# On définit le répertoire de travail dans le conteneur
WORKDIR /app

# On copie les fichiers de manifeste du projet Node.js
COPY package.json package-lock.json ./

# On installe les dépendances npm
RUN npm install

# On copie le reste des fichiers nécessaires au build CSS
COPY src/input.css ./src/input.css
# Si vous avez un fichier tailwind.config.js, décommentez la ligne suivante
# COPY tailwind.config.js ./

# On lance la compilation de TailwindCSS pour générer le fichier de production
# Note: J'ai enlevé "--watch" qui n'est utile que pour le développement
RUN ./node_modules/.bin/tailwindcss -i ./src/input.css -o ./src/output.css


# --- Étape 2: Création de l'image finale PHP + Apache ---
# On part d'une image officielle PHP 8.2 avec le serveur web Apache.
FROM php:8.2-apache

# Supprimer le message d'avertissement "Could not reliably determine the server's fully qualified domain name"
# en configurant un ServerName par défaut pour Apache.
COPY apache-servername.conf /etc/apache2/conf-available/servername.conf
RUN a2enconf servername

# On installe les extensions PHP nécessaires (zip est requis par Composer)
RUN apt-get update && apt-get install -y \
        libzip-dev \
        unzip \
    && docker-php-ext-install zip

# On installe Composer (le gestionnaire de dépendances PHP)
COPY --from=composer:lts /usr/bin/composer /usr/bin/composer

# On définit le répertoire de travail d'Apache
WORKDIR /var/www/html

# On copie les dépendances Composer et on les installe
COPY composer.json composer.lock .
RUN composer install --no-dev --optimize-autoloader

# On copie tout le code source de l'application
COPY src/ .

# On copie SEULEMENT le fichier CSS compilé depuis l'étape "builder"
COPY --from=builder /app/src/output.css ./output.css

# On s'assure que le serveur web a les permissions sur les fichiers
RUN chown -R www-data:www-data /var/www/html

# Le port 80 est déjà exposé par l'image de base, mais on peut le clarifier
EXPOSE 80

# On copie et on configure notre script d'entrée qui va gérer le port dynamique
COPY entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/entrypoint.sh
ENTRYPOINT ["entrypoint.sh"]

# La commande par défaut à exécuter via notre entrypoint
CMD ["apache2-foreground"]
