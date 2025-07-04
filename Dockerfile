FROM php:8.1-apache

# Optional: Enable Apache rewrite module
RUN a2enmod rewrite

# Copy your PHP code into the Apache web root
COPY . /var/www/html/

# Expose port 80 so Render can access it
EXPOSE 80
