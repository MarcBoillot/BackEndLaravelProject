#!/bin/sh

COMPOSER_ALLOW_SUPERUSER=1 composer install --no-interaction --optimize-autoloader

php artisan migrate
php artisan db:seed
