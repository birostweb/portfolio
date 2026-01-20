#!/bin/sh
set -e

# Ce script configure dynamiquement le port d'écoute d'Apache.
# Il utilise la variable d'environnement PORT fournie par la plateforme (ex: Dockploy).
# S'il n'y a pas de variable PORT, il utilise le port 80 par défaut.

LISTEN_PORT=${PORT:-80}

echo "Configuration d'Apache pour écouter sur le port ${LISTEN_PORT}"
sed -i "s/Listen 80/Listen ${LISTEN_PORT}/g" /etc/apache2/ports.conf

# Lance la commande par défaut de l'image (CMD), qui est "apache2-foreground"
exec "$@"
