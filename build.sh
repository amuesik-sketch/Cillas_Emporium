#!/usr/bin/env bash
set -e

apt-get install -y php8.2-pgsql
composer install --no-dev --optimize-autoloader
php artisan config:cache
php artisan route:cache
php artisan view:cache