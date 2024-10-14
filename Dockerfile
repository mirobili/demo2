FROM php:8.0-apache

# Install necessary extensions and Composer
RUN apt-get update && apt-get install -y \
    curl \
    && a2enmod rewrite \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www/html

# Copy application files (uncomment this line to copy your app files)
#COPY . /var/www/html

# Apache configuration for .htaccess
RUN echo '<Directory /var/www/html/>\n\
    AllowOverride All\n\
</Directory>' > /etc/apache2/conf-available/override.conf && \
    a2enconf override
