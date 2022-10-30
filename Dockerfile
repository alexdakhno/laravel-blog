FROM php:8.1.0-fpm
RUN docker-php-ext-install pdo pdo_mysql

RUN apt-get update
RUN apt-get install -y libzip-dev
RUN docker-php-ext-install zip

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug