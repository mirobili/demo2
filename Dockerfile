FROM php:8.3-apache

# Install necessary extensions and Composer
RUN  a2enmod rewrite
# Set working directory
WORKDIR /var/www/html


# Install dependencies
RUN apt-get update && apt-get install -y \
    zip \
    unzip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy application files (uncomment this line to copy your app files)
COPY ./app /var/www/html

# Install PHP dependencies
RUN composer install

# Apache configuration for .htaccess
RUN echo '<Directory /var/www/html/>\n\
    AllowOverride All\n\
</Directory>' > /etc/apache2/conf-available/override.conf && \
    a2enconf override
