#!/bin/sh
set -e

# Configuration du port dynamique pour Apache
LISTEN_PORT=${PORT:-80}

echo "Configuration d'Apache pour écouter sur le port ${LISTEN_PORT}"
sed -i "s/Listen 80/Listen ${LISTEN_PORT}/g" /etc/apache2/ports.conf
sed -i "s/:80/:${LISTEN_PORT}/g" /etc/apache2/sites-available/*.conf

# Lancement d'Apache
exec "$@"