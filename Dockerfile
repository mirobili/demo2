# Dockerfile
FROM php:8.3-apache

# Install necessary extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    vim \
    less \
    zip \
    unzip && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install -j$(nproc) gd pdo pdo_mysql && \
    a2enmod rewrite && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


#RUN composer install


# Set working directory
WORKDIR /var/www/html

## Copy application files
#COPY . /var/www/html

RUN echo '<Directory /var/www/html/>\n\
    AllowOverride All\n\
</Directory>' > /etc/apache2/conf-available/override.conf && \
    a2enconf override