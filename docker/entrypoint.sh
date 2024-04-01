#!/bin/bash
set -e

BACKEND_DIR="/var/www/back-end"
if [ -d "$BACKEND_DIR/vendor" ]; then
    echo "Laravel vendor dir exists, not installing"
else
    echo "Laravel vendor dir does not exist, running composer install"
    cd $BACKEND_DIR
    composer install
fi

FRONTEND_DIR="/var/www/front-end"
if [ -d "$FRONTEND_DIR/node_modules" ]; then
    echo "Nuxt node_modules dir exists, not installing"
else
    echo "Nuxt node_modules dir does not exist, running npm install"
    cd $FRONTEND_DIR
    npm install
fi

echo "DEPENDENCIES READY"

exec supervisord -c /etc/supervisord.conf