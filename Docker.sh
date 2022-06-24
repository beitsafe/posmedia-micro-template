#!/bin/bash

composer install --no-dev --no-interaction --no-autoloader --no-scripts
composer dump-autoload -o

## Done this here as it is depending on Redis for some stupid reason...
php artisan storage:link --env=prod

php artisan migrate --force

php artisan route:clear
php artisan config:clear

## Make sure to update the permissions once again (if vendor publish wrote some crap as root..)
chown -R www-data:www-data /var/www/html/storage
chown -R www-data:www-data /var/www/html/public/storage
echo "Permissions updated on public storage folder!"

sleep 2

php artisan serve --host 0.0.0.0
