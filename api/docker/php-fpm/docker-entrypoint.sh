#!/bin/bash
set -e

echo "[ ****************** ] Starting Endpoint of Application [ ****************** ]"

echo "Back - Starting Endpoint of Application"
if ! [ -d "./vendor" ]; then
    echo '====== INSTALLING COMPOSER ======'
    composer install --ignore-platform-reqs  --no-interaction --verbose --no-suggest

    echo '======  SEEDING ======'
    composer cli questoes:seed

fi

exec "$@"

set -- php-fpm

exec "$@"
