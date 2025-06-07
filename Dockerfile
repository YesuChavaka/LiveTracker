FROM php:8.2-apache

# Install PHP extensions
RUN apt-get update && apt-get install -y \
    git unzip zip libzip-dev libpng-dev libonig-dev libxml2-dev curl \
    && docker-php-ext-install pdo_mysql zip gd mbstring xml

# Enable Apache Rewrite Module
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy Laravel files
COPY . .

# Set permissions for Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Set correct Apache document root
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Override default Apache config
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install PHP packages
RUN composer install --no-dev --optimize-autoloader

# Laravel commands
RUN php artisan config:cache \
 && php artisan route:cache \
 && php artisan view:cache \
 && php artisan migrate --force

# Add CA cert
RUN mkdir -p /etc/ssl/certs
COPY storage/certs/ca.pem /etc/ssl/certs/ca.pem
