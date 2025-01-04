# Base image
FROM php:8.2-fpm-alpine

# Set working directory
WORKDIR /var/www/projet

# Install system dependencies and PHP extensions
RUN apk add --no-cache bash git unzip curl zip libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip \
    && docker-php-ext-enable opcache

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer --version

# Install Symfony CLI
RUN curl -sS https://get.symfony.com/cli/installer | bash \
    && mv /root/.symfony*/bin/symfony /usr/local/bin/symfony

    # Installer les dépendances nécessaires
RUN apk add --no-cache autoconf g++ make linux-headers libtool
RUN pecl install xdebug && docker-php-ext-enable xdebug
# Configurer Xdebug
COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# Set permissions for the current user (optional)
RUN addgroup -g 1000 symfony && adduser -G symfony -u 1000 -D symfony \
    && chown -R symfony:symfony /var/www/projet

# Switch to the non-root user (optional)
USER symfony

# Expose port 9000 for PHP-FPM
EXPOSE 9000

# Start PHP-FPM server
CMD ["php-fpm"]
