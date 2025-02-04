FROM php:8.2-fpm

WORKDIR /var/www

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl \
    libssl-dev \
    && docker-php-ext-install pdo pdo_mysql

# Install MongoDB PHP Extension via PECL and enable it
RUN pecl install mongodb && docker-php-ext-enable mongodb

# Copy composer from the official image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy your application code to the container
COPY . .

# Install PHP dependencies and set permissions
RUN composer install && \
    chmod -R 777 storage bootstrap/cache

# Start Laravel's built-in server on port 8000 and bind to all network interfaces
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
