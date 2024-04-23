FROM php:8.1.4-apache

# Install dependencies
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
        openssl \
        zip \
        unzip \
        git \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy application files
COPY . /var/www/html

# Copy .htaccess file
COPY ./public/.htaccess /var/www/html/.htaccess

# Set working directory
WORKDIR /var/www/html

# Install dependencies with Composer
RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

# Generate application key
RUN php artisan key:generate

# Set appropriate permissions
RUN chmod -R 755 storage

# Enable Apache rewrite module
RUN a2enmod rewrite

# Restart Apache
RUN service apache2 restart
