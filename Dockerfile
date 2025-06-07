FROM php:8.2-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    git unzip zip libzip-dev libpng-dev libonig-dev libxml2-dev curl \
    && docker-php-ext-install pdo_mysql zip gd mbstring xml

# Enable Apache Rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Fix permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Set Apache root to /public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Copy TiDB SSL CA certificate
RUN mkdir -p /etc/ssl/certs
COPY storage/certs/ca.pem /etc/ssl/certs/ca.pem

# Laravel setup
RUN php artisan config:cache \
 && php artisan route:cache \
 && php artisan view:cache
