FROM php:8.0-fpm-alpine

LABEL maintainer="Roger"

RUN docker-php-ext-install pdo pdo_mysql sockets

RUN curl -sS https://getcomposer.org/installer| php -- --install-dir=/usr/local/bin --filename=composer

RUN apk add --no-cache $PHPIZE_DEPS

RUN pecl install xdebug

RUN docker-php-ext-enable xdebug

WORKDIR /var/www/html