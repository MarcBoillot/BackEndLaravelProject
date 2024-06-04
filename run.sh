#!/bin/sh

php artisan key:generate
# Optimizing Configuration loading
php artisan config:cache
# Optimizing Route loading
php artisan route:cache
# Optimizing View loading
php artisan view:cache

supervisord
