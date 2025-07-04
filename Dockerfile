FROM php:8.1-apache

# Enable Apache rewrite if needed
RUN a2enmod rewrite

# Install PostgreSQL support for PDO
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Copy all files into the web root
COPY . /var/www/html/

EXPOSE 80
