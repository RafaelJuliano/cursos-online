FROM php:7.1.3-apache

RUN apt update \
    && apt install -y \
    g++ \
    libicu-dev \
    libpq-dev \
    libzip-dev \
    zip \
    zlib1g-dev \
    && docker-php-ext-install \
    intl \
    opcache \
    pdo \
    mbstring \
    pdo_pgsql \
    pgsql 

WORKDIR /var/www/laravel_docker

RUN apt-get update -y && apt-get install -y openssl zip unzip git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

CMD php artisan serve --host=0.0.0.0 --port=8181