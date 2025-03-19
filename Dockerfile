# Use the official PHP image with Apache
FROM php:8.2-apache

# Enable necessary Apache modules
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy project files to the container
COPY . /var/www/html/

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install project dependencies
RUN composer install

# Set ServerName to localhost to suppress the warning
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Expose port 80 (Apache default)
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
