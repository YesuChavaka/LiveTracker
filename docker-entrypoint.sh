#!/bin/bash

# Laravel optimize
php artisan config:clear
php artisan cache:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run DB migrations
php artisan migrate --force || true

# Start Apache
exec apache2-foreground
