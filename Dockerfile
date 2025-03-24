FROM php:8.3-apache

COPY apache/000-default.conf /etc/apache2/sites-enabled/

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev

RUN docker-php-ext-install pdo pdo_mysql

RUN a2enmod rewrite

EXPOSE 80
